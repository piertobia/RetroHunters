<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use App\Jobs\WatermarkImage;
use App\Models\Announcement;
use Livewire\WithFileUploads;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CreateAnnouncement extends Component
{
    use WithFileUploads;

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

    protected $rules = [
        'title' => 'required|min:2|max:100',
        'body' => 'required|min:20|max:3000',
        'price' => 'required|numeric',
        'developer' => 'required|min:2|max:35',
        'publisher' => 'required|min:2|max:35',
        'platform' => 'required|min:2|max:15',
        'category' => 'required',
        'images.*' => 'image|max:1024',
        'temporary_images.*' => 'image|max:1024'
    ];

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

    public function store(){

        $this->validate();

        $category = Category::find($this->category);
        $this->announcement = $category->announcements()->create([
            'title'=>$this->title,
           'body'=>$this->body,
           'platform' =>$this->platform,
           'price'=>$this->price,
           'developer'=>$this->developer,
           'publisher'=>$this->publisher
        ]);

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
        Auth::user()->announcements()->save($this->announcement);

        $this->reset();
        return redirect()->route('home')->with('message', 'Annuncio creato con successo');
    }

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.create-announcement');
    }
}
