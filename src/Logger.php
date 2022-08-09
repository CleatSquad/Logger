<?php
/**
 * @category    CleatSquad
 * @package     CleatSquad_Logger
 * @copyright   Copyright (c) 2022 CleatSquad, Inc. (https://www.cleatsquad.com)
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
     * @param string $filename
     * @param int $type
     * @return LoggerHandler
     * @throws \Exception                If a missing directory is not buildable
     * @throws \InvalidArgumentException If stream is not a resource or string
     */
    private static function prepareLog(string $filename, int $type = LoggerHandler::DEBUG)
    {
        $logger = new LoggerHandler('logger');
        $logger->pushHandler(new StreamHandler(BP . sprintf('/var/log/%s', $filename), $type));
        return $logger;
    }

    /**
     * Send log to the defined file in var/log
     *
     * @param mixed $text
     * @param string $filename
     * @param int $type
     * @throws \Exception                If a missing directory is not buildable
     * @throws \InvalidArgumentException If stream is not a resource or string
     */
    public static function log($text, string $filename = 'logger.log', int $type = LoggerHandler::DEBUG)
    {
        if ($text) {
            if (is_object($text) && method_exists($text, '__toString')) {
                $text = $text->__toString();
            }
            if (is_array($text) || is_object($text)) {
                $text = var_export($text, true);
            }

            $logger = self::prepareLog($filename, $type);
            $logger->log($type, $text);
        }
    }

    /**
     * Send log to the defined file in var/log defined type
     *
     * @param string $name
     * @param array $arguments
     * @throws \Exception                If a missing directory is not buildable
     * @throws \InvalidArgumentException If stream is not a resource or string
     */
    public static function __callStatic(string $name, array $arguments)
    {
        if (isset($arguments[0])) {
            if (is_object($arguments[0]) && method_exists($arguments[0], '__toString')) {
                $arguments[0] = $arguments[0]->__toString();
            }
            if (is_array($arguments[0]) || is_object($arguments[0])) {
                $arguments[0] = print_r($arguments[0], true);
            }

            if (!isset($arguments[1])) {
                $arguments[1] = 'logger.log';
            }
            $logger = self::prepareLog($arguments[1]);
            $logger->$name($arguments[0]);
        }
    }
}
