<div class="comment-box d-flex justify-content-start mt-2"
    @if ($comment->user_id) style="background-color: rgb(96, 227, 96)" @endif>
    <div class="left">
        <img src="https://gravatar.com/avatar/avatar.jpg" alt="">
    </div>
    <div class="right">
        <div class="name">{{ $comment->name }}</div>
        <div class="date">{{ $comment->created_at->format('F d, Y') }}</div>
        <div class="text">{{ $comment->comment_text }}</div>
        @if (!$comment->parent_id)
            <div class="reply">
                <a href="#" class="reply-button"><i class="fas fa-reply"></i>
                    Reply</a>
            </div>
        @endif
        <div class="reply-form mt-3 w-100" style="display: none;">
            <input type="hidden" name="parent_id[]" value="{{ $comment->id }}">
            <!-- Form balasan -->
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Name" name="name[]"
                    @if (auth()->check()) value="{{ auth()->user()->name ?? '' }}"
                readonly @endif>
            </div>
            <div class="mb-3">
                <input type="email" class="form-control" placeholder="Email Address" name="email[]"
                    @if (auth()->check()) value="{{ auth()->user()->email ?? '' }}"
                readonly @endif>
            </div>
            <div class="mb-3">
                <textarea class="form-control" rows="3" name="comment_text[]" placeholder="Reply to {{ $comment->name }}"></textarea>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>

@if ($comment->childrens->isNotEmpty())
    <div class="comment-box reply-box">
        @foreach ($comment->childrens as $reply)
            @include('components._comment', ['comment' => $reply])
        @endforeach
    </div>
@endif
