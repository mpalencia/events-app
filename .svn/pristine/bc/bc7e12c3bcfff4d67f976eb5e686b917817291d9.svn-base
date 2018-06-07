<?php

namespace App\Http\Controllers;

use App\Model\Tag;
use App\Serializers\RootDataArraySerializer;
use App\Transformers\TagTransformer;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('user_organizer_auth');
    }

    /**
     * @return $this
     */
    public function getTags()
    {
        return fractal()
            ->collection(Tag::all(), new TagTransformer)
            ->serializeWith(new RootDataArraySerializer(new TagTransformer(), new Tag()));

    }
}
