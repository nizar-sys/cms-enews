@extends('frontends.frontend')

@section('title', GoogleTranslate::trans($sectionSetting?->title ?? __('app.Posts'), app()->getLocale()))

@push('style')
    <style>
        .post-navigation {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .nav-links {
            display: flex;
            width: 100%;
        }

        .nav-links div {
            flex: 1;
        }

        .nav-links a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #2c4666;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
            width: 25%;
            box-sizing: border-box;
            transition: background-color 0.3s ease;
        }

        .nav-links a:hover {
            background-color: #0056b3;
        }

        .nav-prev {
            order: 2;
            text-align: right;
        }

        .nav-next {
            order: 1;
            text-align: left;
        }

        /* Comment section styles */
        .comment-section {
            margin-top: 30px;
            padding: 20px;
            border-radius: 10px;
            background-color: #f9f9f9;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .comment-section:hover {
            transform: scale(1.02);
        }

        .comment-section h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: #2c4666;
            text-align: center;
        }

        .comment-section form textarea {
            width: 100%;
            padding: 15px;
            border-radius: 5px;
            border: 1px solid #ddd;
            margin-bottom: 10px;
            font-size: 1rem;
            box-sizing: border-box;
        }

        .comment-section form button {
            padding: 10px 20px;
            background-color: #2c4666;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .comment-section form button:hover {
            background-color: #0056b3;
        }

        @media (max-width: 768px) {
            .post-navigation {
                flex-direction: column;
            }

            .nav-links a {
                width: 100%;
                margin-bottom: 10px;
            }

            .page-title h1 {
                font-size: 1.5rem;
            }

            .entry-header h1 {
                font-size: 1.5rem;
            }

            .entry-content {
                font-size: 0.9rem;
            }

            #social-buttons {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                gap: 10px;
                padding: 10px 0;
            }

            #social-buttons a {
                flex: 0 0 auto;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                width: 40px;
                height: 40px;
                background-color: #2c4666;
                color: #fff;
                border-radius: 50%;
                font-size: 18px;
                transition: background-color 0.3s ease;
                text-align: center;
            }

            #social-buttons a:hover {
                background-color: #0056b3;
            }

            .comment-section h3 {
                font-size: 1.2rem;
            }

            .comment-section form textarea {
                font-size: 0.9rem;
            }

            .comment-section form button {
                width: 100%;
            }
        }
    </style>
@endpush

@section('content')

    <main class="main">
        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background">

            <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="3000">

                @foreach (\App\Models\Hero::select('id', 'title', 'description', 'image')->get() as $slider)
                    <div class="carousel-item {{ $loop->iteration == 1 ? 'active' : '' }}">
                        <img src="{{ asset($slider->image) }}"
                            alt="{{ GoogleTranslate::trans($slider->title, app()->getLocale()) }}">
                        <div class="carousel-container">
                            <h2>{{ GoogleTranslate::trans($slider->title, app()->getLocale()) }}</h2>
                            {!! GoogleTranslate::trans($slider->description, app()->getLocale()) !!}
                        </div>
                    </div>
                @endforeach

                <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
                </a>

                <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
                </a>

                <ol class="carousel-indicators"></ol>

            </div>

        </section><!-- /Hero Section -->

        <!-- Page Title -->
        <div class="page-title dark-background" data-aos="fade" style="background-color: #2c4666">
            <div class="container position-relative">
                <h1>{{ GoogleTranslate::trans($post->title, app()->getLocale()) }}</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ url('/', []) }}" class="text-primary">{{ __('app.home') }}</a></li>
                        <li class="current">{{ GoogleTranslate::trans('Post Detail', app()->getLocale()) }}</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <section id="primary" class="content-area col-sm-12 col-lg-8">
                    <main id="main" class="site-main" role="main">
                        <article id="post-329" class="post-329 cca type-cca status-publish has-post-thumbnail hentry">
                            <div class="post-thumbnail">
                                <img src="{{ asset($post->thumbnail) }}"
                                    class="attachment-post-thumbnail size-post-thumbnail wp-post-image img-fluid"
                                    alt="" decoding="async" fetchpriority="high"
                                    sizes="(max-width: 960px) 100vw, 960px">
                            </div>
                            <header class="entry-header mt-2">
                                <h1 class="entry-title">{{ GoogleTranslate::trans($post->title, app()->getLocale()) }}</h1>
                            </header><!-- .entry-header -->
                            <div class="entry-content">
                                {!! GoogleTranslate::trans($post->content, app()->getLocale()) !!}
                            </div><!-- .entry-content -->
                            <footer class="entry-footer">
                            </footer><!-- .entry-footer -->
                        </article><!-- #post-## -->

                        @if ($prevPost || $nextPost)
                            <nav class="navigation post-navigation" aria-label="Posts">
                                <div class="nav-links">
                                    @foreach (['next' => $nextPost, 'prev' => $prevPost] as $rel => $r)
                                        @if ($r)
                                            <div class="row">
                                                <div class="nav-{{ $rel }}">
                                                    <a href="{{ route('posts-detail', [
                                                        'locale' => session('locale', 'en'),
                                                        'post' => $r->id,
                                                    ]) }}"
                                                        rel="{{ $rel }}">
                                                        @if ($rel === 'next')
                                                        &laquo; @else&raquo;
                                                        @endif
                                                    </a>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </nav>
                        @endif
                    </main>
                </section><!-- #primary -->

                <aside id="secondary" class="widget-area col-sm-12 col-lg-4" role="complementary">
                    <section id="block-3" class="widget widget_block">
                        <div class="wp-block-group">
                            <div class="wp-block-group__inner-container is-layout-flow wp-block-group-is-layout-flow">
                            </div>
                        </div>
                    </section>
                    <section id="sp_news_widget-3" class="widget SP_News_Widget">
                        <h3 class="widget-title">{{ __('app.Latest Posts') }}</h3>
                        <div class="recent-news-items no_p">
                            <ul style="list-style: none">
                                @foreach ($latestPost as $p)
                                    <li class="news_li">
                                        <a class="newspost-title"
                                            href="{{ route('posts-detail', ['locale' => session('locale', 'en'), 'post' => $p->slug]) }}">{{ GoogleTranslate::trans($p->title, app()->getLocale()) }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </section>

                    <div id="social-buttons">
                        <h3>{{ GoogleTranslate::trans('Share this post', app()->getLocale()) }}:</h3>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}&quote={{ urlencode(GoogleTranslate::trans($post->title, app()->getLocale()) ?? '') }}"
                            class="social-button facebook"
                            title="{{ GoogleTranslate::trans('Share on Facebook', app()->getLocale()) }}"
                            rel="nofollow noopener noreferrer" target="_blank">
                            <span class="fab fa-facebook-square"></span>
                        </a>
                        <a href="https://www.linkedin.com/sharing/share-offsite?mini=true&url={{ urlencode(Request::fullUrl()) }}&title={{ urlencode(GoogleTranslate::trans($post->title, app()->getLocale()) ?? '') }}"
                            class="social-button linkedin" title="Share on LinkedIn" rel="nofollow noopener noreferrer"
                            target="_blank">
                            <span class="fab fa-linkedin"></span>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl()) }}&text={{ urlencode(GoogleTranslate::trans($post->title, app()->getLocale()) ?? '') }}"
                            class="social-button twitter" title="Share on Twitter" rel="nofollow noopener noreferrer"
                            target="_blank">
                            <span class="fab fa-twitter"></span>
                        </a>
                        <a href="https://api.whatsapp.com/send?text={{ urlencode(GoogleTranslate::trans($post->title, app()->getLocale()) ?? '') }}%20{{ urlencode(Request::fullUrl()) }}"
                            class="social-button whatsapp" title="Share on WhatsApp" rel="nofollow noopener noreferrer"
                            target="_blank">
                            <span class="fab fa-whatsapp"></span>
                        </a>
                        <a href="https://t.me/share/url?url={{ urlencode(Request::fullUrl()) }}&text={{ urlencode(GoogleTranslate::trans($post->title, app()->getLocale()) ?? '') }}"
                            class="social-button telegram" title="Share on Telegram" rel="nofollow noopener noreferrer"
                            target="_blank">
                            <span class="fab fa-telegram-plane"></span>
                        </a>
                        <a href="https://www.pinterest.com/pin/create/button/?url={{ urlencode(Request::fullUrl()) }}&description={{ urlencode(GoogleTranslate::trans($post->title, app()->getLocale()) ?? '') }}"
                            class="social-button pinterest" title="Share on Pinterest" rel="nofollow noopener noreferrer"
                            target="_blank">
                            <span class="fab fa-pinterest"></span>
                        </a>
                    </div>
                </aside><!-- #secondary -->

                {{-- Comment List --}}
                <div class="comments-list"
                    style="margin: auto; padding: 20px; background-color: #f9f9f9; border-radius: 8px;">
                    <h3
                        style="font-family: Arial, sans-serif; font-weight: bold; border-bottom: 2px solid #007bff; padding-bottom: 10px;">
                        {{ GoogleTranslate::trans('Comments', app()->getLocale()) }}</h3>

                    @foreach ($comments->where('parent_id', null)->where('post_id', $post->id) as $comment)
                        <div class="comment-item"
                            style="margin-bottom: 15px; padding: 10px; border: 1px solid #e0e0e0; border-radius: 8px; background-color: #fff;">
                            <div style="display: flex; align-items: center; margin-bottom: 5px;">
                                <p style="font-weight: bold; margin: 0;">{{ $comment->user->name }}</p>
                            </div>
                            <p style="margin: 5px 0;">{{ GoogleTranslate::trans($comment->comment, app()->getLocale()) }}
                            </p>
                            <p style="font-size: 12px; color: #777;">{{ $comment->created_at->format('F j, Y, g:i a') }}
                            </p>
                            @auth
                                <a style="font-size: 12px; color: #007bff; cursor: pointer;"
                                    onclick="toggleReplyForm({{ $comment->id }})">{{ GoogleTranslate::trans('Reply', app()->getLocale()) }}</a>
                            @endauth

                            <!-- Reply Form -->
                            <div id="reply-form-{{ $comment->id }}" style="display: none; margin-top: 10px;">
                                <form
                                    action="{{ route('projects.comments.store', ['locale' => session('locale', 'en'), 'post' => $post->id]) }}"
                                    method="POST">
                                    @csrf
                                    <input type="hidden" name="post_id" value="{{ $comment->post_id }}">
                                    <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                    <textarea name="comment" style="width: 100%; padding: 10px; border-radius: 4px; border: 1px solid #ccc; resize: none;"
                                        rows="3" placeholder="{{ GoogleTranslate::trans('Write your reply...', app()->getLocale()) }}"></textarea>
                                    <button
                                        style="background-color: #007bff; color: #fff; padding: 8px 12px; border: none; border-radius: 4px; margin-top: 5px; cursor: pointer;">{{ GoogleTranslate::trans('Post', app()->getLocale()) }}
                                        {{ GoogleTranslate::trans('Reply', app()->getLocale()) }}</button>
                                </form>
                            </div>

                            <!-- Display Replies -->
                            @foreach ($comments->where('parent_id', $comment->id)->where('post_id', $post->id) as $reply)
                                <div class="reply-item"
                                    style="margin-top: 10px; margin-left: 30px; padding: 10px; border: 1px solid #e0e0e0; border-radius: 8px; background-color: #f1f1f1;">
                                    <div style="display: flex; align-items: center; margin-bottom: 5px;">
                                        <p style="font-weight: bold; margin: 0;">{{ $reply->user->name }}</p>
                                    </div>
                                    <p style="margin: 5px 0;">
                                        {{ GoogleTranslate::trans($reply->comment, app()->getLocale()) }}</p>
                                    <p style="font-size: 12px; color: #777;">
                                        {{ $reply->created_at->format('F j, Y, g:i a') }}</p>
                                </div>
                            @endforeach

                        </div>
                        <hr style="border-top: 1px solid #e0e0e0;">
                    @endforeach

                    @if ($comments->where('parent_id', null)->where('post_id', $post->id)->isEmpty())
                        <p style="text-align: center; color: #555;">
                            {{ GoogleTranslate::trans('No comments yet. Be the first to comment!', app()->getLocale()) }}
                        </p>
                    @endif
                </div>


                <!-- Comment Section -->
                <div class="comment-section"
                    style="margin: auto; padding: 20px; background-color: #f9f9f9; border-radius: 8px;">
                    <h3>{{ GoogleTranslate::trans('Leave a Comment', app()->getLocale()) }}</h3>

                    @auth
                        <form method="POST"
                            action="{{ route('projects.comments.store', ['locale' => session('locale', 'en'), 'post' => $post->id]) }}">
                            @csrf
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <textarea name="comment" rows="5"
                                placeholder="{{ GoogleTranslate::trans('Write your comment here...', app()->getLocale()) }}" required
                                style="width: 100%; padding: 10px; border-radius: 4px; border: 1px solid #ccc; resize: none;"></textarea>
                            <button type="submit"
                                style="background-color: #007bff; color: #fff; padding: 8px 12px; border: none; border-radius: 4px; cursor: pointer;">{{ GoogleTranslate::trans(
                                    'Submit
                                                                                                Comment',
                                    app()->getLocale(),
                                ) }}</button>
                        </form>
                    @else
                        <p style="color: #777;">{{ GoogleTranslate::trans('Please', app()->getLocale()) }} <a
                                href="{{ route('login') }}"
                                style="color: #007bff;">{{ GoogleTranslate::trans('log in', app()->getLocale()) }}</a>
                            {{ GoogleTranslate::trans('to', app()->getLocale()) }}
                            {{ GoogleTranslate::trans('Leave a Comment', app()->getLocale()) }}.</p>
                    @endauth
                </div>


            </div><!-- .row -->
        </div>
    </main>
@endsection
