<?php

namespace Mailscout;

class Mailscout
{
    /**
     * Mailscout api version number.
     *
     * @var string
     */
    private static $apiVersion = 'v1';

    /**
     * Mailscout api base url.
     *
     * @var string
     */
    private static $apiBaseUrl = 'http://localhost:8000/api/v1/';

    /**
     * Api access key.
     *
     * @var string
     */
    private static $apiKey;

    /**
     * Mailscout SDK version number.
     *
     * @var string
     */
    private static $sdkVersion = '0.0.0';

    /**
     * Set api access key.
     *
     * @param string $key
     */
    public static function setApiKey($key)
    {
        self::$apiKey = $key;
    }

    /**
     * Get api access key.
     *
     * @return string
     */
    public static function getApiKey()
    {
        return self::$apiKey;
    }

    /**
     * Get api base url.
     *
     * @return string
     */
    public static function getApiBaseUrl()
    {
        return self::$apiBaseUrl;
    }

    /**
     * Set api base url.
     *
     * @param string $url
     *
     * @return string
     */
    public static function setApiBaseUrl($url)
    {
        static::$apiBaseUrl = $url;
    }

    /**
     * Get api version number.
     *
     * @return string
     */
    public static function getApiVersion()
    {
        return self::$apiVersion;
    }
}