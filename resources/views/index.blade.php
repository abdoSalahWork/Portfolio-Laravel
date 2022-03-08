<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Virtual Folio</title>
    <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="assets/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/perfect-scrollbar/css/perfect-scrollbar.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/nice-select/css/nice-select.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/fancybox/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="assets/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/virtual.css">
    <link rel="stylesheet" type="text/css" href="assets/css/topbar.virtual.css">

    <style>

    </style>
</head>

<body class="theme-red">

    <!-- Back to top button -->
    <div class="btn-back_to_top">
        <span class="ti-arrow-up"></span>
    </div>

    <!-- Setting button -->
    <div class="config">
        <div class="template-config">
            <!-- Settings -->
            <div class="d-block">
                <button class="btn btn-fab btn-sm" id="sideel" title="Settings"><span class="ti-settings"></span></button>
            </div>
            <!-- Puschase -->
            <div class="d-block">
                <a href="https://macodeid.com/projects/virtual-folio/" class="btn btn-fab btn-sm" title="Get this template" data-toggle="tooltip" data-placement="left"><span class="ti-download"></span></a>
            </div>
            <!-- Help -->
            <div class="d-block">
                <a href="#" class="btn btn-fab btn-sm" title="Help" data-toggle="tooltip" data-placement="left"><span class="ti-help"></span></a>
            </div>
        </div>
        <div class="set-menu">
            <p>Select Color</p>
            <div class="color-bar" data-toggle="selected">
                <span class="color-item bg-theme-red selected" data-class="theme-red"></span>
                <span class="color-item bg-theme-blue" data-class="theme-blue"></span>
                <span class="color-item bg-theme-green" data-class="theme-green"></span>
                <span class="color-item bg-theme-orange" data-class="theme-orange"></span>
                <span class="color-item bg-theme-purple" data-class="theme-purple"></span>
            </div>
            <select class="custom-select d-block my-2" id="change-page">
                <option value="">Choose Page</option>
                <option value="index">Topbar</option>
                <option value="blog-topbar">Blog (Topbar)</option>
                <option value="index-2">Minibar</option>
                <option value="blog-minibar">Blog (Minibar)</option>
            </select>
        </div>
    </div>

    <div class="vg-page page-home" id="home" style="background-image: url(assets/img/bg_image_1.jpg)">
        <!-- Navbar -->
        <div class="navbar navbar-expand-lg navbar-dark sticky" data-offset="500">
            <div class="container">
                <a href="" class="navbar-brand">V-Folio</a>
                <button class="navbar-toggler" data-toggle="collapse" data-target="#main-navbar" aria-expanded="true">
                    <span class="ti-menu"></span>
                </button>
                <div class="collapse navbar-collapse" id="main-navbar">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a href="#home" class="nav-link" data-animate="scrolling">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="#about" class="nav-link" data-animate="scrolling">About</a>
                        </li>
                        <li class="nav-item">
                            <a href="#portfolio" class="nav-link" data-animate="scrolling">Portfolio</a>
                        </li>
                        <li class="nav-item">
                            <a href="#client" class="nav-link" data-animate="scrolling">Client</a>
                        </li>
                        <li class="nav-item">
                            <a href="#contact" class="nav-link" data-animate="scrolling">Contact</a>
                        </li>
                    </ul>
                    <ul class="nav ml-auto">
                        <li class="nav-item">
                            <a href="{{route('loginPage')}}" target="_blank" class="btn btn-fab btn-theme" data-animate="scrolling">
                                <i class="fas fa-sign-in-alt"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Navbar -->
        <!-- Caption header -->
        <div class="caption-header text-center wow zoomInDown">
            <h5 class="fw-normal">Welcome</h5>
            <h1 class="fw-light mb-4">I'm <b class="fg-theme">Stephen</b> Doe</h1>
            <div class="badge">UI/UX & Web Designer</div>
        </div>
        <!-- End Caption header -->
        <div class="floating-button"><span class="ti-mouse"></span></div>
    </div>

    <div class="vg-page page-about" id="about">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-4 py-3">
                    <div class="img-place wow fadeInUp">
                        <img src="{{asset($about->image)}}" alt="{{$about->name}}">
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1 wow fadeInRight">
                    <h1 class="fw-light">{{$about->name}}</h1>
                    <h5 class="fg-theme mb-3">{{$about->title}}</h5>
                    <p class="text-muted">{{$about->description}}</p>
                    <ul class="theme-list">
                        <li><b>From:</b> {{$about->from}}</li>
                        <li><b>Lives In:</b> {{$about->live_in}}</li>
                        <li><b>Age:</b> {{$about->age}}</li>
                        <li><b>Gender:</b> {{$about->gender}}</li>
                    </ul>
                    <a href="{{route('downloadCv')}}" class="btn btn-theme-outline">Download CV</a>
                </div>
            </div>
        </div>
        <div class="container py-5">
            <h1 class="text-center fw-normal wow fadeIn">My Skills</h1>
            <div class="row py-3">
                @foreach ($categorySkills as $categorySkill)
                <div class="col-md-6">
                    <div class="px-lg-3">
                        <h4 class="wow fadeInUp">{{$categorySkill->name}}</h4>
                        @foreach ($categorySkill->skills as $skill)
                        <div class="progress-wrapper wow fadeInUp">
                            <span class="caption">{{$skill->name}}</span>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: {{$skill->number}}%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">{{$skill->number}}%</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
                <!-- <div class="col-md-6">
                    <div class="px-lg-3">
                        <h4 class="wow fadeInUp">Design Skills</h4>
                        <div class="progress-wrapper wow fadeInUp">
                            <span class="caption">UI / UX Design</span>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 92%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">92%</div>
                            </div>
                        </div>
                        <div class="progress-wrapper wow fadeInUp">
                            <span class="caption">Web Design</span>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 99%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">99%</div>
                            </div>
                        </div>
                        <div class="progress-wrapper wow fadeInUp">
                            <span class="caption">Logo Design</span>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 79%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">79%</div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
        <div class="container">
            <section class="experience pt-100 pb-100" id="experience">
                @foreach ($historyCategories as $historyCategory)
                @if (count($historyCategory->histories) > 0)
                <div class="row">
                    <div class="col-xl-8 mx-auto text-center">
                        <div class="section-title">
                            <h4>{{$historyCategory->name}}</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <ul class="timeline-list">
                            <!-- Single Experience -->
                            @foreach ($historyCategory->histories as $history)
                            <li class="col-12">
                                <div class="timeline_content">
                                    <span>{{$history->year}}
                                        @if ($history->status == 1)
                                        <span> - Current</span>
                                        @endif
                                    </span>
                                    <h4>{{$history->name}}</h4>
                                    <span>{{$history->slug}}</span>
                                    <p>{{$history->description}}</p>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif
                @endforeach
            </section>
        </div>
    </div>

    <div class="vg-page page-service">
        <div class="container">
            <div class="text-center wow fadeInUp">
                <div class="badge badge-subhead">Service</div>
            </div>
            <h1 class="fw-normal text-center wow fadeInUp">What can i do?</h1>
            <div class="row justify-content-center mt-5">
                @foreach ($services as $service)
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="card card-service wow fadeInUp">
                        <div class="icon">
                            <i class="{{$service->icon}} text-secondary"></i>
                        </div>
                        <div class="caption">
                            <h4 class="fg-theme">{{$service->title}}</h4>
                            <p>{{$service->discription}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>

    <div class="vg-page page-funfact" style="background-image: url(../assets/img/bg_banner.jpg);">
        <div class="container">
            <div class="row section-counter">
                @foreach ($numbers as $number)
                <div class="col-md-6 col-lg-3 py-4 wow fadeIn">
                    <h1 class="number" data-number="{{$number->number}}">{{$number->number}}</h1>
                    <span>{{$number->name}}</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Portfolio page -->
    <div class="vg-page page-portfolio" id="portfolio">
        <div class="container">
            <div class="text-center wow fadeInUp">
                <div class="badge badge-subhead">Portfolio</div>
            </div>
            <h1 class="text-center fw-normal wow fadeInUp">See my work</h1>
            <div class="filterable-button py-3 wow fadeInUp" data-toggle="selected">
                <button class="btn btn-theme-outline selected" data-filter="*">All</button>
                @foreach ($portfolioCategories as $portfolioCategory)
                <button class="btn btn-theme-outline" data-filter=".{{$portfolioCategory->name}}">{{$portfolioCategory->name}}</button>
                @endforeach
                <!-- <button class="btn btn-theme-outline" data-filter=".apps">Apps</button>
                <button class="btn btn-theme-outline" data-filter=".template">Template</button>
                <button class="btn btn-theme-outline" data-filter=".ios">IOS</button>
                <button class="btn btn-theme-outline" data-filter=".ui-ux">UI/UX</button>
                <button class="btn btn-theme-outline" data-filter=".graphic">Graphic</button>
                <button class="btn btn-theme-outline" data-filter=".wireframes">Wireframes</button> -->
            </div>

            <div class="gridder my-3">
                @foreach ($portfolioItem as $portfolio)
                <div class="grid-item wow zoomIn @foreach ($portfolio->ItemCategories as $ItemCategory)
                {{$ItemCategory->category->name}} @endforeach">
                    <div class="img-place" data-src="{{asset($portfolio->image)}}" data-fancybox data-caption="<h5 class='fg-theme'>{{$portfolio->name}}</h5> <p>{{$portfolio->slug}}</p>">
                        <img src="{{asset($portfolio->image)}}" alt="">
                        <div class="img-caption">
                            <h5 class="fg-theme">{{$portfolio->name}}</h5>
                            <p>{{$portfolio->slug}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- End gridder -->
        </div>
    </div>
    <!-- End Portfolio page -->

    <!-- Client -->
    @if ($companies)
    <div class="vg-page page-client">
        <div class="container">
            <div class="row">
                @foreach ($companies as $company)
                <div class="col-md-6 col-lg-4 col-xl-3 item">
                    <div class="img-place wow fadeInUp">
                        <img src="{{asset($company->image)}}" alt="">
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif

    <!-- Testimonial -->
    <div class="vg-page page-testimonial" id="client">
        <div class="container">
            <h1 class="text-center fw-normal wow fadeInUp">What Clients are Saying</h1>
            <div class="row justify-content-center mt-5 wow fadeInUp">
                <div class="col-md-9">
                    <div class="owl-carousel testi-carousel">
                        <!-- <div class="item">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="img-place">
                                        <img src="assets/img/testimonials/testimonials_1.jpg" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="caption">
                                        <div class="testi-content">There are many variations of passages of Lorem Ipsum available, but the majority have suffered</div>
                                        <div class="testi-info">
                                            <div class="thumb-profile">
                                                <img src="assets/img/testimonials/testimonials_1.jpg" alt="">
                                            </div>
                                            <div class="tagline">
                                                <h5 class="mb-0">Satria Nugraha</h5>
                                                <span class="text-muted">CEO Nutshell</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        @foreach ($clients as $client)
                        <div class="item">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="img-place">
                                        <img src="{{asset($client->image)}}" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="caption">
                                        <div class="testi-content">{{$client->discription}}
                                        </div>
                                        <div class="testi-info">
                                            <div class="thumb-profile">
                                                <img src="{{asset($client->image)}}" alt="">
                                            </div>
                                            <div class="tagline">
                                                <h5 class="mb-0">{{$client->name}}</h5>
                                                <span class="text-muted">{{$client->title}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End testimonial -->


    <!-- End client -->

    <!-- Blog -->
    <!-- <div class="vg-page page-blog" id="blog">
        <div class="container">
            <div class="text-center">
                <div class="badge badge-subhead wow fadeInUp">Blog</div>
            </div>
            <h1 class="text-center fw-normal wow fadeInUp">Latest Post</h1>
            <div class="row post-grid">
                <div class="col-md-6 col-lg-4 wow fadeInUp">
                    <div class="card">
                        <div class="img-place">
                            <img src="assets/img/work/work-9.jpg" alt="">
                        </div>
                        <div class="caption">
                            <a href="javascript:void(0)" class="post-category">Technology</a>
                            <a href="#" class="post-title">Invision design forward fund</a>
                            <span class="post-date"><span class="sr-only">Published on</span> May 22, 2018</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp">
                    <div class="card">
                        <div class="img-place">
                            <img src="assets/img/work/work-6.jpg" alt="">
                        </div>
                        <div class="caption">
                            <a href="javascript:void(0)" class="post-category">Business</a>
                            <a href="#" class="post-title">Announcing a plan for small teams</a>
                            <span class="post-date"><span class="sr-only">Published on</span> May 22, 2018</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp">
                    <div class="card">
                        <div class="img-place">
                            <img src="assets/img/work/work-1.jpg" alt="">
                        </div>
                        <div class="caption">
                            <a href="javascript:void(0)" class="post-category">Design</a>
                            <a href="#" class="post-title">5 basic tips for illustrating</a>
                            <span class="post-date"><span class="sr-only">Published on</span> May 22, 2018</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center py-3 wow fadeInUp">
                    <a href="blog-fullbar.html" class="btn btn-theme">See All Post</a>
                </div>
            </div>
        </div>
    </div> -->
    <!-- End blog -->

    <!-- Contact -->
    <!-- <div class="vg-page page-contact" id="contact">

    </div> -->
    </div>
    <!-- End Contact -->

    <!-- Footer -->
    <div class="vg-footer">
        <h1 class="text-center fw-normal wow fadeInUp">Connect Us</h1>
        <div class="container">
            <div class="row">
                <div class="col-md-6 p-2">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        {{$error}}
                        @endforeach
                    </div>
                    @endif
                    @if (Session::has('done'))
                    <div class="alert alert-success">
                    </div>
                    @endif
                    <form method="POST" action="{{route('sendEmail')}}">
                        @csrf
                        <div class="row">
                            <div class="col-12 mt-3 wow fadeInUp">
                                <input class="form-control" type="text" name="name" placeholder="Your Name">
                            </div>
                            <div class="col-6 mt-3 wow fadeInUp">
                                <input class="form-control" type="text" name="email" placeholder="Email Address">
                            </div>
                            <div class="col-6 mt-3 wow fadeInUp">
                                <input class="form-control" type="text" name="subject" placeholder="Subject">
                            </div>
                            <div class="col-12 mt-3 wow fadeInUp">
                                <textarea class="form-control" name="message" rows="1" placeholder="Enter message here.."></textarea>
                            </div>
                            <button type="submit" class="btn btn-theme mt-3 wow fadeInUp mx-auto">Send Message</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-3  py-3">
                    <div class="">
                        <p>Follow me</p>
                        <hr class="divider">
                        <ul class="list-unstyled">
                            @foreach ($fllows as $fllow)
                            <li><a href="{{$fllow->url}}" target="_blank">{{$fllow->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 py-3">
                    <div class="">
                        <p>Contact me</p>
                        <hr class="divider">
                        <ul class="list-unstyled">
                            @foreach ($contacts as $contactMe)
                            <li>{{$contactMe->name}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-3">
                <div class="col-12">
                    <p class="text-center mb-0 mt-4">Copyright &copy;2020. All right reserved | This template is made with <span class="ti-heart fg-theme-red"></span> by <a href="https://www.macodeid.com/">MACode ID</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- End footer -->


    <script src="assets/js/jquery-3.5.1.min.js"></script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/vendor/owl-carousel/owl.carousel.min.js"></script>

    <script src="assets/vendor/perfect-scrollbar/js/perfect-scrollbar.js"></script>

    <script src="assets/vendor/isotope/isotope.pkgd.min.js"></script>

    <script src="assets/vendor/nice-select/js/jquery.nice-select.min.js"></script>

    <script src="assets/vendor/fancybox/js/jquery.fancybox.min.js"></script>

    <script src="assets/vendor/wow/wow.min.js"></script>

    <script src="assets/vendor/animateNumber/jquery.animateNumber.min.js"></script>

    <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>

    <script src="assets/js/google-maps.js"></script>

    <script src="assets/js/topbar-virtual.js"></script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIA_zqjFMsJM_sxP9-6Pde5vVCTyJmUHM&callback=initMap"></script>

</body>

</html>
