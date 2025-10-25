<?php include('partials/html.php'); ?>

<head>
    <?php $title = "Tickets Details"; include('partials/title-meta.php'); ?>

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

                <?php $subtitle = "Support"; $title = "Tickets Details"; include('partials/page-title.php'); ?>

                <div class="row">
                    <div class="col-xxl-8">
                        <div class="card">
                            <div class="card-header justify-content-between">
                                <h5 class="mb-0">#SUP-2523 - <span class="text-muted">App freezes when uploading files</span></h5>
                                <span class="badge badge-label text-bg-warning">Pending</span>
                            </div>

                            <div class="card-body">
                                <!-- Ticket Info -->
                                <div class="row mb-4">
                                    <div class="col-md-4">
                                        <h6 class="text-uppercase text-muted">Requested By</h6>
                                        <div class="d-flex align-items-center gap-2">
                                            <img src="assets/images/users/user-5.jpg" alt="Ava Sullivan" class="rounded-circle avatar-sm">
                                            <span>Ava Sullivan</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <h6 class="text-uppercase text-muted">Assigned Agent</h6>
                                        <div class="d-flex align-items-center gap-2">
                                            <img src="assets/images/users/user-4.jpg" alt="Liam Brooks" class="rounded-circle avatar-sm">
                                            <span>Liam Brooks</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Priority & Dates -->
                                <div class="row mb-4">
                                    <div class="col-md-4">
                                        <h6 class="text-uppercase text-muted">Priority</h6>
                                        <span class="badge bg-danger">High</span>
                                    </div>
                                    <div class="col-md-4">
                                        <h6 class="text-uppercase text-muted">Created On</h6>
                                        <p class="mb-0">05 Aug, 2025 <small class="text-muted">1:20 PM</small></p>
                                    </div>
                                    <div class="col-md-4">
                                        <h6 class="text-uppercase text-muted">Due Date</h6>
                                        <p class="mb-0">09 Aug, 2025</p>
                                    </div>
                                </div>

                                <!-- Description -->
                                <div class="mb-4">
                                    <h6 class="text-uppercase text-muted">Description</h6>
                                    <p class="mb-0">
                                        When trying to upload files through the project form, the application becomes unresponsive after selecting a file larger than 5MB.
                                        This issue occurs consistently across browsers. Please investigate and apply a fix.
                                    </p>
                                </div>

                                <!-- Tags -->
                                <div class="mb-4">
                                    <h6 class="text-uppercase text-muted">Tags</h6>
                                    <span class="badge text-bg-light me-1">Upload</span>
                                    <span class="badge text-bg-light me-1">Performance</span>
                                    <span class="badge text-bg-light">UI Bug</span>
                                </div>

                                <!-- Comments / Activity -->
                                <div class="mb-4">
                                    <h6 class="text-uppercase text-muted mb-4">Activity:</h6>
                                    <div class="timeline">

                                        <!-- Event 1 -->
                                        <div class="timeline-item d-flex align-items-stretch">
                                            <div class="timeline-time pe-3 text-muted">Just Now</div>
                                            <div class="timeline-dot bg-success"></div>
                                            <div class="timeline-content ps-3 pb-4">
                                                <h6 class="mb-1 fs-sm">Ticket Resolved</h6>
                                                <p class="mb-1 text-muted">Agent closed the ticket after applying a patch for the file upload freeze issue.</p>
                                                <span class="text-primary fw-semibold">By Liam Brooks</span>
                                            </div>
                                        </div>

                                        <!-- Event 2 -->
                                        <div class="timeline-item d-flex align-items-stretch">
                                            <div class="timeline-time pe-3 text-muted">Today, 10:40 AM</div>
                                            <div class="timeline-dot bg-info"></div>
                                            <div class="timeline-content ps-3 pb-4">
                                                <h6 class="mb-1 fs-sm">Status Changed to "In Progress"</h6>
                                                <p class="mb-1 text-muted">Ticket was picked up by the assigned agent for investigation.</p>
                                                <span class="text-primary fw-semibold">By Liam Brooks</span>
                                            </div>
                                        </div>

                                        <!-- Event 3 -->
                                        <div class="timeline-item d-flex align-items-stretch">
                                            <div class="timeline-time pe-3 text-muted">Yesterday, 4:15 PM</div>
                                            <div class="timeline-dot bg-warning"></div>
                                            <div class="timeline-content ps-3 pb-4">
                                                <h6 class="mb-1 fs-sm">User Comment Added</h6>
                                                <p class="mb-1 text-muted">User emphasized urgency due to impact on production file uploads.</p>
                                                <span class="text-primary fw-semibold">By Ava Sullivan</span>
                                            </div>
                                        </div>

                                        <!-- Event 4 -->
                                        <div class="timeline-item d-flex align-items-stretch">
                                            <div class="timeline-time pe-3 text-muted">02 Aug, 2025 - 3:00 PM</div>
                                            <div class="timeline-dot bg-danger"></div>
                                            <div class="timeline-content ps-3 pb-4">
                                                <h6 class="mb-1 fs-sm">Ticket Created</h6>
                                                <p class="mb-1 text-muted">Ticket submitted regarding the app freezing on file upload.</p>
                                                <span class="text-primary fw-semibold">By Ava Sullivan</span>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <!-- Actions -->
                                <div class="d-flex gap-2 justify-content-center">
                                    <a href="ticket-create.php" class="btn btn-primary"><i class="ti ti-pencil me-1"></i>Edit Ticket</a>
                                    <a href="#" class="btn btn-danger"><i class="ti ti-x me-1"></i>Close Ticket</a>
                                    <a href="tickets-list.php" class="btn btn-outline-secondary"><i class="ti ti-arrow-left me-1"></i>Back to List</a>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col-->

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
                </div>
                <!-- end row-->

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