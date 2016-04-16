daocloud-plus-notifier
==============

[![Build Status](https://api.travis-ci.org/lijy91/daocloud-plus-notifier.svg?branch=master)](https://travis-ci.org/lijy91/daocloud-plus-notifier)

## 文档
- [PSR-2 Coding Style Guide](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md)

## 依赖
- [PHP >= 5.5.9](http://php.net/)
- [Laravel >= 5.2](http://laravel.com/)
- [MySQL >= 5.6](https://www.mysql.com/)

## 快速开始

克隆项目源码到本地
```
$ cd ~/Documents/Projects
$ git clone https://github.com/lijy91/daocloud-plus-notifier.git
$ cd daocloud-plus-notifier
```

使用 [Composer](https://getcomposer.org/) 安装依赖库
```
$ composer install
```

创建一个新的 Key
```
php artisan key:generate
```

创建 `.env` 文件
```
$ cp .env.example .env
```

修改根目录 `.env` 配置，增加云巴相关配置
```
YUNBA_APPKEY=<Your AppKey>
YUNBA_SECRET_KEY=<Your Secret Key>
```

执行数据库迁移
```
$ composer dump-autoload
$ php artisan migrate
```

运行
```
$ php artisan serve
$ open http://localhost:8000
```
或
```
$ npm start
```

## 项目使用的开源库
- [Guzzle](https://github.com/guzzle/guzzle)

## License

    Copyright (C) 2016 JianyingLi <lijy91@foxmail.com>

    Licensed under the Apache License, Version 2.0 (the "License");
    you may not use this file except in compliance with the License.
    You may obtain a copy of the License at

        http://www.apache.org/licenses/LICENSE-2.0

    Unless required by applicable law or agreed to in writing, software
    distributed under the License is distributed on an "AS IS" BASIS,
    WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
    See the License for the specific language governing permissions and
    limitations under the License.
