<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use App\Models\Warehouse;
use Illuminate\Support\Facades\DB;

class WarehouseTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */

	public function run()
	{
		Model::unguard();

		DB::table('warehouses')->delete();

		DB::statement('ALTER TABLE warehouses AUTO_INCREMENT = 1');

		$faker = \Faker\Factory::create();

		$warehouse = new Warehouse();
		$warehouse->name = "Stockifly";
		$warehouse->email = "stockifly@example.com";
		$warehouse->phone = $faker->e164PhoneNumber();
		$warehouse->terms_condition = "1. Goods once sold will not be taken back or exchanged 
2. All disputes are subject to [ENTER_YOUR_CITY_NAME] jurisdiction only";
		$warehouse->save();

		$warehouse = new Warehouse();
		$warehouse->name = "Warehouse 1";
		$warehouse->email = "warehouse@example.com";
		$warehouse->phone = $faker->e164PhoneNumber();
		$warehouse->terms_condition = "1. Goods once sold will not be taken back or exchanged 
2. All disputes are subject to [ENTER_YOUR_CITY_NAME] jurisdiction only";
		$warehouse->save();
	}
}
