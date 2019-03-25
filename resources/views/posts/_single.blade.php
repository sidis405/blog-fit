<div class="card">
    <div class="card-header">
        <h5><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></h5>
        <small> by {{ $post->user->name }}</small>
        <small> on {{ $post->category->name }}</small>
        <small> {{ $post->created_at->format('d/m/Y H:i') }}</small>
    </div>
    <div class="card-body">
        {{ $post->preview }}
    </div>
    <div class="card-footer">
        <small>
            #tags: {{ $post->tags->pluck('name')->implode(', ') }}
        </small>
    </div>
</div>
<hr />



