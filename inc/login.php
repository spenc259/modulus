<?php 
add_filter( 'login_url', 'redirect_login_url' );

function redirect_login_url() {
    return home_url( 'login' );
}


add_filter( 'login_redirect', 'login_redirect', 10, 3 );
function login_redirect( $redirect, $request, $user ) {

    $redirects = [
        /**
         * If there is no explicit 'redirect_to' given, each role
         * will fallback to the following ordered redirects upon
         * logging in.
         *
         * role => redirect
         */
        'administrator' => admin_url(),
        'subscriber'         => home_url( 'account' ),
        // 'vendor'        => home_url( 'vendor' ),
    ];

    foreach ( $redirects as $role => $redirect ) {
        if ($user->roles !== NULL) {
            if ( in_array( $role, $user->roles ) ) {
                return $redirect;
            }
        }
    }

    return $redirect;

}