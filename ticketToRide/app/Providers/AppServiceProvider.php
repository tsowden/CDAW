<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */

    
    public function boot()
    {
        View::composer('partials.header', function ($view) {
            $isAuthenticated = Auth::check();
            $isInGame = false;
    
            if ($isAuthenticated) {
                $userId = Auth::id();
                $isInGame = DB::table('participation')
                    ->join('games', 'participation.game_id', '=', 'games.game_id')
                    ->where('participation.player_id', $userId)
                    ->whereIn('games.game_state', ['En cours', 'En attente'])
                    ->exists();
            }
    
            $view->with('isAuthenticated', $isAuthenticated)
                 ->with('isInGame', $isInGame);
        });
    }
    
}
