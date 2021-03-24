<!DOCTYPE html>
<html lang="en">
<?php if (!isset($_SESSION)) { session_start(); }
      if($_SESSION['user'] != 'valid'){
           header("Location: index.php");
      }
   include('offers.php');
?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pizzeria Promo</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
#dtBasicExample_wrapper{
    padding:5%;
}

.container-fluid {
    width: 85%;
}
body{
    background:black;
}
#wrapper #content-wrapper{
    background:black;
}
.logo{
    vertical-align: middle;
    border-style: none;
    width: 81px;
    margin-top: 19px;
}
a.logout {
        color: white;
}
.FooterBlock_footerBlock__4ofA5 {
    padding-top: 40px;
    padding-bottom: 40px;
    border-top: 1px solid #979797;
}
.FooterBlock_footerBlock__4ofA5 .FooterBlock_footerRight__h-yyD {
        text-align: center;
        padding: 22px;
        border-radius: 10px;
        border: 1px solid #979797;
    }
.FooterBlock_footerContent__1yjnU p {
    color: white;
}
.FooterBlock_footerRight__h-yyD {
    color: white;
}
.FooterBlock_footerBlock__4ofA5 .FooterBlock_footerNav__2Uam8 ul {
    padding: 0;
    margin: 0;
    list-style: none;
    display: -webkit-inline-flex;
    display: inline-flex;
}
.FooterBlock_footerNav__2Uam8 ul li a {
    color: white;
    /* padding-left: 27px; */
}
a.terms {
    margin-left: 24px;
}
            
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <!-- <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                
                <div class="sidebar-brand-text mx-3">Pizzeria Locale <br> Admin </div>
            </a>
           <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
        </ul> -->
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                       <img class="logo" src="http://localhost/pizzeria_sms/images/pizzeria-locale.png" />
                         <a class="logout" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt "></i>
                                    Logout
                                </a>
                    </div>

                  

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <table id="dtBasicExample" class="table  table-bordered table-sm" cellspacing="0" width="100%">
                                    <thead>
                                      <tr>
                                        <th class="th-sm">S. No</th>
                                        <th class="th-sm">Name
                                  
                                        </th>
                                        <th class="th-sm">Mobile
                                  
                                        </th>
                                        <th class="th-sm">Promo Code
                                  
                                        </th>
                                        <th class="th-sm">Register Date
                                        <th class="th-sm">Expiry Date
                                  
                                        </th>
                                        
                                      </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                     if($offers){
                                         $i = 1;
                                         foreach($offers as $key => $value){
                                             ?>
                                             <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $value->name; ?></td>
                                                    <td><?php echo $value->mobile; ?></td>
                                                    <td><?php echo $value->coupon; ?></td>
                                                    <td><?php echo date('d-m-Y',strtotime($value->created_at)); ?></td>
                                                    <td><?php echo date('d-m-Y',strtotime("+7 day", strtotime($value->created_at))); ?></td>
                                                    
                                                </tr>

                                             <?php
                                                $i++;
                                         }
                                        
                                     }
                                    ?>
                                    </tbody>
                                    
                                  </table>
                            </div>
                        </div>

                    </div>

                 
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

           
            <!-- End of Footer -->
            <div class="FooterBlock_footerBlock__4ofA5"><div class="container"><div class="row"><div class="col-md-8"><div class="FooterBlock_footerNav__2Uam8">
                <ul><li><a href="https://www.pizzerialocale.in/privacy">Privacy Policy</a></li><li>
                    <a href="https://www.pizzerialocale.in/terms-of-service" class="terms">Terms of Services</a></li></ul></div>
                    <div class="FooterBlock_footerContent__1yjnU"><p>Copyright © 2020 PizzeriaLocale. All Rights Reserved.</p><p>Designed and Developed by Netiapps</p></div></div>
                        <div class="col-md-4"><div class="FooterBlock_footerRight__h-yyD"><h4>For Franchise Contact</h4><h5>+91 +919845 313999</h5></div>
                     </div>
                 </div>
                </div>
            </div>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script>
       $(document).ready(function () {
        $('#dtBasicExample').DataTable({
            "paging": true // false to disable pagination (or any other option)
        });
            $('.dataTables_length').addClass('bs-select');
        });
    </script>
  
</body>

</html>