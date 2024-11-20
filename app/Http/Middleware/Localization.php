<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
           $language = session('language');
           if(empty($language)){
               $language = 'cn';
           }
           switch ($language) {
            case 'cn':
                $language = 'cn';
                break;
            
            default:
                $language = 'vi';
                break;
        }
        App::setLocale($language);
        
        return $next($request);
    }
}
