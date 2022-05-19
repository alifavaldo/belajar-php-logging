<?php

namespace Alifavaldo\Belajar\PHP\MVC;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\GitProcessor;
use Monolog\Processor\HostnameProcessor;
use Monolog\Processor\MemoryUsageProcessor;
use PHPUnit\Framework\TestCase;

class ResetTest extends TestCase
{
    public function testReset()
    {
        $logger = new Logger(ResetTest::class);

        $logger->pushHandler(new StreamHandler("php://stderr"));
        $logger->pushProcessor(new GitProcessor());
        $logger->pushProcessor(new MemoryUsageProcessor());
        $logger->pushProcessor(new HostnameProcessor());

        for ($i = 0; $i < 1000; $i++) {
            $logger->info("Loop-$i");
            if ($i % 100 == 0) {
                $logger->reset();
            }
        }

        self::assertNotNull($logger);
    }
}
