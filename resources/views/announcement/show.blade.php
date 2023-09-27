<x-layout>

    <div class="container">
        <div class="row ">
            <div class=" col-12 col-md-6">
                <div id="myCarousel" class="carousel slide p-5" data-ride="carousel">
                    @if ($announcement->images->isNotEmpty())                        
                        <div class="carousel-inner">
                            @foreach ($announcement->images as $image)
                                <div class="carousel-item {{$loop->first ? 'active' : ''}}">
                                    <img src="{{ Storage::url($image->getUrl(250, 300)) }}"
                                    width="100%"  alt="{{ $announcement->title }}">
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel"
                            data-bs-slide="prev">
                            <span class="" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="26" height="26" style="color: black" fill="currentColor"
                                    class="bi bi-caret-left-fill" viewBox="0 0 16 16">
                                    <path
                                        d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z" />
                                </svg></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel"
                            data-bs-slide="next">
                            <span class="" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="26" height="26" style="color: black" fill="currentColor"
                                    class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                                    <path
                                        d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                                </svg></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    @else
                    @endif
                    <p class='mx-auto fontCreateAt mt-3'>{{ __('ui.createdBy') }} : <a
                            href="{{ route('userIndex', $announcement->user->id) }}">{{ $announcement->user->name }}</a>
                        {{__('ui.il')}} {{ $announcement->created_at->format('d/m/Y H:i') }} </p>
                </div>
            </div>

            <div class="col-6 d-flex flex-column  justify-content-center ps-lg-5">
                <h2 class=" my-3">{{ $announcement->title }}</h2>
                {{ __('ui.plot') }} : <p class="pt-2" style="min-height: 150px">{{ $announcement->body }}</p>
                {{ __('ui.price') }}<p class="fs-3 ">{{ $announcement->price }} €</p>

            </div>
        </div>
        <div class="row justify-content-center px-md-5">
            <div class="col-12 px-md-5">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                            data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane"
                            aria-selected="true">{{ __('ui.details') }}</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active p-4" id="home-tab-pane" role="tabpanel"
                        aria-labelledby="home-tab" tabindex="0">
                        <p>{{ __('ui.genreCreate') }} : <a
                                href="{{ route('categoryIndex', $announcement->category->id) }}">{{ $announcement->category->name }}</a>
                        </p>
                        <p> {{ __('ui.platform') }} : <a
                                href="{{ route('platformIndex', compact('announcement')) }}">{{ $announcement->platform }}</a>
                        </p>
                        <p>{{ __('ui.developer') }} : {{ $announcement->developer }}</p>
                        <p>{{ __('ui.published') }} : {{ $announcement->publisher }}</p>
                    </div>
                    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
                        tabindex="0">...</div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
