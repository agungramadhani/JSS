<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>LifeMedia | Log in</title>
    <link rel="icon" href="<?= base_url() ?>assets/dist/img/logo.png">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->

</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <b>Life</b>Media
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Silahkan melakukan login</p>
                <form action="<?= base_url('Auth') ?>" method="POST" id="login">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Username" name="username" required autocomplete="off">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        <div class="invalid-feedback text-danger">
                            <h9 class="text-danger form-text">
                                <?php //echo form_error('username') 
                                ?>
                            </h9>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" autofocus placeholder="Password" name="password" required autocomplete="off">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-key"></span>
                            </div>
                        </div>
                        <div id="invalidCheck3Feedback" class="invalid-feedback">
                            <?php //echo form_error('password'); 
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Ingat Saya
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-6">
                            <div class="icheck-primary">
                                <center>
                                    <p class="mb-1">
                                        <a href="">Lupa password ?</a>
                                    </p>
                                </center>
                            </div>
                        </div> <!-- /.col -->
                    </div>
                    <div class="social-auth-links text-center mb-3">
                        <button type="submit" name="submit" class="btn btn-block btn-primary">
                            Login
                        </button>
                    </div>
                </form>

                <!-- /.social-auth-links -->
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>

</body>

</html>


<!-- proses login -->