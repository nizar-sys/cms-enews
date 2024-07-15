@extends('admin.layouts.layout')

@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.faqs.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Faqs</h1>

        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Faqs</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.faqs.update', $faq->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                        Question
                                    </label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="question" class="form-control"
                                            value="{{ old('question', $faq->question) }}">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                                        Answer
                                    </label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="answer" class="form-control"
                                            value="{{ old('answer', $faq->answer) }}">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
