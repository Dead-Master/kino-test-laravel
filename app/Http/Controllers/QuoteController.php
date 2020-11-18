<?php
namespace App\Http\Controllers;

use App\Models\Quote;
use App\Transformers\QuoteTransformer;
use Illuminate\Http\Request;
use App\Traits\Count;

class QuoteController extends Controller
{
    use Count;

    public function list(Request $request)
    {
        $this->hit();

        return responder()->success(Quote::paginate($request->get('limit')));
    }

    public function single(Request $request)
    {
        $this->hit();

        $quotes = Quote::whereHas('characters', function ($query) use ($request){
                $query->where('name', 'like', "%{$request->get('name')}%");})
            ->inRandomOrder()
            ->first();

        if(!$quotes){
            return responder()->error('', 'name not fount')->respond(400);
        }

        return responder()->success($quotes, new QuoteTransformer());
    }
}
