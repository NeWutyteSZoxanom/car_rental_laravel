

<!DOCTYPE html>
     <html class="no-js lt-ie9 lt-ie8 lt-ie7"> 
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <!--<html class="no-js"> --><!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
          <title>{{config('app.name', 'ProJ')}}</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('js/vendor/modernizr-2.6.2.min.js') }}">

        <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
    </head>
    <body>
      

        <div id="wrapper">
            <header>
                
                <section id="action-bar">
                    <div id="logo">
                        <a href="/"><span id="logo-accent">Car</span>Rental</a>
                    </div>
                    
                                        <div id="user-menu">

                        
                        
                        <nav id="signin" class="dropdown">
                               
                        
                            <nav class="dropdown">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <img src="../img/user-icon.gif" alt="Sign In" >
                                            <img src="../img/down-arrow.gif" alt="Sign In" >
                                        </a>
                                        <ul style="padding-right: 15px; ">
                                            @guest
                                                <li>
                                                    <a href="{{route('login')}}">Войти 
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{route('register')}}">Регистрация
                                                    </a>
                                                </li>
                                            
                                            @else
                                            <li >
                                                    <a href="#" >История сдело
                                                    </a>
                                            </li>

                                            <li >
                                            
                                                <a style="padding-left: 10px; text-align: left; border-radius: 3px;display: block; width: 100%;"href="{{route('logout')}}" onclick="event.preventDefault();
                                            document.getElementById('logout_form').submit();">Logout</a>


                                                <form id="logout_form" action="{{route('logout')}}" method="POST" >{{ csrf_field() }}
                                                </form>
                                            </li>
                                            @if(Auth::user()->admin == 1) 
                                                <li>
                                                    <a href="{{route('vid')}}" > Виды Авто
                                                    </a>
                                                </li>
                                            @endif
                                             @endguest
                                        </ul>

                                        
                                     </li>
                                </ul>
                            </nav>

                       
                            
                     </nav>   
                    </div>
                    
                </section>
            </header>  


            @yield('promo')


            <section id="main-content" class="clearfix">
                

                <section id="signin-form">
        <h1>Авторизация</h1>
        

        <form action="{{ route('login') }}"  method="POST">
            {{ csrf_field() }}
            <p>
                <a >
                    <img src="img/email.gif" alt="Email Address">
                </a>
               
                <input type="email" name="email" id="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            </p>
            
                
            <p>
                <a >
                    <img src="img/password.gif" alt="Password">
                </a>
                
                <input type="password" name="password" id="password" value="{{ old('password') }}" required autocomplete="password" autofocus>

            </p>
                <input class='secondary-cart-btn' style="padding-right: 90px ; color: #fff;"  type="submit" value="
                ВОЙТИ" >
            
        </form>
    </section><!-- end signin-form -->
    <section id="signup" style="padding-top: 50px">
        <h2>Я тут в первые</h2>
        <h3>Вы можете создать аккаунт.<br>
            Кликайте сюда.</h3>
        <a class='default-btn' href="{{route('register')}}">СОЗДАТЬ НОВЫЙ АККАУНТ
                                            </a>
        
    </section><!--- end signup -->
            </section><!-- end main-content -->

            @yield('pagination')        
        </div>
        <footer>
                

                <hr />

                <section id="links">
                    <div id="my-account">
                        <h4>MY ACCOUNT</h4>
                        <ul>
                            <li><a href="{{route('login')}}">Войти
                                            </a></li>
                            <li><a href="{{route('register')}}">Регистрация
                                            </a></li>
                           
                            <!--li><a href="store/cart">Shopping Cart</a></li-->
                        </ul>
                    </div><!-- end my-account -->
                       <div id="info">
                        <h4>INFORMATION</h4>
                        <ul>
                            <li><a href="#">Terms of Use</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div><!-- end info -->
                    <div id="extras">
                        <h4>EXTRAS</h4>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="{{route('register')}}">Регистрация
                                            </a></li>
                        </ul>
                    </div><!-- end extras -->
                </section><!-- end links -->

                <hr />
                
                <section class="clearfix"  style="padding-left: 150px">
                    <div id="copyright">
                        <div id="logo">
                            <a href="/"><span id="logo-accent">Car</span>Rental</a>
                        </div><!-- end logo -->
                        <p id="store-desc">This is a short description of the company.</p>
                        <p id="store-copy">&copy; 2014 CarRental</p>
                    </div><!-- end copyright -->
                    <div id="connect">
                        <h4>CONNECT WITH US</h4>
                        <ul>
                            <li class="twitter"><a href="#">Twitter</a></li>
                            <li class="fb"><a href="#">Facebook</a></li>
                        </ul>
                    </div><!-- end connect -->
                    <div id="payments">
                        <h4>SUPPORTED PAYMENT METHODS</h4>
                        
                        <img src="img/payment-methods.gif" alt="Supported Payment Methods" >
                    </div><!-- end payments -->
                </section>
               
            </footer>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>








        
        <link rel="stylesheet" href="{{ asset('js/vendor/jquery-1.9.1.min.js') }}">
        <link rel="stylesheet" href="{{ asset('js/plugins.js') }}">
        <link rel="stylesheet" href="{{ asset('js/main.js') }}">





        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src='//www.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>
