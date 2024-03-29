<!DOCTYPE html>
<html>
<head>
	<title>Leading Edge Realty</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-52441148-1', 'auto');
      ga('send', 'pageview');

    </script>

    <link rel="icon" href="favicon.ico" type="image/x-icon" />
	
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
    {{js('site','bootstrap-datepicker.js')}}
    {{js('site', 'search.js') }}
    {{js('site','mortgage.js')}}
    {{js('site','blockUI.js')}}
    {{js('site','visitors.js')}}
    {{js('site','notification.js')}}

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
                      width:          '90%', 
                      top:            '5%', 
                      left:           '5%',
                      bottom:         '5%', 
                      color:          '#000', 
                      border:         'none', 
                      backgroundColor:'#fff', 
                      cursor:         'wait',
                      'overflow-x':       'scroll',
                      'overflow-y': 'scroll', 
                  },
                    overlayCSS:  { 
                        backgroundColor: '#000', 
                        opacity:         0.9, 
                        cursor:          'wait' 
                    }, 
                    onOverlayClick: function()
                    {
                        $('#youtubePlayer').attr('src', "//www.youtube.com/embed/OKfAhI2ZuTw?feature=player_embedded&autoplay=0&rel=0&showinfo=0&autohide=1&color=white");        
                        $.unblockUI();

                    }
                }); 
            });
            $(document).on('click','.close', function() {
                $('#youtubePlayer').attr('src', "//www.youtube.com/embed/OKfAhI2ZuTw?feature=player_embedded&autoplay=0&rel=0&showinfo=0&autohide=1&color=white");
                $.unblockUI();
                return false;
            });    
        });
    </script>
</head>
<body>
<div class="header">
    <div class="container">
        <noscript>
            <div class="row">
                <div class="alert alert-danger col-md-12 col-lg-12">
                    You must have Javascript enabled to view this site correctly
                </div>
            </div>
        </noscript>

        <div class="row">
            <!-- HEADER -->
            <div class="brand col-md-12 col-lg-12">
                <div class="logoimg">
                    <a href="{{URL::to('/')}}" title="Leading Edge Realty - Home">{{img('site','mainlogo.png',array('class'=>'logo'))}}</a>
                </div>
                <div id="youtubevid" class="print-hide">
                    <a href="#" id="ytvid">{{img('site','hqdefault.jpg',array('title'=>'Welcome Video'))}}</a>
                </div>

                <div id="youtubevid2" class="col-md-12 print-hide">
                    <div class="clearfix"></div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><div class="close pull-right text-right"><i class="fa fa-times-circle"></i></div></div>
                    <div class="clearfix"></div>
                    <div class="vid col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <iframe id="youtubePlayer" width="100%" height="auto" src="//www.youtube.com/embed/OKfAhI2ZuTw?feature=player_embedded&autoplay=0&rel=0&showinfo=0&autohide=1&color=white" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            <div class="cleafix"></div>
            <!-- /HEADER -->
            <div class="col-md-12 col-lg-12 print-hide">
                <div class="callus">Call Us Today &mdash; (512) 751-6119</div>
            </div>
            <!-- NAVIGATION -->
            <div class="col-md-12 col-lg-12 print-hide">
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
                                    <li><a href="{{URL::route('site.schoolratings')}}" target="_blank" title="2014 School Ratings">2014 School Ratings&nbsp;&nbsp;<i class="fa fa-file-pdf-o"></i></a></li>
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
                                <li><a href="{{ URL::route('get.auth.login') }}" id="blockLogin" title="Login/Register">Sign In/Sign Up</a></li>
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
    <div class="row">
    <div class="footer">
        <div class="col-md-4 col-lg-4">
            <h5 class="section-title">Leading Edge Realty</h5>
            <div>Copyright &copy; <?php echo date('Y'); ?> <br> Leading Edge Realty &ndash; Austin, TX. <br> All Rights Reserved.</div>
        </div><div class="hidden-md hidden-lg space-30"></div>
        <div class="col-md-4 col-lg-4 print-show">
            <div>Tammy Young - 512-751-6119<br>David McCaleb - 512-289-0112<br>Email: LeadingEdgeRealtyAustin[at]gmail.com</div>
            <div class="clearfix"></div>
        </div>
        <div class="col-md-4 col-lg-4 print-hide">
            <h5 class="section-title">Member of</h5>
            
            <!--
                <div class="member">{{--img('site','web_R_blue.jpg',array('title'=>'REALTOR&reg;'))--}}</div>&nbsp;&nbsp;
            -->
            <div class="member">{{img('site','equal-house-opp.gif',array('title'=>'Equal Housing Opportunity'))}}</div>
            <div class="member">{{img('site','luxury_home.png',array('title'=>'Luxury Homes'))}}</div>
            <div class="member2">{{img('site','MLS-clear.png',array('title'=>'REALTOR&reg; Multiple Listing Service'))}}</div>
            <div class="clearfix"></div>
        </div>
        <div class="hidden-md hidden-lg space-30"></div>
        <div class="col-md-4 col-lg-4">
            <h5 class="section-title">Disclaimer</h5>
            <p>Information found on this site is derived from third party sources and is deemed reliable. The developers and owners of this site cannot guarantee the accuracy of the information found here.</p>
        </div>
        <div class="clearfix"></div>
    </div>
    </div>
</div><div class='spacer-30'></div>

<div id="loginForm" class="print-hide">
    <div class="clearfix"></div>
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><div class="close pull-right text-right"><i class="fa fa-times-circle"></i></div></div>
    <div class="clearfix"></div>
    <div class="login-register">
        <div class="col-md-6 col-lg-6">
            {{ Form::open(array('method'=>'POST','route'=>'post.auth.login','class'=>'ajaxLoginForm')) }}

            <div class="login-form">
                <div class="col-md-12 col-lg-12">
                    <h3 class="section-title">Sign In</h3>
                </div>
                <div class="col-md-6 col-lg-6">
                    {{ Form::label('user', 'Username / Email') }}<br>
                    {{ Form::text('user','', array('class'=>'form-control')) }}
                </div>
                <div class="spacer-20"></div>
                <div class="col-md-6 col-lg-6">
                    {{ Form::label('password','Password') }}<br>
                    {{ Form::password('password', array('class'=>'form-control')) }}
                </div>
                <div class="spacer-20"></div>
                <div class="col-md-12">
                    {{Form::checkbox('remember','true')}} Remember Me
                </div>
                <div class="spacer-20"></div>
                <div class="col-md-12 col-lg-12">
                    <div class="submit-container">
                    {{ Form::submit('Sign In',array('class'=>'btn btn-danger')) }}
                    </div>
                </div>
                <div class="spacer-20"></div>
                <div class="forgot-links col-md-12 col-lg-12">
                    <a href="{{URL::route('get.auth.forgot.email')}}">Forgot Email</a> | <a href="{{URL::route('get.auth.forgot.password')}}">Forgot Password</a>
                </div>
                <div class="clearfix"></div>
            </div>

            {{ Form::close() }}
        </div>
        <div class="hidden-md hidden-lg space-30"></div>
        <div class="col-md-6 col-lg-6">
            {{ Form::open(array('method'=>'POST','route'=>'post.auth.register','class'=>'ajaxLoginForm')) }}

            <div class="login-form">
                <div class="col-md-12 col-lg-12">
                    <h3 class="section-title">Sign Up for Full Access</h3>
                </div>
                <div class="col-md-12 col-lg-12">
                    <div class="help-block">
                        This will give you full access to search and save the new homes database. Searching resale homes is through a different database and you have to signup seperately to save searches on that search.
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    {{ Form::label('fname', 'First Name') }}<br>
                    {{ Form::text('fname','', array('class'=>'form-control')) }}
                </div>
                <div class="col-md-6 col-lg-6">
                    {{ Form::label('lname', 'Last Name') }}<br>
                    {{ Form::text('lname','', array('class'=>'form-control')) }}
                </div>
                <div class="spacer-20"></div>
                <div class="col-md-6 col-lg-6">
                    {{ Form::label('username', 'Username') }}<br>
                    {{ Form::text('username','', array('class'=>'form-control')) }}
                </div>
                <div class="col-md-6 col-lg-6">
                    {{ Form::label('email', 'Email') }}<br>
                    {{ Form::text('email','', array('class'=>'form-control')) }}
                </div>
                <div class="spacer-20"></div>
                <div class="col-md-6 col-lg-6">
                    {{ Form::label('password', 'Password') }}<br>
                    {{ Form::password('password', array('class'=>'form-control')) }}
                </div>
                <div class="col-md-6 col-lg-6">
                    {{ Form::label('password_confirmation', 'Confirm Password') }}<br>
                    {{ Form::password('password_confirmation', array('class'=>'form-control')) }}
                </div>
                <div class="spacer-20"></div>
                <div class="col-md-12 col-lg-12">
                    <div class="submit-container">
                    {{ Form::submit('Submit',array('class'=>'btn btn-danger')) }}
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>

            {{ Form::close() }}
        </div>
    </div>
    <div class="spacer-20"></div>
</div>
<!-- /FOOTER -->

<!-- Javascript/Jquery -->
    {{js('site','framework/bootstrap.js')}}

</body>
</html>