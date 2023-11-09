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
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('名前');
            $table->string('email')->unique()->comment('メールアドレス');
            $table->timestamp('email_verified_at')->nullable()->comment('メール認証日時');
            $table->string('password')->comment('パスワード');
            $table->rememberToken()->comment('ログイン省略トークン');
            $table->boolean('male_or_female')->comment('男 or 女');
            $table->integer('birth')->comment('生年月日');
            $table->string('address')->comment('住所');
            $table->string('nickname')->comment('ニックネーム');
            $table->integer('height')->comment('身長');
            $table->integer('weight')->comment('体重');
            $table->string('Academic_background')->comment('学歴');
            $table->string('income')->comment('年収');
            $table->string('holiday')->comment('休日');
            $table->enum('tabacco')
            $table->
            $table->
            $table->
            $table->
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people');
    }
};
