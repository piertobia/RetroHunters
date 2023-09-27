<a href="{{ route('announcement.show', compact('announcement')) }}">
    <div class="card">
        <img class="btnGB" src="/media/plus.png">
        <div class="btnGB2"></div>
        <div class="btnGB2_2"></div>
        <div class="mx-auto">
            <div class="card__img"
                style="background-image: url('{{ $announcement->images()->get()->isNotEmpty() ? Storage::url($announcement->images()->first()->getUrl(250, 300)) : Storage::url('images/default.jpg') }}');background-size:cover">
            </div>
        </div>
        <div class="card__title" >{{ $announcement->title }}</div>
        <div class="card__subtitle">
            <a href="{{ route('platformIndex', compact('announcement')) }}">{{ $announcement->platform }}</a>
            -
            <a href="{{ route('categoryIndex', $announcement->category->id) }}">{{ $announcement->category->name }}</a>
        </div>
        <hr>

        <div class="card__wrapper">
            <div class="card__wrapper_info">
                <div class="card__subtitle card__wrapper_info">{{ $announcement->developer }} </div>
                <div class="card__subtitle card__wrapper_info">{{ $announcement->publisher }} </div>
            </div>
            <div class="card__price">{{ $announcement->price }}€</div>
        </div>
    </div>
</a>
