<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <meta name="csrf-token" content="{{ csrf_token() }}">


</head>
<body dir="rtl">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <img src="/images/logo.jpg" class="img-responsive" alt="El-Baz Logo" width="90" height="90" class="d-inline-block align-top">
        <a class="navbar-brand" href="#">شركة الباز للبرمجيات</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active" width="90">
                <a class="nav-link"  href="{{ url('/dashboard') }}">الصفحة الرئيسية </a>
                </li>
                <li class="nav-item">
                <a class="nav-link"  href="{{ url('/create') }}">إضافة موظف</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="{{ url('/search') }}" method="post">
                @csrf
                <input class="form-control mr-sm-2" type="text" placeholder="بحث عن موظف" name="workerName" aria-label="Search">
            </form>

            <ul class="navbar-nav mr-100" style="padding-right: 200px;" >
                    
                <!-- Authentication Links -->
                @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif
                                
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="margin-right: 130px;">
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" >
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    </div>
                </li>
                @endguest
            </ul>
          
        </div>
    </nav>

</body>
</html>
