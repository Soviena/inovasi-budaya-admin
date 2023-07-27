<?php

namespace App\Http\Middleware;

use App\Models\Feedback;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class CheckUnreadItems
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // Fetch unread items from the database
        $unreadItems = Feedback::where('status', 'unread')->get();

        // Save the unread items to the session
        Session::put('unreadFeedbacks', count($unreadItems));

        return $next($request);
    }
}
