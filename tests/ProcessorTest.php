<?php

namespace Alifavaldo\Belajar\PHP\MVC;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\GitProcessor;
use Monolog\Processor\HostnameProcessor;
use Monolog\Processor\MemoryUsageProcessor;
use PHPUnit\Framework\TestCase;

class ProcessorTest extends TestCase
{
    public function testProcessor()
    {
        $logger = new Logger(ProcessorTest::class);
        $logger->pushHandler(new StreamHandler("php://stderr"));
        $logger->pushProcessor(new GitProcessor());
        $logger->pushProcessor(new MemoryUsageProcessor());
        $logger->pushProcessor(new HostnameProcessor());
        $logger->pushProcessor(function ($record) {
            $record["extra"]["edo"] = [
                "author" => "Alif Avaldo",
                "app" => "Belajar PHP Logging"
            ];

            return $record;
        });

        $logger->info("this is processor", ["username" => "crayon"]);
        $logger->info("this is processor");
        $logger->info("this is processor");

        self::assertNotNull($logger);
    }
}
