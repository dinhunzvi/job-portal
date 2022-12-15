@extends( 'layouts.base' )

@section( 'title', 'Users' )

@section( 'content' )

    <div class="row">

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">

            <div class="card">

                <div class="card-body">

                    <div class="row">

                        <div class="col-md-4">

                            <h4>User details</h4>

                        </div>

                    </div>

                    @include( 'includes.message' )

                    <form method="post" id="user-details">

                        <div class="row">

                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">

                                <div class="form-group" id="first_name_grp">

                                    <label for="first_name">First name(s)</label>
                                    <input type="text" id="first_name" name="first_name" placeholder="First name(s)"
                                           class="form-control" autocomplete="off" autofocus />
                                    <input type="hidden" id="user_id" name="user_id" />

                                </div>

                            </div>

                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">

                                <div class="form-group" id="last_name_grp">

                                    <label for="last_name">Last name</label>
                                    <input type="text" id="last_name" name="last_name" placeholder="Last name"
                                           class="form-control" autocomplete="off" />

                                </div>

                            </div>

                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">

                                <div class="form-group" id="email_grp">

                                    <label for="email">Email address</label>
                                    <input type="text" id="email" name="email" placeholder="Email address"
                                           class="form-control" autocomplete="off" />

                                </div>

                            </div>

                        </div>

                        <button type="submit" id="btnSave" class="btn btn-primary">
                            <i class="fas fa-save"></i> Save
                        </button>

                    </form>


                </div>

            </div>

        </div>

    </div>

    <div class="row">

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">

            <div class="card">

                <div class="card-body">

                    <table class="table table-hover table-striped" id="users">

                        <thead>

                            <tr>

                                <th>First name(s)</th>
                                <th>Last name</th>
                                <th>Email address</th>
                                <th>Date created</th>
                                <th>Date updated</th>
                                <th>Actions</th>

                            </tr>

                        </thead>

                    </table>

                </div>

            </div>

        </div>

    </div>

@endsection


