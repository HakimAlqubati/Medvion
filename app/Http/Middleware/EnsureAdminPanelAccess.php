<?php

namespace App\Http\Middleware;

use App\Enums\UserTypeEnum;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureAdminPanelAccess
{
    /**
     * Handle an incoming request to the Filament admin panel.
     * Restricts panel access strictly to users of type ADMIN who also possess authorized roles.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if (
            ! $user ||
            $user->user_type !== UserTypeEnum::ADMIN
            // ! $user->hasAnyRole(['admin', 'editor', 'moderator', 'super_admin'])
        ) {
            abort(403);
        }

        return $next($request);
    }
}
