<!DOCTYPE html>
<html class="no-js" lang="ar" dir="rtl">

<head>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Title -->
    <title>الوسمي</title>

    <!-- Favicon -->
    <link rel="icon" href="images/favicon.ico" type="/logo.png">

    <!-- Google web font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:200,300,400,500,700">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/library/bootstrap/css/bootstrap.min.css">

    <!-- Font awesome -->
    <link rel="stylesheet" href="assets/library/fontawesome/css/all.min.css">

    <!-- Linea icons -->
    <link rel="stylesheet" href="assets/library/linea/arrows/styles.css" />
    <link rel="stylesheet" href="assets/library/linea/basic/styles.css" />
    <link rel="stylesheet" href="assets/library/linea/ecommerce/styles.css" />
    <link rel="stylesheet" href="assets/library/linea/software/styles.css" />
    <link rel="stylesheet" href="assets/library/linea/weather/styles.css" />

    <!-- Animate -->
    <link rel="stylesheet" href="assets/library/animate/animate.css">

    <!-- Lightcase -->
    <link rel="stylesheet" href="assets/library/lightcase/css/lightcase.css">

    <!-- Swiper -->
    <link rel="stylesheet" href="assets/library/swiper/swiper-bundle.min.css">

    <!-- Owl carousel -->
    <link rel="stylesheet" href="assets/library/owlcarousel/owl.carousel.min.css">

    <!-- Slick carousel -->
    <link rel="stylesheet" href="assets/library/slick/slick.css">

    <!-- Magnific popup -->
    <link rel="stylesheet" href="assets/library/magnificpopup/magnific-popup.css">

    <!-- YTPlayer -->
    <link rel="stylesheet" href="assets/library/ytplayer/css/jquery.mb.ytplayer.min.css">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/media.css">

    <!-- Color schema -->
    <link rel="stylesheet" href="assets/colors/blue.css" class="colors">
    <style>
        .custom-alert {
            display: none;
            position: fixed;
            left: 50%;
            transform: translateX(-50%);
            bottom: 20px;
            padding: 15px 20px;
            background-color: #f44336;
            /* Red background */
            color: white;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            z-index: 1000;
        }

        .custom-alert button {
            margin-left: 20px;
            background-color: white;
            color: #f44336;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .custom-alert button:hover {
            background-color: #f44336;
            color: white;
        }

        .toast {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 300px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
            overflow: hidden;
            font-family: 'Arial', sans-serif;
            z-index: 1000;
        }

        .toast-header {
            display: flex;
            align-items: center;
            padding: 10px 20px;
            background-color: #4CAF50;
            /* Green color */
            color: #ffffff;
        }

        .toast-icon {
            margin-right: 10px;
            font-size: 18px;
        }

        .toast-title {
            font-weight: bold;
        }

        .toast-body {
            padding: 10px 20px;
            border-top: 1px solid #e9e9e9;
            background-color: #f7f7f7;
        }
    </style>
</head>

<body>
    @php
        $images = ['landing/images/screenshots/1.png', 'landing/images/screenshots/2.png', 'landing/images/screenshots/3.png', 'landing/images/screenshots/4.png', 'landing/images/screenshots/5.png', 'landing/images/screenshots/6.png', 'landing/images/screenshots/7.png', 'landing/images/screenshots/8.png', 'landing/images/screenshots/9.png', 'landing/images/screenshots/10.png', 'landing/images/screenshots/11.png', 'landing/images/screenshots/12.png', 'landing/images/screenshots/13.png', 'landing/images/screenshots/14.png', 'landing/images/screenshots/15.png', 'landing/images/screenshots/16.png', 'landing/images/screenshots/15.png', 'landing/images/screenshots/15.png']; //,
    @endphp
    <!-- Loader -->
    <div class="page-loader">
        <div class="progress"></div>
    </div>

    <!-- Header -->
    <header id="top-page" class="header">

        <!-- Main menu -->
        <div id="mainNav" class="main-menu-area animated">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-12 col-lg-2 d-flex justify-content-between align-items-center">

                        <!-- Logo -->
                        <div class="logo">

                            <a class="navbar-brand navbar-brand1" href="image.html">
                                <img src="{{ URL::asset('logow.png') }}" alt="Naxos" data-rjs="2" />
                            </a>

                            <a class="navbar-brand navbar-brand2" href="image.html">
                                <img src="{{ URL::asset('logow.png') }}" alt="Naxos" data-rjs="2" />
                            </a>

                        </div>

                        <!-- Burger menu -->
                        <div class="menu-bar d-lg-none">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>

                    </div>

                    <div class="op-mobile-menu col-lg-10 p-0 d-lg-flex align-items-center justify-content-end">

                        <!-- Mobile menu -->
                        <div class="m-menu-header d-flex justify-content-between align-items-center d-lg-none">

                            <!-- Logo -->
                            <a href="#" class="logo">
                                <img src="{{ URL::asset('logow.png') }}" alt="Naxos" data-rjs="2" />
                            </a>

                            <!-- Close button -->
                            <span class="close-button"></span>

                        </div>

                        <!-- Items -->
                        <ul class="nav-menu d-lg-flex flex-wrap list-unstyled justify-content-center">

                            <li class="nav-item">
                                <a class="nav-link js-scroll-trigger active" href="#top-page">
                                    <span>الرئيسية</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link js-scroll-trigger" href="#features">
                                    <span>المميزات</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link js-scroll-trigger" href="#screenshots">
                                    <span>لقطات الشاشة</span>
                                </a>
                            </li>

                            {{-- <li class="nav-item">
                                <a class="nav-link js-scroll-trigger" href="#support">
                                    <span>Support</span>
                                </a>
                            </li> --}}

                            {{-- <li class="nav-item">
                                <a class="nav-link js-scroll-trigger" href="#pricing">
                                    <span>Pricing</span>
                                </a>
                            </li> --}}

                            <li class="nav-item">
                                <a class="nav-link js-scroll-trigger" href="blog.html">
                                    <span>مدونة</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link js-scroll-trigger" href="contact.html">
                                    <span>تواصل معنا</span>
                                </a>
                            </li>

                            <li class="nav-item search-option">
                                <a class="nav-link" href="#">
                                    <i class="fas fa-search"></i>
                                </a>
                            </li>

                        </ul>

                    </div>

                </div>
            </div>
        </div>

    </header>

    <!-- Search wrapper -->
    <div class="search-wrapper">

        <!-- Search form -->
        <form role="search" method="get" class="search-form" action="#">
            <input type="search" name="s" id="s" placeholder="Search Keyword"
                class="searchbox-input" autocomplete="off" required />

            <span>Input your search keywords and press Enter.</span>
        </form>

        <!-- Close button -->
        <div class="search-wrapper-close">
            <span class="search-close-btn"></span>
        </div>

    </div>

    <!-- Banner -->
    <section id="home" class="banner image-bg">

        <!-- Container -->
        <div class="container">

            <div class="row align-items-center">

                <!-- Content -->
                <div class="col-12 col-lg-6 res-margin">

                    <!-- Banner text -->
                    <div class="banner-text">

                        <h1 class="wow fadeInUp" data-wow-offset="10" data-wow-duration="1s" data-wow-delay="0s">


                            تطبيق الوسمـــــي<br> يوفر لك جميع النوادي
                        </h1>

                        <p class="wow fadeInUp" data-wow-offset="10" data-wow-duration="1s" data-wow-delay="0.3s">
                            هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من
                            مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة
                            إلى زيادة عدد الحروف التى يولدها التطبيق
                        </p>

                        <div class="button-store wow fadeInUp" data-wow-offset="10" data-wow-duration="1s"
                            data-wow-delay="0.6s">

                            <a href="#" class="custom-btn d-inline-flex align-items-center m-2 m-sm-0 me-sm-3">
                                <i class="fab fa-google-play"></i>
                                <p>Available on<span>Google Play</span></p>
                            </a>

                            <a href="#" class="custom-btn d-inline-flex align-items-center m-2 m-sm-0">
                                <i class="fab fa-apple"></i>
                                <p>Download on<span>App Store</span></p>
                            </a>

                        </div>

                    </div>

                </div>

                <!-- Image -->
                <div class="col-12 col-lg-6">

                    <div class="banner-image wow fadeInUp" data-wow-offset="10" data-wow-duration="1s"
                        data-wow-delay="0.3s">
                        <img class="bounce-effect" src="{{ URL::asset('3.png') }}" alt="" />
                    </div>

                </div>

            </div>

        </div>

        <!-- Wave effect -->
        <div class="wave-effect wave-anim">

            <div class="waves-shape shape-one">
                <div class="wave wave-one"></div>
            </div>

            <div class="waves-shape shape-two">
                <div class="wave wave-two"></div>
            </div>

            <div class="waves-shape shape-three">
                <div class="wave wave-three"></div>
            </div>

        </div>

    </section>


    <!-- Features -->
    <section id="features">

        <!-- Container -->
        <div class="container">

            <!-- Section title -->
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-6">

                    <div class="section-title text-center">
                        <h3>ميزات رائـــــــعة</h3>
                        <p>
                            هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم
                            من مولد النص العربى
                        </p>
                    </div>

                </div>
            </div>

            <div class="row d-flex align-items-center">

                <!-- Left -->
                <div class="col-12 col-md-6 col-lg-4">

                    <ul class="features-item">

                        <!-- Feature box -->
                        <li>
                            <div class="feature-box d-flex">

                                <!-- Box icon -->
                                <div class="box-icon">
                                    <img src="{{ URL::asset('icon.png') }}" style="height: 40px; width:60px ;"
                                        alt="">
                                </div>

                                <!-- Box Text -->
                                <div class="box-text align-self-center align-self-md-start">
                                    <h4>انواع مختلفة من الفعــــــاليات</h4>
                                    <p>هذا النص هو مثال لنص يمكن أن يستبدل في
                                        نفس المساحة لقد تم توليد هذا النص من مولد
                                        النص العربى، حيث يمكنك أن تولد مثل.</p>
                                </div>

                            </div>
                        </li>

                        <!-- Feature box -->
                        <li>
                            <div class="feature-box d-flex">

                                <!-- Box icon -->
                                <div class="box-icon">
                                    <img src="{{ URL::asset('icon.png') }}" style="height: 40px; width:60px ;"
                                        alt="">
                                </div>

                                <!-- Box Text -->
                                <div class="box-text align-self-center align-self-md-start">
                                    <h4>انواع مختلفة من الفعــــــاليات</h4>
                                    <p>هذا النص هو مثال لنص يمكن أن يستبدل في
                                        نفس المساحة لقد تم توليد هذا النص من مولد
                                        النص العربى، حيث يمكنك أن تولد مثل.</p>
                                </div>

                            </div>
                        </li>


                        <!-- Feature box -->
                        <li>
                            <div class="feature-box d-flex">

                                <!-- Box icon -->
                                <div class="box-icon">
                                    <img src="{{ URL::asset('icon.png') }}" style="height: 40px; width:60px ;"
                                        alt="">
                                </div>

                                <!-- Box Text -->
                                <div class="box-text align-self-center align-self-md-start">
                                    <h4>انواع مختلفة من الفعــــــاليات</h4>
                                    <p>هذا النص هو مثال لنص يمكن أن يستبدل في
                                        نفس المساحة لقد تم توليد هذا النص من مولد
                                        النص العربى، حيث يمكنك أن تولد مثل.</p>
                                </div>

                            </div>
                        </li>

                    </ul>
                </div>

                <!-- Center -->
                <div class="col-12 col-lg-4 d-none d-lg-block">
                    <div class="features-thumb text-center">
                        <img src="{{ URL::asset('w.png') }}" alt="" />
                    </div>
                </div>

                <!-- Right -->
                <div class="col-12 col-md-6 col-lg-4">

                    <ul class="features-item">

                        <!-- Feature box -->
                        <li>
                            <div class="feature-box d-flex">

                                <!-- Box icon -->
                                <div class="box-icon">
                                    <img src="{{ URL::asset('icon.png') }}" style="height: 40px; width:60px ;"
                                        alt="">
                                </div>

                                <!-- Box Text -->
                                <div class="box-text align-self-center align-self-md-start">
                                    <h4>انواع مختلفة من الفعــــــاليات</h4>
                                    <p>هذا النص هو مثال لنص يمكن أن يستبدل في
                                        نفس المساحة لقد تم توليد هذا النص من مولد
                                        النص العربى، حيث يمكنك أن تولد مثل.</p>
                                </div>

                            </div>
                        </li>


                        <!-- Feature box -->
                        <li>
                            <div class="feature-box d-flex">

                                <!-- Box icon -->
                                <div class="box-icon">
                                    <img src="{{ URL::asset('icon.png') }}" style="height: 40px; width:60px ;"
                                        alt="">
                                </div>

                                <!-- Box Text -->
                                <div class="box-text align-self-center align-self-md-start">
                                    <h4>انواع مختلفة من الفعــــــاليات</h4>
                                    <p>هذا النص هو مثال لنص يمكن أن يستبدل في
                                        نفس المساحة لقد تم توليد هذا النص من مولد
                                        النص العربى، حيث يمكنك أن تولد مثل.</p>
                                </div>

                            </div>
                        </li>


                        <li>
                            <div class="feature-box d-flex">

                                <!-- Box icon -->
                                <div class="box-icon">
                                    <img src="{{ URL::asset('icon.png') }}" style="height: 40px; width:60px ;"
                                        alt="">
                                </div>

                                <!-- Box Text -->
                                <div class="box-text align-self-center align-self-md-start">
                                    <h4>انواع مختلفة من الفعــــــاليات</h4>
                                    <p>هذا النص هو مثال لنص يمكن أن يستبدل في
                                        نفس المساحة لقد تم توليد هذا النص من مولد
                                        النص العربى، حيث يمكنك أن تولد مثل.</p>
                                </div>

                            </div>
                        </li>


                    </ul>
                </div>

            </div>

        </div>

    </section>

    <!-- Parallax video -->
    <section id="parallax-video" class="parallax" data-image="{{ asset('landing/images/foo.png') }}">

        <!-- Overlay -->
        <div class="overlay"></div>

        <!-- Container -->
        <div class="container">

            <div class="row">

                <div class="video-btn wow fadeInUp" data-wow-offset="10" data-wow-duration="1s" data-wow-delay="0s">

                    <!-- Play button -->
                    <a href="https://www.youtube.com/embed/hs1HoLs4SD0" data-rel="lightcase" class="play-btn">
                        <i class="fas fa-play"></i>
                    </a>

                    <span class="video-text">شاهد هذا الفيديـــــو</span>

                </div>

            </div>

        </div>

    </section>

    <!-- Services -->
    <section id="services">

        <!-- Container -->
        <div class="container">

            <!-- Section title -->
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-6">

                    <div class="section-title text-center">
                        <h3>كيف تعمــــــل؟</h3>
                        <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم
                            من مولد النص العربى.
                        </p>
                    </div>

                </div>
            </div>

            <div class="row">

                <!-- Service 1 -->
                <div class="col-12 col-lg-4 res-margin wow fadeInUp" data-wow-offset="10" data-wow-duration="1s"
                    data-wow-delay="0">
                    <div class="service-single">

                        <div class="icon icon-basic-server2"></div>

                        <h5>افضل الانشطــــــة</h5>
                        <p>
                            اكتشف عالمًا مليئًا بالنشاطات الرياضية الممتعة والمثيرة مع تطبيق Sportify. احصل على فرصة
                            لممارسة رياضتك المفضلة، اكتساب لياقة بدنية، وتوسيع شبكة محبي الرياضة من خلال تجربة سهلة
                            وممتعة.
                        </p>

                    </div>
                </div>

                <!-- Service 2 -->
                <div class="col-12 col-lg-4 res-margin wow fadeInUp" data-wow-offset="10" data-wow-duration="1s"
                    data-wow-delay="0.3s">
                    <div class="service-single">

                        <div class="icon icon-basic-headset"></div>

                        <h5>24/24 الدعم </h5>
                        <p>
                            استمتع براحة البال واطمئنان الفكر مع Empower24، خدمة الدعم الاستثنائية المتوفرة لك على مدار
                            الساعة. سواء كنت بحاجة إلى مساعدة فنية، استفسارات حول المنتجات أو حتى مجرد شخص يستمع إليك،

                        </p>

                    </div>
                </div>

                <!-- Service 3 -->
                <div class="col-12 col-lg-4 res-margin wow fadeInUp" data-wow-offset="10" data-wow-duration="1s"
                    data-wow-delay="0.6s">
                    <div class="service-single">

                        <div class="icon icon-software-pen"></div>

                        <h5>انضم إلى مجتمع رائع</h5>
                        <p>
                            مجموعة رائعة من الأشخاص المشتركين في تطبيقنا. انضم إلى مجتمعنا النشط والمتحمس واستكشف
                            تفاعلات وتحديات رائعة مع أعضاء ذوي اهتمامات مشابهة. هنا، ستجد منصة تسمح لك بالتواصل


                        </p>

                    </div>
                </div>

            </div>

        </div>

    </section>


    <!-- Testimonials -->
    {{-- <section id="testimonials">

        <!-- Container -->
        <div class="container">

            <!-- Section title -->
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-6">

                    <div class="section-title text-center">
                        <h3>مراجعـــات العمـــــلاء</h3>
                        <p>
                            رؤية واقعية لتجربة العميل: توفر مراجعات العملاء نظرة حقيقية وموثوقة حول تجربتهم الشخصية مع
                            المنتج أو الخدمة
                        </p>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-12 testimonial-carousel">

                    <!-- Text -->
                    <div class="block-text row" style="align-content: center;">
                        <div class="carousel-text testimonial-slider col-12 col-lg-8 offset-lg-2">

                            <div>
                                <div class="single-box">
                                    <p><i class="fas fa-quote-left"></i>
                                        نحن نؤمن بأهمية آراء عملائنا، وهذا هو السبب في أننا ندعوك للمشاركة برأيك وتجربتك
                                        معنا. نحن نسعى جاهدين لتحقيق الجودة والتميز في كل جانب من جوانب خدماتنا،
                                        وبالتالي فإن مراجعتك تلعب دورًا حاسمًا في تطوير وتحسين ما نقدمه لك.
                                        <i class="fas fa-quote-right"></i>
                                    </p>
                                </div>
                            </div>

                            <div>
                                <div class="single-box">
                                    <p><i class="fas fa-quote-left"></i> Aenean sit amet est orci. Aenean at nisi eget
                                        nulla lobortis commodo. Nam eget lorem in ex aliquam dapibus sed augue auctor
                                        purus vitae, venenatis ex. <i class="fas fa-quote-right"></i></p>
                                </div>
                            </div>

                            <div>
                                <div class="single-box">
                                    <p><i class="fas fa-quote-left"></i> Suspendisse non velit lacus. Mauris efficitur
                                        lorem a justo semper, ut suscipit ligula malesuada. Donec dui nulla laoreet
                                        tortor in auctor interdum. <i class="fas fa-quote-right"></i></p>
                                </div>
                            </div>

                            <div>
                                <div class="single-box">
                                    <p><i class="fas fa-quote-left"></i> Vestibulum lectus massa, volutpat ut tristique
                                        nec, volutpat in turpis. In vehicula tempus odio. Nullam enim ligula condimentum
                                        est sed urna tristique rhoncus. <i class="fas fa-quote-right"></i></p>
                                </div>
                            </div>

                            <div>
                                <div class="single-box">
                                    <p><i class="fas fa-quote-left"></i> Nunc accumsan finibus sollicitudin. Integer
                                        malesuada purus sapien, sit amet volutpat sem fringilla ut. Proin viverra
                                        scelerisque mollis iaculis id magna ut vestibulum. <i
                                            class="fas fa-quote-right"></i></p>
                                </div>
                            </div>

                            <div>
                                <div class="single-box">
                                    <p><i class="fas fa-quote-left"></i> Cras et est eu tellus fringilla congue. Nunc
                                        efficitur libero ut nunc volutpat porttitor. Aliquam in justo at neque ac massa
                                        ultricies, lobortis sem. <i class="fas fa-quote-right"></i></p>
                                </div>
                            </div>

                            <div>
                                <div class="single-box">
                                    <p><i class="fas fa-quote-left"></i> Vivamus pellentesque dignissim neque, quis
                                        viverra diam venenatis sit amet. Donec dignissim turpis quis libero posuere
                                        auctor finibus fermentum libero. <i class="fas fa-quote-right"></i></p>
                                </div>
                            </div>
                            <div>
                                <div class="single-box">
                                    <p><i class="fas fa-quote-left"></i> Aenean varius accumsan eros, id molestie leo
                                        vestibulum a. Ut semper dictum feugiat. Integer tincidunt interdum eros ut
                                        accumsan erat lectus, ultrices. <i class="fas fa-quote-right"></i></p>
                                </div>
                            </div>

                            <div>
                                <div class="single-box">
                                    <p><i class="fas fa-quote-left"></i> Morbi viverra ultrices magna vel egestas.
                                        Suspendisse rutrum, lacus nec sodales gravida, augue ante sollicitudin sem
                                        fringilla euismod mauris ut metus nisl. <i class="fas fa-quote-right"></i></p>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Media -->
                    <div class="block-media row">
                        <div class="carousel-images testimonial-nav col-12 col-lg-8 offset-lg-2">

                            <div>
                                <img src="images/testimonials/client-1.jpg" alt=""
                                    class="img-fluid rounded-circle">
                                <div class="client-info">
                                    <h3>Jane Aniston</h3>
                                    <span>From Globex</span>
                                </div>
                            </div>

                            <div>
                                <img src="images/testimonials/client-2.jpg" alt=""
                                    class="img-fluid rounded-circle">
                                <div class="client-info">
                                    <h3>Martin Jack</h3>
                                    <span>From Hooli</span>
                                </div>
                            </div>

                            <div>
                                <img src="images/testimonials/client-3.jpg" alt=""
                                    class="img-fluid rounded-circle">
                                <div class="client-info">
                                    <h3>David Dowsy</h3>
                                    <span>From Acme</span>
                                </div>
                            </div>

                            <div>
                                <img src="images/testimonials/client-4.jpg" alt=""
                                    class="img-fluid rounded-circle">
                                <div class="client-info">
                                    <h3>Doglas Kosta</h3>
                                    <span>From Soylent</span>
                                </div>
                            </div>

                            <div>
                                <img src="images/testimonials/client-5.jpg" alt=""
                                    class="img-fluid rounded-circle">
                                <div class="client-info">
                                    <h3>Anthony Lee</h3>
                                    <span>From Initech</span>
                                </div>
                            </div>

                            <div>
                                <img src="images/testimonials/client-6.jpg" alt=""
                                    class="img-fluid rounded-circle">
                                <div class="client-info">
                                    <h3>Jonathon Doe</h3>
                                    <span>From Umbrella</span>
                                </div>
                            </div>

                            <div>
                                <img src="images/testimonials/client-7.jpg" alt=""
                                    class="img-fluid rounded-circle">
                                <div class="client-info">
                                    <h3>Xenia Mell</h3>
                                    <span>From Massive</span>
                                </div>
                            </div>
                            <div>
                                <img src="images/testimonials/client-8.jpg" alt=""
                                    class="img-fluid rounded-circle">
                                <div class="client-info">
                                    <h3>Shane Catson</h3>
                                    <span>From Capital</span>
                                </div>
                            </div>

                            <div>
                                <img src="images/testimonials/client-9.jpg" alt="3"
                                    class="img-fluid rounded-circle">
                                <div class="client-info">
                                    <h3>Chris Wort</h3>
                                    <span>From Sylhost</span>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>

    </section> --}}

    <!-- Counters -->
    <section id="counters" class="parallax" data-image="{{ asset('landing/images/foo.png') }}">

        <!-- Overlay -->
        <div class="overlay"></div>

        <!-- Container -->
        <div class="container">

            <div class="row">

                <!-- Counter 1 -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="counter wow fadeInUp" data-wow-offset="10" data-wow-duration="1s"
                        data-wow-delay="0">
                        <div class="icon icon-basic-download"></div>
                        <div class="counter-content res-margin">
                            <h5>
                                <span class="number-count">2067</span>
                            </h5>
                            <p>Total Downloads</p>
                        </div>
                    </div>
                </div>

                <!-- Counter 2 -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="counter wow fadeInUp" data-wow-offset="10" data-wow-duration="1s"
                        data-wow-delay="0.3s">
                        <div class="icon icon-ecommerce-bag-plus"></div>
                        <div class="counter-content res-margin">
                            <h5>
                                <span class="number-count">982</span>
                            </h5>
                            <p>Happy Clients</p>
                        </div>
                    </div>
                </div>

                <!-- Counter 3 -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="counter wow fadeInUp" data-wow-offset="10" data-wow-duration="1s"
                        data-wow-delay="0.6s">
                        <div class="icon icon-basic-tablet"></div>
                        <div class="counter-content res-margin">
                            <h5>
                                <span class="number-count">890</span>
                            </h5>
                            <p>Active Users</p>
                        </div>
                    </div>
                </div>

                <!-- Counter 4 -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="counter wow fadeInUp" data-wow-offset="10" data-wow-duration="1s"
                        data-wow-delay="0.9s">
                        <div class="icon icon-basic-star"></div>
                        <div class="counter-content">
                            <h5>
                                <span class="number-count">537</span>
                            </h5>
                            <p>App Rates</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section>


    <!-- Screenshots -->
    <section id="screenshots" class="bg-grey">

        <!-- Container -->
        <div class="container">

            <!-- Section title -->
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-6">

                    <div class="section-title text-center">
                        <h3>لقطــات شاشة التطـــــبيق</h3>
                        <p>نحن ملتزمون بمساعدة عملائنا على إنشاء علامة تجارية من فكرة بسيطة.</p>
                    </div>

                </div>
            </div>

            <div class="row">

                <div class="col-12">
                    <!-- Carousel -->
                    <div class="owl-carousel owl-theme screenshot-slider zoom-screenshot">
                        @foreach ($images as $item)
                            <div class="">
                                <a href="{{ URL::asset($item) }}">
                                    <img src="{{ URL::asset($item) }}" alt="" />
                                </a>
                            </div>
                        @endforeach
                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- Subscribe -->
    {{-- <section id="subscribe" class="parallax" data-image="images/parallax/subscribe.jpg">

        <!-- Overlay -->
        <div class="overlay"></div>

        <!-- Container -->
        <div class="container">

            <!-- Section title -->
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-6">

                    <div class="section-title text-center white">
                        <h3 class="text-white">Subscribe To Newsletter</h3>
                        <p>Vivamus ornare feugiat orci eu faucibus. Phasellus nulla arcu, pharetra nec laoreet in,
                            scelerisque a lectus.</p>
                    </div>

                </div>
            </div>

            <!-- Newsletter form -->
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-6">

                    <form id="subscribe-form" action="php/subscribe.php" method="post">
                        <div class="input-group mb-3">
                            <input type="email" name="email" class="form-control field-subscribe"
                                placeholder="Enter Your Email Address" required />
                        </div>
                        <button type="submit" class="btn w-100">Subscribe</button>
                    </form>

                    <h3 id="subscribe-result" class="text-center text-white">
                        Thanks for subscribing!
                    </h3>

                    <div class="empty-30"></div>

                    <p class="text-center mb-0">
                        We don’t share your personal information with anyone or company.
                        Check out our <a href="#"><strong>Privacy Policy</strong></a> for more information.
                    </p>

                </div>
            </div>

        </div>

    </section> --}}

    <!-- Blog -->
    {{-- <section id="blog">

        <!-- Container -->
        <div class="container">

            <!-- Section title -->
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-6">

                    <div class="section-title text-center">
                        <h3>Latest Blog Posts</h3>
                        <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere ipsum dolor sit
                            amet, consectetur elit.</p>
                    </div>

                </div>
            </div>

            <div class="row blog-home">

                <!-- Post 1 -->
                <div class="col-12 col-lg-4 res-margin">

                    <div class="blog-col">

                        <p>
                            <a href="blog-post.html">
                                <img src="images/blog/post-1.jpg" class="blog-img" alt="" />
                            </a>
                            <span class="blog-category">Photography</span>
                        </p>

                        <div class="blog-wrapper">
                            <div class="blog-text">

                                <p class="blog-about">
                                    <span>Matthew Johns</span>
                                    <span>January 14, 2023</span>
                                </p>

                                <h4>
                                    <a href="blog-post.html">Assorted Color Buildings and Sea in Riomaggiore</a>
                                </h4>

                                <p>
                                    Quisque dui at erat auctor pulvinar nisl felis, gravida et aliquam vitae, aliquet
                                    quis nibh.
                                    <a href="blog-post.html" class="btn-read-more">Read More</a>
                                </p>

                            </div>
                        </div>

                    </div>

                </div>

                <!-- Post 2 -->
                <div class="col-12 col-lg-4 res-margin">

                    <div class="blog-col">

                        <p>
                            <a href="blog-post.html">
                                <img src="images/blog/post-2.jpg" class="blog-img" alt="" />
                            </a>
                            <span class="blog-category">Lifestyle</span>
                        </p>

                        <div class="blog-wrapper">
                            <div class="blog-text">

                                <p class="blog-about">
                                    <span>Alex Wesly</span>
                                    <span>March 30, 2022</span>
                                </p>

                                <h4>
                                    <a href="blog-post.html">Aerial Photography of Snowy Mountain Ranges</a>
                                </h4>

                                <p>
                                    Quisque dui at erat auctor pulvinar nisl felis, gravida et aliquam vitae, aliquet
                                    quis nibh.
                                    <a href="blog-post.html" class="btn-read-more">Read More</a>
                                </p>

                            </div>
                        </div>

                    </div>

                </div>

                <!-- Post 3 -->
                <div class="col-12 col-lg-4">

                    <div class="blog-col">

                        <p>
                            <a href="blog-post.html">
                                <img src="images/blog/post-3.jpg" class="blog-img" alt="" />
                            </a>
                            <span class="blog-category">Development</span>
                        </p>

                        <div class="blog-wrapper">
                            <div class="blog-text">

                                <p class="blog-about">
                                    <span>Richard Jackson</span>
                                    <span>February 12, 2022</span>
                                </p>

                                <h4>
                                    <a href="blog-post.html">Forest Highway With Green Leaves</a>
                                </h4>

                                <p>
                                    Quisque dui at erat auctor pulvinar nisl felis, gravida et aliquam vitae, aliquet
                                    quis nibh.
                                    <a href="blog-post.html" class="btn-read-more">Read More</a>
                                </p>

                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section> --}}


    <!-- Contact -->
    <section id="contact">

        <!-- Container -->
        <div class="container">

            <!-- Section title -->
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-6">

                    <div class="section-title text-center">
                        <h3> تواصل معـــنا </h3>
                        <p>نحن ملتزمون بمساعدة عملائنا .</p>
                    </div>

                </div>
            </div>

            <div class="row">

                <!-- Contact info -->
                <div class="contact-info col-12 col-lg-4 res-margin">

                    <h5>
                        <span class="icon icon-basic-geolocalize-05"></span>
                        موقع الشركه
                    </h5>
                    <p>
                        132 Dartmouth Street<br>
                        Boston, Massachusetts 02156<br>
                        United States
                    </p>

                    <h5>
                        <span class="icon icon-basic-smartphone"></span>
                        رقم الهاتــــف
                    </h5>
                    <p><a href="tel:16175723012">+1 617 572 3012</a></p>

                    <h5>
                        <span class="icon icon-basic-mail"></span>
                        البريد الالكتروني
                    </h5>
                    <p>
                        <a href="mailto:email@sitename.com">email@sitename.com</a>
                    </p>



                </div>

                <!-- Contact form -->
                <div class="col-12 col-lg-8">

                    <form id="contactForm">

                        @csrf
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="form-group mt-2 mb-3">
                                    <input type="text" name="name" class="form-control field-name"
                                        placeholder="أدخل أسمك">
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-group mt-2 mb-3">
                                    <input type="email" name="email" class="form-control field-email"
                                        placeholder="البريد الالكتروني">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-lg-12">
                                <div class="form-group mt-2 mb-3">
                                    <input type="text" name="subject" class="form-control field-subject"
                                        placeholder="الموضوع">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-lg-12">
                                <div class="form-group mt-2 mb-3">
                                    <textarea name="message" rows="4" class="form-control field-message" placeholder="رسالتك"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-lg-12 mt-2">

                                <button type="submit" name="send" class="btn">ارسل</button>
                            </div>
                        </div>

                    </form>

                    <div class="toast" style="display: none;">
                        <div class="toast-header">
                            <span class="toast-icon">&#10003;</span> <!-- This is a checkmark icon -->
                            <span class="toast-title">نجاح!</span>
                        </div>
                        <div class="toast-body">
                            تم ارسال طلبك بنجاح وسيتم التواصل معك قريبا
                        </div>
                    </div>
                    <div id="customAlert" class="custom-alert">
                        <span class="alert-message"></span>
                        <button onclick="closeAlert()">حسنًا</button>
                    </div>

                    {{-- 
                      <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000"
                    style="position: absolute; top: 20px; right: 20px;">
                    <div class="toast-header bg-success text-white">
                        <strong class="mr-auto">Success</strong>
                        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="toast-body">
                        {{ session('message') }}
                    </div>
                </div>
                @if (session('status_code') == 200)
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif --}}

                </div>

            </div>

        </div>

    </section>

    <!-- Footer -->
    <footer>

        <!-- Widgets -->
        <div class="footer-widgets">
            <div class="container">

                <div class="row">

                    <!-- Footer logo -->
                    <div class="col-12 col-md-6 col-lg-3 res-margin">
                        <div class="widget">
                            <p class="footer-logo">
                                <img src="{{ URL::asset('logow.png') }}" alt="Naxos" data-rjs="2">
                            </p>
                            <p>
                                هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة
                                مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو
                                إلى زيادة عدد الحروف التى يولدها التطبيق
                            </p>

                            <!-- Social links -->
                            <div class="footer-social">
                                <a href="#" title="Twitter"><i class="fab fa-twitter fa-fw"></i></a>
                                <a href="#" title="Facebook"><i class="fab fa-facebook-f fa-fw"></i></a>
                                <a href="#" title="Instagram"><i class="fab fa-instagram"></i></a>
                                <a href="#" title="Dribbble"><i class="fab fa-dribbble"></i></a>
                                <a href="#" title="Pinterest"><i class="fab fa-pinterest fa-fw"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Useful links -->
                    <div class="col-12 col-md-6 col-lg-2 offset-lg-1 res-margin">
                        <div class="widget">

                            <h6>الصفحات</h6>

                            <ul class="footer-menu">
                                <li><a href="#">الرئيسية</a></li>
                                <li><a href="#">معلومات عنا</a></li>
                                <li><a href="#">تحميل التطبيق</a></li>
                                <li><a href="#">تواصل معنا</a></li>
                            </ul>

                        </div>
                    </div>

                    <!-- Product help -->
                    <div class="col-12 col-md-6 col-lg-3 res-margin">
                        <div class="widget">

                            <h6>معلومات الاتصال</h6>

                            <ul class="footer-menu">
                                <li><a href="#"> +974594304049</a></li>
                                <li><a href="#">hamada1998.2021@gmail.com</a></li>
                                <li><a href="#">10 _ الدوحة _ شارع الصحابة عمارة الملش</a></li>
                                {{-- <li><a href="#">Feedback</a></li>
                                <li><a href="#">API</a></li> --}}
                            </ul>

                        </div>
                    </div>

                    <!-- Download -->
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="widget">

                            <h6>تحميل التطبيق</h6>

                            <div class="button-store">
                                <a href="#"
                                    class="custom-btn d-inline-flex align-items-center m-2 m-sm-0 mb-sm-3"><i
                                        class="fab fa-google-play"></i>
                                    <p>Available on<span>Google Play</span></p>
                                </a>
                                <a href="#" class="custom-btn d-inline-flex align-items-center m-2 m-sm-0"><i
                                        class="fab fa-apple"></i>
                                    <p>Download on<span>App Store</span></p>
                                </a>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </div>

        <!-- Copyright -->
        <div class="footer-copyright">
            <div class="container">

                <div class="row">
                    <div class="col-12">

                        <!-- Text -->
                        <p class="copyright text-center">
                            Copyright © 2023 <a href="#" target="_blank">Sec it</a>. All Rights Reserved.
                        </p>

                    </div>
                </div>

            </div>
        </div>

    </footer>

    <!-- Back to top -->
    <a href="#top-page" class="to-top">
        <div class="icon icon-arrows-up"></div>
    </a>

    <!-- jQuery -->
    <script src="assets/library/jquery/jquery.js"></script>
    <script src="assets/library/jquery/jquery-easing.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <!-- Bootstrap -->
    <script src="assets/library/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/library/retina/retina.min.js"></script>
    <script src="assets/library/backstretch/jquery.backstretch.min.js"></script>
    <script src="assets/library/swiper/swiper-bundle.min.js"></script>
    <script src="assets/library/owlcarousel/owl.carousel.min.js"></script>
    <script src="assets/library/slick/slick.js"></script>
    <script src="assets/library/waypoints/jquery.waypoints.min.js"></script>
    <script src="assets/library/isotope/isotope.pkgd.min.js"></script>
    <script src="assets/library/waitforimages/jquery.waitforimages.min.js"></script>
    <script src="assets/library/lightcase/js/lightcase.js"></script>
    <script src="assets/library/wow/wow.min.js"></script>
    <script src="assets/library/parallax/jquery.parallax.min.js"></script>
    <script src="assets/library/counterup/jquery.counterup.min.js"></script>
    <script src="assets/library/magnificpopup/jquery.magnific-popup.min.js"></script>
    <script src="assets/library/ytplayer/jquery.mb.ytplayer.min.js"></script>

    <!-- Main -->
    <script src="assets/js/main.js"></script>
    <script>
        $(document).ready(function() {
            $('#contactForm').on('submit', function(e) {
                e.preventDefault();



                let isValid = true;
                const name = $('input[name="name"]');
                const subject = $('input[name="subject"]');
                const message = $('textarea[name="message"]');
                const email = $('input[name="email"]');

                // Name validation
                if (name.val().trim() === '' || name.val().length > 255) {
                    isValid = false;
                    showAlert('الاسم مطلوب ويجب ألا يزيد عن 255 حرفًا.');
                }

                // Subject validation
                if (subject.val().trim() === '' || subject.val().length > 255) {
                    isValid = false;
                    showAlert('الموضوع مطلوب ويجب ألا يزيد عن 255 حرفًا.');
                }

                // Message validation
                if (message.val().trim() === '') {
                    isValid = false;
                    showAlert('الرسالة مطلوبة.');
                }

                // Email validation (basic check)
                const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+/.[a - zA - Z] {
                    2,
                    6
                }
                $ / ;
                if (email.val() && !emailRegex.test(email.val())) {
                    isValid = false;
                    showAlert('الرجاء إدخال عنوان بريد إلكتروني صالح.');
                }

                // If validation passes, send the AJAX request
                if (isValid) {
                    $.ajax({
                        url: '{{ route('contact.form') }}',
                        type: 'POST',
                        data: $(this).serialize(),
                        success: function(response) {
                            $('.toast').show().delay(3000).fadeOut();
                            // Clear form fields
                            $('#contactForm')[0].reset();
                        },
                        error: function(error) {
                            console.error("Error:", error);
                        }
                    });
                }
            });
        });

        function showAlert(message) {
            const alertBox = document.getElementById('customAlert');
            const alertMessage = document.querySelector('.alert-message');
            alertMessage.textContent = message;
            alertBox.style.display = 'block';
        }

        function closeAlert() {
            const alertBox = document.getElementById('customAlert');
            alertBox.style.display = 'none';
        }
    </script>
</body>

</html>
