<!DOCTYPE html>
<html lang="en" dir="ltr" class="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <title>Urban Strategies</title>
    <link rel="icon" type="image/png" href="assets/images/logo/favicon.svg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/rt-plugins.css') }}">
    <link href="https://unpkg.com/aos@2.3.0/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <!-- START : Theme Config js-->
    <script src="assets/js/settings.js" sync></script>
    <!-- END : Theme Config js-->
    <meta http-equiv="refresh" content="10;URL={{url('/')}}" />
</head>

<body class=" font-inter skin-default">
    <div class="min-h-screen flex flex-col justify-center items-center text-center py-20">
        <img src="{{ asset('assets/images/svg') }}/img-2.svg" style="max-width: 600px" alt="">
        <div class="max-w-[546px] mx-auto w-full mt-12">
            <h4 class="text-slate-900 mb-4" style="text-transform: none;">Lo sentimos </h4>
            <div class="text-slate-600 dark:text-slate-300 text-base font-normal mb-10">
                Su iglesia aun no esta, preparada para unirse al programa.
            </div>
        </div>
        <div class="max-w-[300px] mx-auto w-full">
            <a href="{{ url('/') }}" class="btn btn-dark dark:bg-slate-800 block text-center"
                style="text-transform: none;">
                Te invitamos a unirte mas adelante.
            </a>
        </div>
    </div>
    <!-- scripts -->
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/rt-plugins.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
</body>

</html>




{{-- <!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Te invitamos a unirte mas adelante</title>
  <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
  <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">
 <meta http-equiv="refresh" content="10;URL=http://urban.emundialesdemos.com/home" />

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:400,300|Raleway:300,400,900,700italic,700,300,600">
  <link rel="stylesheet" type="text/css" href="{{ asset('Baker/css/jquery.bxslider.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('Baker/css/font-awesome.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('Baker/css/bootstrap.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('Baker/css/animate.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('Baker/css/style.css') }}">
  <!-- =======================================================
    Theme Name: Baker
    Theme URL: https://bootstrapmade.com/baker-free-onepage-bootstrap-theme/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>
<style>
    img {
  height: 40%;
  width: 40%;
}
</style>
<body>

  <div class="loader"></div>
  <div id="myDiv">
    <!--HEADER-->
    <div class="header">
      <div class="bg-color">
        <header id="main-header">
          <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
          </nav>
        </header>
        <div class="wrapper">
          <div class="container">
            <div class="row">
              <div class="banner-info text-center wow fadeIn delay-05s">
                <table>
                    <tr><td>
                        <h1 class="bnr-sub-title">Lo Sentimos ,<br> su iglesia aun no esta<br>
                            preparada para unirse al programa.</h1><p></p>
                            <h4 class="bnr-sub-title">Te invitamos a unirte mas adelante.</h4>
                </td><td>
                  <p class="bnr-para"></p><div>
                    <img src="{{asset('/img/losentimos.png')}}">
                     <p>
                   </div>
                </td>
            </tr>
              </div>
            </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('Baker/js/jquery.min.js') }}"></script>
  <script src="{{ asset('Baker/js/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('Baker/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('Baker/js/wow.js') }}"></script>
  <script src="{{ asset('Baker/js/jquery.bxslider.min.js') }}"></script>
  <script src="{{ asset('Baker/js/custom.js') }}"></script>
  <script src="{{ asset('Baker/contactform/contactform.js') }}"></script>
</body>
</html> --}}
