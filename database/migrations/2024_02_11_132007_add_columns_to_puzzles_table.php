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
        Schema::table('puzzles', function (Blueprint $table) {
            $table->integer('difficulty_rating')->default(1)->after('solution');
            $table->integer('points')->default(1)->after('solution');
            $table->integer('completed')->default(0)->after('solution');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('puzzles', function (Blueprint $table) {
            $table->dropColumn('difficulty_rating');
            $table->dropColumn('points');
            $table->dropColumn('completed');
        });
    }
};
