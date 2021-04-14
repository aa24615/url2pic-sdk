<?php
/*
 * This file is part of the zyan/douyin.
 *
 * (c) 读心印 <aa24615@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Zyan\UrlToPic\HttpClient;

/**
 * Interface HttpClientInterface
 * @package Zyan\UrlToPic\HttpClient
 */
interface HttpClientInterface
{
    /**
     * get.
     *
     * @param string $url
     *
     * @return string
     *
     * @author 读心印 <aa24615@qq.com>
     */
    public function get(string $url);

    /**
     * post.
     *
     * @param string $url
     * @param array $data
     *
     * @return string
     *
     * @author 读心印 <aa24615@qq.com>
     */
    public function post(string $url, array $data);
}
