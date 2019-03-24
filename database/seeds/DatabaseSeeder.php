<?php

use Illuminate\Database\Seeder;

final class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(SubForumsTableSeeder::class);
    }
}
