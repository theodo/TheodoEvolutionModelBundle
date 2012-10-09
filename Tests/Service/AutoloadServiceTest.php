<?php

namespace Theodo\Evolution\LegacyModelBundle\Service;

use Theodo\Evolution\LegacyModelBundle\Service\AutoloadService;

/**
 * User: cyrillej
 * Date: 10/9/12
 * Tests the Theodo\Evolution\LegacyModelBundle\Service\AutoloadService class
 */
class AutoloadServiceTest extends \PHPUnit_Framework_TestCase
{
    public function testRegister()
    {
        $autoload_service = new AutoloadService();
        $path = '';
        $autoload_service->register($path);
    }
}
