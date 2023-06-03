<?php

namespace Database\Seeders;

use App\Contracts\Model\Userable;
use App\Models\User;
use Database\Factories\LinkFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;
use App\Contracts\Factories\Link;
use App\Contracts\Seeder\Link as Contract;
use NerdPanda\Exceptions\NoDependencyFoundForSeedingException;

class LinkSeeder extends Seeder implements Contract
{
    protected int $maxLink = 52;
    /**
     * Run the database seeds.
     * @throws NoDependencyFoundForSeedingException
     * @var User $user
     * @var LinkFactory $link
     */
    public function run(Link $link , Userable $user): void
    {
        $link->newModel()->truncate();
        /** @var Collection $users */
        $users = $user->get(['id']);
        if ($users->isEmpty())
            throw new NoDependencyFoundForSeedingException(
                trans('exceptions.no-dependency-found', ['dependency' => 'users' , 'seeder' => self::class ])
            );
        foreach ($users->toArray() as $userItem)
            $link->count(rand(0,$this->maxLink))->create(['creator'=>$userItem['id']]);
    }
}
