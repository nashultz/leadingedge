<!DOCTYPE html>
<html>
<head>
	<title>Leading Edge Realty</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <!-- Styles -->
    {{css('site','vendor/normalize.css')}}
    {{css('site','framework/bootstrap.css')}}
    {{css('site','framework/bootstrap-theme.css')}}
    {{css('site','style.css')}}
    {{css('site','datepicker.css')}}
    {{css('site','datepicker3.css')}}

    <!-- Fonts -->
    {{css('site','font-awesome.min.css')}}
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700' rel='stylesheet' type='text/css'>

    <!-- HTML Shim -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <script src="http://maps.googleapis.com/maps/api/js?v=3&amp;sensor=false"></script>
    {{js('site','infobox.js')}}
    {{js('site', 'bnha_maps.js')}}
    {{js('site', 'buttonForms.js') }}
    {{js('site','bootstrap-datepicker.js')}}
    {{js('site', 'search.js') }}
    {{js('site','button-toggle.js')}}

    <script>
        $(document).ready(function() {
            $('.input-group.date').datepicker({
                format: 'yyyy-mm-dd',
                startDate: '-0d'
            });
        });
    </script>
    
</head>
<body>
<div class="container">
    <div class="row print-show">
        <div class="col-md-12 col-lg-12">
            <h1 class="brand">Leading Edge Realty</h1>
        </div>
    </div>
    <div class="row print-hide">
        <!-- HEADER -->
        <div class="brand col-md-12 col-lg-12">
            <a href="{{URL::to('/')}}">{{img('site','mainlogo.png',array('class'=>'logo'))}}</a>
        </div>
        <!-- /HEADER -->
        <!-- NAVIGATION -->
        <div class="col-md-12 col-lg-12">
            <div class="navbar navbar-inverse main-nav" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="{{URL::to('/')}}"><i class="fa fa-home"></i></a></li>
                        <li class="divider-vertical"></li>
                        <li><a href="{{URL::to('about')}}">About</a></li>
                        <li class="divider-vertical"></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Resources <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{URL::route('site.schoolratings')}}" target="_blank">2013 School Ratings&nbsp;&nbsp;<i class="fa fa-file-pdf-o"></i></a></li>
                            </ul>
                        </li>
                        <li class="divider-vertical"></li>
                        <li><a href="{{URL::to('testimonials')}}">Testimonials</a>
                        <li class="divider-vertical"></li>
                        <li><a href="{{URL::to('contact')}}">Contact Us</a>
                        <!--<li class="divider-vertical"></li>-->
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        @if (!Auth::check())
                            <li><a href="{{ URL::route('get.auth.login') }}">Login/Register</a></li>
                            <!--<li class="divider-vertical"></li>
                            <li><a href="{{-- URL::route('get.auth.register') --}}">Register</a></li>-->
                        @else 
                            <li><a href="{{ URL::route('get.auth.logout') }}">Logout</a></li>
                        @endif
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>
    </div>
    <!-- /NAVIGATION -->
</div>
<div class="main-content container">

    <div class="row">
      @if (Session::has('notification'))
        {{ Session::get('notification') }}
      @endif
    </div>

    <div class="row">
        @yield('content')
    </div>
</div>
<div class="spacer-20"></div>
<!-- FOOTER -->
<div class="container">
    <div class="row footer">
        <div class="col-md-12 col-lg-12">
            <div class="pull-left">
                Copyright &copy; <?php echo date('Y'); ?> &ndash; Leading Edge Realty &ndash; Austin, TX. All Rights Reserved.
            </div>
            <div class="pull-right">
                <ul class="nav-footer">
                    <!--<li><a href="#">Contact Us</a></li>
                    <li><a href="#">Terms of Use</a></li>
                    <li><a href="#">Privacy Policy</a></li>-->
                </ul>
            </div>
            <div class='spacer-30'></div>
        </div>
    </div>
</div>
<!-- /FOOTER -->

<!-- Javascript/Jquery -->
    {{js('site','framework/bootstrap.js')}}

</body>
</html>