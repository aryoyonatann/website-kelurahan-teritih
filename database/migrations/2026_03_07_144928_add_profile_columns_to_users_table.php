<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('rt', 10)->nullable()->after('tanggal_lahir');
            $table->string('rw', 10)->nullable()->after('rt');
            $table->string('kelurahan', 100)->nullable()->after('rw');
            $table->string('kecamatan', 100)->nullable()->after('kelurahan');
            $table->string('foto', 255)->nullable()->after('kecamatan');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['rt', 'rw', 'kelurahan', 'kecamatan', 'foto']);
        });
    }
};