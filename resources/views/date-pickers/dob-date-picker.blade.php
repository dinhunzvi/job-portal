<script src="{{ asset( 'js/gijgo.min.js' ) }}" type="text/javascript"></script>
<script type="text/javascript">
    let currentDate = new Date( new Date().getFullYear(), new Date().getMonth(), new Date().getDate() );
    const upperLimit = new Date( currentDate.setFullYear( new Date().getFullYear() - 18 ) );
    const lowerLimit = new Date( currentDate.setFullYear( new Date().getFullYear() - 65 ) );

    const dd = String( currentDate.getDate() ).padStart( 2, '0' );
    const mm = String( currentDate.getMonth() + 1 ).padStart( 2, '0' ); //January is 0!
    const yyyy = currentDate.getFullYear();

    currentDate = yyyy + '-' + mm + '-' + dd;

    $( '#dob' ).datepicker({
        uiLibrary   : 'bootstrap4',
        format      : 'yyyy-mm-dd',
        maxDate     : upperLimit,
        minDate     : lowerLimit
    });

</script>
