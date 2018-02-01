## 一个维护微信token的项目

有一天打开job仓库发现有5个维护微信token的job，但只是维护的微信公众号不同而已。。。
是时候做一个维护微信token的组件了。。。

## 使用方法
- php >= 7.1
- cp .env.example .env
- change .env
- composer install -vvv
- change config/common.php
- php artisan migrate
- php artisan weixin_token
- oye
