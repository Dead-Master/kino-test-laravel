<?php

namespace App\Transformers;

use App\Models\Character;
use Flugg\Responder\Transformers\Transformer;

class CharacterTransformer extends Transformer
{
   /**
     * Transform the supplied data.
     *
     * @param Character $model
     * @return array
     */
    public function transform(Character $model) :array
    {
        return [
            'id'    => $model->id,
            'name'  => $model->name,
            'birthday' => $model->birthday,
            'occupations' => $model->occupations,
            'img' => $model->img,
            'nickname' => $model->nickname,
            'portrayed' => $model->portrayed,
            'episodes' => $model->episodes()->pluck('id'),
            'quotes' => $model->quotes()->pluck('id'),
        ];
    }
}
