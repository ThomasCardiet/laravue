<?php

namespace Database\Factories;

use App\Models\Project;
use DateInterval;
use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $status = [
            'En cours',
            'Terminé',
        ];

        return [
            'customer_id'             => DB::table('customers')->get('id')->random(1)->first()->id,
            'last_name'         => $this->faker->lastName,
            'first_name'       =>  $this->faker->firstName,
            'phone_number'  => $this->faker->phoneNumber,
            'email'         => $this->faker->email,
            'title'       => $this->faker->sentence(1),
            'description'       => $this->faker->text,
            'start_date'       => new DateTime(),
            'end_date'       => (new DateTime())->add(new DateInterval('P' . random_int(6, 80) . 'D')),
            'status'       => $status[random_int(0, count($status)-1)],
            'day_sell'       => $this->faker->randomNumber(),
        ];
    }
}
