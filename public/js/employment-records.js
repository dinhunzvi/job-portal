$( function () {

    let button = $( '#btnSave' );

    let current_record = {};

    let delete_modal = $( '#delete_employment_record_modal' );

    let employment_record_id = 0;

    let record_form = $( '#employment-details' );

    get_records();

    $( document ).on( 'click', '.record-delete', function () {
        employment_record_id = $( this ).prop( "id" );

        delete_modal.modal( 'show' );

    });

    $( document ).on( 'click', '.record-edit', function () {
        $.ajax({
            dataType    : 'json',
            method      : 'GET',
            success     : function ( employment_record ) {

                current_record = employment_record;

                show_record( current_record );

            }, url      : 'api/employment-records/' + $( this ).attr( "id" )
        });

    });

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

    $( '#btnDeleteRecord' ).on( 'click', function () {
        clear_error_messages();
       $.ajax({
           dataType     : 'json',
           method       : 'DELETE',
           success      : function () {

               $( '#message' ).append( '<div class="alert alert-success alert-dismissible fade show">' +
                   '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span ' +
                   'aria-hidden="true">&times;</span></button>Work experience successfully deleted!</div>' );
               get_records();
               employment_record_id = 0;
               delete_modal.modal( 'hide' );

           }, url       : 'api/employment-records/' + employment_record_id
       });

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
                    'aria-hidden="true">&times;</span></button>Work experience successfully updated!!!</div>' );

            }, url      : 'api/employment-records/' + $( '#employment_record_id' ).val()
        });

    }

    function get_records() {
        $.ajax({
            dataType    : 'json',
            method      : 'GET',
            success     : function ( employment_records ) {

                show_records( employment_records );

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

    function show_records( records ) {
        let records_element = $( '#experience' );

        records_element.children().remove();

        let records_display = '';

        $.each( records, function ( index, record ) {
            records_display += '<div class="row"><div class="col-6" id="date-values">' + record.start_date + ' to '
                + record.end_date + '</div><div class="col-6"><div class=" record-icons"><a class="record-delete" id="'
                + record.id + '" href="#"><i class="fas fa-trash"></i>' + 'Delete</a><a href="#" class="record-edit" '
                + 'id="'  + record.id + '"><i class="fas fa-edit" "></i>Edit</a></div> </div></div> <div class="row">'
                + '<div class="col-6"><h3 class="record-job">' + record.position + '</h3></div></div><div class="row">'
                + '<div class="col-md-6"><h3 class="company">' + record.company_name + '</h3></div> </div><div '
                + 'class="row"><div class="col-12"><p>' + record.description + '</p></div></div><div class="row"><div '
                + 'class="col-12"><hr class="boundary-line" /></div></div>';
        });

        records_element.append( records_display );

    }

});
