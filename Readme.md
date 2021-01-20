# Readme





## 项目介绍

这是一个满足⾼可⽤、⼀致性和⾼性能的秒杀系统。

- Seckill_Management_System文件夹是后台管理系统代码
- seckill-demo是秒杀系统代码
- seckill.sql是数据库文件





## 开发工具及开发环境

### 开发工具

* IntelliJ IDEA 2020.3
* PhpStorm   2020.3

### 开发环境

|  JDK   |  SpringBoot   | Maven | Mysql  | Redis | RabbitMQ | Jmeter | MybatisPlus |
| :----: | :-----------: | :---: | :----: | :---: | :------: | :----: | :---------: |
| 15.0.1 | 2.4.1 RELEASE | 3.2.2 | 8.0.22 | 5.0.5 |  3.8.9   |  5.4   |    3.4.2    |

|   PHP    | Apache |
| :------: | :----: |
| PHP7.3.8 | 2.4.41 |





## 项目启动说明

* 请配置对应版本的开发环境

* 环境配置完成后，请修改 seckill-demo/src/main/resources/application.yml 中相关的 redis, mysql, rabbitMQ地址及相关信息

* 将 seckill.sql数据库文件导入mysql中

* 将Seckill_Management_System文件夹移动到 apache 目录下

* 启动项目前，先启动 apache 服务、redis server服务、rabbitmq 服务、mysql服务等

* 秒杀系统登录地址：`http://localhost:8080/login/toLogin`，默认用户为 `18012345678`，密码为`sspku2020.`（若配置不同，ip、端口等需要调整）

* 秒杀系统管理员平台登陆地址：`http://localhost:63343/Seckill_Management_System/background_login.html`，默认用户`admin1 `，默认密码为`sspku2020.`（若配置不同，ip、端口等需要调整）

  

