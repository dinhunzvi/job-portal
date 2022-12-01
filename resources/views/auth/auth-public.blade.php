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

        <!-- custom CSS -->
        <link rel="stylesheet" href="{{ asset( 'css/common.css' ) }}" type="text/css" />

        <title>Job Portal - @yield( 'title' )</title>

        <!-- jQuery -->
        <script src="{{ asset( 'js/jquery.min.js' ) }}"></script>
    </head>
    <body>

        <div class="container-fluid">

            <div class="row auth-box">

                <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12">

                    <div class="row">

                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras efficitur orci imperdiet,
                            imperdiet tortor eget, fermentum felis. Sed sit amet aliquam ante, ut ultrices lacus. Etiam
                            luctus dui eget felis efficitur, dapibus placerat sapien sodales. Curabitur finibus, nisl a
                            luctus gravida, nibh urna pharetra orci, non blandit odio nunc non ipsum. Etiam non
                            ullamcorper velit. Aenean ac consectetur neque, non commodo tortor. Ut tristique, purus vel
                            convallis tempor, mauris odio lobortis magna, sit amet feugiat purus orci quis velit. Proin
                            gravida dignissim diam. Quisque felis eros, tristique id tellus non, condimentum blandit
                            lacus. Nam nibh tortor, scelerisque eu elit nec, posuere rutrum magna. Nullam cursus gravida hendrerit. Sed a odio vestibulum, imperdiet urna ut, sollicitudin arcu. Aliquam sodales dapibus ligula, ac consectetur risus tempus ut. Duis sagittis nisi ac dapibus ultricies. </p>
                    </div>

                </div>

                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12">

                    @yield( 'content' )

                </div>

            </div>

        </div>

        <script src="{{ asset( 'js/bootstrap.bundle.min.js' ) }}" type="text/javascript"></script>
        <script src="{{ asset( 'js/common.js' ) }}" type="text/javascript"></script>
        <script src="js/@yield( 'js_file' )" type="text/javascript"></script>

    </body>
</html>

