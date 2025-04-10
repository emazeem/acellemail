<div class="row mb-4">
    <div class="col-md-8"><p class="mb-0">{{ trans('messages.plan.public_view.desc') }}</p></div>
    <div class="col-md-4">
        <div class="text-end">
            <div class="dropdown d-inline-block">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ trans('messages.plan.style_3') }}
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <li><a class="dropdown-item" href="{{ action('Admin\PlanController@publicView') }}">{{ trans('messages.plan.default_style') }}</a></li>
                  <li><a class="dropdown-item" href="{{ action('Admin\PlanController@publicView', ['style' => 'style1']) }}">{{ trans('messages.plan.style_1') }}</a></li>
                  <li><a class="dropdown-item" href="{{ action('Admin\PlanController@publicView', ['style' => 'style2']) }}">{{ trans('messages.plan.style_2') }}</a></li>
                  <li><a class="dropdown-item active" href="javascript:;">{{ trans('messages.plan.style_3') }}</a></li>
                </ul>
            </div>
            <a target="_blank" href="{{ action("PlanController@publicListPage", ['style' => 'style3']) }}" role="button" class="btn btn-primary modal-action">
                <span class="material-symbols-rounded">open_in_new</span> {{ trans('messages.plan.view_public_page') }}
            </a>
        </div>
    </div>
</div>

@include('plans.publicView.' . $style)