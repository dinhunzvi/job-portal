$( function () {

    let button = $( '#btnSave' );

    let record_form = $( '#employment-details' );

    let current_record = {};

    get_records();

    record_form.on( 'submit', function () {
       clear_error_messages();

       disable_button( button );

       if ( $( '#employment_record_id' ).val() === "" ) {
           add_record();
       } else {
           edit_record();
       }

       enable_button( button );

       return false;

    });

    function add_record() {
        let form_data = {
            'user_id'       : localStorage.getItem( user_session ),
            'company_name'  : $( '#company_name' ).val(),
            'start_date'    : $( '#start_date' ).val(),
            'end_date'      : $( '#end_date' ).val(),
            'position'      : $( '#position' ).val(),
            'description'   : $( '#description' ).val()
        };

        $.ajax({
            data        : form_data,
            dataType    : 'json',
            error       : function ( response ) {

                if ( response.status === 422 ) {

                    let errors = response.responseJSON.errors;

                    if ( errors.company_name ) {
                        display_error( $( '#company_name_grp' ), errors.company_name );
                    }

                    if ( errors.description ) {
                        display_error( $( '#description_grp' ), errors.description );
                    }

                    if ( errors.end_date ) {
                        display_error( $( '#end_date_grp' ), errors.end_date[0] );
                    }

                    if ( errors.position ) {
                        display_error( $( '#position_grp' ), errors.position );
                    }

                    if ( errors.start_date ) {
                        display_error( $( '#start_date_grp' ), errors.start_date[0] );
                    }

                }

            }, method   : 'POST',
            success     : function () {

                $( '#message' ).append( '<div class="alert alert-success alert-dismissible fade show">' +
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span ' +
                    'aria-hidden="true">&times;</span></button>Work experience successfully saved!!!</div>' );
                current_record = {};
                show_record( current_record );
                get_records();

            }, url      : 'api/employment-records'
        });

    }

    function edit_record() {
        let form_data = record_form.serializeArray();

        $.ajax({
            data        : form_data,
            dataType    : 'json',
            error       : function ( data ) {

                if ( data.status === 422 ) {

                    let response = $.parseJSON( data.responseText );

                    let errors = response.errors;

                    if ( errors.company_name ) {
                        display_error( $( '#company_name_grp' ), errors.company_name );
                    }

                    if ( errors.description ) {
                        display_error( $( '#description_grp' ), errors.description );
                    }

                    if ( errors.end_date ) {
                        display_error( $( '#end_date_grp' ), errors.end_date[0] );
                    }

                    if ( errors.position ) {
                        display_error( $( '#position_grp' ), errors.position );
                    }

                    if ( errors.start_date ) {
                        display_error( $( '#start_date_grp' ), errors.start_date[0] );
                    }

                }

            }, method   : 'PUT',
            success     : function () {

                get_records();
                current_record = {};
                show_record( current_record );
                $( '#message' ).append( '<div class="alert alert-success alert-dismissible fade show">' +
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span ' +
                    'aria-hidden="true">&times;</span></button>Work experience successfully saved!!!</div>' );

            }, url      : 'api/employment-records/' + $( '#employment_record_id' ).val()
        });

    }

    function get_records() {
        $.ajax({
            dataType    : 'json',
            method      : 'GET',
            success     : function ( employment_records ) {



            }, url      : 'api/candidate/employment-records/' + localStorage.getItem( user_session )
        });

    }

    function show_record( record ) {
        if ( $.isEmptyObject( record ) ) {
            $( '#employment_record_id' ).val( '' );
            $( '#company_name' ).val( '' );
            $( '#start_date' ).val( '' );
            $( '#end_date' ).val( '' );
            $( '#position' ).val( '' );
            $( '#description' ).val( '' );
        } else {
            $( '#employment_record_id' ).val( record.id );
            $( '#company_name' ).val( record.company_name );
            $( '#start_date' ).val( record.start_date );
            $( '#end_date' ).val( record.end_date );
            $( '#position' ).val( record.position );
            $( '#description' ).val( record.description );
        }
    }

});
