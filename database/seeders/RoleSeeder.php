<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('roles')->truncate();

        DB::table('roles')->insert(['name' => 'Admin', 'description' => 'Website administraror. Has the most priviedges. Can grant roles. Can create, edit or delete pages and articles. Can add article caregories. Can unpublish articles.']);
        DB::table('roles')->insert(['name' => 'Author', 'description' => 'Article writter. Can create and edit Articles.']);
        DB::table('roles')->insert(['name' => 'Member', 'description' => 'Has the least priviedges of all users. Can comment on articles. Can save articles to favourires.']);
   
    }

}
