<h4>Archive</h4>

<div class="card">
    <div class="card-body">
        <ul>
            @foreach($archive as $item)
                <li><a href="{{ route('posts.index') }}?month={{ $item->month }}&year={{ $item->year }}">{{ $item->month }} {{ $item->year }} ({{ $item->published }})</a></li>
            @endforeach
        </ul>
    </div>
</div>
