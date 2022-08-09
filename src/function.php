<?php
/**
 * @category    CleatSquad
 * @package     CleatSquad_Logger
 * @copyright   Copyright (c) 2022 CleatSquad, Inc. (https://www.cleatsquad.com)
 */

if (!function_exists('log')) {
    /**
     * Send log to the defined file in var/log
     *
     * @param mixed $text
     * @param string $filename
     * @param int $type
     * @throws \Exception                If a missing directory is not buildable
     * @throws \InvalidArgumentException If stream is not a resource or string
     */
    function log($text, $filename = 'logger.log', $type = LoggerHandler::DEBUG): void
    {
        \CleatSquad\Logger::log($text, $filename, $type);
    }
}
