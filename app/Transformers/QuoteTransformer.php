<?php

namespace App\Transformers;

use App\Models\Quote;
use Flugg\Responder\Transformers\Transformer;

class QuoteTransformer extends Transformer
{
    /**
     * Transform the supplied data.
     *
     * @param Quote $model
     * @return array
     */
    public function transform(Quote $model) :array
    {
        return [
            'id'    => $model->id,
            'title'  => $model->quote,
        ];
    }
}
