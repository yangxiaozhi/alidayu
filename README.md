
## 简介

阿里大于Laravel包，用于发送短信验证码

## 安装

方法一：运行命令

    composer require lelite/alidayu

方法二：
在`composer.json`中添加`"lelite/alidayu": "^1.0"`
```
"require": {
    //...
    "lelite/alidayu": "^1.0"
}
```
然后composer更新依赖

    composer update

##  配置

在`config/app.php`中添加`Lelite\Alidayu\AlidayuServiceProvider`服务提供者

```php
'providers' => [
    // Other service providers...

    Lelite\Alidayu\AlidayuServiceProvider::class,

],
```
添加别名
```php
'aliases' => [
    //...
    'Alidayu' =>Lelite\Alidayu\Facades\Alidayu::class,
],
```
运行命令
```
php artisan vendor:publish --tag=alidayu
```
发布配置文件alidayu.php发布到项目配置目录中,并根据自己的appkey、secret、签名和模板设置
```php
<?php
    return [
      'appkey' =>env('ALIDAYU_APPKEY','12345678'),
      'secretkey'=>env('ALIDAYU_SECRETKEY','99a1234567ce455202cd1c0e65ea867k'),
      'signature' => env('ALIDAYU_SIGNATURE','阿里大于'),  // 签名
      'template' => env('ALIDAYU_TEMPLATE','SMS_11480115'),    // 模板
      'dev' =>true  //是否处于开发模式
    ];
```

## 用法
在需要发送短信的地方调用门面Alidayu的send方法，如控制器中调用
```php
public function somefun()
{
    // 根据您在阿里大于的短信模板确定传递的参数
    $prams = [
      'product'=>'《小乐教育》',
      'code'=>'168168'
    ];

    //默认用配置文件中的签名"阿里大于"和模板"SMS_11480115"
    \Alidayu::send('13800138000',$prams);

    //使用其它签名"小乐科技"和模板"SMS_78680168"
    \Alidayu::send('13800138000',$prams,'小乐科技','SMS_78680168');

}
```


## License

Lelite Alisms is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
