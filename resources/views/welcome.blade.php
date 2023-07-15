<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Baker Bootstrap Theme</title>
  <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
  <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

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
                <a class="navbar-brand" href="#">Ba<span class="logo-dec">ker</span></a>
              </div>
              <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                  <?php /*<li class="active"><a href="#main-header">Home</a></li>
                  <li class=""><a href="#feature">About</a></li>
                  <li class=""><a href="#service">Services</a></li>
                  <li class=""><a href="#portfolio">Portfolio</a></li>
                  <li class=""><a href="#testimonial">Testimonial</a></li>
                  <li class=""><a href="#blog">Registro</a></li>
                  <li class=""><a href="#contact">Login</a></li>*/?>
                  <li class=""><a href="{{url('register')}}">Registro</a></li>
                  <li class=""><a href="{{url('login')}}">Login</a></li>
                </ul>
              </div>
            </div>
          </nav>
        </header>
        <div class="wrapper">
          <div class="container">
            <div class="row">
              <div class="banner-info text-center wow fadeIn delay-05s">
                <h1 class="bnr-title">We are at ba<span>ker</span></h1>
                <h2 class="bnr-sub-title">Starting a new journey!!</h2>
                <p class="bnr-para">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<br> Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip <br>ex ea commodo consequat.</p>
                <div class="brn-btn">
                  <a href="#" class="btn btn-download">Download now!</a>
                  <a href="#" class="btn btn-more">Learn More</a>
                </div>
                <div class="overlay-detail">
                  <a href="#feature"><i class="fa fa-angle-down"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/ HEADER-->
    <!---->
    <?php /* <section id="feature" class="section-padding wow fadeIn delay-05s">
      <div class="container">
        <div class="row">
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="wrap-item text-center">
              <div class="item-img">
                <img src="img/ser01.png">
              </div>
              <h3 class="pad-bt15">Creative Concept</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="wrap-item text-center">
              <div class="item-img">
                <img src="img/ser02.png">
              </div>
              <h3 class="pad-bt15">Amazing Design</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="wrap-item text-center">
              <div class="item-img">
                <img src="img/ser03.png">
              </div>
              <h3 class="pad-bt15">Cost effective</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="wrap-item text-center">
              <div class="item-img">
                <img src="img/ser04.png">
              </div>
              <h3 class="pad-bt15">Secure</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!---->
    <!---->
    <section id="service" class="section-padding wow fadeInUp delay-05s">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="service-title pad-bt15">What We Do?</h2>
            <p class="sub-title pad-bt15">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod<br>tempor incididunt ut labore et dolore magna aliqua.</p>
            <hr class="bottom-line">
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="service-item">
              <h3><span>D</span>esign And Developement</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              <a href="">learn more...</a>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="service-item">
              <h3><span>W</span>ebsite Maintenance</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              <a href="">learn more...</a>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="service-item">
              <h3><span>S</span>eo Optimization</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              <a href="">learn more...</a>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="service-item">
              <h3><span>D</span>igital Marketing</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              <a href="">Learn more...</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!---->
    <!---->
    <!---->
    <!---->
     <section id="portfolio" class="section-padding wow fadeInUp delay-05s">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="service-title pad-bt15">Our Recent Works</h2>
            <p class="sub-title pad-bt15">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod<br>tempor incididunt ut labore et dolore magna aliqua.</p>
            <hr class="bottom-line">
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item padding-right-zero mr-btn-15">
            <figure>
              <img src="img/port01.jpg" class="img-responsive">
              <figcaption>
                <h2>Project For Everyone</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nost.</p>
              </figcaption>
            </figure>
          </div>
           <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item padding-right-zero mr-btn-15">
            <figure>
              <img src="img/port02.jpg" class="img-responsive">
              <figcaption>
                <h2>Project For Everyone</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nost.</p>
              </figcaption>
            </figure>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item padding-right-zero mr-btn-15">
            <figure>
              <img src="img/port03.jpg" class="img-responsive">
              <figcaption>
                <h2>Project For Everyone</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nost.</p>
              </figcaption>
            </figure>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item padding-right-zero mr-btn-15">
            <figure>
              <img src="img/port04.jpg" class="img-responsive">
              <figcaption>
                <h2>Project For Everyone</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nost.</p>
              </figcaption>
            </figure>
          </div>
          
          <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item padding-right-zero mr-btn-15">
            <figure>
              <img src="img/port05.jpg" class="img-responsive">
              <figcaption>
                <h2>Project For Everyone</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nost.</p>
              </figcaption>
            </figure>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item padding-right-zero mr-btn-15">
            <figure>
              <img src="img/port06.jpg" class="img-responsive">
              <figcaption>
                <h2>Project For Everyone</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nost.</p>
              </figcaption>
            </figure>
          </div>
        </div>
      </div>
    </section>*/?>
    <!---->
    <!---->
    <?php /*
    <section id="testimonial" class="wow fadeInUp delay-05s">
      <div class="bg-testicolor">
        <div class="container section-padding">
          <div class="row">
            <div class="testimonial-item">
              <ul class="bxslider">
                <li>
                  <blockquote>
                    <img src="img/thumb.png" class="img-responsive">
                    <p>Come a day there won't be room for naughty men like us to slip about at all. This job goes south, there well may not be another. </p>
                  </blockquote>
                  <small>Shaun Paul, Client</small>
                </li>
                <li>
                  <blockquote>
                    <img src="img/thumb.png" class="img-responsive">
                    <p>So here is us, on the raggedy edge. Don't push me, and I won't push you. </p>
                  </blockquote>
                  <small>Marry Smith, Client</small>
                </li>
                <li>
                  <blockquote>
                    <img src="img/thumb.png" class="img-responsive">
                    <p>Come a day there won't be room for naughty men like us to slip about at all. This job goes south, there well may not be another.</p>
                  </blockquote>
                  <small>Vivek Singh, Client</small>
                </li>
                <li>
                  <blockquote>
                    <img src="img/thumb.png" class="img-responsive">
                    <p>So here is us, on the raggedy edge. Don't push me, and I won't push you.</p>
                  </blockquote>
                  <small>John Doe, Client</small>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!---->
    <section id="blog" class="section-padding wow fadeInUp delay-05s">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <h2 class="service-title pad-bt15">Latest from our blog</h2>
            <p class="sub-title pad-bt15">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod<br>tempor incididunt ut labore et dolore magna aliqua.</p>
            <hr class="bottom-line">
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="blog-sec">
              <div class="blog-img">
                <a href="">
                  <img src="img/blog01.jpg" class="img-responsive">
                </a>
              </div>
              <div class="blog-info">
                <h2>This is Lorem ipsum heading.</h2>
                <div class="blog-comment">
                  <p>Posted In: <span>Legal Advice</span></p>
                  <p>
                    <span><a href="#"><i class="fa fa-comments"></i></a> 15</span>
                    <span><a href="#"><i class="fa fa-eye"></i></a> 11</span></p>
                </div>
                <p>We cannot expect people to have respect for laws and orders until we teach respect to those we have entrusted to enforce those laws all the time. we always want to help people cordially.</p>
                <a href="" class="read-more">Read more →</a>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="blog-sec">
              <div class="blog-img">
                <a href="">
                  <img src="img/blog02.jpg" class="img-responsive">
                </a>
              </div>
              <div class="blog-info">
                <h2>This is Lorem ipsum heading.</h2>
                <div class="blog-comment">
                  <p>Posted In: <span>Legal Advice</span></p>
                  <p>
                    <span><a href="#"><i class="fa fa-comments"></i></a> 15</span>
                    <span><a href="#"><i class="fa fa-eye"></i></a> 11</span></p>
                </div>
                <p>We cannot expect people to have respect for laws and orders until we teach respect to those we have entrusted to enforce those laws all the time. we always want to help people cordially.</p>
                <a href="" class="read-more">Read more →</a>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="blog-sec">
              <div class="blog-img">
                <a href="">
                  <img src="img/blog03.jpg" class="img-responsive">
                </a>
              </div>
              <div class="blog-info">
                <h2>This is Lorem ipsum heading.</h2>
                <div class="blog-comment">
                  <p>Posted In: <span>Legal Advice</span></p>
                  <p>
                    <span><a href="#"><i class="fa fa-comments"></i></a> 15</span>
                    <span><a href="#"><i class="fa fa-eye"></i></a> 11</span></p>
                </div>
                <p>We cannot expect people to have respect for laws and orders until we teach respect to those we have entrusted to enforce those laws all the time. we always want to help people cordially.</p>
                <a href="" class="read-more">Read more →</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!---->
    <section id="contact" class="section-padding wow fadeInUp delay-05s">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center white">
            <h2 class="service-title pad-bt15">Keep in touch with us</h2>
            <p class="sub-title pad-bt15">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod<br>tempor incididunt ut labore et dolore magna aliqua.</p>
            <hr class="bottom-line white-bg">
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="loction-info white">
              <p><i class="fa fa-map-marker fa-fw pull-left fa-2x"></i>A99 Adam Street<br>Texas, TX 555072</p>
              <p><i class="fa fa-envelope-o fa-fw pull-left fa-2x"></i>info@baker.com</p>
              <p><i class="fa fa-phone fa-fw pull-left fa-2x"></i>+41 5787 2323</p>
            </div>
          </div>
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="contact-form">
              <div id="sendmessage">Your message has been sent. Thank you!</div>
              <div id="errormessage"></div>
              <form action="" method="post" role="form" class="contactForm">
                <div class="col-md-6 padding-right-zero">
                  <div class="form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validation"></div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                    <div class="validation"></div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                    <div class="validation"></div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                    <div class="validation"></div>
                  </div>
                  <button type="submit" class="btn btn-primary btn-submit">SEND NOW</button>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </section>
    <!---->
    <!---->
    <footer id="footer">
      <div class="container">
        <div class="row text-center">
          <p>&copy; Baker Theme. All Rights Reserved.</p>
          <div class="credits">
            <!--
              All the links in the footer should remain intact.
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Baker
            -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
          </div>
        </div>
      </div>
    </footer>
    <!---->*/?>
  </div>
  <script src="{{ asset('Baker/js/jquery.min.js') }}"></script>
  <script src="{{ asset('Baker/js/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('Baker/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('Baker/js/wow.js') }}"></script>
  <script src="{{ asset('Baker/js/jquery.bxslider.min.js') }}"></script>
  <script src="{{ asset('Baker/js/custom.js') }}"></script>
  <script src="{{ asset('Baker/contactform/contactform.js') }}"></script>

</body>
</html>
