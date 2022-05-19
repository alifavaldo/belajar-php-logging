<?php

namespace Alifavaldo\Belajar\PHP\MVC;

use PHPUnit\Framework\TestCase;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class LevelTest extends TestCase
{
    public function testLevel()
    {
        $logger = new Logger(LevelTest::class);

        $logger->pushHandler(new StreamHandler("php://stderr"));
        $logger->pushHandler(new StreamHandler(__DIR__ . '/../aplication.log'));
        $logger->pushHandler(new StreamHandler(__DIR__ . '/../error.log', Logger::ERROR));

        $logger->info("This is info");
        $logger->debug("This is debug");
        $logger->notice("This is notice");
        $logger->warning("This is warning");
        $logger->error("This is error");
        $logger->critical("This is critical");
        $logger->alert("This is alert");
        $logger->emergency("This is emergency");

        self::assertNotNull($logger);
    }
}
