
<?php

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		factory(User::class)->create([
			'name' => 'John Karlo Cachero',
			'email' => 'johnguitarizta@gmail.com',
		]);

        factory(User::class, 109)->create();
    }
}
