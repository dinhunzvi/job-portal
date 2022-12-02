$( document ).ready( function () {

    let button = $( '#btnRegister' );

    let checkBox = $( '#chkAccept' );

    disable_button( button );

    $( '#register-details' ).on( 'submit', function () {
        clear_error_messages();

        let form_data = new FormData;

        form_data.append( 'dob', $( '#dob' ).val() );

        form_data.append( 'email', $( '#email' ).val() );

        form_data.append( 'first_name', $( '#first_name' ).val() );

        form_data.append( 'gender', $( 'input[name="gender"]:checked' ).val() );

        form_data.append( 'id_number', $( '#id_number' ).val() );

        form_data.append( 'last_name', $( '#last_name' ).val() );

        form_data.append( 'password', $( '#password' ).val() );

        form_data.append( 'password_confirmation', $( '#password_confirmation' ).val() );

        let file_data = $( '#resume' ).prop( 'files' )[0];

        form_data.append( 'document_name', file_data );

        disable_button( button );

        $.ajax({
            cache       : false,
            contentType : false,
            data        : form_data,
            dataType    : 'json',
            encType     : 'multipart/form-data',
            error       : function ( response ) {

                if ( response.status === 422 ) {

                    let errors = response.responseJSON.errors;

                    $( 'input[type="password"]' ).val( '' );

                    if ( errors.dob ) {
                        display_error( $( '#dob_grp' ), errors.dob[0] );
                    }

                    if ( errors.document_name ) {
                        display_error( $( '#resume_grp' ), errors.document_name[0] );
                    }

                    if ( errors.email ) {
                        display_error( $( '#email_grp' ), errors.email[0] );
                    }

                    if ( errors.first_name ) {
                        display_error( $( '#first_name_grp' ), errors.first_name );
                    }

                    if ( errors.gender ) {
                        display_error( $( '#gender_grp' ), errors.gender );
                    }

                    if ( errors.id_number ) {
                        display_error( $( '#id_number_grp' ), errors.id_number );
                    }

                    if ( errors.last_name ) {
                        display_error( $( '#last_name_grp' ), errors.last_name );
                    }

                    if ( errors.password ) {
                        display_error( $( '#password_grp' ), errors.password );
                    }

                    if ( errors.password_confirmation ) {
                        display_error( $( '#password_confirmation_grp' ), errors.password_confirmation );
                    }

                }

            }, method   : 'POST',
            processData : false,
            success     : function () {

                clear_form();
                $( '#auth_message' ).append( '<div class="alert alert-success alert-dismissible fade show">' +
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span ' +
                    'aria-hidden="true">&times;</span></button>Registration successful</div>' );
                setInterval( function () {
                    redirect( 'dashboard' );
                }, 2500 );

            }, url      : 'api/auth/register'
        });

        enable_button( button );

        return false;

    });

    function clear_form() {
        $( 'input[type="password"]' ).val( '' );
        $( 'input[type="text"]' ).val( '' );
        $( 'input[type="radio"]' ).prop( 'checked', false );
    }

    checkBox.on( 'change', function () {
        if ( $( this ).is( ":checked" ) ) {
            enable_button( button );
            console.log( 'pane zviri kuitika' );
        } else {
            disable_button( button );
            console.log( 'testing this event' );
        }
    });

});

