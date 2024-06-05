@extends('layouts.core.register')

@section('title', trans('messages.create_your_account'))

@section('content')

    <div class="row mt-5 justify-content-center h-100 align-items-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="col-md-12 text-center mb-5 mt-5">
                        <a class="main-logo-big mb-5" href="{{ action('HomeController@index') }}">
                            <img width="40%" src="{{ url('images/logo.png') }}" alt="">
                        </a>
                    </div>

                    <div class="col-md-12">
                        <h1 class="mb-10">{{ trans('messages.email_confirmation') }}</h1>
                        <p>{!! trans('messages.activation_email_sent_content') !!}</p>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
