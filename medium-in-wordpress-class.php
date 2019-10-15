<?php

class MediumInWp
{
    public function __construct() {
        $this->syncPostsWithMedium();
    }

    public function getAccessTokenFromWp($userId = null)
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

    public function storeAccessTokenToWp($accessToken = '', $expiresIn = null, $userId = null)
    {
        $dataToken = array(
            'access_token' => $accessToken,
            'expires_in'   => $expiresIn,
            'user_id'      => $userId
        );

        update_option(MEDIUM_IN_WP_PREFIX . 'access_token_' . $userId, serialize($dataToken));
    }

    /**
     * TODO:
     * By default Medium doesn't provide the client_id and client_id secret in the user settings page,
     * so It's necessary to send an email requesting these infos.
     * @return Boolean
     */
    public function sendEmailToMediumRequestingCredentials()
    {

    }

    /**
     * TODO:
     * Enable the sync of the wp`s posts with Medium, so whenever a posts is published in Wordpress
     * It's published on the medium user`s account
     * @return Boolean
     */
    public function syncPostsWithMedium()
    {

    }
}