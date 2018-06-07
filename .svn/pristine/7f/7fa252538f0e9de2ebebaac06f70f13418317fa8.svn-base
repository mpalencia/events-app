<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ["Entertainment", "Music", "Tech", "Fitness", "Active", "Business"];
        foreach($tags as $tag){
            factory(\App\Model\Tag::class)->create(["title" => $tag]);
        }
    }
}
