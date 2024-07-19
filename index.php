<!DOCTYPE HTML>
<html>
<head>
    <title>EZEMS | HTS</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href='http://fonts.googleapis.com/css?family=Ropa+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/responsiveslides.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="js/responsiveslides.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
    <script>
        $(function () {
            // Slideshow 1
            $("#slider1").responsiveSlides({
                maxwidth: 1600,
                speed: 600
            });

            // Calendar
            $('#calendar').fullCalendar({
                height: 'auto',
                events: 'hms/include/fetch-meetings.php',
                eventRender: function(event, element) {
                    element.find('.fc-title').append("<br/><a href='hms/user-login.php?link=" + event.link + "' target='_blank'>Join Meeting</a>");
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
    <style>
        #calendar-popup {
            display: none; /* Hidden by default */
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 90%;
            max-width: 600px;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            z-index: 1000;
        }

        #calendar {
            max-width: 100%;
            margin: 0 auto;
        }

        .fc-event {
            background-color: #007BFF;
            border: none;
            color: #fff;
        }

        #calendar-overlay {
            display: none; /* Hidden by default */
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
    </style>
</head>
<body>
    <!--start-wrap-->
    
    <!--start-header-->
    <div class="header">
        <div class="wrap">
            <!--start-logo-->
            <div class="logo">
                <a href="index.html" style="font-size: 30px;">Ezems Health Tech System</a>
            </div>
            <!--end-logo-->
            <!--start-top-nav-->
            <div class="top-nav">
                <ul>
                    <li class="active"><a href="index.html">Home</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div>
            <div class="clear"> </div>
            <!--end-top-nav-->
        </div>
    </div>
    <!--end-header-->

    <!-- Calendar Overlay -->
    <div id="calendar-overlay"></div>

    <!-- Meeting Calendar Popup -->
    <div id="calendar-popup">
        <div id="close-calendar">X</div>
        <h1>Meeting Calendar</h1>
        <div id="calendar"></div>
    </div>

    <div class="clear"> </div>

    <!--start-image-slider---->
    <div class="image-slider">
        <!-- Slideshow 1 -->
        <ul class="rslides" id="slider1">
            <li><img src="images/slider-image1.jpg" alt=""></li>
            <li><img src="images/slider-image2.jpg" alt=""></li>
            <li><img src="images/slider-image1.jpg" alt=""></li>
        </ul>
        <!-- Slideshow 2 -->
    </div>
    <!--End-image-slider---->
    <div class="clear"> </div>
    <div class="content-grids">
        <div class="wrap">
            <div class="section group">
                <div class="listview_1_of_3 images_1_of_3">
                    <div class="listimg listimg_1_of_2">
                        <img src="images/grid-img3.png">
                    </div>
                    <div class="text list_1_of_2">
                        <h3>Patients</h3>
                        <p>Register & Book Appointment</p>
                        <div class="button"><span><a href="hms/user-login.php">Click Here</a></span></div>
                    </div>
                </div>    

                <div class="listview_1_of_3 images_1_of_3">
                    <div class="listimg listimg_1_of_2">
                        <img src="images/grid-img1.png">
                    </div>
                    <div class="text list_1_of_2">
                        <h3>Doctors Login</h3>
                        <div class="button"><span><a href="hms/doctor/">Click Here</a></span></div>
                    </div>
                </div>

                <div class="listview_1_of_3 images_1_of_3">
                    <div class="listimg listimg_1_of_2">
                        <img src="images/grid-img2.png">
                    </div>
                    <div class="text list_1_of_2">
                        <h3>Admin Login</h3>
                        <div class="button"><span><a href="hms/admin">Click Here</a></span></div>
                    </div>
                </div>            
            </div>
        </div>
    </div>
    <div class="clear"> </div>
    <div class="wrap">
        <div class="content-box">
            <div class="section group">
                <div class="col_1_of_3 span_1_of_3 frist">
                </div>
                <div class="col_1_of_3 span_1_of_3 second">
                </div>
                <div class="col_1_of_3 span_1_of_3 frist">
                </div>
            </div>
        </div>
    </div>
    <div class="clear"> </div>
    
    <div class="footer">
        <div class="wrap">
            <center>
                <footer class="Copyright">
                    Ezems Tech Developers, 1333 Kilifi, County, Kenya<br>
                    <p>Copyright &copy; 2024 Ezems Tech Developers | All Rights Reserved</p>
                    <p>
                        Follow us on 
                        <a href='https://www.facebook.com/Ezemstech' target='_blank'>Facebook</a>, 
                        <a href='https://www.twitter.com/ezems' target='_blank'>Twitter</a>, 
                        <a href='https://www.instagram.com/ezems' target='_blank'>Instagram</a>
                        <a href='https://www.linkedin.com/in/ziroh-katana-24b23ba9/' target='_blank'>LinkedIn</a>, and 
                        <a href='https://github.com/Tella86/Tella86' target='_blank'>GitHub</a>
                    </p>
                </footer>
            </center>
        </div>
        <div class="clear"> </div>
    </div>
    <!--end-wrap-->
</body>
</html>
