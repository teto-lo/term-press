<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理画面 | 用語解説サイト</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- サイドバー -->
        <aside class="w-64 bg-gray-800 text-white">
            <div class="p-6">
                <h2 class="text-2xl font-bold">管理画面</h2>
            </div>
            <nav class="mt-6">
                <a href="{{ route('admin.terms.index') }}"
                    class="block px-6 py-3 hover:bg-gray-700 {{ request()->routeIs('admin.terms.*') ? 'bg-gray-700' : '' }}">
                    📝 記事管理
                </a>
                <a href="{{ route('admin.categories.index') }}"
                    class="block px-6 py-3 hover:bg-gray-700 {{ request()->routeIs('admin.categories.*') ? 'bg-gray-700' : '' }}">
                    📁 カテゴリ管理
                </a>
                <a href="{{ route('admin.ads.index') }}"
                    class="block px-6 py-3 hover:bg-gray-700 {{ request()->routeIs('admin.ads.*') ? 'bg-gray-700' : '' }}">
                    💰 広告管理
                </a>
                <a href="{{ route('admin.scene_terms.index') }}"
                    class="block px-6 py-3 hover:bg-gray-700 {{ request()->routeIs('admin.scene_terms.*') ? 'bg-gray-700' : '' }}">
                    🎨 シーン用タグ管理
                </a>
                <hr class="my-4 border-gray-700">
                <a href="{{ route('home') }}" class="block px-6 py-3 hover:bg-gray-700" target="_blank">
                    🌐 サイトを見る
                </a>
            </nav>
        </aside>

        <!-- メインコンテンツ -->
        <main class="flex-1 overflow-y-auto">
            <div class="p-8">
                @yield('content')
            </div>
        </main>
    </div>
</body>

</html>
