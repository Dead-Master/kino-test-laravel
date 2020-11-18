<?php
namespace App\Http\Controllers;

use Auth;
use Cache;

class StatsController extends Controller
{
    public function mystats()
    {
        $user = Auth::user();
        if(!$user){
            return responder()->error('', 'not login')->respond(401);
        }
        $value = Cache::store('redis')->get("api:users:{$user->id}") ?? 0;
        return responder()->success([$value]);
    }

    public function stats()
    {
        $value = Cache::store('redis')->get('api-total-request') ?? 0;
        return responder()->success([$value]);
    }
}
