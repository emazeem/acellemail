@if (!$server->id)
<form id="editServerForm" action="{{ action('Admin\SendingServerController@store', ["type" => request()->type]) }}" method="POST" class="form-validate-jqueryz">
    {{ csrf_field() }}
    <input type="hidden" name="type" value="{{ $server->type }}" />
@else
<form id="editServerForm" enctype="multipart/form-data" action="{{ action('Admin\SendingServerController@update', [$server->uid, $server->type]) }}" method="POST" class="form-validate-jqueryz">
    <input type="hidden" name="_method" value="PATCH">
    {{ csrf_field() }}
@endif

    <div class="mc_section">
        <div class="row">
            <div class="col-md-6">
                <p>{!! trans('messages.sending_servers.mailgun_smtp.intro') !!}</p>

                @include('helpers.form_control', [
                    'type' => 'password',
                    'class' => '',
                    'name' => 'api_key',
                    'value' => $server->api_key,
                    'help_class' => 'sending_server',
                    'rules' => $server->getRules(),
                    'eye' => true,
                    'disabled' =>($server->id && $errors->isEmpty()),
                ])

                @include('helpers.form_control', [
                    'type' => 'select',
                    'class' => '',
                    'name' => 'aws_region',
                    'value' => $server->aws_region,
                    'label' => trans('messages.maillgun.api_region'),
                    'help_class' => 'sending_server',
                    'options' => Acelle\Model\SendingServer::mailgunRegionSelectOptions(),
                    'rules' => $server->getRules(),
                    'disabled' => ($server->id && $errors->isEmpty()),
                ])

                @include('helpers.form_control', [
                    'type' => 'text',
                    'class' => '',
                    'name' => 'domain',
                    'value' => $server->domain,
                    'help_class' => 'sending_server',
                    'rules' => $server->getRules(),
                    'disabled' =>($server->id && $errors->isEmpty()),
                ])

                @include('helpers.form_control', [
                    'type' => 'text',
                    'class' => '',
                    'name' => 'host',
                    'value' => $server->host,
                    'help_class' => 'sending_server',
                    'rules' => $server->getRules(),
                    'disabled' =>($server->id && $errors->isEmpty()),
                ])

                @include('helpers.form_control', [
                    'type' => 'text',
                    'class' => '',
                    'name' => 'smtp_username',
                    'value' => $server->smtp_username,
                    'help_class' => 'sending_server',
                    'rules' => $server->getRules(),
                    'disabled' =>($server->id && $errors->isEmpty()),
                ])

                @include('helpers.form_control', [
                    'type' => 'password',
                    'class' => '',
                    'name' => 'smtp_password',
                    'value' => $server->smtp_password,
                    'help_class' => 'sending_server',
                    'rules' => $server->getRules(),
                    'eye' => true,
                    'disabled' =>($server->id && $errors->isEmpty()),
                ])

                @include('helpers.form_control', [
                    'type' => 'text',
                    'class' => '',
                    'name' => 'smtp_port',
                    'value' => $server->smtp_port,
                    'help_class' => 'sending_server',
                    'rules' => $server->getRules(),
                    'disabled' =>($server->id && $errors->isEmpty()),
                ])

                @include('helpers.form_control', [
                    'type' => 'text',
                    'class' => '',
                    'name' => 'smtp_protocol',
                    'value' => $server->smtp_protocol,
                    'help_class' => 'sending_server',
                    'rules' => $server->getRules(),
                    'disabled' =>($server->id && $errors->isEmpty()),
                ])
            </div>
        </div>
        <div class="text-left">
            @if ($server->id && Auth::user()->admin->can('test', $server) && $errors->isEmpty())
                <span class="edit-group">
                    <a
                        href="{{ action('Admin\SendingServerController@testConnection', $server->uid) }}"
                        role="button"
                        class="btn btn-primary me-2 test-connection-button"
                        mask-title="{{ trans('messages.sending_server.testing') }}"
                    >
                        {{ trans('messages.sending_server.test_connection') }}
                    </a>
                        <a id="SendTestEmailButton"
                        href="{{ action('Admin\SendingServerController@test', $server->uid) }}"
                        role="button"
                        class="btn btn-primary me-2 modal_link"
                        data-in-form="true"
                        link-method="GET"
                    >
                        {{ trans('messages.sending_server.send_a_test_email') }}
                    </a>
                    <a href="javascript:;" role="button" class="btn btn-link switch-form-toggle">
                        {{ trans('messages.edit') }}
                    </a>
                </span>
                <span class="cancel-group hide">
                    <button class="btn btn-primary me-2">{{ trans('messages.save') }}</button>
                    <a href="javascript:;" role="button" class="btn btn-link switch-form-toggle">
                        {{ trans('messages.edit') }}
                    </a>
                </span>
            @else
                <button class="btn btn-primary me-2">{{ trans('messages.save') }}</button>
                <a href="{{ action('Admin\SendingServerController@index') }}" role="button" class="btn btn-link">
                    {{ trans('messages.cancel') }}
                </a>
            @endif

        </div>
    </div>
</form>
@if ($server->id)
<form action="{{ action('Admin\SendingServerController@config', $server->uid) }}" method="POST" class="form-validate-jqueryz">
    {{ csrf_field() }}
    <div class="mc_section">
        <div class="row">
            <div class="col-md-6">
                <h2 class=" mt-20">{{ trans('messages.sending_servers.configuration_settings') }}</h2>
                <p>
                    {{ trans('messages.sending_servers.configuration_settings.mailgun.intro') }}
                </p>

                @include('helpers.form_control', [
                    'type' => 'text',
                    'class' => '',
                    'name' => 'name',
                    'value' => $server->name,
                    'help_class' => 'sending_server',
                    'rules' => $server->getConfigRules(),
                ])

                @include('helpers.form_control', [
                    'type' => 'text',
                    'class' => '',
                    'name' => 'default_from_email',
                    'value' => $server->default_from_email,
                    'help_class' => 'sending_server',
                    'rules' => $server->getConfigRules(),
                ])

                <p>{!! trans('messages.sending_servers.sending_limit.mailgun.intro') !!}</p>

                <div class="sendind-limit-select-custom" data-url="{{ action('Admin\SendingServerController@sendingLimit', ['uid' => ($server->uid ? $server->uid : 0)]) }}">
                    @include ('admin.sending_servers.form._sending_limit', [
                        'quotaValue' => $server->quota_value,
                        'quotaBase' => $server->quota_base,
                        'quotaUnit' => $server->quota_unit,
                    ])
                </div>

            </div>
        </div>
    </div>

    @include('admin.sending_servers.form.mailgun-sender-identity')

</form>
@endif
