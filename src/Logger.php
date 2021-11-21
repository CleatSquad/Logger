<?php
/**
 * @category    CleatSquad
 * @package     CleatSquad_Logger
 * @copyright   Copyright (c) 2021 CleatSquad, Inc. (https://www.cleatsquad.com)
 */
declare(strict_types=1);

namespace CleatSquad;

use Monolog\Logger as LoggerHandler;
use Monolog\Handler\StreamHandler;

/**
 * Class Logger
 * @package CleatSquad\Logger
 */
class Logger
{
    /**
     * Send log to the defined file in var/log
     *
     * @param mixed $text
     * @param string $filename
     * @param int $type
     * @throws \Exception                If a missing directory is not buildable
     * @throws \InvalidArgumentException If stream is not a resource or string
     */
    public static function log($text, $filename = 'logger.log', $type = LoggerHandler::DEBUG)
    {
        if (is_array($text)) {
            $text = print_r($text, true);
        }
        $logger = new LoggerHandler('logger');
        $logger->pushHandler(new StreamHandler(BP . sprintf('/var/log/%s', $filename), $type));
        $logger->log($type, $text);
    }
}
