<x-layout>
    {{-- <div id="containerForm" class="container-fluid">
        <div class="row justify-content-center">
            <h2 class="text-center text-primary mt-5">{{__('ui.join')}}</h2>
        </div>
    </div>
    <div class="col-12 p-3">
      <form action="{{route('become.revisor', Auth::user())}}" method="get" class="contact-form row justify-content-center align-items-center">
        @csrf
        <div class="col-12 col-lg-6">
           <label class="text-primary mt-3 mb-2">{{__('ui.sendCurriculum')}} </label>
           <textarea id="message" name= "presentation_message" class="input-text" type="text"  required></textarea>
          @error('presentation_message')
           {{ $message }}
          @enderror
        </div>
        <div class="row align-items-center justify-content-center">
           <button class=" col-4 col-md-1 button-892 text-dark" role="button">{{ __('ui.summit') }}</button>
        </div>
      </form>
    </div>
    
    <form action="{{route('become.revisor', Auth::user())}}" method="get" class="contact-form row justify-content-center align-items-center">
      @csrf
      <div class="col-lg-6">
         <label class="text-primary mt-3 mb-2">{{__('ui.sendCurriculum')}} </label>
         <textarea id="message" name= "presentation_message" class="input-text" type="text" required></textarea>
        @error('presentation_message')
         {{ $message }}
        @enderror
      </div>
      <div class="row align-items-center justify-content-center">
         <button class=" col-4 col-md-1 button-892 text-dark" role="button">{{ __('ui.summit') }}</button>
      </div>
    </form> --}}

    <div id="containerForm" class="container-fluid mt-5">
      <div class="row justify-content-center">
          <div id="boxform" class="col-12 boxform col-xl-6 ">
            <form action="{{route('become.revisor', Auth::user())}}" method="get" class="contact-form row justify-content-center align-items-center">
              @csrf
              <div class="col-12">
                 <label class="form-label text-primary">{{__('ui.sendCurriculum')}} </label>
                 <textarea id="message" name= "presentation_message" class="form-control border border-warning w-100" type="text" required></textarea>
                @error('presentation_message')
                 {{ $message }}
                @enderror
              </div>
              <div class="row align-items-center justify-content-center">
                 <button class="button-892 text-dark w-25" role="button">{{ __('ui.summit') }}</button>
              </div>
            </form>
          </div>
      </div>
    </div>
</x-layout>