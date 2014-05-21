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
    {{js('site','markerclusterer.js')}}

    <script>

    </script>


    {{--js('site','data.json')--}}
    <script type="text/javascript">
      var styles = [[{
        url: '../images/people35.png',
        width: 35,
        height: 35,
        textColor: '#ff00ff',
        textSize: 10
      }, {
        url: '../images/people45.png',
        width: 45,
        height: 45,
        textColor: '#ff0000',
        textSize: 11
      }, {
        url: '../images/people55.png',
        width: 55,
        height: 55,
        textColor: '#ffffff',
        textSize: 12
      }], [{
        url: '../images/conv30.png',
        width: 30,
        height: 27,
        anchorText: [-3, 0],
        anchorIcon: [27, 28],
        textColor: '#ff00ff',
        textSize: 10
      }, {
        url: '../images/conv40.png',
        width: 40,
        height: 36,
        anchorText: [-4, 0],
        anchorIcon: [36, 37],
        textColor: '#ff0000',
        textSize: 11
      }, {
        url: '../images/conv50.png',
        width: 50,
        height: 45,
        anchorText: [-5, 0],
        anchorIcon: [45, 46],
        textColor: '#0000ff',
        textSize: 12
      }], [{
        url: '../images/heart30.png',
        width: 30,
        height: 26,
        anchorIcon: [26, 15],
        textColor: '#ff00ff',
        textSize: 10
      }, {
        url: '../images/heart40.png',
        width: 40,
        height: 35,
        anchorIcon: [35, 20],
        textColor: '#ff0000',
        textSize: 11
      }, {
        url: '../images/heart50.png',
        width: 50,
        height: 44,
        anchorIcon: [44, 25],
        textSize: 12
      }]];

      var markerClusterer = null;
      var map = null;
      var imageUrl = 'http://chart.apis.google.com/chart?cht=mm&chs=24x32&' +
          'chco=FFFFFF,008CFF,000000&ext=.png';

      google.maps.event.addDomListener(window, 'load', initialize);

      function refreshMap() {
        console.log('called');

        if (markerClusterer) {
          markerClusterer.clearMarkers();
        }

        var markers = [];

        var response = $.ajax({

            type: 'GET',
            url: '/builders/load'

        });

        response.success(function(resp) {

            var myJson = JSON.parse(resp);

            var markerImage = new google.maps.MarkerImage(imageUrl,
              new google.maps.Size(24, 32));

            for (var i = 0; i < myJson.count; ++i) {

              if (typeof myJson.builders[i].neighborhood !== 'undefined') 
              {
                var latLng = new google.maps.LatLng(myJson.builders[i].neighborhood.longitude,
                  myJson.builders[i].neighborhood.latitude)

                  var marker = new google.maps.Marker({
                   position: latLng,
                   icon: markerImage
                  });

                  markers.push(marker);
              }
            }

            var zoom = parseInt(document.getElementById('zoom').value, 5);
            var size = parseInt(document.getElementById('size').value, 10);
            var style = parseInt(document.getElementById('style').value, 10);
            //zoom = zoom == -1 ? 5 : zoom;
            zoom = zoom == -1 ? null : zoom;
            size = size == -1 ? 1 : size;
            style = style == -1 ? null : style;

            markerClusterer = new MarkerClusterer(map, markers, {
              maxZoom: zoom,
              gridSize: size,
              styles: styles[style],
              zoomOnClick: false
            });

            google.maps.event.addListener(marker, 'click', function(event) {
                var lat = this.position.lat();
                var lng = this.position.lng();
                alert(this.position);
            });

            // Replace Click Event on Cluster
            google.maps.event.addListener(markerClusterer,'clusterclick', function(cluster){
              alert('center of cluster: '+cluster.getCenter())
            });


        });        

      }

      function initialize() {
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 10,
          zoomControl: true,
          scaleControl: true,
          scrollwheel: false,
          disableDoubleClickZoom: true,
          center: new google.maps.LatLng(30.267580077052116, -97.74299494922161),
          mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        refreshMap();
      }

      function clearClusters(e) {
        e.preventDefault();
        e.stopPropagation();
        markerClusterer.clearMarkers();
      }

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
                        <li class="divider-vertical"></li>
                        <li class="active"><a href="{{URL::to('/')}}"><i class="fa fa-home"></i></a></li>
                        <!--<li class="divider-vertical"></li>
                        <li><a href="#">About</a></li>-->
                        <li class="divider-vertical"></li>
                        <li><a href="{{ URL::route('get.search.index') }}">Search</a>
                        <!--<li class="divider-vertical"></li>
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
                        </li>-->
                        <li class="divider-vertical"></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="divider-vertical"></li>

                        @if (!Auth::check())
                            <li><a href="{{ URL::route('get.auth.login') }}">Login</a></li>
                            <li class="divider-vertical"></li>
                            <li><a href="{{ URL::route('get.auth.register') }}">Register</a></li>
                        @else 
                            <li><a href="{{ URL::route('get.auth.logout') }}">Logout</a></li>
                        @endif
                        <li class="divider-vertical"></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>
    </div>
    <!-- /NAVIGATION -->
</div>
<div class="main-content container">
    <div class="row">
        <div class="col-md-3 col-lg-3">

        </div>
        <div class="col-md-4 col-lg-4">
            @include('search.form2')
        </div>
        <div class="col-md-5 col-lg-5">
            @yield('content')
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="spacer-20"></div>
<!-- FOOTER -->
<div class="container">
    <div class="row footer">
        <div class="col-md-12 col-lg-12">
            <div class="pull-left">
                Copyright &copy; <?php echo date('Y'); ?> &ndash; Buy New Homes Austin. All Rights Reserved.
            </div>
            <div class="pull-right">
                <ul class="nav-footer">
                    <!--<li><a href="#">Contact Us</a></li>
                    <li><a href="#">Terms of Use</a></li>
                    <li><a href="#">Privacy Policy</a></li>-->
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- /FOOTER -->

<!-- Javascript/Jquery -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    {{js('site','framework/bootstrap.js')}}

</body>
</html>