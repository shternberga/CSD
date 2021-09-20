<?php

namespace Database\Seeders;

use App\Models\Channel;
use Illuminate\Database\Seeder;

class ChannelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $channels = [
            ['id' => 1, 'name' => 'aculiecinieks'],
            ['id' => 2, 'name' => 'auto'],
            ['id' => 3, 'name' => 'bizness'],
            ['id' => 4, 'name' => 'calis'],
            ['id' => 5, 'name' => 'delfi'],
            ['id' => 6, 'name' => 'sabiedriba'],
            ['id' => 7, 'name' => 'izklaide'],
            ['id' => 8, 'name' => 'kultura'],
            ['id' => 9, 'name' => 'laikazinas'],
            ['id' => 10, 'name' => 'majadarzs'],
            ['id' => 11, 'name' => 'mansdraugs'],
            ['id' => 12, 'name' => 'orakuls'],
            ['id' => 13, 'name' => 'receptes'],
            ['id' => 14, 'name' => 'skats'],
            ['id' => 15, 'name' => 'sports'],
            ['id' => 16, 'name' => 'tasty'],
            ['id' => 17, 'name' => 'turismagids'],
            ['id' => 18, 'name' => 'tv'],
            ['id' => 19, 'name' => 'vina'],
            ['id' => 19, 'name' => 'campus'],
        ];
        foreach ($channels as $channel) {
            Channel::updateOrCreate(['id' => $channel['id']], $channel);
        }
    }
}
