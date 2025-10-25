<?php include('partials/html.php'); ?>

<head>
    <?php $title = "Alerts"; include('partials/title-meta.php'); ?>

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
                <?php $subtitle = "UI"; $title = "Alerts"; include('partials/page-title.php'); ?>

                <div class="row">
                    
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <div class="flex-grow-1">
                                    <h4 class="card-title mb-0">Default Alert</h4>
                                </div>
                                <div class="card-action">
                                    <a href="#!" class="card-action-item" data-action="card-toggle"><i class="ti ti-chevron-up"></i></a>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="alert alert-primary" role="alert">
                                    This is a primary alert—something important you should know!
                                </div>

                                <div class="alert alert-secondary" role="alert">
                                    This is a secondary alert—some additional context.
                                </div>

                                <div class="alert alert-success" role="alert">
                                    Success! Your operation was completed successfully.
                                </div>

                                <div class="alert alert-danger" role="alert">
                                    Error! Something went wrong—please try again.
                                </div>

                                <div class="alert alert-warning" role="alert">
                                    Warning! Please double-check your inputs.
                                </div>

                                <div class="alert alert-info" role="alert">
                                    Info: Here's something you might find useful.
                                </div>

                                <div class="alert alert-light" role="alert">
                                    Light alert—just a subtle notification.
                                </div>

                                <div class="alert alert-dark mb-0" role="alert">
                                    Dark alert—use for general-purpose messages.
                                </div>
                            </div> <!-- end card-body -->
                        </div> <!-- end card-->
                    </div> <!-- end col-->

                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <div class="flex-grow-1">
                                    <h4 class="card-title">Dismissing Alert with Solid Colors</h4>
                                </div>
                                <div class="card-action">
                                    <a href="#!" class="card-action-item" data-action="card-toggle"><i class="ti ti-chevron-up"></i></a>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="alert alert-primary text-bg-primary alert-dismissible" role="alert">
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                                    <div>Heads up! This is a primary alert with important information.</div>
                                </div>

                                <div class="alert alert-secondary text-bg-secondary alert-dismissible" role="alert">
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                                    <div>Notice: This is a secondary alert with supporting details.</div>
                                </div>

                                <div class="alert alert-success text-bg-success alert-dismissible" role="alert">
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                                    <div>Success! Your action was completed successfully.</div>
                                </div>

                                <div class="alert alert-danger text-bg-danger alert-dismissible" role="alert">
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                                    <div>Error! Something went wrong—please try again later.</div>
                                </div>

                                <div class="alert alert-warning text-bg-warning alert-dismissible" role="alert">
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                                    <div>Warning! Please review your input before proceeding.</div>
                                </div>

                                <div class="alert alert-info text-bg-info alert-dismissible" role="alert">
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                                    <div>Info: Here’s something you might find helpful.</div>
                                </div>

                                <div class="alert alert-light text-bg-light alert-dismissible" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    <div>Note: This is a light alert with a subtle message.</div>
                                </div>

                                <div class="alert alert-dark text-bg-dark alert-dismissible mb-0" role="alert">
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                                    <div>Notice: This dark alert is great for general messages.</div>
                                </div>
                            </div> <!-- end card-body -->
                        </div> <!-- end card-->
                    </div> <!-- end col-->

                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <div class="flex-grow-1">
                                    <h4 class="card-title">Link Color</h4>
                                </div>
                                <div class="card-action">
                                    <a href="#!" class="card-action-item" data-action="card-toggle"><i class="ti ti-chevron-up"></i></a>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="alert alert-primary" role="alert">
                                    Need more info? Check out <a href="#" class="alert-link">this primary link</a> for important details.
                                </div>

                                <div class="alert alert-secondary" role="alert">
                                    Here's a secondary message with <a href="#" class="alert-link">a helpful link</a> for additional context.
                                </div>

                                <div class="alert alert-success" role="alert">
                                    Operation successful! View the results <a href="#" class="alert-link">by clicking here</a>.
                                </div>

                                <div class="alert alert-danger" role="alert">
                                    Something went wrong. Learn more <a href="#" class="alert-link">through this alert link</a>.
                                </div>

                                <div class="alert alert-warning" role="alert">
                                    Heads up! You might want to check <a href="#" class="alert-link">this warning link</a>.
                                </div>

                                <div class="alert alert-info" role="alert">
                                    Here’s some information that may help—click <a href="#" class="alert-link">this link</a> to read more.
                                </div>

                                <div class="alert alert-light" role="alert">
                                    Just a light reminder with <a href="#" class="alert-link">a gentle link</a> to explore.
                                </div>

                                <div class="alert alert-dark mb-0" role="alert">
                                    This is a general dark alert. Find out more <a href="#" class="alert-link">by clicking here</a>.
                                </div>

                            </div> <!-- end card-body -->

                        </div> <!-- end card-->
                    </div> <!-- end col-->

                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <div class="flex-grow-1">
                                    <h4 class="card-title">Additional Content</h4>
                                </div>
                                <div class="card-action">
                                    <a href="#!" class="card-action-item" data-action="card-toggle"><i class="ti ti-chevron-up"></i></a>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="alert alert-success p-3" role="alert">
                                    <h4 class="alert-heading">Great job!</h4>
                                    <p>You’ve successfully read this important alert message. The text is intentionally a bit longer to demonstrate how spacing behaves in this kind of layout.</p>
                                    <hr class="border-success border-opacity-25">
                                    <p class="mb-0">Use margin utilities to keep your content clean and organized.</p>
                                </div>

                                <div class="alert alert-secondary p-3 d-flex" role="alert">
                                    <i class="ti ti-alarm-average fs-1 me-2"></i>
                                    <div>
                                        <h4 class="alert-heading">Heads up!</h4>
                                        <p>This alert message gives additional information with a longer message to show content spacing within an alert.</p>
                                        <hr class="border-secondary border-opacity-25">
                                        <p class="mb-0">Apply spacing classes wisely to maintain structure and clarity.</p>
                                    </div>
                                </div>

                                <div class="alert alert-danger d-flex p-3 mb-0" role="alert">
                                    <i class="ti ti-phone-ringing fs-1 me-2"></i>
                                    <div>
                                        <h4 class="alert-heading">Notice!</h4>
                                        <p>You’ve just read through a primary alert message. The extra length helps show how well the layout handles content spacing.</p>
                                        <button type="button" class="btn btn-danger btn-sm">Got it</button>
                                    </div>
                                </div>
                            </div> <!-- end card-body -->

                        </div> <!-- end card-->
                    </div> <!-- end col-->

                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <div class="flex-grow-1">
                                    <h4 class="card-title">Custom Alerts</h4>
                                </div>
                                <div class="card-action">
                                    <a href="#!" class="card-action-item" data-action="card-toggle"><i class="ti ti-chevron-up"></i></a>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="alert alert-primary alert-dismissible border border-primary" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    <div>A primary alert with a full border!</div>
                                </div>

                                <div class="alert alert-secondary alert-bordered alert-dismissible border-start border-secondary" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    <div>A secondary alert with a left border only!</div>
                                </div>

                                <div class="alert alert-dark alert-bordered alert-dismissible border-bottom border-dark" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    <div>A dark alert with a bottom border!</div>
                                </div>

                                <div class="alert alert-success alert-dismissible border-2 border border-dashed border-success" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    <div>A success alert with a dashed border!</div>
                                </div>

                                <div class="alert alert-danger alert-dismissible border-2  border-danger" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    <div>A danger alert with a thick border!</div>
                                </div>

                                <div class="alert alert-warning d-flex align-items-center" role="alert">
                                    <div>A warning alert with a custom close button!</div>
                                    <button type="button" class="ms-auto btn btn-sm btn-warning btn-icon rounded-circle" data-bs-dismiss="alert" aria-label="Close">
                                        <i class="ti ti-x fs-lg"></i>
                                    </button>
                                </div>

                                <div class="alert alert-info alert-dismissible d-flex align-items-center gap-2" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    <i class="ti ti-alert-octagon fs-xl"></i> An info alert with a custom icon!
                                </div>

                                <div class="alert alert-light border-2 d-flex align-items-center p-3 mb-0" role="alert">
                                    <i class="ti ti-phone-ringing text-success fs-2 me-3"></i>
                                    <div>
                                        <h4 class="alert-heading">Notice!</h4>
                                        <p class="m-0">You’ve just read through a primary alert message. The extra length helps show how well the layout handles content spacing.</p>
                                    </div>
                                </div>

                            </div> <!-- end card-body -->

                        </div> <!-- end card-->
                    </div> <!-- end col-->

                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <div class="flex-grow-1">
                                    <h4 class="card-title">Live Alert</h4>
                                </div>
                                <div class="card-action">
                                    <a href="#!" class="card-action-item" data-action="card-toggle"><i class="ti ti-chevron-up"></i></a>
                                    <a href="#!" class="card-action-item" data-action="code-collapse"><i class="ti ti-code"></i></a>

                                </div>
                            </div>

                            <div class="code-body">
                                <div class="highlight">
                                    <pre>
                                        <code class="language-markup">
                                            &lt;button type=&quot;button&quot; class=&quot;btn btn-primary&quot; id=&quot;liveAlertBtn&quot;&gt;Show live alert&lt;/button&gt;
                                        </code>
                                    </pre> <!-- end pre -->
                                </div> <!-- end highlight-->
                            </div> <!--end preview code-->

                            <div class="card-body">
                                <div id="liveAlertPlaceholder"></div>
                                <button type="button" class="btn btn-primary" id="liveAlertBtn">Show live alert</button>
                            </div> <!--end card body-->
                        </div>
                    </div>
                </div> <!-- end row-->

            </div> <!-- container -->

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
        const alertPlaceholder = document.getElementById('liveAlertPlaceholder')
        const appendAlert = (message, type) => {
            const wrapper = document.createElement('div')
            wrapper.innerHTML = [
                `<div class="alert alert-${type} alert-dismissible" role="alert">`,
                `   <div>${message}</div>`,
                '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
                '</div>'
            ].join('')

            alertPlaceholder.append(wrapper)
        }

        const alertTrigger = document.getElementById('liveAlertBtn')
        if (alertTrigger) {
            alertTrigger.addEventListener('click', () => {
                appendAlert('Nice, you triggered this alert message!', 'success')
            })
        }
    </script>

</body>

</html>