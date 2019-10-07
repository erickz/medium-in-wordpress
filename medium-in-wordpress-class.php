<?php

class MediumInWp
{
    public function __construct() {

    }

    /**
     * Access the access token from the given user.
     * If no user is set, then It retrieves the token from logged user
     *
     * @param Int $userId
     * @return String
     */
    public function getAccessToken($userId = null)
    {
        $token = get_option( MEDIUM_IN_WP_PREFIX . 'access_token_' . $userId);

        if (! $token) {
            return false;
        }

        $dataToken = unserialize($token);

        if (! isset($dataToken['access_token'])){
            return false;
        }

        return $dataToken['access_token'];
    }

    /**
     * Store the access token into the `wp_option` table
     *
     * @param String $accessToken
     * @param String $expiresIn
     * @param Int $userId
     */
    public function storeAccessToken($accessToken = '', $expiresIn = null, $userId = null)
    {
        $dataToken = array(
            'access_token' => $accessToken,
            'expires_in'   => $expiresIn,
            'user_id'      => $userId
        );

        update_option(MEDIUM_IN_WP_PREFIX . 'access_token_' . $userId, serialize($dataToken));
    }
}