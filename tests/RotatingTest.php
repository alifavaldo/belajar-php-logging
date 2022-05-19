<?php

use Monolog\Handler\RotatingFileHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use PHPUnit\Framework\TestCase;

class RotatingTest extends TestCase
{
    public function testRotating()
    {
        $logger = new Logger(RotatingTest::class);

        $logger->pushHandler(new StreamHandler("php://stderr"));
        $logger->pushHandler(new RotatingFileHandler(__DIR__ . '/../app.log', 10, Logger::INFO));

        $logger->info("Belajar PHP");
        $logger->info("Belajar PHP OOP");
        $logger->info("Belajar PHP Lagi");
        $logger->info("Belajar PHP LARAVEL");
        $logger->info("Belajar PHP MVC");
        $logger->info("Belajar PHP API");
        $logger->info("Belajar PHP DAN LAGI");

        self::assertNotNull($logger);
    }
}
