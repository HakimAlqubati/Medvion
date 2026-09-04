<?php

use App\Enums\UserTypeEnum;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('user_type', 30)
                ->default(UserTypeEnum::STUDENT->value)
                ->after('email')
                ->index();
        });

        // Automatically set existing admins/staff to 'admin'
        try {
            $adminRoleIds = DB::table('roles')
                ->whereIn('name', ['admin', 'super_admin', 'editor', 'moderator'])
                ->pluck('id');

            if ($adminRoleIds->isNotEmpty()) {
                $adminUserIds = DB::table('model_has_roles')
                    ->whereIn('role_id', $adminRoleIds)
                    ->where('model_type', User::class)
                    ->pluck('model_id');

                if ($adminUserIds->isNotEmpty()) {
                    DB::table('users')
                        ->whereIn('id', $adminUserIds)
                        ->update(['user_type' => UserTypeEnum::ADMIN->value]);
                }
            }

            // Ensure known administrator emails have user_type = admin
            DB::table('users')
                ->where('email', 'like', 'admin@%')
                ->orWhere('email', 'hakimahmed123321@gmail.com')
                ->update(['user_type' => UserTypeEnum::ADMIN->value]);
        } catch (\Throwable $e) {
            // Ignore if tables are empty during initial setup
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('user_type');
        });
    }
};
