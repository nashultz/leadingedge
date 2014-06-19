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
    {{css('site','style2.css')}}
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
    {{js('site','mortgage.js')}}
    {{js('site','blockUI.js')}}

    <script>
        $(document).ready(function() {
            $('.input-group.date').datepicker({
                format: 'yyyy-mm-dd',
                startDate: '-0d'
            });
        });
    </script>
    <script>
        $(document).ready(function() { 
            $('#ytvid').click(function() { 
                $.blockUI({ 
                    message: $('#youtubevid2'),
                    css: { 
                        padding:        0, 
                        margin:         0, 
                        width:          '870px', 
                        top:            '15%', 
                        left:           '20%', 
                        textAlign:      'center', 
                        color:          '#fff', 
                        border:         'none', 
                        backgroundColor:'#000', 
                        cursor:         'wait' 
                    }, 
                    onOverlayClick: $.unblockUI 
                }); 
            });
            $('.close').click(function() {
                $.unblockUI();
                return false;
            });    
        });
    </script>
    
</head>
<body>
<div class="header">
    <div class="container">
        <div class="row print-show">
            <div class="col-md-12 col-lg-12">
                <h1 class="brand">Leading Edge Realty</h1>
            </div>
        </div>
        <div class="row print-hide">
            <!-- HEADER -->
            <div class="brand col-md-12 col-lg-12">
                <div class="col-md-4">
                    <a href="{{URL::to('/')}}" title="Leading Edge Realty - Home">{{img('site','mainlogo.png',array('class'=>'logo'))}}</a>
                </div>
                <div id="youtubevid" class="col-md-8">
                    <a href="#" id="ytvid"><img src="http://img.youtube.com/vi/OKfAhI2ZuTw/hqdefault.jpg" title="Welcome Video" /></a>
                </div>

                <div id="youtubevid2" class="col-md-12">
                    <div class="vid col-md-11">
                        <iframe width="800" height="450" src="//www.youtube.com/embed/OKfAhI2ZuTw?feature=player_embedded&autoplay=0&rel=0&showinfo=0&autohide=1&color=white" frameborder="0" allowfullscreen></iframe>
                    </div>
                    <div class="close col-md-1"><i class="fa fa-times-circle"></i></div>
                </div>
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
                            <li><a href="{{URL::to('/')}}" title="Home"><i class="fa fa-home"></i></a></li>
                            <li class="hidden-xs hidden-sm divider-vertical"></li>
                            <li><a href="{{URL::to('about')}}" title="About">About</a></li>
                            <li class="hidden-xs hidden-sm divider-vertical"></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Resources">Resources <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{URL::to('mortgage')}}" title="Mortgage Calculator">Mortgage Calculator</a></li>
                                    <li><a href="{{URL::route('site.schoolratings')}}" target="_blank" title="2013 School Ratings">2013 School Ratings&nbsp;&nbsp;<i class="fa fa-file-pdf-o"></i></a></li>
                                    <li><a href="{{URL::route('site.realtor')}}" title="Why Use a Realtor">Why Use a Realtor&reg;</a></li>
                                </ul>
                            </li>
                            <li class="hidden-xs hidden-sm divider-vertical"></li>
                            <li><a href="{{URL::to('testimonials')}}" title="Testimonials">Testimonials</a></li>
                            <li class="hidden-xs hidden-sm divider-vertical"></li>
                            <li><a href="{{URL::to('contact')}}" title="Contact Us">Contact Us</a></li>
                            <!--<li class="divider-vertical"></li>-->
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="https://www.facebook.com/AustinAreaRealEstateDeals" target="_blank" title="Facebook"><i class='fa fa-facebook'></i></a></li>
                            <li class="hidden-xs hidden-sm divider-vertical"></li>
                            <li><a href="https://www.youtube.com/channel/UCfW9OSJ9FolOoqiN4tapg2w" target="_blank" title="YouTube"><i class="fa fa-youtube"></i></a></li>
                            <li class="hidden-xs hidden-sm divider-vertical"></li>
                            @if (!Auth::check())
                                <li><a href="{{ URL::route('get.auth.login') }}" title="Login/Register">Login/Register</a></li>
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
</div>
<div class="main-content container">

    <div class="row">
      <div class="col-md-12 col-lg-12">
        @if(Notifications::has())
            {{ Notifications::get() }}
        @endif
      </div>
    </div>

    <div class="row">
        @yield('content')
    </div>
</div>
<div class="spacer-20"></div>
<!-- FOOTER -->
<div class="container">
    <div class="row footer">
        <div class="col-md-4 col-lg-4">
            <div class="pull-left">
                <h5 class="section-title">Leading Edge Realty</h5>
                Copyright &copy; <?php echo date('Y'); ?> <br> Leading Edge Realty &ndash; Austin, TX. <br> All Rights Reserved.
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <h5 class="section-title">Member of</h5>
            <div class="member"><img src="assets/site/img/web_R_blue.jpg" title="REALTOR&reg;" /></div>&nbsp;&nbsp;
            <div class="member"><img src="assets/site/img/equal-house-opp.gif" title="Equal Housing Opportunity" /></div>
            <div class="member2"><img src="assets/site/img/MLS-clear.png" title="REALTOR&reg; Multiple Listing Service" /></div>
        </div>
        <div class="col-md-4 col-lg-4">
            <h5 class="section-title">Disclaimer</h5>
            <p>Information found on this site is derived from third party sources and is deemed reliable. The developers and owners of this site cannot guarantee the accuracy of the information found here.</p>
        </div>
        <div class="clearfix"></div>
    </div>
</div><div class='spacer-30'></div>
<!-- /FOOTER -->

<!-- Javascript/Jquery -->
    {{js('site','framework/bootstrap.js')}}

</body>
</html>