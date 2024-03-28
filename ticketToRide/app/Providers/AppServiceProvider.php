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
             $currentGameId = null; // Ajoutez cette ligne
     
             if ($isAuthenticated) {
                 $userId = Auth::id();
                 $participation = DB::table('participation')
                     ->join('games', 'participation.game_id', '=', 'games.game_id')
                     ->where('participation.player_id', $userId)
                     ->whereIn('games.game_state', ['En cours', 'En attente'])
                     ->select('participation.game_id') // Assurez-vous de sélectionner l'ID du jeu
                     ->latest('participation.id') // Prenez la participation la plus récente
                     ->first();
     
                 if ($participation) {
                     $isInGame = true;
                     $currentGameId = $participation->game_id; // Récupérez l'ID du jeu
                 }
             }
     
             $view->with('isAuthenticated', $isAuthenticated)
                  ->with('isInGame', $isInGame)
                  ->with('currentGameId', $currentGameId); // Passez l'ID du jeu à la vue
         });
     }
     
    
}
