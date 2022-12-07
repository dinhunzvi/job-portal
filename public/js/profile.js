$( function () {

    get_profile();
    function get_profile() {
        $.ajax({
            dataType    : 'json',
            method      : 'GET',
            success     : function ( user ) {

                show_profile( user );

            }, url      : 'api/candidates/' + localStorage.getItem( user_session )
        });

    }

    function show_profile( candidate ) {
        $( '#first_name' ).val( candidate.first_name );
        $( '#last_name' ).val( candidate.last_name );
        $( '#email' ).val( candidate.email );
        $( '#id_number' ).val( candidate.id_number );
        $( '#dob' ).val( candidate.dob );
        $( 'input[name="gender"][value="' + candidate.gender + '"]' ).prop(  'checked', true )
    }

    $( '#profile-details' ).submit( function () {
        clear_error_messages();

        let button = $( '#btnUpdate' );

        disable_button( button );

        $.ajax({
            data        : $( this ).serializeArray(),
            dataType    : 'json',
            error       : function ( response ) {

                if ( response.status === 422 ) {

                    let errors = response.responseJSON.errors;

                    if ( errors.dob ) {
                        display_error( $( '#dob_grp' ), errors.dob );
                    }

                    if ( errors.email ) {
                        display_error( $( '#email_grp' ), errors.email );
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

                }

            }, method   : 'PUT',
            success     : function () {

                $( '#message' ).append( '<div class="alert alert-success alert-dismissible fade show">' +
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span ' +
                    'aria-hidden="true">&times;</span></button>Profile successfully updated!</div>' );

            }, url      : 'api/candidates/' + localStorage.getItem( user_session )
        });

        enable_button( button );

        return false;

    });

});
