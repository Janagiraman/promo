<!DOCTYPE html>
<html lang="en">
<?php if (!isset($_SESSION)) { session_start(); } ?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Promo - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
<style>
.bg-gradient-primary {
    background:black;
}
.btn-primary {
    color: #fff;
    background-color: #f58634;
    border: 1px solid #f58634;
}
.btn-primary:hover {
    color: #fff;
    background-color: #f58634;
    border-color: #f58634;
}
</style>
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <img src="http://localhost/pizzeria_admin/images/pizzeria-locale.png" />
                                        <h1 class="h4 text-gray-900 mb-4">Welcome To Pizzeria Locale!</h1>
                                    </div>
                                        <form class="user" name="login-form" method="POST" action="validation.php">
                                            <div class="form-group">
                                                <input type="text" name="username" class="form-control form-control-user"
                                                    placeholder="Username" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="password" class="form-control form-control-user"
                                                    placeholder="Password" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                                        </form>
                                        <?php  if($_SESSION['user'] == 'invalid'){    ?>
                                            <div class="alert alert-danger" role="alert">
                                                Invalid Credentials
                                                </div>
                                        <?php $_SESSION['user'] = '';
                                    }   ?>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>
<style>
    .mt-5, .my-5 {
            margin-top: 9rem!important;
    }
    .alert-danger {
   
    margin-top: 10px;
}
</style>

</html>