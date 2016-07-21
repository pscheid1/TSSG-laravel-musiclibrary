<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tasks</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <style type="text/css">
            .xsmall
            {
                line-height: 0.1;
            }
            .indented
            {
                float:left;
                width:85px;
            }
            .button
            {
                background: #5abbd1;
                color: white;
                -moz-border-radius: 5px;
                -webkit-border-radius: 5px;
                border-radius: 6px;
            }
            .imageContainer
            {
                float:left;
            }
            .dropbtn {
                background-color: #cc0000;
                color: white;
                padding: 8px;{{--16--}}
                font-size: 18px;
                border: none;
                cursor: pointer;
            }

            .dropdown {
                position: relative;
                display: inline-block;
            }

            .dropdown-content {
                display: none;
                position: absolute;
                background-color: #cc0000;
                {{-- min-width: 136px; for music tab--}}
                min-width: 154px;                
                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            }

            .dropdown-content a {
                color: white;
                padding: 12px 16px;
                text-decoration: none;
                display: block;
            }

            .dropdown-content a:hover {background-color: #cc0000}

            .dropdown:hover .dropdown-content {
                display: block;
            }

            .dropdown:hover .dropbtn {
                background-color: #cc0000;
            }          

            th {
                text-align: center;
                background-color: blue;
                color: white;
            }
        </style>
    <body>
        <div id="header">
            <div id="logo">
                <div class='imageContainer'>
                    {!! Html::image('images/h_logo.gif', 'point n swing logo') !!}
                </div>
                <div class='imageContainer'>                    
                    {!! Html::image('images/PnS-header-img1.jpg', 'band photo part 1', array('height' => '115')) !!}
                </div>
                <div class='imgContainer'>                    
                    {!! Html::image('images/PnS-header-img2.jpg', 'band photo part 2', array('height' => '115', 'clear' => 'left')) !!}
                </div>
            </div>
        </div>
        <div id="menu">
            <nav class="navbar navbar-default" >
                <div class="container-fluid">
                    <div class="navbar-header">
                        {{--<a class="navbar-brand">Musicians Manager</a>--}}
                    </div>
                    <div class="nav navbar-nav">
                        @if (\Auth::user() != null)
                        <li>
                            <div class="dropdown">
                                <button class="dropbtn">Home</button>
                                <div class="dropdown-content">
                                    <a href="{{ route('home') }}"></a>
                            </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown">
                                <button class="dropbtn">Events</button>
                                <div class="dropdown-content">
                                    <a href="#">List Events</a>
                                    <a href="#">Events Calendar</a>                                    
                                    <a href="#">Add Event</a>
                                    <a href="#">Request Musician</a>
                                    <a href="#">Musician Response</a>
                                    <a href="#">List Venues</a>
                                    <a href="#">Add Venue</a>
                                </div>
                            </div>
                        </li>                        
                        <li>
                            <div class="dropdown">
                                <button class="dropbtn">Music</button>
                                <div class="dropdown-content">
                                    <a href="{{ route('musiclibrary') }}">List Songs</a>
                                    <a href="#">Add Song</a>
                                    <a href="#">List Instruments</a>
                                    <a href="#">Add Instrument</a>
                                    <a href="#">List Group</a>
                                    <a href="#">Add Group</a>
                                </div>
                            </div>
                        </li>        
                        <li>
                            <div class="dropdown">
                                <button class="dropbtn">People</button>
                                <div class="dropdown-content">
                                    <a href="#">List People</a>
                                    <a href="#">Add People</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown">
                                <button class="dropbtn">Set Lists</button>
                                <div class="dropdown-content">
                                    <a href="#">Explore Set List</a>
                                    <a href="#">Create New Set List</a>
                                </div>
                            </div>
                        </li>
                        @endif
                    </div>
                    <div class="nav navbar-nav navbar-right">
                        @if (\Auth::user() != null)
                        <li><a>{{ \Auth::user()->username }}</a></li>
                        @endif
                        @if (\Auth::user() == null)
                        <li><a href="{{ route('register') }}">Register</a></li>
                        <li><a href="{{ route('login') }}">Login</a></li>
                        @else
                        <li><a href="{{ route('logout') }}">Logout</a></li>                    
                        @endif
                    </div>
                </div>
            </nav>
        </div>

        <main>
            <div class="container">
                @if(Session::has('flash_message'))
                <div class="alert alert-success">
                    {{ Session::get('flash_message') }}
                </div>
                @endif
            </div>
            @yield('content')            
        </main>
    </body>
</html>
