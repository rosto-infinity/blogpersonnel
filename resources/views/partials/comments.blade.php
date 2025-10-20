<section class="comments">
    <h3>Commentaires ({{ count($comments) }})</h3>

    @forelse ($comments as $comment)
        <div class="comment" style="border-left: 4px solid #0ced5a; padding: 1rem; margin: 1rem 0;">
            <strong>{{ $comment['author'] }}</strong>
            <small style="color: #666;">{{ $comment['date'] }}</small>
            <p>{{ $comment['text'] }}</p>

            @if (isset($comment['replies']))
                <div style="margin-left: 2rem;">
                    <strong>Réponses :</strong>
                    @foreach ($comment['replies'] as $reply)
                        <div class="reply" style="border-left: 2px solid #ccc; padding: 0.5rem; margin: 0.5rem 0;">
                            <strong>{{ $reply['author'] }}</strong>
                            <p>{{ $reply['text'] }}</p>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    @empty
        <p>Aucun commentaire pour le moment. Soyez le premier !</p>
    @endforelse
</section>
