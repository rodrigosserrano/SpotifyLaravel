<div>
    <ul>
        @foreach($musics as $music)
            <li>{{ $music['genre'] }} <img src="{{ $music['image'] }}" alt=""></li>
        @endforeach
    </ul>
</div>
