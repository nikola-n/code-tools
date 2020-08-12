<?php $__env->startSection('content'); ?>
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
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
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
            <div class="flex-center position-ref full-height">
                <?php if(Route::has('login')): ?>
                    <div class="top-right links">
                        <?php if(auth()->guard()->check()): ?>
                            <a href="<?php echo e(url('/home')); ?>">Home</a>
                        <?php else: ?>
                            <a href="<?php echo e(route('login')); ?>">Login</a>

                            <?php if(Route::has('register')): ?>
                                <a href="<?php echo e(route('register')); ?>">Register</a>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <div class="content">
                    <div class="title m-b-md">
                        <?php if(auth()->guard()->guest()): ?>
                            Please sign in
                        <?php else: ?>
                            Laravel
                        <?php endif; ?>
                    </div>

                    <div class="links">
                        <a href="https://laravel.com/docs">Docs</a>
                        <a href="https://laracasts.com">Laracasts</a>
                        <a href="https://laravel-news.com">News</a>
                        <a href="https://blog.laravel.com">Blog</a>
                        <a href="https://nova.laravel.com">Nova</a>
                        <a href="https://forge.laravel.com">Forge</a>
                        <a href="https://vapor.laravel.com">Vapor</a>
                        <a href="https://github.com/laravel/laravel">GitHub</a>
                    </div>
                </div>
            </div>
















            </div>
    </div>
</nav>

<?php echo $__env->yieldContent('content'); ?>
















































































































































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
        $(this).css('background-color', '#0247FE');
        $(this).css('color', '#FFFFFF');
        $(this).css('padding', '5px 5px');
        $(this).css('border-radius', '9px');
    }, function () {
        $(this).css('background-color', 'white');
        $(this).css('color', 'black');
    });

    $('.sign').hover(function () {
        $(this).css('background-color', '#0247FE');
        $(this).css('padding', '5px 5px');
        $(this).css('color', '#FFFFFF');
        $(this).css('border-radius', '9px');

    }, function () {
        $(this).css('background-color', 'white');
        $(this).css('color', 'black');
    });
</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/nikola/code/brainsterprojectsnikolanajdovb1/project3/resources/views/layout.blade.php ENDPATH**/ ?>