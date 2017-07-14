<?php

namespace Pingqu\Whiteboard\V1\Exception;

class Sys extends \Pingqu\Whiteboard\V1\Exception
{
  // 魔术方法
  public function __construct( $message = 'System error', $errorId = 'SYSTEM_ERROR' , $code = '500' )
  {
    parent::__construct( $message , $errorId , $code );
  }
}