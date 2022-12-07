    let url_params = new URLSearchParams( window.location.search );

    let user_session = 'user_id';

    let user_token = 'authentication_token';

    function clear_error_messages() {
        $( '.form-group' ).removeClass( 'has-danger' ); // remove the has-danger class from all form groups
        $( '.text-danger' ).remove(); // remove the error message and error message class from all form controls
        $( '#message' ).children().remove(); // clear the error_message div
        $( '#modal_message' ).children().remove(); // clear the modal_error_message div
        $( '#auth_message' ).children().remove(); // clear the auth_message div
    }

    function display_error( display_element, error ) {
        display_element.addClass( 'has-danger' );
        display_element.append( '<div class="form-text text-danger">' + error + '</div>' );
    }

    function enable_button( button ) {

        button.prop( 'disabled', false );

    }

    function disable_button( button ) {

        button.prop( 'disabled', true );

    }

    function get_url_values () {
        let vars = {};
        let parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function( m,key,value ) {
            vars[key] = value;
        });

        return vars;

    }

    function redirect( page ) {
        window.location.href = page;
    }

    $( '#sign_out' ).click( function () {
        $( '#sign_out_modal' ).modal( 'show' );
    });

    $( '#change_password' ).click( function () {
        $( '#change_password_modal' ).modal( 'show' );
    });

    $( '#btnSignOut' ).click( function () {
       $.ajax({
           dataType     : 'json',
           method       : 'GET',
           success      : function () {

               localStorage.removeItem( user_session );
               localStorage.removeItem( user_token );
               redirect( '/' );

           }, url       : 'api/auth/logout/' + localStorage.getItem( user_session )
       });

    });

    $( '#password-details' ).on( 'submit', function () {
        clear_error_messages();

        let button = $( '#btnChangePassword' );

        disable_button( button );

        let form_data = $( this ).serializeArray();

        $.ajax({
            data        : form_data,
            dataType    : 'json',
            error       : function ( response ) {

                if ( response.status === 422 ) {

                    $( 'input[type=password]' ).val( '' );
                    let errors = response.responseJSON.errors;

                    if ( errors.current ) {
                        display_error( $( '#current_grp' ), errors.current[0] );
                    }

                    if ( errors.password ) {
                        display_error( $( '#password_grp' ), errors.password[0] );
                    }

                    if ( errors.password_confirmation ) {
                        display_error( $( '#password_confirmation_grp' ), errors.password_confirmation[0] );
                    }

                }

            }, method   : 'PUT',
            success     : function () {

                $( 'input[type=password]' ).val( '' );
                $( '#auth_message' ).append( '<div class="alert alert-success alert-dismissible fade show">' +
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span ' +
                    'aria-hidden="true">&times;</span></button>You have successfully changed your password!</div>' );
                setInterval( function () {
                    $( '#change_password_modal' ).modal( 'hide' );
                    clear_error_messages();
                }, 2500 );

            }, url      : 'api/auth/change-password/' + localStorage.getItem( user_session )
        });

        enable_button( button );

        return false;

    });
