<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->timestamps();
        });

        Schema::create('terms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('body');
            $table->string('short_description', 100);
            $table->text('example')->nullable();
            $table->string('meta_description')->nullable();
            $table->text('custom_ad_code')->nullable();
            $table->boolean('is_published')->default(true);
            $table->timestamps();

            $table->index(['slug', 'is_published']);
            $table->index('category_id');
        });

        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('position', [
                'header',
                'after_title',
                'toc_top',
                'mid_content',
                'article_bottom',
                'before_related',
                'sidebar',
                'footer',
                'side_or_floating',
                'sidebar_fixed_left',
                'sidebar_fixed_right',
                'sp_bottom_fixed',
                'modal',
            ]);
            $table->text('code');
            $table->boolean('is_active')->default(true);
            $table->integer('priority')->default(0);
            $table->timestamps();

            $table->index(['position', 'is_active', 'priority']);
        });

        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->timestamps();
        });

        Schema::create('scene_terms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->text('svg')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->timestamps();
        });

        Schema::create('scene_term_term', function (Blueprint $table) {
            $table->id();
            $table->foreignId('scene_term_id')->constrained()->cascadeOnDelete();
            $table->foreignId('term_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        
            $table->unique(['scene_term_id', 'term_id']);
        });
        
    }

    public function down(): void
    {
        Schema::dropIfExists('scene_term_term');
        Schema::dropIfExists('scene_terms');
        Schema::dropIfExists('terms');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('ads');
        Schema::dropIfExists('site_settings');
    }
};
