<?php

/*
 * This file is part of the zyan/url2pic-sdk.
 *
 * (c) 读心印 <aa24615@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Zyan\UrlToPic;

use Zyan\UrlToPic\HttpClient\HttpClient;

/**
 * Class UrlToPic.
 *
 * @package Zyan\UrlToPic
 *
 * @author 读心印 <aa24615@qq.com>
 */
class UrlToPic extends HttpClient
{
    /**
     * @var string
     */
    protected $baseUri = 'http://url2pic.php127.com/api/';

    /**
     * @var string
     */

    protected $key = null;

    /**
     * Url2Pic constructor.
     * @param string $key
     */
    public function __construct(string $key)
    {
        $this->key = $key;
    }


    /**
     * response.
     *
     * @param string $data
     *
     * @return array
     *
     * @author 读心印 <aa24615@qq.com>
     */

    private function response($data)
    {
        return json_decode($data, true);
    }


    /**
     * 单页接口.
     *
     * @param string $url
     * @param string $type
     * @param int $width
     * @param int $timeout
     *
     * @return array
     *
     * @author 读心印 <aa24615@qq.com>
     */
    public function url2pic(string $url, string $type = 'jpg', int $width = 1440, int $timeout = 30)
    {
        $data = [
            'url' => $url,
            'type' => $type,
            'width' => $width,
            'timeout' => $timeout,
            'key' => $this->key
        ];
        $contents = $this->post('url2pic', $data);

        return $this->response($contents);
    }


    /**
     * 批量接口.
     *
     * @param array $urls
     * @param string $type
     * @param int $width
     *
     * @return array
     *
     * @author 读心印 <aa24615@qq.com>
     */
    public function batch(array $urls, string $type = 'jpg', int $width = 1440)
    {
        $data = [
            'urls' => $urls,
            'type' => $type,
            'width' => $width,
            'key' => $this->key
        ];
        $contents = $this->post('url2pic/batch', $data);

        return $this->response($contents);
    }

    /**
     * 查询结果.
     *
     * @param string $taskid
     *
     * @return array
     *
     * @author 读心印 <aa24615@qq.com>
     */
    public function status(string $taskid)
    {
        $data = [
            'taskid' => $taskid,
            'key' => $this->key
        ];
        $contents = $this->post('url2pic/status', $data);
        return $this->response($contents);
    }
}
