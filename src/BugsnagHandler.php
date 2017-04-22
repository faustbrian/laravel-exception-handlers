<?php



declare(strict_types=1);

namespace BrianFaust\ExceptionHandlers;

use Bugsnag_Client;
use Exception;

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
