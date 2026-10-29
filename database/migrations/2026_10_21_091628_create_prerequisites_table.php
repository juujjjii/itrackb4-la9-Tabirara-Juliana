<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('prerequisites', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::table('subjects', function (Blueprint $table) {
            $table->dropColumn('prerequisite');      // your old text column
        });

        Schema::table('subjects', function (Blueprint $table) {
            $table->foreignId('prerequisite_id')->constrained();
        });
    }

    public function down(): void
    {
        Schema::table('subjects', function (Blueprint $table) {
            $table->dropConstrainedForeignId('prerequisite_id');
        });

        Schema::table('subjects', function (Blueprint $table) {
            $table->string('prerequisite')->nullable();
        });

        Schema::dropIfExists('prerequisites');
    }
};