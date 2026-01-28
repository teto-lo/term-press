<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\SceneTerm;
use App\Models\Term;
use Illuminate\Database\Seeder;

class TermSeeder extends Seeder
{
    public function run(): void
    {
        // カテゴリの準備
        $netCat = Category::firstOrCreate(['slug' => 'net-slang'], ['name' => 'ネットスラング']);
        $youthCat = Category::firstOrCreate(['slug' => 'youth-words'], ['name' => '若者言葉']);
        $bizCat = Category::firstOrCreate(['slug' => 'business'], ['name' => 'ビジネス']);
        $gamingCat = Category::firstOrCreate(['slug' => 'gaming'], ['name' => 'ゲーム用語']);
        $conCat = Category::firstOrCreate(['slug' => 'construction'], ['name' => '建築・土木']);
        $medCat = Category::firstOrCreate(['slug' => 'medical'], ['name' => '医療・介護']);
        $socCat = Category::firstOrCreate(['slug' => 'society'], ['name' => '政治・社会']);
        $acaCat = Category::firstOrCreate(['slug' => 'academic'], ['name' => '大学・アカデミック']);
        $finCat = Category::firstOrCreate(['slug' => 'finance'], ['name' => '金融・投資']);
        $mfgCat = Category::firstOrCreate(['slug' => 'manufacturing'], ['name' => '製造・工場']);
        $logCat = Category::firstOrCreate(['slug' => 'logistics'], ['name' => '物流・運輸']);
        $desCat = Category::firstOrCreate(['slug' => 'design'], ['name' => 'デザイン・クリエイティブ']);

        // シーン（どこで聞いた？）の準備
        $tiktokScene = SceneTerm::updateOrCreate(['slug' => 'tiktok'], [
            'name' => 'TikTok界隈',
            'svg' => '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 1 0 1 7.6 6.83 6.83 0 0 0 4.46-6.44v-6.1a9.29 9.29 0 0 0 3.8.84V6.69z"/></svg>'
        ]);
        $schoolScene = SceneTerm::updateOrCreate(['slug' => 'school'], [
            'name' => '学校・教室',
            'svg' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 3L1 9l11 6 9-4.91V17h2V9M5 13.18v4L12 21l7-3.82v-4L12 17l-7-3.82z"/></svg>'
        ]);
        $drinkingScene = SceneTerm::updateOrCreate(['slug' => 'drinking'], [
            'name' => '飲み会',
            'svg' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 10h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H7v-7z"/><path d="M7 10V6a4 4 0 0 0-4 4v3a2 2 0 0 0 2 2h2"/><path d="M7 17v4h12v-4"/></svg>' 
        ]);
        $partyScene = SceneTerm::updateOrCreate(['slug' => 'party'], [
            'name' => '飲み会・宴会',
            'svg' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>'
        ]);
        $officeScene = SceneTerm::updateOrCreate(['slug' => 'office'], [
            'name' => 'オフィス・会議',
            'svg' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"/><line x1="12" y1="4" x2="12" y2="20"/><line x1="4" y1="12" x2="20" y2="12"/><path d="M8 8h.01M16 8h.01M8 16h.01M16 16h.01"/></svg>'
        ]);
        $snsScene = SceneTerm::updateOrCreate(['slug' => 'sns'], [
            'name' => 'SNS全般',
            'svg' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>'
        ]);
        $gameScene = SceneTerm::updateOrCreate(['slug' => 'game-chat'], [
            'name' => 'ゲームチャット',
            'svg' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="6" width="20" height="12" rx="2"/><path d="M6 12h4m-2-2v4m14-2h-3"/></svg>'
        ]);
        $uniScene = SceneTerm::updateOrCreate(['slug' => 'university'], [
            'name' => '大学・研究室',
            'svg' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 0 6-1 6-1v-4"/></svg>'
        ]);
        $conScene = SceneTerm::updateOrCreate(['slug' => 'construction'], [
            'name' => '建設現場',
            'svg' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6z"/><path d="M8 14l4-4 4 4"/><path d="M16 10v8"/></svg>'
        ]);
        $hospScene = SceneTerm::updateOrCreate(['slug' => 'hospital'], [
            'name' => '病院・医療',
            'svg' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2v20M2 12h20"/></svg>'
        ]);
        $legalScene = SceneTerm::updateOrCreate(['slug' => 'legal'], [
            'name' => '法律・政治',
            'svg' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 3v18"/><path d="M5 10a7 7 0 0 0 14 0"/><line x1="12" y1="3" x2="12" y2="6"/></svg>'
        ]);
        $finScene = SceneTerm::updateOrCreate(['slug' => 'finance'], [
            'name' => '金融・投資',
            'svg' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>'
        ]);
        $mfgScene = SceneTerm::updateOrCreate(['slug' => 'manufacturing'], [
            'name' => '工場・製造',
            'svg' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 12h20"/><path d="M20 12v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-8"/><path d="M4 12V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v8"/></svg>'
        ]);
        $logScene = SceneTerm::updateOrCreate(['slug' => 'logistics'], [
            'name' => '物流・倉庫',
            'svg' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>'
        ]);
        $desScene = SceneTerm::updateOrCreate(['slug' => 'design'], [
            'name' => 'デザイン',
            'svg' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 19l7-7 3 3-7 7-3-3z"/><path d="M18 13l-1.5-7.5L2 2l3.5 14.5L13 18l5-5z"/><path d="M2 2l7.586 7.586"/><circle cx="11" cy="11" r="2"/></svg>'
        ]);

        // シーンをスラッグで検索できるようにマップ化
        $scenes = SceneTerm::all()->keyBy('slug');
        $categories = Category::all()->keyBy('slug');

        $jsonFiles = glob(database_path('seeders/data/*.json'));
        
        foreach ($jsonFiles as $jsonPath) {
            $terms = json_decode(file_get_contents($jsonPath), true);
            if (!$terms) continue;

            foreach ($terms as $termData) {
                $category = $categories->get($termData['category_slug']);
                if (!$category) {
                    continue;
                }

                $term = Term::updateOrCreate(
                    ['slug' => $termData['slug']],
                    [
                        'category_id' => $category->id,
                        'title' => $termData['title'],
                        'body' => $termData['body'],
                        'short_description' => $termData['short_description'],
                        'example' => $termData['example'],
                        'meta_description' => strip_tags($termData['short_description']),
                        'key_points' => $termData['key_points'] ?? null,
                        'usage_scenarios' => $termData['usage_scenarios'] ?? null,
                        'is_published' => true,
                    ]
                );

                // シーンの紐付け
                if (isset($termData['scene_slugs'])) {
                    $sceneIds = [];
                    foreach ($termData['scene_slugs'] as $sceneSlug) {
                        if ($scene = $scenes->get($sceneSlug)) {
                            $sceneIds[] = $scene->id;
                        }
                    }
                    $term->scenes()->sync($sceneIds);
                }
            }
        }
    }
}
