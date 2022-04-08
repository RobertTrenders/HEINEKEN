<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ParticipantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 500; $i++) {
            set_time_limit(0);
            \App\Models\ParticipantModel::factory(1000)->create();
            sleep(0.01);
        }
    }
}
