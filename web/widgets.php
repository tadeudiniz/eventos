<?php include('partials/html.php'); ?>

<head>
    <?php $title = "Widgets"; include('partials/title-meta.php'); ?>

    <?php include('partials/head-css.php'); ?>
</head>

<body>
    <!-- Begin page -->
    <div class="wrapper">

        <?php include('partials/menu.php'); ?>

        <!-- ============================================================== -->
        <!-- Start Main Content -->
        <!-- ============================================================== -->

        <div class="content-page">

            <div class="container-fluid">

                <?php $title = "Widgets"; include('partials/page-title.php'); ?>

                <div class="row row-cols-xxl-4 row-cols-md-2 row-cols-1">
                    <!-- Total Sales Widget -->
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="avatar fs-60 avatar-img-size flex-shrink-0">
                                        <span class="avatar-title bg-primary-subtle text-primary rounded-circle fs-24">
                                            <i class="ti ti-credit-card"></i>
                                        </span>
                                    </div>
                                    <div class="text-end">
                                        <h3 class="mb-2 fw-normal">$<span data-target="124.7">0</span>K</h3>
                                        <p class="mb-0 text-muted"><span>Total Sales</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <!-- Orders Placed Widget -->
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="avatar fs-60 avatar-img-size flex-shrink-0">
                                        <span class="avatar-title bg-success-subtle text-success rounded-circle fs-24">
                                            <i class="ti ti-shopping-cart"></i>
                                        </span>
                                    </div>
                                    <div class="text-end">
                                        <h3 class="mb-2 fw-normal"><span data-target="2358">0</span></h3>
                                        <p class="mb-0 text-muted"><span>Orders Placed</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <!-- Active Customers Widget -->
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="avatar fs-60 avatar-img-size flex-shrink-0">
                                        <span class="avatar-title bg-info-subtle text-info rounded-circle fs-24">
                                            <i class="ti ti-users"></i>
                                        </span>
                                    </div>
                                    <div class="text-end">
                                        <h3 class="mb-2 fw-normal"><span data-target="839">0</span></h3>
                                        <p class="mb-0 text-muted"><span>Active Customers</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <!-- Refund Requests Widget -->
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="avatar fs-60 avatar-img-size flex-shrink-0">
                                        <span class="avatar-title bg-warning-subtle text-warning rounded-circle fs-24">
                                            <i class="ti ti-rotate-clockwise-2"></i>
                                        </span>
                                    </div>
                                    <div class="text-end">
                                        <h3 class="mb-2 fw-normal"><span data-target="41">0</span></h3>
                                        <p class="mb-0 text-muted"><span>Refund Requests</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->

                <div class="row row-cols-xxl-4 row-cols-md-2 row-cols-1">

                    <!-- New Subscriptions -->
                    <div class="col">
                        <div class="card">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <h3 class="mb-2 fw-normal"><span data-target="438">0</span></h3>
                                    <p class="mb-0 text-muted">New Subscriptions</p>
                                </div>
                                <div class="avatar fs-60 avatar-img-size">
                                    <span class="avatar-title bg-secondary-subtle text-secondary rounded-circle fs-24">
                                        <i class="ti ti-bell-plus"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Support Tickets -->
                    <div class="col">
                        <div class="card">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <h3 class="mb-2 fw-normal"><span data-target="108">0</span></h3>
                                    <p class="mb-0 text-muted">Support Tickets</p>
                                </div>
                                <div class="avatar fs-60 avatar-img-size">
                                    <span class="avatar-title bg-danger-subtle text-danger rounded-circle fs-24">
                                        <i class="ti ti-headset"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Conversion Rate -->
                    <div class="col">
                        <div class="card">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <h3 class="mb-2 fw-normal"><span data-target="3.7">0</span>%</h3>
                                    <p class="mb-0 text-muted">Conversion Rate</p>
                                </div>
                                <div class="avatar fs-60 avatar-img-size">
                                    <span class="avatar-title text-bg-light rounded-circle fs-24">
                                        <i class="ti ti-chart-pie"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Revenue Growth -->
                    <div class="col">
                        <div class="card">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <h3 class="mb-2 fw-normal">+<span data-target="12.4">0</span>%</h3>
                                    <p class="mb-0 text-muted">Revenue Growth</p>
                                </div>
                                <div class="avatar fs-60 avatar-img-size">
                                    <span class="avatar-title bg-dark-subtle text-dark rounded-circle fs-24">
                                        <i class="ti ti-trending-up"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end row-->

                <div class="row row-cols-xxl-4 row-cols-md-2 row-cols-1 g-3 align-items-center">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h5 title="Number of Orders">Orders</h5>
                                    <p class="mb-0 fs-lg"><i class="ti ti-info-hexagon-filled text-muted"></i></p>
                                </div>
                                <div class="d-flex align-items-center gap-2 my-3">
                                    <div class="avatar-md flex-shrink-0">
                                        <span class="avatar-title text-bg-success bg-opacity-90 rounded-circle fs-22">
                                            <i class="ti ti-shopping-cart"></i>
                                        </span>
                                    </div>
                                    <h3 class="mb-0">1,250</h3>
                                </div>
                                <p class="mb-0">
                                    <span class="text-success"><i class="ti ti-point-filled"></i></span>
                                    <span class="text-nowrap text-muted">Total Orders</span>
                                    <span class="float-end"><b>15,320</b></span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h5 title="Revenue Earned">Revenue</h5>
                                    <p class="mb-0 fs-lg"><i class="ti ti-info-hexagon-filled text-muted"></i></p>
                                </div>
                                <div class="d-flex align-items-center gap-2 my-3">
                                    <div class="avatar-md flex-shrink-0">
                                        <span class="avatar-title text-bg-warning bg-opacity-90 rounded-circle fs-22">
                                            <i class="ti ti-currency-dollar"></i>
                                        </span>
                                    </div>
                                    <h3 class="mb-0">$98.7k</h3>
                                </div>
                                <p class="mb-0">
                                    <span class="text-primary"><i class="ti ti-point-filled"></i></span>
                                    <span class="text-nowrap text-muted">Total Revenue</span>
                                    <span class="float-end"><b>$1.2M</b></span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h5 title="Seller Ratings">Ratings</h5>
                                    <p class="mb-0 fs-lg"><i class="ti ti-info-hexagon-filled text-muted"></i></p>
                                </div>
                                <div class="d-flex align-items-center gap-2 my-3">
                                    <div class="avatar-md flex-shrink-0">
                                        <span class="avatar-title text-bg-info bg-opacity-90 rounded-circle fs-22">
                                            <i class="ti ti-star"></i>
                                        </span>
                                    </div>
                                    <h3 class="mb-0">4.8</h3>
                                </div>
                                <p class="mb-0">
                                    <span class="text-info"><i class="ti ti-point-filled"></i></span>
                                    <span class="text-nowrap text-muted">Average Rating</span>
                                    <span class="float-end"><b>5k Reviews</b></span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h5 title="Total Products">Products</h5> 
                                    <p class="mb-0 fs-lg"><i class="ti ti-info-hexagon-filled text-muted"></i></p>
                                </div>
                                <div class="d-flex align-items-center gap-2 my-3">
                                    <div class="avatar-md flex-shrink-0">
                                        <span class="avatar-title text-bg-secondary bg-opacity-90 rounded-circle fs-22">
                                            <i class="ti ti-box"></i>
                                        </span>
                                    </div>
                                    <h3 class="mb-0">350</h3>
                                </div>
                                <p class="mb-0">
                                    <span class="text-secondary"><i class="ti ti-point-filled"></i></span>
                                    <span class="text-nowrap text-muted">Total Products</span>
                                    <span class="float-end"><b>750 Variants</b></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div><!-- end row -->

                <div class="row row-cols-xxl-4 row-cols-md-2 row-cols-1 g-3 align-items-center">
                    <!-- Properties Listed -->
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h6 class="mb-0 fs-sm text-uppercase">Listed Properties</h6>
                                    <p class="mb-0 fs-lg">
                                        <i class="ti ti-info-hexagon-filled text-muted" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Total number of properties listed"></i>
                                    </p>
                                </div>
                                <h3 class="my-3 text-primary text-center"><span data-target="1,245">0</span></h3>
                                <p class="mb-0">
                                    <span class="text-info"><i class="ti ti-point-filled"></i></span>
                                    <span class="text-muted">New This Month: 120</span>
                                    <span class="float-end"><i class="ti ti-trending-up text-success"></i> <b>5.2%</b></span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Properties Sold -->
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h6 class="mb-0 fs-sm text-uppercase">Sold Properties</h6>
                                    <p class="mb-0 fs-lg">
                                        <i class="ti ti-info-hexagon-filled text-muted" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Properties successfully sold"></i>
                                    </p>
                                </div>
                                <h3 class="my-3 text-primary text-center"><span data-target="862">0</span></h3>
                                <p class="mb-0">
                                    <span class="text-success"><i class="ti ti-point-filled"></i></span>
                                    <span class="text-muted">This Year: 308</span>
                                    <span class="float-end"><i class="ti ti-trending-up text-success"></i> <b>7.9%</b></span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Rental Agreements -->
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h6 class="mb-0 fs-sm text-uppercase">Rental Agreements</h6>
                                    <p class="mb-0 fs-lg">
                                        <i class="ti ti-info-hexagon-filled text-muted" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Active rental contracts"></i>
                                    </p>
                                </div>
                                <h3 class="my-3 text-primary text-center"><span data-target="573">0</span></h3>
                                <p class="mb-0">
                                    <span class="text-warning"><i class="ti ti-point-filled"></i></span>
                                    <span class="text-muted">New Rentals: 48</span>
                                    <span class="float-end"><i class="ti ti-trending-up text-warning"></i> <b>2.3%</b></span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Active Agents -->
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h6 class="mb-0 fs-sm text-uppercase">Active Agents</h6>
                                    <p class="mb-0 fs-lg">
                                        <i class="ti ti-info-hexagon-filled text-muted" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Currently working agents"></i>
                                    </p>
                                </div>
                                <h3 class="my-3 text-primary text-center"><span data-target="127">0</span></h3>
                                <p class="mb-0">
                                    <span class="text-success"><i class="ti ti-point-filled"></i></span>
                                    <span class="text-muted">On Duty: 35</span>
                                    <span class="float-end"><i class="ti ti-trending-up text-success"></i> <b>4.1%</b></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row row-cols-xxl-4 row-cols-md-2 row-cols-1 g-3 align-items-center">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div class="avatar avatar-lg flex-shrink-0">
                                        <span class="avatar-title bg-info-subtle text-info rounded fs-24">
                                            <i class="ti ti-clipboard-list"></i>
                                        </span>
                                    </div>
                                    <div class="text-end">
                                        <h4 class="mb-0">28</h4>
                                        <p class="mb-0 text-muted">Active Projects</p>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <div class="d-flex justify-content-between mb-1">
                                        <span class="text-muted fs-xs fw-semibold">PROGRESS</span>
                                        <span class="text-muted">75%</span>
                                    </div>
                                    <div class="progress" style="height: 6px;">
                                        <div class="progress-bar bg-info" style="width: 75%;"></div>
                                    </div>
                                </div>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->

                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div class="avatar avatar-lg flex-shrink-0">
                                        <span class="avatar-title bg-success-subtle text-success rounded fs-24">
                                            <i class="ti ti-checklist"></i>
                                        </span>
                                    </div>
                                    <div class="text-end">
                                        <h4 class="mb-0">124</h4>
                                        <p class="mb-0 text-muted">Tasks Completed</p>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <div class="d-flex justify-content-between mb-1">
                                        <span class="text-muted fs-xs fw-semibold">TARGET</span>
                                        <span class="text-muted">88%</span>
                                    </div>
                                    <div class="progress" style="height: 6px;">
                                        <div class="progress-bar bg-success" style="width: 88%;"></div>
                                    </div>
                                </div>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->

                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div class="avatar avatar-lg flex-shrink-0">
                                        <span class="avatar-title bg-warning-subtle text-warning rounded fs-24">
                                            <i class="ti ti-clock-hour-4"></i>
                                        </span>
                                    </div>
                                    <div class="text-end">
                                        <h4 class="mb-0">16</h4>
                                        <p class="mb-0 text-muted">Pending Tasks</p>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <div class="d-flex justify-content-between mb-1">
                                        <span class="text-muted fs-xs fw-semibold">DEADLINES</span>
                                        <span class="text-muted">42%</span>
                                    </div>
                                    <div class="progress" style="height: 6px;">
                                        <div class="progress-bar bg-warning" style="width: 42%;"></div>
                                    </div>
                                </div>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->

                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div class="avatar avatar-lg flex-shrink-0">
                                        <span class="avatar-title bg-danger-subtle text-danger rounded fs-24">
                                            <i class="ti ti-user-cog"></i>
                                        </span>
                                    </div>
                                    <div class="text-end">
                                        <h4 class="mb-0">9</h4>
                                        <p class="mb-0 text-muted">Project Managers</p>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <div class="d-flex justify-content-between mb-1">
                                        <span class="text-muted fs-xs fw-semibold">ALLOCATED</span>
                                        <span class="text-muted">100%</span>
                                    </div>
                                    <div class="progress" style="height: 6px;">
                                        <div class="progress-bar bg-danger" style="width: 100%;"></div>
                                    </div>
                                </div>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                </div>
                <!-- end row-->

                <div class="row row-cols-xxl-4 row-cols-md-2 row-cols-1 g-3 align-items-center">
                    <div class="col">
                        <div class="card">
                            <div class="card-body d-flex align-items-center">
                                <div class="me-3">
                                    <img src="assets/images/users/user-1.jpg" alt="User" class="rounded-circle avatar-xl">
                                </div>
                                <div>
                                    <h5 class="mb-1">Ava Martinez</h5>
                                    <p class="text-muted fs-xs mb-0">Project Manager</p>
                                </div>
                                <button type="button" class="btn btn-soft-success btn-icon ms-auto"><i class="ti ti-phone-ringing fs-lg"></i></button>
                            </div>
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                    
                    <div class="col">
                        <div class="card">
                            <div class="card-body d-flex align-items-center">
                                <div class="me-3">
                                    <img src="assets/images/users/user-2.jpg" alt="User" class="rounded-circle avatar-xl">
                                </div>
                                <div>
                                    <h5 class="mb-1">Liam Nguyen</h5>
                                    <p class="text-muted fs-xs mb-0">UI/UX Designer</p>
                                </div>
                                <button type="button" class="btn btn-soft-warning btn-icon ms-auto"><i class="ti ti-phone-ringing fs-lg"></i></button>
                            </div>
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                    
                    <div class="col">
                        <div class="card">
                            <div class="card-body d-flex align-items-center">
                                <div class="me-3">
                                    <img src="assets/images/users/user-3.jpg" alt="User" class="rounded-circle avatar-xl">
                                </div>
                                <div>
                                    <h5 class="mb-1">Sophia Khan</h5>
                                    <p class="text-muted fs-xs mb-0">Marketing Lead</p>
                                </div>
                                <button type="button" class="btn btn-soft-info btn-icon ms-auto"><i class="ti ti-phone-ringing fs-lg"></i></button>
                            </div>
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                    
                    <div class="col">
                        <div class="card">
                            <div class="card-body d-flex align-items-center">
                                <div class="me-3">
                                    <img src="assets/images/users/user-4.jpg" alt="User" class="rounded-circle avatar-xl">
                                </div>
                                <div>
                                    <h5 class="mb-1">Noah Patel</h5>
                                    <p class="text-muted fs-xs mb-0">Backend Developer</p>
                                </div>
                                <button type="button" class="btn btn-soft-danger btn-icon ms-auto"><i class="ti ti-phone-ringing fs-lg"></i></button>
                            </div>
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                </div>
                <!-- end row-->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="p-3 bg-light-subtle border-bottom border-dashed">
                                    <div class="row">
                                        <div class="col">
                                            <h4 class="fs-sm mb-1">Would you like the full report?</h4>
                                            <small class="text-muted fs-xs mb-0">
                                                All 120 orders have been successfully delivered
                                            </small>
                                        </div>
                                        <div class="col-auto align-self-center">
                                            <button type="button" class="btn btn-sm btn-default rounded-circle btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Download">
                                                <i class="ti ti-download fs-xl"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row row-cols-xxl-5 row-cols-md-3 row-cols-1 g-2 p-3">
                                    <!-- Total Reports Generated Widget -->
                                    <div class="col">
                                        <div class="card border shadow-none border-dashed mb-0">
                                            <div class="card-body">
                                                <div class="mb-3 d-flex justify-content-between align-items-center">
                                                    <h5 class="fs-xl mb-0">4,320</h5>
                                                    <span>12.75% <i class="ti ti-arrow-up text-success"></i></span>
                                                </div>
                                                <p class="text-muted mb-2"><span>Total reports generated</span></p>
                                                <div class="progress progress-sm mb-0">
                                                    <div class="progress-bar bg-secondary" role="progressbar" style="width: 12.75%" aria-valuenow="12.75" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end col -->

                                    <!-- Reports Exported Widget -->
                                    <div class="col">
                                        <div class="card bg-primary border-primary shadow-none bg-opacity-10 border border-dashed mb-0">
                                            <div class="card-body">
                                                <div class="mb-3 d-flex justify-content-between align-items-center">
                                                    <h5 class="fs-xl mb-0">1,280</h5>
                                                    <span>7.20% <i class="ti ti-arrow-up text-success"></i></span>
                                                </div>
                                                <p class="text-muted mb-2"><span>Reports exported</span></p>
                                                <div class="progress bg-primary bg-opacity-25 progress-sm mb-0">
                                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 7.20%" aria-valuenow="7.20" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end col -->

                                    <!-- Errors Found in Reports Widget -->
                                    <div class="col">
                                        <div class="card bg-secondary shadow-none border-secondary bg-opacity-10 border border-dashed mb-0">
                                            <div class="card-body">
                                                <div class="mb-3 d-flex justify-content-between align-items-center">
                                                    <h5 class="fs-xl mb-0">157</h5>
                                                    <span>3.42% <i class="ti ti-alert-circle text-danger"></i></span>
                                                </div>
                                                <p class="text-muted mb-2 text-truncate"><span>Errors found in reports</span></p>
                                                <div class="progress bg-secondary bg-opacity-25 progress-sm mb-0">
                                                    <div class="progress-bar bg-secondary" role="progressbar" style="width: 3.42%" aria-valuenow="3.42" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end col -->

                                    <!-- Most Viewed Report Widget -->
                                    <div class="col-lg col-md-auto">
                                        <div class="card bg-warning bg-opacity-10 shadow-none border border-warning border-dashed mb-0">
                                            <div class="card-body">
                                                <div class="mb-3 d-flex justify-content-between align-items-center">
                                                    <h5 class="fs-xl mb-0">Analytics Q2</h5>
                                                    <span>54.6% <i class="ti ti-eye text-info"></i></span>
                                                </div>
                                                <p class="text-muted mb-2"><span>Most viewed report</span></p>
                                                <div class="progress bg-warning bg-opacity-25 progress-sm mb-0">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 54.6%" aria-valuenow="54.6" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end col -->

                                    <!-- Avg. Report Completion Time Widget -->
                                    <div class="col">
                                        <div class="card border shadow-none border-dashed mb-0">
                                            <div class="card-body">
                                                <div class="mb-3 d-flex justify-content-between align-items-center">
                                                    <h5 class="fs-xl mb-0">3.8 <small class="fs-6">mins</small></h5>
                                                    <span>1.65% <i class="ti ti-clock text-warning"></i></span>
                                                </div>
                                                <p class="text-muted mb-2"><span>Avg. completion time</span></p>
                                                <div class="progress progress-sm mb-0">
                                                    <div class="progress-bar bg-secondary" role="progressbar" style="width: 1.65%" aria-valuenow="1.65" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- end col -->
                                </div><!-- end row -->

                                <div class="text-center mb-3">
                                    <a href="#!" class="link-reset text-decoration-underline fw-semibold link-offset-3">
                                        View all Reports <i class="ti ti-link"></i>
                                    </a>
                                </div>

                            </div> <!-- end card-body-->
                        </div> <!-- end card-->

                    </div> <!-- end col-->
                </div>
                <!-- end row -->

                <div class="row">

                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Chat</h4>
                            </div> <!-- end card-header-->

                            <div class="card-body py-0" style="height: 380px;" id="chat-container" data-simplebar>

                                <!-- Message 1 -->
                                <div class="d-flex align-items-start gap-2 my-3 chat-item">
                                    <img src="assets/images/users/user-5.jpg" class="avatar-md rounded-circle" alt="User">
                                    <div>
                                        <div class="chat-message py-2 px-3 bg-warning-subtle rounded">
                                            Hey! Are you available for a quick call? 📞
                                        </div>
                                        <div class="text-muted fs-xs mt-1"><i class="ti ti-clock"></i> 08:55 am</div>
                                    </div>
                                </div>

                                <!-- Message 2 -->
                                <div class="d-flex align-items-start gap-2 my-3 text-end chat-item justify-content-end">
                                    <div>
                                        <div class="chat-message py-2 px-3 bg-info-subtle rounded">
                                            Sure, give me 5 minutes. Just wrapping something up.
                                        </div>
                                        <div class="text-muted fs-xs mt-1"><i class="ti ti-clock"></i> 08:57 am</div>
                                    </div>
                                    <img src="assets/images/users/user-2.jpg" class="avatar-md rounded-circle" alt="User">
                                </div>

                                <!-- Message 3 -->
                                <div class="d-flex align-items-start gap-2 my-3 chat-item">
                                    <img src="assets/images/users/user-5.jpg" class="avatar-md rounded-circle" alt="User">
                                    <div>
                                        <div class="chat-message py-2 px-3 bg-warning-subtle rounded">
                                            Perfect. Let me know when you're ready 👍
                                        </div>
                                        <div class="text-muted fs-xs mt-1"><i class="ti ti-clock"></i> 08:58 am</div>
                                    </div>
                                </div>

                                <!-- Message 4 -->
                                <div class="d-flex align-items-start gap-2 my-3 text-end chat-item justify-content-end">
                                    <div>
                                        <div class="chat-message py-2 px-3 bg-info-subtle rounded">
                                            Ready now. Calling you!
                                        </div>
                                        <div class="text-muted fs-xs mt-1"><i class="ti ti-clock"></i> 09:00 am</div>
                                    </div>
                                    <img src="assets/images/users/user-2.jpg" class="avatar-md rounded-circle" alt="User">
                                </div>

                                <!-- Message 5 -->
                                <div class="d-flex align-items-start gap-2 my-3 chat-item">
                                    <img src="assets/images/users/user-5.jpg" class="avatar-md rounded-circle" alt="User">
                                    <div>
                                        <div class="chat-message py-2 px-3 bg-warning-subtle rounded">
                                            Thanks for your time earlier!
                                        </div>
                                        <div class="text-muted fs-xs mt-1"><i class="ti ti-clock"></i> 09:45 am</div>
                                    </div>
                                </div>

                                <!-- Message 6 -->
                                <div class="d-flex align-items-start gap-2 my-3 text-end chat-item justify-content-end">
                                    <div>
                                        <div class="chat-message py-2 px-3 bg-info-subtle rounded">
                                            Of course! It was a productive discussion.
                                        </div>
                                        <div class="text-muted fs-xs mt-1"><i class="ti ti-clock"></i> 09:46 am</div>
                                    </div>
                                    <img src="assets/images/users/user-2.jpg" class="avatar-md rounded-circle" alt="User">
                                </div>

                                <!-- Message 7 -->
                                <div class="d-flex align-items-start gap-2 my-3 chat-item">
                                    <img src="assets/images/users/user-5.jpg" class="avatar-md rounded-circle" alt="User">
                                    <div>
                                        <div class="chat-message py-2 px-3 bg-warning-subtle rounded">
                                            I’ll send over the updated files by noon.
                                        </div>
                                        <div class="text-muted fs-xs mt-1"><i class="ti ti-clock"></i> 09:50 am</div>
                                    </div>
                                </div>

                            </div> <!-- end card-body -->

                            <div class="card-footer bg-body-secondary border-top border-dashed border-bottom-0">
                                <div class="d-flex gap-2">
                                    <div class="app-search flex-grow-1">
                                        <input type="text" class="form-control bg-light-subtle border-light" placeholder="Enter message...">
                                        <i data-lucide="message-square" class="app-search-icon text-muted"></i>
                                    </div>
                                    <a href="#!" class="btn btn-primary btn-icon"><i class="ti ti-send-2 fs-xl"></i></a>
                                </div>
                            </div>
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                    
                    <div class="col-xxl-4 col-lg-6">
                        <div class="card">
                            <div class="card-header justify-content-between align-items-center">
                                <h5 class="card-title">Traffic Sources</h5>
                                <div class="card-action">
                                    <a href="#!" class="card-action-item" data-action="card-toggle"><i class="ti ti-chevron-up"></i></a>
                                    <a href="#!" class="card-action-item" data-action="card-refresh"><i class="ti ti-refresh"></i></a>
                                    <a href="#!" class="card-action-item" data-action="card-close"><i class="ti ti-x"></i></a>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="row mb-2">
                                    <div class="col-lg">
                                        <h3 class="mb-2 fw-bold"><span data-target="8,975">0</span></h3>
                                        <p class="mb-2 fw-semibold text-muted">Right Now</p>
                                    </div><!--end col-->
                                    <div class="col-lg-auto align-self-center">
                                        <ul class="list-unstyled mb-0 lh-lg">
                                            <li>
                                                <i class="ti ti-caret-right-filled fs-lg align-middle text-primary"></i>
                                                <span class="text-muted">Organic</span>
                                            </li>
                                            <li>
                                                <i class="ti ti-caret-right-filled fs-lg align-middle text-success"></i>
                                                <span class="text-muted">Direct</span>
                                            </li>
                                            <li>
                                                <i class="ti ti-caret-right-filled fs-lg align-middle"></i>
                                                <span class="text-muted">Campaign</span>
                                            </li>
                                        </ul>
                                    </div><!--end col-->
                                </div><!--end row-->
                                <div class="progress mb-3" style="height: 10px;">
                                    <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-sm table-custom table-nowrap table-hover table-centered mb-0">
                                        <thead class="bg-light align-middle bg-opacity-25 thead-sm">
                                            <tr class="text-uppercase fs-xxs">
                                                <th class="text-muted">URL</th>
                                                <th class="text-muted text-end">Views</th>
                                                <th class="text-muted text-end">Uniques</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-decoration-underline">/dashboard</td>
                                                <td class="text-end">9.8k</td>
                                                <td class="text-end">8.5k</td>
                                            </tr>
                                            <tr>
                                                <td class="text-decoration-underline">/ecommerce-index</td>
                                                <td class="text-end">8.2k</td>
                                                <td class="text-end">7.1k</td>
                                            </tr>
                                            <tr>
                                                <td class="text-decoration-underline">/apps/projects-overview</td>
                                                <td class="text-end">7.6k</td>
                                                <td class="text-end">6.2k</td>
                                            </tr>
                                            <tr>
                                                <td class="text-decoration-underline">/pages/contact</td>
                                                <td class="text-end">5.9k</td>
                                                <td class="text-end">4.8k</td>
                                            </tr>
                                            <tr>
                                                <td class="text-decoration-underline">/support/faq</td>
                                                <td class="text-end">5.2k</td>
                                                <td class="text-end">4.3k</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div> <!-- ed .table-responsive-->
                                <div class="text-center mt-3">
                                    <a href="chat.php" class="link-reset text-decoration-underline fw-semibold link-offset-3">
                                        View all Links <i class="ti ti-link"></i>
                                    </a>
                                </div>
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->

                    </div> <!-- end col-->

                    <div class="col-xxl-4 col-lg-6">
                        <div class="card">
                            <div class="card-header justify-content-between align-items-center">
                                <h4 class="card-title">Top Countries</h4>
                                <div class="card-action">
                                    <a href="#!" class="card-action-item" data-action="card-toggle"><i class="ti ti-chevron-up"></i></a>
                                    <a href="#!" class="card-action-item" data-action="card-refresh"><i class="ti ti-refresh"></i></a>
                                    <a href="#!" class="card-action-item" data-action="card-close"><i class="ti ti-x"></i></a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex align-items-center gap-2 mb-3">
                                    <img src="assets/images/flags/in.svg" alt="India" class="avatar-xxs rounded">
                                    <h5 class="mb-0 fw-medium">
                                        <a href="#!" class="link-reset">India</a> <small class="text-muted">Pop: 1.43B</small>
                                    </h5>
                                    <div class="ms-auto">
                                        <div class="d-flex align-items-center gap-3 text-end">
                                            <p class="mb-0 fw-medium">14,217</p>
                                            <p class="badge badge-label fs-xxs badge-soft-success mb-0">+3.2%</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center gap-2 mb-3">
                                    <img src="assets/images/flags/de.svg" alt="Germany" class="avatar-xxs rounded">
                                    <h5 class="mb-0 fw-medium">
                                        <a href="#!" class="link-reset">Germany</a> <small class="text-muted">Pop: 83.2M</small>
                                    </h5>
                                    <div class="ms-auto">
                                        <div class="d-flex align-items-center gap-3 text-end">
                                            <p class="mb-0 fw-medium">10,412</p>
                                            <p class="badge badge-label fs-xxs badge-soft-success mb-0">+1.5%</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center gap-2 mb-3">
                                    <img src="assets/images/flags/fr.svg" alt="France" class="avatar-xxs rounded">
                                    <h5 class="mb-0 fw-medium">
                                        <a href="#!" class="link-reset">France</a> <small class="text-muted">Pop: 67.5M</small>
                                    </h5>
                                    <div class="ms-auto">
                                        <div class="d-flex align-items-center gap-3 text-end">
                                            <p class="mb-0 fw-medium">8,934</p>
                                            <p class="badge badge-label fs-xxs badge-soft-danger mb-0">-0.8%</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center gap-2 mb-3">
                                    <img src="assets/images/flags/us.svg" alt="United States" class="avatar-xxs rounded">
                                    <h5 class="mb-0 fw-medium">
                                        <a href="#!" class="link-reset">United States</a> <small class="text-muted">Pop: 339.9M</small>
                                    </h5>
                                    <div class="ms-auto">
                                        <div class="d-flex align-items-center gap-3 text-end">
                                            <p class="mb-0 fw-medium">18,522</p>
                                            <p class="badge badge-label fs-xxs badge-soft-success mb-0">+2.1%</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center gap-2 mb-3">
                                    <img src="assets/images/flags/gb.svg" alt="United Kingdom" class="avatar-xxs rounded">
                                    <h5 class="mb-0 fw-medium">
                                        <a href="#!" class="link-reset">United Kingdom</a> <small class="text-muted">Pop: 67.3M</small>
                                    </h5>
                                    <div class="ms-auto">
                                        <div class="d-flex align-items-center gap-3 text-end">
                                            <p class="mb-0 fw-medium">7,614</p>
                                            <p class="badge badge-label fs-xxs badge-soft-danger mb-0">-1.2%</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center gap-2 mb-3">
                                    <img src="assets/images/flags/ca.svg" alt="Canada" class="avatar-xxs rounded">
                                    <h5 class="mb-0 fw-medium">
                                        <a href="#!" class="link-reset">Canada</a> <small class="text-muted">Pop: 39.6M</small>
                                    </h5>
                                    <div class="ms-auto">
                                        <div class="d-flex align-items-center gap-3 text-end">
                                            <p class="mb-0 fw-medium">6,221</p>
                                            <p class="badge badge-label fs-xxs badge-soft-success mb-0">+0.9%</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center gap-2 mb-3">
                                    <img src="assets/images/flags/jp.svg" alt="Japan" class="avatar-xxs rounded">
                                    <h5 class="mb-0 fw-medium">
                                        <a href="#!" class="link-reset">Japan</a> <small class="text-muted">Pop: 123.3M</small>
                                    </h5>
                                    <div class="ms-auto">
                                        <div class="d-flex align-items-center gap-3 text-end">
                                            <p class="mb-0 fw-medium">5,785</p>
                                            <p class="badge badge-label fs-xxs badge-soft-warning mb-0">0.0%</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center gap-2 mb-3">
                                    <img src="assets/images/flags/au.svg" alt="Australia" class="avatar-xxs rounded">
                                    <h5 class="mb-0 fw-medium">
                                        <a href="#!" class="link-reset">Australia</a> <small class="text-muted">Pop: 26.8M</small>
                                    </h5>
                                    <div class="ms-auto">
                                        <div class="d-flex align-items-center gap-3 text-end">
                                            <p class="mb-0 fw-medium">4,918</p>
                                            <p class="badge badge-label fs-xxs badge-soft-success mb-0">+1.1%</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center mt-4">
                                    <a href="chat.php" class="link-reset text-decoration-underline fw-semibold link-offset-3">
                                        View all Countries <i class="ti ti-world"></i>
                                    </a>
                                </div>
                            </div> <!-- end card-body -->
                        </div> <!-- end card-->
                    </div> <!-- end col-->

                </div> <!-- end row-->

            </div>
            <!-- container -->

            <?php include('partials/footer.php'); ?>

        </div>

        <!-- ============================================================== -->
        <!-- End of Main Content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <?php include('partials/customizer.php'); ?>

    <?php include('partials/footer-scripts.php'); ?>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const container = document.querySelector('#chat-container');
            if (container && container.SimpleBar) {
                container.SimpleBar.getScrollElement().scrollTop = container.SimpleBar.getScrollElement().scrollHeight;
            } else {
                // Fallback if not using custom SimpleBar instance
                const scrollElement = container.querySelector('.simplebar-content-wrapper');
                if (scrollElement) {
                    scrollElement.scrollTop = scrollElement.scrollHeight;
                }
            }
        });
    </script>

</body>

</html>