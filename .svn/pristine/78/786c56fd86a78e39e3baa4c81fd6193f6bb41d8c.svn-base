<?php

namespace App\Serializers;

use League\Fractal\Serializer\ArraySerializer;
use League\Fractal\TransformerAbstract;

class RootDataArraySerializer extends ArraySerializer
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
        return $this->ifRootThenWrap($data);
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
        return $this->ifRootThenWrap($data);
    }

    /**
     * @param array $data
     *
     * @return array
     * */
    protected function ifRootThenWrap($data)
    {

        $item = isset($data[0]) ? $data[0] : $data;

        $itemKeys = array_keys($item);

        $itemIsProbablyRoot = array_intersect($itemKeys, $this->rootKeys) === $this->rootKeys;

        if ($itemIsProbablyRoot) {
            return compact('data');
        }

        return $data;
    }
}