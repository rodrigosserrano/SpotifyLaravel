<?php

use App\Entities\UserStatus;
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
        Schema::create('user_status', function (Blueprint $table) {
            $table->id();
            $table->uuid()->index();
            $table->boolean('deleted')->default(false);
            $table->timestamps();
            $table->string('name');
        });

        UserStatus::create(['id' => 1, 'name' => 'Complete', 'uuid' => '4762f02c-4f16-434e-a894-0bf847a62e63']);
        UserStatus::create(['id' => 2, 'name' => 'Pending', 'uuid' => 'd6d59b54-ec62-43cb-a4ff-bbfae1079dbf']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_status');
    }
};
