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
                
                <div id="map" style="height:500px"></div>
                
            </div>
            <div>
                <h2>遊びたいタイトル</h2>
                <select name="post[playtitle]"  value="{{ old('post.playtitle') }}">
                    <option value="遊戯王OCG">遊戯王OCG</option>
                    <option value="デュエルマスターズ">デュエルマスターズ</option>
                    <option value="MAGIC:the GATHERING">MAGIC:the GATHERING</option>
                    <option value="ポケモンカードゲーム">ポケモンカードゲーム</option>
                    <option value="その他">その他</option>
                </select>
                <p class="playtitle__error" style="color:red">{{ $errors->first('post.playtitle') }}</p>
            </div>
            <div class="comment">
                <h2>comment</h2>
                <textarea name="post[comment]" placeholder="フリーコメント欄です。"></textarea>
            </div>
            <div>
                <input id="latitude" name="post[latitude]" value="{{ old('post.latitude') }}" type="hidden"/>
                <input id="longitude" name="post[longitude]" value="{{ old('post.longitude') }}" type="hidden"/>
            </div>
            <div>
                <input name="post[user_id]" value="{{ Auth::user()->id }}" type="hidden"/>
            </div>
            <input type="submit" value="投稿する"/>
        </form>
        <div class="footer">
            <a href="/home">戻る</a>
        </div>
    </body>
    <script>
        const lat_input = document.getElementById("latitude");
        const lng_input = document.getElementById("longitude");
        function initMap() {
            const initialLocation = { lat: 35.6809591, lng: 139.7673068 };
            map = new google.maps.Map(document.getElementById("map"), {
                center: initialLocation,
                zoom: 13,
            });
    
            map.addListener('click', (event) => {
                console.log('click');
                placeMarker(event.latLng);
                saveLocation(event.latLng);
            });
        }
        let marker;
        function placeMarker(location) {
            if (marker) {
                marker.setPosition(location);
            } else {
                console.log(location);
                marker = new google.maps.Marker({
                    position: location,
                    map: map,
                });
            }
        }
    
        function saveLocation(location) {
            lat_input.value = location.lat();
            lng_input.value = location.lng();
            // fetch('/locations', {
            //     method: 'POST',
            //     headers: {
            //         'Content-Type': 'application/json',
            //         'X-CSRF-TOKEN': '{{ csrf_token() }}'
            //     },
            //     body: JSON.stringify({
            //         latitude: location.lat(),
            //         longitude: location.lng()
            //     })
            // })
            // .then(response => response.json())
            // .then(data => {
            //     if (data.success) {
            //         alert('Location saved successfully!');
            //     } else {
            //         alert('Failed to save location.');
            //     }
            // })
            // .catch(error => console.error('Error:', error));
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?language=ja&region=JP&key=AIzaSyCv5Yc0QYve2uafmqa-cXehQS2TlbjyMHU&callback=initMap" async defer></script>
</html>