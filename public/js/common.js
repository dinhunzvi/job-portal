    let url_params = new URLSearchParams( window.location.search );

    let user_session = 'calendar_user';

    function clear_error_messages() {
        $( '.form-group' ).removeClass( 'has-danger' ); // remove the has-danger class from all form groups
        $( '.text-danger' ).remove(); // remove the error message and error message class from all form controls
        $( '#message' ).children().remove(); // clear the error_message div
        $( '#modal_message' ).children().remove(); // clear the modal_error_message div
    }

    function display_error( display_element, error ) {
        display_element.addClass( 'has-danger' );
        display_element.append( '<div class="form-text text-danger">' + error + '</div>' );
    }

    function enable_button( button ) {

        button.prop( 'disabled', false );

    }

    function disable_button( button ) {

        button.prop( 'disabled', true );

    }

    function get_url_values () {
        let vars = {};
        let parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function( m,key,value ) {
            vars[key] = value;
        });

        return vars;

    }

    function redirect( page ) {
        window.location.href = page;
    }

    $( '#sign_out' ).click( function () {
        $( '#sign_out_modal' ).modal( 'show' );
    });

    $( '#change_password' ).click( function () {
        $( '#change_password_modal' ).modal( 'show' );
    });

    $( '#btnSignOut' ).click( function () {
        localStorage.removeItem( user_session );
        redirect( 'logout' );
    });

    $( '#change_password_form' ).submit( function () {
        clear_error_messages();

        let button = $( '#btnChangePassword' );

        disable_button( button );

        let form_data = $( this ).serializeArray();

        $.ajax({
            data        : form_data,
            dataType    : 'json',
            error       : function ( data ) {

            }, method   : 'PUT',
            success     : function () {

            }, url      : 'api/auth/change_password'
        });

        enable_button( button );

        return false;

    })
