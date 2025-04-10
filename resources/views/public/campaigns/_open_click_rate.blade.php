<div class="row mt-5">
    <div class="col-md-8">
        <p class="mb-4">{{ trans('messages.campaign_open_click_rate_intro') }}</p>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="content-group-sm">
            <div class="d-flex">
                <h4 class="text-semibold mt-0 me-auto">{{ trans('messages.open_rate') }}</h4>
                <span class="pull-right progress-right-info text-primary">
                    {{ number_to_percentage($campaign->readCache('UniqOpenRate')) }}
                </span>
            </div>
            <div class="progress progress-sm">
                <div class="progress-bar bg-color3" style="width: {{ number_to_percentage($campaign->readCache('UniqOpenRate')) }}">
                </div>
            </div>
        </div>
        <div class="stat-table">
            <div class="stat-row">
                <p class="text-muted">{{ trans('messages.successful_deliveries') }}</p>
                <span class="pull-right num">
                    {{ number_with_delimiter($campaign->readCache('DeliveredCount')) }}
                    <span class="text-muted2">{{ number_to_percentage($campaign->readCache('DeliveredRate')) }}</span>
                </span>
            </div>
            <div class="stat-row">
                <p class="text-muted">{{ trans('messages.total_opens') }}</p>
                <span class="pull-right num">
                    {{ number_with_delimiter($campaign->uniqueOpenCount()) }}
                </span>
            </div>
            <div class="stat-row">
                <p class="text-muted">{{ trans('messages.uniq_opens') }}</p>
                <span class="pull-right num">
                    {{ number_with_delimiter($campaign->readCache('UniqOpenCount')) }}
                </span>
            </div>
            <div class="stat-row">
                <p class="text-muted">{{ trans('messages.last_opened') }}</p>
                <span class="pull-right num">
                    {{ $campaign->lastOpen() ? $campaign->customer->formatDateTime($campaign->lastOpen()->created_at, 'datetime_full') : "" }}
                </span>
            </div>
        </div>
        <div class="text-end">
            <a href="{{ action('Pub\CampaignController@openLog', $campaign->uid) }}" class="btn btn-primary">{{ trans('messages.open_log') }} <span class="material-symbols-rounded">arrow_forward</span></a>
        </div>
        <br />
    </div>
    <div class="col-md-6">
        <div class="content-group-sm">
            <div class="d-flex">
                <h4 class="text-semibold mt-0 me-auto">{{ trans('messages.click_rate') }}</h4>
                <div class="progress-right-info text-primary">{{ number_to_percentage($campaign->readCache('ClickedRate')) }}</div>
            </div>
            <div class="progress progress-sm">
                <div class="progress-bar bg-color7" style="width: {{ number_to_percentage($campaign->readCache('ClickedRate')) }}">
                </div>
            </div>
        </div>
        <div class="stat-table">
            <div class="stat-row">
                <p class="text-muted">{{ trans('messages.total_clicks') }}</p>
                <span class="pull-right num">
                    {{ number_with_delimiter($campaign->clickCount()) }}
                </span>
            </div>
            <div class="stat-row">
                <p class="text-muted">{{ trans('messages.total_opens') }}</p>
                <span class="pull-right num">
                    {{ number_with_delimiter($campaign->uniqueOpenCount()) }}
                </span>
            </div>
            <div class="stat-row">
                <p class="text-muted">{{ trans('messages.abuse_reports') }}</p>
                <span class="pull-right num">
                    {{ number_with_delimiter($campaign->abuseFeedbackCount()) }}
                </span>
            </div>
            <div class="stat-row">
                <p class="text-muted">{{ trans('messages.last_clicked') }}</p>
                <span class="pull-right num">
                    {{ $campaign->lastClick() ? $campaign->customer->formatDateTime($campaign->lastClick()->created_at, 'datetime_full') : "" }}
                </span>
            </div>
        </div>
        <div class="text-end">
            <a href="{{ action('Pub\CampaignController@clickLog', $campaign->uid) }}" class="btn btn-primary">{{ trans('messages.click_log') }} <span class="material-symbols-rounded">arrow_forward</span></a>
        </div>
        <br />
    </div>
</div>
