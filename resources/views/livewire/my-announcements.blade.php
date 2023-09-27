<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h2>{{ __('ui.recapAnn') }}{{ $user->name }}</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12 overflow-auto">
            <table class="table tableRevisor table-hover">
                <thead class="table-light">
                    <tr>
                        <th scope="col">{{__('ui.title')}}</th>
                        <th scope="col">{{__('ui.platform')}}</th>
                        <th scope="col">{{__('ui.genre')}}</th>
                        <th scope="col">{{__('ui.price')}}</th>
                        <th scope="col">{{__('ui.developer')}}</th>
                        <th scope="col">{{__('ui.published')}}</th>
                        <th scope="col">{{__('ui.revStatus')}}</th>
                        <th scope="col">{{__('ui.actions')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user->announcements as $announcement)
                        <tr>
                            <td scope="row">{{ $announcement->title }}</th>
                            <td>{{ $announcement->platform }}</td>
                            <td>{{ $announcement->category->name }}</td>
                            <td>{{ $announcement->price }}</td>
                            <td>{{ $announcement->developer }}</td>
                            <td>{{ $announcement->publisher }}</td>
                            <td>
                                @if ($announcement->is_accepted === 0)
                                    <span class="text-danger d-flex justify-content-center fas fa-circle">
                                    @elseif ($announcement->is_accepted === 1)
                                        <span class="text-success d-flex justify-content-center fas fa-circle">
                                        @else
                                            <span class="text-secondary d-flex justify-content-center fas fa-circle">
                                @endif
                            </td>
                            <td>
                                <a href="{{route('announcement.edit', $announcement)}}" 
                                    wire:click=""><svg xmlns="http://www.w3.org/2000/svg" style="color:gray" width="23" height="23" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                      </svg></a>
                                <a class="ms-3" wire:click="destroy({{ $announcement->id }})"><svg xmlns="http://www.w3.org/2000/svg" style="color:red" width="23" height="23" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                      </svg></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
