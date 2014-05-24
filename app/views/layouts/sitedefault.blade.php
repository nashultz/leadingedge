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
        

        {{js('site', 'search.js') }}

    <script>
        $(document).ready(function() {
            $('#button1').click(function() {
              $('.button1-form').slideToggle(800);
              $('.button2-form').slideUp(800);
              $('.button3-form').slideUp(800);
              $('.button4-form').slideUp(800);
              $('.button5-form').slideUp(800);
              /*$('.button-space').toggle();
              $('#button2').toggle();
              $('#button3').toggle();
              $('#button4').toggle();
              $('#button5').toggle();*/
            });
            $('#button2').click(function() {
              $('.button1-form').slideUp(800);
              $('.button2-form').slideToggle(800);
              $('.button3-form').slideUp(800);
              $('.button4-form').slideUp(800);
              $('.button5-form').slideUp(800);
              /*$('.button-space').toggle();
              $('#button1').toggle();
              $('#button3').toggle();
              $('#button4').toggle();
              $('#button5').toggle();*/
            });
            $('#button3').click(function() {
              $('.button1-form').slideUp(800);
              $('.button2-form').slideUp(800);
              $('.button3-form').slideToggle(800);
              $('.button4-form').slideUp(800);
              $('.button5-form').slideUp(800);
              /*$('.button-space').toggle();
              $('#button1').toggle();
              $('#button2').toggle();
              $('#button4').toggle();
              $('#button5').toggle();*/
            });
            $('#button4').click(function() {
              $('.button1-form').slideUp(800);
              $('.button2-form').slideUp(800);
              $('.button3-form').slideUp(800);
              $('.button4-form').slideToggle(800);
              $('.button5-form').slideUp(800);
              /*$('.button-space').toggle();
              $('#button1').toggle();
              $('#button2').toggle();
              $('#button3').toggle();
              $('#button5').toggle();*/
            });
            $('#button5').click(function() {
              $('.button1-form').slideUp(800);
              $('.button2-form').slideUp(800);
              $('.button3-form').slideUp(800);
              $('.button4-form').slideUp(800);
              $('.button5-form').slideToggle(800);
              /*$('.button-space').toggle();
              $('#button1').toggle();
              $('#button2').toggle();
              $('#button3').toggle();
              $('#button4').toggle();*/
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
        <div class="col-md-3 col-lg-3">
            {{img('site','mainlogo.png',array('class'=>'brand'))}}
        </div>
        <!-- /HEADER -->
        <!-- NAVIGATION -->
        <div class="col-md-9 col-lg-9">
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
                        <li class="active"><a href="{{URL::to('/')}}"><i class="fa fa-home"></i></a></li>
                        <li class="divider-vertical"></li>
                        <li><a href="http://www.tammytherealtor.com">About</a></li>
                        <!--<li class="divider-vertical"></li>
                        <li><a href="{{ URL::route('get.search.index') }}">Search</a>
                        <li class="divider-vertical"></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Neighborhoods <span class="caret"></span></a>
                            <div class="dropdown-menu categories">
                                <div class="row">
                                    <div class="col-md-12 col-lg-12 padding1030">
                                        <h3 class="section-title">Top Neighborhoods</h3>
                                        <div class="dropdown-inner col-md-3 col-lg-3">
                                            <ul class="dropdown-menulinks nav-justified">
                                                <li class="category-link"><a href="#"><span class="cat-img"><img src="../../assets/site/img/products/default.png"></span><span class="cat-title">Title</span></a></li>
                                            </ul>
                                        </div>
                                        <div class="dropdown-inner col-md-3 col-lg-3">
                                            <ul class="dropdown-menulinks nav-justified">
                                                <li class="category-link"><a href="#"><span class="cat-img"><img src="../../assets/site/img/products/default.png"></span><span class="cat-title">Title</span></a></li>
                                            </ul>
                                        </div>
                                        <div class="dropdown-inner col-md-3 col-lg-3">
                                            <ul class="dropdown-menulinks nav-justified">
                                                <li class="category-link"><a href="#"><span class="cat-img"><img src="../../assets/site/img/products/default.png"></span><span class="cat-title">Title</span></a></li>
                                            </ul>
                                        </div>
                                        <div class="dropdown-inner col-md-3 col-lg-3">
                                            <ul class="dropdown-menulinks nav-justified">
                                                <li class="category-link"><a href="#"><span class="cat-img"><img src="../../assets/site/img/products/default.png"></span><span class="cat-title">Title</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="divider-vertical"></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Builders <span class="caret"></span></a>
                            <div class="dropdown-menu categories">
                                <div class="row">
                                    <div class="col-md-12 col-lg-12 padding1030">
                                        <h3 class="section-title">Top Builders</h3>
                                        <div class="dropdown-inner col-md-3 col-lg-3">
                                            <ul class="dropdown-menulinks nav-justified">
                                                <li class="category-link"><a href="#"><span class="cat-img"><img src="../../assets/site/img/products/default.png"></span><span class="cat-title">Title</span></a></li>
                                            </ul>
                                        </div>
                                        <div class="dropdown-inner col-md-3 col-lg-3">
                                            <ul class="dropdown-menulinks nav-justified">
                                                <li class="category-link"><a href="#"><span class="cat-img"><img src="../../assets/site/img/products/default.png"></span><span class="cat-title">Title</span></a></li>
                                            </ul>
                                        </div>
                                        <div class="dropdown-inner col-md-3 col-lg-3">
                                            <ul class="dropdown-menulinks nav-justified">
                                                <li class="category-link"><a href="#"><span class="cat-img"><img src="../../assets/site/img/products/default.png"></span><span class="cat-title">Title</span></a></li>
                                            </ul>
                                        </div>
                                        <div class="dropdown-inner col-md-3 col-lg-3">
                                            <ul class="dropdown-menulinks nav-justified">
                                                <li class="category-link"><a href="#"><span class="cat-img"><img src="../../assets/site/img/products/default.png"></span><span class="cat-title">Title</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="divider-vertical"></li>-->
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
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    {{js('site','framework/bootstrap.js')}}

</body>
</html>