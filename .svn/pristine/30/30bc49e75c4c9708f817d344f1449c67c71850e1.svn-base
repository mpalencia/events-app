<?php

namespace App\Transformers;

use App\Model\Location;
use League\Fractal\TransformerAbstract;

class LocationTransformer extends TransformerAbstract
{

    /**
     * @param Location $location
     * @return array
     */
    public function transform(Location $location)
    {
        return [
            'name' => $location->name,
            'address' => $location->address,
            'lat' => $location->lat,
            'lng' => $location->lng
        ];
    }
}