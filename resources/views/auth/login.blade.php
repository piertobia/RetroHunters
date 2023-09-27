<x-layout>
    <x-slot name="title">
        Login
    </x-slot>
    <div class="container mt-5 pt-5 ">
        <div class="row justify-content-center">
         <h2 class="text-center my-4">Login</h2>
            <div class="col-12 col-md-8 boxLog mx-2 mx-md-0 p-3 login-custom">
               <img src="/media/plus.png" class="btnConsolePlusSX" alt="">
               <a href="#"  onclick="event.preventDefault();getElementById('form-login').submit()"><div class="btnConsoleSmallA">A</div></a>
               <div class="btnConsoleSmallB">B</div>
               <div class="btnConsoleSmallX">X</div>
               <div class="btnConsoleSmallY">Y</div>

               <div class="btnConsoleSX"></div>
               <div class="btnConsoleDX"></div>

                <div class="boxDisplay">
                   <form action="{{route('login')}}" method="POST" id="form-login" class="bg-dark form text-center">
                       @csrf
                         <div class="form-group ">
                            <label class="form_label fs-3 text-white rounded-pill">Email</label>
                            <input type="email" class="form-control" name="email">
                         </div>
                         <div class="form-group">
                            <label class="form_label fs-3 text-white rounded-pill">Password</label>
                            <input type="password" class="form-control" name="password">
                         </div>
                         <button type="submit" class="col-5 btn btn-success my-3 fs-6" role="button">{{ __('ui.login')}}</button>
                         <div class="text-white label" for="">{{__('ui.clickA')}}</div>

                      </form>
                </div>
            </div>
            <p class="text-center mt-2">{{ __('ui.noAccount')}} <a class="linkLog" href="{{route('register')}}"> {{ __('ui.registered')}}</a></p>
        </div>
        <div class="row">
        </div>
    </div>
</x-layout>