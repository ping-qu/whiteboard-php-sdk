<?php
namespace Pingqu\Whiteboard\V1;
/**
 * Created by PhpStorm.
 * User: yuelin
 * Date: 2017/7/11
 * Time: 下午4:02
 */
class WhiteboardDoc
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

    public function get(){
        $client = new \Pingqu\OpenApi\Api($this->accessKeyId, $this->accessKeySecret,$this->endpoint.'/v4_0/whiteboard/doc');
        $params = [
        ];
        $client->setParams($params);
        $respone = $client->sendRequest('GET');
        $body = json_decode($respone->body);
        if($body->errorId == 'OK'){
            return ['lists'=>$body->lists,'page'=>$body->page];
        }else{
            throw new \DdvPhp\DdvFile\Exception\Sys('添加失败',$body->message);
        }
    }


    public function create($name){
        $client = new \Pingqu\OpenApi\Api($this->accessKeyId, $this->accessKeySecret,$this->endpoint.'/v4_0/whiteboard/doc');
        $params = [
            'name'=>$name
        ];
        $client->setParams($params);
        $respone = $client->sendRequest('POST');
        $body = json_decode($respone->body);
        if($body->errorId == 'OK'){
            return $body->data;
        }else{
            throw new \DdvPhp\DdvFile\Exception\Sys('添加失败',$body->message);
        }

    }



    public function destory($sid){
        $client = new \Pingqu\OpenApi\Api($this->accessKeyId, $this->accessKeySecret,$this->endpoint.'/v4_0/whiteboard/doc');
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



}