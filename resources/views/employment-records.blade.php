@extends( 'layouts.public' )

@section( 'title', 'Work experience' )

@section( 'content' )

    <div class="row">

        <div class="col-md-4">

            <h4 class="page-title">Employment details</h4>

        </div>

    </div>

    @include( 'includes.message' )

    <form method="post" id="employment-details">

        <div class="row">

            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">

                <div class="form-group" id="company_name_grp">

                    <label for="company_name">Name of company</label>
                    <input type="text" id="company_name" name="company_name" class="form-control" autofocus
                           placeholder="Name of company" autocomplete="off" />
                    <input type="hidden" id="employment_record_id" name="employment_record_id" />

                </div>

            </div>

            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">

                <div class="form-group" id="start_date_grp">

                    <label for="start_date">Start date</label>
                    <input type="text" id="start_date" name="start_date" class="form-control" placeholder="Start date"
                           autocomplete="off" />

                </div>

            </div>

            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">

                <div class="form-group" id="end_date_grp">

                    <label for="end_date">End date</label>
                    <input type="text" id="end_date" name="end_date" class="form-control" placeholder="End date"
                           autocomplete="off" />

                </div>

            </div>

            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">

                <div class="form-group" id="position_grp">

                    <label for="position">Position</label>
                    <input type="text" id="position" name="position" class="form-control" placeholder="Position"
                           autocomplete="off" />

                </div>

            </div>

        </div>

        <div class="row">

            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">

                <div class="form-group" id="description_grp">

                    <label for="description">Description(Responsibilities and duties)</label>
                    <textarea name="description" id="description" class="form-control" autocomplete="off"
                              placeholder="Description(Responsibilities and duties)"></textarea>

                </div>

            </div>

        </div>

        <button type="submit" id="btnSave" class="btn btn-primary">
            <i class="fas fa-save"></i> Save
        </button>

    </form>

    <div class="row">

        <div class="col-4">

            <h3 class="experience-title">Experience</h3>

        </div>

    </div>

    <div id="experience"></div>

    @include( 'date-pickers.record-date-picker' )

@endsection

@section( 'js_file', 'employment-records.js' )
