@extends( 'layouts.public' )

@section( 'title', 'Profile' )

@section( 'content' )

    <div class="row">

        <div class="col-md-4">

            <h4 class="page-title">My details</h4>

        </div>

    </div>

    @include( 'includes.message' )

    <form method="post" id="profile-details">

        <div class="row">

            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">

                <div class="form-group" id="first_name_grp">

                    <label for="first_name">First name(s)</label>
                    <input type="text" name="first_name" id="first_name" class="form-control" autofocus
                           placeholder="First name(s)" autocomplete="off" />

                </div>

            </div>

            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">

                <div class="form-group" id="last_name_grp">

                    <label for="last_name">Last name</label>
                    <input type="text" name="last_name" id="last_name" class="form-control" autocomplete="off"
                           placeholder="Last name" />

                </div>

            </div>

        </div>

        <div class="row">

            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">

                <div class="from-group" id="email_grp">

                    <label for="email">Email address</label>
                    <input type="text" id="email" name="email" autocomplete="off" class="form-control"
                        placeholder="Email address"/>

                </div>

            </div>

            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">

                <div class="from-group" id="id_number_grp">

                    <label for="id_number">National ID number</label>
                    <input type="text" id="id_number" name="id_number" autocomplete="off" class="form-control"
                        placeholder="National ID number" />

                </div>

            </div>

        </div>

        <div class="row">

            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">

                <div class="from-group" id="dob_grp">

                    <label for="dob">Date of birth</label>
                    <input type="text" id="dob" name="dob" autocomplete="off" class="form-control"
                           placeholder="Date of birth" />

                </div>

            </div>

            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">

                <div class="from-group" id="gender_grp">

                    <label for="gender">Gender</label>

                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="rdoFemale" name="gender" value="Female" />
                        <label class="form-check-label" for="rdoFemale">Female</label>
                    </div>

                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="rdoMale" name="gender" value="Male" />
                        <label class="form-check-label" for="rdoMale">Male</label>
                    </div>

                </div>

            </div>

        </div>

        <button id="btnUpdate" class="btn btn-primary" type="submit">
            <i class="fas fa-save"></i> Save
        </button>

    </form>

    @include( 'date-pickers.dob-date-picker' )

@endsection

@section( 'js_file', 'profile.js' )
