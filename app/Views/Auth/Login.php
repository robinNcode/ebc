<!doctype html>
<html lang="en">
<head>
    <title>Login Page</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="http://robin.adovasoft.com/cdn/bootstrap.min.css">

    <!-- Additional css -->
    <link rel="stylesheet" href="<?= base_url('css/login.css') ?>">

</head>
<body>
<div class="sidenav sidenav-image">
    <div class="login-main-text">
        <h2>Electricity<br> Bill Calculator</h2>
        <h5 class="text-warning">Login or register from here to access.</h5>
    </div>
</div>
<div class="main">
    <div class="col-md-6 col-sm-12">
        <div class="login-form">
            <form class="form mt-5 contact-form" action="<?= base_url('login') ?>"
                  accept-charset="UTF-8" method="post" spellcheck="false" autocomplete="off">
                <?= csrf_field() ?>
                <div class="form-group">
                    <div class="col-sm-12">
                        <input class="form-control form-control-line <?= session('errors.user_name') ? 'is-invalid' : null ?>"
                               name="user_name" maxlength="40" min="5" size="40"
                               type="user_name" placeholder="User Name" required="required">
                        <div class="invalid-feedback"><?= session('errors.user_name') ?></div>
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-sm-12">
                        <input class="form-control form-control-line <?= session('errors.password') ? 'is-invalid' : null ?>"
                               name="password" minlength="5" maxlength="50" size="50"
                               type="password" placeholder="Password" required="required">
                        <div class="invalid-feedback"><?= session('errors.password') ?></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12 mt-4">
                        <button class="btn btn-primary btn-block" type="submit">Log In</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="http://robin.adovasoft.comm/cdn/bootstrap.min.js"></script>
<script src="http://robin.adovasoft.com/cdn/js/jquery-3.6.0.min.js"></script>
<script src="http://robin.adovasoft.com/cdn/js/popper-2.9.3.min.js"></script>
</body>
</html>