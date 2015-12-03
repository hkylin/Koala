# 树袋熊
## 介绍
树袋熊是一个类似微博的消息发布小应用，包含了登陆、注册、发布消息、上传图片、编辑或删除已发布信息、修改个人资料等功能。

![主页](/Applications/MAMP/htdocs/public/static/images/README/home.png)

## 安装
应用是使用 `php & mysql & Apache` 搭建的。如果正好你使用 php 进行开发工作，或者已经搭建好了了 php 的开发环境，那么你可以直接将这个应用 clone 到本地，替换掉原本的 `htdocs` 文件进行访问。

#### 快速搭建
Windows 用户可以直接下载 [wamp](http://www.wampserver.com/en/) 或者 [xampp](https://www.apachefriends.org/zh_cn/index.html)
Mac 可以下载 [MAMP](https://www.mamp.info/en/)

克隆下我们的整个程序

```
git clone git@github.com:musicq/Koala.git
```

然后使用这个程序替换网站根路径的 `htdocs`

运行 mysql 数据库，运行 `_sql/secret.sql` 这个文件，生成网站要用的数据库。

```
mysql -h hostname -P port -u root -p < path/to/secret.sql
```

准备就须，可以打开浏览器查看运行成果了。

## 开发
如果你具备一些 php 和前端开发的知识就可以自己动手对网站进行开发和升级了。

#### 前端开发
网站的前端文件全部放在 `public` 目录下。

[`smarty`](http://www.smarty.net/) 作为开发模板。模板文件放在 `public/tpl` 下面
[`requirejs`](http://requirejs.org/) 作为 `javascript` 脚本的标准。js 文件放在 `public/static/scripts` 下面
[`sass`](http://sass-lang.com/) 作为 `css` 预处理工具，这里推荐使用 [`Compass`](http://compass-style.org/) 来处理 `sass` 文件（[这里有 compass 的详细安装说明](http://compass-style.org/install/)）。安装成功后，进入 `public/static/sass` 目录，运行

```
compass watch   # 对 sass 文件进行监视，一但修改便会立刻编译出 css 文件
```

#### 后端开发
**视图文件**
网站的视图文件全部在网站的根目录下

```
_sql
includes/gestbook
manage
public
.gitignore
.htaccess
404.php --400
500.php --500
Gruntfile.js
app.php
detail.php --详情页
favicon.ico
images_handles.php
index.php --主页
login.php --登陆页
profile.php --个人信息
register.php --注册页
search_result.php --搜索页
```
通过 `smarty` 指定的路径，渲染 `public/tpl` 下对应的模板文件

**api 接口**
网站使用到的全部 `api` 接口，都在 `manage/api` 目录下。方便管理

**功能文件**
网站后端使用到的所有功能都分块存放在 `manage/app` 目录下

**配置文件**
网站的配置文件例如常量，模板配置等，都存放在 `includes` 目录下



## TODO
- 添加评论系统
- 添加分页功能

