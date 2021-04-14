

# zyan/url2pic-sdk

url2pic SDK

这是一个在线网页转图片服务。

无需安装任何软件,轻松将一个网站URL保存为图片

官网:  [http://url2pic.php127.com](http://url2pic.php127.com)


- [x] 单页接口
- [x] 批量接口
- [x] 获取结果

## 要求

1. php >= 7.3
2. Composer

## 安装

```shell
composer require zyan/url2pic-sdk -vvv
```
## 用法

```php
use Zyan\UrlToPic\UrlToPic;

$key = '通信密钥';

$app = new UrlToPic($key);
```

### 单页接口


```php
$app->url2pic('http://www.baidu.com');

//code
//$app->url2pic(string $url, string $type = 'jpg', int $width = 1440, int $timeout = 30)
```

response

```php
Array
(
    [code] => 1
    [msg] => ok
    [data] => Array
        (
            [download_link] => http://url2pic.php127.com/uploads/pic/2021-04-14/pic60765e8c046c4febb7b22335b326cd5bc40b8c80a5042_1440.jpg
        )

)
```


### 批量接口

```php
$urls = [
    'http://www.php127.com',
    'http://www.baidu.com'
];
$app->batch($urls);

//code
//$app->batch(array $urls, string $type = 'jpg', int $width = 1440);
```

response

```php
Array
(
    [code] => 1
    [msg] => ok
    [data] => Array
        (
            [taskid] => task60765e924b755202104140316346
        )

)
```



### 查询结果

```php
$app->status('taskxxxxxx');
```
response

```php
Array
(
    [code] => 1
    [msg] => ok
    [data] => Array
        (
            [count] => 2
            [status] => 1
            [list] => Array
                (
                    [0] => Array
                        (
                            [url] => http://www.php127.com/
                            [state] => 1
                            [download_link] => http://url2pic.php127.com/uploads/pic/2021-04-14/pic60765c9caa717a0ed430033638fefe3a07be15d6e9eac_1440.jpg
                        )

                    [1] => Array
                        (
                            [url] => http://www.baidu.com
                            [state] => 1
                            [download_link] => http://url2pic.php127.com/uploads/pic/2021-04-14/pic60765ca1bc6d7f9cd904c266e7f7ff4d63deb9ef6adce_1440.jpg
                        )

                )

        )

)
```


## 参与贡献

1. fork 当前库到你的名下
2. 在你的本地修改完成审阅过后提交到你的仓库
3. 提交 PR 并描述你的修改，等待合并
## License

[MIT license](https://opensource.org/licenses/MIT)
