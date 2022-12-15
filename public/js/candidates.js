$( function () {

    let documents_modal = $( '#candidate-documents-modal' );

    let experience_modal = $( '#work-experience-modal' );
    get_candidates();

    $( document ).on( 'click', '.fa-file', function () {
        console.log( $( this ).prop( "id" ) );
        $.ajax({
            dataType    : 'json',
            method      : 'GET',
            success     : function ( resume ) {

                window.open( '/storage/resumes/' + resume.document_name, '_blank' );

            }, url      : '../api/candidate/resume/' + $( this ).prop( "id" )
        });

    });

    $( document ).on( 'click', '.fa-file-alt', function () {
        get_work_experience( $( this ).prop( "id" ) );

        experience_modal.modal( 'show' );

    });

    $( document ).on( 'click', '.fa-file-archive', function () {

        get_candidate_documents( $( this ).prop( "id" ) );

        documents_modal.modal( 'show' );

    });

    /**
     * get all candidates
     */
    function get_candidates() {
        $.ajax({
            dataType    : 'json',
            method      : 'GET',
            success     : function ( candidates ) {

                let table = $( '#candidates' );

                table.DataTable().clear();

                table.DataTable({
                    data            : candidates,
                    destroy         : true,
                    columns         : [
                        { "title"   : "Name" },
                        { "title"   : "Email address" },
                        { "title"   : "ID Number" },
                        { "title"   : "Date of birth" },
                        { "title"   : "Gender" },
                        { "title"   : "Documents" },
                        { "title"   : "Work experience" },
                        { "title"   : "Resume" },
                    ], columns      : [
                        { "data"    : "name" },
                        { "data"    : "email" },
                        { "data"    : "id_number" },
                        { "data"    : "dob" },
                        { "data"    : "gender" },
                        {
                            mRender : function ( data, type, row ) {
                                return '<a><i class="fas fa-file-archive" data-toggle="tooltip" id="' + row.id
                                    + '" data-placement="bottom" title="View documents"></i></a>';
                            }
                        },
                        {
                            mRender : function ( data, type, row ) {
                                return '<a><i class="fas fa-file-alt" data-toggle="tooltip" id="' + row.id
                                    + '" data-placement="bottom" title="View work experience"></i></a>';
                            }
                        },
                        {
                            mRender : function ( data, type, row ) {
                                return '<a><i class="fas fa-file" data-toggle="tooltip" id="' + row.id
                                    + '" data-placement="bottom" title="View resume"></i></a>';
                            }
                        }
                    ]
                });

            }, url      : '../api/candidates'
        });

    }

    /**
     * get a candidate's documents
     * @param candidate_id
     */
    function get_candidate_documents( candidate_id ) {
        $.ajax({
            dataType    : 'json',
            method      : 'GET',
            success     : function ( documents ) {

                let table = $( '#candidate-documents' );

                table.DataTable().clear();

                table.DataTable({
                    data            : documents,
                    destroy         : true,
                    order           : [ [ 1, 'desc' ] ],
                    columns         : [
                        { "title"   : "Document type" },
                        { "title"   : "Date uploaded" }
                    ], columns      : [
                        {
                            mRender : function ( data, type, row ) {
                                return '<a href="/storage/documents/' + row.document_name + '" class="document-link">'
                                    + row.document_type + '</a>';
                            }
                        },
                        { "data"    : "date_uploaded" }
                    ]
                });

            }, url      : '../api/candidate/documents/' + candidate_id
        });

    }

    function get_work_experience( candidate_id ) {
        $.ajax({
            dataType    : 'json',
            method      : 'GET',
            success     : function ( employment_records ) {

                show_work_experience( employment_records );

            }, url      : '../api/candidate/employment-records/' + candidate_id
        });

    }

    function show_work_experience( employment_records ) {
        let element = $( '#employment-records' );

        element.children().remove();

        let employee_records = '';

        $.each( employment_records, function ( index, employment_record ) {
            employee_records += '<div class="record"><div class="row"><div class="col-6"><h4 class="company">'
                + employment_record.company_name + '</h4></div> </div><div class="row"><div class="col-xl-3"><b>'
                + 'Start date:</b></div><div class="col-xl-3">' +  employment_record.start_date + '</div><div '
                + 'class="col-xl-3"><b>End date:</b></div><div class="col-xl-3">' + employment_record.end_date
                + '</div></div></div>';
        });

        element.append( employee_records  );

    }

});
