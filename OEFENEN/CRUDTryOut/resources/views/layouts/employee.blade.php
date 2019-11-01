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

            .container-head {
                display:flex;
                justify-content:space-between;
            }

            .container-body {
                display:flex;
                justify-content:flex-start;
            }

            .form-group {
               display:flex;
               flex-direction:column;
               justify-content:
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

            .text-button {

            }

            .text-button:hover {
                color:black;
            }

            .card {
                border-radius:5px;
                border:solid;
                border-size:10px;
            }

            .card-header {
                background-color: grey;
                color:white;
                font-size:20px;
            }

            .card-body {
                padding:20px;
            }

            .filter {
                background-color:white;
                padding: 10px;
                margin:1px;
            }

            .filter:hover {
                background-color: #EBEBEB;
                padding: 10px;
                margin:1px;
            }
          
            /*------------------------------------------------*/
                    /* Dropdown container I found on w3schools*/
                    
                    /* The container <div> - needed to position the dropdown content */
                    .dropdown {
                    position: relative;
                    display: inline-block;
                    }

                    /* Dropdown Content (Hidden by Default) */
                    .dropdown-content {
                    display: none;
                    position: absolute;
                    background-color: #f1f1f1;
                    min-width: 160px;
                    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                    z-index: 1;
                    }

                    /* Links inside the dropdown */
                    .dropdown-content a {
                    color: black;
                    padding: 12px 16px;
                    text-decoration: none;
                    display: block;
                    }

                    /* Show the dropdown menu on hover */
                    .dropdown:hover .dropdown-content {display: block;}

            /*------------------------------------------------*/

            /* The switch - the box around the slider */
            .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
            }

            /* Hide default HTML checkbox */
            .switch input {
            opacity: 0;
            width: 0;
            height: 0;
            }

            /* The slider */
            .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
            border-radius: 34px;
            }

            .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
            border-radius: 50%;
            }

            input:checked + .slider {
            background-color: #2196F3;
            }

            input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
            }

            input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
            }


            /* PAGINATION STYLE */

                                      
            .pagination {
                        display: flex;
                        padding-left: 0;
                        list-style: none;
                        border-radius: 0.25rem;
                        }

                        .page-link {
                        position: relative;
                        display: block;
                        padding: 0.5rem 0.75rem;
                        margin-left: -1px;
                        line-height: 1.25;
                        color: #3490dc;
                        background-color: #fff;
                        border: 1px solid #dee2e6;
                        }

                        .page-link:hover {
                        z-index: 2;
                        color: #1d68a7;
                        text-decoration: none;
                        background-color: #e9ecef;
                        border-color: #dee2e6;
                        }

                        .page-link:focus {
                        z-index: 2;
                        outline: 0;
                        box-shadow: 0 0 0 0.2rem rgba(52, 144, 220, 0.25);
                        }

                        .page-item:first-child .page-link {
                        margin-left: 0;
                        border-top-left-radius: 0.25rem;
                        border-bottom-left-radius: 0.25rem;
                        }

                        .page-item:last-child .page-link {
                        border-top-right-radius: 0.25rem;
                        border-bottom-right-radius: 0.25rem;
                        }

                        .page-item.active .page-link {
                        z-index: 1;
                        color: #fff;
                        background-color: #3490dc;
                        border-color: #3490dc;
                        }

                        .page-item.disabled .page-link {
                        color: #6c757d;
                        pointer-events: none;
                        cursor: auto;
                        background-color: #fff;
                        border-color: #dee2e6;
                        }

                        .pagination-lg .page-link {
                        padding: 0.75rem 1.5rem;
                        font-size: 1.125rem;
                        line-height: 1.5;
                        }

                        .pagination-lg .page-item:first-child .page-link {
                        border-top-left-radius: 0.3rem;
                        border-bottom-left-radius: 0.3rem;
                        }

                        .pagination-lg .page-item:last-child .page-link {
                        border-top-right-radius: 0.3rem;
                        border-bottom-right-radius: 0.3rem;
                        }

                        .pagination-sm .page-link {
                        padding: 0.25rem 0.5rem;
                        font-size: 0.7875rem;
                        line-height: 1.5;
                        }

                        .pagination-sm .page-item:first-child .page-link {
                        border-top-left-radius: 0.2rem;
                        border-bottom-left-radius: 0.2rem;
                        }

                        .pagination-sm .page-item:last-child .page-link {
                        border-top-right-radius: 0.2rem;
                        border-bottom-right-radius: 0.2rem;
                        }



                        /* ---------------- */


        </style>
    </head>
    <body>
        <div class="navbar">
            <div class="links">
            @if (Route::has('login'))
            @auth
                <a href="{{route('home')}}">HOME</a>
                <a href="{{route('admin.employees.create')}}">ADD</a>
                <a href="{{route('admin.employees.index')}}">VIEW</a>
             
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
               
                @endauth
                @endif
            </div>
        </div>
     
  


                        @if (Route::has('login'))
            @auth
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Employees
                </div>

                <div class="container">
                    @yield('content')
                </div>
            </div>
        </div>
        @else
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Acces denied!
                </div>

                <div class="container">
                    Go to the <a style="margin:5px;" class="tbl-button" href="{{route('login')}}">login</a> page instead.
                    
                </div>
            </div>
        </div>

        @endauth
       
                @endif
    </body>
    
    <footer>
 
    </footer>
</html>
