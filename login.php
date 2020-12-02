<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
        <meta charset="utf-8">
        <title>Construction - Free HTML Bootstrap Template</title>
        <!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <!-- Custom Fonts -->
        <link rel="stylesheet" href="custom-font/fonts.css" />
        <!-- Bootstrap -->
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <!-- Font Awesome -->
        <link rel="stylesheet" href="css/font-awesome.min.css" />
        <!-- Bootsnav -->
        <link rel="stylesheet" href="css/bootsnav.css">
        <!-- Fancybox -->
        <link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css?v=2.1.5" media="screen" /> 
        <!-- Custom stylesheet -->
        <link rel="stylesheet" href="css/custom.css" />
        <!--[if lt IE 9]>
                <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
</head>
<body>

   
   
    <!-- MENU SECTION END-->
    <p align="center">
    <div class="content-wrapper">
        <div class="container" >
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-warning">
                        <div class="panel-heading">
                            <h4 class="page-head-line" align="center">Please Sign In Here</h4>
                        </div>
                        <div class="panel-body">
                    <!--<div class="login-panel panel panel-default">-->
                    <form role="form" action="" method="POST">
                        <input type="text" name="username" placeholder="Username" class="form-control"><br />
                        <input type="password" name="password" placeholder="Password" class="form-control" />
                        <hr />
                            <input type="submit" name="login" value="Login" class="btn btn-lg btn-warning btn-block">
                        <?php
                            include('koneksi.php');
                            if(isset($_POST['login']))
                            {
                                $un=$_POST['username'];
                                $pass=md5($_POST['password']);
                                $query=mysql_query("SELECT * FROM user WHERE username='$un' AND password='$pass'"); 
                                $cek=mysql_num_rows($query);
                                $data=mysql_fetch_array($query);
                                
                                if($cek==1)
                                {
                                    session_start();
                                    $_SESSION['user']=$data['username'];
                                    $_SESSION['level']=$data['level'];
                                    header('location:index.php');
                                }
                                
                        ?>
                     
                        </form> 
                    </div>
                </div>
                </div>
</div>
                </div>
            </div>

            </div>
        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
    
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("projekfix/images/portfolio3.jpg",{speed:500});
    </script>
    
</body>
</html>
