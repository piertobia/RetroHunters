<x-layout>
  <x-slot name="title">
    {{ __('ui.registered')}}
  </x-slot>
  <div class="container mt-5 ">
      <div class="row justify-content-center">
       <h2 class="text-center my-4">{{ __('ui.registered')}}</h2>
          <div class="col-12 col-md-8 boxLog mx-2 mx-md-0 p-3 login-custom">
             <img src="/media/plus.png" class="btnConsolePlusSX" alt="">
             <a href="#"  onclick="event.preventDefault();getElementById('form-register').submit()"><div class="btnConsoleSmallA">A</div></a>
             <div class="btnConsoleSmallB">B</div>
             <div class="btnConsoleSmallX">X</div>
             <div class="btnConsoleSmallY">Y</div>

             <div class="btnConsoleSX"></div>
             <div class="btnConsoleDX"></div>

              <div class="boxDisplay">
                 <form action="{{route('register')}}" method="POST" id="form-register" class="bg-dark form text-center">
                     @csrf
                       <div class="form-group ">
                          <label class="form_label text-white rounded-pill">{{ __('ui.name')}}</label>
                          <input type="name" class="form-control" name="name">
                       </div>
                       <div class="form-group ">
                        <label class="form_label text-white rounded-pill">Email</label>
                        <input type="email" class="form-control" name="email">
                     </div>
                       <div class="form-group">
                          <label class="form_label text-white rounded-pill">Password</label>
                          <input type="password" class="form-control" name="password">
                       </div>
                       <div class="form-group">
                        <label class="form_label text-white rounded-pill">{{ __('ui.confirmPsw')}}</label>
                        <input type="password" class="form-control" name="password_confirmation">
                     </div>
                       <button type="submit" class="col-5 btn btn-success my-3 fs-6" role="button">{{ __('ui.registered')}}</button>
                       <div class="text-white label" for="">{{__('ui.clickA')}}</div>

                    </form>
              </div>
          </div>
          <p class="text-center mt-2">{{ __('ui.noAccount')}} <a class="linkLog" href="{{route('register')}}"> {{ __('ui.registered')}}</a></p>
      </div>
  </div>
</x-layout>




______________
<x-layout>
    <x-slot name="title">
    {{ __('ui.registered')}}
    </x-slot>
    <div class="container mt-5">
        <div class="row justify-content-center">
          <div class="col-8 bd-register">
            <h2 class="text-center text-primary my-5">{{ __('ui.registered')}}</h2>
          </div>
          <div class="col-12 col-md-7 mx-2 mx-md-0 p-3 register-custom mt-5 rounded-pill">
                <form method="POST" action="{{route('register')}}" class="d-flex flex-column align-items-center">
                  @csrf
                    <div class="form-group">
                       <label class="bg-color2 rounded-pill fs-4">-{{ __('ui.name')}}-</label>
                       <input type="text" class="form-control" name="name">
                         @error('name')
                           <div class="text-danger">{{ $message }}</div>
                         @enderror
                    </div>
                    <div class="form-group">
                       <label class="bg-color2 rounded-pill fs-4">-Email-</label>
                       <input type="text" class="form-control" name="email">
                         @error('email')
                           <div class="text-danger">{{ $message }}</div>
                         @enderror
                    </div>
                    <div class="form-group">
                       <label class="bg-color2 rounded-pill fs-4">-Password-</label>
                       <input type="password" class="form-control" name="password">
                         @error('password')
                           <div class="text-danger">{{ $message }}</div>
                         @enderror
                    </div>
                    <div class="form-group">
                       <label class="bg-color2 rounded-pill fs-4">-{{ __('ui.confirmPsw')}}-</label>
                       <input type="password" class="form-control" name="password_confirmation">
                    </div>
                    <button type="submit" class="col-5 button-894 my-3 fs-6" role="button">{{ __('ui.registered')}}</button>
                 </form>
            </div>
            <p class="text-center mt-2">{{ __('ui.haveAccount')}}<a class="linkLog" href="{{route('login')}}">{{ __('ui.login')}}</a></p>
          </div>
        </div>
    </div>
    <div class="container h-50 d-inline-block"></div>
  
</x-layout>
