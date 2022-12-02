<script src="{{ asset( 'js/gijgo.min.js' ) }}" type="text/javascript"></script>
<script type="text/javascript">
    let currentDate = new Date( new Date().getFullYear(), new Date().getMonth(), new Date().getDate() );

    let start_date_control = $( '#start_date' );

    const dd = String( currentDate.getDate() ).padStart( 2, '0' );
    const mm = String( currentDate.getMonth() + 1 ).padStart( 2, '0' ); //January is 0!
    const yyyy = currentDate.getFullYear();

    currentDate = yyyy + '-' + mm + '-' + dd;

    start_date_control.datepicker({
        uiLibrary   : 'bootstrap4',
        format      : 'yyyy-mm-dd',
        minDate     : '-18Y',
        maxDate     : currentDate
    });

    /**
     * use the change event of start_date to set the minimum date for end date
     */
    start_date_control.on( 'change', function () {
        $( '#end_date' ).datepicker({
            uiLibrary   : 'bootstrap4',
            'format'    : 'yyyy-mm-dd',
            minDate     : $( '#start_date' ).val(),
            maxDate     : currentDate
        });
    });

</script>
