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
            $table->string('phone')->nullable()->after('position');
            $table->string('bank_name')->nullable()->after('phone');
            $table->string('bank_id')->nullable()->after('bank_name');
            $table->string('account_no')->nullable()->after('bank_id');
            $table->string('address')->nullable()->after('account_no');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('phone');
            $table->dropColumn('bank_name');
            $table->dropColumn('bank_id');
            $table->dropColumn('account_no');
            $table->dropColumn('address');
        });
    }
};