<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Pagination
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $validator = Validator::make($request->all(), [
            'limit' => 'numeric|min:1|nullable',
            'page' => 'numeric|min:1|nullable'
        ]);

        if ($validator->fails()){
            return responder()->error('', $validator->errors())->respond(400);
        }

        $input = $request->all();
        $input['limit'] = $input['limit'] ?? '10';
        $input['page'] = $input['page'] ?? '1';
        $request->replace($input);

        return $next($request);
    }
}
