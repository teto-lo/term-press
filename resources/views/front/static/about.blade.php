@extends('front.layout')

@section('title', 'TermPressについて')
@section('meta_description', 'TermPressは、SNS・授業・バイト先で出てくる「知らないと会話が止まる言葉たち」を3分で理解できる用語辞典サイトです。')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="glass border border-white/60 rounded-3xl p-8 md:p-12 shadow-2xl relative overflow-hidden">
        <!-- Decoration -->
        <div class="absolute top-0 right-0 w-64 h-64 bg-gradient-to-br from-indigo-100 to-purple-100 rounded-full mix-blend-multiply filter blur-3xl opacity-50 -translate-y-1/2 translate-x-1/2"></div>

        <h1 class="text-3xl md:text-4xl font-black mb-8 relative z-10">
            <span class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 bg-clip-text text-transparent">
                TermPressについて
            </span>
        </h1>

        <div class="prose prose-lg prose-indigo max-w-none relative z-10 space-y-6">
            
            <section>
                <h2 class="text-2xl font-bold text-gray-800 mb-4">🎯 サイトの目的</h2>
                <p class="text-gray-700 leading-relaxed">
                    TermPressは、<strong>「今さら聞けないを、今すぐ理解」</strong>をコンセプトに、SNS・授業・バイト先・ビジネスシーンなど、日常のあらゆる場面で出てくる「知らないと会話が止まる言葉たち」を、わかりやすく解説する用語辞典サイトです。
                </p>
                <p class="text-gray-700 leading-relaxed">
                    ネットスラング、ビジネス用語、IT用語、学術用語など、幅広いジャンルの用語を網羅し、<strong>3分で理解できる</strong>簡潔な説明と実用的な使用例を提供しています。
                </p>
            </section>

            <section>
                <h2 class="text-2xl font-bold text-gray-800 mb-4">💡 こんな方におすすめ</h2>
                <ul class="list-disc list-inside space-y-2 text-gray-700">
                    <li>SNSやネットで見かけた言葉の意味を知りたい</li>
                    <li>授業や会議で出てきた専門用語を理解したい</li>
                    <li>バイト先や職場で使われる業界用語を覚えたい</li>
                    <li>最新のトレンドワードをキャッチアップしたい</li>
                    <li>「今さら聞けない」と感じている言葉を調べたい</li>
                </ul>
            </section>

            <section>
                <h2 class="text-2xl font-bold text-gray-800 mb-4">✨ TermPressの特徴</h2>
                <div class="grid md:grid-cols-2 gap-4">
                    <div class="bg-indigo-50 rounded-xl p-4">
                        <h3 class="font-bold text-indigo-900 mb-2">📚 豊富なカテゴリ</h3>
                        <p class="text-sm text-gray-700">ネットスラング、ビジネス、IT、学術、医療、建築など、12以上のカテゴリで分類</p>
                    </div>
                    <div class="bg-purple-50 rounded-xl p-4">
                        <h3 class="font-bold text-purple-900 mb-2">🎬 シーン別検索</h3>
                        <p class="text-sm text-gray-700">TikTok、学校、職場、病院など、「どこで聞いたか」から用語を探せる</p>
                    </div>
                    <div class="bg-pink-50 rounded-xl p-4">
                        <h3 class="font-bold text-pink-900 mb-2">⚡ 3分で理解</h3>
                        <p class="text-sm text-gray-700">簡潔でわかりやすい説明と、実際の使用例で素早く理解できる</p>
                    </div>
                    <div class="bg-blue-50 rounded-xl p-4">
                        <h3 class="font-bold text-blue-900 mb-2">🔗 関連用語</h3>
                        <p class="text-sm text-gray-700">関連する用語も一緒に学べるので、知識が広がる</p>
                    </div>
                </div>
            </section>

            <section>
                <h2 class="text-2xl font-bold text-gray-800 mb-4">📊 サイト情報</h2>
                <div class="bg-gray-50 rounded-xl p-6 space-y-3">
                    <div class="flex items-start gap-3">
                        <span class="font-bold text-gray-700 min-w-[120px]">サイト名：</span>
                        <span class="text-gray-600">TermPress（ターム プレス）</span>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="font-bold text-gray-700 min-w-[120px]">運営者：</span>
                        <span class="text-gray-600">TermPress運営チーム</span>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="font-bold text-gray-700 min-w-[120px]">開設日：</span>
                        <span class="text-gray-600">2026年1月</span>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="font-bold text-gray-700 min-w-[120px]">お問い合わせ：</span>
                        <a href="{{ route('contact.index') }}" class="text-indigo-600 hover:text-indigo-800 font-semibold underline">お問い合わせフォーム</a>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="font-bold text-gray-700 min-w-[120px]">収録用語数：</span>
                        <span class="text-gray-600">767件以上（随時更新中）</span>
                    </div>
                </div>
            </section>

            <section>
                <h2 class="text-2xl font-bold text-gray-800 mb-4">📧 お問い合わせ</h2>
                <p class="text-gray-700 leading-relaxed">
                    TermPressに関するご質問、ご意見、掲載希望の用語などがございましたら、<a href="{{ route('contact.index') }}" class="text-indigo-600 hover:text-indigo-800 font-semibold underline">お問い合わせフォーム</a>よりお気軽にご連絡ください。
                </p>
            </section>

            <section>
                <h2 class="text-2xl font-bold text-gray-800 mb-4">🔒 プライバシーについて</h2>
                <p class="text-gray-700 leading-relaxed">
                    当サイトでは、ユーザーの皆様のプライバシーを尊重し、個人情報の保護に努めています。詳細は<a href="{{ route('privacy') }}" class="text-indigo-600 hover:text-indigo-800 font-semibold underline">プライバシーポリシー</a>をご確認ください。
                </p>
            </section>

        </div>
    </div>
</div>
@endsection
