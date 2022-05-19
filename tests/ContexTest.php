<?php

namespace Alifavaldo\Belajar\PHP\MVC;

use PHPUnit\Framework\TestCase;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class ContexTest extends TestCase
{
    public function testContex()
    {
        $logger = new Logger(ContexTest::class);

        $logger->pushHandler(new StreamHandler("php://stderr"));

        $logger->info("this is log user", ["username" => "avaldo"]);
        $logger->info("this is try for login", ["username" => "avaldo"]);
        $logger->info("this is success login", ["username" => "avaldo"]);

        self::assertNotNull($logger);
    }
}
