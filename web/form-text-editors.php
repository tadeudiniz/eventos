<?php include('partials/html.php'); ?>

<head>
    <?php $title = "Editors"; include('partials/title-meta.php'); ?>

    <!-- Quill Plugin CSS -->
    <link href="assets/plugins/quill/quill.core.css" rel="stylesheet" type="text/css">
    <link href="assets/plugins/quill/quill.snow.css" rel="stylesheet" type="text/css">
    <link href="assets/plugins/quill/quill.bubble.css" rel="stylesheet" type="text/css">

    <!-- Summernote Plugin CSS -->
    <link href="assets/plugins/summernote/summernote-bs5.min.css" rel="stylesheet">

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
                <?php $subtitle = "Forms"; $title = "Text Editors"; include('partials/page-title.php'); ?>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-block">
                                <h4 class="card-title mb-1">Quilljs</h4>
                                <p class="text-muted mb-0">
                                    Quill is a modern WYSIWYG editor built for compatibility and extensibility
                                </p>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title mb-1">Snow Editor</h5>
                                <p class="text-muted">Snow is a clean, flat toolbar theme.</p>


                                <div id="snow-editor" style="height: 300px;">
                                    <h3>A powerful and responsive admin dashboard template built on Bootstrap.</h3>
                                    <p><br></p>
                                    <ul>
                                        <li>
                                            Fully responsive layout with a sleek and modern design.
                                        </li>
                                        <li>
                                            Multiple pre-built pages such as login, registration, dashboard, charts, tables, and more.
                                        </li>
                                        <li>
                                            Includes various components like modals, alerts, navigation menus, etc.
                                        </li>
                                        <li>
                                            Easy to customize and extend to suit your project’s needs.
                                        </li>
                                        <li>
                                            Built with Bootstrap 5x, ensuring compatibility with a wide range of devices.
                                        </li>
                                    </ul>
                                    <p><br></p>
                                    <p>
                                        MyAdmin Admin is the perfect choice for your next admin project. Get started today and create a stunning interface for your application.
                                    </p>
                                </div>

                            </div>

                            <div class="border-top border-dashed"></div>

                            <div class="card-body">
                                <h5 class="card-title mb-2">Bubble Editor</h5>

                                <p class="text-muted">Bubble is a simple tooltip based theme.</p>

                                <div id="bubble-editor" style="height: 300px;">
                                    <h3>A powerful and responsive admin dashboard template built on Bootstrap.</h3>
                                    <p><br></p>
                                    <ul>
                                        <li>
                                            Fully responsive layout with a sleek and modern design.
                                        </li>
                                        <li>
                                            Multiple pre-built pages such as login, registration, dashboard, charts, tables, and more.
                                        </li>
                                        <li>
                                            Includes various components like modals, alerts, navigation menus, etc.
                                        </li>
                                        <li>
                                            Easy to customize and extend to suit your project’s needs.
                                        </li>
                                        <li>
                                            Built with Bootstrap 5x, ensuring compatibility with a wide range of devices.
                                        </li>
                                    </ul>
                                    <p><br></p>
                                    <p>
                                        MyAdmin Admin is the perfect choice for your next admin project. Get started today and create a stunning interface for your application.
                                    </p>
                                </div> <!-- end Snow-editor-->

                            </div>
                        </div> <!-- end card-->

                        <div class="card">
                            <div class="card-header d-block">
                                <h4 class="card-title mb-1">Summernote</h4>
                                <p class="text-muted">
                                    Summernote is a JavaScript library that helps you create WYSIWYG editors with a simple and easy-to-use interface. Summernote is licensed under MIT and maintained by the community.
                                </p>

                                <div class="alert alert-warning alert-dismissible fade show mb-0" role="alert">
                                    <strong>Note:</strong> This is a jQuery-based plugin, so you need to include jQuery for it to work.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="summernote">
                                    <h4>MyAdmin Admin - Modern Admin Dashboard</h4>
                                    MyAdmin Admin is a powerful and feature-rich Bootstrap-based admin template designed to help you build stunning and functional dashboards. It provides a clean, responsive, and easy-to-use interface for managing data and providing insights. With numerous components and options, it is perfect for building any type of web application.
                                    <strong>MyAdmin Admin</strong> includes everything you need to start building your next project, from user management to charts, tables, and much more. It’s optimized for performance and mobile responsiveness, ensuring a smooth experience on any device.
                                    <br>
                                    <br>
                                    <ul>
                                        <li>Fully responsive layout</li>
                                        <li>Customizable UI components</li>
                                        <li>Built on Bootstrap 4</li>
                                        <li>Multiple ready-to-use pages</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                    </div> <!-- end col -->
                </div>

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

    <!-- Jquery for summernote-->
    <script src="assets/plugins/jquery/jquery.min.js"></script>

    <!-- Summernote Plugin Js -->
    <script src="assets/plugins/summernote/summernote-bs5.min.js"></script>

    <!-- Summernote Demo Js -->
    <script src="assets/js/pages/form-summernote.js"></script>

    <!-- Quill Editor Js -->
    <script src="assets/plugins/quill/quill.js"></script>

    <!-- Quill Demo Js -->
    <script src="assets/js/pages/form-quilljs.js"></script>

</body>

</html>