<?php

namespace App\Transformers;

use App\Model\Timestamp;
use League\Fractal\TransformerAbstract;

class TimestampTransformer extends TransformerAbstract
{

    /**
     * @param Timestamp $timestamp
     * @return array
     */
    public function transform(Timestamp $timestamp)
    {
        return [
            'timestamp_start' => $timestamp->timestamp_start,
            'timestamp_end' => $timestamp->timestamp_end
        ];
    }
}