<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\RolesAndPermissionsSeeder;
use App\Models\Status;


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
            RolesAndPermissionsSeeder::class,
            UserSeeder::class,
        ]);
        // \App\Models\User::factory(10)->create();
    }
}


$Active = Status::create([
    "name" => "Active",
]);

$In_Active = Status::create([
    "name" => "In Active",
]);


$Pending = Status::create([
    "name" => "Pending",
]);

$In_progress = Status::create([
    "name" => "In Progress",
]);


$Not_Found = Status::create([
    "name" => "Not Found",
]);


$Repair = Status::create([
    "name" => "Repair",
]);

//Departments

$Marketing = Category::create([
    "name" => "Marketing",
]);


$Accounts_and_Finance = Category::create([
    "name" => "Accounts & Finance",
]);


$Administration = Category::create([
    "name" => "Administration",
]);


$Credentialing = Category::create([
    "name" => "Credentialing",
]);


$Dental_Billing = Category::create([
    "name" => "Dental Billing",
]);


$Human_Resources = Category::create([
    "name" => "Human-Resources",
]);


$IT = Category::create([
    "name" => "IT",
]);


$Legal = Category::create([
    "name" => "Legal",
]);


$Medical_Billing = Category::create([
    "name" => "Medical-Billing",
]);

$QA_PCM = Category::create([
    "name" => "QA PCM",
]);
