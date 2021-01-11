@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            {{-- ユーザ情報 --}}
            @include('users.card')
        </aside>
        <div class="col-sm-8">
            {{-- タブ --}}
            @include('users.navtabs')
            @if (Auth::id() == $user->id)
                {{-- 投稿フォーム --}}
                @include('microposts.form')
            @endif
            {{-- 投稿一覧 --}}
            
            
            
            
            
            
            
            
            
            
            
            
         @if (count($microposts) > 0)
                <ul class="list-unstyled">
                    @foreach ($microposts as $micropost)
                        <li class="media mb-3">
                            {{-- 投稿の所有者のメールアドレスをもとにGravatarを取得して表示 --}}
                            <img class="mr-2 rounded" src="{{ Gravatar::get($micropost->user->email, ['size' => 50]) }}" alt="">
                            <div class="media-body">
                                <div>
                                    {{-- 投稿の所有者のユーザ詳細ページへのリンク --}}
                                    {!! link_to_route('users.show', $micropost->user->name, ['user' => $micropost->user->id]) !!}
                                    <span class="text-muted">posted at {{ $micropost->created_at }}</span>
                                </div>
                                <div>
                                    {{-- 投稿内容 --}}
                                    <p class="mb-0">{!! nl2br(e($micropost->content)) !!}</p>
                                </div>
                                 <p>@include('user_favorite.favorite_button')</p>
                            </div>
                        </li>
                        
                    @endforeach
                </ul>
                {{-- ページネーションのリンク --}}
                {{ $microposts->links() }}
            @endif
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
        </div>
    </div>
@endsection