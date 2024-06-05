@extends('layouts.core.frontend_no_subscription', [
	'menu' => 'api',
])

@section('title', trans('messages.api_token'))

@section('page_header')

	<div class="page-title">
		<ul class="breadcrumb breadcrumb-caret position-right">
			<li class="breadcrumb-item"><a href="{{ action("HomeController@index") }}">{{ trans('messages.home') }}</a></li>
			<li class="breadcrumb-item active">{{ trans('messages.api_token') }}</li>
		</ul>
		<h1>
			<span class="text-semibold"><span class="material-symbols-rounded">person_outline</span> {{ Auth::user()->customer->displayName() }}</span>
		</h1>
	</div>

@endsection

@section('content')
	<div class="row bg-white profile-bg" style="border-radius: 20px;">

	@include("account._menu", [
		'menu' => 'api',
	])


		<div class="row justify-content-center">
			<div class="col-md-12">
				<h2 class="text-semibold pb-0 mb-0">{{ trans('messages.api_docs') }}</h2>
				<p style="margin-bottom: 30px"><code style="font-size: 18px">
						<a class="api-text-1"  target="_blank" href="{{ action("Controller@docsApiV1") }}">{{ action("Controller@docsApiV1") }} <span class="material-symbols-rounded">link</span></a></code></p>

				<h2 class="text-semibold pb-0 mb-0">{{ trans('messages.api_endpoint') }}</h2>

				<p style="margin-bottom: 30px" class="d-flex align-items-center">
					<code style="font-size: 18px;" class="api-enpoint">{{ url('api/v1') }}</code>
					<button class="btn btn-primary api-copy-button ml-4"><i class="material-symbols-rounded me-2">content_copy</i>{{ trans('messages.copy') }}</button>
				</p>

				<h2 class="text-semibold pb-0 mb-0 mt-20">{{ trans('messages.your_api_token') }}</h2>

				<p style="margin-bottom: 30px" class="d-flex align-items-center"><code class="api-token" style="font-size: 18px;">
						{{ Auth::user()->api_token }}</code>

					<button class="btn btn-primary api-token-copy-button ml-4"><i class="material-symbols-rounded me-2">content_copy</i>Copy</button>
				</p>
				<p class="alert alert-secondary">{!! trans('messages.api_token_guide', ["link" => action("Api\MailListController@index", ["api_token" => "YOUR_API_TOKEN"])]) !!}</p>
				<a class="btn btn-primary bg-teal-600 mb-4" href="{{ action("AccountController@renewToken") }}">{{ trans('messages.renew_token')}} </a>
			</div>
		</div>

	</div>
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
	<style>
		body.theme-default.mode-light .api-text-1,
		body.theme-default.mode-light .api-token,
		body.theme-default.mode-light .api-enpoint{
			color: black!important;
		}
		body.theme-default.mode-dark .api-text-1,
		body.theme-default.mode-dark .api-token,
		body.theme-default.mode-dark .api-enpoint{
			color: rgba(255,255,255,0.6)!important;
		}
	</style>
@endsection
