<?php

use App\Models\SubForum;
use Illuminate\Database\Seeder;

final class SubForumsTableSeeder extends Seeder
{
    public function run(): void
    {
        factory(SubForum::class, 10)->create();
    }
}
