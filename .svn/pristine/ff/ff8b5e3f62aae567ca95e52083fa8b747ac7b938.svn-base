<?php

namespace App\Faker\Provider;

use Faker\Generator;
use Faker\Provider\Base;

class Event extends Base
{
    use EventProvider;

    protected static $eventImage = [];

    public function __construct(Generator $generator)
    {
        parent::__construct($generator);
        for ($i = 1; $i < 51; $i++)
            static::$eventImage[] = "events/event_" . sprintf('%02d', $i) . '.jpg';

    }


    public function eventTitle(): string
    {
        return sprintf('%s', static::randomElement(static::$eventTitles));
    }

    public function eventDescription(): string
    {
        return sprintf('%s', static::randomElement(static::$eventDescription));
    }

    public function eventImage(): string
    {
        return sprintf('%s', static::randomElement(static::$eventImage));
    }




}