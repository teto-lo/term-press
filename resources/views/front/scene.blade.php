@extends('front.layout')

@section('title', $scene->name)
@section('meta_description', $scene->name . 'で聞いた言葉の一覧。今さら聞けない用語をシーン別にわかりやすく解説。')

@section('content')
    <div class="max-w-6xl mx-auto animate-fade-in-up">
        <!-- パンくず -->
        <nav class="mb-6">
            <ol class="flex items-center gap-2 text-sm">
                <li>
                    <a href="{{ route('home') }}" class="text-gray-500 hover:text-gray-900 transition-colors">
                        ホーム
                    </a>
                </li>
                <li class="text-gray-300">/</li>
                <li class="text-gray-900 font-medium">
                    {{ $scene->name }}
                </li>
            </ol>
        </nav>

        <!-- シーンヘッダー -->
        <div class="bg-white rounded-3xl overflow-hidden border border-gray-200 shadow-sm p-8 md:p-10 mb-12">
            <div class="flex items-center gap-6">
                <div
                    class="w-16 h-16 md:w-20 md:h-20 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-2xl flex items-center justify-center shadow-lg">
                    @if($scene->svg)
                        <span class="w-8 h-8 md:w-10 md:h-10 text-white">{!! $scene->svg !!}</span>
                    @else
                        <span class="text-3xl md:text-4xl">
                            {{ $scene->icon }}
                        </span>
                    @endif
                </div>
                <div>
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">
                        {{ $scene->name }}
                    </h1>
                    <p class="text-gray-600 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z" />
                        </svg>
                        {{ $terms->total() }}語の用語
                    </p>

                    @if (!empty($scene->description))
                        <p class="text-sm text-gray-500 mt-2">
                            {{ $scene->description }}
                        </p>
                    @endif
                </div>
            </div>
        </div>

        <!-- 用語一覧 -->
        @if ($terms->count())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
                @foreach ($terms as $term)
                    <article
                        class="group bg-white border border-gray-200 hover:border-indigo-300 rounded-2xl overflow-hidden transition-all hover:shadow-lg">
                        <a href="{{ route('terms.show', $term) }}" class="block p-6">
                            <div class="flex items-center justify-between mb-4">
                                <div
                                    class="w-10 h-10 bg-gray-100 group-hover:bg-gradient-to-br group-hover:from-indigo-500 group-hover:to-purple-600 rounded-xl flex items-center justify-center transition-all">
                                    <svg class="w-5 h-5 text-gray-600 group-hover:text-white transition-colors"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                                <time class="text-xs text-gray-400">
                                    {{ $term->updated_at->format('Y.m.d') }}
                                </time>
                            </div>

                            <h3
                                class="font-bold text-xl text-gray-900 group-hover:text-indigo-600 transition-colors mb-3 leading-tight line-clamp-2">
                                {{ $term->title }}
                            </h3>

                            <p class="text-gray-600 text-sm leading-relaxed line-clamp-3 mb-4">
                                {{ strip_tags($term->short_description) }}
                            </p>

                            <div class="flex items-center text-indigo-600 font-semibold text-sm">
                                <span>読む</span>
                                <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </div>
                        </a>
                    </article>
                @endforeach
            </div>

            <!-- ページネーション -->
            <div class="flex justify-center">
                {{ $terms->links() }}
            </div>
        @else
            <div class="bg-white border border-gray-200 rounded-2xl p-12 text-center">
                <div class="w-16 h-16 bg-gray-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <p class="text-gray-600 font-semibold">まだ用語が登録されていません</p>
                <p class="text-sm text-gray-500 mt-2">近日中に追加予定です</p>
            </div>
        @endif
    </div>
@endsection
