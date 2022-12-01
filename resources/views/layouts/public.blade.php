<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset( 'css/bootstrap.min.css' ) }}" type="text/css" />

        @if( $date_picker )
            <!-- datepicker CSS -->
            <link rel="stylesheet" href="{{ asset( 'css/gijgo.min.css') }}" type="text/css"/>
        @endif

        <!-- jQuery -->
        <script src="{{ asset( 'js/jquery.min.js' ) }}"></script>

        <title>Job Portal - @yield( 'title' )</title>
    </head>
    <body>

        <div class="container-fluid">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="{{ route( 'dashboard' ) }}">Navbar</a>
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
                            <a class="nav-link" href="{{ route( 'employment-records') }}">Employment records</a>
                        </li>
                        <!--<li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                Dropdown
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled">Disabled</a>
                        </li>-->
                    </ul>

                </div>

            </nav>

        </div>

        <script src="{{ asset( 'js/bootstrap.bundle.min.js' ) }}" type="text/javascript"></script>
        <script src="{{ asset( 'js/common.js') }}" type="text/javascript"></script>
        <script src="js/@yield( 'js_file' )" type="text/javascript"></script>

    </body>
</html>

