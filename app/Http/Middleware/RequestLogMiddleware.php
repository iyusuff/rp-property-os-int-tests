<?php
/**
 * Created by PhpStorm.
 * User: hramteke
 * Date: 6/8/16
 * Time: 11:26 AM
 */

namespace App\Http\Middleware;

use Log;
use Closure;
use Illuminate\Http\Request;

class RequestLogMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        Log::info("Request Logged\n" . sprintf("\\n%s ", (string) $request));
        return $next($request);
    }
}
