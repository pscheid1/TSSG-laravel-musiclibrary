<!doctype html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tasks</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

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

    </style>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://twitter.github.io/bootstrap/assets/js/bootstrap-transition.js"></script>
    <script type="text/javascript" src="http://twitter.github.io/bootstrap/assets/js/bootstrap-collapse.js"></script>
    <!--<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>-->
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/3.2.6/js/bootstrap.min.js"></script>

    <?php /*<link href="css/bootstrap.min.css" rel="stylesheet">*/ ?>

</head>
<body>
    <?php /*
    <div id="header">
        <div id="logo">
            <div class='imageContainer'>
                <?php echo Html::image('images/h_logo.gif', 'point n swing logo'); ?>

            </div>
            <div class='imageContainer'>                    
                <?php echo Html::image('images/PnS-header-img1.jpg', 'band photo part 1', array('height' => '115')); ?>

            </div>
            <div class='imgContainer'>                    
                <?php echo Html::image('images/PnS-header-img2.jpg', 'band photo part 2', array('height' => '115', 'clear' => 'left')); ?>

            </div>
        </div>
    </div>
    */ ?>
    <nav class="navbar navbar-default navbar-inverse">
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
                    <?php if(\Auth::user() != null): ?>
                    <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
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
                            <li><a href="<?php echo e(route('musiclibrary.index')); ?>">List Songs</a></li>
                            <li><a href="<?php echo e(route('musiclibrary.create')); ?>">Add Song</a></li>
                            <li><a href="<?php echo e(route('style.index')); ?>">List Styles</a></li>
                            <li><a href="<?php echo e(route('style.create')); ?>">Add Style</a></li> 
                            <li><a href="<?php echo e(route('tempo.index')); ?>">List Tempos</a></li>
                            <li><a href="<?php echo e(route('tempo.create')); ?>">Add Tempo</a></li> 
                            <li><a href="<?php echo e(route('nya')); ?>">List Instruments</a></li>
                            <li><a href="<?php echo e(route('nya')); ?>">Add Instrument</a></li> 
                            <li><a href="<?php echo e(route('nya')); ?>">List Groups</a></li>                       
                            <li><a href="<?php echo e(route('nya')); ?>">Add Group</a></li>
                        </ul>
                    </li> 
                    <li><a href="#">People</a></li> 
                    <?php endif; ?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php if(\Auth::user() != null): ?>
                    <li><a class="glyphicon glyphicon-user">&nbsp;<?php echo e(\Auth::user()->username); ?></a></li>
                    <?php endif; ?>
                    <?php if(\Auth::user() == null): ?>
                    <li><a href="<?php echo e(route('register')); ?>"><span class="glyphicon glyphicon-user"></span> Register</a></li>
                    <li><a href="<?php echo e(route('login')); ?>"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    <?php else: ?>
                    <li><a href="<?php echo e(route('logout')); ?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>          
                    <?php endif; ?>
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
            </script>

            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </main>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->

    <script src="js/bootstrap.min.js"></script>

    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js.bootstrap.min.js"></script>
    <script>
        /*
        $('#flash-overlay-modal').modal();
         use flash()-->overlay('message', 'title') to provide a modal dialog message box.
         Must enable above line and disable div.alert line below.
        */
        $('div.alert').not('.alert-important').delay(5000).slideUp(500);
    </script>

    <?php echo $__env->yieldContent('footer'); ?>
</body>

