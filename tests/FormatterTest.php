<?php

use Monolog\Formatter\HtmlFormatter;
use Monolog\Formatter\JsonFormatter;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\GitProcessor;
use Monolog\Processor\HostnameProcessor;
use Monolog\Processor\MemoryUsageProcessor;
use PHPUnit\Framework\TestCase;

class FormatterTest extends TestCase
{

    public function testFormatter()
    {
        $logger = new Logger(FormatterTest::class);

        $handel = new  StreamHandler("php://stderr");
        $handel->setFormatter(new HtmlFormatter());

        $logger->pushHandler($handel);

        $logger->pushProcessor(new GitProcessor());
        $logger->pushProcessor(new MemoryUsageProcessor());
        $logger->pushProcessor(new MemoryUsageProcessor());
        $logger->pushProcessor(new HostnameProcessor());

        $logger->info("Belajar PHP Logger", ["username" => "crayon"]);
        $logger->info("Belajar PHP Logger Lagi", ["username" => "crayon"]);

        self::assertNotNull($logger);
    }
}
