<div class="comment-section">
    <h2>Comentarios:</h2>
    <h3>¡Cuéntanos qué tal te parece la pelicula!</h3>

    <!-- Formulario al principio -->
    <form wire:submit.prevent="submitComment" class="comment-form">
        <textarea wire:model="newComment" placeholder="Escribe tu comentario..."></textarea>
        <div class="comment-actions">
            <button type="button" id="emoji-button"></button>
            <button type="submit">Comentar</button>
        </div>
    </form>

    <!-- Comentarios debajo -->
    <div class="comments-section">
        @foreach($comments as $comment)
            <div class="comment-box">
                <div class="comment-user">{{ $comment->user->name }}</div>
                <div class="comment-text">{{ $comment->comment }}</div>
            </div>
        @endforeach
    </div>
</div>
