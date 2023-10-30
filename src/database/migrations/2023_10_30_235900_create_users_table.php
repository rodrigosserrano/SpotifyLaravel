<?php

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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->uuid()->index();
            $table->boolean('deleted')->default(false);
            $table->timestamps();
            $table->rememberToken();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('cpf', 11)->nullable()->unique();
            $table->date('birth_date')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('email_verified')->default(false);
            $table->text('picture_link')->nullable();
            $table->string('password');
            $table->boolean('has_password')->default(true);

            $table->foreignId('user_status_id')->references('id')->on('user_status');
            $table->foreignId('bills_id')->nullable()->references('id')->on('bills');
            $table->foreignId('connected_account_id')->nullable()->references('id')->on('connected_accounts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
