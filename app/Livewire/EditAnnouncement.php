<?php

namespace App\Livewire;

use App\Models\Image;
use Livewire\Component;
use App\Models\Category;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use App\Jobs\WatermarkImage;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class EditAnnouncement extends Component
{
    use WithFileUploads;

    public $announcementId;
    public $title;
    public $body;
    public $price;
    public $developer;
    public $publisher;
    public $category;
    public $platform;
    public $temporary_images;
    public $images = [];
    public $announcement;
    

    public function mount(Request $request, $announcementid){
        $this->announcementId = $announcementid;

        $this->announcement = Announcement::find($announcementid);
            $this->title = $this->announcement->title;
            $this->body = $this->announcement->body;
            $this->price = $this->announcement->price;
            $this->developer = $this->announcement->developer;
            $this->publisher = $this->announcement->publisher;
            $this->category = $this->announcement->category->id;
            $this->platform = $this->announcement->platform;
            // if ($request->hasFile('images')) {
            //     $path = $request->file('image')->store('images');
            //     $object->image = $path;
            // }
    }

    public function updatedTemporaryImages(){
        if($this->validate([
            'temporary_images.*' => 'image|max:1024',
        ])) {
            foreach ($this->temporary_images as $image){
                $this->images[] = $image;
            }
        }
    }

    public function removeImage($key){
        if(in_array($key, array_keys($this->images))){
            unset($this->images[$key]);
        }
    }

    public function update(){
        $announcement = Announcement::find($this->announcementId);
        $announcement->update(
            [
                'title' => $this->title,
                'body'=>$this->body,
                'price'=>$this->price, 
                'developer'=> $this->developer, 
                'publisher'=>$this->publisher,
                'category_id'=>$this->category,
                'platform'=>$this->platform          
            ]
        );

        if(count($this->images)){
            foreach($this->images as $image){
                $newFileName = "announcements/{$this->announcement->id}";
                $newImage = $this->announcement->images()->create(['path'=>$image->store($newFileName, 'public')]);
            
                RemoveFaces::withChain([
                    new WatermarkImage($newImage->id),
                    new ResizeImage($newImage->path, 250, 300),
                    new GoogleVisionSafeSearch($newImage->id),
                    new GoogleVisionLabelImage($newImage->id),
                ])->dispatch($newImage->id);

            }

            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }

        $announcement->category_id = $this->category;
        $announcement->save();

        return redirect()->route('user.myAnnouncements');
    }

    public function deleteImg(Image $image){
        $announcement = Announcement::find($image->announcement_id);
        Storage::disk('public')->delete($image->path);
        Storage::disk('public')->delete($image->getUrl(250, 300));
        $image->delete();

        return view('announcement.edit', compact('announcement'));
    }

    public function render()
    {
        $announcement = $this->announcement;
        return view('livewire.edit-announcement', compact('announcement'));
    }
}
