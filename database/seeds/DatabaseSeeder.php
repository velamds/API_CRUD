<?php
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(ServersTableSeeder::class);
        /*
        User::create([
            'name' => 'Sergio',
            'email' => 'sergio@seedbox.com',
            'password' => Hash::make('sergio')
        ]);*/
    }
}
