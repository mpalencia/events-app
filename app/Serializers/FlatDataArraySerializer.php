<?php

namespace App\Serializers;

use League\Fractal\Serializer\ArraySerializer;
use League\Fractal\TransformerAbstract;

class FlatDataArraySerializer extends ArraySerializer
{
    /**
     * @var array
     * */
    protected $rootKeys;

    /**
     * @param TransformerAbstract $rootTransformer
     * @param $data
     */
    public function __construct(TransformerAbstract $rootTransformer, $data)
    {
        $this->rootKeys = array_keys($rootTransformer->transform($data));
    }

    /**
     * Serialize a collection.
     *
     * @param string $resourceKey
     * @param array $data
     *
     * @return array
     */
    public function collection($resourceKey, array $data)
    {
        return $data;
    }

    /**
     * Serialize an item.
     *
     * @param string $resourceKey
     * @param array $data
     *
     * @return array
     */
    public function item($resourceKey, array $data)
    {
        return $data;
    }
}