<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Find the Best Online Courses & Tutorials</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
    <script src="https://kit.fontawesome.com/62a9ef6f3e.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css'
          integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <a href="<?php echo e(route('programming')); ?>" class="navbar-brand">
            <img src="/img/brainster.png" alt="logo">
        </a>
        <div class="collapse navbar-collapse" id="navbarsExample03">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('programming')); ?>">
                        <span class="<?php echo e(Request::is('/') || Request::is('home')  ? 'active' : ''); ?>">
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
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto top-right links">
                <!-- Authentication Links -->
                <?php if(auth()->guard()->guest()): ?>
                    <a href="#" type="button" id="newTutorial" class="tutorial">
                                          <span>
                                          <i class="fas fa-plus" style="color:blue;"></i>
                                          </span>
                        Submit a tutorial</a>
                    <?php if(Route::has('register') ||  Route::has('login')): ?>
                        <a type="button" class="sign" href="#" data-toggle="modal" data-target="#userSign">Sign Up /
                            Sign In
                        </a>
                    <?php endif; ?>
                <?php else: ?>
                    <a href="#" class="tutorial" data-toggle="modal" data-target="#addTutorial">
                                          <span>
                                          <i class="fas fa-plus" style="color:blue;"></i>
                                          </span>
                        Submit a tutorial</a>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="dropdown-toggle" style="color: coral; font-weight: bolder;font-size: 20px" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <?php echo e(__('Logout')); ?>

                            </a>

                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                <?php echo csrf_field(); ?>
                            </form>
                        </div>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>

    <main class="py-4">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
        <?php echo $__env->yieldContent('content'); ?>
    </main>
</div>
<?php echo $__env->make('partials.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('partials.register', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('partials.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>
<script>

    $(document).ready(function () {
        var loggedIn = <?php echo e(auth()->check() ? 'true' : 'false'); ?>;
        $('#newTutorial').on('click', function (e) {
            e.preventDefault();
            if (!loggedIn) {
                swal("Oops..", "Please sign in first");
            }else{
             $('#addTutorial').modal('show');
            }
        })
    })
</script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script>
    $('#nameID').select2({
        placeholder: 'Python, Angular, etc.',
        multiple : true,

    });
</script>


<?php /**PATH /Users/nikola/code/brainsterprojectsnikolanajdovb1/Project3/resources/views/layouts/app.blade.php ENDPATH**/ ?>