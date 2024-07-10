<?php

namespace BadWordFilter\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BadWordFilter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $badWords = config('badwordfilter.bad_words');
        $content = $request->all();

        foreach ($content as $input) {
            if (is_string($input)) {
                foreach ($badWords as $badWord) {
                    if (stripos($input, $badWord) !== false) {
                        return response()->json(['message' => 'Inappropriate content detected.'], 400);
                    }
                }
            }
        }

        return $next($request);
    }
}
