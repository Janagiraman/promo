<html>
<?php if (!isset($_SESSION)) { session_start(); } ?>
<head>
    <title>Contact Form Tutorial by Bootstrapious.com</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,500' rel='stylesheet' type='text/css'>
    <link href='custom.css' rel='stylesheet' type='text/css'>
</head>

<body>

    <div class="container">

        <div class="row">

            <div class="col-xl-8 offset-xl-2">

                <div class="row header">
                    <img src="http://localhost/pizzeria_sms/images/pizzeria-locale.png" />
                </div>
                <form id="contact-form" method="post" action="sms.php" role="form">

                    <div class="messages"></div>

                    <div class="controls">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="form_name">Name *</label>
                                    <input id="form_name" type="text" name="name" class="form-control" placeholder="Please enter your Name" required="required"
                                        data-error="Name is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                           
                        </div>
                        <div class="row">
                            
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="form_phone">Phone</label>
                                    <input id="form_phone" type="tel" name="phone" class="form-control" placeholder="Please enter your phone" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                       


                        <!-- <div class="form-group">
                            <div class="g-recaptcha" data-sitekey="6LfKURIUAAAAAO50vlwWZkyK_G2ywqE52NU7YO0S" data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback"></div>
                            <input class="form-control d-none" data-recaptcha="true" required data-error="Please complete the Captcha">
                            <div class="help-block with-errors"></div>
                        </div> -->


                        <input type="submit" class="btn btn-success btn-send" value="Send message">
                        <?php  if($_SESSION['user'] == 'exist'){  
                            $_SESSION['user'] = '';
                            ?>
                            <div class="alert alert-danger" role="alert">
                                This Mobile Number Already Used this offer!. Thanks for your interest with us.
                            </div>
                        <?php  }   if($_SESSION['insert'] == 'success'){ 
                                    
                            ?>
                            <div class="alert alert-success" role="alert">
                               Congratulation you have received 10% discount. Please use the code <?php echo $_SESSION['coupon']?> before <?php echo $_SESSION['expiry_date']?>
                            </div>
                        <?php
                            $_SESSION['insert'] = '';
                            $_SESSION['coupon'] = '';
                            $_SESSION['expiry_date'] = '';
                    } ?>
                        

                    </div>

                </form>

            </div>
            <!-- /.8 -->

        </div>
        <!-- /.row-->

    </div>
    <!-- /.container-->

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- <script src='https://www.google.com/recaptcha/api.js'></script> -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="validator.js"></script>
    <script src="contact.js"></script>
</body>
<style>
.row.header {
    margin-top: 5%;
    padding: 2%;
}
.alert-danger, .alert-success{
    margin-top:10px;
}

</style>
</html>