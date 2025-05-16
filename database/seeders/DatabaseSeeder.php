<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Listing;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(5)->create();
        Listing::factory(6)->create();

    //  Listing::Create(
    //     [
    // 'title' => 'Senior Laravel Developer',
    // 'tags' => 'laravel, php, backend',
    // 'company' => 'CodeSmith Technologies',
    // 'location' => 'San Francisco, CA',
    // 'email' => 'hr@codesmith.dev',
    // 'website' => 'https://www.codesmith.dev',
    // 'description' => 'We are looking for an experienced Laravel developer to join our backend team. You will be responsible for designing RESTful APIs, working with databases, and integrating third-party services.',
    //      ]
    //  );
        
    // Listing::Create(
    //      [
    //     'title' => 'Frontend Engineer',
    //     'tags' => 'javascript, vue, css',
    //     'company' => 'BrightPixel Inc.',
    //     'location' => 'New York, NY',
    //     'email' => 'jobs@brightpixel.com',
    //     'website' => 'https://www.brightpixel.com',
    //     'description' => 'Join our team to build sleek and responsive web applications using modern JavaScript frameworks. Must have experience with Vue.js and CSS.',
        
    // ]
    // );
       
    }
}
