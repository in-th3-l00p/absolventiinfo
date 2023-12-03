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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            // post part
            $table->string("title")->unique();
            $table->text("content");
            $table->enum("visibility", ["public", "private"])->default("private");

            // period
            $table->dateTime("start");
            $table->dateTime("end");

            // join part
            $table->boolean("can_join");
            $table->integer("max_joins")->nullable();
            $table->dateTime("join_expire")->nullable();

            $table->foreignIdFor(\App\Models\User::class);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
