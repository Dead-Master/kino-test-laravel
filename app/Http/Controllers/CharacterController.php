<?php
namespace App\Http\Controllers;

use App\Models\Character;
use App\Transformers\CharacterTransformer;
use Illuminate\Http\Request;
use App\Traits\Count;

class CharacterController extends Controller
{
    use Count;

    public function list(Request $request)
    {
        $this->hit();

        $characters = Character::when($request->get('name'), function ($res) use ($request) {
            return $res->where('name', 'LIKE', "%{$request->get('name')}%");
            })
            ->with('episodes')
            ->with('quotes')
            ->paginate($request->get('limit'));

        if(!$characters){
            return responder()->error('', 'name not fount')->respond(400);
        }

        return responder()->success($characters, new CharacterTransformer());
    }

    public function single()
    {
        $this->hit();

        $character = Character::inRandomOrder()
            ->with('episodes')
            ->with('quotes')
            ->first();

        return responder()->success($character, new CharacterTransformer());
    }
}
