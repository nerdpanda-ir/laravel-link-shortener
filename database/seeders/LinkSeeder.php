<?php

namespace Database\Seeders;

use Database\Factories\LinkFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Contracts\Factories\Link;
use App\Contracts\Seeder\Link as Contract;
class LinkSeeder extends Seeder implements Contract
{
    /**
     * Run the database seeds.
     * @var LinkFactory $link
     */
    public function run(Link $link): void
    {

    }
}
