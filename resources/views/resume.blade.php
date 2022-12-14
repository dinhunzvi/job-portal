@extends( 'layouts.public' )

@section( 'title', 'Upload Resume' )

@section( 'content' )

    <div class="row">

        <div class="col-md-6">

            <h4 class="page-title">Upload Resume</h4>

        </div>

    </div>

    @include( 'includes.message' )

    <form method="post" id="resume-details" enctype="multipart/form-data">

        <div class="row">

            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">

                <div class="form-group" id="resume_grp">

                    <label for="resume">Resume</label>
                    <input type="file" id="resume" name="resume" class="form-control" />

                </div>

            </div>

        </div>

        <button type="submit" class="btn btn-primary" id="btnUpload">
            <i class="fas fa-upload"></i> Upload
        </button>

    </form>

@endsection

@section( 'js_file', 'resume.js' )
