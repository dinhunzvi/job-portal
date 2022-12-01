$( function () {

    let button = $( '#btnSave' );

    $( '#document_upload' ).on( 'submit', function () {
        clear_error_messages();

        disable_button( button );

        let form_data = new FormData;

        form_data.append( 'user_id', localStorage.getItem( user_session ) );

        form_data.append( 'document_type', $( '#document_type' ).val() );

        let file_data = $( '#document_name' ).prop( 'files' )[0];

        form_data.append( 'document_name', file_data );

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
                        display_error( $( '#document_name_grp' ), errors.document_name[0] );
                    }

                    if ( errors.document_type ) {
                        display_error( $( '#document_type_grp' ), errors.document_type[0] );
                    }

                }

            }, method   : 'POST',
            processData : false,
            success     : function () {

                $( '#message' ).append( '<div class="alert alert-success alert-dismissible fade show">' +
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span ' +
                    'aria-hidden="true">&times;</span></button>Document successfully saved!!!</div>' );
                clear_form();

            }, url      : 'api/candidate-documents'
        });

        enable_button( button );

        return false;

    });

    function clear_form() {
        $( '#document_name' ).val( '' );
        $( '#document_type' ).val( '' );
    }

});
