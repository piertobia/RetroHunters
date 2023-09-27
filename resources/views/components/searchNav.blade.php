<div class="container   ">
    <div class="row justify-content-center">
        <div class="col-12  ">
            <form class="search" action="{{route('announcements.search')}}" method="GET">
                <input id="inputSearch" type="search" name="searched" class="d-none searchTerm" placeholder="{{ __('ui.search')}}">
                <button id="btnSearch" type="submit" class="d-none searchButton">
                    <i class="fa fa-search"></i>
                </button>
                <div id='btnviewSearch' type="" class="pt-2 searchButton">
                    <i id="iconbtn" class="fa ms-2 fa-search"></i>
                </div>
            </form>
        </div>
    </div>
</div>
 