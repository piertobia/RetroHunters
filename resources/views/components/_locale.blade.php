<form action="{{route('setLocale', $lang)}}" method="POST">
    @csrf
    <button type="submit" class="btn">
        <img src="{{asset('/media/'  .$lang . '.jpeg')}}" class="imgLeng"/>
    </button>
</form>
