<!doctype html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tasks</title>
    <!--<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/app.css">
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


        th {
            text-align: center;
            background-color: blue;
            color: white;
        }
        .navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav > li > a:focus {
            color: white;  /*Sets the text hover color on navbar*/
        }

        .navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active >   
        a:hover, .navbar-default .navbar-nav > .active > a:focus {
            color: white; /*BACKGROUND color for active*/
            background-color: #030033;
        }

        .navbar-default {
            background-color: blue;
            border-color: blue;
        }

        .dropdown-menu > li > a:hover,
        .dropdown-menu > li > a:focus {
            color: white;
            text-decoration: none;
            background-color: #66CCFF;  /*change color of links in drop down here*/
        }

        .nav > li > a:hover,
        .nav > li > a:focus {
            text-decoration: none;
            background-color: silver; /*Change rollover cell color here*/
        }

        .navbar-default .navbar-brand {
            color: white;
        }

        .navbar-default .navbar-nav > li > a {
            color: white; /*Change active text color here*/
        }

        .navbar-inverse .navbar-brand:hover, 
        .navbar-inverse .navbar-brand:focus {
            background-color: transparent;
            color: white;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
        }

        div.relative {
            width: 98%;
            position: relative;
            left: 1%;
            /*border: 3px solid #73AD21;*/
        }
        
        .required
        {
            color: red;
        }

    </style>

</head>
<body>
    @if (Request::path() === '/' || Request::path() === 'auth/login')
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
    @endif
{{--<nav class="navbar navbar-default navbar-inverse  navbar-fixed-top">--}}
    <nav class="navbar navbar-default navbar-inverse ">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span> 
                </button>
                <a class="navbar-brand" href="#">Musicians Manager</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    @if (\Auth::user() != null)
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown">Events<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">List Events</a></li>
                            <li><a href="#">Events Calendar</a></li>
                            <li><a href="#">Add Event</a></li>
                            <li><a href="#">Request Musician</a></li>
                            <li><a href="#">Musician Response</a></li>
                            <li> <a href="#">List Venues</a></li>
                            <li><a href="#">Add Venue</a></li>
                        </ul>
                    </li>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown">Music<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('musiclibrary.index') }}">List Songs</a></li>
                            <li><a href="{{ route('musiclibrary.create') }}">Add Song</a></li>
                            <li><a href="{{ route('style.index') }}">List Styles</a></li>
                            <li><a href="{{ route('style.create') }}">Add Style</a></li> 
                            <li><a href="{{ route('tempo.index') }}">List Tempos</a></li>
                            <li><a href="{{ route('tempo.create') }}">Add Tempo</a></li> 
                            <li><a href="{{ route('nya') }}">List Instruments</a></li>
                            <li><a href="{{ route('nya') }}">Add Instrument</a></li> 
                            <li><a href="{{ route('nya') }}">List Groups</a></li>                       
                            <li><a href="{{ route('nya') }}">Add Group</a></li>
                        </ul>
                    </li> 
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown">Members<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('user.index') }}">List Members</a></li>
                            <li><a href="{{ route('user.create') }}">Add Member</a></li>
                        </ul>
                    </li> 

                    @endif
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if (\Auth::user() != null)
                    <li><a class="glyphicon glyphicon-user">&nbsp;{{ \Auth::user()->username }}</a></li>
                    @endif
                    @if (\Auth::user() == null)
                    <li><a href="{{ route('register') }}"><span class="glyphicon glyphicon-user"></span> Register</a></li>
                    <li><a href="{{ route('login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    @else
                    <li><a href="{{ route('logout') }}"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>          
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <main>
        <div class="container">

            <script>
                function doSubmit(rqstType, songId)
                {
                    //debugger;
                    if (rqstType === "get")
                    {
                        // Show request
                        // change the form method from POST to GET, _method field remains empty
                        document.getElementById("myRqst").method = rqstType;
                    } else
                    {
                        // Delete request 
                        // set the _method field to DELETE, form method remains POST
                        document.getElementById("_method").value = rqstType;
                    }

                    // append songId to form action
                    var action = document.getElementById("myRqst").action;
                    action = action.concat(songId);
                    document.getElementById("myRqst").action = action;
                    // submit the form
                    document.getElementById("myRqst").submit();
                }

                function getCurrentRole(sel){
                    alert(sel);
                } 
                
                function editRoles()
                {
                    //debugger;
                    document.location.href="{!! route('nya') !!}";
                }

            </script>

            @yield('content')
        </div>
    </main>

    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js//bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script>
                /*
                 $('#flash-overlay-modal').modal();
                 use flash()-->overlay('message', 'title') to provide a modal dialog message box.
                 Must enable above line and disable div.alert line below.
                 */
                $('div.alert').not('.alert-important').delay(5000).slideUp(500);
    </script>

    @yield('footer')
</body>

