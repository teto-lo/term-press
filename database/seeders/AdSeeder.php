<?php

namespace Database\Seeders;

use App\Models\Ad;
use Illuminate\Database\Seeder;

class AdSeeder extends Seeder
{
    public function run(): void
    {
        // 既存データをクリア
        Ad::truncate();

        $ads = [
            // ヘッダー (header) - 横長
            [
                'name'      => '共通：ヘッダー楽天アフィリエイト',
                'position'  => 'header',
                'code'      => '<div style="max-width:100%; overflow:hidden; text-align:center;"><script type="text/javascript">rakuten_design="slide";rakuten_affiliateId="50456315.a7115187.50456316.6028b4a0";rakuten_items="ctsmatch";rakuten_genreId="0";rakuten_size="728x200";rakuten_target="_blank";rakuten_theme="gray";rakuten_border="off";rakuten_auto_mode="on";rakuten_genre_title="off";rakuten_recommend="on";rakuten_ts="1769515073237";</script><script type="text/javascript" src="https://xml.affiliate.rakuten.co.jp/widget/js/rakuten_widget.js?20230106"></script></div>',
                'is_active' => false, // デフォルトOFF（必要に応じて有効化）
                'priority'  => 1,
            ],
            // 目次上 (toc_top) - 正方形
            [
                'name'      => '共通：目次上楽天アフィリエイト',
                'position'  => 'toc_top',
                'code'      => '<div style="text-align:center; margin-bottom:20px;"><script type="text/javascript">rakuten_design="slide";rakuten_affiliateId="50456315.a7115187.50456316.6028b4a0";rakuten_items="ctsmatch";rakuten_genreId="0";rakuten_size="250x250";rakuten_target="_blank";rakuten_theme="gray";rakuten_border="off";rakuten_auto_mode="on";rakuten_genre_title="off";rakuten_recommend="on";rakuten_ts="1769515105499";</script><script type="text/javascript" src="https://xml.affiliate.rakuten.co.jp/widget/js/rakuten_widget.js?20230106"></script></div>',
                'is_active' => true,
                'priority'  => 1,
            ],
            // フッター (footer) - 横長
            [
                'name'      => '共通：フッター楽天アフィリエイト',
                'position'  => 'footer',
                'code'      => '<div style="max-width:100%; overflow:hidden; text-align:center; padding:20px 0;"><script type="text/javascript">rakuten_design="slide";rakuten_affiliateId="50456315.a7115187.50456316.6028b4a0";rakuten_items="ctsmatch";rakuten_genreId="0";rakuten_size="728x200";rakuten_target="_blank";rakuten_theme="gray";rakuten_border="off";rakuten_auto_mode="on";rakuten_genre_title="off";rakuten_recommend="on";rakuten_ts="1769515073237";</script><script type="text/javascript" src="https://xml.affiliate.rakuten.co.jp/widget/js/rakuten_widget.js?20230106"></script></div>',
                'is_active' => true,
                'priority'  => 1,
            ],
            // 左サイド固定 (sidebar_fixed_left) - 縦長
            [
                'name'      => 'PC：左サイド楽天アフィリエイト',
                'position'  => 'sidebar_fixed_left',
                'code'      => '<div style="text-align:center;"><script type="text/javascript">rakuten_design="slide";rakuten_affiliateId="50456315.a7115187.50456316.6028b4a0";rakuten_items="ctsmatch";rakuten_genreId="0";rakuten_size="200x600";rakuten_target="_blank";rakuten_theme="gray";rakuten_border="off";rakuten_auto_mode="on";rakuten_genre_title="off";rakuten_recommend="on";rakuten_ts="1769514963077";</script><script type="text/javascript" src="https://xml.affiliate.rakuten.co.jp/widget/js/rakuten_widget.js?20230106"></script></div>',
                'is_active' => true,
                'priority'  => 1,
            ],
            // 右サイド固定 (sidebar_fixed_right) - 縦長
            [
                'name'      => 'PC：右サイド楽天アフィリエイト',
                'position'  => 'sidebar_fixed_right',
                'code'      => '<div style="text-align:center;"><script type="text/javascript">rakuten_design="slide";rakuten_affiliateId="50456315.a7115187.50456316.6028b4a0";rakuten_items="ctsmatch";rakuten_genreId="0";rakuten_size="200x600";rakuten_target="_blank";rakuten_theme="gray";rakuten_border="off";rakuten_auto_mode="on";rakuten_genre_title="off";rakuten_recommend="on";rakuten_ts="1769514963077";</script><script type="text/javascript" src="https://xml.affiliate.rakuten.co.jp/widget/js/rakuten_widget.js?20230106"></script></div>',
                'is_active' => true,
                'priority'  => 1,
            ],
            // SP右下固定 (sp_bottom_fixed) - 正方形
            [
                'name'      => 'SP：右下楽天アフィリエイト',
                'position'  => 'sp_bottom_fixed',
                'code'      => '<div style="text-align:center;"><script type="text/javascript">rakuten_design="slide";rakuten_affiliateId="50456315.a7115187.50456316.6028b4a0";rakuten_items="ctsmatch";rakuten_genreId="0";rakuten_size="250x250";rakuten_target="_blank";rakuten_theme="gray";rakuten_border="off";rakuten_auto_mode="on";rakuten_genre_title="off";rakuten_recommend="on";rakuten_ts="1769515105499";</script><script type="text/javascript" src="https://xml.affiliate.rakuten.co.jp/widget/js/rakuten_widget.js?20230106"></script></div>',
                'is_active' => true,
                'priority'  => 1,
            ],
            // モーダル (modal) - 正方形
            [
                'name'      => '共通：モーダル楽天アフィリエイト',
                'position'  => 'modal',
                'code'      => '<div style="text-align:center;"><script type="text/javascript">rakuten_design="slide";rakuten_affiliateId="50456315.a7115187.50456316.6028b4a0";rakuten_items="ctsmatch";rakuten_genreId="0";rakuten_size="250x250";rakuten_target="_blank";rakuten_theme="gray";rakuten_border="off";rakuten_auto_mode="on";rakuten_genre_title="off";rakuten_recommend="on";rakuten_ts="1769515105499";</script><script type="text/javascript" src="https://xml.affiliate.rakuten.co.jp/widget/js/rakuten_widget.js?20230106"></script></div>',
                'is_active' => true,
                'priority'  => 1,
            ],
            // 記事下 (article_bottom) - 正方形
            [
                'name'      => '共通:記事下楽天アフィリエイト',
                'position'  => 'article_bottom',
                'code'      => '<div style="text-align:center; margin:20px 0;"><script type="text/javascript">rakuten_design="slide";rakuten_affiliateId="50456315.a7115187.50456316.6028b4a0";rakuten_items="ctsmatch";rakuten_genreId="0";rakuten_size="250x250";rakuten_target="_blank";rakuten_theme="gray";rakuten_border="off";rakuten_auto_mode="on";rakuten_genre_title="off";rakuten_recommend="on";rakuten_ts="1769515105499";</script><script type="text/javascript" src="https://xml.affiliate.rakuten.co.jp/widget/js/rakuten_widget.js?20230106"></script></div>',
                'is_active' => true,
                'priority'  => 1,
            ],
            // 記事上 (article_top) - 正方形
            [
                'name'      => '共通:記事上楽天アフィリエイト',
                'position'  => 'article_top',
                'code'      => '<div style="text-align:center; margin:20px 0;"><script type="text/javascript">rakuten_design="slide";rakuten_affiliateId="50456315.a7115187.50456316.6028b4a0";rakuten_items="ctsmatch";rakuten_genreId="0";rakuten_size="250x250";rakuten_target="_blank";rakuten_theme="gray";rakuten_border="off";rakuten_auto_mode="on";rakuten_genre_title="off";rakuten_recommend="on";rakuten_ts="1769515105499";</script><script type="text/javascript" src="https://xml.affiliate.rakuten.co.jp/widget/js/rakuten_widget.js?20230106"></script></div>',
                'is_active' => true,
                'priority'  => 1,
            ],
            // コンテンツ中 (mid_content) - 正方形
            [
                'name'      => '共通:コンテンツ中楽天アフィリエイト',
                'position'  => 'mid_content',
                'code'      => '<div style="text-align:center; margin:20px 0;"><script type="text/javascript">rakuten_design="slide";rakuten_affiliateId="50456315.a7115187.50456316.6028b4a0";rakuten_items="ctsmatch";rakuten_genreId="0";rakuten_size="250x250";rakuten_target="_blank";rakuten_theme="gray";rakuten_border="off";rakuten_auto_mode="on";rakuten_genre_title="off";rakuten_recommend="on";rakuten_ts="1769515105499";</script><script type="text/javascript" src="https://xml.affiliate.rakuten.co.jp/widget/js/rakuten_widget.js?20230106"></script></div>',
                'is_active' => true,
                'priority'  => 1,
            ],
            // 関連記事前 (before_related) - 正方形
            [
                'name'      => '共通:関連記事前楽天アフィリエイト',
                'position'  => 'before_related',
                'code'      => '<div style="text-align:center; margin:20px 0;"><script type="text/javascript">rakuten_design="slide";rakuten_affiliateId="50456315.a7115187.50456316.6028b4a0";rakuten_items="ctsmatch";rakuten_genreId="0";rakuten_size="250x250";rakuten_target="_blank";rakuten_theme="gray";rakuten_border="off";rakuten_auto_mode="on";rakuten_genre_title="off";rakuten_recommend="on";rakuten_ts="1769515105499";</script><script type="text/javascript" src="https://xml.affiliate.rakuten.co.jp/widget/js/rakuten_widget.js?20230106"></script></div>',
                'is_active' => true,
                'priority'  => 1,
            ],
        ];

        foreach ($ads as $ad) {
            Ad::create($ad);
        }
    }
}
