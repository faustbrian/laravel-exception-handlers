<?php

declare(strict_types=1);

/*
 * This file is part of Laravel Exception Handlers.
 *
 * (c) Brian Faust <hello@basecode.sh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Artisanry\ExceptionHandlers;

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
