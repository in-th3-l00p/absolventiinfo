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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string("last_name");
            $table->string("birth_name")->nullable();
            $table->unsignedSmallInteger("promotion_year");
            $table->char("class");
            $table->string("phone_number");

            $table->text("description")->nullable();
            $table->string("pfp_path")->nullable();
            $table->string("cv_link")->nullable();
            $table->string("facebook_link")->nullable();
            $table->string("linkedin_link")->nullable();
            $table->string("instagram_link")->nullable();

            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();

            $table->boolean("activated")->default(1);
            $table->enum("role", ["user", "admin"])->default("user");

            $table->timestamps();
            $table->softDeletes();
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
