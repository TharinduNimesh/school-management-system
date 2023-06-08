<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">

  <title>Home</title>

  <!-- Bootstrap core CSS -->
  <link href="/css/bootstrap.min.css" rel="stylesheet">

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="/css/home/lightbox.css">
  <link rel="stylesheet" href="/css/home/main.css">
  <link rel="stylesheet" href="/css/home/owl.css">
  <link rel="stylesheet" href="/css/home/flex-slider.css">
</head>

<body>

  <!--header Start-->
  <header class="main-header clearfix" role="header">
    <div class="logo">
      <a href="#"><em></em></a>
    </div>
    <a href="#menu" class="menu-link"><i class="fa fa-bars"></i></a>
    <nav id="menu" class="main-nav" role="navigation">
      <ul class="main-menu">
        <li class="active"><a href="#section1">Home</a></li>
        <li><a href="#section6">Contact</a></li>
        <li><a href="{{ route('login.index') }}">Login</a></li>
      </ul>
    </nav>
  </header>
  <!--header End-->


  <!-- ***** Main Banner Area Start ***** -->
  <section class="section main-banner" id="top" data-section="section1">
    <video autoplay muted loop id="bg-video">
      <source src="/img/home_images/course-video.mp4" type="video/mp4" />
    </video>

    <div class="video-overlay header-text">
      <div class="caption">
        <h6>School Management System</h6>
        <h2><em>WELCOME</em> !</h2>
      </div>
    </div>
  </section>
  <!-- ***** Main Banner Area End ***** -->

  <!-- Category Start -->
  <section class="features" id="section1">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-12">
          <div class="features-post">
            <div class="features-content">
              <div class="content-show">
                <h4><i class="fa-solid fa-user fa-beat"></i>user friendly</h4>
              </div>
              <div class="content-hide">
                <p>School Management System are designed to be user-friendly and easy to use. They are typically designed with teachers, students and parents in mind, so they are intuitive and easy to navigate.</p>
                <p class="hidden-sm">EverSoft.</p>
                <div class="scroll-to-section"><a href="#section2"></a></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-12">
          <div class="features-post second-features">
            <div class="features-content">
              <div class="content-show">
                <h4><i class="fa-sharp fa-solid fa-shield fa-beat"></i>protect privacy</h4>
              </div>
              <div class="content-hide">
                <p>School Management System are protecting privacy. They are typically designed with security in mind, so they are secure and reliable. Many school management systems also offer features such as role-based access control, which allows administrators to control who has access to sensitive information.</p>
                <p class="hidden-sm">EverSoft.</p>
                <div class="scroll-to-section"><a href="#section3"></a></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-12">
          <div class="features-post third-features">
            <div class="features-content">
              <div class="content-show">
                <h4><i class="fa-solid fa-chart-pie fa-beat"></i>Provides data and statistics</h4>
              </div>
              <div class="content-hide">
                <p>School Management System can provide valuable data nad statistics on learning outcomes, student performance, and teacher effectiveness.</p>
                <p class="hidden-sm">EverSoft.</p>
                <div class="scroll-to-section"><a href="#section4"></a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Category End -->


  <!-- Achievement Start -->
  <section class="section why-us" data-section="section2">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Why choose School Management System</h2>
          </div>
        </div>
        <div class="col-md-12">
          <div id='tabs'>
            <ul>
              <li><a href='#tabs-1'>Efficiency</a></li>
              <li><a href='#tabs-2'>Improves communication</a></li>
              <li><a href='#tabs-3'>Decision making</a></li>
            </ul>
            <section class='tabs-content'>
              <article id='tabs-1'>
                <div class="row">
                  <div class="col-md-6">
                    <img src="/img/home_images/choose-us-image-01.png" alt="">
                  </div>
                  <div class="col-md-6">
                    <h4>Efficiency</h4>
                    <p>School Management System can help streamline administrative tasks such as attendance tracking, grade reporting and scheduling. This can help save time and reduce errors.</p>
                  </div>
                </div>
              </article>
              <article id='tabs-2'>
                <div class="row">
                  <div class="col-md-6">
                    <img src="/img/home_images/choose-us-image-02.png" alt="">
                  </div>
                  <div class="col-md-6">
                    <h4>Improves communication</h4>
                    <p>School Management System can improve communication between teachers, students and parents by providing a centralized platform for sharing information. This can help ensure that everyone is on the same page and reduce misunderstandings.</p>
                  </div>
                </div>
              </article>
              <article id='tabs-3'>
                <div class="row">
                  <div class="col-md-6">
                    <img src="/img/home_images/choose-us-image-03.png" alt="">
                  </div>
                  <div class="col-md-6">
                    <h4>Decision making</h4>
                    <p>School Management System can provide valuable data and statistics on learning outcomes, student performance and teacher effectiveness. This can help school administrators make informed decisions about curriculum development, resource allocation and teacher training</p>
                  </div>
                </div>
              </article>
            </section>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Achievement End -->


  <!-- Login Button Start -->
  <!-- <section class="section courses" data-section="section4">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Choose Your Course</h2>
          </div>
        </div>
      </div>
    </div>
  </section> -->
  <!-- Login Button End -->


  <!-- Contact Start -->
  <section class="section contact" id="section6" data-section="section6">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Let’s Keep In Touch</h2>
          </div>
        </div>
        <div class="col-md-6">
          <form id="contact" action="" method="post">
            <div class="row">
              <div class="col-md-6">
                <fieldset>
                  <input name="name" type="text" class="form-control" id="name" placeholder="Your Name" required="">
                </fieldset>
              </div>
              <div class="col-md-6">
                <fieldset>
                  <input name="email" type="text" class="form-control" id="email" placeholder="Your Email" required="">
                </fieldset>
              </div>
              <div class="col-md-12">
                <fieldset>
                  <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your message..."
                    required=""></textarea>
                </fieldset>
              </div>
              <div class="col-md-12">
                <fieldset>
                  <button type="submit" id="form-submit" class="button">Send Message Now</button>
                </fieldset>
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-6">
          <div class="contact-image">
            <img src="/img/home_images/why-us.jpeg " width="100%" height="422px" frameborder="0"
              style="border-radius: 10px;" allowfullscreen>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Contact End -->


  <!-- Footer Start -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <p><i class="fa fa-copyright"></i> Copyright 2023 by School Management System
            | Design: <a href="#" rel="sponsored" target="_parent">#</a></p>
        </div>
      </div>
    </div>
  </footer>
  <!-- Footer End -->


  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="/js/home/jquery.min.js"></script>
  <script src="/js/home/bootstrap.min.js"></script>
  <script src="/js/home/lightbox.js"></script>
  <script src="/js/home/isotope.min.js"></script>
  <script src="/js/home/owl-carousel.js"></script>
  <!-- <script src="assets/js/lightbox.js"></script> -->
  <script src="/js/home/tabs.js"></script>
  <script src="/js/home/video.js"></script>
  <script src="/js/home/slick-slider.js"></script>
  <script src="/js/home/custom.js"></script>

  <script>
    //according to loftblog tut
    $('.nav li:first').addClass('active');

    var showSection = function showSection(section, isAnimate) {
      var
        direction = section.replace(/#/, ''),
        reqSection = $('.section').filter('[data-section="' + direction + '"]'),
        reqSectionPos = reqSection.offset().top - 0;

      if (isAnimate) {
        $('body, html').animate({
          scrollTop: reqSectionPos
        },
          800);
      } else {
        $('body, html').scrollTop(reqSectionPos);
      }

    };

    var checkSection = function checkSection() {
      $('.section').each(function () {
        var
          $this = $(this),
          topEdge = $this.offset().top - 80,
          bottomEdge = topEdge + $this.height(),
          wScroll = $(window).scrollTop();
        if (topEdge < wScroll && bottomEdge > wScroll) {
          var
            currentId = $this.data('section'),
            reqLink = $('a').filter('[href*=\\#' + currentId + ']');
          reqLink.closest('li').addClass('active').
            siblings().removeClass('active');
        }
      });
    };

    $(window).scroll(function () {
      checkSection();
    });
  </script>
</body>
</html>