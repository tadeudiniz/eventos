<?php include('partials/html.php'); ?>

<head>
    <?php $title = "Chat"; include('partials/title-meta.php'); ?>

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

                <?php $subtitle = "Apps"; $title = "Chat"; include('partials/page-title.php'); ?>

                <div class="outlook-box gap-1">
                    <div class="offcanvas-lg offcanvas-start outlook-left-menu outlook-left-menu-lg" tabindex="-1" id="chatSidebaroffcanvas">
                        <div class="card h-100 mb-0">

                            <div class="card-header p-3 d-block">
                                <div class="d-flex gap-2">
                                    <div class="app-search flex-grow-1">
                                        <input data-chat-search type="text" class="form-control bg-light-subtle border-light" placeholder="Search here...">
                                        <i data-lucide="search" class="app-search-icon text-muted"></i>
                                    </div>
                                    <a href="#!" class="btn btn-dark btn-icon" data-bs-toggle="modal" data-bs-target="#createSingleChatModal"><i class="ti ti-pencil-plus fs-xl"></i></a>
                                </div>
                            </div>
                            <div id="chat-sidebar" class="card-body p-2" style="height: calc(100% - 100px);" data-simplebar>
                                <div class="list-group list-group-flush chat-list">

                                    <a href="#!" data-chat-id="chat1" class="list-group-item list-group-item-action d-flex gap-2 justify-content-between active">
                                        <span class="d-flex justify-content-start align-items-center gap-2 overflow-hidden">
                                            <span class="avatar avatar-sm flex-shrink-0">
                                                <img src="assets/images/users/user-4.jpg" alt="avatar-4" class="img-fluid rounded-circle">
                                            </span>
                                            <span class="overflow-hidden">
                                                <span data-chat-search-field class="text-nowrap fw-semibold fs-base mb-0 lh-base">Ava Thompson</span>
                                                <span class="text-muted d-block fs-xs mb-0 text-truncate">I'll send the invoice by evening. Please check and confirm.</span>
                                            </span>
                                        </span>
                                        <span class="d-flex flex-column gap-1 justify-content-center flex-shrink-0 align-items-end">
                                            <span class="text-muted fs-xs">Just Now</span>
                                            <span class="badge text-bg-primary fs-xxs">2</span>
                                        </span>
                                    </a>

                                    <a href="#!" data-chat-id="chat2" class="list-group-item list-group-item-action d-flex gap-2 justify-content-between active">
                                        <span class="d-flex justify-content-start align-items-center gap-2 overflow-hidden">
                                            <span class="avatar avatar-sm flex-shrink-0">
                                                <img src="assets/images/users/user-5.jpg" alt="avatar-5" class="img-fluid rounded-circle">
                                            </span>
                                            <span class="overflow-hidden">
                                                <span data-chat-search-field class="text-nowrap fw-semibold fs-base mb-0 lh-base">Noah Smith</span>
                                                <span class="text-muted d-block fs-xs mb-0 text-truncate">Can you check the shared doc? Added some feedback.</span>
                                            </span>
                                        </span>
                                        <span class="d-flex flex-column gap-1 justify-content-center flex-shrink-0 align-items-end">
                                            <span class="text-muted fs-xs">5 Min</span>
                                            <span class="badge text-bg-primary fs-xxs">1</span>
                                        </span>
                                    </a>

                                    <a href="#!" data-chat-id="chat3" class="list-group-item list-group-item-action d-flex gap-2 justify-content-between">
                                        <span class="d-flex justify-content-start align-items-center gap-2 overflow-hidden">
                                            <span class="avatar avatar-sm flex-shrink-0">
                                                <img src="assets/images/users/user-7.jpg" alt="avatar-7" class="img-fluid rounded-circle">
                                            </span>
                                            <span class="overflow-hidden">
                                                <span data-chat-search-field class="text-nowrap fw-semibold fs-base mb-0 lh-base">Liam Johnson</span>
                                                <span class="text-muted d-block fs-xs mb-0 text-truncate">Please approve the design so we can move to development.</span>
                                            </span>
                                        </span>
                                        <span class="d-flex flex-column gap-1 justify-content-center flex-shrink-0 align-items-end">
                                            <span class="text-muted fs-xs">3:45 PM</span>
                                        </span>
                                    </a>

                                    <a href="#!" data-chat-id="chat4" class="list-group-item list-group-item-action d-flex gap-2 justify-content-between">
                                        <span class="d-flex justify-content-start align-items-center gap-2 overflow-hidden">
                                            <span class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title text-bg-primary fw-bold rounded-circle">
                                                    EW
                                                </span>
                                            </span>
                                            <span class="overflow-hidden">
                                                <span data-chat-search-field class="text-nowrap fw-semibold fs-base mb-0 lh-base">Emma Wilson</span>
                                                <span class="text-muted d-block fs-xs mb-0 text-truncate">All tasks are completed. Do you want me to deploy?</span>
                                            </span>
                                        </span>
                                        <span class="d-flex flex-column gap-1 justify-content-center flex-shrink-0 align-items-end">
                                            <span class="text-muted fs-xs">2 hr</span>
                                        </span>
                                    </a>

                                    <a href="#!" data-chat-id="chat5" class="list-group-item list-group-item-action d-flex gap-2 justify-content-between">
                                        <span class="d-flex justify-content-start align-items-center gap-2 overflow-hidden">
                                            <span class="avatar avatar-sm flex-shrink-0">
                                                <img src="assets/images/users/user-8.jpg" alt="avatar-8" class="img-fluid rounded-circle">
                                            </span>
                                            <span class="overflow-hidden">
                                                <span data-chat-search-field class="text-nowrap fw-semibold fs-base mb-0 lh-base">Olivia Martinez</span>
                                                <span class="text-muted fs-xs d-block mb-0 text-truncate">Meeting rescheduled to Friday at 11 AM.</span>
                                            </span>
                                        </span>
                                        <span class="d-flex flex-column gap-1 justify-content-center flex-shrink-0 align-items-end">
                                            <span class="text-muted fs-xs">4 hr</span>
                                        </span>
                                    </a>

                                    <a href="#!" data-chat-id="chat6" class="list-group-item list-group-item-action d-flex gap-2 justify-content-between">
                                        <span class="d-flex justify-content-start align-items-center gap-2 overflow-hidden">
                                            <span class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title text-bg-warning fw-bold rounded-circle">
                                                    WD
                                                </span>
                                            </span>
                                            <span class="overflow-hidden">
                                                <span data-chat-search-field class="text-nowrap fw-semibold fs-base mb-0 lh-base">William Davis</span>
                                                <span class="text-muted d-block fs-xs mb-0 text-truncate">I'm working on the bug fix, will update soon.</span>
                                            </span>
                                        </span>
                                        <span class="d-flex flex-column gap-1 justify-content-center flex-shrink-0 align-items-end">
                                            <span class="text-muted fs-xs">Yesterday</span>
                                            <span class="badge text-bg-primary fs-xxs">3</span>
                                        </span>
                                    </a>

                                    <a href="#!" data-chat-id="chat7" class="list-group-item list-group-item-action d-flex gap-2 justify-content-between">
                                        <span class="d-flex justify-content-start align-items-center gap-2 overflow-hidden">
                                            <span class="avatar avatar-sm flex-shrink-0">
                                                <img src="assets/images/users/user-10.jpg" alt="avatar-10" class="img-fluid rounded-circle">
                                            </span>
                                            <span class="overflow-hidden">
                                                <span data-chat-search-field class="text-nowrap fw-semibold fs-base mb-0 lh-base">Sophia Moore</span>
                                                <span class="text-muted d-block fs-xs mb-0 text-truncate">Final draft is ready. Let me know your thoughts.</span>
                                            </span>
                                        </span>
                                        <span class="d-flex flex-column gap-1 justify-content-center flex-shrink-0 align-items-end">
                                            <span class="text-muted fs-xs">Yesterday</span>
                                        </span>
                                    </a>

                                    <a href="#!" data-chat-id="chat8" class="list-group-item list-group-item-action d-flex gap-2 justify-content-between">
                                        <span class="d-flex justify-content-start align-items-center gap-2 overflow-hidden">
                                            <span class="avatar avatar-sm flex-shrink-0">
                                                <img src="assets/images/users/user-2.jpg" alt="avatar-11" class="img-fluid rounded-circle">
                                            </span>
                                            <span class="overflow-hidden">
                                                <span data-chat-search-field class="text-nowrap fw-semibold fs-base mb-0 lh-base">Jackson Lee</span>
                                                <span class="text-muted d-block fs-xs mb-0 text-truncate">I've uploaded the assets. Please review them tonight.</span>
                                            </span>
                                        </span>
                                        <span class="d-flex flex-column gap-1 justify-content-center flex-shrink-0 align-items-end">
                                            <span class="text-muted fs-xs">12 Jun</span>
                                        </span>
                                    </a>

                                    <a href="#!" data-chat-id="chat9" class="list-group-item list-group-item-action d-flex gap-2 justify-content-between">
                                        <span class="d-flex justify-content-start align-items-center gap-2 overflow-hidden">
                                            <span class="avatar avatar-sm flex-shrink-0">
                                                <img src="assets/images/users/user-3.jpg" alt="avatar-12" class="img-fluid rounded-circle">
                                            </span>
                                            <span class="overflow-hidden">
                                                <span data-chat-search-field class="text-nowrap fw-semibold fs-base mb-0 lh-base">Chloe Anderson</span>
                                                <span class="text-muted d-block fs-xs mb-0 text-truncate">Need your approval before pushing this live.</span>
                                            </span>
                                        </span>
                                        <span class="d-flex flex-column gap-1 justify-content-center flex-shrink-0 align-items-end">
                                            <span class="text-muted fs-xs">10 Jun</span>
                                        </span>
                                    </a>

                                    <a href="#!" data-chat-id="chat10" class="list-group-item list-group-item-action d-flex gap-2 justify-content-between">
                                        <span class="d-flex justify-content-start align-items-center gap-2 overflow-hidden">
                                            <span class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title text-bg-info fw-bold rounded-circle">
                                                    LW
                                                </span>
                                            </span>
                                            <span class="overflow-hidden">
                                                <span data-chat-search-field class="text-nowrap fw-semibold fs-base mb-0 lh-base">Lucas Wright</span>
                                                <span class="text-muted d-block fs-xs mb-0 text-truncate">Client call moved to tomorrow. Will share notes later.</span>
                                            </span>
                                        </span>
                                        <span class="d-flex flex-column gap-1 justify-content-center flex-shrink-0 align-items-end">
                                            <span class="text-muted fs-xs">9 May</span>
                                        </span>
                                    </a>

                                    <a href="#!" data-chat-id="chat11" class="list-group-item list-group-item-action d-flex gap-2 justify-content-between">
                                        <span class="d-flex justify-content-start align-items-center gap-2 overflow-hidden">
                                            <span class="avatar avatar-sm flex-shrink-0">
                                                <img src="assets/images/users/user-6.jpg" alt="avatar-14" class="img-fluid rounded-circle">
                                            </span>
                                            <span class="overflow-hidden">
                                                <span data-chat-search-field class="text-nowrap fw-semibold fs-base mb-0 lh-base">Mia Scott</span>
                                                <span class="text-muted d-block fs-xs mb-0 text-truncate">Everything looks good. Waiting for your go-ahead.</span>
                                            </span>
                                        </span>
                                        <span class="d-flex flex-column gap-1 justify-content-center flex-shrink-0 align-items-end">
                                            <span class="text-muted fs-xs">13 Apr</span>
                                        </span>
                                    </a>

                                    <a href="#!" data-chat-id="chat12" class="list-group-item list-group-item-action d-flex gap-2 justify-content-between">
                                        <span class="d-flex justify-content-start align-items-center gap-2 overflow-hidden">
                                            <span class="avatar avatar-sm flex-shrink-0">
                                                <img src="assets/images/users/user-9.jpg" alt="avatar-15" class="img-fluid rounded-circle">
                                            </span>
                                            <span class="overflow-hidden">
                                                <span data-chat-search-field class="text-nowrap fw-semibold fs-base mb-0 lh-base">Benjamin Clark</span>
                                                <span class="text-muted d-block fs-xs mb-0 text-truncate">Checked your updates. Left a few suggestions.</span>
                                            </span>
                                        </span>
                                        <span class="d-flex flex-column gap-1 justify-content-center flex-shrink-0 align-items-end">
                                            <span class="text-muted fs-xs">10 Mar</span>
                                            <span class="badge text-bg-primary fs-xxs">2</span>
                                        </span>
                                    </a>

                                </div>

                            </div> <!-- end card-body-->

                        </div> <!-- end card-->
                    </div>

                    <div class="card h-100 mb-0 flex-grow-1">
                        <div class="card-header">
                            <div class="d-lg-none d-inline-flex gap-2">
                                <button class="btn btn-default btn-icon" type="button" data-bs-toggle="offcanvas" data-bs-target="#chatSidebaroffcanvas" aria-controls="chatSidebaroffcanvas">
                                    <i class="ti ti-menu-2 fs-lg"></i>
                                </button>
                            </div>

                            <div class="flex-grow-1">
                                <h5 class="mb-1 lh-base fs-lg">
                                    <a data-chat-username href="#!" class="link-reset">Noah Smith</a>
                                </h5>
                                <p class="mb-0 lh-sm text-muted" style="padding-top: 1px;">
                                    <small class="ti ti-circle-filled text-success me-1"></small> Active
                                </p>
                            </div>

                            <div class="d-flex align-items-center gap-1">
                                <!-- Video Call -->
                                <button type="button" class="btn btn-default btn-icon" data-bs-toggle="modal" data-bs-target="#videoCallModal" data-bs-toggle="tooltip" title="Video Call">
                                    <i class="ti ti-video fs-lg"></i>
                                </button>

                                <!-- Audio Call -->
                                <button type="button" class="btn btn-default btn-icon" data-bs-toggle="modal" data-bs-target="#audioCallModal" data-bs-toggle="tooltip" title="Audio Call">
                                    <i class="ti ti-phone fs-lg"></i>
                                </button>

                                <!-- More Options -->
                                <div class="dropdown">
                                    <button type="button" class="btn btn-default btn-icon" data-bs-toggle="dropdown" aria-expanded="false" title="More">
                                        <i class="ti ti-dots-vertical fs-lg"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="#"><i class="ti ti-user me-2"></i> View
                                                Profile</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="ti ti-bell-off me-2"></i> Mute
                                                Notifications</a></li>
                                        <li><a class="dropdown-item" href="#"><i class="ti ti-trash me-2"></i> Delete
                                                Chat</a></li>
                                    </ul>
                                </div>
                            </div>

                        </div>


                        <div id="chat-container" data-chat class="card-body pt-0 mb-5 pb-2" data-simplebar style="max-height: calc(100vh - 370px);">

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

                            <!-- Message 8 -->
                            <div class="d-flex align-items-start gap-2 my-3 text-end chat-item justify-content-end">
                                <div>
                                    <div class="chat-message py-2 px-3 bg-info-subtle rounded">
                                        Great, I’ll review them once they arrive.
                                    </div>
                                    <div class="text-muted fs-xs mt-1"><i class="ti ti-clock"></i> 09:52 am</div>
                                </div>
                                <img src="assets/images/users/user-2.jpg" class="avatar-md rounded-circle" alt="User">
                            </div>

                            <!-- Message 9 -->
                            <div class="d-flex align-items-start gap-2 my-3 chat-item">
                                <img src="assets/images/users/user-5.jpg" class="avatar-md rounded-circle" alt="User">
                                <div>
                                    <div class="chat-message py-2 px-3 bg-warning-subtle rounded">
                                        Just sent them via Drive. Let me know if you have issues accessing.
                                    </div>
                                    <div class="text-muted fs-xs mt-1"><i class="ti ti-clock"></i> 12:03 pm</div>
                                </div>
                            </div>

                            <!-- Message 10 -->
                            <div class="d-flex align-items-start gap-2 my-3 text-end chat-item justify-content-end">
                                <div>
                                    <div class="chat-message py-2 px-3 bg-info-subtle rounded">
                                        Got them. Everything looks good so far!
                                    </div>
                                    <div class="text-muted fs-xs mt-1"><i class="ti ti-clock"></i> 12:10 pm</div>
                                </div>
                                <img src="assets/images/users/user-2.jpg" class="avatar-md rounded-circle" alt="User">
                            </div>

                            <!-- Message 11 -->
                            <div class="d-flex align-items-start gap-2 my-3 chat-item">
                                <img src="assets/images/users/user-5.jpg" class="avatar-md rounded-circle" alt="User">
                                <div>
                                    <div class="chat-message py-2 px-3 bg-warning-subtle rounded">
                                        Awesome 😊 Looking forward to your feedback!
                                    </div>
                                    <div class="text-muted fs-xs mt-1"><i class="ti ti-clock"></i> 12:12 pm</div>
                                </div>
                            </div>

                            <!-- Message 12 -->
                            <div class="d-flex align-items-start gap-2 my-3 text-end chat-item justify-content-end">
                                <div>
                                    <div class="chat-message py-2 px-3 bg-info-subtle rounded">
                                        Will get back to you after lunch 🍴
                                    </div>
                                    <div class="text-muted fs-xs mt-1"><i class="ti ti-clock"></i> 12:13 pm</div>
                                </div>
                                <img src="assets/images/users/user-2.jpg" class="avatar-md rounded-circle" alt="User">
                            </div>

                            <!-- Message 13 -->
                            <div class="d-flex align-items-start gap-2 my-3 chat-item">
                                <img src="assets/images/users/user-5.jpg" class="avatar-md rounded-circle" alt="User">
                                <div>
                                    <div class="chat-message py-2 px-3 bg-warning-subtle rounded">
                                        No rush, enjoy your lunch! 😄
                                    </div>
                                    <div class="text-muted fs-xs mt-1"><i class="ti ti-clock"></i> 12:14 pm</div>
                                </div>
                            </div>

                            <!-- Message 14 -->
                            <div class="d-flex align-items-start gap-2 my-3 text-end chat-item justify-content-end">
                                <div>
                                    <div class="chat-message py-2 px-3 bg-info-subtle rounded">
                                        Thanks! Talk soon.
                                    </div>
                                    <div class="text-muted fs-xs mt-1"><i class="ti ti-clock"></i> 12:15 pm</div>
                                </div>
                                <img src="assets/images/users/user-2.jpg" class="avatar-md rounded-circle" alt="User">
                            </div>

                        </div> <!-- end card-body -->

                        <div class="card-footer bg-body-secondary border-top border-dashed border-bottom-0 position-absolute bottom-0 w-100">
                            <div class="d-flex gap-2">
                                <div class="app-search flex-grow-1">
                                    <input data-chat-input type="text" class="form-control py-2 bg-light-subtle border-light" placeholder="Enter message...">
                                    <i data-lucide="message-square" class="app-search-icon text-muted"></i>
                                </div>
                                <a data-send href="#!" class="btn btn-primary">Send <i class="ti ti-send-2 ms-1 fs-xl"></i></a>
                            </div>

                            <span data-error class="d-none text-danger mt-2">Hi there!</span>
                        </div>

                    </div> <!-- end card-->
                </div> <!-- end row-->

                <!-- Create Single Chat Modal -->
                <div class="modal fade" id="createSingleChatModal" tabindex="-1" aria-labelledby="createSingleChatModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title" id="createSingleChatModalLabel">Start New Chat</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <form id="createSingleChatForm">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="recipientUser" class="form-label">Recipient</label>
                                        <input type="text" class="form-control" id="recipientUser" placeholder="Enter username or email" required>
                                    </div>

                                    <div class="mb-0">
                                        <label for="initialMessage" class="form-label">Message</label>
                                        <textarea class="form-control" id="initialMessage" rows="3" placeholder="Type your message here..." required></textarea>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Send Message</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

                <!-- Video Call Modal -->
                <div class="modal fade" id="videoCallModal" tabindex="-1" aria-labelledby="videoCallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-xl">
                        <div class="modal-content bg-dark text-white">

                            <div class="modal-header border-0">
                                <h5 class="modal-title" id="videoCallModalLabel">Starting Video Call</h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body d-flex flex-column align-items-center justify-content-center text-center py-5">

                                <!-- User Avatar -->
                                <div class="mb-4">
                                    <img src="assets/images/users/user-3.jpg" class="rounded-circle shadow" alt="User Photo" width="150" height="150">
                                </div>

                                <!-- User Info -->
                                <h3 class="fw-semibold mb-1">Alex Johnson</h3>
                                <p class="text-muted mb-4">Connecting to call...</p>

                                <!-- Call Controls -->
                                <div class="d-flex gap-2">
                                    <button type="button" class="btn btn-light d-flex align-items-center gap-2">
                                        <i class="ti ti-video"></i> Camera On
                                    </button>

                                    <button type="button" class="btn btn-light d-flex align-items-center gap-2">
                                        <i class="ti ti-microphone"></i> Mic On
                                    </button>

                                    <button type="button" class="btn btn-danger d-flex align-items-center gap-2" data-bs-dismiss="modal">
                                        <i class="ti ti-phone-ringing"></i> End Call
                                    </button>
                                </div>

                            </div>

                            <div class="modal-footer border-0 justify-content-center">
                                <span class="text-muted fst-italic">Make sure your devices are connected before starting the call</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Audio Call Modal -->
                <div class="modal fade" id="audioCallModal" tabindex="-1" aria-labelledby="audioCallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-md">
                        <div class="modal-content bg-dark text-white">

                            <div class="modal-header border-0">
                                <h5 class="modal-title" id="audioCallModalLabel">Starting Audio Call</h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body d-flex flex-column align-items-center justify-content-center text-center py-5">

                                <!-- User Avatar -->
                                <div class="mb-4">
                                    <img src="assets/images/users/user-3.jpg" class="rounded-circle shadow" alt="User Photo" width="120" height="120">
                                </div>

                                <!-- User Info -->
                                <h4 class="fw-semibold mb-1">Alex Johnson</h4>
                                <p class="text-muted mb-4">Calling...</p>

                                <!-- Call Controls -->
                                <div class="d-flex gap-2">
                                    <button type="button" class="btn btn-light d-flex align-items-center gap-2">
                                        <i class="ti ti-microphone"></i> Mic On
                                    </button>

                                    <button type="button" class="btn btn-light d-flex align-items-center gap-2">
                                        <i class="ti ti-headphones"></i> Speaker On
                                    </button>

                                    <button type="button" class="btn btn-danger d-flex align-items-center gap-2" data-bs-dismiss="modal">
                                        <i class="ti ti-phone-call"></i> End Call
                                    </button>
                                </div>

                            </div>

                            <div class="modal-footer border-0 justify-content-center">
                                <span class="text-muted fst-italic">Ensure your microphone is working properly</span>
                            </div>
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

    <script src="assets/js/pages/apps-chat.js"></script>

</body>

</html>