<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Login</title>

    <base href="<?=URL_SITIO?>">

    <link href="assets/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/admin/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="assets/admin/css/animate.css" rel="stylesheet">
    <link href="assets/admin/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <!--<div>

                <h1 class="logo-name">PIUDALI</h1>

            </div>-->
            <img src="assets/admin/img/logo-cohett.png" class="img-responsive">
            <h2>Piudalí Administrador</h2>
            <form class="m-t" role="form" method="post">
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Username" required="">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                </div>
                <button type="submit" name="ingresarAdmin" class="btn btn-primary block full-width m-b">Login</button>

                <a href="#"><small>Olvidó la contraseña?</small></a>
                <!--<p class="text-muted text-center"><small>Do not have an account?</small></p>-->
                <!--<a class="btn btn-sm btn-white btn-block" href="register.html">Create an account</a>-->
            </form>
            <p class="m-t"> <small>Piudalí &copy; 2016</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>

