<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\traits\ApiTrait;
use Illuminate\Support\Facades\App;

class Laguage
{
    use ApiTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $language = $request->header('Accept-Language');
        if(is_null($language)){
            return $this->ErrorMessage([], 'Missed key language', 422);
        }
        $allowedLanguages = ['en', 'ar'];
        if(! in_array($language, $allowedLanguages)){
            return $this->ErrorMessage(['lang'=>'supported languages are: ' . implode(", ",$allowedLanguages)], 'Not supported this language', 422);
        }
        //change language app now
        App::setlocale($language);

        return $next($request);
    }
}
