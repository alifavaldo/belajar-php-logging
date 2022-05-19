<?php

namespace Alifavaldo\Belajar\PHP\MVC;

use PHPUnit\Framework\TestCase;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class LoggingTest extends TestCase
{
    public function testLogging()
    {

        $logger = new Logger(LoggerTest::class);

        $logger->pushHandler(new StreamHandler("php://stderr"));
        $logger->pushHandler(new StreamHandler(__DIR__ . "/../aplication.log"));

        $logger->info("Belajar Pemrograman PHP Logging");
        $logger->info("Selamat Datang Di website TK Mekar Bunga");
        $logger->info("Ini Adalah Logging");

        self::assertNotNull($logger);
    }
}
