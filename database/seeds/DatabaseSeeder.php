<?php

use App\Task;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);
        $faker = Faker\Factory::create();
        $this->seedTasks();
        $this->seedTags();

        Model::reguard();
    }

    public function seedTasks(Faker $faker)
    {
        foreach (range(0,100) as $item){
            $tasks = new Task();
            $tasks->name = $faker->sentence();
            $tasks->done = $faker->boolean();
            $tasks->priority = $faker->randomDigit();
            $tasks->save();
        };
    }

    public function seedTags(Faker $faker)
    {
        foreach (range(0,100) as $item){
            $tag = new Tag();
            $tag->name = $faker->word();
            $tag->save();
        };
    }
}
