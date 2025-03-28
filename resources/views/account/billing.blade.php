@extends('layouts.core.frontend_no_subscription', [
	'menu' => 'billing',
])

@section('title', trans('messages.contact_information'))

@section('head')
    <script type="text/javascript" src="{{ AppUrl::asset('core/js/group-manager.js') }}"></script>
@endsection

@section('page_header')

    <div class="page-title">
        <ul class="breadcrumb breadcrumb-caret position-right">
            <li class="breadcrumb-item"><a href="{{ action("HomeController@index") }}">{{ trans('messages.home') }}</a></li>
            <li class="breadcrumb-item active">{{ trans('messages.contact_information') }}</li>
        </ul>
        <h1>
            <span class="text-semibold"><i class="icon-address-book3"></i> {{ $customer->displayName() }}</span>
        </h1>
    </div>

@endsection

@section('content')
    <div class="row bg-white pb-5" style="border-radius: 20px;min-height: 50vh;">

        @include("account._menu", [
            'menu' => 'billing',
        ])

        <div class="row justify-content-between">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="mb-4">{{ trans('messages.billing_information') }}</h3>
                        @if (!$customer->getDefaultBillingAddress())
                            <p>{{ trans('messages.has_no_billing_address') }}</p>
                            <div>
                                <a href="{{ action('AccountController@editBillingAddress') }}" class="btn btn-primary billing-address-edit">
                                    {{ trans('messages.add_billing_address') }}
                                </a>
                            </div>
                        @else
                            @php
                                $billingAddress = $customer->getDefaultBillingAddress();
                            @endphp
                            <div>
                                @if (get_localization_config('show_last_name_first', Auth::user()->customer->getLanguageCode()))
                                    <h4 class="mb-1 mt-0">{{ $billingAddress->last_name }} {{ $billingAddress->first_name }}</h4>
                                @else
                                    <h4 class="mb-1 mt-0">{{ $billingAddress->first_name }} {{ $billingAddress->last_name }}</h4>
                                @endif
                                <div class="">{{ $billingAddress->email }}</div>
                                <div class="">{{ $billingAddress->phone }}</div>

                                <div class="mt-4">{{ $billingAddress->address }}</div>
                                <div class="">{{ $billingAddress->country->name }}</div>
                            </div>

                            <div>
                                <a href="{{ action('AccountController@editBillingAddress') }}"
                                   class="mt-4 billing-address-edit btn btn-primary text-white">
                                    {{ trans('messages.edit_billing_address') }}
                                </a>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="mb-4">{{ trans('messages.payment_method') }}</h3>

                        @include('account._payment_info', [
                            'redirect' => action('AccountController@billing'),
                        ])
                    </div>
                </div>

            </div>
        </div>
    </div>
        

    <script>
        var billingPopup = new Popup();

        $('.billing-address-edit').click(function(e) {
            e.preventDefault();
            var url = $(this).attr('href');

            billingPopup.load(url);
        });
    </script>

@endsection
