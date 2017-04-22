<?php



declare(strict_types=1);

namespace BrianFaust\ExceptionHandlers;

use Exception;
use Raven_Client;

abstract class RavenHandler extends Handler
{
    /**
     * @param Exception $e
     */
    public function report(Exception $e)
    {
        $client = new Raven_Client(env('RAVEN_DSN'));

        $client->captureException($e);

        return parent::report($e);
    }
}
