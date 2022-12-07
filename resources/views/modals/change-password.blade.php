<!-- delete document modal -->
<div class="modal fade" id="change_password_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">Change password</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>

            <div class="modal-body">

                <div class="row">

                    <div class="col-12">

                        <h3>Change password</h3>

                    </div>

                </div>

                @include( 'includes.auth_message' )

                <form method="post" id="password-details">

                    <div class="row">

                        <div class="col-12">

                            <div class="form-group" id="current_grp">

                                <label for="current">Current password</label>
                                <input type="password" id="current" name="current" placeholder="Current password"
                                       class="form-control" autofocus />

                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-12">

                            <div class="form-group" id="password_grp">

                                <label for="password">New password</label>
                                <input type="password" id="password" name="password" placeholder="New password"
                                       class="form-control" />

                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-12">

                            <div class="form-group" id="password_confirmation_grp">

                                <label for="password_confirmation">Confirm new password</label>
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                       placeholder="Confirm new password" class="form-control" />

                            </div>

                        </div>

                    </div>

                    <button type="submit" class="btn btn-success" id="btnChangePassword">
                        <i class="fas fa-pencil-alt"></i> Change password
                    </button>

                </form>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

            </div>

        </div>

    </div>

</div>
