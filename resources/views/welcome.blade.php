@if(Auth::check())
    <script>window.location = "/home";</script>
@else
<title>ObjectSys</title>

<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
<div class="container">
    <div class="row">
        <div class="md-10 col-12">
            <img class="img_logo_welcome" src="images/logo_big.png" alt="">
        </div>
      
       <div class="col-12">
          <a href="{{ route('login') }}" class="entrar_button btn btn-primary btn-lg">Login</a>
       </div>
        
        
    </div>
</div>
@endcan