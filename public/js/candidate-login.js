$( function () {

    $( '#login_details' ).on( 'submit', function () {
        clear_error_messages();

        let form_data = {
            'email'     : $( '#email' ).val(),
            'password'  : $( '#password' ).val()
        };

        let button = $( '#btnLogin' );

        disable_button( button );

        $.ajax({
            data        : form_data,
            dataType    : 'json',
            error       : function ( response ) {

                $( '#password' ).val( '' );

                if ( response.status === 422 ) {

                    let errors = response.responseJSON.errors;

                    if ( errors.database ) {
                        $( '#auth_message' ).append( '<div class="alert alert-danger alert-dismissible fade show">' +
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span ' +
                            'aria-hidden="true">&times;</span></button>' + errors.database + '</div>' );
                    }

                    if ( errors.email ) {
                        display_error( $( '#email_grp' ), errors.email[0] );
                    }

                    if ( errors.password ) {
                        display_error( $( '#password_grp' ), errors.password );
                    }

                }

            }, method   : 'POST',
            success     : function ( data ) {

                $( '#auth_message' ).append( '<div class="alert alert-success alert-dismissible fade show">' +
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span ' +
                    'aria-hidden="true">&times;</span></button>You have successfully signed in!!!</div>' );
                localStorage.setItem( user_session, data.id );
                localStorage.setItem( user_token, data.token );

                setInterval( function () {
                    redirect( '/dashboard' );
                }, 2500 );

            }, url      : 'api/auth/candidate/login'
        });

        enable_button( button );

        return false;

    });

});
