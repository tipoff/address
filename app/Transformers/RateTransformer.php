<?php

namespace App\Transformers;

use Tipoff\EscapeRoom\Models\EscaperoomRate;
use League\Fractal\TransformerAbstract;

class RateTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include.
     *
     * @var array
     */
    protected $defaultIncludes = [
        //
    ];

    /**
     * List of resources possible to include.
     *
     * @var array
     */
    protected $availableIncludes = [
        //
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(EscaperoomRate $rate)
    {
        return [
            'id' => $rate->id,
            'slug' => $rate->slug,
            'name' => $rate->name,
            'public_1' => $rate->public_1,
            'public_2' => $rate->public_2,
            'public_3' => $rate->public_3,
            'public_4' => $rate->public_4,
            'public_5' => $rate->public_5,
            'public_6' => $rate->public_6,
            'public_7' => $rate->public_7,
            'public_8' => $rate->public_8,
            'public_9' => $rate->public_9,
            'public_10' => $rate->public_10,
            'private_1' => $rate->private_1,
            'private_2' => $rate->private_2,
            'private_3' => $rate->private_3,
            'private_4' => $rate->private_4,
            'private_5' => $rate->private_5,
            'private_6' => $rate->private_6,
            'private_7' => $rate->private_7,
            'private_8' => $rate->private_8,
            'private_9' => $rate->private_9,
            'private_10' => $rate->private_10,
            'private_11' => $rate->private_11,
            'private_12' => $rate->private_12,
            'private_13' => $rate->private_13,
            'private_14' => $rate->private_14,
            'private_15' => $rate->private_15,
            'private_16' => $rate->private_16,
        ];
    }
}
