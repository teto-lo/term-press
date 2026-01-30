<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ホーム') | TermPress</title>
    <meta name="description" content="@yield('meta_description', '今さら聞けないを、今すぐ理解。知らないと会話が止まる言葉たち。')">
    <link rel="icon"
        href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><rect width='100' height='100' rx='20' fill='%236366f1'/><text x='50' y='70' font-size='60' font-weight='bold' fill='white' text-anchor='middle' font-family='sans-serif'>T</text></svg>">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap');

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }

        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .animate-gradient {
            background-size: 200% 200%;
            animation: gradient 8s ease infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-20px) rotate(3deg);
            }
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes pulse-glow {

            0%,
            100% {
                box-shadow: 0 0 20px rgba(99, 102, 241, 0.3);
            }

            50% {
                box-shadow: 0 0 40px rgba(139, 92, 246, 0.5);
            }
        }

        .animate-pulse-glow {
            animation: pulse-glow 3s ease-in-out infinite;
        }

        /* グラスモーフィズム */
        .glass {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
        }

        /* ネオンテキスト風 */
        .neon-text {
            text-shadow: 0 0 10px rgba(99, 102, 241, 0.5),
                0 0 20px rgba(139, 92, 246, 0.3),
                0 0 30px rgba(168, 85, 247, 0.2);
        }

        /* サイドバー固定 */
        .sidebar-sticky {
            position: -webkit-sticky;
            position: sticky;
            top: 7rem;
            align-self: flex-start;
        }

        /* モバイルメニューオーバーレイ */
        #mobile-menu {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 100;
        }
    </style>
    @stack('head')
</head>

<body class="min-h-screen flex flex-col bg-gradient-to-br from-indigo-50 via-purple-50 to-pink-50 text-gray-900 antialiased" x-data="{ mobileMenuOpen: false, searchOpen: false }">
    <!-- 背景デコレーション -->
    <div class="fixed inset-0 pointer-events-none overflow-hidden">
        <div
            class="absolute -top-40 -right-40 w-96 h-96 bg-gradient-to-br from-purple-300 to-pink-300 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-float">
        </div>
        <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-gradient-to-br from-indigo-300 to-blue-300 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-float"
            style="animation-delay: 2s;"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-gradient-to-br from-purple-300 to-indigo-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-float"
            style="animation-delay: 4s;"></div>
    </div>

    <!-- ヘッダー広告 -->
    @if ($headerAd = \App\Models\Ad::getForPosition('header'))
        <div class="relative bg-white/80 backdrop-blur-sm border-b border-white/60 shadow-sm z-[60]">
            <div class="container mx-auto px-4 py-2">
                <div class="max-w-7xl mx-auto text-center flex justify-center">
                    {!! $headerAd !!}
                </div>
            </div>
        </div>
    @endif

    <header class="sticky top-0 z-50 glass border-b border-white/60 shadow-lg relative">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between h-20">
                <a href="{{ route('home') }}" class="flex items-center gap-3 md:gap-4 group z-50 relative">
                    <div class="relative">
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-2xl blur-lg opacity-60 group-hover:opacity-100 transition-opacity animate-pulse-glow">
                        </div>
                        <div
                            class="relative w-10 h-10 md:w-12 md:h-12 bg-gradient-to-br from-indigo-500 via-purple-500 to-pink-500 rounded-2xl flex items-center justify-center shadow-2xl group-hover:scale-110 transition-transform animate-gradient">
                            <span class="text-white font-black text-xl md:text-2xl">T</span>
                        </div>
                    </div>
                    <div>
                        <h1
                            class="text-xl md:text-2xl font-black tracking-tight bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 bg-clip-text text-transparent">
                            TermPress
                        </h1>
                        <p class="hidden md:block text-xs text-gray-500 font-semibold -mt-0.5">今さら聞けないを、今すぐ理解</p>
                    </div>
                </a>

                <!-- PC Navigation & Search -->
                <div class="hidden lg:flex items-center gap-4">
                     <!-- 検索バー -->
                     <form action="{{ route('search') }}" method="GET" class="relative group">
                        <div class="relative">
                            <input type="text" name="q" placeholder="用語を検索..." 
                                class="w-64 pl-10 pr-4 py-2 bg-white/50 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:bg-white transition-all text-sm font-bold placeholder-gray-400">
                            <div class="absolute left-3 top-2.5 text-gray-400">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                        </div>
                    </form>

                    <nav class="flex items-center gap-3">
                        <a href="{{ route('home') }}"
                            class="px-5 py-2.5 text-sm font-bold text-gray-700 hover:text-gray-900 hover:bg-white/60 rounded-xl transition-all">
                            🏠 ホーム
                        </a>
                        <a href="{{ route('home') }}#categories"
                            class="px-5 py-2.5 text-sm font-bold text-white bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 rounded-xl hover:shadow-lg hover:scale-105 transition-all animate-gradient">
                            📚 カテゴリ
                        </a>
                    </nav>
                </div>

                <!-- Mobile Menu Button & Search Toggle -->
                <div class="lg:hidden flex items-center gap-2 z-50">
                    <button id="mobile-search-toggle" class="p-2 text-gray-600 hover:bg-white/50 rounded-xl transition-colors">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                    <button id="mobile-menu-toggle" class="p-2 text-gray-600 hover:bg-white/50 rounded-xl transition-colors">
                        <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Search Bar (Hidden by default) -->
        <div id="mobile-search-bar" class="hidden absolute top-20 left-0 w-full bg-white/95 backdrop-blur shadow-md px-4 py-4 border-b border-gray-100 transform origin-top transition-all duration-200">
            <form action="{{ route('search') }}" method="GET">
                <div class="relative">
                    <input type="text" name="q" placeholder="気になる用語を検索..." 
                        class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-transparent rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:bg-white text-base">
                    <div class="absolute left-3 top-3.5 text-gray-400">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>
            </form>
        </div>

        <!-- Mobile Menu (Full Screen Overlay) -->
        <div id="mobile-menu" class="hidden fixed inset-0 z-[100] bg-gradient-to-br from-indigo-50 via-purple-50 to-pink-50 backdrop-blur-xl lg:hidden flex flex-col pt-24 px-6 animate-fade-in-up">
            <nav class="flex flex-col gap-4">
                 <a href="{{ route('home') }}" class="flex items-center gap-4 p-4 text-xl font-bold text-gray-800 bg-white/80 backdrop-blur-sm rounded-2xl hover:bg-white shadow-md hover:shadow-lg transition-all">
                    <span class="text-2xl">🏠</span> ホーム
                </a>
                <a href="{{ route('home') }}#categories" class="flex items-center gap-4 p-4 text-xl font-bold text-gray-800 bg-white/80 backdrop-blur-sm rounded-2xl hover:bg-white shadow-md hover:shadow-lg transition-all">
                    <span class="text-2xl">📚</span> カテゴリ一覧
                </a>
                <a href="{{ route('about') }}" class="flex items-center gap-4 p-4 text-lg font-bold text-gray-600 bg-white/60 backdrop-blur-sm rounded-2xl hover:bg-white/80 shadow-sm hover:shadow-md transition-all">
                    <span class="text-xl">ℹ️</span> TermPressについて
                </a>
                <a href="{{ route('privacy') }}" class="flex items-center gap-4 p-4 text-lg font-bold text-gray-600 bg-white/60 backdrop-blur-sm rounded-2xl hover:bg-white/80 shadow-sm hover:shadow-md transition-all">
                    <span class="text-xl">📄</span> プライバシーポリシー
                </a>
                <a href="{{ route('contact.index') }}" class="flex items-center gap-4 p-4 text-lg font-bold text-gray-600 bg-white/60 backdrop-blur-sm rounded-2xl hover:bg-white/80 shadow-sm hover:shadow-md transition-all">
                    <span class="text-xl">✉️</span> お問い合わせ
                </a>
            </nav>
        </div>
    </header>

    <!-- Main Layout with Hybrid Ads -->
    <div class="container mx-auto px-4 py-8 md:py-16 relative flex justify-center gap-6 text-sm md:text-base">
        
        <!-- PC Left Sticky Ad (LG only) -->
        @if ($leftAd = \App\Models\Ad::getForPosition('sidebar_fixed_left'))
            <aside class="hidden lg:block xl:hidden w-[160px] flex-shrink-0">
                <div class="sidebar-sticky">
                     {!! $leftAd !!}
                </div>
            </aside>
        @endif

        <!-- Main Content -->
        <main class="flex-1 max-w-4xl min-w-0">
            @yield('content')
        </main>

        <!-- PC Right Sticky Ad (LG only) -->
        @if ($rightAd = \App\Models\Ad::getForPosition('sidebar_fixed_right'))
            <aside class="hidden lg:block xl:hidden w-[160px] flex-shrink-0">
                <div class="sidebar-sticky">
                    {!! $rightAd !!}
                </div>
            </aside>
        @endif

    </div>

    <!-- PC Left Fixed Ad (XL only, Window Pinned) -->
    @if ($leftAd = \App\Models\Ad::getForPosition('sidebar_fixed_left'))
        <div class="hidden xl:block fixed top-28 left-6 z-40 w-[160px]">
             {!! $leftAd !!}
        </div>
    @endif

    <!-- PC Right Fixed Ad (XL only, Window Pinned) -->
    @if ($rightAd = \App\Models\Ad::getForPosition('sidebar_fixed_right'))
        <div class="hidden xl:block fixed top-28 right-6 z-40 w-[160px]">
             {!! $rightAd !!}
        </div>
    @endif




    <!-- SP Bottom Fixed Ad -->
    @if ($spAd = \App\Models\Ad::getForPosition('sp_bottom_fixed'))
    <div class="lg:hidden fixed bottom-4 right-4 z-[9999]"> <!-- z-index increased -->
        <div id="sp-fixed-ad" class="glass border border-white/60 rounded-2xl p-2 shadow-2xl relative animate-fade-in-up">
            <!-- Close button -->
            <button onclick="document.getElementById('sp-fixed-ad').style.display='none'" class="absolute -top-3 -right-3 w-8 h-8 bg-gray-900/10 hover:bg-gray-900/20 rounded-full text-gray-600 flex items-center justify-center backdrop-blur text-xs">✕</button>
            {!! $spAd !!}
        </div>
    </div>
    @endif

    <!-- Modal Ad -->
    @if ($modalAd = \App\Models\Ad::getForPosition('modal'))
    <div id="ad-modal" class="hidden fixed inset-0 z-[10000] flex items-center justify-center px-4 bg-black/60 backdrop-blur-sm opacity-0 transition-opacity duration-300">
        <div class="bg-white rounded-3xl p-6 shadow-2xl max-w-md w-full relative transform scale-90 transition-transform duration-300" id="ad-modal-content">
             <button onclick="closeModal()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <div class="flex justify-center">
                {!! $modalAd !!}
            </div>
        </div>
    </div>
    @endif

    <!-- フッター広告 -->
    @if ($footerAd = \App\Models\Ad::getForPosition('footer'))
        <div class="relative bg-white/80 backdrop-blur-sm border-t border-white/60 py-4 shadow-lg">
            <div class="container mx-auto px-4">
                <div class="max-w-7xl mx-auto text-center flex justify-center">
                    {!! $footerAd !!}
                </div>
            </div>
        </div>
    @endif

    <footer class="relative mt-auto bg-gradient-to-br from-gray-900 via-indigo-900 to-purple-900 text-white">
        <div
            class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PHBhdHRlcm4gaWQ9ImdyaWQiIHdpZHRoPSI2MCIgaGVpZ2h0PSI2MCIgcGF0dGVyblVuaXRzPSJ1c2VyU3BhY2VPblVzZSI+PHBhdGggZD0iTSAxMCAwIEwgMCAwIDAgMTAiIGZpbGw9Im5vbmUiIHN0cm9rZT0id2hpdGUiIHN0cm9rZS13aWR0aD0iMC41IiBvcGFjaXR5PSIwLjEiLz48L3BhdHRlcm4+PC9kZWZzPjxyZWN0IHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JpZCkiLz48L3N2Zz4=')] opacity-20">
        </div>
        <div class="container mx-auto px-4 py-12 relative">
            <div class="max-w-6xl mx-auto">
                <div class="flex flex-col md:flex-row items-center justify-between gap-8 mb-8">
                    <div class="flex items-center gap-4">
                        <div
                            class="w-14 h-14 bg-gradient-to-br from-indigo-500 via-purple-500 to-pink-500 rounded-2xl flex items-center justify-center shadow-2xl animate-gradient">
                            <span class="text-white font-black text-2xl">T</span>
                        </div>
                        <div>
                            <p
                                class="font-black text-2xl bg-gradient-to-r from-indigo-300 via-purple-300 to-pink-300 bg-clip-text text-transparent">
                                TermPress</p>
                            <p class="text-sm text-indigo-200">置いていかれないための用語辞典</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-6">
                        <a href="{{ route('home') }}"
                            class="text-indigo-200 hover:text-white transition-colors font-semibold">
                            ホーム
                        </a>
                        <a href="{{ route('home') }}#categories"
                            class="text-indigo-200 hover:text-white transition-colors font-semibold">
                            カテゴリ
                        </a>
                    </div>
                </div>

                <div class="border-t border-white/10 pt-8 text-center">
                    <div class="flex flex-wrap justify-center gap-6 mb-6 text-sm text-indigo-200">
                        <a href="{{ route('about') }}" class="hover:text-white transition-colors">TermPressについて</a>
                        <a href="{{ route('privacy') }}" class="hover:text-white transition-colors">プライバシーポリシー</a>
                        <a href="{{ route('contact.index') }}" class="hover:text-white transition-colors">お問い合わせ</a>
                    </div>
                    <p class="text-sm text-indigo-200 mb-2">
                        知らないと、会話が一瞬止まる言葉たち
                    </p>
                    <p class="text-xs text-indigo-300/60">
                        &copy; {{ date('Y') }} TermPress. All rights reserved.
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Mobile Menu Toggle
        const menuBtn = document.getElementById('mobile-menu-toggle');
        const menu = document.getElementById('mobile-menu');
        const searchBtn = document.getElementById('mobile-search-toggle');
        const searchBar = document.getElementById('mobile-search-bar');

        if (menuBtn && menu) {
            menuBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                const isHidden = menu.classList.contains('hidden');
                
                if (isHidden) {
                    // Show menu
                    menu.classList.remove('hidden');
                    document.body.style.overflow = 'hidden';
                } else {
                    // Hide menu
                    menu.classList.add('hidden');
                    document.body.style.overflow = '';
                }
            });

            // Close menu when clicking outside
            menu.addEventListener('click', (e) => {
                if (e.target === menu) {
                    menu.classList.add('hidden');
                    document.body.style.overflow = '';
                }
            });
        }

        if (searchBtn && searchBar) {
            searchBtn.addEventListener('click', () => {
                searchBar.classList.toggle('hidden');
            });
        }

        // Modal Logic
        const modal = document.getElementById('ad-modal');
        const modalContent = document.getElementById('ad-modal-content');

        function openModal() {
            if (!modal) return;
            
            // Check if already shown in this session
            if (sessionStorage.getItem('modalShown')) {
                return;
            }

            modal.classList.remove('hidden');
            // Mark as shown
            sessionStorage.setItem('modalShown', 'true');
            
            setTimeout(() => {
                if (modal.classList.contains('hidden')) return; // In case closed immediately
                modal.classList.remove('opacity-0');
                if(modalContent) {
                    modalContent.classList.remove('scale-90');
                    modalContent.classList.add('scale-100');
                }
            }, 50);
        }

        function closeModal() {
            if (!modal) return;
            modal.classList.add('opacity-0');
            if(modalContent) {
                modalContent.classList.add('scale-90');
                modalContent.classList.remove('scale-100');
            }
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }

        // Open modal after 5 seconds, only once per session
        if (modal) {
            setTimeout(openModal, 5000);
        }

    </script>
</body>


</html>
