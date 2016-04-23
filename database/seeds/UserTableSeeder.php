<?php
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();
      for ($i=0; $i < 100; $i++) {
        DB::insert('insert into users (name, address, phone) values (:name, :address, :phone)', [
          'name' => $faker->name,
          'address' => $faker->address,
          'phone' => $faker->phoneNumber
        ]);
      }
      $this->command->info('Berhasil menambahkan data user!');
    }
}
