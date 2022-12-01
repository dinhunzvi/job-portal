@extends( 'layouts.public' )

@section( 'title', 'My Documents' )

@section( 'content' )

    <div class="row">

        <div class="col-md-4">

            <h4 class="page-title">Document details</h4>

        </div>

    </div>

    @include( 'includes.message' )

    <form method="post" id="document_upload" enctype="multipart/form-data">

        <div class="row">

            <div class="col-xl-4 col-xl-3 col-md-6 col-sm-12">

                <div class="form-group" id="document_name_grp">

                    <label for="document_name">Select document to upload</label>
                    <input type="file" id="document_name" name="document_name" class="form-control" autofocus />

                </div>

            </div>

            <div class="col-xl-4 col-xl-3 col-md-6 col-sm-12">

                <div class="form-group" id="document_type_grp">

                    <label for="document_type">Document type</label>
                    <input type="text" id="document_type" name="document_type" class="form-control" autocomplete="off"
                           placeholder="Document type" />

                </div>

            </div>

        </div>

        <button type="submit" id="btnSave" class="btn btn-success">
            <i class="fas fa-save"></i> Save
        </button>

    </form>

@endsection

@section( 'js_file', 'documents.js' )
