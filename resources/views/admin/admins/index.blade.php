@extends('layouts.core.backend', [
	'menu' => 'admin',
])

@section('title', trans('messages.admins'))

@section('page_header')

			<div class="page-title">
				<ul class="breadcrumb breadcrumb-caret position-right">
					<li class="breadcrumb-item"><a href="{{ action("Admin\HomeController@index") }}">{{ trans('messages.home') }}</a></li>
				</ul>
				<h1>
					<span class="text-semibold"><span class="material-symbols-rounded">format_list_bulleted</span> {{ trans('messages.admins') }}</span>
				</h1>
			</div>

@endsection

@section('content')

				<div class="listing-form"
					sort-url="{{ action('Admin\AdminController@sort') }}"
					data-url="{{ action('Admin\AdminController@listing') }}"
					per-page="{{ Acelle\Model\Admin::$itemsPerPage }}"
				>
					<div class="d-flex top-list-controls top-sticky-content">
						<div class="me-auto">
							@if ($admins->count() >= 0)
								<div class="filter-box">
									<span class="filter-group">
										<span class="title text-semibold text-muted">{{ trans('messages.sort_by') }}</span>
										<select class="select" name="sort_order">
                                            <option value="admins.created_at">{{ trans('messages.created_at') }}</option>
											<option value="admins.updated_at">{{ trans('messages.updated_at') }}</option>
											<option value="admins.name">{{ trans('messages.name') }}</option>
										</select>
										<input type="hidden" name="sort_direction" value="desc" />
<button type="button" class="btn btn-xs sort-direction" data-popup="tooltip" title="{{ trans('messages.change_sort_direction') }}" role="button" class="btn btn-xs">
											<span class="material-symbols-rounded desc">sort</span>
										</button>
									</span>
									<span class="filter-group">
										<span class="title text-semibold text-muted">{{ trans('messages.group') }}</span>
										<select class="select" name="admin_group_id">
											<option value="">{{ trans('messages.all') }}</option>
											@foreach (Acelle\Model\AdminGroup::getSelectOptions(Auth::user()->admin) as $option)
												<option value="{{ $option["value"] }}">{{ $option["text"] }}</option>
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
						@can('create', new Acelle\Model\Admin())
							<div class="text-end">
								<a href="{{ action("Admin\AdminController@create") }}" role="button" class="btn btn-primary">
									<span class="material-symbols-rounded">add</span> {{ trans('messages.create_admin') }}
								</a>
							</div>
						@endcan
					</div>

					<div class="pml-table-container">



					</div>
				</div>

				<script>
					var AdminsIndex = {
						getList: function() {
							return makeList({
								url: '{{ action('Admin\AdminController@listing') }}',
								container: $('.listing-form'),
								content: $('.pml-table-container')
							});
						}
					};
			
					$(document).ready(function() {
						AdminsIndex.getList().load();
					});
				</script>
@endsection
