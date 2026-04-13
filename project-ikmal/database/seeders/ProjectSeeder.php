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
                'description' => 'Sistem ERP untuk manajemen perusahaan',
                'teknologi' => 'PHP, Laravel',
                'image' => 'erp.png',
                'status' => 'active',
            ],
            [
                'title' => 'Sistem HRIS',
                'description' => 'Sistem HRIS untuk manajemen sumber daya manusia',
                'teknologi' => 'PHP, Laravel',
                'image' => 'hris.png',
                'status' => 'active',
            ],
            [
                'title' => 'Sistem SCM',
                'description' => 'Sistem SCM untuk manajemen rantai pasok',
                'teknologi' => 'PHP, Laravel',
                'image' => 'scm.png',
                'status' => 'progress',
            ],
            [
                'title' => 'Sistem WMS',
                'description' => 'Sistem WMS untuk manajemen gudang',
                'teknologi' => 'PHP, Laravel',
                'image' => 'wms.png',
                'status' => 'active',
            ],
            [
                'title' => 'Sistem SI',
                'description' => 'Sistem SI untuk manajemen sistem informasi',
                'teknologi' => 'PHP, Laravel',
                'image' => 'si.png',
                'status' => 'completed',
            ],
        ]);
    }
}