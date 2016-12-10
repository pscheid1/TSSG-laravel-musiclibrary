<!doctype html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TSSG Musicians Manager</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
            width: 100%;
            position: relative;
            left: 1%;
            /*border: 3px solid #73AD21;*/
        }

        .required
        {
            color: red;
        }

        .selectbox 
        {
            width: 366px;
        }

        /*
        .carousel-inner img {
                -webkit-filter: grayscale(90%);
                filter: grayscale(90%); // make all photos black and white 
                width: 100%; // Set width to 100% 
                margin: auto;
        }
        

        .carousel-caption h3 {
                color: #fff !important;
        }

        @media (max-width: 600px) {
                .carousel-caption {
                        display: none; // Hide the carousel text when the screen is less than 600 pixels wide
                    }
        } 
        */
        .carousel-inner > .item > img,
        .carousel-inner > .item > a > img {
            width: 100%;
            margin: auto;
        } 

    </style>

</head>
<body>
    @if (\App\Setting::getBannerPics()  > 0)
    @if (Request::path() === '/' || Request::path() === 'auth/login')
    @if (\App\Setting::getBannerPics() == 1)
    <div id="logo" class='img-responsive' width="100%", height="175">
        <div >
            <table>
                <td><img class="img-responsive" src="images/h_logo.jpg"></td>
                <td><img class="img-responsive" src="images/PnS-header-img1.jpg"></td>
                <td><img class="img-responsive" src="images/PnS-header-img2.jpg"></td>
            </table>
        </div>
    </div>
    @elseif (\App\Setting::getBannerPics() == 2)
    <div id="myCarousel" class="carousel slide" data-ride="carousel" >
          <!-- Indicators -->
          <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
              </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
                <div class="item active">
                      <img src="images/ny.jpg" alt="New York" >
                      <div class="carousel-caption">
                            <h3>New York</h3>
                            <p>The atmosphere in New York is awesome.</p>
                       </div> 
            </div>

                <div class="item">
                      <img src="images/chicago.jpg" alt="Chicago">
                      <div class="carousel-caption">
                            <h3>Chicago</h3>
                            <p>Thank you, Chicago - A night we won't forget.</p>
                     </div> 
            </div>

                <div class="item">
                      <img src="images/la.jpg" alt="Los Angeles">
                      <div class="carousel-caption">
                            <h3>LA</h3>
                            <p>Even though the traffic was a mess, we had the best time.</p>
                     </div> 
            </div>
              </div>

          <!-- Left and right controls -->
          <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
          <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
    </div>
    @endif    
    @endif
    @endif
    <!--<nav class="navbar navbar-default navbar-inverse  navbar-fixed-top">-->
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
                            <li><a href="{{ route('nya') }}">List Events</a></li>
                            <li><a href="{{ route('nya') }}">Events Calendar</a></li>
                            <li><a href="{{ route('nya') }}">Add Event</a></li>
                            <li><a href="{{ route('nya') }}">Request Musician</a></li>
                            <li><a href="{{ route('nya') }}">Musician Response</a></li>
                            <li> <a href="{{ route('nya') }}">List Venues</a></li>
                            <li><a href="{{ route('nya') }}">Add Venue</a></li>
                        </ul>
                    </li>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown">Music<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('musiclibrary.index') }}">List Songs</a></li>
                            <li><a href="{{ route('musiclibrary.create') }}">Add Song</a></li>
                            <li><a href="{{ route('instrument.index') }}">List Instruments</a></li>
                            <li><a href="{{ route('instrument.create') }}">Add Instrument</a></li> 
                        </ul>
                    </li> 
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown">Members<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('user.index') }}">List Members</a></li>
                            <li><a href="{{ route('user.create') }}">Add Member</a></li>
                            <li><a href="{{ route('group.index') }}">List Groups</a></li>                                             
                            <li><a href="{{ route('group.create') }}">Add Group</a></li>
                        </ul>
                    </li> 
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown">Admin<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('style.index') }}">List Styles</a></li>
                            <li><a href="{{ route('style.create') }}">Add Style</a></li>
                            <li><a href="{{ route('tempo.index') }}">List Tempos</a></li>
                            <li><a href="{{ route('tempo.create') }}">Add Tempo</a></li>
                            <li><a href="{{ route('skill.index') }}">List Proficiencies</a></li>
                            <li><a href="{{ route('skill.create') }}">Add Proficiency</a></li>
                            <li><a href="{{ route('role.index') }}">List Roles</a></li>
                            <li><a href="{{ route('nya') }}">Add Role</a></li>
                            <li><a href="{{ route('settings.show') }}"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>                            
                        </ul>
                    </li>
                    @endif
                </ul>
                <ul class="nav navbar-nav navbar-right">                   
                    @if (\Auth::user() != null)
                    <li><a class="glyphicon glyphicon-user">&nbsp;{{ \Auth::user()->username }}</a></li>
                    <li><a href="{{ route('logout') }}"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                    @elseif (Request::path() === '/' || Request::path() === 'auth/login')                    
                    <li><a href="{{ route('register') }}"><span class="glyphicon glyphicon-user"></span> Register</a></li>                      
                    @elseif (Request::path() === 'auth/register')
                    <li><a href="{{ route('login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>                      
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <main>
        <div class="container">

            <script>

// resourceid is optional and is used only in specific requests                
function doSubmit(rqstType, rqstId, resourceid)
{
    //debugger;

    if (rqstType === "get")
    {
        // Show request
        // change the form method from POST to GET, _method field remains empty
        document.getElementById("myRqst").method = rqstType;
    }
    else if (rqstType === "getinstr")
    {
        // Show assigned instrument for editing
        // change the form method from POST to GET, _method field remains empty
        //document.getElementById("myRqst").method = 'get';  // method is already === get
    }
    else if (rqstType === "delinstr")
    {
        // Delete assigned instrument 
        // set the _method field to delinstr, form method remains POST
        document.getElementById("_method").value = "delete";
    }
    else
    {
        // Delete request (rqstType === 'delete')
        // set the _method field to DELETE, form method remains POST
        document.getElementById("_method").value = rqstType;
    }

    var xaction = document.getElementById("myRqst").action;

    if (rqstType == "getinstr")
    {
        document.getElementById("_resourceid").value = resourceid;
        var indx = xaction.lastIndexOf('/');
        xaction = xaction.substr(0, indx + 1);
        xaction = xaction.concat("editproficiency");
    }
    else if (rqstType == "delinstr")
    {
        document.getElementById("_resourceid").value = resourceid;
        var indx = xaction.lastIndexOf('/');
        xaction = xaction.substr(0, indx + 1);
        xaction = xaction.concat("delinstr");
    }
    else
    {
        // append requestId to form action        
        xaction = xaction.concat(rqstId);
    }
    document.getElementById("myRqst").action = xaction;
// submit the form
    document.getElementById("myRqst").submit();
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

