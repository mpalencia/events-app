<?php

use Illuminate\Database\Seeder;

class OrganizerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $o = factory(\App\Model\Organizer::class)->create([
            'name' => 'Technological Institute of the Phils. ',
            'email' => 'dgts@tip.edu.ph',
            'description' => 'Lorem ipsum',
            'address' => '938 Aurora Blvd., Cubao, Quezon City',
            'contact' => '7330961',
            'password' => bcrypt('secret')
        ]);

        for ($i = 0; $i < 5; $i++) {
            $events = $o->events()->save(factory(App\Model\Event::class)->make(['organizer_id' => $o->id]));
            for ($i = 0; $i < rand(1, 5); $i++)
                $events->locations()->save(factory(App\Model\Location::class)->make(['event_id' => $events->id]));
            // create timestamps
            for ($i = 0; $i < rand(1, 5); $i++)
                $events->timestampsTable()->save(factory(App\Model\Timestamp::class)->make(['event_id' => $events->id]));
            // create contacts
            for ($i = 0; $i < rand(1, 3); $i++)
                $events->contacts()->save(factory(App\Model\Contact::class)->make(['event_id' => $events->id]));
            // create tickets
            for ($i = 0; $i < rand(1, 5); $i++) {
                $events->tickets()->save(factory(App\Model\Ticket::class)->make(['event_id' => $events->id]));
            }

            // create bookmarks
            for ($i = 0; $i < rand(1, 5); $i++)
                $events->bookmarks()->save(factory(App\Model\Bookmark::class)->make(['event_id' => $events->id]));

            /**
             * Add event tag data
             */
            $eventTag = new \App\Model\EventTag;
            $tag = new \App\Model\Tag;
            $tag_id = $tag->inRandomOrder()->first(['id'])->id;
            $eventTag->create(['event_id' => $events->id, 'tag_id' => $tag_id]);

            // add organizer tag
            $organizerTag = new \App\Model\OrganizerTag;
            $tag = new \App\Model\Tag;
            $tag_id = $tag->inRandomOrder()->first(["id"])->id;
            if (!$organizerTag->where(['tag_id' => $tag_id, 'organizer_id' => $o->id])->first())
                $organizerTag->create(['organizer_id' => $o->id, 'tag_id' => $tag_id]);
        }


    }
}
