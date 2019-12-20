<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Post;

class CheckAuth
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
          $post = Post::findOrFail($request->id);

          if (auth::user()->id == $post->user_id){
            return $next($request);
          }else{
            return response("Nice try ");
          }
    }
}
