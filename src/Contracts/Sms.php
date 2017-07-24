<?php

namespace Lelite\Alidayu\Contracts;

interface Sms{

  /**
   * sms.num.send (短信验证码发送)
   * @param  string $RecNum       短信接收号码。支持单个或多个手机号码，传入号码为11位手机号码，不能加0或+86。
   *                              群发短信需传入多个号码，以英文逗号分隔，一次调用最多传入200个号码。
   * @param  array  $Param         短信模板变量，key的名字须和申请模板中的变量名一致
   * @param  string $FreeSignName 短信签名，传入的短信签名必须是在阿里大于“管理中心-验证码/短信通知/推广短信-配置短信签名”中的可用签名。
   * @param  string $TemplateCode 短信模板ID，传入的模板必须是在阿里大于“管理中心-短信模板管理”中的可用模板。示例：SMS_585014
   * @param  string $extend       可选，公共回传参数，在“消息返回”中会透传回该参数；举例：用户可以传入自己下级的会员ID，
   *                              在消息返回时，该会员ID会包含在内，用户可以根据该会员ID识别是哪位会员使用了你的应用
   * @return json                 返回值
   */
  public function send($RecNum,$Param,$SignName,$TemplateCode,$extend);

}
