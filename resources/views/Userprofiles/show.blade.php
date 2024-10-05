<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 class="name">
            {{ $user->name }}
        </h1>
        <h3 class="playtitle">
           {{ $user->playtitle }}
        </h3>
        <h3 class="area">
           {{ $user->area }}
        </h3>
        <div class="comment">
            <p>{{ $user->comment }}</p>
        </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>