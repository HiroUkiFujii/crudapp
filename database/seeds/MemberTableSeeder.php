<?php

use Illuminate\Database\Seeder;
use App\Member;

class MemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('members')->delete();

      $faker = Faker\Factory::create('ja_JP');

      for ($i=0; $i <10 ; $i++) {
        Member::create([
        'name'=>$faker->name(),
        'email'=>$faker->email(),
        'tel'=>$faker->phoneNumber(),
      ]);
      }
    }
}
