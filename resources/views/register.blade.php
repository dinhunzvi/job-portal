@extends( 'auth.auth-public' )

@section( 'title', 'Register' )

@section( 'content' )

    <div class="row">

        <div class="col-md-9">

            <h4 class="page-title">Register</h4>

        </div>

    </div>

    @include( 'includes.auth_message' )

    <form method="post" id="register-details">

        <div class="row">

            <div class="col-6">

                <div class="form-group" id="first_name_grp">

                    <label for="first_name">First name(s)</label>
                    <input type="text" id="first_name" name="first_name" class="form-control" autofocus
                           placeholder="First name(s)" autocomplete="off" />

                </div>

            </div>

            <div class="col-6">

                <div class="form-group" id="last_name_grp">

                    <label for="last_name">Last name</label>
                    <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Last name"
                           autocomplete="off" />

                </div>

            </div>

        </div>

        <div class="row">

            <div class="col-6">

                <div class="form-group" id="email_grp">

                    <label for="email">Email address</label>
                    <input type="text" id="email" name="email" placeholder="Email address" class="form-control"
                           autocomplete="off" />

                </div>

            </div>

            <div class="col-6">

                <div class="form-group" id="id_number_grp">

                    <label for="id_number">National ID number</label>
                    <input type="text" id="id_number" name="id_number" placeholder="National ID number"
                           class="form-control" autocomplete="off" />

                </div>

            </div>

        </div>

        <div class="row">

            <div class="col-6">

                <div class="form-group" id="dob_grp">

                    <label for="dob">Date of birth</label>
                    <input type="text" id="dob" name="dob" placeholder="Date of birth" class="form-control" autocomplete="off" />

                </div>

            </div>

            <div class="col-6">

                <div class="form-group" id="gender_grp">

                    <label for="">Gender</label>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="rdoFemale" name="gender" value="Female"
                                />Female
                        <label class="form-check-label" for="rdoFemale"></label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="rdoMale" name="gender" value="Male" />Male
                        <label class="form-check-label" for="rdoMale"></label>
                    </div>

                </div>

            </div>

        </div>

        <div class="row">

            <div class="col-6">

                <div class="form-group" id="password_grp">

                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" />

                </div>

            </div>

            <div class="col-6">

                <div class="form-group" id="password_confirmation_grp">

                    <label for="password_confirmation">Confirm password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"
                           placeholder="Confirm password" />

                </div>

            </div>

        </div>

        <div class="row check-row">

            <div class="col-12">

                <div class="form-group" id="accept_grp">

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="accept" id="chkAccept">
                        <label class="form-check-label" for="chkAccept">
                            I agree to the <a href="{{ route( 'terms-and-conditions' ) }}" class="auth-links">terms and conditions</a>
                        </label>
                    </div>

                </div>

            </div>

        </div>

        <button type="submit" id="btnRegister" class="btn btn-success">
            <i class="fas fa-save"></i> Register
        </button>

    </form>

    <div class="row">

        <div class="col-12">

            <p class="auth-text">
                Already have an account with us? <a href="{{ route( 'login' ) }}" class="auth-links">Login here</a>
            </p>

        </div>

    </div>

    @include( 'date-pickers.dob-date-picker' )

@endsection

@section( 'js_file', 'register.js' )
