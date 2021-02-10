<?php
use App\Coupon;
use Illuminate\Database\Seeder;

class CouponsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Coupon::create([
            'code' => 'ABC123',
            'type' => 'fixed',
            'value' => 500 ,
        ]);
        Coupon::create([
            'code' => 'XYZ123',
            'type' => 'percent',
            'percent_off' => 20 ,
        ]);
    }
}
