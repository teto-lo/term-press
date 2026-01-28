<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Term;
use App\Models\SceneTerm;
use App\Models\Ad;

class DemoSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |------------------------------------------------------------------
        | カテゴリ（slug 英語固定）
        |------------------------------------------------------------------
        */
        $categoryDefs = [
            'it'           => 'IT・テクノロジー',
            'sns'          => 'SNS・ネット',
            'business'     => 'ビジネス',
            'marketing'    => 'マーケティング',
            'school'       => '学校・授業',
            'daily'        => '日常会話',
        ];

        $categories = collect($categoryDefs)->map(function ($name, $slug) {
            return Category::firstOrCreate(
                ['slug' => $slug],
                ['name' => $name]
            );
        });

        /*
        |------------------------------------------------------------------
        | シーン（slug 英語固定）
        |------------------------------------------------------------------
        */
        $sceneDefs = [
            'sns'        => 'SNSで見た',
            'class'      => '授業で聞いた',
            'meeting'    => '会議で出てきた',
            'news'       => 'ニュースで見た',
            'parttime'   => 'バイト先で聞いた',
            'friends'    => '友達との会話',
            'jobhunt'    => '就活・面接',
            'engineer'   => 'エンジニア界隈',
        ];

        $scenes = collect($sceneDefs)->map(function ($name, $slug) {
            return SceneTerm::firstOrCreate(
                ['slug' => $slug],
                [
                    'name' => $name,
                    'description' => "{$name}ときによく出てくる用語をまとめています。",
                    'svg' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><circle cx="12" cy="12" r="10"/></svg>',
                    'meta_title' => "{$name}でよく聞く用語一覧",
                    'meta_description' => "{$name}で登場しがちな言葉をわかりやすく解説します。",
                ]
            );
        });

        /*
        |------------------------------------------------------------------
        | 用語（30件）
        |------------------------------------------------------------------
        */
        collect(range(1, 30))->each(function ($i) use ($categories, $scenes) {
            $category = $categories->random();

            $term = Term::firstOrCreate(
                ['slug' => "sample-term-{$i}"],
                [
                    'category_id' => $category->id,
                    'title' => "サンプル用語{$i}",
                    'body' => "これはサンプル用語{$i}の本文です。\n\nざっくり理解できる説明を書きます。",
                    'short_description' => "サンプル用語{$i}を超ざっくり解説。",
                    'example' => "例：サンプル用語{$i}ってこういう意味なんだ。",
                    'meta_description' => "サンプル用語{$i}の意味を今さら聞けない人向けに解説。",
                    'is_published' => true,
                ]
            );

            $term->scenes()->sync(
                $scenes->random(rand(1, 3))->pluck('id')->toArray()
            );
        });

        /*
        |------------------------------------------------------------------
        | 広告（全ポジション）
        |------------------------------------------------------------------
        */
        $ads = [
            'header'            => '【ヘッダー広告】今なら無料で学べる！',
            'after_title'       => '【タイトル直下広告】',
            'toc_top'           => '【目次上広告】',
            'mid_content'       => '【本文途中広告】',
            'article_bottom'    => '【記事下広告】',
            'before_related'    => '【関連記事前広告】',
            'sidebar'           => '【サイド広告】',
            'footer'            => '【フッター広告】',
            'side_or_floating'  => '【追従広告】',
        ];

        foreach ($ads as $position => $text) {
            Ad::firstOrCreate(
                ['position' => $position],
                [
                    'name' => strtoupper($position) . ' AD',
                    'code' => "<div style='padding:16px;background:#f9fafb;border-radius:12px;text-align:center;font-weight:bold;'>{$text}</div>",
                    'is_active' => true,
                    'priority' => 10,
                ]
            );
        }
    }
}
