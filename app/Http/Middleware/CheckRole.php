<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, $roles)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        if ($roles !== null) {
            $rolesArray = explode('.', $roles);

            $rolesArray = array_map('trim', $rolesArray);
            $rolesArray = array_map('intval', $rolesArray);

            if (!in_array((int)$user->role_id, $rolesArray)) {
                abort(403, 'Acesso negado.' . $roles);
            }
        }

        return $next($request);
    }
}
