<?php

namespace Database\Seeders;

use App\Models\Turbine;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TurbineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 100) as $number) {
            if ($number % 3 === 0 && $number % 5 === 0) {
                Turbine::create([
                    'name' => 'Turbine',
                    'status' => 'Lightning Strike and Coating Damage',
                    'last_check_date' => Carbon::now()
                ]);
            } elseif ($number % 3 === 0) {
                Turbine::create([
                    'name' => 'Turbine',
                    'status' => 'Coating Damage',
                    'last_check_date' => Carbon::now()
                ]);
            } elseif ($number % 5 === 0) {
                Turbine::create([
                    'name' => 'Turbine',
                    'status' => 'Lightning Strike',
                    'last_check_date' => Carbon::now()
                ]);
            } else {
                Turbine::create([
                    'name' => 'Turbine',
                    'status' => 'Working',
                    'last_check_date' => Carbon::now()
                ]);
            }
        }
    }
}
