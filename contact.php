<?php
include_once('hms/include/config.php');
if(isset($_POST['submit']))
{
$name=$_POST['fullname'];
$email=$_POST['emailid'];
$mobileno=$_POST['mobileno'];
$dscrption=$_POST['description'];
$query=mysqli_query($con,"insert into tblcontactus(fullname,email,contactno,message) value('$name','$email','$mobileno','$dscrption')");
echo "<script>alert('Your information succesfully submitted');</script>";
echo "<script>window.location.href ='contact.php'</script>";

}


?>
<!DOCTYPE HTML>
<html>

<head>
    <title>EHMS | Contact us</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href='http://fonts.googleapis.com/css?family=Ropa+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

</head>

<body>
    <!--start-wrap-->

    <!--start-header-->
    <div class="header">
        <div class="wrap">
            <!--start-logo-->
            <div class="logo">
                <img src="images/healttech.png" alt="Ezems Health Tech System Logo"
                    style="vertical-align: middle; height: 40px; margin-right: 10px;">

                <a href="index.html" style="font-size: 30px;"> Ezems Health Tech System</a>

            </div>
            <!--end-logo-->
            <!--start-top-nav-->
            <div class="top-nav">
                <ul>
                    <li><a href="index.html">Home</a></li>

                    <li class="active"><a href="contact.php">contact</a></li>
                </ul>
            </div>
            <div class="clear"> </div>
            <!--end-top-nav-->
        </div>
        <!--end-header-->
    </div>
    <div class="clear"> </div>
    <div class="wrap">
        <div class="contact">
            <div class="section group">
                <div class="col span_1_of_3">

                    <div class="company_address">
                        <h2>Health Tech Address :</h2>
                        <p>Welcome to Ezems Health Tech.! We value your feedback, inquiries, and suggestions. Our
                            dedicated team is here to assist you in any way we can. Feel free to reach out to us through
                            the channels below:</p>
                        <p>Your health, our priority. Compassionate care, innovative solutions—because your well-being
                            is the heart of our mission.</p>
                        <hr class="custom-line">
                        <p><i class="fa-solid fa-location-dot"></i>&nbsp;&nbsp;<strong style="font-weight: bold;">P.o
                                Box:</strong> 1333 -80108,</p>
                        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kilifi, Kenya</p>
                        <p><i class="fa-solid fa-phone"></i>&nbsp;&nbsp;<strong
                                style="font-weight: bold;">Phone:</strong>(254) 101086123</p>
                        <p><i class="fa-solid fa-envelope"></i>&nbsp;&nbsp;<strong
                                style="font-weight: bold;">Email:</strong> <span>&nbsp;info@ezems.co.ke</span></p>

                    </div>
                </div>
                <div class="col span_2_of_3">
                    <div class="contact-form">
                        <h2>Contact Us</h2>
                        <form action="contact_us/send_message.php" name="contactus" method="post">
                            <div>
                                <span><label>NAME</label></span>
                                <span><input type="text" name="fullname" required="true" value=""></span>
                            </div>
                            <div>
                                <span><label>E-MAIL</label></span>
                                <span><input type="email" name="email" required="ture" value=""></span>
                            </div>
                            <div>
                                <span><label>MOBILE.NO</label></span>
                                <span><input type="text" name="mobileno" required="true" value=""></span>
                            </div>
                            <div>
                                <span><label>Description</label></span>
                                <span><textarea name="message" required="true"> </textarea></span>
                            </div>
                            <div>
                                <span><input type="submit" name="submit" value="Submit"></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="clear"> </div>
        </div>
        <div class="clear"> </div>
    </div>
    <div class="clear"> </div>
    <div class="footer">
        <div class="wrap">
            <div class="footer-left">
                <ul>
                    <li><a href="index.html">Home</a></li>

                    <li><a href="contact.php">contact</a></li>
                </ul>
            </div>

            <div class="clear"> </div>
        </div>
    </div>
    <!--end-wrap-->
</body>

</html>