<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Fonts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            div.navbar {
                position:fixed;
                background-color:lightgray;
                width:100vw;
                display:flex;
                justify-content:center;
                z-index:1;
            }

            a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            table {
                width:50vw;
            }

            th {
                border:solid;
                border-width:1px;
                border-color:#636b6f;
                border-radius:5px;
            }

            td {
                border-left:solid;
                border-right:solid;
                border-width:1px;
                border-color:#636b6f;
            }

            .form-group {
               display:flex;
            }
            
            .textbox {
                border-radius:10px;
                padding:10px;
                border:solid;
                border-color:#636b6f;
                border-width:1px;
                
            }

            .button {
                border-radius:10px;
                border:none;
                background-color:#636b6f;
                padding:10px;
                font-family: 'Nunito', sans-serif;
                font-weight: bold;
                color:white;
            }

            .button:active {
                border-radius:10px;
                border:none;
                background-color:white;
                padding:10px;
                font-family: 'Nunito', sans-serif;
                font-weight: bold;
                color:#636b6f;               
            }

            .tbl-button {
                border-radius:5px;
                border:none;
                background-color:#636b6f;
                padding:5px;
                font-family: 'Nunito', sans-serif;
                font-weight: bold;
                color:white;
                padding-top:1px;
                padding-bottom:1px;
            }

            .tbl-button:active {
                border-radius:5px;
                border:none;
                background-color:white;
                padding:5px;
                font-family: 'Nunito', sans-serif;
                font-weight: bold;
                color:#636b6f;       
                padding-top:1px;
                padding-bottom:1px;        
            }

            .card {
                border-radius:5px;
                border:solid;
                border-width:1px;
            }

            .card-header {
                background-color: grey;
                color:white;
                font-size:20px;
            }

            .card-body {
                padding:20px;
            }
            

          
        </style>
    </head>
    <body>
        <div class="navbar">
            <div class="links">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ route('home') }}">HOME</a>

                        <a href="
                            @can('login-admins'){{ route('admin.personal') }} @endcan
                            @can('login-employees'){{route('employee.personal')}} @endcan
                        ">MY PROFILE</a>
                      
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('LOGOUT') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                          
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
               
            @endif
            </div>
        </div>
     

        <div class="flex-center position-ref full-height">
       

            <div class="content">
                <div class="title m-b-md">
                   
                </div>

                <div class="container">
                    @yield('content')
                </div>

            </div>
        </div>
    </body>
    
    <footer>
 
    </footer>
</html>
