<?php

namespace Yuri\Slim\helper\database;

use Exception;
use Illuminate\Container\Container;
use Illuminate\Database\Capsule\Manager;
use Illuminate\Events\Dispatcher;
use Yuri\Slim\model\ApiResponse;

class DBManager extends ApiResponse
{
    public function __construct()
    {
        try {
            $manager = new Manager();
            $manager->addConnection(DB);

            $manager->setEventDispatcher(new Dispatcher(new Container()));

            $manager->setAsGlobal();
            $manager->bootEloquent();
        } catch (Exception $e) {
            $this->setCode(QUERY_STATUS['failed']);
            $this->setMessage(array(
                'line' => $e->getLine(),
                'exception' => $e->getMessage(),
                'trace' => $e->getTrace()
            ));
        }
    }
}
