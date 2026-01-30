@extends('front.layout')

@section('title', $term->title . 'とは？意味・使い方')
@section('meta_description', $term->meta_description ?? strip_tags($term->short_description))

@push('head')
    <meta property="og:title" content="{{ $term->title }}とは？意味・使い方について解説 | TermPress">
    <meta property="og:description" content="{{ $term->meta_description ?? strip_tags($term->short_description) }}">
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ route('terms.show', $term->slug) }}">
    <meta property="og:site_name" content="TermPress">
    <meta property="og:image" content="{{ asset('ogp-default.png') }}"> <!-- TODO: Dynamic image generation later -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="{{ $term->title }}とは？">
    <meta name="twitter:description" content="{{ $term->meta_description ?? strip_tags($term->short_description) }}">
@endpush

@section('content')
    <article class="max-w-3xl mx-auto animate-fade-in-up">
        <!-- パンくず -->
        <nav class="mb-6">
            <ol class="flex items-center gap-2 text-sm">
                <li>
                    <a href="{{ route('home') }}" class="text-gray-500 hover:text-gray-900 transition-colors">
                        ホーム
                    </a>
                </li>
                <li class="text-gray-300">/</li>
                <li>
                    <a href="{{ route('category.show', $term->category) }}"
                        class="text-gray-500 hover:text-gray-900 transition-colors">
                        {{ $term->category->name }}
                    </a>
                </li>
                <li class="text-gray-300">/</li>
                <li class="text-gray-900 font-medium truncate">{{ $term->title }}</li>
            </ol>
        </nav>

        <div class="bg-white rounded-3xl overflow-hidden border border-gray-200 shadow-sm">
            <!-- ヘッダー -->
            <header class="p-8 md:p-10 border-b border-gray-100">
                <div class="flex items-center gap-3 mb-6">
                    <span
                        class="inline-flex items-center gap-1.5 px-3 py-1 bg-gray-100 text-gray-700 text-xs font-semibold rounded-lg">
                        {{ $term->category->name }}
                    </span>
                    <time class="text-xs text-gray-400">{{ $term->updated_at->format('Y.m.d') }} 更新</time>
                </div>
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4 leading-tight">
                    {{ $term->title }}
                </h1>
                <div class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-50 rounded-xl">
                    <svg class="w-4 h-4 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="text-sm font-semibold text-indigo-700">3分で理解</span>
                </div>
            </header>

            <div class="p-8 md:p-10">

                <!-- どこで聞いた？（利用シーン） -->
                @if($term->scenes->isNotEmpty())
                <div class="mb-8">
                     <div class="flex items-center gap-2 mb-3">
                        <div class="w-6 h-6 bg-indigo-100 rounded-full flex items-center justify-center">
                            <svg class="w-3 h-3 text-indigo-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/>
                            </svg>
                        </div>
                        <span class="text-sm font-bold text-gray-500">どこで聞いた?:</span>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        @foreach($term->scenes as $scene)
                            <a href="{{ route('scene.show', $scene) }}" class="inline-flex items-center gap-1.5 px-4 py-1.5 bg-white border border-indigo-200 text-indigo-600 text-sm font-bold rounded-full hover:bg-indigo-50 transition-colors">
                                @if($scene->svg)
                                    <span class="w-4 h-4">{!! $scene->svg !!}</span>
                                @else
                                    <span class="text-xs">#</span>
                                @endif
                                {{ $scene->name }}
                            </a>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- 記事上広告 -->
                @if ($topAd = \App\Models\Ad::getForPosition('article_top'))
                    <div class="mb-8">
                        {!! $topAd !!}
                    </div>
                @endif

                <!-- 一言でいうと -->
                <div class="mb-10">
                    <div class="flex items-center gap-2 mb-4">
                        <div
                            class="w-8 h-8 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-lg flex items-center justify-center shadow-lg">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <h2 class="text-xl font-bold text-gray-900">一言でいうと</h2>
                    </div>
                    <div class="relative bg-gradient-to-br from-indigo-50 via-purple-50 to-pink-50 rounded-2xl p-6 border-2 border-indigo-200 shadow-sm hover:shadow-md transition-shadow">
                        <!-- Decorative corner accent -->
                        <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-br from-indigo-400/10 to-purple-400/10 rounded-bl-full"></div>
                        <div class="relative prose prose-indigo max-w-none">
                            <div class="text-lg font-bold text-gray-900 leading-relaxed">
                                {!! $term->short_description !!}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 本文 -->
                <div class="mb-10">
                    <div class="flex items-center gap-2 mb-4">
                        <div
                            class="w-8 h-8 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center shadow-lg">
                            <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z" />
                            </svg>
                        </div>
                        <h2 class="text-xl font-bold text-gray-900">超ざっくり理解</h2>
                    </div>
                    <div class="prose prose-lg max-w-none term-content">
                        <style>
                            .term-content h3 {
                                font-size: 1.25rem;
                                font-weight: 800;
                                margin-top: 2rem;
                                margin-bottom: 1rem;
                                padding-bottom: 0.5rem;
                                border-bottom: 2px solid #e0e7ff;
                                color: #4338ca;
                                display: flex;
                                align-items: center;
                            }
                            .term-content h3::before {
                                content: '';
                                display: inline-block;
                                width: 6px;
                                height: 24px;
                                background: linear-gradient(to bottom, #6366f1, #a855f7);
                                margin-right: 12px;
                                border-radius: 4px;
                            }
                            .term-content p {
                                margin-bottom: 1.5rem;
                                line-height: 1.8;
                                color: #374151;
                            }
                        </style>
                        <div class="text-gray-700 leading-relaxed">
                            {!! $term->body !!}
                        </div>
                    </div>
                </div>

                <!-- コンテンツ中広告 -->
                @if ($midAd = \App\Models\Ad::getForPosition('mid_content'))
                    <div class="mb-10">
                        {!! $midAd !!}
                    </div>
                @endif

                <!-- 使用例 -->
                @if ($term->example)
                    <div class="mb-10">
                        <div class="flex items-center gap-2 mb-4">
                            <div
                                class="w-8 h-8 bg-gradient-to-br from-green-500 to-green-600 rounded-lg flex items-center justify-center shadow-lg">
                                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <h2 class="text-xl font-bold text-gray-900">こう使えばそれっぽい</h2>
                        </div>
                        <div class="bg-gradient-to-br from-green-50 via-emerald-50 to-teal-50 rounded-2xl p-6 border-2 border-green-200 shadow-sm hover:shadow-md transition-shadow">
                            <div class="flex items-start gap-3">
                                <div class="flex-shrink-0 mt-1">
                                    <svg class="w-6 h-6 text-green-500" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M6 17h3l2-4V7H5v6h3zm8 0h3l2-4V7h-6v6h3z"/>
                                    </svg>
                                </div>
                                <p class="text-gray-800 text-lg leading-relaxed font-medium flex-1">{{ $term->example }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- ポイント(新セクション) -->
                <!-- ポイント(新セクション) -->
                @if(!empty($term->key_points))
                <div class="mb-10">
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-8 h-8 rounded-lg flex items-center justify-center shadow-lg" style="background: linear-gradient(135deg, #f59e0b 0%, #ea580c 100%);">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="#ffffff" style="fill: #ffffff;" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <h2 class="text-xl font-bold text-gray-900">押さえておきたいポイント</h2>
                    </div>
                    <div class="bg-gradient-to-br from-amber-50 to-orange-50 rounded-2xl p-6 border-2 border-amber-200 space-y-3">
                        @foreach($term->key_points as $index => $point)
                        <div class="flex items-start gap-3">
                            <div class="flex-shrink-0 w-6 h-6 bg-amber-500 rounded-full flex items-center justify-center text-white text-xs font-bold mt-0.5">{{ $index + 1 }}</div>
                            <p class="text-gray-700 leading-relaxed flex-1">{{ $point }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- こんな時に使う(新セクション) -->
                @if(!empty($term->usage_scenarios))
                <div class="mb-10">
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-8 h-8 rounded-lg flex items-center justify-center shadow-lg" style="background: linear-gradient(135deg, #0ea5e9 0%, #2563eb 100%);">
                            <svg class="w-5 h-5 text-white" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" style="stroke: #ffffff;">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z" />
                            </svg>
                        </div>
                        <h2 class="text-xl font-bold text-gray-900">こんな時に使う</h2>
                    </div>
                    <div class="grid gap-4 md:grid-cols-2">
                        @foreach($term->usage_scenarios as $scenario)
                        <div class="bg-white rounded-xl p-5 border border-gray-100 shadow-sm hover:shadow-md transition-shadow">
                            <div class="flex items-center gap-3 mb-2">
                                <div class="w-10 h-10 bg-sky-100 rounded-full flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5 text-sky-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                    </svg>
                                </div>
                                <h3 class="font-bold text-gray-800">{{ $scenario['title'] }}</h3>
                            </div>
                            <p class="text-sm text-gray-600 leading-relaxed pl-[3.25rem]">{{ $scenario['description'] }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- 記事下広告 -->
                @if ($bottomAd = \App\Models\Ad::getForPosition('article_bottom'))
                    <div class="mb-10">
                        {!! $bottomAd !!}
                    </div>
                @endif

                <!-- わかった感アクション -->
                <div class="relative overflow-hidden bg-gradient-to-br from-indigo-500 via-purple-500 to-pink-500 rounded-2xl p-8 text-center shadow-lg">
                    <!-- Animated background pattern -->
                    <div class="absolute inset-0 opacity-10">
                        <div class="absolute top-0 left-0 w-full h-full" style="background-image: radial-gradient(circle, white 1px, transparent 1px); background-size: 20px 20px;"></div>
                    </div>
                    <div class="relative">
                        <div class="inline-flex items-center gap-2 px-5 py-2.5 bg-white rounded-full shadow-md mb-4">
                            <svg class="w-6 h-6 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="text-base font-bold text-gray-800">理解完了！</span>
                        </div>
                        <p class="text-white text-lg font-semibold mb-2">これで会話についていける！</p>
                        <p class="text-white/90 text-sm">次に聞いたら「あ、それ知ってる!」って言えるね</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- 関連記事前広告 -->
        @if ($relatedTerms->count() && ($beforeRelatedAd = \App\Models\Ad::getForPosition('before_related')))
            <div class="mt-12 bg-white border border-gray-200 rounded-2xl p-6">
                {!! $beforeRelatedAd !!}
            </div>
        @endif

        <!-- 関連用語 -->
        @if ($relatedTerms->count())
            <section class="mt-12">
                <div class="mb-6">
                    <h2 class="text-2xl font-bold text-gray-900 mb-2">関連する用語</h2>
                    <p class="text-sm text-gray-600">合わせて知っておくとさらに理解が深まる</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach ($relatedTerms as $related)
                        <a href="{{ route('terms.show', $related) }}"
                            class="group bg-white border border-gray-200 hover:border-indigo-300 rounded-2xl p-5 transition-all hover:shadow-lg">
                            <div class="flex items-start gap-4">
                                <div
                                    class="flex-shrink-0 w-10 h-10 bg-gray-100 group-hover:bg-gradient-to-br group-hover:from-indigo-500 group-hover:to-purple-600 rounded-xl flex items-center justify-center transition-all">
                                    <svg class="w-5 h-5 text-gray-600 group-hover:text-white transition-colors"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h3
                                        class="font-bold text-gray-900 group-hover:text-indigo-600 transition-colors mb-1 line-clamp-1">
                                        {{ $related->title }}
                                    </h3>
                                    <div class="text-sm text-gray-600 line-clamp-2 leading-relaxed">
                                        {!! $related->short_description !!}
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </section>
        @endif
    </article>
@endsection
