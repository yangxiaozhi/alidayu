<?php

/**
*--------------------------------------------------------------------------
* Lelite Alidayu
* 在开发时请设开发模式(dev)为 true，以免缓存造成你的代码修改了不生效
* 部署到生产环境正式运营后，如果性能压力大，可以把此常量设定为false，
* 能提高运行速度（对应的代价就是你下次升级程序时要清一下缓存）
*--------------------------------------------------------------------------
*/
return [

  'appkey' =>env('ALIDAYU_APPKEY',null),
  'secretkey'=>env('ALIDAYU_SECRETKEY',null),
  'signature' => env('ALIDAYU_SIGNATURE',null),  // 签名
  'template' => env('ALIDAYU_TEMPLATE','SMS_71590145'),    // 模板
  'dev' =>true  //是否处于开发模式

];
