<?php include('partials/html.php'); ?>

<head>
    <?php $title = "One Page Landing"; include('partials/title-meta.php'); ?>

    <?php include('partials/head-css.php'); ?>
</head>

<body class="bg-body-secondary" data-bs-spy="scroll" data-bs-target="#navbar-example">
    <!-- Header START -->
    <header>
        <!-- Nav START -->
        <nav class="navbar navbar-expand-lg py-2 sticky-top" id="landing-navbar">
            <div class="container">
                <div class="auth-brand mb-0">
                    <a href="index.php" class="logo-dark">
                        <img src="assets/images/logo.png" alt="dark logo" height="24">
                    </a>
                    <a href="index.php" class="logo-light">
                        <img src="assets/images/logo.png" alt="logo" height="24">
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav text-uppercase fw-bold gap-2 fs-sm mx-auto mt-2 mt-lg-0" id="navbar-example">
                        <li class="nav-item">
                            <a class="nav-link fs-xs active" href="#hero">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-xs" href="#services">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-xs" href="#features">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-xs" href="#plans">Plans</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-xs" href="#reviews">Reviews</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-xs" href="#contact">Contact</a>
                        </li>
                    </ul>

                    <div>
                        <button class="btn btn-link btn-icon fw-semibold nav-link me-2" type="button" id="theme-toggle"> <i class="ti ti-contrast fs-22"></i> </button>
                        <!-- <a href="auth-sign-in.php" class="btn btn-link fw-semibold nav-link px-2">Sign In</a> -->
                        <a href="auth-sign-up.php" class="btn btn-sm btn-light">Try for Free</a>
                    </div>
                </div> <!-- end .navbar-collapse-->

            </div> <!-- end container-->
        </nav>
        <!-- Nav END -->
    </header>
    <!-- Header END -->


    <!-- =======================
            HERO SECTION
    ======================= -->
    <section class="bg-light bg-opacity-50 border-top border-light position-relative" id="hero">
       
        <div class="container pt-5 position-relative">
            <!-- Hero Content Row -->
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">

                    <!-- Hero Title -->
                    <h1 class="my-4 fs-36 fw-bold lh-base">
                        Modern, Powerful & Flexible <span class="text-primary">Admin & Dashboard</span> Template – 
                        <span class="text-muted">Built for Serious Web Applications</span>
                    </h1>

                    <!-- Hero Description -->
                    <p class="mb-4 fs-md text-muted lh-lg">
                        Build fast, modern, and scalable web apps with our best-selling Admin Dashboard Template.
                        Engineered for performance, flexibility, and easy customization — ideal for startups, agencies, and enterprise teams.
                    </p>

                    <!-- Call to Action Buttons -->
                    <div class="d-flex gap-1 gap-sm-2 flex-wrap justify-content-center">
                        <a class="btn btn-primary py-2 fw-semibold" href="#">
                            <i class="ti ti-basket fs-xl me-2"></i>Buy UBold Now!
                        </a>
                    </div>
                </div>
            </div>

            <!-- Images & Clients Section -->
            <div class="container position-relative">
                <!-- Hero Illustration Image Row -->
                <div class="row">
                    <div class="col-md-10 mx-auto position-relative">

                        <!-- Hero Main Image -->
                        <img src="assets/images/dashboard.png" class="rounded-top-4 img-fluid mt-5" alt="saas-img">

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- =======================
            HERO SECTION END
    ======================= -->


    <!-- =======================
        SERVICES SECTION
    ======================= -->
    <section class="section-custom pb-5" id="services">
        <div class="container">

            <!-- Section Heading -->
            <div class="row">
                <div class="col-12 text-center">
                    <span class="text-muted rounded-3 d-inline-block">💼 Tailored Solutions for Every Need</span>
                    <h2 class="mt-3 fw-bold mb-5">Explore Our Professional <span class="text-primary">Services</span> and Expertise</h2>
                </div>
            </div>

            <!-- First Row of Service Cards -->
            <div class="row text-center">
                <!-- Strategic Consulting -->
                <div class="col-xl-4 col-md-6">
                    <div class="card border-0 shadow-none p-2 card-h-100">
                        <div class="card-body pb-0">
                            <div class="avatar-xl mx-auto mb-3">
                                <span class="avatar-title bg-secondary-subtle text-secondary rounded-circle fs-22">
                                    <i class="ti ti-bulb"></i>
                                </span>
                            </div>
                            <h4 class="mb-2">Strategic Consulting</h4>
                            <p class="text-muted mb-3">
                                We help businesses define clear digital goals and create custom strategies that align with long-term success. From planning to execution.
                            </p>
                        </div>
                        <div class="card-footer border-0 pt-0">
                            <a class="link-primary fw-semibold" href="#">Know more<i class="ti ti-arrow-right ms-2 align-middle"></i></a>
                        </div>
                    </div>
                </div>

                <!-- SEO & Traffic Growth -->
                <div class="col-xl-4 col-md-6">
                    <div class="card border-0 shadow-none p-2 card-h-100">
                        <div class="card-body pb-0">
                            <div class="avatar-xl mx-auto mb-3">
                                <span class="avatar-title bg-secondary-subtle text-secondary rounded-circle fs-22">
                                    <i class="ti ti-chart-bar"></i>
                                </span>
                            </div>
                            <h4 class="mb-2">SEO & Traffic Growth</h4>
                            <p class="text-muted mb-3">
                                Boost your search visibility and drive organic traffic with our comprehensive SEO services — including keyword strategy, technical audits, etc.
                            </p>
                        </div>
                        <div class="card-footer border-0 pt-0">
                            <a class="link-primary fw-semibold" href="#">Know more<i class="ti ti-arrow-right ms-2 align-middle"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Social Media Management -->
                <div class="col-xl-4 col-md-6">
                    <div class="card border-0 shadow-none p-2 card-h-100">
                        <div class="card-body pb-0">
                            <div class="avatar-xl mx-auto mb-3">
                                <span class="avatar-title bg-secondary-subtle text-secondary rounded-circle fs-22">
                                    <i class="ti ti-speakerphone"></i>
                                </span>
                            </div>
                            <h4 class="mb-2">Social Media Management</h4>
                            <p class="text-muted mb-3">
                                Elevate your brand's presence with targeted content, community engagement, and performance analytics across platforms like Instagram, Facebook, etc.
                            </p>
                        </div>
                        <div class="card-footer border-0 pt-0">
                            <a class="link-primary fw-semibold" href="#">Know more<i class="ti ti-arrow-right ms-2 align-middle"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Custom Web Development -->
                <div class="col-xl-4 col-md-6">
                    <div class="card border-0 shadow-none p-2 card-h-100">
                        <div class="card-body pb-0">
                            <div class="avatar-xl mx-auto mb-3">
                                <span class="avatar-title bg-secondary-subtle text-secondary rounded-circle fs-22">
                                    <i class="ti ti-world"></i>
                                </span>
                            </div>
                            <h4 class="mb-2">Custom Web Development</h4>
                            <p class="text-muted mb-3">
                                We build modern, scalable websites and applications tailored to your business needs — optimized for speed, mobile responsiveness.
                            </p>
                        </div>
                        <div class="card-footer border-0 pt-0">
                            <a class="link-primary fw-semibold" href="#">Know more<i class="ti ti-arrow-right ms-2 align-middle"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Brand Identity & Design -->
                <div class="col-xl-4 col-md-6">
                    <div class="card border-0 shadow-none p-2 card-h-100">
                        <div class="card-body pb-0">
                            <div class="avatar-xl mx-auto mb-3">
                                <span class="avatar-title bg-secondary-subtle text-secondary rounded-circle fs-22">
                                    <i class="ti ti-brush"></i>
                                </span>
                            </div>
                            <h4 class="mb-2">Brand Identity & Design</h4>
                            <p class="text-muted mb-3">
                                From logos to full brand systems, we create memorable visual identities that express your values and connect with your target audience.
                            </p>
                        </div>
                        <div class="card-footer border-0 pt-0">
                            <a class="link-primary fw-semibold" href="#">Know more<i class="ti ti-arrow-right ms-2 align-middle"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Analytics & Insights -->
                <div class="col-xl-4 col-md-6">
                    <div class="card border-0 shadow-none p-2 card-h-100">
                        <div class="card-body pb-0">
                            <div class="avatar-xl mx-auto mb-3">
                                <span class="avatar-title bg-secondary-subtle text-secondary rounded-circle fs-22">
                                    <i class="ti ti-report-analytics"></i>
                                </span>
                            </div>
                            <h4 class="mb-2">Analytics & Insights</h4>
                            <p class="text-muted mb-3">
                                Turn data into decisions with real-time dashboards, performance reports, and analytics solutions that help you measure success.
                            </p>
                        </div>
                        <div class="card-footer border-0 pt-0">
                            <a class="link-primary fw-semibold" href="#">Know more<i class="ti ti-arrow-right ms-2 align-middle"></i></a>
                        </div>
                    </div>
                </div>
            </div>


        </div> <!-- end container-->
    </section>
    <!-- =======================
        SERVICES SECTION END
    ======================= -->

    <!-- =======================
        Features SECTION
    ======================= -->
    <section class="section-custom bg-light bg-opacity-30 border-top border-light border-bottom" id="features">
        <div class="container">

            <!-- Section Heading -->
            <div class="row">
                <div class="col-12 text-center">
                    <span class="text-muted rounded-3 d-inline-block">🚀 Designed for Performance & Scalability</span>
                    <h2 class="mt-3 fw-bold mb-5">Discover the Core <span class="text-primary">Features</span> of UBold</h2>
                </div>
            </div>


            <div class="row align-items-center pb-5">
                <div class="col-lg-6 col-xl-5 py-3">
                    <div class="text-center">
                        <!-- Main image -->
                        <img src="https://illustrations.popsy.co/violet/paper-plane.svg" class="rounded-3 img-fluid" alt="saas-img">
                        <small class="fst-italic">Image by: <a href="https://popsy.co/illustrations" target="_blank">Popsy.co</a></small>

                    </div> <!-- end position relative -->
                </div> <!-- end col--> 
    
                <!-- Content -->
                <div class="col-lg-5 ms-auto py-3">
                    <h3 class="mb-3 fs-xl lh-base">Powering Smart Admin Experiences with UBold</h3>
                    <p class="mb-2 lead">UBold is a feature-rich, high-performance admin dashboard template built for modern web applications and enterprise-grade interfaces.</p>
                    <p class="text-muted fs-sm mb-4">Streamline your workflow, monitor key metrics, and manage data seamlessly with intuitive UI and powerful components.</p>
                    <a href="#!" class="btn btn-primary mb-4">Launch Dashboard</a>

                    <!-- Counter -->
                    <div class="d-flex flex-wrap justify-content-between gap-4 mt-4">
                        <div>
                            <h3 class="mb-2"><span data-target="98.6">0</span><span class="text-primary">%</span></h3>
                            <p class="text-muted mb-0">Customer satisfaction</p>
                        </div>

                        <div>
                            <h3 class="mb-2"><span data-target="10.2">0</span><span class="text-primary">x</span></h3>
                            <p class="text-muted mb-0">Productivity boost</p>
                        </div>

                        <div>
                            <h3 class="mb-2"><span data-target="3500">0</span><span class="text-primary">+</span></h3>
                            <p class="text-muted mb-0">Businesses using UBold</p>
                        </div>
                    </div>
                </div><!-- end col-->
                
            </div> <!-- end row-->

            <div class="row align-items-center">
                <div class="col-lg-5 py-3 order-2 order-lg-1">
                    <h2 class="mb-3 fs-xl lh-base">Control Everything from One Unified Dashboard</h2>
                    <p class="mb-2 lead">UBold empowers admins with a smart, responsive interface to manage users, analytics, content, and workflows effortlessly.</p>
                    <p class="text-muted fs-sm mb-4">Track performance, automate tasks, and make data-driven decisions — all from a secure and scalable admin panel.</p>
                    <a href="dashboard.php" class="btn btn-primary mb-4">Explore UBold Admin</a>

                    <!-- Counter -->
                    <div class="d-flex flex-wrap gap-4 mt-4">
                        <div>
                            <h3 class="mb-2"><span data-target="97.8">0</span><span class="text-primary">%</span></h3>
                            <p class="text-muted mb-0">Task automation efficiency</p>
                        </div>

                        <div>
                            <h3 class="mb-2"><span data-target="4.5">0</span><span class="text-primary">x</span></h3>
                            <p class="text-muted mb-0">Faster admin operations</p>
                        </div>
                    </div>
                </div> <!-- end col-->
                
                <div class="col-lg-6 col-xl-5 ms-auto py-3 order-1 order-lg-2">
                    <div class="text-center">
                        <!-- Main image -->
                        <img src="https://illustrations.popsy.co/violet/success.svg" class="rounded-3 img-fluid" alt="saas-img">

                    </div> <!-- end position relative -->
                </div> <!-- end col-->
            </div> <!-- end row-->
        </div>	<!-- end container-->
    </section>
    <!-- =======================
        Features SECTION END
    ======================= -->

    <!-- =======================
        PLANS SECTION
    ======================= -->
    <section class="section-custom" id="plans">
        <div class="container">

            <!-- Section Heading -->
            <div class="row">
                <div class="col-12 text-center">
                    <span class="text-muted rounded-3 d-inline-block">💰 Simple & Transparent Plans</span>
                    <h2 class="mt-3 fw-bold mb-5">Choose the <span class="text-primary">Pricing</span> Plan That Fits Your Needs</h2>
                </div>
            </div>
      
            
            <div class="row justify-content-center">
                <div class="col-xxl-11">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card border bg-light bg-opacity-40 border-dashed shadow-none h-100 my-4 my-lg-0">
                                <div class="card-body p-lg-4 pb-0 text-center">
                                    <h3 class="fw-bold mb-1">Starter Plan</h3>
                                    <p class="text-muted mb-0">Best for freelancers and personal use</p>

                                    <div class="my-4">
                                        <h1 class="display-6 fw-bold mb-0">$9</h1>
                                        <small class="d-block text-muted fs-base">Billed monthly</small>
                                        <small class="d-block text-muted">1 project included</small>
                                    </div>

                                    <ul class="list-unstyled text-start fs-sm mb-0">
                                        <li class="mb-2"><i class="ti ti-check text-success me-2"></i> 1 active project</li>
                                        <li class="mb-2"><i class="ti ti-check text-success me-2"></i> Access to all components</li>
                                        <li class="mb-2"><i class="ti ti-check text-success me-2"></i> Email support</li>
                                        <li class="mb-2"><i class="ti ti-x text-danger me-2"></i> No team collaboration</li>
                                        <li class="mb-2"><i class="ti ti-x text-danger me-2"></i> No SaaS rights</li>
                                    </ul>
                                </div>
                                <div class="card-footer bg-transparent px-5 pb-4">
                                    <a href="#!" class="btn btn-outline-primary w-100 py-2 fw-semibold rounded-pill">Choose Starter</a>
                                </div>
                            </div>
                        </div>
                    
                        <div class="col-lg-4">
                            <div class="card text-bg-primary h-100 my-4 my-lg-0">
                                <div class="card-body p-lg-4 pb-0 text-center">
                                    <h3 class="fw-bold mb-1">Professional</h3>
                                    <p class="text-white-50 mb-0">Ideal for small teams and startups</p>

                                    <div class="my-4">
                                        <h1 class="display-6 fw-bold mb-0">$29</h1>
                                        <small class="d-block text-white-50 fs-base">Billed monthly</small>
                                        <small class="d-block text-white-50">Up to 5 projects</small>
                                    </div>

                                    <ul class="list-unstyled text-start fs-sm mb-0">
                                        <li class="mb-2"><i class="ti ti-check text-success me-2"></i> 5 active projects</li>
                                        <li class="mb-2"><i class="ti ti-check text-success me-2"></i> Component + plugin access</li>
                                        <li class="mb-2"><i class="ti ti-check text-success me-2"></i> Team collaboration</li>
                                        <li class="mb-2"><i class="ti ti-check text-success me-2"></i> Priority email support</li>
                                        <li class="mb-2"><i class="ti ti-x text-danger me-2"></i> No resale rights</li>
                                    </ul>
                                </div>
                                <div class="card-footer bg-transparent px-5 pb-4">
                                    <a href="#!" class="btn btn-light w-100 py-2 fw-semibold rounded-pill">Choose Professional</a>
                                </div>
                            </div>
                        </div>
                    
                        <div class="col-lg-4">
                            <div class="card border bg-light bg-opacity-40 border-dashed shadow-none h-100 my-4 my-lg-0">
                                <div class="card-body p-lg-4 pb-0 text-center">
                                    <h3 class="fw-bold mb-1">Business</h3>
                                    <p class="text-muted mb-0">For agencies and large teams</p>

                                    <div class="my-4">
                                        <h1 class="display-6 fw-bold mb-0">$79</h1>
                                        <small class="d-block text-muted fs-base">Billed monthly</small>
                                        <small class="d-block text-muted">Unlimited projects</small>
                                    </div>

                                    <ul class="list-unstyled text-start fs-sm mb-0">
                                        <li class="mb-2"><i class="ti ti-check text-success me-2"></i> Unlimited projects</li>
                                        <li class="mb-2"><i class="ti ti-check text-success me-2"></i> SaaS & client projects allowed</li>
                                        <li class="mb-2"><i class="ti ti-check text-success me-2"></i> All premium components</li>
                                        <li class="mb-2"><i class="ti ti-check text-success me-2"></i> Priority support</li>
                                        <li class="mb-2"><i class="ti ti-check text-success me-2"></i> Team management tools</li>
                                    </ul>
                                </div>
                                <div class="card-footer bg-transparent px-5 pb-4">
                                    <a href="#!" class="btn btn-dark w-100 py-2 fw-semibold rounded-pill">Choose Business</a>
                                </div>
                            </div>
                        </div> <!-- end col-->
                    </div> <!-- end row-->
                
                </div> <!-- end col-->
            </div> <!-- end row-->
        </div> <!-- end container-->
    </section>
    <!-- =======================
        PLANS SECTION END
    ======================= -->

    <!-- =======================
        CTA SECTION
    ======================= -->

    <section>
        <div class="section-cta position-relative card-side-img overflow-hidden" style="background-image: url(assets/images/landing-cta.jpg);">
            <div class="card-img-overlay d-flex align-items-center flex-column gap-3 justify-content-center auth-overlay text-center">
                <h3 class="text-white fs-24 mb-0 fw-bold">
                    Power Your Project with Our Premium Admin Dashboard
                </h3>
                <p class="text-white text-opacity-75 fs-md">
                    Launch faster with a sleek, responsive, and developer-focused admin panel. <br> Get started today — free 14-day trial, no credit card required.
                </p>
                <a href="#!" class="btn btn-light rounded-pill">Get Started Now</a>
            </div>
        </div>
    </section>
 

    <!-- =======================
        CTA SECTION END
    ======================= -->

    <!-- =======================
        REVIEWS SECTION
    ======================= -->
    <section class="section-custom position-relative overflow-hidden" id="reviews">

        <div class="container position-relative">      
            
            <!-- Section Heading -->
            <div class="row">
                <div class="col-12 text-center">
                    <span class="text-muted rounded-3 d-inline-block">💬 Honest & Verified Feedback</span>
                    <h2 class="mt-3 fw-bold mb-5">Read Our <span class="text-primary">Admin Reviews</span> and Ratings</h2>
                </div>
            </div>


            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="card border border-dashed shadow-none rounded-4 p-3 card-h-100">
                        <div class="card-body pb-0 text-center">
                            <div class="avatar avatar-xl mx-auto mb-3">
                                <img src="assets/images/users/user-1.jpg" alt="Michael Roberts" class="img-fluid rounded-circle">
                            </div>
                            <span class="text-warning fs-lg mb-3 d-block">
                                <span class="ti ti-star-filled"></span>
                                <span class="ti ti-star-filled"></span>
                                <span class="ti ti-star-filled"></span>
                                <span class="ti ti-star-filled"></span>
                                <span class="ti ti-star-filled"></span>
                            </span>
                            <h4 class="mb-2 fs-md">Fantastic experience!</h4>
                            <p class="text-muted mb-3 fst-italic fs-sm">"The admin dashboard is intuitive, fast, and packed with useful features. Highly recommend it!"</p>
                        </div>
                    </div>
                </div>

            
                <div class="col-lg-4">
                    <div class="card border border-dashed shadow-none rounded-4 p-3 card-h-100">
                        <div class="card-body pb-0 text-center">
                            <div class="avatar avatar-xl mx-auto mb-3">
                                <img src="assets/images/users/user-2.jpg" alt="Sarah Mitchell" class="img-fluid rounded-circle">
                            </div>
                            <span class="text-warning fs-lg mb-3 d-block">
                                <span class="ti ti-star-filled"></span>
                                <span class="ti ti-star-filled"></span>
                                <span class="ti ti-star-filled"></span>
                                <span class="ti ti-star-filled"></span>
                                <span class="ti ti-star-filled"></span>
                            </span>
                            <h4 class="mb-2 fs-md">Excellent quality & support</h4>
                            <p class="text-muted mb-3 fst-italic fs-sm">"The template’s quality is top-notch and the support team is quick to help. A truly seamless experience!"</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card border border-dashed shadow-none rounded-4 p-3 card-h-100">
                        <div class="card-body pb-0 text-center">
                            <div class="avatar avatar-xl mx-auto mb-3">
                                <img src="assets/images/users/user-3.jpg" alt="David Anderson" class="img-fluid rounded-circle">
                            </div>
                            <span class="text-warning fs-lg mb-3 d-block">
                                <span class="ti ti-star-filled"></span>
                                <span class="ti ti-star-filled"></span>
                                <span class="ti ti-star-filled"></span>
                                <span class="ti ti-star-filled"></span>
                                <span class="ti ti-star-filled"></span>
                            </span>
                            <h4 class="mb-2 fs-md">Outstanding experience</h4>
                            <p class="text-muted mb-3 fst-italic fs-sm">"Everything from setup to customization was smooth and easy. The support team went above and beyond!"</p>
                        </div>
                    </div>
                </div>

            </div> <!-- end row-->

            <div class="row justify-content-center mt-5">
                <div class="col-xxl-9">
                    <div class="d-flex justify-content-center align-items-center flex-wrap gap-5 mt-4">
                        <div>
                            <a href="#!" class="d-block">
                                <img src="assets/images/clients/01.svg" alt="logo" height="42">
                            </a>
                        </div>
                        <div>
                            <a href="#!" class="d-block">
                                <img src="assets/images/clients/02.svg" alt="logo" height="42">
                            </a>
                        </div>
                        <div>
                            <a href="#!" class="d-block">
                                <img src="assets/images/clients/03.svg" alt="logo" height="42">
                            </a>
                        </div>
                        <div>
                            <a href="#!" class="d-block">
                                <img src="assets/images/clients/04.svg" alt="logo" height="42">
                            </a>
                        </div>
                        <div>
                            <a href="#!" class="d-block">
                                <img src="assets/images/clients/05.svg" alt="logo" height="42">
                            </a>
                        </div>
                        <div>
                            <a href="#!" class="d-block">
                                <img src="assets/images/clients/06.svg" alt="logo" height="42">
                            </a>
                        </div>
                        <div>
                            <a href="#!" class="d-block">
                                <img src="assets/images/clients/07.svg" alt="logo" height="42">
                            </a>
                        </div>
                    </div>
                </div>
            </div> <!-- end row-->
        </div> <!-- end container-->
    </section>
    <!-- =======================
        REVIEWS SECTION END
    ======================= -->


    <!-- =======================
        CONTACT SECTION
    ======================= -->
    <section class="section-custom bg-light bg-opacity-30 border-top" id="contact">

        <div class="container">

            <!-- Section Heading -->
            <div class="row">
                <div class="col-12 text-center">
                    <span class="text-muted rounded-3 d-inline-block">📞 Get in Touch</span>
                    <h2 class="mt-3 fw-bold mb-5">We’d Love to Hear From <span class="text-primary">You</span></h2>
                </div>
            </div>
                              
            
            <div class="row">
                <div class="col-xxl-4">
                    <div class="p-4">
                        <div class="d-flex gap-3 mb-4">
                            <div class="avatar-xl flex-shrink-0">
                                <span class="avatar-title bg-secondary-subtle text-secondary rounded-circle fs-22">
                                    <i class="ti ti-phone-call"></i>
                                </span>
                            </div>
                            <div>
                                <span class="text-muted">Contact Numbers</span>
                                <h5 class="my-2">+1 (555) 123-4567</h5>
                                <h5 class="mb-0">+1 (555) 765-4321</h5>
                            </div>
                        </div>
                    
                        <div class="d-flex gap-3 mb-4">
                            <div class="avatar-xl flex-shrink-0">
                                <span class="avatar-title bg-secondary-subtle text-secondary rounded-circle fs-22">
                                    <i class="ti ti-mail"></i>
                                </span>
                            </div>
                            <div>
                                <span class="text-muted">Email</span>
                                <h5 class="my-2">info@ubold.com</h5>
                                <h5 class="mb-0">support@ubold.com</h5>
                            </div>
                        </div>
                    
                        <div class="d-flex gap-3">
                            <div class="avatar-xl flex-shrink-0">
                                <span class="avatar-title bg-secondary-subtle text-secondary rounded-circle fs-22">
                                    <i class="ti ti-map-pin"></i>
                                </span>
                            </div>
                            <div>
                                <span class="text-muted">Address</span>
                                <h5 class="my-1 lh-lg">UBold HQ, 500 Innovation Drive, Suite 200, Metropolis, NY 10101, USA</h5>
                            </div>
                        </div>
                    </div> <!-- end .p-4-->                    
                </div> <!-- end col-->


                <div class="col-xxl-8">
                    <form class="p-4 border rounded-4 border-dashed">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control bg-light bg-opacity-50 border-0 py-2" id="name" autocomplete="name" placeholder="Enter your full name">
                            </div>

                            <div class="col-md-6">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control bg-light bg-opacity-50 border-0 py-2" id="email" autocomplete="email" placeholder="Enter your email">
                            </div>

            
                            <div class="col-md-12">
                                <label for="subject" class="form-label">Subject</label>
                                <input type="text" class="form-control bg-light bg-opacity-50 border-0 py-2" id="subject" placeholder="What’s the reason for contact?">
                            </div>
            
                            <div class="col-md-12">
                                <label for="message" class="form-label">Message</label>
                                <textarea class="form-control bg-light bg-opacity-50 border-0 py-2" id="message" rows="5" placeholder="Write your message here..."></textarea>
                            </div>
            
                            <div class="col-md-12 text-end">
                                <button type="submit" class="btn btn-primary rounded-pill">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div> <!-- end col-->
            </div>   <!-- end row-->
        </div> <!-- end container-->
    </section>
    <!-- =======================
        CONTACT SECTION END
    ======================= -->

    <!-- =======================
        FOOTER SECTION
    ======================= -->
    <footer class="section-custom section-footer pb-2">

        <div class="container">
            <div class="row g-4 justify-content-between">
                <div class="col-lg-3">
                    <img src="assets/images/logo.png" alt="logo" height="24">
                    <p class="mt-3 fs-sm">
                        UBold is a best-selling admin dashboard template on ThemeForest, recognized for its clean design, versatility, and robust features. Create modern, responsive web applications effortlessly with this top-tier solution!
                    </p>

                    <div class="d-flex gap-2 mt-4 mb-2">
                        <a href="#!" class="btn btn-sm btn-icon rounded-circle btn-dark" title="Facebook">
                            <i data-lucide="facebook" class="fs-sm"></i>
                        </a>
                        <a href="#!" class="btn btn-sm btn-icon rounded-circle btn-dark" title="Twitter-x">
                            <i class="ti ti-brand-x fs-sm"></i>
                        </a>
                        <a href="#!" class="btn btn-sm btn-icon rounded-circle btn-dark" title="Instagram">
                            <i data-lucide="instagram" class="fs-sm"></i>
                        </a>
                        <a href="#!" class="btn btn-sm btn-icon rounded-circle btn-dark" title="WhatsApp">
                            <i data-lucide="dribbble" class="fs-sm"></i>
                        </a>                                               
                    </div>
                </div> <!-- end col-->

                <div class="col-lg-8 col-xxl-7">
                    <div class="row g-4">
                        <div class="col-6 col-md-4">
                            <h5 class="text-white mb-4 ps-2">Company</h5>
                            <ul class="nav flex-column">
                                <li class="nav-item"><a class="nav-link pt-0" href="#!">Our Story</a></li>
                                <li class="nav-item"><a class="nav-link" href="#!">Leadership Team</a></li>
                                <li class="nav-item"><a class="nav-link" href="#!">Careers <span class="badge text-bg-warning ms-2">We're Hiring</span></a></li>
                                <li class="nav-item"><a class="nav-link" href="#!">Press & Media</a></li>
                                <li class="nav-item"><a class="nav-link" href="#!">Investor Relations</a></li>
                                <li class="nav-item"><a class="nav-link" href="#!">Sustainability</a></li>
                            </ul>                            
                        </div>
    
                        <div class="col-6 col-md-4">
                            <h5 class="text-white mb-4 ps-2">Community</h5>
                            <ul class="nav flex-column">
                                <li class="nav-item"><a class="nav-link pt-0" href="#!">Community Forum</a></li>
                                <li class="nav-item"><a class="nav-link" href="#!">Events & Meetups</a></li>
                                <li class="nav-item"><a class="nav-link" href="#!">Ambassadors</a></li>
                                <li class="nav-item"><a class="nav-link" href="#!">Customer Stories</a></li>
                                <li class="nav-item"><a class="nav-link" href="#!">Open Source</a></li>
                                <li class="nav-item"><a class="nav-link" href="#!">Code of Conduct</a></li>
                            </ul>
                        </div>                        

                        <div class="col-6 col-md-4">
                            <h5 class="text-white mb-4 ps-2">Admin</h5>
                            <ul class="nav flex-column">
                                <li class="nav-item"><a class="nav-link pt-0" href="#!">Dashboard</a></li>
                                <li class="nav-item"><a class="nav-link" href="#!">User Management</a></li>
                                <li class="nav-item"><a class="nav-link" href="#!">Roles & Permissions</a></li>
                                <li class="nav-item"><a class="nav-link" href="#!">System Logs</a></li>
                                <li class="nav-item"><a class="nav-link" href="#!">Settings</a></li>
                                <li class="nav-item"><a class="nav-link" href="#!">API Access</a></li>
                            </ul>
                        </div>
                    </div> <!-- end row-->
                </div> <!-- end col-->
            </div> <!-- end row-->

            <div class="row mt-5">
                <div class="col-12 text-center">
                    <p class="mb-4">© <script>document.write(new Date().getFullYear())</script> UBold By <span class="fw-semibold">Coderthemes</span> </p>
                </div>
            </div> <!-- end row-->
        </div> <!-- end container-->
    </footer>
    <!-- =======================
        FOOTER SECTION END
    ======================= -->

    <?php include('partials/footer-scripts.php'); ?>

    <!-- Landing Page js -->
    <script src="assets/js/pages/landing.js"></script>

</body>

</html>