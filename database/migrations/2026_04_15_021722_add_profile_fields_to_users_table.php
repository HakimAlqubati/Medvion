<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone', 30)->nullable()->after('email');
            $table->string('city', 100)->nullable()->after('phone');
            $table->string('address')->nullable()->after('city');
            $table->string('specialty', 150)->nullable()->after('address');
            $table->string('qualification', 150)->nullable()->after('specialty');
            $table->smallInteger('graduation_year')->nullable()->after('qualification');
            $table->string('workplace', 200)->nullable()->after('graduation_year');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'phone',
                'city',
                'address',
                'specialty',
                'qualification',
                'graduation_year',
                'workplace',
            ]);
        });
    }
};
