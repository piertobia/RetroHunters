<x-layout>
  <x-masthead/>
    
    <div class="container mt-3">
        <div class="row">
          <div class="col-4 border-index">
            <h3 class="my-4 text-blue text-center">{{ __('ui.lastSixAnnouncements')}}:</h3>
          </div>
          
          <div class="col-12">
              <div class="row align-items-center">
                @foreach($announcements as $announcement)
                 <div class="col-12 col-md-6 col-lg-4 mt-5 d-flex justify-content-center">                
                   <x-card-announcement :announcement="$announcement"/>              
                 </div>
                @endforeach
              </div>
          </div>
        </div>
        
    </div>
</x-layout>