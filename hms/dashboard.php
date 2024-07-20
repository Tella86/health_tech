<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>User | Dashboard</title>

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
    <link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
    <style>
		:root {
            --orange-yellow-crayola: #fbb034; 
        }
        #calendar-popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 80%;
            max-width: 500px;
            background: ;
            padding: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            z-index: 1000;
        }

        #calendar {
            max-width: 100%;
            margin: 0 auto;
			color: white;
        }

        .fc-event {
            background-color: #007BFF;
            border: none;
            color: #fff;
            font-size: 0.9em;
        }

        #calendar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

        #close-calendar {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
            font-size: 18px;
            color: #333;
        }

        #calendar-popup h1 {
            font-size: 1.5em;
            margin-bottom: 15px;
			color: var(--orange-yellow-crayola);
        }
    </style>
</head>

<body>
    <div id="app">
        <?php include('include/sidebar.php');?>
        <div class="app-content">
            <?php include('include/header.php');?>
            <div class="main-content">
                <div class="wrap-content container" id="container">
                    <!-- start: PAGE TITLE -->
                    <section id="page-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h1 class="mainTitle">User | Dashboard</h1>
                            </div>
                            <ol class="breadcrumb">
                                <li><span>User</span></li>
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
                                        <span class="fa-stack fa-2x"> <i
                                                class="fa fa-square fa-stack-2x text-primary"></i> <i
                                                class="fa fa-smile-o fa-stack-1x fa-inverse"></i> </span>
                                        <h2 class="StepTitle">My Profile</h2>
                                        <p class="links cl-effect-1"><a href="edit-profile.php">Update Profile</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="panel panel-white no-radius text-center">
                                    <div class="panel-body">
                                        <span class="fa-stack fa-2x"> <i
                                                class="fa fa-square fa-stack-2x text-primary"></i> <i
                                                class="fa fa-paperclip fa-stack-1x fa-inverse"></i> </span>
                                        <h2 class="StepTitle">My Appointments</h2>
                                        <p class="cl-effect-1"><a href="appointment-history.php">View Appointment
                                                History</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="panel panel-white no-radius text-center">
                                    <div class="panel-body">
                                        <span class="fa-stack fa-2x"> <i
                                                class="fa fa-square fa-stack-2x text-primary"></i> <i
                                                class="fa fa-terminal fa-stack-1x fa-inverse"></i> </span>
                                        <h2 class="StepTitle">Book My Appointment</h2>
                                        <p class="links cl-effect-1"><a href="book-appointment.php">Book Appointment</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
       
        <!-- start: FOOTER -->
        <?php include('include/footer.php');?>
        <!-- end: FOOTER -->
        <!-- start: SETTINGS -->
        <?php include('include/setting.php');?>
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
    <!-- start: JavaScript Event Handlers for this page -->
    <script src="assets/js/form-elements.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
    <script>
    $(document).ready(function() {
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
        // Show calendar popup automatically on page load
        $(window).on('load', function() {
            $("#calendar-popup").fadeIn();
            $("#calendar-overlay").fadeIn();
        });
        // Close the calendar popup
        $("#close-calendar").click(function() {
            $("#calendar-popup").fadeOut();
            $("#calendar-overlay").fadeOut();
        });
    });
    </script>
    <!-- end: JavaScript Event Handlers for this page -->
    <!-- end: CLIP-TWO JAVASCRIPTS -->
</body>

</html>
