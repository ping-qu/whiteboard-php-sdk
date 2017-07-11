<?php

/**
 * Created by PhpStorm.
 * User: yuelin
 * Date: 2017/7/11
 * Time: 下午4:02
 */
class Client
{
    public function __construct($accessKeyId, $accessKeySecret)
    {
        $this->accessKeyId = $accessKeyId;
        $this->accessKeySecret = $accessKeySecret;
    }

    public function get(){

    }


    public function create(){
        $api = 'http://yun.linyue.hznwce.com/v4_0/whiteboard/create';
        $client = new \Pingqu\MultimediaTranscoder\V1\Job($this->accessKeyId, $this->accessKeySecret,$api);
        $params = [

        ];
        $client->set_params($params);
        $respone = $client->send_request('GET');
        $body= json_decode($respone->body);
        return $body;

    }

    public function edit(){

    }


    public function destory(){

    }



}