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
        Schema::table('posts', function (Blueprint $table) {
            // Drop the existing foreign key constraint
            $table->dropForeign(['comment_id']);

            // Make the comment_id column nullable
            $table->unsignedBigInteger('comment_id')->nullable()->change();

            // Add the foreign key constraint back
            $table->foreign('comment_id')->references('id')->on('comments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            // Drop the foreign key constraint
            $table->dropForeign(['comment_id']);

            // Make the comment_id column not nullable
            $table->unsignedBigInteger('comment_id')->nullable(false)->change();

            // Add the foreign key constraint back
            $table->foreign('comment_id')->references('id')->on('comments')->onDelete('cascade');
        });
    }
};
