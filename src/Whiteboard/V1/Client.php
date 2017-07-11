<?php

/**
 * Created by PhpStorm.
 * User: yuelin
 * Date: 2017/7/11
 * Time: 下午4:02
 */
class Client
{
    public function __construct($accessKeyId, $accessKeySecret, $endpoint)
    {
        $this->accessKeyId = $accessKeyId;
        $this->accessKeySecret = $accessKeySecret;
        $this->endpoint = empty($endpoint)?'http://yun.linyue.hznwce.com':$endpoint;
    }
    public function setEndpoint($endpoint=null){
        $this->endpoint = empty($endpoint)?$this->endpoint:$endpoint;
    }
    public function setAccessKeySecret($accessKeySecret=null){
        $this->accessKeySecret = empty($accessKeySecret)?$this->accessKeySecret:$accessKeySecret;
    }




    public function create($name){
        $client = new \Pingqu\OpenApi\Api($this->accessKeyId, $this->accessKeySecret,'/v4_0/whiteboard/create');
        $params = [
            'name'=>$name
        ];
        $client->set_params($params);
        $respone = $client->send_request('GET');
        $body = json_decode($respone->body);
        if($body->errorId == 'OK'){
            return $body->data;
        }else{
            throw new \DdvPhp\DdvFile\Exception\Sys('添加失败',$body->message);
        }

    }

    public function pause(){

    }


    public function destory($sid){
        $client = new \Pingqu\OpenApi\Api($this->accessKeyId, $this->accessKeySecret,'/v4_0/whiteboard/delete');
        $params = [
            'sid'=>$sid
        ];
        $client->set_params($params);
        $respone = $client->send_request('DELETE');
        $body = json_decode($respone->body);
        if($body->errorId == 'OK'){
            return $body->data;
        }else{
            throw new \DdvPhp\DdvFile\Exception\Sys('删除失败',$body->message);
        }
    }



}