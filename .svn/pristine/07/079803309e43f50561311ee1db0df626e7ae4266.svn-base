<?php

namespace App\Transformers;

use App\Model\Organizer;
use League\Fractal\TransformerAbstract;

class OrganizerTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        'tags',
    ];
    /**
     * @param Organizer $organizer
     * @return array
     */
    public function transform(Organizer $organizer)
    {
        return [
            'name' => $organizer->name,
            'email' => $organizer->email,
            'description' => $organizer->image,
            'address' => $organizer->address,
            'contact' => $organizer->contact,
            'image' => $organizer->image
        ];
    }

    /**
     * Organizer Tags
     * @param $organizer
     * @return \League\Fractal\Resource\Collection
     */
    public function includeTags($organizer)
    {
        if ($organizer instanceof \stdClass)
            $organizer = objectToObject($organizer, 'App\Model\Organizer');
        return $this->collection($organizer->tags, new TagTransformer);
    }
}