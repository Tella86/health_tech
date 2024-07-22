<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin | Dashboard</title>
    <link
        href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic"
        rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
    <link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
    <link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
    <link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
    <link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
    <link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/plugins.css">
    <link rel="stylesheet" href="assets/css/display.css">
    <link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="icon" href="../../images/healttech.png" type="image/x-icon">
    <style>
    /* Add necessary styles here */
    #dashboard-content {
        padding: 20px;
    }
    </style>
</head>
<body>
    <div id="app">
        <?php include('include/sidebar.php'); ?>
        <div class="app-content">
            <?php include('include/header.php'); ?>
            <!-- end: TOP NAVBAR -->
            <div class="main-content">
                <div class="wrap-content container" id="container">
                    <!-- start: PAGE TITLE -->
                    <div id="dashboard-content">
                        <!-- Content will be loaded here -->
                    </div>
                    <section id="page-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h1 class="mainTitle">Admin | Dashboard</h1>
                            </div>
                            <ol class="breadcrumb">
                                <li><span>Admin</span></li>
                                <li class="active"><span>Dashboard</span></li>
                            </ol>
                        </div>
                    </section>
                    <!-- end: PAGE TITLE -->
                    <!-- start: BASIC EXAMPLE -->
                    <div class="container-fluid container-fullw bg-white">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="panel panel-white no-radius text-center">
                                    <div class="panel-body">
                                        <span class="fa-stack fa-2x">
                                            <i class="fa fa-square fa-stack-2x text-primary"></i>
                                            <i class="fa fa-smile-o fa-stack-1x fa-inverse"></i>
                                        </span>
                                        <h2 class="StepTitle">Manage Users</h2>
                                        <p class="links cl-effect-1">
                                            <a href="manage-users.php">
                                                <?php
                                                $result = mysqli_query($con, "SELECT * FROM users");
                                                $num_rows = mysqli_num_rows($result);
                                                ?>
                                                Total Users: <?php echo htmlentities($num_rows); ?>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="panel panel-white no-radius text-center">
                                    <div class="panel-body">
                                        <span class="fa-stack fa-2x">
                                            <i class="fa fa-square fa-stack-2x text-primary"></i>
                                            <i class="fa fa-users fa-stack-1x fa-inverse"></i>
                                        </span>
                                        <h2 class="StepTitle">Manage Doctors</h2>
                                        <p class="cl-effect-1">
                                            <a href="manage-doctors.php">
                                                <?php
                                                $result1 = mysqli_query($con, "SELECT * FROM doctors");
                                                $num_rows1 = mysqli_num_rows($result1);
                                                ?>
                                                Total Doctors: <?php echo htmlentities($num_rows1); ?>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="panel panel-white no-radius text-center">
                                    <div class="panel-body">
                                        <span class="fa-stack fa-2x">
                                            <i class="fa fa-square fa-stack-2x text-primary"></i>
                                            <i class="fa fa-terminal fa-stack-1x fa-inverse"></i>
                                        </span>
                                        <h2 class="StepTitle">Appointments</h2>
                                        <p class="links cl-effect-1">
                                            <a href="book-appointment.php">Book Appointment</a>
                                            <br />
                                            <a href="appointment-history.php">
                                                <?php
                                                $sql = mysqli_query($con, "SELECT * FROM appointment");
                                                $num_rows2 = mysqli_num_rows($sql);
                                                ?>
                                                Total Appointments: <?php echo htmlentities($num_rows2); ?>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="panel panel-white no-radius text-center">
                                    <div class="panel-body">
                                        <span class="fa-stack fa-2x">
                                            <i class="fa fa-square fa-stack-2x text-primary"></i>
                                            <i class="fa fa-smile-o fa-stack-1x fa-inverse"></i>
                                        </span>
                                        <h2 class="StepTitle">Manage Patients</h2>
                                        <p class="links cl-effect-1">
                                            <a href="manage-patient.php">
                                                <?php
                                                $result = mysqli_query($con, "SELECT * FROM tblpatient");
                                                $num_rows = mysqli_num_rows($result);
                                                ?>
                                                Total Patients: <?php echo htmlentities($num_rows); ?>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="panel panel-white no-radius text-center">
                                    <div class="panel-body">
                                        <span class="fa-stack fa-2x">
                                            <i class="ti-files fa-1x text-primary"></i>
                                            <i class="fa fa-terminal fa-stack-1x fa-inverse"></i>
                                        </span>
                                        <h2 class="StepTitle">New Queries</h2>
                                        <p class="links cl-effect-1">
                                            <a href="unread-queries.php">
                                                <?php
                                                $sql = mysqli_query($con, "SELECT * FROM tblcontactus WHERE IsRead IS NULL");
                                                $num_rows22 = mysqli_num_rows($sql);
                                                ?>
                                                Total New Queries: <?php echo htmlentities($num_rows22); ?>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="panel panel-white no-radius text-center">
                                    <div class="panel-body">
                                        <span class="fa-stack fa-2x">
                                            <!-- <i class="fas fa-envelope fa-1x" style="color: #007bff;"></i> -->
                                        </span>
                                        <div class="notification-icon">
                                            <i class="fas fa-envelope" style="color: #007bff;"></i>
                                            <div class="badge" id="notification-badge">0</div>
                                        </div>

                                        <!-- Notification List -->
                                        <div class="notification-list" id="notification-list">
                                            <ul id="notification-items"></ul>
                                        </div>

                                        <h2 class="StepTitle">Messages</h2>

                                    </div>
                                </div>
                                <!-- end: BASIC EXAMPLE -->
                            </div>
                        </div>
                    </div>
                    <!-- start: FOOTER -->
                    <?php include('include/footer.php'); ?>
                    <!-- end: FOOTER -->
                    <!-- start: SETTINGS -->
                    <?php include('include/setting.php'); ?>
                    <!-- end: SETTINGS -->
                </div>
                <!-- start: MAIN JAVASCRIPTS -->
                <script src="vendor/jquery/jquery.min.js"></script>
                <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
                <script src="vendor/modernizr/modernizr.js"></script>
                <script src="vendor/jquery-cookie/jquery.cookie.js"></script>
                <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
                <script src="vendor/switchery/switchery.min.js"></script>
                <!-- end: MAIN JAVASCRIPTS -->
                <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
                <script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
                <script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
                <script src="vendor/autosize/autosize.min.js"></script>
                <script src="vendor/selectFx/classie.js"></script>
                <script src="vendor/selectFx/selectFx.js"></script>
                <script src="vendor/select2/select2.min.js"></script>
                <script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
                <script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
                <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
                <!-- start: CLIP-TWO JAVASCRIPTS -->
                <script src="assets/js/main.js"></script>
                <script src="assets/js/form-elements.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
                <link rel="stylesheet"
                    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                $(document).ready(function() {
                    $('#create-zoom-link').click(function(event) {
                        event.preventDefault(); // Prevent the default link action
                        $('#dashboard-content').load('../../hms/zoom.html');
                    });

                    Main.init();
                    FormElements.init();

                    // Calendar
                    $('#calendar').fullCalendar({
                        height: 'auto',
                        contentHeight: 300,
                        events: 'include/fetch-meetings.php',
                        eventRender: function(event, element) {
                            element.find('.fc-title').append("<br/><a href='" + event.link +
                                "' target='_blank'>Join Meeting</a>");
                            element.on('click', function() {
                                window.open(event.link, '_blank');
                            });
                        }
                    });
                });

                $(document).ready(function() {
                    // Fetch notifications
                    function fetchNotifications() {
                        $.get('fetch_notifications.php', function(data) {
                            let notifications = JSON.parse(data);
                            if (notifications.length > 0) {
                                $('#notification-badge').text(notifications.length).show();
                                $('#notification-items').empty();
                                notifications.forEach(function(notification) {
                                    $('#notification-items').append(`
                                <li>
                                    <a href="view_message.php?id=${notification.id}">
                                        ${notification.notification}
                                    </a>
                                </li>
                            `);
                                });
                            } else {
                                $('#notification-badge').hide();
                                $('#notification-items').empty();
                            }
                        });
                    }

                    // Check for new notifications every 5 seconds
                    setInterval(fetchNotifications, 5000);

                    // Initial fetch
                    fetchNotifications();

                    // Toggle notification list visibility
                    $('.notification-icon').click(function() {
                        $('#notification-list').toggle();
                    });

                    // Hide notification list when clicking outside
                    $(document).click(function(event) {
                        if (!$(event.target).closest('.notification-icon, #notification-list')
                            .length) {
                            $('#notification-list').hide();
                        }
                    });
                });
                </script>
                <!-- end: JavaScript Event Handlers for this page -->
                <!-- end: CLIP-TWO JAVASCRIPTS -->
</body>

</html>

</body>

</html>