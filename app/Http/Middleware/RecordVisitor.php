<?php

namespace App\Http\Middleware;

use App\Models\Visitor;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RecordVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Retrieve visitor data
        $visitorData = [
            'ip_address' => $request->ip(),
            'user_agent' => $request->header('User-Agent'),
            'url_accessed' => $request->fullUrl(),
            'referrer' => $request->header('referer'),
            'session_id' => $request->session()->getId(),
        ];

        // Check if a similar visitor record already exists
        $exists = Visitor::where($visitorData)->exists();

        if (!$exists) {
            // Save visitor data if not exists
            Visitor::create($visitorData);
        }

        return $next($request);
    }
}
