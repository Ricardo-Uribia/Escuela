<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class Insert_User_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
       		'id' => 1,
    		'nombre' => 'Gaspar',
    		'email' => 'registro.utponiente@gmail.com', 
            'role' => 1, // admin            
    		'password' => bcrypt('utponientegc'),
    	]); 
    }
}
