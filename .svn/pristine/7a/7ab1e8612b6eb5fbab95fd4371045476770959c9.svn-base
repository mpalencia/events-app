<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Model\Event::class, 25)
            ->create()
            ->each(function ($e) {
                // create location
                for ($i = 0; $i < rand(2, 5); $i++)
                    $e->locations()->save(factory(App\Model\Location::class)->make(['event_id' => $e->id]));
                // create timestamps
                for ($i = 0; $i < rand(2, 10); $i++)
                    $e->timestampsTable()->save(factory(App\Model\Timestamp::class)->make(['event_id' => $e->id]));
                // create contacts
                for ($i = 0; $i < rand(2, 5); $i++)
                    $e->contacts()->save(factory(App\Model\Contact::class)->make(['event_id' => $e->id]));
                // create tickets
                for ($i = 0; $i < rand(2, 10); $i++) {
                    $e->tickets()->save(factory(App\Model\Ticket::class)->make(['event_id' => $e->id]));
                }

                // create bookmarks
                if (rand(0, 1))
                    for ($i = 0; $i < rand(2, 10); $i++)
                        $e->bookmarks()->save(factory(App\Model\Bookmark::class)->make(['event_id' => $e->id]));

                /**
                 * Add event tag data
                 */
                $eventTag = new \App\Model\EventTag;
                $tag = new \App\Model\Tag;
                $tag_id = $tag->inRandomOrder()->first(['id'])->id;
                $eventTag->create(['event_id' => $e->id, 'tag_id' => $tag_id]);

                // add organizer tag
                $organizerTag = new \App\Model\OrganizerTag;
                $tag = new \App\Model\Tag;
                $tag_id = $tag->inRandomOrder()->first(["id"])->id;
                $organizerTag->create(['organizer_id' => $e->organizer_id, 'tag_id' => $tag_id]);
            });

        // add user ticket and bookmark
        /**
         * Add John Doe User
         */
        $user = factory(App\Model\User::class)->create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'johndoe@gmail.com',
            'contact' => '7335412',
            'birthday' => date('Y-m-d'),
            'address' => '938 Aurora Blvd., Cubao, Quezon City',
            'password' => bcrypt('secret')
        ]);

        factory(\App\Model\UserInterest::class)->create([
            'user_id' => $user->id,
            'tag_id' => 5
        ]);

        $events = \App\Model\Event::take(20)->get();
        foreach ($events as $event) {
            if(rand(0,1)){
                $data = [
                    'user_id' => $user->id,
                    'event_id' => $event->id
                ];
//                factory(\App\Model\Ticket::class)->create($data);
                factory(\App\Model\Bookmark::class)->create($data);
            }
        }
    }
}
