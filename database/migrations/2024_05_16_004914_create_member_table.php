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
        Schema::create('member', function (Blueprint $table) {
            $table->bigIncrements('member_id');
            $table->string('no_identitas', 16)->primary();
            $table->string('password', 100)->primary();
            $table->text('alamat')->nullable(false);
            $table->string('no_hp', 15)->primary();
            $table->date('tgl_join')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member');
    }
};