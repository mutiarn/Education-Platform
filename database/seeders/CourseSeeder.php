<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Lesson;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $coursesData = [
            [
                'title' => 'Advanced Web Development',
                'description' => 'Master modern web development with React, Node.js, and advanced JavaScript concepts. This comprehensive course covers everything from basic concepts to advanced patterns and best practices.',
                'instructor' => 'John Smith',
                'duration' => '12 weeks',
                'level' => 'Advanced',
                'students' => 1250,
                'rating' => 4.8,
                'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'topics' => ['React', 'Node.js', 'JavaScript', 'API Development', 'Database Design'],
                'price' => 199.99,
                'lessons' => [
                    ['title' => 'Introduction to Modern Web Development', 'duration' => '15:30', 'type' => 'video', 'is_free' => true],
                    ['title' => 'Setting Up Your Development Environment', 'duration' => '22:45', 'type' => 'video'],
                    ['title' => 'React Fundamentals and Components', 'duration' => '35:20', 'type' => 'video'],
                    ['title' => 'State Management with Redux', 'duration' => '28:15', 'type' => 'video'],
                    ['title' => 'Building RESTful APIs with Node.js', 'duration' => '42:30', 'type' => 'video'],
                    ['title' => 'Database Integration and MongoDB', 'duration' => '38:45', 'type' => 'video'],
                    ['title' => 'Authentication and Security', 'duration' => '31:20', 'type' => 'video'],
                    ['title' => 'Deployment and Production', 'duration' => '25:10', 'type' => 'video']
                ]
            ],
            [
                'title' => 'Data Science Fundamentals',
                'description' => 'Learn the fundamentals of data science including Python programming, statistical analysis, machine learning, and data visualization. Perfect for beginners looking to enter the field.',
                'instructor' => 'Sarah Johnson',
                'duration' => '10 weeks',
                'level' => 'Beginner',
                'students' => 890,
                'rating' => 4.6,
                'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'topics' => ['Python', 'Statistics', 'Machine Learning', 'Data Visualization', 'Pandas'],
                'price' => 149.99,
                'lessons' => [
                    ['title' => 'Introduction to Data Science', 'duration' => '18:45', 'type' => 'video', 'is_free' => true],
                    ['title' => 'Python Basics for Data Science', 'duration' => '32:20', 'type' => 'video'],
                    ['title' => 'Working with Pandas and NumPy', 'duration' => '45:15', 'type' => 'video'],
                    ['title' => 'Data Visualization with Matplotlib', 'duration' => '28:30', 'type' => 'video'],
                    ['title' => 'Statistical Analysis Fundamentals', 'duration' => '35:45', 'type' => 'video'],
                    ['title' => 'Introduction to Machine Learning', 'duration' => '40:20', 'type' => 'video']
                ]
            ],
            [
                'title' => 'Digital Marketing Mastery',
                'description' => 'Complete guide to digital marketing including SEO, social media marketing, content marketing, email marketing, and paid advertising strategies.',
                'instructor' => 'Mike Davis',
                'duration' => '8 weeks',
                'level' => 'Intermediate',
                'students' => 2100,
                'rating' => 4.7,
                'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'topics' => ['SEO', 'Social Media', 'Content Marketing', 'Email Marketing', 'PPC Advertising'],
                'price' => 129.99,
                'lessons' => [
                    ['title' => 'Digital Marketing Strategy Overview', 'duration' => '20:15', 'type' => 'video', 'is_free' => true],
                    ['title' => 'SEO Fundamentals and Best Practices', 'duration' => '38:45', 'type' => 'video'],
                    ['title' => 'Social Media Marketing Strategies', 'duration' => '32:30', 'type' => 'video'],
                    ['title' => 'Content Creation and Marketing', 'duration' => '28:20', 'type' => 'video'],
                    ['title' => 'Email Marketing Campaigns', 'duration' => '25:45', 'type' => 'video'],
                    ['title' => 'PPC and Google Ads', 'duration' => '35:10', 'type' => 'video']
                ]
            ],
            [
                'title' => 'Mobile App Development',
                'description' => 'Build native mobile applications using React Native. Learn navigation, state management, API integration, and app store deployment.',
                'instructor' => 'Alex Rodriguez',
                'duration' => '14 weeks',
                'level' => 'Intermediate',
                'students' => 1543,
                'rating' => 4.8,
                'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'topics' => ['React Native', 'Navigation', 'API Integration', 'App Store', 'Push Notifications'],
                'price' => 179.99,
                'lessons' => [
                    ['title' => 'React Native Setup and Environment', 'duration' => '25:30', 'type' => 'video', 'is_free' => true],
                    ['title' => 'Building Your First Mobile App', 'duration' => '42:15', 'type' => 'video'],
                    ['title' => 'Navigation and Routing', 'duration' => '35:45', 'type' => 'video'],
                    ['title' => 'State Management in Mobile Apps', 'duration' => '38:20', 'type' => 'video'],
                    ['title' => 'API Integration and Data Fetching', 'duration' => '32:10', 'type' => 'video'],
                    ['title' => 'Push Notifications Implementation', 'duration' => '28:45', 'type' => 'video'],
                    ['title' => 'App Store Deployment', 'duration' => '30:20', 'type' => 'video']
                ]
            ],
            [
                'title' => 'UI/UX Design Fundamentals',
                'description' => 'Learn the principles of user interface and user experience design. Master design thinking, wireframing, prototyping, and user research.',
                'instructor' => 'Emma Wilson',
                'duration' => '6 weeks',
                'level' => 'Beginner',
                'students' => 987,
                'rating' => 4.6,
                'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'topics' => ['Design Thinking', 'Wireframing', 'Prototyping', 'User Research', 'Figma'],
                'price' => 99.99,
                'lessons' => [
                    ['title' => 'Introduction to UI/UX Design', 'duration' => '22:30', 'type' => 'video', 'is_free' => true],
                    ['title' => 'Design Thinking Process', 'duration' => '28:45', 'type' => 'video'],
                    ['title' => 'User Research and Personas', 'duration' => '35:20', 'type' => 'video'],
                    ['title' => 'Wireframing and Prototyping', 'duration' => '40:15', 'type' => 'video'],
                    ['title' => 'Figma Mastery', 'duration' => '45:30', 'type' => 'video']
                ]
            ],
            [
                'title' => 'Python for Data Science',
                'description' => 'Dive into data science with Python. Learn pandas, numpy, matplotlib, and scikit-learn. Work with real datasets and build machine learning models.',
                'instructor' => 'Dr. Michael Chen',
                'duration' => '10 weeks',
                'level' => 'Intermediate',
                'students' => 2156,
                'rating' => 4.7,
                'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'topics' => ['Pandas', 'NumPy', 'Data Visualization', 'Machine Learning', 'Jupyter Notebooks'],
                'price' => 159.99,
                'lessons' => [
                    ['title' => 'Python Environment Setup', 'duration' => '20:15', 'type' => 'video', 'is_free' => true],
                    ['title' => 'Jupyter Notebooks Mastery', 'duration' => '25:30', 'type' => 'video'],
                    ['title' => 'NumPy for Numerical Computing', 'duration' => '38:45', 'type' => 'video'],
                    ['title' => 'Pandas Data Manipulation', 'duration' => '42:20', 'type' => 'video'],
                    ['title' => 'Data Visualization Techniques', 'duration' => '35:10', 'type' => 'video'],
                    ['title' => 'Machine Learning with Scikit-learn', 'duration' => '48:30', 'type' => 'video']
                ]
            ]
        ];

        foreach ($coursesData as $data) {
            $lessons = $data['lessons'];
            unset($data['lessons']);

            // Simpan course
            $course = Course::create($data);

            // Simpan lessons
            foreach ($lessons as $lesson) {
                $lesson['course_id'] = $course->id;
                Lesson::create($lesson);
            }
        }
    }
}
