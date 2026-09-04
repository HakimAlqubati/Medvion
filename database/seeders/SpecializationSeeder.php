<?php

namespace Database\Seeders;

use App\Models\Specialization;
use Illuminate\Database\Seeder;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $specializations = [
            ['ar' => 'طب عام', 'en' => 'General Medicine'],
            ['ar' => 'طب الأسرة', 'en' => 'Family Medicine'],
            ['ar' => 'الطب الباطني', 'en' => 'Internal Medicine'],
            ['ar' => 'الجراحة العامة', 'en' => 'General Surgery'],
            ['ar' => 'طب الأطفال', 'en' => 'Pediatrics'],
            ['ar' => 'طب وجراحة النساء والولادة', 'en' => 'Obstetrics & Gynecology'],
            ['ar' => 'طب وجراحة الأسنان', 'en' => 'Dentistry'],
            ['ar' => 'الصيدلة السريرية والعامة', 'en' => 'Pharmacy & Clinical Pharmacy'],
            ['ar' => 'التمريض', 'en' => 'Nursing'],
            ['ar' => 'طب الطوارئ والحوادث', 'en' => 'Emergency Medicine'],
            ['ar' => 'التخدير والعناية المركزة', 'en' => 'Anesthesia & Intensive Care'],
            ['ar' => 'المختبرات الطبية والتحاليل', 'en' => 'Medical Laboratory Sciences'],
            ['ar' => 'الأشعة والتصوير الطبي', 'en' => 'Radiology & Medical Imaging'],
            ['ar' => 'العلاج الطبيعي والتأهيل الطبي', 'en' => 'Physical Therapy & Rehabilitation'],
            ['ar' => 'التغذية العلاجية', 'en' => 'Clinical Nutrition'],
            ['ar' => 'البصريات والعيون', 'en' => 'Optometry & Ophthalmology'],
            ['ar' => 'الصحة العامة والوبائيات', 'en' => 'Public Health & Epidemiology'],
            ['ar' => 'الإدارة والمعلوماتية الصحية', 'en' => 'Health Administration & Informatics'],
            ['ar' => 'التثقيف والإرشاد الصحي', 'en' => 'Health Education'],
            ['ar' => 'أخرى (تخصصات أخرى)', 'en' => 'Other Specialties'],
        ];

        foreach ($specializations as $index => $spec) {
            Specialization::firstOrCreate(
                [
                    'name->ar' => $spec['ar'],
                ],
                [
                    'name'       => $spec,
                    'is_active'  => true,
                    'sort_order' => $index + 1,
                ]
            );
        }

        // Register Shield permissions
        if (class_exists(\Spatie\Permission\Models\Permission::class)) {
            $actions = ['ViewAny', 'View', 'Create', 'Update', 'Delete', 'DeleteAny', 'Restore', 'ForceDelete', 'ForceDeleteAny', 'RestoreAny', 'Replicate', 'Reorder'];
            $roles = \Spatie\Permission\Models\Role::whereIn('name', ['super_admin', 'admin'])->get();
            foreach ($actions as $action) {
                $permission = \Spatie\Permission\Models\Permission::firstOrCreate([
                    'name'       => $action . ':Specialization',
                    'guard_name' => 'web',
                ]);
                foreach ($roles as $role) {
                    $role->givePermissionTo($permission);
                }
            }
            app(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
        }
    }
}
