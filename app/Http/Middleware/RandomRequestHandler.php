<?php

// app/Http/Middleware/RandomRequestHandler.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RandomRequestHandler
{
    public function handle(Request $request, Closure $next)
    {
        // Ambil parameter dari URL atau gunakan kata default jika kosong
        $param = $request->route('parameter') ?? 'default';

        // Jika parameter tidak sesuai dengan yang diharapkan, kirim session dan redirect
        if ($param != 'expected_value') {
            return redirect('/')->with('warning', 'Jangan banyak tingkah.');
        }

        return $next($request);
    }
}
