$( function () {

    $( '#resume-details' ).on( 'submit', function () {
        clear_error_messages();

        let button = $( '#btnUpload' );

        let form_data = new FormData;

        let file_data = $( '#resume' ).prop( 'files' )[0];

        form_data.append( 'user_id', localStorage.getItem( user_session ))

        form_data.append( 'document_name', file_data );

        disable_button( button );

        $.ajax({
            cache       : false,
            contentType : false,
            data        : form_data,
            dataType    : 'json',
            enctype     : 'multipart/form-data',
            error       : function ( response ) {

                if ( response.status === 422 ) {

                    let errors = response.responseJSON.errors;

                    if ( errors.document_name ) {
                        display_error( $( 'resume_grp' ), errors.document_name[0] );
                    }

                }

            }, method   : 'POST',
            processData : false,
            success     : function () {

                $( '#message' ).append( '<div class="alert alert-success alert-dismissible fade show">' +
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span ' +
                    'aria-hidden="true">&times;</span></button>Your resume has been successfully updated!</div>' );

            }, url      : 'api/candidate-resumes'
        });

        enable_button( button );

        return false;

    });

});
