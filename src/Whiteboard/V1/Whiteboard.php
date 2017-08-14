<?php

namespace Pingqu\Whiteboard\V1;
/**
 * Created by PhpStorm.
 * User: yuelin
 * Date: 2017/7/11
 * Time: 下午4:02
 */
class Whiteboard
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
        $client = new \Pingqu\OpenApi\Api($this->accessKeyId, $this->accessKeySecret,$this->endpoint.'/v4_0/whiteboard/create');
        $params = [
            'name'=>$name
        ];
        $client->setParams($params);
        $respone = $client->sendRequest('GET');
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
        $client = new \Pingqu\OpenApi\Api($this->accessKeyId, $this->accessKeySecret,$this->endpoint.'/v4_0/whiteboard/delete');
        $params = [
            'sid'=>$sid
        ];
        $client->setParams($params);
        $respone = $client->sendRequest('DELETE');
        $body = json_decode($respone->body);
        if($body->errorId == 'OK'){
            return $body->data;
        }else{
            throw new \DdvPhp\DdvFile\Exception\Sys('删除失败',$body->message);
        }
    }

    public function get_access_key($params){
        $client = new \Pingqu\OpenApi\Api($this->accessKeyId, $this->accessKeySecret,$this->endpoint.'/v4_0/api/whiteboard/accessKey');
        $client->setParams($params);
        $respone = $client->sendRequest('GET');
        $body = json_decode($respone->body);
        //var_dump($body);
        if($body->errorId == 'OK'){
            return $body->data;
        }else{
            throw new \DdvPhp\DdvFile\Exception\Sys('查询失败',$body->message);
        }
    }


}