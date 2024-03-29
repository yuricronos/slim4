<?php

namespace Yuri\Slim\service;

use Exception;
use Yuri\Slim\model\DemoModelForm;
use Yuri\Slim\service\abstracts\AppService;

class DemoService extends AppService
{
    public function test(DemoModelForm $demoModelForm)
    {
        try {
            $this->message = $demoModelForm;
        } catch (Exception $e) {
            $this->code = QUERY_STATUS['failed'];
            $this->message = $e->getMessage();
        }
    }

    public function testCheckSession()
    {
        try {
            $this->message = "has session.";
        } catch (Exception $e) {
            $this->code = QUERY_STATUS['failed'];
            $this->message = $e->getMessage();
        }
    }
}
