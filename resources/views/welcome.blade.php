<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            .hidden{
                 width: 100%;
                 padding: 15px 0px 15px 15px;
                 background-color: grey;
            }
            .hidden a{
              text-decoration: none;
              color: #ffcecefc;
              
            }
            .hidden a:hover{
                color: #a8e7fffc;
                font-weight: bold;
            }
        </style>
 
        <style>
            *{
                margin: 0px;
            }
            body {
                font-family: 'Nunito';
                background-color: #22272b;
            }
            .welcome{
                color: white;
                text-align: center;
                 font-size: xx-large;
            }
            .read{
                color: white;
                font-size: x-large;
            }
            .read span a{
                text-decoration: none;
                color: #e9ffb4;
            }
            .read span a:hover{
                color: #c6ffc6;
                font-weight: bold;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">| Register</a>
                        @endif
                    @endif         
                </div>
                <hr>
            @endif

        </div>
        <div class="welcome">WELCOME TO YOU MARKET!</div>
       <br><br> <div class="read">
<h3>Suzanne Woolley and Jeremy Herron, with Dani Burger</h3> 
Was it the computers or the humans? The blame game is on for the wild stock market rout of Monday, Feb. 5, when the Dow Jones industrial average plunged 1,175 points before climbing part of the way back the following day. Some likely suspects: hyperspeed algorithmic trading and a Wall Street stew of complex products that bet on volatility. Another: a record amount of money that has poured into stock funds recently from individuals. Maybe their late arrival—years into a bull market— finally pushed stocks up too high.

There was already selling the Friday before, when a strong jobs report stoked fear that a hotter economy could spur the pace of Federal Reserve interest rate hikes. Higher borrowing costs, the thinking went, would crimp profit margins at companies and sap consumer spending power. For Monday, though, there was no such tidy explanation. No big economic data releases, good or bad. No confidence- shattering earnings reports or geopolitical concerns. Just, apparently, an oldfashioned market freakout, fueled by anxiety among investors accustomed to stocks going in only one direction and traders who had bet on a continuation of the long stretch of low volatility.. ,HAVE A GREAT TIME WITH US :)
<span><a href="/home">=>CONTINUE</a></span></div>

    </body>
</html>
