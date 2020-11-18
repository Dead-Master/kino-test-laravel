<?php
namespace App\Http\Controllers;

use App\Models\Episode;
use App\Transformers\EpisodeTransformer;
use Illuminate\Http\Request;
use App\Traits\Count;

class EpisodeController extends Controller
{
    use Count;

    public function list(Request $request)
    {
        $this->hit();

        $episodes = Episode::paginate($request->get('limit'));

        return responder()->success($episodes);
    }

    public function single($id)
    {
        $this->hit();

        $episode = Episode::whereId($id)->with('characters')->first();

        if (!$episode){
            return responder()->error('', 'episode not fount')->respond(404);
        }

        return responder()->success($episode, new EpisodeTransformer());
    }
}
