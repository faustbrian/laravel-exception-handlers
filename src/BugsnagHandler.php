<?php

namespace BrianFaust\ExceptionHandlers;

use Exception;
use Bugsnag_Client;

abstract class BugsnagHandler extends Handler
{
    /**
     * @param Exception $e
     */
    public function report(Exception $e)
    {
        $client = new Bugsnag_Client(env('BUGSNAG_API_KEY'));

        $client->notifyException($e, null, 'error');

        return parent::report($e);
    }
}
