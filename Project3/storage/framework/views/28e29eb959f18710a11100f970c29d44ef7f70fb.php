<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Find the Best Courses & Tutorials</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
    <script src="https://kit.fontawesome.com/62a9ef6f3e.js" crossorigin="anonymous"></script>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css'
          integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>

</head>
<body>
<nav class="navbar navbar-expand-sm navbar-light bg-light">
    <a href="#" class="navbar-brand">
        <img src="img/brainster.png" alt="logo">
    </a>
    <div class="collapse navbar-collapse" id="navbarsExample03">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('programming')); ?>">
                        <span class="<?php echo e(Request::is('/') ? 'active' : ''); ?>">
                    <i class="fas fa-american-sign-language-interpreting"></i>
                        Programming
                </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('data-science')); ?>">
                        <span class="<?php echo e(Request::is('data-science') ? 'active' : ''); ?>">
                            <i class="fas fa-atom"></i>
                        Data Science
                </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('devops')); ?>">
                    <span class="<?php echo e(Request::is('devops') ? 'active' : ''); ?>">
                        <i class="fas fa-infinity"></i>
                    devOps
                </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('design')); ?>">
                      <span class="<?php echo e(Request::is('design') ? 'active' : ''); ?>">
                        <i class="fas fa-paint-brush"></i>
                      design
                </span>
                </a>
            </li>
            <div class="top-right links">
                <a href="#" class="tutorial">
                      <span>
                      <i class="fas fa-plus" style="color:blue;"></i>
                      </span>
                    Submit a tutorial</a>
                <button type="button" class="sign" data-toggle="modal" data-target="#userSign"
                        style="color:black;padding: 0;">Sign Up / Sign In
                </button>
                <?php if(auth()->guard()->check()): ?>
                    <a href="<?php echo e(url('/home')); ?>" style="color:black;">Home</a>
                <?php endif; ?>
            </div>
    </div>
</nav>

<?php echo $__env->yieldContent('content'); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<div class="modal fade" id="userSign" tabindex="-1" role="dialog" aria-labelledby="userSign"
     aria-hidden="true">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center d-inline">
                <h2 class="modal-title" id="userSign">Welcome to Brainster.io</h2>
                <div class="modal-subtitle">Signup to submit and upvote tutorials, follow topics, and more.</div>
                <div class="modal-subtitle text-uppercase">Continue with:</div>
            </div>
            <div class="modal-body">
                <div class="social-login">
                    <div class="login-buttons text-center">
                        <form action="<?php echo e(route('social.login', 'google')); ?>">
                            <button class="btn-outline-light" type="submit">
                                <img style="height: 50px" src="https://hackr.io/assets/images/google-signin-dark.png">
                            </button>
                        </form>
                    </div>
                    <div class="login-buttons-fg" style="display: flex; justify-content: space-evenly;">
                        <form action="<?php echo e(route('social.login', 'facebook')); ?>">
                            <button type="submit" class="btn btn-primary" style="padding: 10px 30px;"><i
                                    class="fab fa-facebook-square"></i> Facebook
                            </button>
                        </form>
                        <form action="<?php echo e(route('social.login', 'github')); ?>">
                            <button type="submit" class="btn btn-dark" style="padding: 10px 40px;"><i
                                    class="fab fa-github-square"></i> Github
                            </button>
                        </form>
                    </div>
                </div>
                <div class="divider-with-text">
                    <span class="divider-text text-uppercase">or</span>
                </div>
                <form action="" method="post" id="signup-modal-form">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <div class="input-with-icon">
                            <input type="text" name="name" class="form-control pleft" placeholder="Full Name"
                                   autocomplete="off">
                            <i class="fas fa-user icon-form"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-with-icon">
                            <input type="email" name="email" class="form-control pleft" placeholder="Email">
                            <i class="far fa-envelope icon-form"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-with-icon">
                            <input type="password" name="password" class="form-control pleft" placeholder="Password"
                                   autocomplete="off">
                            <i class="fas fa-lock icon-form"></i>
                        </div>
                    </div>
                    <div class="helper-text">Minimum 6 characters</div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Create Account</button>
                    </div>
                </form>
                <p class="text-center">Already have an account?
                    <a href="javascript:void(0);" class="open-login-modal login-text">Login</a>
                </p>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script>
    //hovers
    $(".navbar-light .navbar-nav .nav-link").hover(function () {
        $(this).css('color', 'gray');
    }, function () {
        $(this).css('color', 'black');
    });
    $('.tutorial').hover(function () {
        $(this).css('background-color', '#b1d6ff');
        $(this).css('border-radius', '25px');
    }, function () {
        $(this).css('background-color', 'white');
    });

    $('.sign').hover(function () {
        $(this).css('background-color', '#b1d6ff');
        $(this).css('border-radius', '10px');

    }, function () {
        $(this).css('background-color', 'white');
    });
</script>
<div class="modal-container">
    <button type="button" class="modal-action-btn action-right close-modal" data-dismiss="modal">
        <i class="ion-ios-close"></i>
    </button>
    <div class="modal-dialog" role="document">
        <div class="modal-content text-center">
            <div class="modal-body new-modal-body signup-modal-body no-padding">
                <div class="right-sec">
                    <div class="modal-header">
                        <div class="modal-title">Welcome to Hackr.io</div>
                        <div class="modal-subtitle">Signup to submit and upvote tutorials, follow topics, and more.
                        </div>
                        <div class="login-needed-alert" style="display: none;"></div>
                        <div class="modal-subtitle text-caps">Continue with:</div>
                    </div>
                    <div class="social-login-buttons fx fx--fd-c">
                        <div class="login-buttons">
                            <a href="https://hackr.io/users/login/google" class="btn_gplus" type="button">
                                <img height="50px" src="https://hackr.io/assets/images/google-signin-dark.png">
                            </a>
                        </div>
                        <div class="second-row fx">
                            <div class="login-buttons">
                                <a href="https://hackr.io/users/login/facebook" class="btn btn-large btn_facebook">
                                    <i class="ion-logo-facebook"></i>
                                    <span class="logo-text">Facebook</span>
                                </a>
                            </div>
                            <div class="login-buttons">
                                <a href="https://hackr.io/users/login/github" class="btn btn-large btn_github">
                                    <i class="ion-logo-github"></i>
                                    <span class="logo-text">Github</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="divider-with-text">
                        <span class="divider-text text-uppercase">or</span>
                    </div>
                    <form name="userSignUpForm" action="https://hackr.io/signup" method="post" id="signup-modal-form"
                          class="form-new">
                        <input type="hidden" name="_token" value="QLSFzcb6NeASj1D4P68GPXcKnmNMgIPHWWXD6mRs">
                        <div class="form-group full_name-form-group">
                            <div class="input-with-icon">
                                <input type="text" name="full_name" class="form-control" placeholder="Full Name"
                                       autocomplete="off">
                                <i class="input-icon ion-ios-person"></i>
                            </div>
                        </div>
                        <div class="form-group email-form-group">
                            <div class="input-with-icon">
                                <input type="email" name="email" class="form-control" placeholder="Email">
                                <i class="input-icon ion-ios-mail"></i>
                            </div>
                        </div>
                        <div class="form-group password-form-group">
                            <div class="input-with-icon">
                                <input type="password" name="password" class="form-control" placeholder="Password"
                                       autocomplete="off">
                                <i class="input-icon ion-ios-lock"></i>
                            </div>
                        </div>
                        <div class="helper-text">Minimum 6 characters</div>
                        <div class="form-group submit-form-group">
                            <button type="submit" class="btn full_width spinning-loader btn-large">
                                <span class="txt"> Create Account</span>
                                <i class="ion-ios-radio-button-off fa-spin"></i>
                            </button>
                        </div>
                    </form>
                    <p class="para no-margin">Already have an account?
                        <a href="javascript:void(0);" class="open-login-modal login-text">Login</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /Users/nikola/code/brainsterprojectsnikolanajdovb1/Project3/resources/views/layout.blade.php ENDPATH**/ ?>