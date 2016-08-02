<?php

namespace App;

class Logger implements LoggerInterface
{
    protected $file;

    public function __construct()
    {
        $this->file = __DIR__ . '/../errors.log';
    }

    public function emergency($message, array $context = [])
    {
        // TODO: Implement emergency() method.
    }

    public function alert($message, array $context = [])
    {
        // TODO: Implement alert() method.
    }

    public function critical($message, array $context = [])
    {
        // TODO: Implement critical() method.
    }

    public function error($message, array $context = [])
    {
        $buffer = file_get_contents($this->file);
        $buffer .= 'Error: ' . $message . "\n" . $context[0] . "\n";
        var_dump($buffer);
        file_put_contents($this->file, $buffer);
    }

    public function warning($message, array $context = [])
    {
        // TODO: Implement warning() method.
    }

    public function notice($message, array $context = [])
    {
        // TODO: Implement notice() method.
    }

    public function info($message, array $context = [])
    {
        // TODO: Implement info() method.
    }

    public function debug($message, array $context = [])
    {
        // TODO: Implement debug() method.
    }

    public function log($level, $message, array $context = [])
    {
        // TODO: Implement log() method.
    }
}