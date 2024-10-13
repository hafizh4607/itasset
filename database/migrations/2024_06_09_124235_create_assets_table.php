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
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('asset_id');
            $table->string('name');
            $table->string('type');
            $table->string('os')->nullable();
            $table->string('processor')->nullable();
            $table->string('ram')->nullable();
            $table->string('storage')->nullable();
            $table->string('sn')->nullable();
            $table->string('antivirus')->nullable();
            $table->string('port')->nullable();
            $table->string('key')->nullable();
            $table->string('license')->nullable();
            $table->string('expired')->nullable();
            $table->enum('type_asset', ['laptop', 'pc', 'server', 'router', 'switch', 'ap', 'license']);
            $table->foreignId('employee_id')->nullable()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
 