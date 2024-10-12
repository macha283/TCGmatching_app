<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>TCGmatching</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>
            Name
        </h1>
        <form action="{{ route('search.index') }}" method="GET">
            <input type="text" name="keyword">
            <input type="submit" value="検索">
        </form>
        <div class='posts'>
            @foreach ($posts as $post)
                <div class='post'>
                    <h2 class='title'>
                        <a href="/posts/{{ $post->id }}">
                            {{ $post->title }}
                        </a>
                    </h2>
                    <p class='playtitle'>
                       遊びたいタイトル： {{ $post->playtitle }}
                    </p>
                    <p class='date'>
                        希望日時：{{ $post->date }}
                    </p>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
        <a href='/posts/create'>
            create
        </a>
    </body>
</html>