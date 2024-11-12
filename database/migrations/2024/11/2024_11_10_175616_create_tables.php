<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id('course_id');
            $table->string('name');
            $table->timestamp('timestamp')->useCurrent();
            $table->timestamps();
        });

        Schema::create('domain_categories', function (Blueprint $table) {
            $table->id('category_id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('exercises', function (Blueprint $table) {
            $table->id('exercise_id');
            $table->foreignId('course_id')->constrained('courses', 'course_id')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('domain_categories', 'category_id')->onDelete('cascade');
            $table->string('name');
            $table->integer('points');
            $table->timestamps();
            $table->index([
                'category_id',
                'exercise_id',
            ]);
        });

        Schema::create('course_exercise', function (Blueprint $table) {
            $table->id('course_exercise_id');
            $table->foreignId('course_id')->constrained('courses', 'course_id')->onDelete('cascade');
            $table->foreignId('exercise_id')->constrained('exercises', 'exercise_id')->onDelete('cascade');
            $table->timestamps();
            $table->index([
                'course_id',
                'exercise_id',
            ]);
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->id('session_id');
            $table->foreignId('course_id')->constrained('courses', 'course_id')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users', 'user_id')->onDelete('cascade');
            $table->timestamp('timestamp')->useCurrent();
            $table->integer('score')->nullable();
            $table->string('normalized_score')->nullable();
            $table->timestamps();
            $table->index(['user_id', 'timestamp']);
        });

        Schema::create('scores', function (Blueprint $table) {
            $table->id('score_id');
            $table->foreignId('session_id')->constrained('sessions', 'session_id')->onDelete('cascade');
            $table->foreignId('exercise_id')->constrained('exercises', 'exercise_id')->onDelete('cascade');
            $table->integer('points_scored');
            $table->integer('start_difficulty');
            $table->integer('end_difficulty');
            $table->timestamps();
            $table->index([
                'exercise_id',
                'session_id'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('sessions', function (Blueprint $table) {
            $table->dropIfExists();
        });
        Schema::table('scores', function (Blueprint $table) {
            $table->dropIfExists();
        });
        Schema::table('exercises', function (Blueprint $table) {
            $table->dropIfExists();
        });
        Schema::table('domain_categories', function (Blueprint $table) {
            $table->dropIfExists();
        });
        Schema::table('courses', function (Blueprint $table) {
            $table->dropIfExists();
        });
    }
};
