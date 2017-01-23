# dh2y-framework
dh2y一个个人使用的轻量级php框架

##一、开发基础说明
* 框架集成了TP习惯和YII2的部分书写习惯。

* 数据库使用第三方medoo扩展；vendor/catfan

* 错误日志使用whoops扩展； vendor/filp

* 调试工具使用var-dumper；vendor/symdony

* 模版引擎使用twig；vendor/twig

* 采集类模块QueryList ；vendor/jaeger，项目地址：http://git.oschina.net/jae/QueryList

##二、使用
```php
git clone https://github.com/cinaofdai/dh2y-framework.git

cd dh2y-framework

composer install
```

##三、目录结构说明
-------------------

```
app
    config/              配置
    controller/          控制器
    model/               模型
    modules/             子模块
        admin/
            controller/
            model/
            view/
    runtime/             框架运行缓存
    view/                主模块视图
core
    common/              定义的公共方法
    config/              配置文件夹
    lib/                 核心库文件
        drive/           驱动文件夹
        resource/        资源文件夹
    util/                工具文件类夹
        dh2y/            系统工具类
vendor
     carfan/             第三方数据库扩展medoo
     filp/               第三方错误输出扩展whoops
     symfony/            第三方调试工具扩展var-dumper
     twig/               第三方模板引擎扩展twig
```

##三、提交问题bug
bug反馈：https://github.com/cinaofdai/dh2y-framework/issues/new



