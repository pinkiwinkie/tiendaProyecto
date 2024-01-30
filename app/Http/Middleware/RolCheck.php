<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RolCheck
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
   * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
   */
  public function handle(Request $request, Closure $next, ...$roles)
  {
    if (!auth()->check())
      return redirect('login');
    if (in_array(auth()->user()->rol, $roles))
      return $next($request);
    else
      return redirect('home');
  }
}
