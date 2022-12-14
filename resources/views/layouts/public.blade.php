<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset( 'css/bootstrap.min.css' ) }}" type="text/css" />

        <!-- FontAwesome CSS -->
        <link rel="stylesheet" href="{{ asset( 'plugins/fontawesome-free/css/all.css' ) }}" type="text/css" />

        @if( $date_picker )
            <!-- datepicker CSS -->
            <link rel="stylesheet" href="{{ asset( 'css/gijgo.min.css') }}" type="text/css"/>
        @endif

        <!-- jQuery -->
        <script src="{{ asset( 'js/jquery.min.js' ) }}"></script>

        <!-- custom CSS -->
        <link rel="stylesheet" href="{{ asset( 'css/common.css' ) }}" type="text/css" />

        <title>Job Portal - @yield( 'title' )</title>
    </head>
    <body>

        <div class="container">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="{{ route( 'dashboard' ) }}">{{ config( 'app.name' ) }}</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route( 'dashboard' ) }}">Home <span class="sr-only">(current)</span></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route( 'documents' ) }}">My documents</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route( 'employment-records') }}">Work experience</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                               aria-expanded="false">
                                Account
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route( 'resume') }}">
                                    <i class="fas fa-upload"></i> Resume
                                </a>
                                <a class="dropdown-item" id="change_password" href="#">
                                    <i class="fas fa-pencil-alt"></i> Change password
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" id="sign_out" href="#">
                                    <i class="fas fa-sign-out-alt"></i> Sign out
                                </a>
                            </div>

                        </li>

                    </ul>

                </div>

            </nav>

            @include( 'modals.sign_out' )

            @include( 'modals.change-password' )

            @yield( 'content' )

        </div>

        <script src="{{ asset( 'js/bootstrap.bundle.min.js' ) }}" type="text/javascript"></script>
        <script src="{{ asset( 'js/common.js') }}" type="text/javascript"></script>
        <script src="js/@yield( 'js_file' )" type="text/javascript"></script>

        @if( $data_tables )
            <script src="{{ asset( 'plugins/datatables/jquery.dataTables.min.js' ) }}"></script>
            <script src="{{ asset( 'plugins/datatables-bs4/js/dataTables.bootstrap4.min.js' ) }}"></script>
            <script src="{{ asset( 'plugins/datatables-responsive/js/dataTables.responsive.min.js' ) }}"></script>
            <script src="{{ asset( 'plugins/datatables-responsive/js/responsive.bootstrap4.min.js' ) }}"></script>
        @endif


        @if ( $moment )
            <script src="{{ asset( 'js/moment.js' ) }}" type="text/javascript"></script>
            <script src="{{ asset( 'js/datetime-moment.js' ) }}" type="text/javascript"></script>
        @endif

    </body>
</html>

