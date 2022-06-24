<?php

namespace Database\Seeders;

use App\Models\product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->call([
			// Admins::class,
			// Users::class,
			// Categorises::class
			produactes::class
		]);
	}
}
