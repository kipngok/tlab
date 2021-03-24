<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>COUNTERFAIT</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Allerta&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
</style>
 <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body style="background-color: #ecf0f5">

    <nav class="navbar navbar-expand-md navbar-light bg-light" style="z-index: 1;" >
         <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'COUNTERFEIT') }}
                </a>
       <!--   <a class="navbar-brand" href="{{ url('/') }}" style="padding: 0px;">
                    <img src="{{ asset('img/hotlunch2.png') }}" alt="HOTLUNCH" style="height:60px;">
                </a> -->
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            <div class="navbar-nav">
               
          <!--   <ul class="navbar-nav only-mobile">
     <li><a href="/" class="navio"> Dashboard</a></li>
      <li><a href="/income" class="navio"> Income</a></li>
      <li><a href="/expense" class="navio"> Products</a></li>
      <li><a href="/payment" class="navio"> Payments</a></li>
      
  
      <li  class="nav-item"><a href="/user" class="nav-link">Users</a></li>
     
    </ul> -->
    <ul class="navbar-nav only-mobile">
      <li><a href="/" class="navio"><i class="fa fa-tachometer" aria-hidden="true" fa-3x></i>&nbsp; Dashboard</a></li>
        <li data-toggle="collapse" data-target="#products" class="navio"><i class="fa fa-product-hunt" aria-hidden="true"fa-3x></i>&nbsp; Products
   <span class="arrow"></span></li>
    <ul class="sub-menu collapse" id="products">
     <a href="/product" class="navio" style="width: 110% ; margin-left: -10%"><i class="fa fa-product-hunt" aria-hidden="true"fa-3x></i>&nbsp;Catalog
     </a>
     <a href="#" class="navio" style="width: 110% ; margin-left: -10%"><i class="fa fa-tag" aria-hidden="true"fa-3x></i>&nbsp;
      Categories
     </a>
      <a href="/code" class="navio" style="width: 110% ; margin-left:-10%"><i class="fa fa-code" aria-hidden="true"fa-3x></i>&nbsp;
     Code
    </a>
       </ul>
    
     
       <li><a href="/notification" class="navio"><i class="fa fa-bell" aria-hidden="true" fa-3x></i>&nbsp;Notification</a></li>
       <li><a href="/" class="navio"><i class="fa fa-file" aria-hidden="true" fa-3x></i>&nbsp;Report</a></li>
      <li><a href="/customer" class="navio"><i class="fa fa-users" aria-hidden="true"fa-3x></i>&nbsp;Customer</a></li>
      <li  data-toggle="collapse" data-target="#facilities" class="navio">
        <i class="fa fa-cog" aria-hidden="true" fa-3x></i>&nbsp;
      Settings 
      <span class="arrow"></span>
      </li>
      <ul class="sub-menu collapse" id="facilities">
      <a href="/company" class="navio" style="width: 110% ; margin-left: -10%"><i class="fa fa-building-o" aria-hidden="true" fa-3x></i>&nbsp;Company</a>
      <a href="/user" class="navio" style="width: 110% ; margin-left: -10%"><i class="fa fa-user" aria-hidden="true" fa-3x></i>&nbsp;Users</a>
      
                   </ul>
    
  </ul>

        </div>
            <div class="navbar-nav">
                 <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
            </div>
        </div>
    </nav>

    <div class="main-content">
                <div class="sidebar">
                    @include('includes.sidebar')
                </div>
              <div class="cont">
                  <div style="min-height: calc(100vh - 150px)">
                    @yield('content')
                  </div>
                    <div class="row footer">
                   <!--    <div class="col-sm-6">
                      Copyright  &copy; {{date('Y')}} CAD Services LTD. 
                    </div> -->
                    <div class="col-sm-6" style="text-align: right;"> System developed by <a href="https://kenni.hypersoft.co.ke" target="_blank">Kenneth Technologies LTD</a></div>
                    </div>
                </div>
            </div>

@yield('scripts')
</body>
<style type="text/css">
   
</style>
</html>                            