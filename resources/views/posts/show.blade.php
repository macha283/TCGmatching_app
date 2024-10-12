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
        <h1 class="title">
            {{ $post->title }}
        </h1>
        <div>
            <h2>
                遊びたいタイトル
            </h2>
            <p class='playtitle'>
                {{ $post->playtitle }}
            </p>
        </div>
        <div>
            <h2>
                希望日時
            </h2>
            <p class='date'>
                {{ $post->date }}
            </p>
        </div>
        <div>
            <h2>場所</h2>
            <div id="map" style="height:500px"></div>
                
        </div>
        <div class="content">
            <div class="content__post">
                <h2>コメント</h2>
                <p>{{ $post->comment }}</p>    
            </div>
        </div>
        <div class="footer">
            <a href="/home">戻る</a>
        </div>
    </body>
    <script>
        const lat_init = {{ $post->latitude }}
        const lng_init = {{ $post->longitude }}
        function initMap() {
            const initialLocation = { lat: lat_init, lng: lng_init };
            map = new google.maps.Map(document.getElementById("map"), {
                center: initialLocation,
                zoom: 10,
            });
            new google.maps.Marker({
            position: initialLocation,
            map,
            });
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyCv5Yc0QYve2uafmqa-cXehQS2TlbjyMHU&callback=initMap" async def></script>
</html>