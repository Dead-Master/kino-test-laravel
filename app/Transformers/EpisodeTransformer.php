<?php

namespace App\Transformers;

use App\Models\Episode;
use Flugg\Responder\Transformers\Transformer;

class EpisodeTransformer extends Transformer
{
    /**
     * Transform the supplied data.
     *
     * @param Episode $model
     * @return array
     */
    public function transform(Episode $model) :array
    {
        return [
            'id'    => $model->id,
            'title'  => $model->title,
            'characters' => $model->characters->makeHidden('pivot'),
        ];
    }
}
