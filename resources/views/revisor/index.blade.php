<x-layout>

    @if ($announcement_to_check)
        <div class="container mt-5 mb-3">
            <div class="row">
                <h2 class="mt-5">
                    {{ __('ui.revTitle') }} {{ $announcement_to_check->title }}
                </h2>
                <div class="col-12 col-md-6">
                    <div id="myCarousel" class="carousel slide p-5" data-ride="carousel">
                        @if ($announcement_to_check->images->isNotEmpty())
                            <div class="carousel-inner">
                                @foreach ($announcement_to_check->images as $image)
                                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                        <img src="{{ Storage::url($image->getUrl(250, 300)) }}" width="100%"
                                            alt="{{ $announcement_to_check->title }}">
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
                        <p class="card-text">{{ __('ui.createdBy') }} {{ $announcement_to_check->user->name ?? '' }} {{__('ui.il')}}
                            {{ $announcement_to_check->created_at->format('d/m/Y H:i') }}</p>
                    </div>
                </div>
                <div class="col-12 col-md-6 p-md-5">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                data-bs-target="#home-tab-pane" type="button" role="tab"
                                aria-controls="home-tab-pane" aria-selected="true">{{ __('ui.details') }}</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="tags-tab" data-bs-toggle="tab" data-bs-target="#tags-tab-pane"
                                type="button" role="tab" aria-controls="profile-tab-pane"
                                aria-selected="false">Tags</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="revisor-tab" data-bs-toggle="tab"
                                data-bs-target="#revisor-tab-pane" type="button" role="tab"
                                aria-controls="contact-tab-pane" aria-selected="false">{{__('ui.imgRev')}}</button>
                        </li>
                    </ul>
                    <div class="tab-content p-md-4" id="myTabContent">
                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                            aria-labelledby="home-tab" tabindex="0">
                            <div class="card-body ">
                                <h5 class="card-title">{{ $announcement_to_check->title }}</h5>
                                <p class="card-text">{{ $announcement_to_check->category->name }}</p>
                                <p class="card-text">{{ $announcement_to_check->body }}</p>
                                <p class="card-text">{{ __('ui.developer') }} {{ $announcement_to_check->developer }}</p>
                                <p class="card-text">{{ __('ui.published') }} {{ $announcement_to_check->publisher }}</p>
                                <div class="card__price">{{ $announcement_to_check->price }}€</div>
                                <span class="card-footer d-flex mt-5">
                                    <form
                                        action="{{ route('revisor.accept_announcement', ['announcement' => $announcement_to_check]) }}"
                                        method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-success mx-1">{{__('ui.accept')}}</button>
                                    </form>
                                    <form
                                        action="{{ route('revisor.reject_announcement', ['announcement' => $announcement_to_check]) }}"
                                        method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-danger mx-1">{{__('ui.refuse')}}</button>
                                    </form>

                                </span>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tags-tab-pane" role="tabpanel" aria-labelledby="tags-tab"
                            tabindex="0">
                            <div class="col-12">
                                <div class="p-2">
                                    @if (!empty($image->labels))
                                        @foreach ($image->labels as $label)
                                            <span
                                                class="badge rounded-pill text-bg-secondary">#{{ $label }}</span>
                                        @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="revisor-tab-pane" role="tabpanel"
                            aria-labelledby="revisor-tab" tabindex="0">
                            <div class="col-12">
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">{{__('ui.type')}}</th>
                                                <th scope="col">{{__('ui.esito')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{__('ui.explicit')}}</td>
                                                <td><span class="{{ $image->adult }}"></span></td>
                                            </tr>
                                            <tr>
                                                <td>{{__('ui.parody')}}</td>
                                                <td><span class="{{ $image->spoof }}"></span></td>
                                            </tr>
                                            <tr>
                                                <td>{{__('ui.medical')}}</td>
                                                <td><span class="{{ $image->medical }}"></span></td>
                                            </tr>
                                            <tr>
                                                <td>{{__('ui.violence')}}:</td>
                                                <td><span class="{{ $image->violence }}"></span></td>
                                            </tr>
                                            <tr>
                                                <td>{{__('ui.racy')}}</td>
                                                <td><span class="{{ $image->racy }}"></span></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="tab-pane fade p-4" id="revisor-tab-pane" role="tabpanel" aria-labelledby="revisor-tab"
            tabindex="0">
            {{-- <p>Esplicito: <span class="{{ $image->adult }}"></span></p>
        <p>Parodia: <span class="{{ $image->spoof }}"></span></p>
        <p>Medicina: <span class="{{ $image->medical }}"></span></p>
        <p>Violenza: <span class="{{ $image->violence }}"></span></p>
        <p>Erotico: <span class="{{ $image->racy }}"></span></p> --}}
        </div>
    @else
        <div class="container my-3">
            <div class="row row_revisor">
                <div class="col-12">
                    <h2>
                        {{__('ui.noData')}}
                    </h2>
                </div>
            </div>
        </div>
    @endif
@else
    <div class="container my-3">
        <div class="row row_revisor">
            <div class="col-12">
                <h2>
                    {{__('ui.noArticle')}}
                </h2>
            </div>
        </div>
    </div>
    @endif
    @if ($announcement_to_undo)
        <div class="container">
            <div class="row ">
                <div class="col-12 overflow-auto">
                    <table class="table ">
                        <thead>
                            <h2>{{__('ui.log')}} </h2>
                            <tr>
                                <th scope="col">{{__('ui.title')}}</th>
                                <th scope="col">{{__('ui.plot')}}</th>
                                <th scope="col">{{__('ui.revOn')}} </th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">{{ $announcement_to_undo->title }}</th>
                                <td>{{ $announcement_to_undo->body }}</td>
                                <td>{{ $announcement_to_undo->updated_at->format('d/m/Y H:i') }}</td>
                                <td>
                                    <button onclick="document.getElementById('formUndo').submit()" type="submit"
                                        class="btn btn-primary mx-1">{{__('ui.undoRev')}}</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <form id="formUndo"
                        action="{{ route('revisor.undo_announcement', ['announcement' => $announcement_to_undo]) }}"
                        method="POST">
                        @csrf
                        @method('PATCH')
                    </form>

                </div>
            </div>
        </div>
    @endif
</x-layout>
