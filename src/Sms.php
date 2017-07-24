<?php

namespace Lelite\Alidayu;

use Lelite\Alidayu\Contracts\Sms as SmsContract;
use Lelite\Alidayu\Sdk\TopClient as TopClient;
use Lelite\Alidayu\Sdk\Request\AlibabaAliqinFcSmsNumSendRequest as AlibabaAliqinFcSmsNumSendRequest;

class Sms implements SmsContract
{

  public $appkey;
  public $secretkey;

  function __construct()
  {
      $this->appkey = config('alidayu.appkey');
      $this->secretkey = config('alidayu.secretkey');
      /**
       * 定义常量开始
       */
      /**
       * SDK工作目录
       * 存放日志，TOP缓存数据
       */
      if (!defined("TOP_SDK_WORK_DIR"))
      {
      	define("TOP_SDK_WORK_DIR", storage_path());
      }

      /**
       * 是否处于开发模式
       * 在你自己电脑上开发程序的时候千万不要设为false，以免缓存造成你的代码修改了不生效
       * 部署到生产环境正式运营后，如果性能压力大，可以把此常量设定为false，
       * 能提高运行速度（对应的代价就是你下次升级程序时要清一下缓存）
       */
      if (!defined("TOP_SDK_DEV_MODE"))
      {
      	define("TOP_SDK_DEV_MODE", config('alidayu.devmode'));
      }

  }

  public function send($RecNum,$Param,$SignName,$TemplateCode,$extend='')
  {

      $client = new TopClient;
      $client ->format = "json";
      $client ->appkey = $this->appkey ;
      $client ->secretKey = $this->secretkey ;
      $request = new AlibabaAliqinFcSmsNumSendRequest;
      $request ->setExtend($extend);
      $request ->setSmsType( "normal" );
      $request ->setSmsFreeSignName($SignName);
      $request ->setSmsParam(json_encode($Param));
      $request ->setRecNum($RecNum);
      $request ->setSmsTemplateCode($TemplateCode);
      $respose = $client ->execute( $request );
      return $respose;

  }

}