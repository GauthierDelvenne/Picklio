<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;

class CheckMerchantMiddleware
{
    public function handle(Request $request, Closure $next)
    {

        if (empty(auth()->user())) {
            return redirect(route('auth.login'));
        }

        $account = auth()->user()->account;
        if ($account->role_id === Role::CLIENT) {
            abort(403);
        }

        return $next($request);
    }
}
