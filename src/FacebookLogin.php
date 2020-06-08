<?php
namespace SNL;
require_once 'vendor/autoload.php';
class FacebookLogin
{
    protected $config;
    protected $client_id;
    protected $client_secret;
    Protected $redirect_url;
    public function __construct($config)
    {
        $this->config = $config;
        $this->client_id = $config['facebook']['app_id'];
        $this->client_secret = $config['facebook']['app_secret'];
        $this->redirect_url = $config['facebook']['callback'];
    }
    //Creating Url
    public function getUrl(){
        $url = 'https://www.facebook.com/v7.0/dialog/oauth?client_id='.$this->client_id.'&redirect_uri='.$this->redirect_url.'&response_type=code&scope="email,user_birthday,user_events,user_photos,user_friends,user_hometown,user_likes,user_location,user_photos,user_status,user_tagged_places,user_videos,ads_management,ads_read,read_insights,user_friends,read_page_mailboxes"';
        return $url;
    }
    //Providing Access token
    public function getAccesstoken($code){
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET','https://graph.facebook.com/v7.0/oauth/access_token?client_id='.$this->client_id.'&client_secret='.$this->client_secret.'&redirect_uri='.$this->redirect_url.'&code='.$code,[
            'header'=>[
                'Accept' => 'application/json',
                'Content-type' => 'application/json'
            ]
        ]);
        $result = json_decode($res->getBody());
        return $accessToken = $result->access_token;
    }

}