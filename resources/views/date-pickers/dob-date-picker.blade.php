<script src="{{ asset( 'js/gijgo.min.js' ) }}" type="text/javascript"></script>
<script type="text/javascript">
    const currentDate = new Date();
    const upperLimit = new Date( currentDate.setFullYear( new Date().getFullYear() - 18 ) );
    const lowerLimit = new Date( currentDate.setFullYear( new Date().getFullYear() - 65 ) );

    $( '#dob' ).datepicker({
        uiLibrary   : 'bootstrap4',
        format      : 'yyyy-mm-dd',
        value       : upperLimit,
        maxDate     : upperLimit,
        minDate     : lowerLimit
    });

</script>
