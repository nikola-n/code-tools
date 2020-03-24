<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal"
     aria-hidden="true">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center d-inline">
                <h2 class="modal-title" id="loginModal">Welcome back</h2>
                <div class="modal-subtitle text-uppercase">Continue with:</div>
            </div>
            <div class="modal-body">
                <div class="social-login">
                    <div class="login-buttons text-center">
                        <form action="{{route('social.login', 'google')}}">
                            <button class="btn-outline-light" type="submit">
                                <img style="height: 50px" src="https://hackr.io/assets/images/google-signin-dark.png">
                            </button>
                        </form>
                    </div>
                    <div class="login-buttons-fg" style="display: flex; justify-content: space-evenly;">
                        <form action="{{route('social.login', 'facebook')}}">
                            <button type="submit" class="btn btn-primary" style="padding: 10px 30px;"><i
                                    class="fab fa-facebook-square"></i> Facebook
                            </button>
                        </form>
                        <form action="{{route('social.login', 'github')}}">
                            <button type="submit" class="btn btn-dark" style="padding: 10px 40px;"><i
                                    class="fab fa-github-square"></i> Github
                            </button>
                        </form>
                    </div>
                </div>
                <div class="divider-with-text">
                    <span class="divider-text text-uppercase">or</span>
                </div>
                <form action="{{route('login')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="input-with-icon">
                            <input type="email" name="email"
                                   class="form-control pleft @error('email') is-invalid @enderror" placeholder="Email"
                                   required autocomplete="email" autofocus>
                            <i class="far fa-envelope icon-form"></i>
                        </div>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="input-with-icon">
                            <input type="password" name="password"
                                   class="form-control pleft @error('password') is-invalid @enderror"
                                   placeholder="Password"
                                   required autocomplete="current-password">
                            <i class="fas fa-lock icon-form"></i>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group" style="display: flex;justify-content: space-between;margin-left:6%;">
                        <div>
                            <input class="form-check-input" type="checkbox" name="remember"
                                   id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="helper-text">Forgot Password</a>
                        @endif
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>
                </form>
                <p class="text-center">Don't have an account?
                    <a href="#" data-toggle="modal" data-target="#userSign" data-dismiss="modal">Sign Up</a>
                </p>
            </div>
        </div>
    </div>
</div>

@section('scripts')
    @parent
    @if($errors->has('email') || $errors->has('password'))
        <script>
            $(function () {
                $('#loginModal').modal({
                    show: true
                });
            });
        </script>
    @endif
@endsection
