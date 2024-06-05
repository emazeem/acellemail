@extends('layouts.core.frontend_dark', [
    'subscriptionPage' => true,
])

@section('title', trans('messages.subscriptions'))

@section('head')
    <script type="text/javascript" src="{{ AppUrl::asset('core/js/group-manager.js') }}"></script>
@endsection

@section('menu_title')
    @include('subscription._title')
@endsection

@section('menu_right')
    @include('layouts.core._top_activity_log')
    @include('layouts.core._menu_frontend_user', [
        'menu' => 'subscription',
    ])
@endsection

@section('content')    
    <div class="container-fluid mt-4 mb-5">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mb-4 text-center">{{ trans('messages.subscription.choose_a_plan') }}</h2>
                <p class="text-center">{{ trans('messages.select_plan.wording') }}</p>

                @if ($getLastCancelledOrEndedGeneralSubscription)
                    @include('elements._notification', [
                        'level' => 'warning',
                        'message' => trans('messages.subscription.ended_intro', [
                            'ended_at' => Auth::user()->customer->formatDateTime($getLastCancelledOrEndedGeneralSubscription->current_period_ends_at, 'datetime_full'),
                            'plan' => $getLastCancelledOrEndedGeneralSubscription->planGeneral->name,
                        ])
                    ])
                @endif

                @include('elements._notification', [
                    'level' => 'warning',
                    'message' => trans('messages.no_plan.title')
                ])
    

                @if (empty($plans))
                    <div class="row">
                        <div class="col-md-6">
                            @include('elements._notification', [
                                'level' => 'danger',
                                'message' => trans('messages.plan.no_available_plan')
                            ])
                        </div>
                    </div>
                @else
                    <div class="container-fluid px-md-5">
                        <div class="row">
                            @foreach ($plans as $key => $plan)
                                <div class="col-md-3" style="">
                                    <div class="border bg-white" style="box-shadow: 0px 0px 6px 0px #006FFF59;box-shadow: 0px 4px 4px 0px #0860D226;border-radius: 15px">
                                        <div class="p-3 position-relative">
                                            <img src="{{url('images/subscription.png')}}" alt="" class="img-fluid" style="object-fit: fill;height: 150px;width: 100%;box-shadow: 0px 0px 4px 0px #3531E840;border-radius: 15px">
                                            <label class="plan-title fs-5 fw-600 mt-0 position-absolute" style="top: 30px;left: 30px">{{ $plan->name }}</label>
                                        </div>
                                        <div class="p-3 subscription-div">
                                            <div>
                                                <p class="mt-0">{{ $plan->description }}</p>
                                            </div>
                                            <div  class="text-center">
                                                <div class="price col-md-12 text-center justify-content-center">
                                                    <h5 style="color: blue;font-weight: bolder!important;">$</h5>
                                                    <h1 style="font-weight: bolder!important;font-size: 40px">{!! number_format($plan->price) !!}</h1>
                                                    <h4 class="p-currency-code " style="font-weight: bolder!important;color: grey">{{ $plan->currency->code }}</h4>
                                                </div>
                                                <h4 class="text-primary mt-0" style="font-weight: bolder!important;">
                                                    {{ $plan->displayFrequencyTime() }}
                                                </h4>
                                                @if ($plan->hasTrial())
                                                    <p
                                                            link-method="POST"
                                                            href="{{ action('SubscriptionController@assignPlan', [
                                                            'plan_uid' => $plan->uid,
                                                        ]) }}"
                                                            class="mt-0 pt-0 fw-300 mb-0 text-center">
                                                        {{ trans('messages.plan.has_trial', [
                                                            'time' => $plan->getTrialPeriodTimePhrase(),
                                                        ]) }}
                                                    </p>
                                                @endif
                                            </div>

                                            <div>
                                                <div style="vertical-align:bottom">
                                                    <span class="time-box d-block text-left small py-2 fw-600 mt-5">
                                                        <div class="mb-1">
                                                            <span> <input type="checkbox" checked > {{ $plan->displayTotalQuota() }} {{ trans('messages.sending_total_quota_label') }}</span>
                                                        </div>
                                                        <div>
                                                            <span> <input type="checkbox" checked > {{ $plan->displayMaxSubscriber() }} {{ trans('messages.contacts') }}</span>
                                                        </div>
                                                    </span>

                                                        <a link-method="POST" href="{{ action('SubscriptionController@assignPlan', ['plan_uid' => $plan->uid]) }}" class="btn fw-600 btn-primary rounded-5 d-block py-2 shadow-sm">
                                                            @if ($plan->isFree() || $plan->hasTrial())
                                                                {{ trans('messages.plan.select') }}
                                                            @else
                                                                {{ trans('messages.plan.buy') }}
                                                            @endif
                                                        </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                    </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        var SubscriptionSelectPlan = {
        }

        $(function() {
            var manager = new GroupManager();
            $('.plan-item').each(function() {
                manager.add({
                    box: $(this),
                    url: $(this).attr('data-url')
                });
            });

            manager.bind(function(group, others) {
                group.box.on('click', function() {
                    group.box.addClass('current');

                    others.forEach(function(other) {
                        other.box.removeClass('current');
                    });

                    // load order
                    // SubscriptionSelectPlan.getOrderBox().load(group.url);
                })
            });
        });
    </script>
    <style>
        .subscription-div .price{
            display: flex;
        }
    </style>
@endsection