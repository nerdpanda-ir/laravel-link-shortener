<?php

namespace Database\Factories;

use App\Contracts\UserFactoryContract;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory implements UserFactoryContract
{
    public function definition(): array
    {
        $created_at = $this->faker->dateTimeBetween('-3 years',now()->subHours(3));

        $forward_created_at = (new \DateTime())->setTimestamp(
            $created_at->getTimestamp()+rand(100,3600)
        );
        $updated_at = (($this->faker->boolean) ? $this->faker->dateTimeBetween($forward_created_at) : null );
        $email_verified_at = null;
        if ($this->faker->boolean)
            $email_verified_at = (new \DateTime())->setTimestamp(
                $forward_created_at->getTimestamp()+rand(100,3600)
            );
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'user_id' => $this->faker->unique()->userName() ,
            'password' => Hash::make('user'),
            'remember_token' => (($this->faker->boolean) ? Str::random(10) : null ),
            'created_at' => $created_at ,
            'updated_at' => $updated_at ,
            'email_verified_at' => $email_verified_at ,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
    public function nerdPanda():self{
        return $this->state(function (array $oldData){
            $createdAt = Carbon::now()->subYears(4);
            $emailVerified = (new \DateTime())->setTimestamp(
                $createdAt->getTimestamp() + rand(60,300)
            );
            $updatedAt = (new \DateTime())->setTimestamp(
                $createdAt->getTimestamp() + rand(100,3600)
            );
            $data = [
                'name' => 'nerd panda' ,
                'email' => 'nerdpanda@gmail.com' ,
                'user_id' => 'nerdpanda' ,
                'password' => Hash::make('nerdpanda') ,
                'created_at' => $createdAt ,
                'updated_at' => $updatedAt ,
                'email_verified_at'=> $emailVerified ,
            ];
            return $data;
        });
    }
}
