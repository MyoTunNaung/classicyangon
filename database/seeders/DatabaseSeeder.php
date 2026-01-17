<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Str;

use App\Models\User;
use App\Models\Organization;
use App\Models\Teacher;
use App\Models\Category;
use App\Models\Course;
use App\Models\Lesson;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Myo Tun Naung',
        //     'email' => 'myotunnoung@gmail.com',
        // ]);

        //User
        $user = User::updateOrCreate(
            [
                'email' => 'myotunnoung@gmail.com',
            ],
            [
                'name'              => 'Myo Tun Naung',
                'password'          => Hash::make('password123'), // change after login
                'status'            => 'active',
                'remark'            => 'Platform Owner',
                'parent_user_id'    => null,
                'created_by'        => null,
                'updated_by'        => null,
            ]
        );

        $user = User::updateOrCreate(
            [
                'email' => 'soeyarzar@gmail.com',
            ],
            [
                'name'              => 'Soe Yarzar',
                'password'          => Hash::make('password123'), // change after login
                'status'            => 'active',
                'remark'            => 'PELC Owner',
                'parent_user_id'    => null,
                'created_by'        => null,
                'updated_by'        => null,
            ]
        );

        $user = User::updateOrCreate(
            [
                'email' => 'kyawzin@gmail.com',
            ],
            [
                'name'              => 'Kyaw Zin',
                'password'          => Hash::make('password123'), // change after login
                'status'            => 'active',
                'remark'            => 'ဖန်မီးအိမ် Owner',
                'parent_user_id'    => null,
                'created_by'        => null,
                'updated_by'        => null,
            ]
        );

        //Organization
        $owner = User::where('email', 'myotunnoung@gmail.com')->first();
        Organization::updateOrCreate(
            [
                'name' => 'Classic Yangon',
            ],
            [
                'description'   => "Education platform for modern learning.\nServing students across Myanmar.",
                'owner_id'      => $owner?->id,
                'logo'          => 'classic.jpg',
                'status'        => 'active',
                'remark'        => 'Platform Owner',
                'created_by'    => null,
                'updated_by'    => null,
            ]
        );


        $owner = User::where('email', 'soeyarzar@gmail.com')->first();
        Organization::updateOrCreate(
            [
                'name' => 'PELC',
            ],
            [
                'description'   => "English 4 Skills.\nServing students across Myanmar.",
                'owner_id'      => $owner?->id,
                'logo'          => 'pelc.jpg',
                'status'        => 'active',
                'remark'        => 'Platform Owner',
                'created_by'    => null,
                'updated_by'    => null,
            ]
        );


        $owner = User::where('email', 'kyawzin@gmail.com')->first();
        Organization::updateOrCreate(
            [
                'name' => 'ဖန်မီးအိမ် ဘော်ဒါ',
            ],
            [
                'description'   => "Grade-10, Grade-11, Grade-12.\nServing students across Myanmar.",
                'owner_id'      => $owner?->id,
                'logo'          => 'lantern.jpg',
                'status'        => 'active',
                'remark'        => 'Platform Owner',
                'created_by'    => null,
                'updated_by'    => null,
            ]
        );

        //Teacher
        $user           = User::where('email', 'myotunnoung@gmail.com')->first();
        $organization   = Organization::where('name', 'Classic Yangon')->first();

        if (!$user) { return; }

        Teacher::updateOrCreate(
            [
                'user_id' => $user->id,
            ],
            [
                'organization_id'   => $organization?->id,
                'bio'               => "Experienced educator with passion for teaching.",
                'specialization'    => 'Programming & Web Development',
                'profile_photo'     => 'myo tun naung.jpg',
                'contract_type'     => 'internal',
                'status'            => 'active',
                'remark'            => 'Technology Educator',
                'created_by'        => null,
                'updated_by'        => null,
            ]
        );

        $user           = User::where('email', 'soeyarzar@gmail.com')->first();
        $organization   = Organization::where('name', 'PELC')->first();

        if (!$user) { return; }

        Teacher::updateOrCreate(
            [
                'user_id' => $user->id,
            ],
            [
                'organization_id'   => $organization?->id,
                'bio'               => "Experienced educator with passion for teaching.",
                'specialization'    => 'English 4 Skills',
                'profile_photo'     => 'soe yarzar.jpg',
                'contract_type'     => 'internal',
                'status'            => 'active',
                'remark'            => 'English',
                'created_by'        => null,
                'updated_by'        => null,
            ]
        );

        $user           = User::where('email', 'kyawzin@gmail.com')->first();
        $organization   = Organization::where('name', 'ဖန်မီးအိမ် ဘော်ဒါ')->first();

        if (!$user) { return; }

        Teacher::updateOrCreate(
            [
                'user_id' => $user->id,
            ],
            [
                'organization_id'   => $organization?->id,
                'bio'               => "Experienced educator with passion for teaching.",
                'specialization'    => 'Maths, Physics for Grade-10, Grade-11, Grade-12',
                'profile_photo'     => 'kyaw zin.jpg',
                'contract_type'     => 'internal',
                'status'            => 'active',
                'remark'            => 'Maths, Physics',
                'created_by'        => null,
                'updated_by'        => null,
            ]
        );



        // Categories (TOP LEVEL ONLY)
        $categories = [
            'IT',
            'Programming',
            'Web Development',

            'Academic English',
            'Academic Mathematics',
            'Academic Physics',

            'General English',
        ];

        foreach ($categories as $index => $name) {
            Category::updateOrCreate(
                ['slug' => Str::slug($name)],
                [
                    'name'       => $name,
                    'sort_order' => $index + 1,
                    'status'     => 'active',
                    'remark'     => null,
                    'created_by' => null,
                    'updated_by' => null,
                ]
            );
        }


        // Courses with ownership
        $data = [
            'IT' => [
                'organization' => 'Classic Yangon',
                'teacher_email' => 'myotunnoung@gmail.com',
                'courses' => [
                    'Computer Basics',
                    'Advanced Excel',
                    'Graphic Design',
                    'Video Editing',
                ],
            ],

            'Programming' => [
                'organization' => 'Classic Yangon',
                'teacher_email' => 'myotunnoung@gmail.com',
                'courses' => [
                    'C',
                    'C++',
                    'Java',
                ],
            ],

            'Web Development' => [
                'organization' => 'Classic Yangon',
                'teacher_email' => 'myotunnoung@gmail.com',
                'courses' => [
                    'Frontend Development (HTML,CSS,JavaScript,jQuery,Bootstrap)',
                    'Backend Development (PHP)',
                    'Laravel (PHP Framework)',
                    'Spring Boot (Java Framework)',
                ],
            ],

            'Academic English' => [
                'organization' => 'PELC',
                'teacher_email' => 'soeyarzar@gmail.com',
                'courses' => [
                    'Grade 10 English',
                    'Grade 11 English',
                    'Grade 12 English',
                ],
            ],

            'Academic Mathematics' => [
                'organization' => 'ဖန်မီးအိမ် ဘော်ဒါ',
                'teacher_email' => 'kyawzin@gmail.com',
                'courses' => [
                    'Grade 10 Mathematics',
                    'Grade 11 Mathematics',
                    'Grade 12 Mathematics',
                ],
            ],

            'Academic Physics' => [
                'organization' => 'ဖန်မီးအိမ် ဘော်ဒါ',
                'teacher_email' => 'kyawzin@gmail.com',
                'courses' => [
                    'Grade 10 Physics',
                    'Grade 11 Physics',
                    'Grade 12 Physics',
                ],
            ],

            'General English' => [
                'organization' => 'PELC',
                'teacher_email' => 'soeyarzar@gmail.com',
                'courses' => [
                    'Basic',
                    'Intermediate',
                ],
            ],
        ];


        foreach ($data as $categoryName => $config) {

            $category = Category::where('name', $categoryName)->first();
            if (! $category) {
                continue;
            }

            $organization = Organization::where('name', $config['organization'])->first();

            $teacher = Teacher::whereHas('user', function ($q) use ($config) {
                $q->where('email', $config['teacher_email']);
            })->first();

            foreach ($config['courses'] as $title) {

                Course::updateOrCreate(
                    [
                        'slug' => Str::slug($title . '-' . $category->id),
                    ],
                    [
                        'organization_id' => $organization?->id,
                        'teacher_id'      => $teacher?->id,
                        'category_id'     => $category->id,
                        'title'           => $title,
                        'description'     => null,
                        'level'           => null,
                        'price'           => 0,
                        'cover_photo'     => null,
                        'status'          => 'active',
                        'remark'          => null,
                        'created_by'      => null,
                        'updated_by'      => null,
                    ]
                );
            }
        }

        // Lessons
        $course = Course::where('title', 'Backend Development (PHP)')->first();

        $lessons = [
            ['Intro PHP, XAMPP', true],
            ['Download XAMPP', true],
            ['Installation XAMPP', true],
            ['XAMPP Folder Structure htdocs', true],
            ['htdocs/intro.php', true],
            ['htdocs/folder-name/intro.php', false],
            ['Variables', false],
            ['Strings', false],
            ['Condition', false],
            ['Array', false],

            ['Loop', false],
            ['Function', false],
            ['File', false],
            ['OOP', false],
            ['One to One Inheritance', false],
            ['One to Many Inheritance', false],
            ['Form Handling', false],
            ['Cookies', false],
            ['Sessions', false],
            ['Summary', false],
        ];

        foreach ($lessons as $index => [$title, $isFree]) {
            Lesson::create([
                'course_id'    => $course->id,
                'title'        => sprintf('%02d - %s', $index + 1, $title),
                'lesson_order' => $index + 1,
                'is_free'      => $isFree,
                'status'       => 'active',
                'content'      => null,
                'video_url'    => null,
                'remark'       => $isFree ? 'Free lesson' : 'Paid lesson',
                'created_by'   => 1, // optional (admin id)
            ]);
        }


        // Run Role & Permission seeder
        $this->call(RolePermissionSeeder::class);





    }
}
