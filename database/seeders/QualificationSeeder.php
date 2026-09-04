<?php

namespace Database\Seeders;

use App\Models\Qualification;
use Illuminate\Database\Seeder;

class QualificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $qualifications = [
            ['ar' => 'دبلوم صحي', 'en' => 'Health Diploma'],
            ['ar' => 'بكالوريوس', 'en' => "Bachelor's Degree"],
            ['ar' => 'دبلوم عالي', 'en' => 'Postgraduate Diploma'],
            ['ar' => 'ماجستير', 'en' => "Master's Degree"],
            ['ar' => 'بورد / زمالة تخصصية', 'en' => 'Medical Board / Professional Fellowship'],
            ['ar' => 'دكتوراه', 'en' => 'Doctorate / PhD'],
            ['ar' => 'استشاري / زمالة دقيقة', 'en' => 'Consultant / Sub-specialty Fellowship'],
            ['ar' => 'أخرى', 'en' => 'Other'],
        ];

        foreach ($qualifications as $index => $qual) {
            Qualification::firstOrCreate(
                [
                    'name->ar' => $qual['ar'],
                ],
                [
                    'name'       => $qual,
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
                    'name'       => $action . ':Qualification',
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
