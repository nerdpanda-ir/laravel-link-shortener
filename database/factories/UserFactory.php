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
        $created_at = $this->get_created_at();
        $forward_created_at = $this->forwardDateTime($created_at);
        $updated_at = $this->get_updated_at($forward_created_at);
        $email_verified_at = null;
        if ($this->faker->boolean)
            $email_verified_at = $this->forwardDateTime($forward_created_at);
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'user_id' => $this->faker->unique()->userName() ,
            'password' => Hash::make('user'),
            'remember_token' => $this->get_remember_token(),
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
            $emailVerified = $this->forwardDateTime($createdAt,60,300);
            $updatedAt = $this->get_updated_at($this->forwardDateTime($createdAt)) ;
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
    protected function get_updated_at(\DateTime $from):null|\DateTime {
        if ($this->faker->boolean)
            return null;
        return $this->faker->dateTimeBetween($from);
    }
    public function get_created_at():\DateTime{
        return $this->faker->dateTimeBetween('-3 years',now()->subHours(3));
    }
    public function get_remember_token():string|null {
        if ($this->faker->boolean)
            return Str::random(10);
        return null;
    }
    public function forwardDateTime(\DateTime $dateTime , int $min = 100 , int $max = 3600):\DateTime {
        $forwarded = new \DateTime();
        $forwarded->setTimestamp($dateTime->getTimestamp()+ rand($min , $max));
        return  $forwarded;
    }
}
