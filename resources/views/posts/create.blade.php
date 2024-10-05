<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <body>
        <h1>
            Name
        </h1>
        <form action="/posts" method="POST">
            @csrf
            <div class="title">
                <h2>Title</h2>
                <input type="text" name="post[title]" placeholder="タイトル" value="{{ old('post.title') }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
            </div>
            <div class="date">
                <h2>希望日時</h2>
                <input type="datetime-local" name="post[date]" value="{{ old('post.date') }}">
                <p class="date__error" style="color:red">{{ $errors->first('post.date') }}</p>
            </div>
            <div>
                <h2>場所</h2>
                <textarea name="post[place]" placeholder="仮置き 地図apiを使いたい"></textarea>
                <div id="map" style="height:500px"></div>
                <script>
                    function initMap() {
                        const initialLocation = { lat: -34.397, lng: 150.644 };
                        map = new google.maps.Map(document.getElementById("map"), {
                            center: initialLocation,
                            zoom: 8,
                        });
                
                        map.addListener('click', (event) => {
                            placeMarker(event.latLng);
                            saveLocation(event.latLng);
                        });
                    }
                    function placeMarker(location) {
                        if (marker) {
                            marker.setPosition(location);
                        } else {
                            marker = new google.maps.Marker({
                                position: location,
                                map: map,
                            });
                        }
                    }
                
                    function saveLocation(location) {
                        fetch('/locations', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                latitude: location.lat(),
                                longitude: location.lng()
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                alert('Location saved successfully!');
                            } else {
                                alert('Failed to save location.');
                            }
                        })
                        .catch(error => console.error('Error:', error));
                    }
                </script>
                <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyCv5Yc0QYve2uafmqa-cXehQS2TlbjyMHU&callback=initMap" async defer></script>
            </div>
            <div>
                <h2>遊びたいタイトル</h2>
                <select name="post[playtitle]"  value="{{ old('post.playtitle') }}">
                    <option value="OCG">遊戯王OCG</option>
                    <option value="DM">デュエルマスターズ</option>
                    <option value="MTG">MAGIC:the GATHERING</option>
                    <option value="Pokemon">ポケモンカードゲーム</option>
                    <option value="other">その他</option>
                </select>
                <p class="playtitle__error" style="color:red">{{ $errors->first('post.playtitle') }}</p>
            </div>
            <div class="comment">
                <h2>comment</h2>
                <textarea name="post[comment]" placeholder="フリーコメント欄です。"></textarea>
            </div>
            <input type="submit" value="投稿する"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>