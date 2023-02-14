# 顧客管理システム（サンプル）
こちらは顧客管理システムのREST APIサンプルです。Laravel、React、Docker、DDD（オニオンアーキテクチャ）、MySql、Nginxなどを用いて実装をしています。

メインのAPI実装部分は [こちらのPackagesディレクトリ](https://github.com/fumiakikobayashi/customer-management/tree/main/src/backend/app/Packages) に格納しており、ディレクトリはDomain/Infrastructure/Presentaion/UseCaseという4つの層に合わせて切っています。

## スタートガイド
※ 事前にDocker Desktop for MacやDocker Desktop for Windowsなどでご自身のPC環境にDockerのインストールは済ませておいてください

はじめにリポジトリをクローンして、対象のディレクトリに移動します
```
$ git clone https://github.com/fumiakikobayashi/customer-management.git
$ cd customer-management
```
下記コマンドを実行してください。`Makefile` に記載してあるセットアップ用のコマンドを順に実行していきます

**※ このコマンドは初回のみ実行します**
```
$ make init
```
続いて`make ps` コマンドを実行し、4つのコンテナが全て`runnning`になっていることを確認してください
```
$ make ps

NAME                 COMMAND                  SERVICE             STATUS              PORTS
customer-management-app-1   "docker-php-entrypoi…"   app                 running             9000/tcp
customer-management-db-1    "docker-entrypoint.s…"   db                  running             0.0.0.0:3306->3306/tcp
customer-management-pma-1   "/docker-entrypoint.…"   pma                 running             0.0.0.0:8080->80/tcp
customer-management-web-1   "/docker-entrypoint.…"   web                 running             0.0.0.0:80->80/tcp

```
下記URLにアクセスして、TOP画面が表示されることを確認してください

[http://localhost](http://localhost/)

また、8080のPortにアクセスして、phpmyadminが表示されることも確認してください。基本的にDBの確認や各種操作はこちらから行えます

[http://localhost:8080](http://localhost:8080)

## テストの実行
基本的には下記の名前がついたブランチにpushすると、Github Actionsが自動的にテストを行います
- feature/**
- fix/**
- bug/**  
- refact/**

pushをすると、Larastan(PHPUnit)を用いたテストの他に静的解析を行うPHPStan、コードフォーマッターのPHP Cs Fixerも自動的に実行されます

何かコードに不備があった場合やテストが通らなかった場合、PR画面下部にその旨が出力されるので、修正したのち再度pushしてください

### 補足：手動でテストを実行する方法
下記Makeコマンドを実行すると、Githubにpushをする前に手動でテストや静的解析、コードフォーマットを実行させることが可能です

#### Laravelのテストを実行
```
$ make test 
```
#### 静的解析を実行
```
$ make stan
```
#### コードフォーマッターを実行
```
　$ make cs
```
## コンテナ
### appコンテナ
- Base image
  -  [php](https://hub.docker.com/_/php):8.1-fpm-bullseye
  -  [composer](https://hub.docker.com/_/composer):2.4.4

### webコンテナ
- Base image
  - [nginx](https://hub.docker.com/_/nginx):1.22

### dbコンテナ
- Base image
  - [mysql/mysql-server](https://hub.docker.com/r/mysql/mysql-server):8.0

### pmaコンテナ
- Base image
  - [phpmyadmin/phpmyadmin](https://hub.docker.com/_/phpmyadmin):5.2.0
