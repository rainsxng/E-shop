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

    private static $content = [
        'message'=>'',
        'location'=>''
    ];
    private static $responseCode;

    public static function setContent(string $message, string $location): void
    {
        self::$content['message'] = [];
        self::$content['location'] = [];
        self::$content['message'] = $message;
        self::$content['location'] = $location;
    }

    public static function setResponseCode(int $responseCode): void
    {
        self::$responseCode = $responseCode;
    }

    public static function send(): void
    {
            http_response_code(self::$responseCode);
            echo json_encode(self::$content);
    }
}
