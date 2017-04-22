<?php



declare(strict_types=1);

namespace BrianFaust\ExceptionHandlers;

use Airbrake\Client;
use Airbrake\Configuration;
use Exception;

abstract class AirbrakeHandler extends Handler
{
    /**
     * @param Exception $e
     */
    public function report(Exception $e)
    {
        $config = new Configuration(env('AIRBRAKE_API_KEY'));
        $client = new Client($config);

        $client->notifyOnException($e);

        return parent::report($e);
    }
}
