<?php

namespace Database\Seeders;

use App\Models\Projects;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Projects::insert([
        [
            'title' => 'Sistem ERP',
            'description' => 'Sistem ERP untuk perusahaan Manufakturing',
            'teknologi' => 'Laravel, PHP',
            'image' => 'erp.png',
            'status' => 'active'
        ], [
            'title' => 'Sistem HRIS',
            'description' => 'Sistem HRIS untuk perusahaan Manufakturing',
            'teknologi' => 'Node JS, PHP',
            'image' => 'hris.png',
            'status' => 'completed'
        ], [
            'title' => 'Sistem SCM',
            'description' => 'Sistem SCM untuk perusahaan Manufakturing',
            'teknologi' => 'Laravel, PHP',
            'image' => 'scm.png',
            'status' => 'in_progress'
        ], [
            'title' => 'Sistem WMS',
            'description' => 'Sistem WMS untuk perusahaan Manufakturing',
            'teknologi' => 'Laravel, PHP',
            'image' => 'wms.png',
            'status' => 'active'
        ]]);
    }
}
