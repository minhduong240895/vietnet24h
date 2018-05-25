<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $data = [
//            [
//                'id'   => 1,
//                'name' => 'John',
//                'email' => 'John@gmail.com',
//                'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
//            ],
//            [
//                'id'   => 2,
//                'name' => 'Eva',
//                'email' => 'Eva@gmail.com',
//                'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
//            ],
//            [
//                'id'   => 3,
//                'name' => 'Johnathan',
//                'email' => 'Johnathan@gmail.com',
//                'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
//            ],
//        ];
//        foreach ($data as $item) {
//            User::create($item);
//        }
        factory(App\Models\User::class, 5)->create()->each(function($user){
            $user->save();
        });
    }
}
