<?php include('partials/html.php'); ?>

<head>
    <?php $title = "CRM Leads"; include('partials/title-meta.php'); ?>

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

                <?php $subtitle = "CRM"; $title = "Leads"; include('partials/page-title.php'); ?>

                <div class="row row-cols-2 row-cols-md-4 row-cols-xl-6 g-1 mb-1">

                    <div class="col">
                        <div class="card text-center p-3 mb-0">
                            <p class="mb-1 text-muted">New</p>
                            <h4 class="mb-0"><span data-target="547">0</span></h4>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card text-center p-3 mb-0">
                            <p class="mb-1 text-muted">Contacted</p>
                            <h4 class="mb-0"><span data-target="469.2">0</span>k</h4>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card text-center p-3 mb-0">
                            <p class="mb-1 text-muted">Qualified</p>
                            <h4 class="mb-0"><span data-target="105">0</span>k</h4>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card text-center p-3 mb-0">
                            <p class="mb-1 text-muted">Proposal Sent</p>
                            <h4 class="mb-0"><span data-target="2.84">0</span>k</h4>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card text-center p-3 mb-0">
                            <p class="mb-1 text-success">Customers</p>
                            <h4 class="mb-0 text-success"><span data-target="4.98">0</span>k</h4>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card text-center p-3 mb-0">
                            <p class="mb-1 text-danger">Lost Leads</p>
                            <h4 class="mb-0 text-danger"><span data-target="2.05">0</span>k</h4>
                        </div>
                    </div>

                </div>

                <!-- end row-->


                <div class="row">
                    <div class="col-12">
                        <div data-table data-table-rows-per-page="8" class="card">
                            <div class="card-header border-light justify-content-between">
                                <div class="d-flex gap-2">
                                    <div class="app-search">
                                        <input data-table-search type="search" class="form-control" placeholder="Search leads...">
                                        <i data-lucide="search" class="app-search-icon text-muted"></i>
                                    </div>
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addLeadModal"><i class="ti ti-plus me-1"></i> New Leads</button>
                                    <button data-table-delete-selected class="btn btn-danger d-none">Delete</button>
                                </div>

                                <div class="d-flex align-items-center gap-2">
                                    <span class="me-2 fw-semibold">Filter By:</span>

                                    <!-- Status Filter -->
                                    <div class="app-search">
                                        <select data-table-filter="status" class="form-select form-control my-1 my-md-0">
                                            <option value="">Status</option>
                                            <option value="In Progress">In Progress</option>
                                            <option value="Proposal Sent">Proposal Sent</option>
                                            <option value="Follow Up">Follow Up</option>
                                            <option value="Pending">Pending</option>
                                            <option value="Negotiation">Negotiation</option>
                                            <option value="Rejected">Rejected</option>
                                        </select>
                                        <i data-lucide="shuffle" class="app-search-icon text-muted"></i>
                                    </div>

                                    <!-- Price Range Filter -->
                                    <div class="app-search">
                                        <select data-table-range-filter="amount" class="form-select form-control my-1 my-md-0">
                                            <option value="">Amount Range</option>
                                            <option value="0-100000">$0 - $100000</option>
                                            <option value="100001-250000">$100001 - $250000</option>
                                            <option value="250001-500000">$250001 - $500000</option>
                                            <option value="500000+">$500000+</option>
                                        </select>
                                        <i data-lucide="dollar-sign" class="app-search-icon text-muted"></i>
                                    </div>

                                    <!-- Records Per Page -->
                                    <div>
                                        <select data-table-set-rows-per-page class="form-select form-control my-1 my-md-0">
                                            <option value="5">5</option>
                                            <option value="10" selected>10</option>
                                            <option value="15">15</option>
                                            <option value="20">20</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-custom table-centered table-select table-hover w-100 mb-0">
                                        <thead class="bg-light align-middle bg-opacity-25 thead-sm text-nowrap">
                                            <tr class="text-uppercase fs-xxs">
                                                <th class="ps-3" style="width: 1%;">
                                                    <input data-table-select-all class="form-check-input form-check-input-light fs-14 mt-0" type="checkbox" id="select-all-products" value="option">
                                                </th>
                                                <th data-table-sort>Lead ID</th>
                                                <th>Customer</th>
                                                <th>Company</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th data-table-sort data-column="amount">Amount (USD)</th>
                                                <th>Tags</th>
                                                <th>Assigned</th>
                                                <th data-table-sort data-column="status">Status</th>
                                                <th data-table-sort>Created</th>
                                                <th class="text-center" style="width: 1%;">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-nowrap">
                                            <tr>
                                                <td class="ps-3">
                                                    <input class="form-check-input form-check-input-light fs-14 product-item-check mt-0" type="checkbox" value="option">
                                                </td>
                                                <td><a href="#!" class="fw-semibold link-reset">#LD007842</a></td>
                                                <td>R. Thompson</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar-sm border flex-shrink-0 border-dashed rounded-circle me-2 justify-content-center d-flex align-items-center">
                                                            <img src="assets/images/logos/amazon.svg" alt="Product" height="20">
                                                        </div>
                                                        <a href="#!" class="link-reset">Amazon Web Services</a>
                                                    </div>
                                                </td>
                                                <td>contact@aws.com</td>
                                                <td>+1 206-555-0199</td>
                                                <td>$150,000</td>
                                                <td>
                                                    <span class="badge badge-label bg-info-subtle text-info">Cloud</span>
                                                </td>
                                                <td>
                                                    <img src="assets/images/users/user-10.jpg" alt="Product" class="avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Emily Carter">
                                                </td>
                                                <td>
                                                    <span class="badge bg-success-subtle text-success">In Progress</span>
                                                </td>
                                                <td>12 Jul, 2025</td>
                                                <td class="text-center">
                                                    <div class="d-flex align-items-center justify-content-center gap-1">
                                                        <a href="#" class="btn btn-default btn-icon btn-sm rounded"><i class="ti ti-eye fs-lg"></i></a>
                                                        <a href="#" class="btn btn-default btn-icon btn-sm rounded"><i class="ti ti-edit fs-lg"></i></a>
                                                        <a href="#" data-table-delete-row="" class="btn btn-default btn-icon btn-sm rounded"><i class="ti ti-trash fs-lg"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="ps-3">
                                                    <input class="form-check-input form-check-input-light fs-14 product-item-check mt-0" type="checkbox" value="option">
                                                </td>
                                                <td><a href="#!" class="fw-semibold link-reset">#LD007865</a></td>
                                                <td>S. Kapoor</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar-sm border flex-shrink-0 border-dashed rounded-circle me-2 justify-content-center d-flex align-items-center">
                                                            <img src="assets/images/logos/microsoft.svg" alt="Product" height="20" class="rounded-circle">
                                                        </div>
                                                        <a href="#!" class="link-reset">Microsoft</a>
                                                    </div>
                                                </td>
                                                <td>s.kapoor@microt.com</td>
                                                <td>+44 20 7946 0991</td>
                                                <td>$98,500</td>
                                                <td>
                                                    <span class="badge badge-label bg-warning-subtle text-warning">AI</span>
                                                </td>
                                                <td>
                                                    <img src="assets/images/users/user-2.jpg" alt="Product" class="avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Liam Brown">
                                                </td>
                                                <td>
                                                    <span class="badge bg-primary-subtle text-primary">Proposal Sent</span>
                                                </td>
                                                <td>21 Jul, 2025</td>
                                                <td class="text-center">
                                                    <div class="d-flex align-items-center justify-content-center gap-1">
                                                        <a href="#" class="btn btn-default btn-icon btn-sm rounded"><i class="ti ti-eye fs-lg"></i></a>
                                                        <a href="#" class="btn btn-default btn-icon btn-sm rounded"><i class="ti ti-edit fs-lg"></i></a>
                                                        <a href="#" data-table-delete-row="" class="btn btn-default btn-icon btn-sm rounded"><i class="ti ti-trash fs-lg"></i></a>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="ps-3">
                                                    <input class="form-check-input form-check-input-light fs-14 product-item-check mt-0" type="checkbox" value="option">
                                                </td>
                                                <td><a href="#!" class="fw-semibold link-reset">#LD007866</a></td>
                                                <td>A. Patel</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar-sm border flex-shrink-0 border-dashed rounded-circle me-2 justify-content-center d-flex align-items-center">
                                                            <img src="assets/images/logos/google.svg" alt="Product" height="20">
                                                        </div>
                                                        <a href="#!" class="link-reset">Google</a>
                                                    </div>
                                                </td>
                                                <td>amit.patel@google.com</td>
                                                <td>+1 650-253-0000</td>
                                                <td>$120,000</td>
                                                <td>
                                                    <span class="badge badge-label bg-success-subtle text-success">Cloud</span>
                                                </td>
                                                <td>
                                                    <img src="assets/images/users/user-3.jpg" alt="Product" class="avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Emily Wang">
                                                </td>
                                                <td>
                                                    <span class="badge bg-info-subtle text-info">Follow Up</span>
                                                </td>
                                                <td>22 Jul, 2025</td>
                                                <td class="text-center">
                                                    <div class="d-flex align-items-center justify-content-center gap-1">
                                                        <a href="#" class="btn btn-default btn-icon btn-sm rounded"><i class="ti ti-eye fs-lg"></i></a>
                                                        <a href="#" class="btn btn-default btn-icon btn-sm rounded"><i class="ti ti-edit fs-lg"></i></a>
                                                        <a href="#" data-table-delete-row="" class="btn btn-default btn-icon btn-sm rounded"><i class="ti ti-trash fs-lg"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="ps-3">
                                                    <input class="form-check-input form-check-input-light fs-14 product-item-check mt-0" type="checkbox" value="option">
                                                </td>
                                                <td><a href="#!" class="fw-semibold link-reset">#LD007867</a></td>
                                                <td>J. Fernandes</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar-sm border flex-shrink-0 border-dashed rounded-circle me-2 justify-content-center d-flex align-items-center">
                                                            <img src="assets/images/logos/airbnb.svg" alt="Product" height="20">
                                                        </div>
                                                        <a href="#!" class="link-reset">Airbnb Inc</a>
                                                    </div>
                                                </td>
                                                <td>j.fernandes@adobe.com</td>
                                                <td>+1 408-536-6000</td>
                                                <td>$65,000</td>
                                                <td>
                                                    <span class="badge badge-label bg-danger-subtle text-danger">Design</span>
                                                </td>
                                                <td>
                                                    <img src="assets/images/users/user-4.jpg" alt="Product" class="avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Sara Kim">
                                                </td>
                                                <td>
                                                    <span class="badge bg-warning-subtle text-warning">Pending</span>
                                                </td>
                                                <td>23 Jul, 2025</td>
                                                <td class="text-center">
                                                    <div class="d-flex align-items-center justify-content-center gap-1">
                                                        <a href="#" class="btn btn-default btn-icon btn-sm rounded"><i class="ti ti-eye fs-lg"></i></a>
                                                        <a href="#" class="btn btn-default btn-icon btn-sm rounded"><i class="ti ti-edit fs-lg"></i></a>
                                                        <a href="#" data-table-delete-row="" class="btn btn-default btn-icon btn-sm rounded"><i class="ti ti-trash fs-lg"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="ps-3">
                                                    <input class="form-check-input form-check-input-light fs-14 product-item-check mt-0" type="checkbox" value="option">
                                                </td>
                                                <td><a href="#!" class="fw-semibold link-reset">#LD007868</a></td>
                                                <td>M. Zhang</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar-sm border flex-shrink-0 border-dashed rounded-circle me-2 justify-content-center d-flex align-items-center">
                                                            <img src="assets/images/logos/apple.svg" alt="Product" height="20">
                                                        </div>
                                                        <a href="#!" class="link-reset">Apple Platforms</a>
                                                    </div>
                                                </td>
                                                <td>ming.zhang@apple.com</td>
                                                <td>+1 650-308-7300</td>
                                                <td>$142,000</td>
                                                <td>
                                                    <span class="badge badge-label bg-secondary-subtle text-secondary">VR</span>
                                                </td>
                                                <td>
                                                    <img src="assets/images/users/user-5.jpg" alt="Product" class="avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="David Li">
                                                </td>
                                                <td>
                                                    <span class="badge bg-success-subtle text-success">In Progress</span>
                                                </td>
                                                <td>23 Jul, 2025</td>
                                                <td class="text-center">
                                                    <div class="d-flex align-items-center justify-content-center gap-1">
                                                        <a href="#" class="btn btn-default btn-icon btn-sm rounded"><i class="ti ti-eye fs-lg"></i></a>
                                                        <a href="#" class="btn btn-default btn-icon btn-sm rounded"><i class="ti ti-edit fs-lg"></i></a>
                                                        <a href="#" data-table-delete-row="" class="btn btn-default btn-icon btn-sm rounded"><i class="ti ti-trash fs-lg"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="ps-3">
                                                    <input class="form-check-input form-check-input-light fs-14 product-item-check mt-0" type="checkbox" value="option">
                                                </td>
                                                <td><a href="#!" class="fw-semibold link-reset">#LD007869</a></td>
                                                <td>N. Sharma</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar-sm border flex-shrink-0 border-dashed rounded-circle me-2 justify-content-center d-flex align-items-center">
                                                            <img src="assets/images/logos/asana.svg" alt="Product" height="14">
                                                        </div>
                                                        <a href="#!" class="link-reset">Asana</a>
                                                    </div>
                                                </td>
                                                <td>n.sharma@netflix.com</td>
                                                <td>+1 408-540-3700</td>
                                                <td>$75,500</td>
                                                <td>
                                                    <span class="badge badge-label bg-info-subtle text-info">Streaming</span>
                                                </td>
                                                <td>
                                                    <img src="assets/images/users/user-6.jpg" alt="Product" class="avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Natalie Jones">
                                                </td>
                                                <td>
                                                    <span class="badge bg-danger-subtle text-danger">Rejected</span>
                                                </td>
                                                <td>24 Jul, 2025</td>
                                                <td class="text-center">
                                                    <div class="d-flex align-items-center justify-content-center gap-1">
                                                        <a href="#" class="btn btn-default btn-icon btn-sm rounded"><i class="ti ti-eye fs-lg"></i></a>
                                                        <a href="#" class="btn btn-default btn-icon btn-sm rounded"><i class="ti ti-edit fs-lg"></i></a>
                                                        <a href="#" data-table-delete-row="" class="btn btn-default btn-icon btn-sm rounded"><i class="ti ti-trash fs-lg"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="ps-3">
                                                    <input class="form-check-input form-check-input-light fs-14 product-item-check mt-0" type="checkbox" value="option">
                                                </td>
                                                <td><a href="#!" class="fw-semibold link-reset">#LD007870</a></td>
                                                <td>K. Williams</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar-sm border flex-shrink-0 border-dashed rounded-circle me-2 justify-content-center d-flex align-items-center">
                                                            <img src="assets/images/logos/dropbox.svg" alt="Product" height="20">
                                                        </div>
                                                        <a href="#!" class="link-reset">Dropbox</a>
                                                    </div>
                                                </td>
                                                <td>k.williams@tesila.com</td>
                                                <td>+1 310-420-6600</td>
                                                <td>$110,250</td>
                                                <td>
                                                    <span class="badge badge-label bg-dark-subtle text-dark">EV</span>
                                                </td>
                                                <td>
                                                    <img src="assets/images/users/user-7.jpg" alt="Product" class="avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Kevin Nguyen">
                                                </td>
                                                <td>
                                                    <span class="badge bg-secondary-subtle text-secondary">Negotiation</span>
                                                </td>
                                                <td>24 Jul, 2025</td>
                                                <td class="text-center">
                                                    <div class="d-flex align-items-center justify-content-center gap-1">
                                                        <a href="#" class="btn btn-default btn-icon btn-sm rounded"><i class="ti ti-eye fs-lg"></i></a>
                                                        <a href="#" class="btn btn-default btn-icon btn-sm rounded"><i class="ti ti-edit fs-lg"></i></a>
                                                        <a href="#" data-table-delete-row="" class="btn btn-default btn-icon btn-sm rounded"><i class="ti ti-trash fs-lg"></i></a>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="ps-3">
                                                    <input class="form-check-input form-check-input-light fs-14 product-item-check mt-0" type="checkbox" value="option">
                                                </td>
                                                <td><a href="#!" class="fw-semibold link-reset">#LD007871</a></td>
                                                <td>L. Mehra</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar-sm border flex-shrink-0 border-dashed rounded-circle me-2 justify-content-center d-flex align-items-center">
                                                            <img src="assets/images/logos/airbnb.svg" alt="Product" height="20">
                                                        </div>
                                                        <a href="#!" class="link-reset">Airbnb</a>
                                                    </div>
                                                </td>
                                                <td>l.mehra@airbnb.com</td>
                                                <td>+1 415-555-0102</td>
                                                <td>$87,000</td>
                                                <td>
                                                    <span class="badge badge-label bg-danger-subtle text-danger">Travel</span>
                                                </td>
                                                <td>
                                                    <img src="assets/images/users/user-8.jpg" alt="Product" class="avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Laura Mehra">
                                                </td>
                                                <td>
                                                    <span class="badge bg-primary-subtle text-primary">Proposal Sent</span>
                                                </td>
                                                <td>24 Jul, 2025</td>
                                                <td class="text-center">
                                                    <div class="d-flex align-items-center justify-content-center gap-1">
                                                        <a href="#" class="btn btn-default btn-icon btn-sm rounded"><i class="ti ti-eye fs-lg"></i></a>
                                                        <a href="#" class="btn btn-default btn-icon btn-sm rounded"><i class="ti ti-edit fs-lg"></i></a>
                                                        <a href="#" data-table-delete-row="" class="btn btn-default btn-icon btn-sm rounded"><i class="ti ti-trash fs-lg"></i></a>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="ps-3">
                                                    <input class="form-check-input form-check-input-light fs-14 product-item-check mt-0" type="checkbox" value="option">
                                                </td>
                                                <td><a href="#!" class="fw-semibold link-reset">#LD007872</a></td>
                                                <td>R. Iyer</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar-sm border flex-shrink-0 border-dashed rounded-circle me-2 justify-content-center d-flex align-items-center">
                                                            <img src="assets/images/logos/slack.svg" alt="Product" height="20">
                                                        </div>
                                                        <a href="#!" class="link-reset">Slack</a>
                                                    </div>
                                                </td>
                                                <td>r.iyer@slackhq.com</td>
                                                <td>+1 628-555-0111</td>
                                                <td>$332,000</td>
                                                <td>
                                                    <span class="badge badge-label bg-info-subtle text-info">Collaboration</span>
                                                </td>
                                                <td>
                                                    <img src="assets/images/users/user-9.jpg" alt="Product" class="avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Rohan Iyer">
                                                </td>
                                                <td>
                                                    <span class="badge bg-success-subtle text-success">In Progress</span>
                                                </td>
                                                <td>24 Jul, 2025</td>
                                                <td class="text-center">
                                                    <div class="d-flex align-items-center justify-content-center gap-1">
                                                        <a href="#" class="btn btn-default btn-icon btn-sm rounded"><i class="ti ti-eye fs-lg"></i></a>
                                                        <a href="#" class="btn btn-default btn-icon btn-sm rounded"><i class="ti ti-edit fs-lg"></i></a>
                                                        <a href="#" data-table-delete-row="" class="btn btn-default btn-icon btn-sm rounded"><i class="ti ti-trash fs-lg"></i></a>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="ps-3">
                                                    <input class="form-check-input form-check-input-light fs-14 product-item-check mt-0" type="checkbox" value="option">
                                                </td>
                                                <td><a href="#!" class="fw-semibold link-reset">#LD007873</a></td>
                                                <td>E. Fernandez</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="avatar-sm border flex-shrink-0 border-dashed rounded-circle me-2 justify-content-center d-flex align-items-center">
                                                            <img src="assets/images/logos/spotify.svg" alt="Product" height="20">
                                                        </div>
                                                        <a href="#!" class="link-reset">Spotify</a>
                                                    </div>
                                                </td>
                                                <td>emma.f@spotify.com</td>
                                                <td>+46 31 123 456</td>
                                                <td>$91,7000</td>
                                                <td>
                                                    <span class="badge badge-label bg-success-subtle text-success">Music</span>
                                                </td>
                                                <td>
                                                    <img src="assets/images/users/user-10.jpg" alt="Product" class="avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Emma Fernandez">
                                                </td>
                                                <td>
                                                    <span class="badge bg-warning-subtle text-warning">Pending</span>
                                                </td>
                                                <td>25 Jul, 2025</td>
                                                <td class="text-center">
                                                    <div class="d-flex align-items-center justify-content-center gap-1">
                                                        <a href="#" class="btn btn-default btn-icon btn-sm rounded"><i class="ti ti-eye fs-lg"></i></a>
                                                        <a href="#" class="btn btn-default btn-icon btn-sm rounded"><i class="ti ti-edit fs-lg"></i></a>
                                                        <a href="#" data-table-delete-row="" class="btn btn-default btn-icon btn-sm rounded"><i class="ti ti-trash fs-lg"></i></a>
                                                    </div>
                                                </td>
                                            </tr>

                                        </tbody>

                                    </table>
                                </div> <!-- end table-respo.-->

                            </div> <!-- end card-body-->

                            <div class="card-footer border-0">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div data-table-pagination-info="Leads"></div>
                                    <div data-table-pagination></div>
                                </div>
                            </div>
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                </div> <!-- end row-->

                <!-- Add New Lead Modal -->
                <div class="modal fade" id="addLeadModal" tabindex="-1" aria-labelledby="addLeadModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title" id="addLeadModalLabel">Add New Lead</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <form id="leadForm">
                                <div class="modal-body">
                                    <div class="row g-3">

                                        <div class="col-md-6">
                                            <label for="leadName" class="form-label">Lead Name</label>
                                            <input type="text" class="form-control" id="leadName" placeholder="Enter lead name" required>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="companyName" class="form-label">Company</label>
                                            <input type="text" class="form-control" id="companyName" placeholder="Enter company name" required>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="email" placeholder="Enter email" required>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="phone" class="form-label">Phone</label>
                                            <input type="tel" class="form-control" id="phone" placeholder="+1 234-567-8910">
                                        </div>

                                        <div class="col-md-6">
                                            <label for="amount" class="form-label">Amount (USD)</label>
                                            <input type="number" class="form-control" id="amount" placeholder="e.g. 50000">
                                        </div>

                                        <div class="col-md-6">
                                            <label for="Leadstatus" class="form-label">Status</label>
                                            <select class="form-select" id="Leadstatus">
                                                <option value="">Select status</option>
                                                <option>In Progress</option>
                                                <option>Proposal Sent</option>
                                                <option>Follow Up</option>
                                                <option>Pending</option>
                                                <option>Negotiation</option>
                                                <option>Rejected</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6">
                                            <label for="assignedTo" class="form-label">Assign To</label>
                                            <select class="form-select" id="assignedTo">
                                                <option value="">Select user</option>
                                                <option value="1">Emily Carter</option>
                                                <option value="2">Rohan Iyer</option>
                                                <option value="3">Sara Kim</option>
                                                <option value="4">Kevin Nguyen</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Save Lead</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

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

    <!-- Custom table -->
    <script src="assets/js/pages/custom-table.js"></script>

</body>

</html>