<?php
/**
 * Created by PhpStorm.
 * User: brian
 * Date: 27.01.2019
 * Time: 12:01
 */

namespace Core;

class Response
{
    /**
     * @var array $content Content that will be send in header
     */
    private static $content = [
        'message'=>'',
        'location'=>''
    ];
    /**
     * @var $responseCode
     */
    private static $responseCode;

    /**
     * Set content
     * @param string $message
     * @param string $location
     */
    public static function setContent(string $message, string $location): void
    {
        self::$content = [];
        self::$content['message'] = $message;
        self::$content['location'] = $location;
    }

    /**
     * Set response code
     * @param int $responseCode
     */
    public static function setResponseCode(int $responseCode): void
    {
        self::$responseCode = $responseCode;
    }

    /**
     * Send headers to browser
     */
    public static function send(): void
    {
            http_response_code(self::$responseCode);
            echo json_encode(self::$content);
    }
}
