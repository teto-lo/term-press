@extends('front.layout')

@section('title', 'プライバシーポリシー')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="glass border border-white/60 rounded-3xl p-8 md:p-12 shadow-2xl relative overflow-hidden">
        <!-- Decoration -->
        <div class="absolute top-0 right-0 w-64 h-64 bg-gradient-to-br from-indigo-100 to-purple-100 rounded-full mix-blend-multiply filter blur-3xl opacity-50 -translate-y-1/2 translate-x-1/2"></div>

        <h1 class="text-3xl md:text-4xl font-black mb-8 relative z-10">
            <span class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 bg-clip-text text-transparent">
                プライバシーポリシー
            </span>
        </h1>

        <div class="prose prose-lg prose-indigo max-w-none relative z-10">
            <p><strong>制定日：2026年1月27日</strong></p>
            <p><strong>最終改定日：2026年1月27日</strong></p>

            <h3>1. はじめに</h3>
            <p>TermPress（以下、「当サイト」と言います。）は、ユーザーの個人情報の重要性を認識し、その保護を徹底するために、以下のプライバシーポリシーを定めます。</p>

            <h3>2. 個人情報の収集方法</h3>
            <p>当サイトでは、お問い合わせフォームなどを通じて、氏名やメールアドレスなどの個人情報をご提供いただく場合があります。</p>

            <h3>3. 個人情報の利用目的</h3>
            <p>取得した個人情報は、以下のような目的で利用します。</p>
            <ul>
                <li>お問い合わせへの対応</li>
                <li>サービス改善のための分析</li>
                <li>不正行為の防止</li>
            </ul>

            <h3>4. 広告配信について</h3>
            <p>当サイトでは、第三者配信の広告サービス（Google AdSenseなど）を利用しています。広告配信事業者は、ユーザーの興味に応じた商品やサービスの広告を表示するため、クッキー（Cookie）を使用することがあります。</p>
            <p>Cookieを無効にする設定や、Googleアドセンスに関する詳細は<a href="https://policies.google.com/technologies/ads?hl=ja" target="_blank" rel="nofollow noopener">「Googleポリシーと規約 – 広告」</a>をご覧ください。</p>

            <h3>5. アクセス解析ツールについて</h3>
            <p>当サイトでは、Googleによるアクセス解析ツール「Googleアナリティクス」を利用しています。このGoogleアナリティクスはトラフィックデータの収集のためにCookieを使用しています。このトラフィックデータは匿名で収集されており、個人を特定するものではありません。</p>

            <h3>6. 免責事項</h3>
            <p>当サイトからのリンクやバナーなどで移動したサイトで提供される情報、サービス等について一切の責任を負いません。また、当サイトのコンテンツ・情報について、できる限り正確な情報を提供するように努めておりますが、正確性や安全性を保証するものではありません。</p>

            <h3>7. プライバシーポリシーの変更</h3>
            <p>当サイトは、本ポリシーの内容を適宜見直し、その改善に努めます。修正された最新のプライバシーポリシーは常に本ページにて開示されます。</p>
            
            <h3>8. お問い合わせ</h3>
            <p>本ポリシーに関するお問い合わせは、当サイトのお問い合わせフォームよりお願いいたします。</p>
        </div>
    </div>
</div>
@endsection
