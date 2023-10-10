<!DOCTYPE html>
<!--
	24 News by FreeHTML5.co
	Twitter: https://twitter.com/fh5co
	Facebook: https://fb.com/fh5co
	URL: https://freehtml5.co
-->
<html lang="en" class="no-js">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="admin_asset_web/images/logo.png">
    <title>24 News —  Website </title>
    <base href="{{asset('')}}">
    <link href="admin_asset_web/css/media_query.css" rel="stylesheet" type="text/css"/>
    <link href="admin_asset_web/css/bootstrap.css" rel="stylesheet" type="text/css"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="admin_asset_web/css/animate.css" rel="stylesheet" type="text/css"/>
    <link href="admin_asset_web/css/owl.carousel.css" rel="stylesheet" type="text/css"/>
    <link href="admin_asset_web/css/owl.theme.default.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="admin_asset_web/css/plugins.css">
    <link rel="stylesheet" type="text/css" href="admin_asset_web/css/style.css">
    <!-- Bootstrap CSS -->
    <link href="admin_asset_web/css/style_1.css" rel="stylesheet" type="text/css"/>
    @yield('css')
    <!-- Modernizr JS -->
    <script src="admin_asset_web/js/modernizr-3.5.0.min.js"></script>
    <style>
        input[type=text] {
            width: 130px;
            -webkit-transition: width 0.4s ease-in-out;
            transition: width 0.4s ease-in-out;
        }
        /* When the input field gets focus, change its width to 100% */
        input[type=text]:focus {
            width: 100%;
        }
        .fh5co_news_img iframe {
            height: 200px !important;
            width: 350px !important;
            /*min-width: 100%;*/
        }
        .fh5co_news_img_tiger {
            height: 225px !important;
            width: 360px !important;
        }
        .fh5co_news_img > img {
            height: 225px;
        }
        .fh5co_news_img {
            height: 200px;
            overflow: hidden;
            position: relative;
            top: 0;
        }

    </style>
</head>
<body>
@include('layout.menu')

@yield('content')


@include('layout.footer')

<!-- Bootstrap Core JavaScript -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="admin_asset_web/js/owl.carousel.min.js"></script>
<!--<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"
        integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
        integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn"
        crossorigin="anonymous"></script>
<!-- Waypoints -->
<script src="admin_asset_web/js/jquery.waypoints.min.js"></script>
<!-- Parallax -->
<script src="js/jquery.stellar.min.js"></script>
<!-- Main -->
<script src="admin_asset_web/js/main.js"></script>
<script>if (!navigator.userAgent.match(/Android|BlackBerry|iPhone|iPad|iPod|Opera Mini|IEMobile/i)){$(window).stellar();}</script>


@yield('script')

</body>
</html>
