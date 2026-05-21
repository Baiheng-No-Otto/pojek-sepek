<?php

namespace Database\Seeders;

use App\Models\Criteria;
use App\Support\DefaultCriteria;
use Illuminate\Database\Seeder;

class CriteriaSeeder extends Seeder
{
    public function run(): void
    {
        Criteria::truncate();

        Criteria::insert(DefaultCriteria::recordsWithTimestamps());
    }
}
