<?php
/*
 * This file is part of the zyan/url2pic-sdk.
 *
 * (c) 读心印 <aa24615@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Zyan\UrlToPic\HttpClient;

use GuzzleHttp\Client;

/**
 * Class HttpClient.
 *
 * @package Zyan\UrlToPic\HttpClient
 *
 * @author 读心印 <aa24615@qq.com>
 */
class HttpClient implements HttpClientInterface
{
    /**
     * @var string
     */
    protected $baseUri = '';
    /**
     * @var array
     */
    protected $config = [];

    /**
     * client.
     *
     * @return Client
     *
     * @author 读心印 <aa24615@qq.com>
     */
    public function client()
    {
        $defaultConfig = [
            'base_uri' => $this->baseUri,
            'timeout' => 30,
            'http_errors' => false,
            'verify' => false,
            'headers' => [
                'User-Agent' => 'Mozilla/5.0 (Linux; U; Android 2.2; en-us; Nexus One Build/FRF91) AppleWebKit/533.1 (KHTML, like Gecko) Version/4.0 Mobile Safari/533.1'
            ]
        ];

        $config = $defaultConfig + $this->config;
        $client = new Client($config);
        return $client;
    }

    /**
     * get.
     *
     * @param string $url
     *
     * @return string
     *
     * @author 读心印 <aa24615@qq.com>
     */
    public function get(string $url)
    {
        $client = $this->client();
        $response = $client->get($url);
        return $response->getBody()->getContents();
    }

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
    public function post(string $url, array $data)
    {
        $client = $this->client();
        $response = $client->post($url, [
            'form_params' => $data
        ]);
        return $response->getBody()->getContents();
    }
}
