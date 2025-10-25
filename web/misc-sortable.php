<?php include('partials/html.php'); ?>

<head>
    <?php $title = "Sortable List"; include('partials/title-meta.php'); ?>


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

                <?php $title = "Sortable List"; $subtitle = "Miscellaneous"; include('partials/page-title.php'); ?>


                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Nested Sortables List</h4>
                            </div><!-- end card header -->
                        
                            <div class="card-body">
                                <p class="text-muted">
                                    Use <code>nested-sortable</code> classes on the <code>list-group</code> element to enable drag-and-drop sorting of hierarchical task items.
                                </p>

                                <div class="list-group fw-medium nested-sortable">
                                    <div class="list-group-item">Campaign Planning</div>
                                    <div class="list-group-item">Content Creation
                                        <div class="list-group nested-sortable">
                                            <div class="list-group-item">Copywriting</div>
                                            <div class="list-group-item">Graphic Design
                                                <div class="list-group nested-sortable">
                                                    <div class="list-group-item">Banner Ads</div>
                                                    <div class="list-group-item">Social Media Posts</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list-group-item">Execution
                                        <div class="list-group nested-sortable">
                                            <div class="list-group-item">Email Marketing</div>
                                            <div class="list-group-item">Social Media Launch</div>
                                        </div>
                                    </div>
                                    <div class="list-group-item">Performance Review
                                        <div class="list-group nested-sortable">
                                            <div class="list-group-item">Analytics Report</div>
                                            <div class="list-group-item">Team Feedback</div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end card-body -->

                        </div><!-- end card --> 
                    </div>
                    <!-- end col -->

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Nested Sortables List with Handle</h4>
                            </div><!-- end card header -->

                            <div class="card-body">
                                <p class="text-muted">Use <code>nested-sortable-handle</code> class to list-group class to set a nested list with sortable items.</p>

                                <div class="list-group fw-medium nested-sortable-handle">
                                    <div class="list-group-item nested-1">
                                        <i class="ti ti-grip-horizontal align-middle sort-handle"></i>Product Launch
                                        <div class="list-group nested-sortable-handle">
                                            <div class="list-group-item nested-2">
                                                <i class="ti ti-grip-horizontal align-middle sort-handle"></i>Market Research
                                            </div>
                                            <div class="list-group-item nested-2">
                                                <i class="ti ti-grip-horizontal align-middle sort-handle"></i>Pre-Launch Prep
                                                <div class="list-group nested-sortable-handle">
                                                    <div class="list-group-item nested-3">
                                                        <i class="ti ti-grip-horizontal align-middle sort-handle"></i>Competitor Analysis
                                                    </div>
                                                    <div class="list-group-item nested-3">
                                                        <i class="ti ti-grip-horizontal align-middle sort-handle"></i>Buyer Persona
                                                    </div>
                                                    <div class="list-group-item nested-3">
                                                        <i class="ti ti-grip-horizontal align-middle sort-handle"></i>Campaign Setup
                                                    </div>
                                                    <div class="list-group-item nested-3">
                                                        <i class="ti ti-grip-horizontal align-middle sort-handle"></i>Internal Testing
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="list-group-item nested-2">
                                                <i class="ti ti-grip-horizontal align-middle sort-handle"></i>Launch Day
                                            </div>
                                            <div class="list-group-item nested-2">
                                                <i class="ti ti-grip-horizontal align-middle sort-handle"></i>Post-Launch Analysis
                                                <div class="list-group nested-sortable-handle">
                                                    <div class="list-group-item nested-3">
                                                        <i class="ti ti-grip-horizontal align-middle sort-handle"></i>User Feedback Collection
                                                    </div>
                                                    <div class="list-group-item nested-3">
                                                        <i class="ti ti-grip-horizontal align-middle sort-handle"></i>Sales Data Review
                                                    </div>
                                                    <div class="list-group-item nested-3">
                                                        <i class="ti ti-grip-horizontal align-middle sort-handle"></i>Team Retrospective
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              
                            </div><!-- end card-body -->
                        </div><!-- end card -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Sortable with Icons</h4>
                            </div><!-- end card header -->

                            <div class="card-body">
                                <p class="text-muted">Use <code>nested-sortable</code> class to list-group class to set a nested list with sortable items where icons are given within list-group-item.</p>

                                <div class="list-group border-dashed">
                                    <!-- Category: Planning -->
                                    <div class="list-group-item">
                                        <div class="d-flex align-items-center gap-2 mb-2">
                                            <div class="avatar-xs flex-shrink-0">
                                                <span class="avatar-title text-bg-light rounded-circle">
                                                    <i class="ti ti-calendar-event fs-sm text-primary"></i>
                                                </span>
                                            </div>
                                            <div>
                                                <h5 class="mb-0">Planning</h5>
                                            </div>
                                        </div>

                                        <div class="list-group nested-sortable border-0">
                                            <div class="list-group-item"><i class="ti ti-notebook fs-sm me-2 text-muted"></i>Venue Selection</div>
                                            <div class="list-group-item"><i class="ti ti-users fs-sm me-2 text-muted"></i>Speaker Invitations</div>
                                            <div class="list-group-item"><i class="ti ti-list-details fs-sm me-2 text-muted"></i>Agenda Setup</div>
                                        </div>
                                    </div>

                                    <!-- Category: Promotion -->
                                    <div class="list-group-item">
                                        <div class="d-flex align-items-center gap-2 mb-2">
                                            <div class="avatar-xs flex-shrink-0">
                                                <span class="avatar-title text-bg-light rounded-circle">
                                                    <i class="ti ti-speakerphone fs-sm text-primary"></i>
                                                </span>
                                            </div>
                                            <div>
                                                <h5 class="mb-0">Promotion</h5>
                                            </div>
                                        </div>

                                        <div class="list-group nested-sortable border-0">
                                            <div class="list-group-item"><i class="ti ti-mail fs-sm me-2 text-muted"></i>Email Campaigns</div>
                                            <div class="list-group-item"><i class="ti ti-brand-facebook fs-sm me-2 text-muted"></i>Social Media</div>
                                            <div class="list-group-item"><i class="ti ti-world fs-sm me-2 text-muted"></i>Website Updates</div>
                                        </div>
                                    </div>

                                    <!-- Category: Execution -->
                                    <div class="list-group-item">
                                        <div class="d-flex align-items-center gap-2 mb-2">
                                            <div class="avatar-xs flex-shrink-0">
                                                <span class="avatar-title text-bg-light rounded-circle">
                                                    <i class="ti ti-playstation-circle fs-sm text-primary"></i>
                                                </span>
                                            </div>
                                            <div>
                                                <h5 class="mb-0">Execution</h5>
                                            </div>
                                        </div>

                                        <div class="list-group nested-sortable border-0">
                                            <div class="list-group-item"><i class="ti ti-clock fs-sm me-2 text-muted"></i>Session Management</div>
                                            <div class="list-group-item"><i class="ti ti-microphone fs-sm me-2 text-muted"></i>Speaker Support</div>
                                            <div class="list-group-item"><i class="ti ti-user-check fs-sm me-2 text-muted"></i>Attendee Check-In</div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end card-body -->

                        </div><!-- end card -->
                    </div>
                    <!-- end col -->

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Nested Sortable List with Icons</h4>
                            </div><!-- end card header -->

                            <div class="card-body">
                                <p class="text-muted">Use <code>nested-sortable</code> class to list-group class to set a nested list with sortable items where icons are given within list-group-item.</p>

                                <div class="list-group border-dashed">
                                    <!-- Category: Planning -->
                                    <div class="list-group-item">
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <div class="d-flex align-items-center gap-2">
                                                <i class="ti ti-calendar-time text-primary fs-4"></i>
                                                <h5 class="mb-0 fw-semibold">Planning</h5>
                                            </div>
                                            <span class="badge bg-primary-subtle text-primary">Stage 1</span>
                                        </div>

                                        <div class="list-group nested-sortable border-0">
                                            <div class="list-group-item"><i class="ti ti-target fs-sm me-2 text-muted"></i>Define Requirements</div>
                                            <div class="list-group-item"><i class="ti ti-file-description fs-sm me-2 text-muted"></i>Technical Spec Draft</div>
                                            <div class="list-group-item"><i class="ti ti-calendar fs-sm me-2 text-muted"></i>Roadmap Planning</div>
                                        </div>
                                    </div>

                                    <!-- Category: Development -->
                                    <div class="list-group-item">
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <div class="d-flex align-items-center gap-2">
                                                <i class="ti ti-code text-success fs-4"></i>
                                                <h5 class="mb-0 fw-semibold">Execution</h5>
                                            </div>
                                            <span class="badge bg-success-subtle text-success">Stage 2</span>
                                        </div>

                                        <div class="list-group nested-sortable border-0">
                                            <div class="list-group-item"><i class="ti ti-terminal fs-sm me-2 text-muted"></i>Frontend Implementation</div>
                                            <div class="list-group-item"><i class="ti ti-database fs-sm me-2 text-muted"></i>Backend Services</div>
                                            <div class="list-group-item"><i class="ti ti-api fs-sm me-2 text-muted"></i>API Integration</div>
                                        </div>
                                    </div>

                                    <!-- Category: Release -->
                                    <div class="list-group-item">
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <div class="d-flex align-items-center gap-2">
                                                <i class="ti ti-rocket text-danger fs-4"></i>
                                                <h5 class="mb-0 fw-semibold">Review & Launch</h5>
                                            </div>
                                            <span class="badge bg-danger-subtle text-danger">Stage 3</span>
                                        </div>

                                        <div class="list-group nested-sortable border-0">
                                            <div class="list-group-item"><i class="ti ti-bug fs-sm me-2 text-muted"></i>QA & Bug Fixes</div>
                                            <div class="list-group-item"><i class="ti ti-cloud-upload fs-sm me-2 text-muted"></i>Deploy to Production</div>
                                            <div class="list-group-item"><i class="ti ti-chart-bar fs-sm me-2 text-muted"></i>Post-Release Metrics</div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end card-body -->



                        </div><!-- end card -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->

            </div>

            <?php include('partials/footer.php'); ?>

        </div>

        <!-- ============================================================== -->
        <!-- End of Main Content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <?php include('partials/customizer.php'); ?>

    <?php include('partials/footer-scripts.php'); ?>

    <!-- sortablejs -->
    <script src="assets/plugins/sortablejs/Sortable.min.js"></script>

    <!-- sortable list init js -->
    <script src="assets/js/pages/misc-sortable.js"></script>


</body>

</html>