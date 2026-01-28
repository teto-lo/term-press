@extends('front.layout')

@section('title', 'ホーム')
@section('meta_description', '今さら聞けないを、今すぐ理解。SNS、授業、バイト先で出てくる「知らないと会話が止まる言葉」を3分で理解。')

@section('content')
    <!-- ヒーローセクション -->
    <section class="text-center mb-20 md:mb-28 animate-fade-in-up">
        <div class="max-w-5xl mx-auto">
            <!-- ステータスバッジ -->
            <div
                class="inline-flex items-center gap-3 px-6 py-3 glass border border-white/60 rounded-full mb-8 shadow-xl hover:shadow-2xl transition-all hover:scale-105">
                <div class="relative">
                    <div class="w-3 h-3 bg-gradient-to-r from-green-400 to-emerald-500 rounded-full animate-pulse"></div>
                    <div class="absolute inset-0 w-3 h-3 bg-green-400 rounded-full animate-ping"></div>
                </div>
                <span
                    class="text-sm font-black bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
                    {{ \App\Models\Term::published()->count() }}語 掲載中
                </span>
                <div class="flex gap-1">
                    <span class="text-lg">🔥</span>
                </div>
            </div>

            <!-- メインコピー -->
            <h1 class="text-5xl md:text-7xl font-black text-gray-900 mb-6 leading-tight tracking-tight">
                今さら<span class="relative inline-block">
                    <span
                        class="relative z-10 bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 bg-clip-text text-transparent neon-text">聞けない</span>
                    <span
                        class="absolute bottom-2 left-0 w-full h-4 bg-gradient-to-r from-indigo-400/30 via-purple-400/30 to-pink-400/30 blur-sm"></span>
                </span>を、<br>
                <span class="relative inline-block">
                    <span
                        class="relative z-10 bg-gradient-to-r from-pink-600 via-purple-600 to-indigo-600 bg-clip-text text-transparent neon-text">今すぐ理解</span>
                    <span
                        class="absolute bottom-2 left-0 w-full h-4 bg-gradient-to-r from-pink-400/30 via-purple-400/30 to-indigo-400/30 blur-sm"></span>
                </span>
            </h1>

            <!-- サブコピー -->
            <p class="text-xl md:text-2xl text-gray-700 mb-10 leading-relaxed font-semibold">
                SNS・授業・バイト先で出てくる<br class="hidden md:block">
                「<span class="text-indigo-600">知らないと会話が止まる</span>言葉」を<span class="font-black text-pink-600">3分</span>で理解 ⚡
            </p>

            <!-- 特徴バッジ -->
            <div class="flex flex-wrap items-center justify-center gap-4 mb-10">
                <div
                    class="group px-6 py-3 glass border border-white/60 rounded-2xl hover:shadow-xl transition-all hover:scale-105 hover:border-indigo-300">
                    <div class="flex items-center gap-2">
                        <span class="text-2xl">⚡</span>
                        <span class="text-sm font-bold text-gray-700">超速3分で理解</span>
                    </div>
                </div>
                <div
                    class="group px-6 py-3 glass border border-white/60 rounded-2xl hover:shadow-xl transition-all hover:scale-105 hover:border-purple-300">
                    <div class="flex items-center gap-2">
                        <span class="text-2xl">🎯</span>
                        <span class="text-sm font-bold text-gray-700">超ざっくり解説</span>
                    </div>
                </div>
                <div
                    class="group px-6 py-3 glass border border-white/60 rounded-2xl hover:shadow-xl transition-all hover:scale-105 hover:border-pink-300">
                    <div class="flex items-center gap-2">
                        <span class="text-2xl">💬</span>
                        <span class="text-sm font-bold text-gray-700">会話についていける</span>
                    </div>
                </div>
            </div>

            <!-- CTAボタン風デザイン -->
            <a href="#categories"
                class="inline-flex items-center gap-3 px-8 py-4 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 text-white font-black text-lg rounded-2xl shadow-2xl hover:shadow-3xl hover:scale-105 transition-all animate-gradient">
                <span>📖</span>
                <span>用語を探す</span>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                </svg>
            </a>
        </div>
    </section>

    <!-- サイドバー広告（ヒーロー下） -->
    @if ($sidebarAd = \App\Models\Ad::getForPosition('sidebar'))
        <div class="mb-20 max-w-5xl mx-auto">
            <div class="glass border border-white/60 rounded-3xl p-8 shadow-xl">
                {!! $sidebarAd !!}
            </div>
        </div>
    @endif

    <!-- シーン別ナビゲーション -->
    <section class="mb-24">
        <div class="text-center mb-12">
            <div
                class="inline-flex items-center gap-2 px-5 py-2 bg-gradient-to-r from-indigo-100 to-purple-100 rounded-full mb-4">
                <span class="text-2xl">💭</span>
                <span class="text-sm font-black text-indigo-700">SCENES</span>
            </div>
            <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-3">どこで聞いた？</h2>
            <p class="text-lg text-gray-600 font-semibold">シーンから探すとめっちゃ早い 🚀</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 max-w-6xl mx-auto">
            @foreach ($scenes as $scene)
                <a href="{{ route('scene.show', $scene) }}"
                    class="group relative glass border-2 border-white/60 hover:border-indigo-400 rounded-3xl p-8 transition-all hover:shadow-2xl hover:-translate-y-2 overflow-hidden">

                    <div
                        class="absolute -top-10 -right-10 w-32 h-32 bg-indigo-400/20 rounded-full blur-2xl group-hover:scale-150 transition-transform">
                    </div>

                    <div class="relative">
                        <div
                            class="w-16 h-16 bg-gradient-to-br from-indigo-500 to-purple-500 rounded-2xl flex items-center justify-center mb-4 shadow-xl">
                            @if($scene->svg)
                                <span class="w-8 h-8 text-white">{!! $scene->svg !!}</span>
                            @else
                                <span class="text-3xl">{{ $scene->icon }}</span>
                            @endif
                        </div>

                        <h3 class="font-black text-xl text-gray-900 mb-1">
                            {{ $scene->name }}
                        </h3>

                        <p class="text-sm text-gray-600 font-semibold">
                            {{ $scene->terms_count }}語
                        </p>
                    </div>
                </a>
            @endforeach
        </div>

    </section>

    <!-- カテゴリ一覧 -->
    <section class="mb-24" id="categories">
        <div class="text-center mb-12">
            <div
                class="inline-flex items-center gap-2 px-5 py-2 bg-gradient-to-r from-purple-100 to-pink-100 rounded-full mb-4">
                <span class="text-2xl">📁</span>
                <span class="text-sm font-black text-purple-700">CATEGORIES</span>
            </div>
            <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-3">カテゴリから探す</h2>
            <p class="text-lg text-gray-600 font-semibold">分野別にサクッとチェック 📂</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
            @foreach ($categories as $category)
                <a href="{{ route('category.show', $category) }}"
                    class="group relative glass border-2 border-white/60 hover:border-indigo-400 rounded-3xl p-6 transition-all hover:shadow-2xl hover:-translate-y-1 overflow-hidden">
                    <div
                        class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-indigo-400/10 to-purple-400/10 rounded-full blur-2xl group-hover:scale-150 transition-transform">
                    </div>
                    <div class="relative">
                        <div class="flex items-center justify-between mb-4">
                            <div
                                class="w-14 h-14 bg-gradient-to-br from-gray-100 to-gray-200 group-hover:from-indigo-500 group-hover:to-purple-600 rounded-2xl flex items-center justify-center transition-all shadow-lg group-hover:scale-110 group-hover:rotate-6">
                                <span class="text-2xl group-hover:scale-125 transition-transform">📄</span>
                            </div>
                            <svg class="w-6 h-6 text-gray-400 group-hover:text-indigo-600 group-hover:translate-x-1 transition-all"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                        <h3
                            class="font-black text-lg text-gray-900 group-hover:text-indigo-600 transition-colors mb-2 leading-tight">
                            {{ $category->name }}
                        </h3>
                        <div class="flex items-center gap-2">
                            <div class="px-3 py-1 bg-gradient-to-r from-indigo-100 to-purple-100 rounded-lg">
                                <p class="text-xs font-black text-indigo-700">{{ $category->terms_count }}語</p>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </section>

    <!-- 最新用語 -->
    <section>
        <div class="text-center mb-12">
            <div
                class="inline-flex items-center gap-2 px-5 py-2 bg-gradient-to-r from-pink-100 to-orange-100 rounded-full mb-4">
                <span class="text-2xl">🔥</span>
                <span class="text-sm font-black text-pink-700">LATEST</span>
            </div>
            <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-3">最近追加された用語</h2>
            <p class="text-lg text-gray-600 font-semibold">新しく追加された言葉をチェック ✨</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($latestTerms as $term)
                <article
                    class="group relative glass border-2 border-white/60 hover:border-pink-400 rounded-3xl overflow-hidden transition-all hover:shadow-2xl hover:-translate-y-2">
                    <div
                        class="absolute -top-20 -right-20 w-40 h-40 bg-gradient-to-br from-pink-400/20 to-purple-400/20 rounded-full blur-3xl group-hover:scale-150 transition-transform">
                    </div>
                    <a href="{{ route('terms.show', $term) }}" class="block p-8 relative">
                        <div class="flex items-start justify-between mb-5">
                            <div
                                class="flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-indigo-100 to-purple-100 rounded-xl shadow-sm">
                                <span class="text-sm">📁</span>
                                <span class="text-xs font-black text-indigo-700">{{ $term->category->name }}</span>
                            </div>
                            <div class="flex items-center gap-1 px-3 py-1 bg-white/80 rounded-lg">
                                <span class="text-xs">🕐</span>
                                <time
                                    class="text-xs font-bold text-gray-600">{{ $term->updated_at->format('m/d') }}</time>
                            </div>
                        </div>
                        <h3
                            class="font-black text-2xl text-gray-900 group-hover:text-transparent group-hover:bg-gradient-to-r group-hover:from-indigo-600 group-hover:to-pink-600 group-hover:bg-clip-text transition-all mb-4 leading-tight">
                            {{ $term->title }}
                        </h3>
                        <p class="text-gray-600 text-sm leading-relaxed line-clamp-2 mb-6 font-medium">
                            {{ strip_tags($term->short_description) }}
                        </p>
                        <div class="flex items-center gap-2 text-indigo-600 font-black">
                            <span class="text-sm">詳しく見る</span>
                            <svg class="w-5 h-5 group-hover:translate-x-2 transition-transform" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                    d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </div>
                    </a>
                </article>
            @endforeach
        </div>
    </section>

    <!-- 底部CTA -->
    <section class="mt-24 text-center">
        <div class="relative glass border-2 border-white/60 rounded-3xl p-12 overflow-hidden shadow-2xl max-w-4xl mx-auto">
            <div class="absolute inset-0 bg-gradient-to-br from-indigo-500/5 via-purple-500/5 to-pink-500/5"></div>
            <div class="relative">
                <span class="text-6xl mb-4 inline-block animate-float">🚀</span>
                <h3 class="text-3xl md:text-4xl font-black text-gray-900 mb-4">
                    もう会話で<span
                        class="bg-gradient-to-r from-indigo-600 to-pink-600 bg-clip-text text-transparent">置いていかれない</span>
                </h3>
                <p class="text-lg text-gray-600 font-semibold mb-8">
                    知らない言葉を今すぐ理解して、自信を持って会話に参加しよう 💪
                </p>
                <a href="#categories"
                    class="inline-flex items-center gap-3 px-8 py-4 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 text-white font-black text-lg rounded-2xl shadow-2xl hover:shadow-3xl hover:scale-105 transition-all animate-gradient">
                    <span>もっと見る</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7" />
                    </svg>
                </a>
            </div>
        </div>
    </section>
@endsection
