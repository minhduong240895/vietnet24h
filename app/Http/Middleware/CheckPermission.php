<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Support\Facades\Auth;

class CheckPermission
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
        $arrInfo = $request->route()->getAction();
        $routeName = explode(".",$arrInfo['as']);
        $task = $routeName[0];
        $permission = explode("|", Auth::user()->permission);

        if(in_array($task, $permission)){
            return $next($request);
        }else{
            return redirect('home')->with('status', 'Bạn không có quyền truy cập chức năng này!');
        }
    }
}