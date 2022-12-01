@extends( 'auth.auth-public' )

@section( 'title', 'Login' )

@section( 'content' )

    <div class="row">

        <div class="col-md-9">

            <h4 class="page-title">Hi, welcome back</h4>

        </div>

    </div>

    <div class="row">

        <div class="col-md-12">

            <h4 class="inverse-text">Continue where you left off</h4>

        </div>

    </div>

    @include( 'includes.auth_message' )

    <form method="post" id="login_details">

        <div class="row">

            <div class="col-8">

                <div class="form-group" id="email_grp">

                    <label for="email">Email address</label>
                    <input type="text" id="email" name="email" class="form-control" autofocus placeholder="Email Address"
                           autocomplete="off" />

                </div>

            </div>

        </div>

        <div class="row">

            <div class="col-8">

                <div class="form-group" id="password_grp">

                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" />

                </div>

            </div>

        </div>

        <button type="submit" id="btnLogin" class="btn btn-success">
            <i class="fas fa-sign-in-alt"></i> Login
        </button>

    </form>

    <div class="row">

        <div class="col-12">

            <p class="auth-text">
                Don't have an account with us? <a href="{{ route( 'register' ) }}" class="auth-links">Register here</a>
            </p>

        </div>

    </div>

@endsection

@section( 'js_file', 'candidate-login.js' )
