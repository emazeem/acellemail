@extends('layouts.core.backend', [
    'menu' => 'api',
])

@section('title', trans('messages.api_token'))

@section('page_script')
    <script type="text/javascript" src="{{ AppUrl::asset('assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
    <script type="text/javascript" src="{{ AppUrl::asset('js/validate.js') }}"></script>
@endsection

@section('page_header')

    <div class="page-title">
        <ul class="breadcrumb breadcrumb-caret position-right">
            <li class="breadcrumb-item"><a href="{{ action("Admin\HomeController@index") }}">{{ trans('messages.home') }}</a></li>
            <li class="breadcrumb-item active">{{ trans('messages.api_token') }}</li>
        </ul>
        <h1>
            <span class="text-semibold"><span class="material-symbols-rounded">person_outline</span> {{ Auth::user()->admin->displayName() }}</span>
        </h1>
    </div>

@endsection

@section('content')

    @include("admin.account._menu", [
        'menu' => 'api',
    ])

    <h4 class="text-semibold">{{ trans('messages.api_docs') }}</h4>

    <p style="margin-bottom: 30px"><code style="font-size: 18px;">
        <a target="_blank" href="{{ action("Admin\ApiController@doc") }}">{{ action("Admin\ApiController@doc") }} <span class="material-symbols-rounded">link</span></a></code></p>

    <h4 class="text-semibold">{{ trans('messages.api_endpoint') }}</h4>

    <p style="margin-bottom: 30px" class="d-flex align-items-center">
		<code style="font-size: 18px" class="api-enpoint">{{ url('api/v1') }}</code>
		<button class="btn btn-primary api-copy-button ml-4"><i class="material-symbols-rounded me-2">content_copy</i>{{ trans('messages.copy') }}</button>
	</p>

    <h4 class="text-semibold mt-20">{{ trans('messages.your_api_token') }}</h4>

    <p style="margin-bottom: 30px" class="d-flex align-items-center"><code class="api-token" style="font-size: 18px">
		{{ Auth::user()->api_token }}</code>

		<button class="btn btn-primary api-token-copy-button ml-4"><i class="material-symbols-rounded me-2">content_copy</i>Copy</button>
	</p>
    <p class="alert alert-info">{!! trans('messages.api_token_guide', ["link" => action("Api\MailListController@index", ["api_token" => "YOUR_API_TOKEN"])]) !!}</p>

    <a class="btn btn-primary" href="{{ action("Admin\AccountController@renewToken") }}">{{ trans('messages.renew_token')}}</a>

    <script>
		$('.api-copy-button').on('click', function() {
			var code = $('.api-enpoint').html().trim();

			copyToClipboard(code);

			notify('success', '{{ trans('messages.notify.success') }}', '{{ trans('messages.api_endpoint.copied') }}');
		});
		$('.api-token-copy-button').on('click', function() {
			var code = $('.api-token').html().trim();

			copyToClipboard(code);

			notify('success', '{{ trans('messages.notify.success') }}', '{{ trans('messages.api_token.copied') }}');
		});
	</script>
@endsection
