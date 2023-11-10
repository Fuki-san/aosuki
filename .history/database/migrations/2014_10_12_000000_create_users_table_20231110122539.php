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
            $table->string('name')->comment('名前');
            $table->string('email')->unique()->comment('通常メールアドレス');
            $table->timestamp('email_verified_at')->nullable()->comment('メール認証日時');
            $table->string('password')->comment('パスワード');
            $table->rememberToken()->comment('ログイン省略トークン');
            // 'profile_photo_path' カラムを追加
            $table->string('profile_photo_path')->nullable();
            // 'current_team_id' カラムを追加
            $table->unsignedBigInteger('current_team_id')->nullable();
            
            $table->enum('gender', ['male', 'female'])->comment('男性 or 女性');
            $table->date('birth')->default('2023-01-01'); // 適切なデフォルト値を使用してください
            $table->string('address')->comment('住所');
            $table->string('nickname')->comment('ニックネーム');
            $table->integer('height')->comment('身長');
            $table->integer('weight')->comment('体重');
            $table->string('Academic_background')->comment('学歴');
            $table->string('income')->comment('年収');
            $table->string('holiday')->comment('休日');
            $table->enum('smoking_habit', ['not_at_all', 'occasionally', 'heavy']);
            $table->enum('goals', ['love', 'info', 'aoharu', 'enjoy', 'somehow', 'friend']);
            $table->binary('image_data')->comment('画像データ');
            $table->string('academic_email')->comment('学生メールアドレス');
            $table->timestamps();
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
