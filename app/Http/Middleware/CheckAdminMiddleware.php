<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;

class CheckAdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {

        if (empty(auth()->user())) {
            return redirect(route('auth.login'));
        }

        $account = auth()->user()->account;
        if ($account->role_id != Role::ADMIN && $account->role_id != Role::WAREHOUSE) {
            abort(403);
        }

        return $next($request);
    }
}
