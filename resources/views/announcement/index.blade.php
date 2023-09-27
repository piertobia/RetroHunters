<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-4 mt-5 text-blue border-index">
            <p class="h3 my-3">{{ __('ui.allAnnouncements')}}</p>
            </div>
        </div>
        <div class="row mb-5">
            @forelse($announcements as $announcement)
                <div class="col-12 col-md-6 col-lg-4 mt-5 d-flex justify-content-center">
                    <x-card-announcement :announcement="$announcement" />
                </div>
            @empty
                <div class="col-12">
                    <div class="my-3">
                        <p>{{ __('ui.noAnnouncements')}}</p>
                        <a href="{{ route('announcement.create') }}">{{ __('ui.addYou')}}</a>
                    </div>
                </div>
            @endforelse
            <div class="container">
                <div class="row mt-5 justify-content-center">
                        <div class="col-2">{{ $announcements->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
