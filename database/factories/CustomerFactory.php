<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $legal_status_list = [
            'EI',
            'EIRL',
            'EURL',
            'SARL',
            'SA',
            'SAS',
            'SASU',
            'SNC',
            'SCOP',
            'SCA',
            'SCS',
        ];

        $legal_status = $legal_status_list[random_int(0, count($legal_status_list)-1)];

        return [
            'society_description'             => $this->faker->text(),
            'society_social_reason'         => $this->faker->name . " " . $legal_status,
            'society_legal_status'       =>  $legal_status,
            'society_capital'  => $this->faker->randomNumber(),
            'society_siret_number'         => $this->faker->numerify("### ### ### #####"),
            'society_naf_code'       => $this->faker->numerify("##.##") . strtoupper($this->faker->randomLetter),
            'country'       => $this->faker->country,
            'address'       => $this->faker->address,
            'postal_code'       => $this->faker->postcode,
            'city'       => $this->faker->city,
        ];
    }
}
