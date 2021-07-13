<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Googleplus {
	
	public function __construct() {
		
		$CI =& get_instance();
		$CI->config->load('googleplus');
		
		require APPPATH .'third_party/google-api/Google_Client.php';
		require APPPATH .'third_party/google-api/contrib/Google_Oauth2Service.php';
		
		$this->client = new Google_Client;
		$this->client->setApplicationName('Sipermen');
		$this->client->setClientId('203342430391-cuneblbt0110fjrtbe1brpmups7ogs7u.apps.googleusercontent.com');
		$this->client->setClientSecret('byMGg7Lpa-fSdJWhDR2R0nlq');
		$this->client->setRedirectUri('http://localhost/JSS/sipermen/welcome/callback');
		$this->client->setAccessType('offline');
		// Using "consent" ensures that your application always receives a refresh token.
		// If you are not using offline access, you can omit this.
		// $this->client->setApprovalPrompt("consent");
		// $this->client->setIncludeGrantedScopes(true);

		$this->oauth2 = new  Google_Oauth2Service($this->client);

	}
	
	public function loginURL() {
        return $this->client->createAuthUrl();
    }
	
	public function getAuthenticate($code) {
        return $this->client->authenticate($code);
    }
	
	public function getAccessToken() {
        return $this->client->getAccessToken();
    }
	
	public function setAccessToken($token) {
        return $this->client->setAccessToken($token);
    }
	
	public function revokeToken() {
        return $this->client->revokeToken();
    }
	
	public function getUserInfo() {
        return $this->oauth2->userinfo->get();
    }
	
}
?>