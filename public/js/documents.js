$( function () {

    let button = $( '#btnSave' );

    let delete_modal = $( '#delete_document_modal' );

    let document_id = 0;

    get_documents();

    $( document ).on( 'click', '.fa-trash-alt', function () {
        document_id =  $( this ).prop( "id" );

        delete_modal.modal( 'show' );

    });

    $( '#btnDeleteDocument' ).on( 'click', function () {
        clear_error_messages();
        $.ajax({
            dataType    : 'json',
            method      : 'DELETE',
            success     : function () {

                $( '#message' ).append( '<div class="alert alert-success alert-dismissible fade show">' +
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span ' +
                    'aria-hidden="true">&times;</span></button>Document successfully deleted!!!</div>' );
                get_documents();
                document_id = 0;
                delete_modal.modal( 'hide' );

            }, url      : 'api/candidate-documents/' + document_id
        });

    });

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
                get_documents();

            }, url      : 'api/candidate-documents'
        });

        enable_button( button );

        return false;

    });

    function clear_form() {
        $( '#document_name' ).val( '' );
        $( '#document_type' ).val( '' );
    }

    function get_documents() {
        $.ajax({
            dataType    : 'json',
            method      : 'GET',
            success     : function ( documents ) {

                let table = $( '#my-documents' );

                table.DataTable().clear()

                table.DataTable({
                    data            : documents,
                    destroy         : true,
                    order           : [ [ 2, 'desc' ] ],
                    columns         : [
                        { "title"   : "Document type" },
                        { "title"   : "View" },
                        { "title"   : "Date uploaded" },
                        { "title"   : "Actions" },
                    ], columns      : [
                        { "data"    : "document_type" },
                        {
                            mRender : function ( data, type, row ) {
                                return '<a href="/storage/documents/' + row.document_name + '" class="document-link">' +
                                    'View document</a>';
                            }
                        },
                        { "data"    : "date_uploaded" },
                        {
                            mRender : function ( data, type, row ) {
                                return '<a><i class="fas fa-trash-alt" data-toggle="tooltip" title="Delete" id="'
                                    + row.id + '" data-placement="bottom"></i></a>';
                            }
                        }
                    ]
                });

            }, url      : 'api/candidate/documents/' + localStorage.getItem( user_session )
        });

    }

});
