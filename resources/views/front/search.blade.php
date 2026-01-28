@extends('front.layout')

@section('title', '「' . $query . '」の検索結果')
@section('meta_description', '「' . $query . '」の検索結果一覧です。')

@section('content')
    <div class="max-w-4xl mx-auto">
        <header class="mb-8 text-center">
            <h1 class="text-3xl font-black text-gray-900 mb-2">
                <span class="text-indigo-600">"{{ $query }}"</span> の検索結果
            </h1>
            <p class="text-gray-500 font-bold">
                {{ $terms->total() }} 件見つかりました
            </p>
        </header>

        @if ($terms->count() > 0)
            <div class="grid gap-4">
                @foreach ($terms as $term)
                    <a href="{{ route('terms.show', $term->slug) }}"
                        class="block bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-sm hover:shadow-md transition-all border border-white/60 group hover:-translate-y-1">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <div class="flex items-center gap-2 mb-2">
                                    <span class="text-xs font-bold px-2 py-1 rounded-lg bg-gray-100 text-gray-600">
                                        {{ $term->category->name }}
                                    </span>
                                    @foreach ($term->scenes as $scene)
                                        <span class="text-xs font-bold px-2 py-1 rounded-lg bg-indigo-50 text-indigo-600 flex items-center gap-1">
                                            @if($scene->svg)
                                                <span class="w-3 h-3 block">{!! $scene->svg !!}</span>
                                            @endif
                                            {{ $scene->name }}
                                        </span>
                                    @endforeach
                                </div>
                                <h2 class="text-xl font-bold text-gray-900 group-hover:text-indigo-600 transition-colors mb-2">
                                    {{ $term->title }}
                                </h2>
                                <p class="text-gray-600 text-sm line-clamp-2">
                                    {{ strip_tags($term->short_description) }}
                                </p>
                            </div>
                            <div class="text-gray-400 group-hover:text-indigo-600 transition-colors">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="mt-8">
                {{ $terms->withQueryString()->links() }}
            </div>
        @else
            <div class="text-center py-20 bg-white/50 rounded-3xl border border-dashed border-gray-300">
                <div class="text-6xl mb-4">😢</div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">見つかりませんでした</h3>
                <p class="text-gray-600">
                    検索ワードを変えて試してみてください。<br>
                    ひらがな、カタカナ、英語などで検索するとヒットするかもしれません。
                </p>
            </div>
        @endif
    </div>
@endsection
