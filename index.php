<?php if (!isset($_SESSION)) { session_start(); } ?>
<head>
    <title>Pizzeria Locale</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,500' rel='stylesheet' type='text/css'>
    <style>
.row.header {
    margin-top: 5%;
    padding: 2%;
}
.alert-danger, .alert-success{
    margin-top:10px;
}
.header a{
    margin:auto;
}


.main-content {
    margin: auto;
    margin-top: 10%;
}
.alert-success {
    color: #155724;
    background-color: #d4edda;
    border-color: #c3e6cb;
    font-size: 26px;
    text-align: center;
    margin: auto;
}
.txt-danger{
    color:red;
}

</style>
</head>

<body>

    <div class="container">

        <div class="row">

            <div class="col-xl-6 offset-xl-2 main-content">

                <div class="row header">
                    <a href="https://www.pizzerialocale.in/">
                      <img src="images/pizzeria-locale.png" />
                    </a>
                </div>
                <?php if(isset($_SESSION['insert']) != 'success'){ ?>
                        <form id="promo-form" name="promo-form" method="post" action="sms.php">
                            
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="name">Name <span class="txt-danger">*</span></label>
                                            <input id="name" type="text" name="name" class="form-control" placeholder="Please enter your Name" >
                                            
                                        </div>
                                    </div>
                                
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="phone">Phone <span class="txt-danger">*</span></label>
                                            <input id="phone" type="number" name="phone" class="form-control" placeholder="Please enter your phone" >
                                        
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="form-group"> 
                                    <div class="g-recaptcha" data-sitekey="6LfCdIwaAAAAAG9XJrq4gQGTgeD2IT_b9zKSj-Eu" data-callback="verifyRecaptchaCallback" data-expired-callback="expiredRecaptchaCallback"></div>
                                    <input class="form-control d-none" data-recaptcha="true"  data-error="Please complete the Captcha"> 
                                    <div class="help-block with-errors"></div>
                                </div>
                                <button type="submit" class="btn btn-success" name="send-sms" id="send-sms"> Send Message</button>
                        
                        </form>
                <?php  }   if(isset($_SESSION['user']) == 'exist'){ 
                              unset($_SESSION['user']);
                    ?>
                            <div class="alert alert-danger" role="alert">
                                Opps This number is already used for the promo.
                            </div>
                <?php  } ?> 
            </div>
            <?php   if(isset($_SESSION['insert']) == 'success'){ 
                                    
                                    ?>
                                    <div class="alert alert-success" role="alert">
                                    Congratulation you have received 10% discount for Dine in. Check SMS for Promo Code 
                                    </div>
                                <?php
                                    $_SESSION['insert'] = '';
                                    unset($_SESSION['insert']);
                            } ?>
          

        </div>
        <!-- /.row-->

    </div>
    <!-- /.container-->

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
   
  <script>
        
        function verifyRecaptchaCallback(){
                grecaptcha.execute('6LfCdIwaAAAAAG9XJrq4gQGTgeD2IT_b9zKSj-Eu', {action:'validate_captcha'})
                        .then(function(token) {
                        document.getElementById('g-recaptcha-response').value = token;
                });
            }
</script>
</body>

