@extends('layouts.admin') 
@section('title','Music Random')

@section('content')
    <div class='top-embrulho'>
        <div class=conteudo>
            <h1>あなたのためだけのプレイリストを作ったり、</h1>
            <h1>楽曲や音楽を発見しよう。</h1>
            <div class='introduction'>
                <ul>
                    <li class='list'><span class='check'>✓</span>新しい音楽に出会おう</li>
                    <li class='list'><span class='check'>✓</span>自分好みのプレイリストを作ろう</li>
                    <li class='list'><span class='check'>✓</span>アーティストをフォローして最新の曲を聞こう</li>
                </ul>
            </div>
            <div class='btn-embrulho'>
                <a href="{{ route('register') }}" class='btn sign'>新規登録はこちら</a>
            </div>
        </div>    
    </div>
    <footer>
        <div class='footer'>
            <p>© 2020 Music Random, Inc.</p>
        </div>
    </footer>
@endsection