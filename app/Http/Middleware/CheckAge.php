<?php 
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAge
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah user memiliki 'age' >= 18
        if ($request->input('age') < 18) {
            return redirect('home')->with('error', 'You are not old enough!');
        }

        return $next($request); // Lolos, lanjut ke controller
    }
}
