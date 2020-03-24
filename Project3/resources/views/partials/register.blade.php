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
                <form action="{{ route('register') }}" method="POST" id="registerForm">
                    @csrf
                    <div class="form-group">
                        <div class="input-with-icon">
                            <input type="text" name="name" class="form-control pleft" placeholder="Full Name"
                                   autocomplete="name" autofocus>
                            <i class="fas fa-user icon-form"></i>

                            <span class="invalid-feedback" role="alert" id="nameError">
                                <strong></strong>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-with-icon">
                            <input type="email" name="email" class="form-control pleft" placeholder="Email"required autocomplete="email">
                            <i class="far fa-envelope icon-form"></i>
                            <span class="invalid-feedback" role="alert" id="emailError">
                                <strong></strong>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-with-icon">
                            <input type="password" name="password" class="form-control pleft" placeholder="Password"
                                   required autocomplete="new-password">
                            <i class="fas fa-lock icon-form"></i>
                            <span class="invalid-feedback" role="alert" id="passwordError">
                                <strong></strong>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                            <input id="password-confirm" type="password" class="form-control pleft" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                        <i class="fas fa-lock icon-form"></i>
                        <span class="invalid-feedback" role="alert" id="passwordError">
                                <strong></strong>
                            </span>
                    </div>
                    <div class="helper-text">Minimum 6 characters</div>
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

@section('scripts')
    @parent

    <script>
        $(function () {
            $('#registerForm').submit(function (e) {
                e.preventDefault();
                let formData = $(this).serializeArray();
                $(".invalid-feedback").children("strong").text("");
                $("#registerForm input").removeClass("is-invalid");
                $.ajax({
                    method: "POST",
                    headers: {
                        Accept: "application/json"
                    },
                    url: "{{ route('register') }}",
                    data: formData,
                    success: () => window.location.assign("{{ route('programming') }}"),
                    error: (response) => {
                        if(response.status === 422) {
                            let errors = response.responseJSON.errors;
                            Object.keys(errors).forEach(function (key) {
                                $("#" + key + "Input").addClass("is-invalid");
                                $("#" + key + "Error").children("strong").text(errors[key][0]);
                            });
                        } else {
                            window.location.reload();
                        }
                    }
                })
            });
        })
    </script>
@endsection
