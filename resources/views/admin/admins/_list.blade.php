@if ($admins->count() > 0)
    <table class="table table-box pml-table mt-2"
        current-page="{{ empty(request()->page) ? 1 : empty(request()->page) }}"
    >
        @foreach ($admins as $key => $item)
            <tr class="position-relative">
                <td width="1%" class="list-check-col">
                    <img width="50" class="rounded-circle me-2" src="{{ $item->user->getProfileImageUrl() }}" alt="">
                </td>
                <td>
                    <h5 class="m-0 text-bold">
                        <a class="kq_search d-block" href="{{ action('Admin\AdminController@edit', $item->uid) }}">{{ $item->displayName() }}</a>
                    </h5>
                    <span class="text-muted kq_search">{{ $item->user->email }}</span>
                </td>
                <td>
                    <h5 class="no-margin text-bold kq_search">
                        @if (Auth::user()->admin->getPermission("admin_group_update") != 'no')
                            <a class="kq_search" href="{{ action('Admin\AdminGroupController@edit', $item->adminGroup->id) }}">
                                {{ $item->adminGroup->name }}
                            </a>
                        @else
                            {{ $item->adminGroup->name }}
                        @endif
                    </h5>
                    <span class="text-muted">{{ trans('messages.admin_group') }}</span>
                </td>
                <td class="stat-fix-size-sm">
                    <div class="single-stat-box pull-left">
                        <a href="{{ action('Admin\CustomerController@index') }}">
                            <span class="no-margin stat-num">{{ $item->customers()->count() }}</span>
                        </a>
                        <br />
                        <span class="text-muted">{{ trans("messages." . Acelle\Library\Tool::getPluralPrase('customer', $item->customers()->count())) }}</span>
                    </div>
                </td>
                <td>
                    <h5 class="no-margin text-bold kq_search">
                        {{ Auth::user()->admin->formatDateTime($item->created_at, 'datetime_full') }}
                    </h5>
                    <span class="text-muted">{{ trans('messages.created_at') }}</span>
                </td>
                <td class="stat-fix-size">
                    <span class="text-muted2 list-status pull-left">
                        <span class="label label-flat bg-{{ $item->status }}">{{ $item->status }}</span>
                    </span>
                </td>
                <td class="text-end">
                    @can('loginAs', $item)
                        <a href="{{ action('Admin\AdminController@loginAs', $item->uid) }}" data-popup="tooltip" title="{{ trans('messages.login_as_this_admin') }}" role="button" class="btn btn-primary btn-icon"><span class="material-symbols-rounded">login</span></a>
                    @endcan
                    @can('update', $item)
                        <a href="{{ action('Admin\AdminController@edit', $item->uid) }}" data-popup="tooltip" title="{{ trans('messages.edit') }}" role="button" class="btn btn-primary btn-icon"><span class="material-symbols-rounded">edit</span></a>
                    @endcan
                    @if (Auth::user()->can('delete', $item) || Auth::user()->can('enable', $item) || Auth::user()->can('disable', $item) || Auth::user()->can('delete', $item))
                        <div class="btn-group">
                            <button role="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"></button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                @can('enable', $item)
                                    <li>
                                        <a class="dropdown-item list-action-single" link-confirm="{{ trans('messages.enable_admins_confirm') }}" href="{{ action('Admin\AdminController@enable', ["uids" => $item->uid]) }}">
                                            <span class="material-symbols-rounded">play_arrow</span> {{ trans('messages.enable') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('disable', $item)
                                    <li>
                                        <a class="dropdown-item list-action-single" link-confirm="{{ trans('messages.disable_admins_confirm') }}" href="{{ action('Admin\AdminController@disable', ["uids" => $item->uid]) }}">
                                            <span class="material-symbols-rounded">hide_source</span> {{ trans('messages.disable') }}
                                        </a>
                                    </li>
                                @endcan
                                <li>
                                    <a list-action="one-click-login" class="dropdown-item" href="{{ action('Admin\AdminController@oneClickLogin', $item->uid) }}">
                                        <span class="material-symbols-rounded">link</span> {{ trans('messages.admin.generate_one_click_login') }}
                                    </a>
                                </li>
                                @can('delete', $item)
                                    <li>
                                        <a class="dropdown-item list-action-single" link-confirm="{{ trans('messages.delete_admins_confirm') }}" href="{{ action('Admin\AdminController@delete', ['uids' => $item->uid]) }}">
                                            <span class="material-symbols-rounded">delete_outline</span> {{ trans('messages.delete') }}
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </div>
                    @endcan
                </td>
            </tr>
        @endforeach
    </table>
    @include('elements/_per_page_select', ["items" => $admins])

    <script>
        var AdminAdminsList = {
            oneClickPopup: null,

            init: function() {
                this.oneClickPopup = new Popup();
            }
        }

        $(function() {
            AdminAdminsList.init();

            $('[list-action="one-click-login"]').on('click', function(e) {
                e.preventDefault();
                var url = $(this).attr('href');

                AdminAdminsList.oneClickPopup.load(url);
            })
        })
    </script>
    
@elseif (!empty(request()->filters))
    <div class="empty-list">
        <span class="material-symbols-rounded">people_outline</span>
        <span class="line-1">
            {{ trans('messages.no_search_result') }}
        </span>
    </div>
@else
    <div class="empty-list">
        <span class="material-symbols-rounded">people_outline</span>
        <span class="line-1">
            {{ trans('messages.admin_empty_line_1') }}
        </span>
    </div>
@endif
