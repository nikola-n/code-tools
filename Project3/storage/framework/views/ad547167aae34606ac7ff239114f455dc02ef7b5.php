<div class="modal fade <?php echo e(session('is_register') && $errors->any() ? 'show' : ''); ?>" id="userSign" tabindex="-1" role="dialog" aria-labelledby="userSign"
     aria-hidden="<?php echo e(session('is_register') && $errors->any() ? 'false' : 'true'); ?>">
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

                <form action="<?php echo e(route('register')); ?>" method="POST" id="registerForm">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <div class="input-with-icon">
                            <input type="text" name="name" class="form-control pleft" placeholder="Full Name"
                                   autocomplete="name" autofocus>
                            <i class="fas fa-user icon-form"></i>
                            <?php if(session()->get('is_register') && $errors->has('name')): ?>
                                <p class="text-danger"><?php echo e($errors->first('name')); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-with-icon">
                            <input type="email" name="email" class="form-control pleft" placeholder="Email" required autocomplete="email">
                            <i class="far fa-envelope icon-form"></i>
                            <?php if(session()->get('is_register') && $errors->has('email')): ?>
                                <p class="text-danger"><?php echo e($errors->first('email')); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-with-icon">
                            <input type="password" name="password" class="form-control pleft" placeholder="Password"
                                   required autocomplete="new-password">
                            <i class="fas fa-lock icon-form"></i>
                            <?php if(session()->get('is_register') && $errors->has('password')): ?>
                                <p class="text-danger"><?php echo e($errors->first('password')); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <input id="password-confirm" type="password" class="form-control pleft" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                        <i class="fas fa-lock icon-form"></i>
                    </div>
                    <div class="helper-text">Minimum 8 characters</div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Create Account</button>
                    </div>
                </form>
                <p class="text-center">Already have an account?
                    <a href="#" data-toggle="modal" data-dismiss="modal" data-target="#loginModal">Login</a>
                </p>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /Users/nikola/code/brainsterprojectsnikolanajdovb1/project3/resources/views/partials/register.blade.php ENDPATH**/ ?>