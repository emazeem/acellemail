@extends('layouts.core.frontend', [
	'menu' => 'email_verification',
])

@section('title', trans('messages.email_verification_servers'))

@section('page_header')

	<div class="page-title">
		<ul class="breadcrumb breadcrumb-caret position-right">
			<li class="breadcrumb-item"><a href="{{ action("HomeController@index") }}">{{ trans('messages.home') }}</a></li>
		</ul>
		<h1>
			<span class="text-semibold"><span class="material-symbols-rounded">format_list_bulleted</span> {{ trans('messages.email_verification_servers') }}</span>
		</h1>
	</div>

@endsection

@section('content')
	<p>{{ trans('messages.email_verification_server.wording') }}</p>

	<div id="EVSsIndexContainer" class="listing-form"
		sort-url="{{ action('EmailVerificationServerController@sort') }}"
		data-url="{{ action('EmailVerificationServerController@listing') }}"
		per-page="{{ Acelle\Model\EmailVerificationServer::$itemsPerPage }}"
	>
		<div class="d-flex top-list-controls top-sticky-content">
			<div class="me-auto">
				@if ($servers->count() >= 0)
					<div class="filter-box">
						<div class="checkbox inline check_all_list">
							<label>
								<input type="checkbox" name="page_checked" class="styled check_all">
							</label>
						</div>
						<div class="dropdown list_actions" style="display: none">
							<button role="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
								{{ trans('messages.actions') }} <span class="number"></span><span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" link-confirm="{{ trans('messages.enable_email_verification_servers_confirm') }}" href="{{ action('EmailVerificationServerController@enable') }}"><span class="material-symbols-rounded">play_arrow</span> {{ trans('messages.enable') }}</a></li>
								<li><a class="dropdown-item" link-confirm="{{ trans('messages.disable_email_verification_servers_confirm') }}" href="{{ action('EmailVerificationServerController@disable') }}"><span class="material-symbols-rounded">hide_source</span> {{ trans('messages.disable') }}</a></li>
								<li><a class="dropdown-item" link-confirm="{{ trans('messages.delete_email_verification_servers_confirm') }}" href="{{ action('EmailVerificationServerController@delete') }}"><span class="material-symbols-rounded">delete_outline</span> {{ trans('messages.delete') }}</a></li>
							</ul>
						</div>
						
						<span class="filter-group">
							<span class="title text-semibold text-muted">{{ trans('messages.sort_by') }}</span>
							<select class="select" name="sort_order">
								<option value="email_verification_servers.created_at">{{ trans('messages.created_at') }}</option>
								<option value="email_verification_servers.name">{{ trans('messages.name') }}</option>
								<option value="email_verification_servers.updated_at">{{ trans('messages.updated_at') }}</option>
							</select>
							<input type="hidden" name="sort_direction" value="desc" />
<button type="button" class="btn btn-xs sort-direction" data-popup="tooltip" title="{{ trans('messages.change_sort_direction') }}" role="button" class="btn btn-xs">
								<span class="material-symbols-rounded desc">sort</span>
							</button>
						</span>
						<span class="filter-group">
							<span class="title text-semibold text-muted">{{ trans('messages.type') }}</span>
							<select class="select" name="type">
								<option value="">{{ trans('messages.all') }}</option>
								@foreach (Acelle\Model\EmailVerificationServer::typeSelectOptions() as $service)
									<option value="{{ $service['value'] }}">{{ $service['text'] }}</option>
								@endforeach
							</select>
						</span>
						<span class="text-nowrap">
							<input type="text" name="keyword" class="form-control search" value="{{ request()->keyword }}" placeholder="{{ trans('messages.type_to_search') }}" />
							<span class="material-symbols-rounded">search</span>
						</span>
					</div>
				@endif
			</div>
			@if (Auth::user()->customer->can('create', new Acelle\Model\EmailVerificationServer()))
				<div class="text-end">
					<a href="{{ action("EmailVerificationServerController@create") }}" role="button" class="btn btn-primary">
						<span class="material-symbols-rounded">add</span> {{ trans('messages.create_email_verification_server') }}
					</a>
				</div>
			@endif
		</div>

		<div id="EVSsIndexContent" class="pml-table-container">
		</div>
	</div>

	<script>
        var EVSsIndex = {
            list: null,
            getList: function() {
                if (this.list == null) {
                    this.list = makeList({
                        url: '{{ action('EmailVerificationServerController@listing') }}',
                        container: $('#EVSsIndexContainer'),
                        content: $('#EVSsIndexContent')
                    });
                }
                return this.list;
            }
        };

        $(document).ready(function() {
            EVSsIndex.getList().load();
        });
    </script>
@endsection
