<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Model\User::class, 12)
            ->create()
            ->each(function ($u) {
                $userInterest = new \App\Model\UserInterest;
                $tag = new \App\Model\Tag;
                $tag_id = $tag->inRandomOrder()->first(["id"])->id;
                $userInterest->create(['user_id' => $u->id, 'tag_id' => $tag_id]);
            });
    }
}
