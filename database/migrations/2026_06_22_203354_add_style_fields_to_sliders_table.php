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
        Schema::table('sliders', function (Blueprint $table) {
            $table->string('title_color', 7)->default('#222222')->after('title');
            $table->string('sub_title_color', 7)->default('#222222')->after('sub_title');
            $table->string('button_text')->nullable()->after('url');
            $table->string('button_text_color', 7)->default('#ffffff')->after('button_text');
            $table->string('button_background_color', 7)->default('#717fe0')->after('button_text_color');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sliders', function (Blueprint $table) {
            $table->dropColumn([
                'title_color',
                'sub_title_color',
                'button_text',
                'button_text_color',
                'button_background_color',
            ]);
        });
    }
};
