<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class JobsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed users table
        DB::connection('mysql_second')->statement('TRUNCATE TABLE users');
        DB::connection('mysql_second')->table('users')->insert([
            [
                'name' => 'Alice',
                'email' => 'alice@example.com',
                'password' => Hash::make('Test1234'),
                'created' => now(),
                'modified' => now()
            ],
            [
                'name' => 'John',
                'email' => 'john@example.com',
                'password' => Hash::make('Test1234'),
                'created' => now(),
                'modified' => now()
            ]
        ]);

        // Seed job_categories table
        DB::connection('mysql_second')->statement('TRUNCATE TABLE job_categories');
        DB::connection('mysql_second')->table('job_categories')->insert([
            [
                'key' => 'education',
                'name' => '教育',
                'type' => 1,
                'sort_order' => 1,
                'created' => now(),
                'modified' => now(),
                'created_by' => 1,
                'modified_by' => 1
            ],
            [
                'key' => 'it',
                'name' => '情報技術',
                'type' => 1,
                'sort_order' => 2,
                'created' => now(),
                'modified' => now(),
                'created_by' => 1,
                'modified_by' => 1
            ],
            [
                'key' => 'hospitality',
                'name' => 'ホスピタリティ',
                'type' => 1,
                'sort_order' => 3,
                'created' => now(),
                'modified' => now(),
                'created_by' => 2,
                'modified_by' => 2
            ],
            [
                'key' => 'marketing_sales',
                'name' => 'マーケティングと販売',
                'type' => 1,
                'sort_order' => 4,
                'created' => now(),
                'modified' => now(),
                'created_by' => 2,
                'modified_by' => 2
            ]
        ]);

        // Seed job_types table
        DB::connection('mysql_second')->statement('TRUNCATE TABLE job_types');
        DB::connection('mysql_second')->table('job_types')->insert([
            [
                'key' => 'fulltime',
                'name' => 'フルタイム',
                'type' => 1,
                'sort_order' => 1,
                'created' => now(),
                'modified' => now(),
                'created_by' => 1,
                'modified_by' => 1
            ],
            [
                'key' => 'parttime',
                'name' => 'パートタイム',
                'type' => 1,
                'sort_order' => 2,
                'created' => now(),
                'modified' => now(),
                'created_by' => 1,
                'modified_by' => 1
            ],
            [
                'key' => 'contract',
                'name' => '契約',
                'type' => 1,
                'sort_order' => 3,
                'created' => now(),
                'modified' => now(),
                'created_by' => 2,
                'modified_by' => 2
            ],
            [
                'key' => 'internship',
                'name' => 'インターンシップ',
                'type' => 1,
                'sort_order' => 4,
                'created' => now(),
                'modified' => now(),
                'created_by' => 2,
                'modified_by' => 2
            ]
        ]);

        // Seed jobs table
        DB::connection('mysql_second')->statement('TRUNCATE TABLE jobs');
        DB::connection('mysql_second')->table('jobs')->insert([
            [
                'name' => '教師',
                'job_category_id' => 1,
                'job_type_id' => 1,
                'academic_degree_master' => 1,
                'academic_degree_bachelor' => 1,
                'salary_range_average' => 6000.00,
                'estimated_total_workers' => 5,
                'sort_order' => 1,
                'publish_status' => 1,
                'version' => 1,
                'created' => now(),
                'modified' => now(),
                'created_by' => 1,
                'modified_by' => 1
            ],
            [
                'name' => 'ソフトウェア開発者',
                'job_category_id' => 2,
                'job_type_id' => 3,
                'academic_degree_master' => 1,
                'academic_degree_bachelor' => 1,
                'salary_range_average' => 8000.00,
                'estimated_total_workers' => 8,
                'sort_order' => 2,
                'publish_status' => 1,
                'version' => 2,
                'created' => now(),
                'modified' => now(),
                'created_by' => 1,
                'modified_by' => 1
            ],
            [
                'name' => '営業担当者',
                'job_category_id' => 4,
                'job_type_id' => 1,
                'academic_degree_master' => 0,
                'academic_degree_bachelor' => 0,
                'salary_range_average' => 5500.00,
                'estimated_total_workers' => 5,
                'sort_order' => 3,
                'publish_status' => 1,
                'version' => 1,
                'created' => now(),
                'modified' => now(),
                'created_by' => 2,
                'modified_by' => 2
            ],
            [
                'name' => 'キャビンアテンダント',
                'job_category_id' => 3,
                'job_type_id' => 1,
                'academic_degree_master' => 0,
                'academic_degree_bachelor' => 1,
                'salary_range_average' => 6500.00,
                'estimated_total_workers' => 7,
                'sort_order' => 4,
                'publish_status' => 1,
                'version' => 2,
                'created' => now(),
                'modified' => now(),
                'created_by' => 2,
                'modified_by' => 2
            ]
        ]);

        // Seed jobs_media table
        DB::connection('mysql_second')->statement('TRUNCATE TABLE jobs_media');
        DB::connection('mysql_second')->table('jobs_media')->insert([
            [
                'name' => '教師_img_1',
                'type' => 1,
                'url' => 'https://motto-jp.com/media/wp-content/uploads/2021/04/AdobeStock_74877484.jpeg',
                'job_id' => 1,
                'created' => now(),
                'modified' => now(),
                'created_by' => 1,
                'modified_by' => 1
            ],
            [
                'name' => 'キャビンアテンダント_img_1',
                'type' => 1,
                'url' => 'https://www.skb.ac.jp/top/wp-content/uploads/2018/08/CA5.jpg',
                'job_id' => 4,
                'created' => now(),
                'modified' => now(),
                'created_by' => 2,
                'modified_by' => 2
            ]
        ]);

        // Seed jobs_personalities table
        DB::connection('mysql_second')->statement('TRUNCATE TABLE jobs_personalities');
        DB::connection('mysql_second')->table('jobs_personalities')->insert([
            [
                'key' => 'thinker',
                'name' => '考える人',
                'type' => 1,
                'job_id' => 2,
                'created' => now(),
                'modified' => now(),
                'created_by' => 1,
                'modified_by' => 1
            ],
            [
                'key' => 'helper',
                'name' => 'ヘルパー',
                'type' => 1,
                'job_id' => 4,
                'created' => now(),
                'modified' => now(),
                'created_by' => 2,
                'modified_by' => 2
            ]
        ]);

        // Seed jobs_practical_skills table
        DB::connection('mysql_second')->statement('TRUNCATE TABLE jobs_practical_skills');
        DB::connection('mysql_second')->table('jobs_practical_skills')->insert([
            [
                'key' => 'technical-skills',
                'name' => '技術スキル',
                'type' => 1,
                'job_id' => 2,
                'created' => now(),
                'modified' => now(),
                'created_by' => 1,
                'modified_by' => 1
            ],
            [
                'key' => 'customer-service-skills',
                'name' => 'カスタマーサービススキル',
                'type' => 1,
                'job_id' => 4,
                'created' => now(),
                'modified' => now(),
                'created_by' => 2,
                'modified_by' => 2
            ],
            [
                'key' => 'communication-skills',
                'name' => 'コミュニケーションスキル',
                'type' => 1,
                'job_id' => 1,
                'created' => now(),
                'modified' => now(),
                'created_by' => 1,
                'modified_by' => 1
            ]
        ]);

        // Seed jobs_basic_abilities table
        DB::connection('mysql_second')->statement('TRUNCATE TABLE jobs_basic_abilities');
        DB::connection('mysql_second')->table('jobs_basic_abilities')->insert([
            [
                'key' => 'technical-skills',
                'name' => '技術スキル',
                'type' => 1,
                'job_id' => 2,
                'created' => now(),
                'modified' => now(),
                'created_by' => 1,
                'modified_by' => 1
            ],
            [
                'key' => 'customer-service-skills',
                'name' => 'カスタマーサービススキル',
                'type' => 1,
                'job_id' => 4,
                'created' => now(),
                'modified' => now(),
                'created_by' => 2,
                'modified_by' => 2
            ],
            [
                'key' => 'communication-skills',
                'name' => 'コミュニケーションスキル',
                'type' => 1,
                'job_id' => 1,
                'created' => now(),
                'modified' => now(),
                'created_by' => 1,
                'modified_by' => 1
            ]
        ]);

        // Seed jobs_affiliates table
        DB::connection('mysql_second')->statement('TRUNCATE TABLE jobs_affiliates');
        DB::connection('mysql_second')->table('jobs_affiliates')->insert([
            [
                'key' => 'development-tools',
                'name' => '開発ツール',
                'type' => 1,
                'job_id' => 2,
                'created' => now(),
                'modified' => now(),
                'created_by' => 1,
                'modified_by' => 1
            ],
            [
                'key' => 'helpdesk-software',
                'name' => 'ヘルプデスク ソフトウェア',
                'type' => 1,
                'job_id' => 4,
                'created' => now(),
                'modified' => now(),
                'created_by' => 2,
                'modified_by' => 2
            ],
            [
                'key' => 'technical-abilities',
                'name' => '技術力',
                'type' => 2,
                'job_id' => 2,
                'created' => now(),
                'modified' => now(),
                'created_by' => 1,
                'modified_by' => 1
            ],
            [
                'key' => 'work-experience',
                'name' => '実務経験',
                'type' => 2,
                'job_id' => 1,
                'created' => now(),
                'modified' => now(),
                'created_by' => 1,
                'modified_by' => 1
            ],
            [
                'key' => 'senior-level',
                'name' => '上級レベル',
                'type' => 3,
                'job_id' => 2,
                'created' => now(),
                'modified' => now(),
                'created_by' => 1,
                'modified_by' => 1
            ]
        ]);
    }
}