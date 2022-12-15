@extends( 'layouts.base' )

@section( 'title', 'Candidates' )

@section( 'content' )

    <div class="row">

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">

            <div class="card">

                <div class="card-body">

                    <table class="table table-striped table-hover" id="candidates">

                        <thead>

                            <tr>

                                <th>Name</th>
                                <th>Email address</th>
                                <th>ID number</th>
                                <th>Date of birth</th>
                                <th>Gender</th>
                                <th>View Documents</th>
                                <th>Work experience</th>
                                <th>View Resume</th>

                            </tr>

                        </thead>

                    </table>

                </div>

            </div>

        </div>

    </div>

@endsection

@include( 'modals.candidate-documents' )

@include( 'modals.work-experience' )
