@php
    $wordpress = new \Acelle\Library\WordpressManager();
@endphp
<nav class="navbar navbar-expand-xl navbar-dark fixed-top navbar-main py-0">
    <div class="container-fluid ms-0">
        <a class="navbar-brand d-flex align-items-center me-2" href="{{ action('HomeController@index') }}">
            @if (getThemeMode(Auth::user()->customer->theme_mode, request()->session()->get('customer-auto-theme-mode')) == 'light' &&
                Auth::user()->customer->getColorScheme() == 'white'
            )
                <img class="logo" src="{{ getSiteLogoUrl('dark') }}" alt="">
            @else
                <img class="logo" src="{{ getSiteLogoUrl('light') }}" alt="">
            @endif
        </a>
        <button class="navbar-toggler" role="button" data-bs-toggle="collapse" data-bs-target="#mainAppNav" aria-controls="mainAppNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <span middle-bar-control="element" class="leftbar-hide-menu middle-bar-element">
            <svg class="SideBurgerIcon-image" viewBox="0 0 50 32"><path d="M49,4H19c-0.6,0-1-0.4-1-1s0.4-1,1-1h30c0.6,0,1,0.4,1,1S49.6,4,49,4z"></path><path d="M49,16H19c-0.6,0-1-0.4-1-1s0.4-1,1-1h30c0.6,0,1,0.4,1,1S49.6,16,49,16z"></path><path d="M49,28H19c-0.6,0-1-0.4-1-1s0.4-1,1-1h30c0.6,0,1,0.4,1,1S49.6,28,49,28z"></path><path d="M8.1,22.8c-0.3,0-0.5-0.1-0.7-0.3L0.7,15l6.7-7.8c0.4-0.4,1-0.5,1.4-0.1c0.4,0.4,0.5,1,0.1,1.4L3.3,15l5.5,6.2   c0.4,0.4,0.3,1-0.1,1.4C8.6,22.7,8.4,22.8,8.1,22.8z"></path></svg>
        </span>

        <div class="collapse navbar-collapse" id="mainAppNav">
            <ul class="navbar-nav me-auto mb-md-0 main-menu">
                <li class="nav-item" rel0="HomeController">
                    <a href="{{ action('HomeController@index') }}" title="{{ trans('messages.dashboard') }}" class="leftbar-tooltip nav-link d-flex align-items-center py-3 lvl-1">
                        <i class="navbar-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 92.1 86.1"><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><g id="Layer_2-2" data-name="Layer 2"><g id="Layer_1-2-2" data-name="Layer 1-2"><path class="color-badge"  d="M51.8,86.1H41.9a8.5,8.5,0,0,1-8.5-8.5V60.2a8.5,8.5,0,0,1,8.5-8.5h9.9a8.5,8.5,0,0,1,8.5,8.5V77.6A8.5,8.5,0,0,1,51.8,86.1ZM41.9,58.7a1.5,1.5,0,0,0-1.5,1.5V77.6a1.5,1.5,0,0,0,1.5,1.5h9.9a1.5,1.5,0,0,0,1.5-1.5V60.2a1.5,1.5,0,0,0-1.5-1.5Z" style="fill:aqua"/><path d="M60.4,86.1H31.7A20.6,20.6,0,0,1,11.2,65.7V24.6h7V65.7A13.5,13.5,0,0,0,31.7,79.1H60.4A13.5,13.5,0,0,0,73.9,65.7V25.3h7V65.7A20.6,20.6,0,0,1,60.4,86.1Z" style="fill:#f2f2f2"/><path d="M88.6,36.5a3.6,3.6,0,0,1-2-.6L45.7,7.7,5.5,35.1a3.5,3.5,0,1,1-4-5.8L43.7.6a3.6,3.6,0,0,1,4,0L90.6,30.1a3.5,3.5,0,0,1-2,6.4Z" style="fill:#f2f2f2"/></g></g></g></g></svg>
                        </i>
                        <span>{{ trans('messages.dashboard') }}</span>
                    </a>
                </li>
                <li class="nav-item" rel0="MenuController">
                    <a href="{{ action('Site\MenuController@index') }}" title="{{ trans('messages.dashboard') }}" class="leftbar-tooltip nav-link d-flex align-items-center py-3 lvl-1">
                        <i class="navbar-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 91.6 90.9"><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><g id="Layer_2-2" data-name="Layer 2"><g id="Layer_1-2-2" data-name="Layer 1-2"><path d="M0,84.1V6.8C0,3.1,3.5,0,7.7,0H83.9c4.2,0,7.7,3.1,7.7,6.8V84.1c0,3.7-3.5,6.8-7.7,6.8H7.7C3.5,90.9,0,87.8,0,84.1ZM84.6,7.2,83.9,7H7.7L7,7.2V83.7l.7.2H83.9l.7-.2Z" style="fill:#f2f2f2"/><path d="M2.5,58.1A3.5,3.5,0,0,1,6,54.6H88.1a3.5,3.5,0,0,1,0,7H6A3.5,3.5,0,0,1,2.5,58.1Z" style="fill:#f2f2f2"/><path d="M0,30.1a3.5,3.5,0,0,1,3.5-3.5H88.1a3.5,3.5,0,0,1,0,7H3.5A3.5,3.5,0,0,1,0,30.1Z" style="fill:#f2f2f2"/><path d="M13.1,15.9a6.4,6.4,0,0,1,6.5-6.3,6.4,6.4,0,0,1,6.5,6.3,6.4,6.4,0,0,1-6.5,6.3A6.4,6.4,0,0,1,13.1,15.9Zm6,0a.7.7,0,0,0,.5.7.7.7,0,0,0,0-1.4A.7.7,0,0,0,19.1,15.9Z" style="fill:#b3ff00"/><path d="M13.1,43.6a6.4,6.4,0,0,1,6.5-6.3,6.3,6.3,0,1,1,0,12.6A6.4,6.4,0,0,1,13.1,43.6Zm6,0a.7.7,0,0,0,.5.7.7.7,0,0,0,0-1.4A.7.7,0,0,0,19.1,43.6Z" style="fill:#f2f2f2"/><path d="M13.1,74.2a6.4,6.4,0,0,1,6.5-6.3,6.3,6.3,0,1,1,0,12.6A6.4,6.4,0,0,1,13.1,74.2Zm6,0a.7.7,0,0,0,.5.7.7.7,0,0,0,0-1.4A.7.7,0,0,0,19.1,74.2Z" style="fill:#f2f2f2"/><path d="M31.1,15.9a3.5,3.5,0,0,1,3.5-3.5H72.7a3.5,3.5,0,1,1,0,7H34.6A3.5,3.5,0,0,1,31.1,15.9Z" style="fill:#f2f2f2"/><path d="M31.1,44.4a3.5,3.5,0,0,1,3.5-3.5H72.7a3.5,3.5,0,0,1,0,7H34.6A3.5,3.5,0,0,1,31.1,44.4Z" style="fill:#f2f2f2"/><path d="M31.1,74.2a3.5,3.5,0,0,1,3.5-3.5H72.7a3.5,3.5,0,0,1,0,7H34.6A3.5,3.5,0,0,1,31.1,74.2Z" style="fill:#f2f2f2"/></g></g></g></g></svg>
                        </i>
                        <span>{{ trans('messages.site.menus') }}</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a href="" title="{{ trans('messages.content') }}"
                        class="leftbar-tooltip nav-link d-flex align-items-center py-3 lvl-1 dropdown-toggle"
                        id="content-menu" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="navbar-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 88.2 71.4"><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><g id="Layer_2-2" data-name="Layer 2"><g id="Layer_1-2-2" data-name="Layer 1-2"><rect x="18.4" y="47.9" width="52.5" height="10.1" style="fill:#f2f2f2"/><rect x="18.4" y="30.7" width="52.5" height="10.1" style="fill:#ffbfbf"/><path d="M71.3,71.4h0l-53.6-.5a2.8,2.8,0,0,1-1.7-.7,2.2,2.2,0,0,1-.7-1.7l.9-38-4.4,2.7a2.2,2.2,0,0,1-1.9.3,2.6,2.6,0,0,1-1.5-1.2C5.7,26.8,3,21.3.2,15.8a2.4,2.4,0,0,1,.3-2.6A39.6,39.6,0,0,1,16.8,1.8C21.5.2,24.5.3,30.4.5L42.6.7C48.8.6,53,.4,56.1.2c5.3-.3,8-.5,12.5.8a42.7,42.7,0,0,1,19,11.9,2.5,2.5,0,0,1,.4,2.6L80.6,31.9A2.3,2.3,0,0,1,77.3,33l-4.7-2.7L73.7,69a2.2,2.2,0,0,1-.7,1.7A2.4,2.4,0,0,1,71.3,71.4ZM20.1,66.1l48.7.5L67.6,26.1A2.2,2.2,0,0,1,68.8,24a2.3,2.3,0,0,1,2.4,0l6.1,3.5L83,14.9A37.8,37.8,0,0,0,67.3,5.5c-3.7-1-5.8-.9-10.9-.6-3.1.2-7.4.4-13.7.5L30.3,5.2c-5.8-.2-8-.3-11.8,1.1A34.8,34.8,0,0,0,5.2,15.1l6.3,12.7,5.9-3.7a2.1,2.1,0,0,1,2.4,0A2.4,2.4,0,0,1,21,26.2Z" style="fill:#f2f2f2"/><path d="M44.4,17.9c-3.5,0-6.9-1.6-10-4.8a16.7,16.7,0,0,1-4.5-10,2.4,2.4,0,1,1,4.7-.5,12.5,12.5,0,0,0,3.2,7.1c.9.9,3.5,3.6,7,3.3s6.4-3.9,7.5-6.1A16.6,16.6,0,0,0,53.9,2a2.4,2.4,0,0,1,4.7.7A18,18,0,0,1,56.5,9c-2.7,5.3-6.8,8.4-11.4,8.7A.8.8,0,0,1,44.4,17.9Z" style="fill:#f2f2f2"/></g></g></g></g></svg>
                        </i>
                        <span>{{ trans('messages.brand.product') }}</span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="content-menu">
                        <li class="nav-item" rel0="ProductController/index">
                            <a class="dropdown-item d-flex align-items-center" href="{{ action('Site\ProductController@index') }}">
                                <span>{{ trans('messages.brand.products') }}</span>
                            </a>
                        </li>
                        <li class="nav-item" rel0="ProductController/index2">
                            <a class="dropdown-item d-flex align-items-center" href="{{ action('Site\ProductController@index2') }}">
                                <span>{{ trans('messages.brand.products') }} (layout 2)</span>
                            </a>
                        </li>
                        <li class="nav-item" rel0="CategoryController">
                            <a class="dropdown-item d-flex align-items-center" href="{{ action('Site\CategoryController@index') }}">
                                <span>{{ trans('messages.brand.categories') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item" rel0="OrderController">
                    <a href="{{ action('Site\OrderController@index') }}" title="{{ trans('messages.products') }}" class="leftbar-tooltip nav-link d-flex align-items-center py-3 lvl-1">
                        <i class="navbar-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 106.1 107.7"><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><g id="Layer_2-2" data-name="Layer 2"><g id="Layer_1-2-2" data-name="Layer 1-2"><g id="Layer_2-2-2" data-name="Layer 2-2"><g id="Layer_1-2-2-2" data-name="Layer 1-2-2"><path d="M26.5,107.7A26.6,26.6,0,0,1,0,81.4v-55A26.6,26.6,0,0,1,26.5,0H62.8a3.5,3.5,0,0,1,3.5,3.5A3.5,3.5,0,0,1,62.8,7H26.5A19.5,19.5,0,0,0,7,26.4v55a19.5,19.5,0,0,0,19.5,19.3H76.6A19.5,19.5,0,0,0,96,81.3V55.4a3.5,3.5,0,0,1,7,0V81.3a26.6,26.6,0,0,1-26.4,26.4Z" style="fill:#f2f2f2"/><path d="M51.5,55.3A16.8,16.8,0,1,1,68.3,38.5,16.8,16.8,0,0,1,51.5,55.3Zm0-26.6a9.8,9.8,0,1,0,9.8,9.8A9.8,9.8,0,0,0,51.5,28.7Z" style="fill:#ffadad"/><path d="M77.9,71.7H25.1a3.5,3.5,0,0,1,0-7H77.9a3.5,3.5,0,0,1,0,7Z" style="fill:#f2f2f2"/><path d="M77.9,86H25.1a3.5,3.5,0,1,1,0-7H77.9a3.5,3.5,0,0,1,0,7Z" style="fill:#f2f2f2"/><path d="M97.1,40.9a2,2,0,0,1-1.1-.3l-9.6-5-9.5,5a2.3,2.3,0,0,1-2.5-.2,2.5,2.5,0,0,1-1-2.3l1.8-10.7-7.7-7.5a2.4,2.4,0,0,1-.6-2.4,2.7,2.7,0,0,1,2-1.7l10.6-1.5,4.7-9.7a2.6,2.6,0,0,1,2.2-1.3h0a2.3,2.3,0,0,1,2.1,1.3l4.9,9.7L104,15.8a2.7,2.7,0,0,1,2,1.7,2.4,2.4,0,0,1-.6,2.4l-7.7,7.5,1.8,10.7a2.5,2.5,0,0,1-1,2.3A2.4,2.4,0,0,1,97.1,40.9ZM86.4,30.5a2,2,0,0,1,1.1.3l6.4,3.3L92.7,27a2.6,2.6,0,0,1,.7-2.1l5.1-5-7-1a2.3,2.3,0,0,1-1.8-1.3l-3.3-6.5-3.2,6.5a2.3,2.3,0,0,1-1.8,1.3l-7,1,5.1,5a2.6,2.6,0,0,1,.7,2.1L79,34.1l6.3-3.3A2,2,0,0,1,86.4,30.5Zm-5.3-14Z" style="fill:#f2f2f2"/></g></g></g></g></g></g></svg>
                        </i>
                        <span>{{ trans('messages.brand.orders') }}</span>
                    </a>
                </li>
                <li class="nav-item" rel0="CustomerController">
                    <a href="{{ action('Site\CustomerController@index') }}" title="{{ trans('messages.products') }}" class="leftbar-tooltip nav-link d-flex align-items-center py-3 lvl-1">
                        <i class="navbar-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 92 103"><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><g id="Layer_2-2" data-name="Layer 2"><g id="Layer_1-2-2" data-name="Layer 1-2"><path d="M46,51.6A25.8,25.8,0,1,1,71.8,25.8,25.9,25.9,0,0,1,46,51.6ZM46,7A18.8,18.8,0,1,0,64.8,25.8,18.8,18.8,0,0,0,46,7Z" style="fill:#f2f2f2"/><path d="M88.5,103A3.5,3.5,0,0,1,85,99.5a39,39,0,0,0-78,0A3.5,3.5,0,0,1,3.5,103,3.5,3.5,0,0,1,0,99.5a46,46,0,0,1,92,0A3.5,3.5,0,0,1,88.5,103Z" style="fill:#f2f2f2"/><path d="M19.5,103H3.5a3.5,3.5,0,0,1,0-7h16a3.5,3.5,0,0,1,0,7Z" style="fill:#f2f2f2"/><path d="M88.5,103H36.9a3.5,3.5,0,0,1,0-7H88.5a3.5,3.5,0,0,1,0,7Z" style="fill:#f2f2f2"/><path d="M46,39c-3.3,0-6.4-1.6-7.7-4a3.6,3.6,0,0,1,1.4-4.8,3.5,3.5,0,0,1,4.7,1.4A3.5,3.5,0,0,0,46,32a3,3,0,0,0,1.6-.5,3.4,3.4,0,0,1,4.5-1.6,3.4,3.4,0,0,1,1.8,4.6C52.6,37.6,48.9,39,46,39Zm-1.5-7.4Z" style="fill:lime"/></g></g></g></g></svg>
                        </i>
                        <span>{{ trans('messages.customers') }}</span>
                    </a>
                </li>
                {{-- <li class="nav-item" rel0="TemplateController">
                    <a href="{{ action('Site\TemplateController@index') }}" title="{{ trans('messages.products') }}" class="leftbar-tooltip nav-link d-flex align-items-center py-3 lvl-1">
                        <i class="navbar-icon" style="">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 91.8 86.2"><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><g id="Layer_2-2" data-name="Layer 2"><g id="Layer_1-2-2" data-name="Layer 1-2"><path d="M72.7,86.2h-61A11.7,11.7,0,0,1,0,74.5v-61A11.7,11.7,0,0,1,11.7,1.8H52.3a3.5,3.5,0,0,1,3.5,3.5,3.5,3.5,0,0,1-3.5,3.5H11.7A4.7,4.7,0,0,0,7,13.5v61a4.7,4.7,0,0,0,4.7,4.7h61a4.7,4.7,0,0,0,4.7-4.7V35.2a3.5,3.5,0,0,1,7,0V74.5A11.7,11.7,0,0,1,72.7,86.2Z" style="fill:#f2f2f2"/><path d="M17.2,23.4a4.9,4.9,0,1,1,4.9-4.9A4.9,4.9,0,0,1,17.2,23.4Zm0-7a2.1,2.1,0,1,0,2.1,2.1A2.1,2.1,0,0,0,17.2,16.4Z" style="fill:#f2f2f2"/><path class="color-badge" d="M32,23.4a4.9,4.9,0,1,1,4.9-4.9A4.9,4.9,0,0,1,32,23.4Zm0-7a2.1,2.1,0,1,0,2.1,2.1A2.1,2.1,0,0,0,32,16.4Z" style="fill:aqua"/><path d="M44,50.5h-.1A5.3,5.3,0,0,1,40,48.9h0a5.6,5.6,0,0,1-1.5-4.1c.2-6.7,9.9-20.2,18.9-28.5S79.8-.3,86.5,0a5.4,5.4,0,0,1,4,1.8c3.2,3.5-.3,9.6-3.6,14.5a104,104,0,0,1-12.8,15C66.3,39.1,51.3,50.5,44,50.5ZM84.1,7.4C79.6,8.7,70.3,14,62.2,21.5A78.4,78.4,0,0,0,50.1,35.7,34.5,34.5,0,0,0,46,43c4.6-1.8,14.5-8.1,23.2-16.7S82.2,11.3,84.1,7.4Z" style="fill:#f2f2f2"/><path class="color-badge" d="M31.4,69.1c-7,0-13.4-3.7-15.3-6.3a3.7,3.7,0,0,1-.7-3.7c1-2.9,4.1-2.7,5.7-2.6a13.1,13.1,0,0,0,2.8.1V56c.1-4.3,2.1-11.6,7.2-14.1s13.1,0,16.5,6,.8,11.2-.4,13.3v.3C43.1,68.3,34.8,69.1,31.4,69.1Zm-2.6-7.2,2.6.2c2.2,0,7.4-.4,9.6-4.1.6-1.2,1.9-4.1.4-6.7s-5.4-4.1-7.1-3.2h0c-1.6.8-3.2,4.6-3.4,7.8a7.9,7.9,0,0,1-.7,4.3l-.3.5Z" style="fill:#ff0"/><rect x="53.5" y="28.5" width="7" height="7.8" transform="translate(-4.8 54.4) rotate(-49.2)" style="fill:#f2f2f2"/></g></g></g></g></svg>
                        </i>
                        <span>{{ trans('messages.templates') }}</span>
                    </a>
                </li> --}}
                <li class="nav-item dropdown">
                    <a href="" title="{{ trans('messages.content') }}"
                        class="leftbar-tooltip nav-link d-flex align-items-center py-3 lvl-1 dropdown-toggle"
                        id="content-menu" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="navbar-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 94.4 85.6"><defs><style>.cls-1{fill:#93c2a0;}.cls-2{fill:#f2f2f2;}</style></defs><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><g id="Layer_2-2" data-name="Layer 2"><g id="Layer_1-2-2" data-name="Layer 1-2"><path class="cls-1" d="M37,58.5H55.1a4.23,4.23,0,0,1,4.2,4.2V78a4.23,4.23,0,0,1-4.2,4.2H37A4.23,4.23,0,0,1,32.8,78V62.7A4.23,4.23,0,0,1,37,58.5Z"/><path class="cls-2" d="M94.4,32.8a17.74,17.74,0,0,0-.9-5.6h0c0-.3,0-.3-.3-.6l-8-19.8A10.37,10.37,0,0,0,75.2,0h-56c-4.7,0-8.3,2.4-9.7,6.5L.9,26.8v.6A19.64,19.64,0,0,0,0,33.3,18,18,0,0,0,5.9,46.9V76.7a9,9,0,0,0,8.9,8.9h64a9,9,0,0,0,8.9-8.9V48.1c4-4.4,6.7-9.7,6.7-15.3ZM78.8,77.9h-64A1.83,1.83,0,0,1,13,76.3V50.5a21.63,21.63,0,0,0,6.2.9,17.57,17.57,0,0,0,14.2-6.8,18.35,18.35,0,0,0,14.2,6.5,17.57,17.57,0,0,0,14.2-6.8,19.6,19.6,0,0,0,14.5,6.8,18.35,18.35,0,0,0,4.7-.6V75.9a2.82,2.82,0,0,1-2.2,2Zm2.6-34.8a10.91,10.91,0,0,1-5.6,1.2,11.62,11.62,0,0,1-10-5.6c-.3-.3-.3-.9-.9-1.5a4.41,4.41,0,0,0-3.2-1.5,3.56,3.56,0,0,0-3.2,1.5,3.77,3.77,0,0,0-.9,1.5,11.84,11.84,0,0,1-16.2,3.9,12.11,12.11,0,0,1-3.9-3.9c-.3-.3-.3-.9-.9-1.2-1.5-1.8-5.3-1.8-6.5,0a2.9,2.9,0,0,0-.9,1.5,11.4,11.4,0,0,1-10,5.6,10.91,10.91,0,0,1-5.6-1.2h0A12,12,0,0,1,7.4,32.8,12.09,12.09,0,0,1,8,29v-.3L16.5,8.6c.3-.6.6-2.1,3.2-2.1H75.8a3.3,3.3,0,0,1,3.5,2.1l8,19.8v.3a25,25,0,0,1,.6,3.8,12.56,12.56,0,0,1-6.5,10.6Z"/><path class="cls-2" d="M67.1,27.3H26.7a4,4,0,0,1,0-8H67.1a4,4,0,0,1,0,8Z"/></g></g></g></g></svg>
                        </i>
                        <span>{{ trans('messages.brand.store') }}</span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="content-menu">
                        <li class="nav-item" rel0="SettingController/shop">
                            <a class="dropdown-item d-flex align-items-center" href="{{ action('Site\SettingController@shop') }}">
                                {{-- <i class="navbar-icon" style="">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 94.4 85.6" style="enable-background:new 0 0 94.4 85.6;" xml:space="preserve"><style type="text/css">.st0{fill:#93C2A0;}.st1{fill:#414042;}.st2{fill:#877083;}</style><g id="Layer_2_1_"><g id="Layer_1-2"><path class="st0" d="M37,58.5h18.1c2.3,0,4.2,1.9,4.2,4.2V78c0,2.3-1.9,4.2-4.2,4.2H37c-2.3,0-4.2-1.9-4.2-4.2V62.7 C32.8,60.4,34.7,58.5,37,58.5z"/><path class="st1" d="M94.4,32.8c0-1.9-0.3-3.8-0.9-5.6l0,0c0-0.3,0-0.3-0.3-0.6l-8-19.8c-1.5-4.2-5.6-6.9-10-6.8H19.2 c-4.7,0-8.3,2.4-9.7,6.5L0.9,26.8v0.6C0.3,29.3,0,31.3,0,33.3c-0.1,5.2,2.1,10.1,5.9,13.6v29.8c0,4.9,4,8.8,8.9,8.9h64 c4.9,0,8.8-4,8.9-8.9V48.1C91.7,43.7,94.4,38.4,94.4,32.8L94.4,32.8z M78.8,77.9h-64c-0.9,0-1.7-0.7-1.8-1.6c0-0.1,0-0.1,0-0.2 V50.5c2,0.6,4.1,0.9,6.2,0.9c5.5,0.1,10.8-2.4,14.2-6.8c3.5,4.2,8.7,6.5,14.2,6.5c5.5,0.1,10.8-2.4,14.2-6.8 c3.6,4.2,8.9,6.7,14.5,6.8c1.6,0,3.2-0.2,4.7-0.6v25.4C80.7,76.9,79.9,77.7,78.8,77.9L78.8,77.9z M81.4,43.1 c-1.7,0.9-3.7,1.3-5.6,1.2c-4.1,0-7.9-2.1-10-5.6c-0.3-0.3-0.3-0.9-0.9-1.5c-0.8-0.9-2-1.5-3.2-1.5c-1.3-0.1-2.5,0.5-3.2,1.5 c-0.4,0.4-0.7,0.9-0.9,1.5c-3.4,5.5-10.7,7.3-16.2,3.9c-1.6-1-2.9-2.3-3.9-3.9c-0.3-0.3-0.3-0.9-0.9-1.2c-1.5-1.8-5.3-1.8-6.5,0 c-0.4,0.4-0.8,0.9-0.9,1.5c-2.1,3.5-5.9,5.7-10,5.6c-1.9,0.1-3.9-0.3-5.6-1.2l0,0c-3.9-2.1-6.2-6.2-6.2-10.6 c0-1.3,0.2-2.6,0.6-3.8v-0.3l8.5-20.1c0.3-0.6,0.6-2.1,3.2-2.1h56.1c1.5-0.2,3,0.7,3.5,2.1l8,19.8v0.3c0.3,1.3,0.5,2.5,0.6,3.8 C87.8,36.9,85.3,40.9,81.4,43.1L81.4,43.1z"/><path class="st2" d="M67.1,27.3H26.7c-2.2,0-4-1.8-4-4s1.8-4,4-4h40.4c2.2,0,4,1.8,4,4S69.3,27.3,67.1,27.3z"/></g></g></svg>
                                </i> --}}
                                <span>{{ trans('messages.brand.shop_info') }}</span>
                            </a>
                        </li>
                        <li class="nav-item" rel0="SettingController/products">
                            <a class="dropdown-item d-flex align-items-center" href="{{ action('Site\SettingController@products') }}">
                                <span>{{ trans('messages.brand.product_settings') }}</span>
                            </a>
                        </li>
                        <li class="nav-item" rel0="SettingController/shipping">
                            <a class="dropdown-item d-flex align-items-center" href="{{ action('Site\SettingController@shipping') }}">
                                <span>{{ trans('messages.brand.shipping') }}</span>
                            </a>
                        </li>
                        <li class="nav-item" rel0="SettingController/payments">
                            <a class="dropdown-item d-flex align-items-center" href="{{ action('Site\SettingController@payments') }}">
                                <span>{{ trans('messages.brand.payments') }}</span>
                            </a>
                        </li>
                        <li class="nav-item" rel0="SettingController/account">
                            <a class="dropdown-item d-flex align-items-center" href="{{ action('Site\SettingController@account') }}">
                                <span>{{ trans('messages.brand.account_privacy') }}</span>
                            </a>
                        </li>
                        <li class="nav-item" rel0="SettingController/emails">
                            <a class="dropdown-item d-flex align-items-center" href="{{ action('Site\SettingController@emails') }}">
                                <span>{{ trans('messages.brand.emails') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a href="" title="{{ trans('messages.content') }}"
                        class="leftbar-tooltip nav-link d-flex align-items-center py-3 lvl-1 dropdown-toggle"
                        id="content-menu" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="navbar-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 92.2 91.4"><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><g id="Layer_2-2" data-name="Layer 2"><g id="Layer_1-2-2" data-name="Layer 1-2"><path d="M88,36.7H80.9a5.5,5.5,0,0,1-5.3-5.5A5.4,5.4,0,0,1,77,27.6h.1l.9-.9.3-.2h-.1l3.9-3.9c1.1-1,.9-2.8-.5-4.2l-8-7.9c-1.4-1.4-3.2-1.6-4.3-.6l-3.9,3.9h0l-.5.5-.6.7h0a5.5,5.5,0,0,1-3.7,1.4,5.4,5.4,0,0,1-5.5-5.2h0V9.6h0V4.1c0-1.5-1.4-2.6-3.4-2.6H40.4C38.5,1.5,37,2.6,37,4.1V9.6h0v1.6h.1a6,6,0,0,1-1.6,3.6,5.8,5.8,0,0,1-7.7.2h.1l-1-.9-.2-.3h0L22.8,10,22,9.3h-.9a3.3,3.3,0,0,0-2.5,1.2l-8,7.9C9.2,19.8,9,21.6,10,22.6l3.9,3.9h0l.6.4.6.7h0a5.6,5.6,0,0,1,1.5,3.7,5.4,5.4,0,0,1-5.3,5.5H4.1c-1.5,0-2.6,1.4-2.6,3.3V51.3c0,2,1.1,3.4,2.6,3.4h7.2a6.2,6.2,0,0,1,3.6,1.6,5.7,5.7,0,0,1,.2,7.6h0l-.9.9-.3.2h0L10,68.8l-.7.8v.9A3.4,3.4,0,0,0,10.6,73l7.9,8a4.2,4.2,0,0,0,2.6,1.2,2.8,2.8,0,0,0,1.7-.7l3.9-3.9h.1c.1-.3.3-.4.4-.6l.7-.6h-.1A5.5,5.5,0,0,1,31.5,75a5.7,5.7,0,0,1,5.6,5.2H37v1.7h0v5.4c0,1.5,1.5,2.6,3.4,2.6H51.7c2,0,3.4-1.1,3.4-2.6V81.9h.1a1.7,1.7,0,0,1-.1-.7v-.9h0a4.8,4.8,0,0,1,1.6-3.6,5.9,5.9,0,0,1,7.6-.2h0l.9.8.2.3h.1l3.9,3.9a2.3,2.3,0,0,0,1.6.6,3.7,3.7,0,0,0,2.6-1.2l8-7.9a3.7,3.7,0,0,0,1.2-2.6v-1l-4.5-4.5h.1l-.6-.5-.6-.6H77a5.5,5.5,0,0,1,.4-7.8,5,5,0,0,1,3.5-1.4H88c1.6,0,2.7-1.4,2.7-3.4V40.1C90.6,38.2,89.5,36.7,88,36.7ZM86.7,50.8H83.1a6.2,6.2,0,0,0-1.9-.2,9.6,9.6,0,0,0-9.7,9.3,9.7,9.7,0,0,0,4.4,8.2h0l2.5,2.4-7.2,7.2-2.4-2.3v-.3l-1.2-1.4a9.8,9.8,0,0,0-13.7,0,9.2,9.2,0,0,0-2.6,8.6h0V86H41V82.5a12.3,12.3,0,0,0,.2-1.9,9.6,9.6,0,0,0-9.9-9.5,9.5,9.5,0,0,0-7.8,4.2h0L21,77.8l-7.3-7.2,2.4-2.3.2-.2a5.7,5.7,0,0,0,1.5-1.2A9.4,9.4,0,0,0,18,53.6l-.2-.2A9.5,9.5,0,0,0,9,50.8H5.4V40.6H9l1.9.2a9.6,9.6,0,0,0,5.4-17.6h-.1l-2.5-2.5L21,13.6,23.3,16l.2.2a5.7,5.7,0,0,0,1.2,1.5A9.7,9.7,0,0,0,41,9h0V5.4H51.2V9a6.2,6.2,0,0,0-.2,1.9,9.6,9.6,0,0,0,9.9,9.5,9.5,9.5,0,0,0,7.8-4.2h0l2.5-2.5,7.2,7.2-2.3,2.3-.2.2a4.4,4.4,0,0,0-1.5,1.2A9.6,9.6,0,0,0,81.2,41l1.9-.2h3.6Z" style="fill:#f2f2f2"/><path d="M51.7,91.4H40.4c-2.8,0-4.9-1.8-4.9-4.1V79.6a4.1,4.1,0,0,0-4-3.1,4.6,4.6,0,0,0-2,.5l-1.2,1c0,.1-.1.1-.1.2l-.3.9h-.6l-3.4,3.5a4.3,4.3,0,0,1-2.8,1.1h-.2a5.4,5.4,0,0,1-3.4-1.6l-7.9-8a5.2,5.2,0,0,1-1.8-3.5h0V69L9,67.7l5-4.9a4,4,0,0,0-.2-5.5,4.4,4.4,0,0,0-2.6-1.1H4.1C1.7,56.2,0,54.1,0,51.3V40.1c0-2.7,1.8-4.8,4.1-4.8h7.2a4,4,0,0,0,3.8-4A4,4,0,0,0,14,28.6l-.5-.6-.7-.4L8.9,23.7c-1.6-1.7-1.3-4.4.6-6.4l8-7.8A5.3,5.3,0,0,1,21,7.8h1.6l1.2,1.1,5.5,5.3a4.4,4.4,0,0,0,5.2-.5,4.4,4.4,0,0,0,1-1.9V4.1c0-2.3,2.1-4.1,4.9-4.1H51.7c2.8,0,4.9,1.7,4.9,4.1v7.1a4,4,0,0,0,4,3.7,3.5,3.5,0,0,0,2.6-1l.6-.7,4.4-4.4c1.8-1.6,4.5-1.3,6.5.6l8,7.9a5.9,5.9,0,0,1,1.6,3.8,3.4,3.4,0,0,1-1.2,2.6L81.8,25h1.3L79,27.9l-1.2,1.2a3.1,3.1,0,0,0-.7,2.1,3.9,3.9,0,0,0,3.9,4h7c2.3,0,4,2,4.2,4.8V51.2c0,2.8-1.8,4.9-4.2,4.9H80.9a3.9,3.9,0,0,0-2.5,1,4.1,4.1,0,0,0-.7,5.2h.1l1,1,3.7,3.1h-.6l2.4,2.4v1.6a5.2,5.2,0,0,1-1.7,3.7L74.7,82a5.4,5.4,0,0,1-3.6,1.6,3.6,3.6,0,0,1-2.7-1l-3.5-3.5h-.2l-.6-.8-.8-.7a4.4,4.4,0,0,0-5.6.2,3.6,3.6,0,0,0-1.1,2.5v1h0l.8,2.1h-.8v3.9C56.6,89.7,54.5,91.4,51.7,91.4ZM38.5,81.7v5.6c0,.6.9,1.1,1.9,1.1H51.7c.9,0,1.9-.4,1.9-1.1v-7a6.8,6.8,0,0,1,2.1-4.7,7.4,7.4,0,0,1,9.6-.3l1.3,1.2,3.9,3.9.5.2a2.3,2.3,0,0,0,1.5-.7l8-8a2.1,2.1,0,0,0,.8-1.6V70l-4.7-4.7h-.3l-.4-.5-.7-.9-.5-.5h.2a6.9,6.9,0,0,1,1.5-8.5,7.2,7.2,0,0,1,4.5-1.8H88c.9,0,1.2-1,1.2-1.9V40.1c-.1-1-.6-1.9-1.2-1.9H80.9a7.2,7.2,0,0,1-4.7-2,7.3,7.3,0,0,1-2.1-5,7.2,7.2,0,0,1,.8-3.2h-.2l.6-.6.6-.8.4-.5h.2L81,21.5a.5.5,0,0,0,.3-.5,2.2,2.2,0,0,0-.8-1.5l-8-7.9c-.7-.8-1.7-1.1-2.2-.6L66,15.3l-.7.8a6.7,6.7,0,0,1-4.7,1.8h-.1a6.9,6.9,0,0,1-6.9-6.6V4.1c0-.7-1-1.1-1.9-1.1H40.4c-1,0-1.9.5-1.9,1.1V9.7h.2v1.6a6.9,6.9,0,0,1-2,4.5,7.3,7.3,0,0,1-9.8.3l-3.1-2.6h.5l-2.8-2.7h-.3a2.1,2.1,0,0,0-1.4.7h0l-8,7.9a1.9,1.9,0,0,0-.8,1.3.8.8,0,0,0,.2.7l3.8,3.8.6.5.7.8a6.8,6.8,0,0,1,1.9,4.7,7,7,0,0,1-6.7,7H4.1c-.6,0-1.1.8-1.1,1.8V51.3c0,.9.4,1.9,1.1,1.9h7.3a8.1,8.1,0,0,1,4.5,2,7.1,7.1,0,0,1,.3,9.7l-1.4,1.3-4,4v.2a1.8,1.8,0,0,0,.8,1.4h.1l7.9,8a2.8,2.8,0,0,0,1.5.8.9.9,0,0,0,.7-.3l2.5-2.5h-.4l2.9-2.6a6.9,6.9,0,0,1,4.7-1.8h0a7.2,7.2,0,0,1,7.1,6.6v1.6Zm14.3,5.8H39.5V82.2a8.8,8.8,0,0,0,.2-1.7,7.7,7.7,0,0,0-2.5-5.6,8.6,8.6,0,0,0-5.9-2.3,8.3,8.3,0,0,0-6.6,3.5v.3L21,79.9l-9.5-9.3,4-3.8a3.8,3.8,0,0,0,1.2-.9,8.1,8.1,0,0,0,2.5-5.6,7.9,7.9,0,0,0-2.3-5.6v-.2a8.1,8.1,0,0,0-7.5-2.2H3.9V39.1H9.2l1.8.2h0a8,8,0,0,0,8.1-8,8.1,8.1,0,0,0-3.3-6.6h-.1l-.6-.4-3.5-3.6L21,11.5l3.8,3.9a3.8,3.8,0,0,0,.9,1.2,8.3,8.3,0,0,0,11.5,0,7.9,7.9,0,0,0,2.3-7.3V3.9H52.7V9.4a6.6,6.6,0,0,0-.1,1.4A7.8,7.8,0,0,0,55,16.6a8.1,8.1,0,0,0,5.7,2.3h.2a8.3,8.3,0,0,0,6.6-3.5v-.3l3.6-3.5,9.3,9.3-3.7,3.7h-.2a2.7,2.7,0,0,0-1,.8v.2a7.6,7.6,0,0,0-2.4,5.7,8.1,8.1,0,0,0,2.3,5.7,8.2,8.2,0,0,0,5.7,2.4l2-.2h5.1v13h-7A8,8,0,0,0,73,59.9a8.2,8.2,0,0,0,3.7,6.9l.2.2,3.6,3.5-9.3,9.3L67.3,76v-.3l-.8-1a8.4,8.4,0,0,0-11.6.1A7.6,7.6,0,0,0,52.8,82v5.5Zm-10.3-3h7.3v-2a10.7,10.7,0,0,1,3.1-9.9,11.4,11.4,0,0,1,15.7,0h.1l1.6,1.8v.3l.9.8,5.1-5.1L75,69.3a11.2,11.2,0,0,1-5-9.4A11,11,0,0,1,81,49.1h.2a7.5,7.5,0,0,1,2.1.2h1.9v-7h-2l-2,.2h0a11.1,11.1,0,0,1-7.9-3.3,11,11,0,0,1-3.2-7.8,10.8,10.8,0,0,1,3.2-7.8A4.6,4.6,0,0,1,75,22.2l1.3-1.3-5.1-5.1-1.3,1.4a11.4,11.4,0,0,1-9,4.7,10.9,10.9,0,0,1-8-3.1,11.7,11.7,0,0,1-3.4-7.9,7.5,7.5,0,0,1,.2-2.1V6.9H42.5v2a11.3,11.3,0,0,1-3.1,9.9,11.5,11.5,0,0,1-15.8,0,10.9,10.9,0,0,1-1.3-1.7L21,15.7l-5.2,5L17.1,22a10.8,10.8,0,0,1,5,9.3,11.1,11.1,0,0,1-11.2,11h-.2l-1.8-.2h-2v7.2H8.8a11.4,11.4,0,0,1,10.1,3c0,.1.1.2.2.3a11.1,11.1,0,0,1,3.1,7.7A11.2,11.2,0,0,1,18.8,68a7,7,0,0,1-1.6,1.3l-1.3,1.3L21,75.7l1.3-1.4a11.4,11.4,0,0,1,9-4.7,11.1,11.1,0,0,1,8,3.1,11.7,11.7,0,0,1,3.4,7.9,12.3,12.3,0,0,1-.2,2Z" style="fill:#f2f2f2"/><path d="M46.1,59.8A14.1,14.1,0,1,1,60.2,45.7,14.1,14.1,0,0,1,46.1,59.8Zm0-21.2a7.1,7.1,0,1,0,7.1,7.1A7.1,7.1,0,0,0,46.1,38.6Z" style="fill:lime"/></g></g></g></g></svg>
                        </i>
                        <span>{{ trans('messages.settings') }}</span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="content-menu">
                        <li class="nav-item" rel0="SettingController/site">
                            <a class="dropdown-item d-flex align-items-center" href="{{ action('Site\SettingController@site') }}">
                                {{-- <i class="navbar-icon" style="">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 94.4 85.6" style="enable-background:new 0 0 94.4 85.6;" xml:space="preserve"><style type="text/css">.st0{fill:#93C2A0;}.st1{fill:#414042;}.st2{fill:#877083;}</style><g id="Layer_2_1_"><g id="Layer_1-2"><path class="st0" d="M37,58.5h18.1c2.3,0,4.2,1.9,4.2,4.2V78c0,2.3-1.9,4.2-4.2,4.2H37c-2.3,0-4.2-1.9-4.2-4.2V62.7 C32.8,60.4,34.7,58.5,37,58.5z"/><path class="st1" d="M94.4,32.8c0-1.9-0.3-3.8-0.9-5.6l0,0c0-0.3,0-0.3-0.3-0.6l-8-19.8c-1.5-4.2-5.6-6.9-10-6.8H19.2 c-4.7,0-8.3,2.4-9.7,6.5L0.9,26.8v0.6C0.3,29.3,0,31.3,0,33.3c-0.1,5.2,2.1,10.1,5.9,13.6v29.8c0,4.9,4,8.8,8.9,8.9h64 c4.9,0,8.8-4,8.9-8.9V48.1C91.7,43.7,94.4,38.4,94.4,32.8L94.4,32.8z M78.8,77.9h-64c-0.9,0-1.7-0.7-1.8-1.6c0-0.1,0-0.1,0-0.2 V50.5c2,0.6,4.1,0.9,6.2,0.9c5.5,0.1,10.8-2.4,14.2-6.8c3.5,4.2,8.7,6.5,14.2,6.5c5.5,0.1,10.8-2.4,14.2-6.8 c3.6,4.2,8.9,6.7,14.5,6.8c1.6,0,3.2-0.2,4.7-0.6v25.4C80.7,76.9,79.9,77.7,78.8,77.9L78.8,77.9z M81.4,43.1 c-1.7,0.9-3.7,1.3-5.6,1.2c-4.1,0-7.9-2.1-10-5.6c-0.3-0.3-0.3-0.9-0.9-1.5c-0.8-0.9-2-1.5-3.2-1.5c-1.3-0.1-2.5,0.5-3.2,1.5 c-0.4,0.4-0.7,0.9-0.9,1.5c-3.4,5.5-10.7,7.3-16.2,3.9c-1.6-1-2.9-2.3-3.9-3.9c-0.3-0.3-0.3-0.9-0.9-1.2c-1.5-1.8-5.3-1.8-6.5,0 c-0.4,0.4-0.8,0.9-0.9,1.5c-2.1,3.5-5.9,5.7-10,5.6c-1.9,0.1-3.9-0.3-5.6-1.2l0,0c-3.9-2.1-6.2-6.2-6.2-10.6 c0-1.3,0.2-2.6,0.6-3.8v-0.3l8.5-20.1c0.3-0.6,0.6-2.1,3.2-2.1h56.1c1.5-0.2,3,0.7,3.5,2.1l8,19.8v0.3c0.3,1.3,0.5,2.5,0.6,3.8 C87.8,36.9,85.3,40.9,81.4,43.1L81.4,43.1z"/><path class="st2" d="M67.1,27.3H26.7c-2.2,0-4-1.8-4-4s1.8-4,4-4h40.4c2.2,0,4,1.8,4,4S69.3,27.3,67.1,27.3z"/></g></g></svg>
                                </i> --}}
                                <span>{{ trans('messages.brand.site_information') }}</span>
                            </a>
                        </li>
                        <li class="nav-item" rel0="SettingController/homePage">
                            @php
                                $pageID = get_option('page_on_front');
                            @endphp
                            @if ($pageID)
                                <a class="dropdown-item d-flex align-items-center" href="{{ action('Site\SettingController@homePage') }}">
                                    {{-- <i class="navbar-icon" style="">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 94.4 85.6" style="enable-background:new 0 0 94.4 85.6;" xml:space="preserve"><style type="text/css">.st0{fill:#93C2A0;}.st1{fill:#414042;}.st2{fill:#877083;}</style><g id="Layer_2_1_"><g id="Layer_1-2"><path class="st0" d="M37,58.5h18.1c2.3,0,4.2,1.9,4.2,4.2V78c0,2.3-1.9,4.2-4.2,4.2H37c-2.3,0-4.2-1.9-4.2-4.2V62.7 C32.8,60.4,34.7,58.5,37,58.5z"/><path class="st1" d="M94.4,32.8c0-1.9-0.3-3.8-0.9-5.6l0,0c0-0.3,0-0.3-0.3-0.6l-8-19.8c-1.5-4.2-5.6-6.9-10-6.8H19.2 c-4.7,0-8.3,2.4-9.7,6.5L0.9,26.8v0.6C0.3,29.3,0,31.3,0,33.3c-0.1,5.2,2.1,10.1,5.9,13.6v29.8c0,4.9,4,8.8,8.9,8.9h64 c4.9,0,8.8-4,8.9-8.9V48.1C91.7,43.7,94.4,38.4,94.4,32.8L94.4,32.8z M78.8,77.9h-64c-0.9,0-1.7-0.7-1.8-1.6c0-0.1,0-0.1,0-0.2 V50.5c2,0.6,4.1,0.9,6.2,0.9c5.5,0.1,10.8-2.4,14.2-6.8c3.5,4.2,8.7,6.5,14.2,6.5c5.5,0.1,10.8-2.4,14.2-6.8 c3.6,4.2,8.9,6.7,14.5,6.8c1.6,0,3.2-0.2,4.7-0.6v25.4C80.7,76.9,79.9,77.7,78.8,77.9L78.8,77.9z M81.4,43.1 c-1.7,0.9-3.7,1.3-5.6,1.2c-4.1,0-7.9-2.1-10-5.6c-0.3-0.3-0.3-0.9-0.9-1.5c-0.8-0.9-2-1.5-3.2-1.5c-1.3-0.1-2.5,0.5-3.2,1.5 c-0.4,0.4-0.7,0.9-0.9,1.5c-3.4,5.5-10.7,7.3-16.2,3.9c-1.6-1-2.9-2.3-3.9-3.9c-0.3-0.3-0.3-0.9-0.9-1.2c-1.5-1.8-5.3-1.8-6.5,0 c-0.4,0.4-0.8,0.9-0.9,1.5c-2.1,3.5-5.9,5.7-10,5.6c-1.9,0.1-3.9-0.3-5.6-1.2l0,0c-3.9-2.1-6.2-6.2-6.2-10.6 c0-1.3,0.2-2.6,0.6-3.8v-0.3l8.5-20.1c0.3-0.6,0.6-2.1,3.2-2.1h56.1c1.5-0.2,3,0.7,3.5,2.1l8,19.8v0.3c0.3,1.3,0.5,2.5,0.6,3.8 C87.8,36.9,85.3,40.9,81.4,43.1L81.4,43.1z"/><path class="st2" d="M67.1,27.3H26.7c-2.2,0-4-1.8-4-4s1.8-4,4-4h40.4c2.2,0,4,1.8,4,4S69.3,27.3,67.1,27.3z"/></g></g></svg>
                                    </i> --}}
                                    <span>{{ trans('messages.brand.home_page') }}</span>
                                </a>
                            @endif
                        </li>
                        @if (is_plugin_active( 'slider-revolution/revslider.php' ))
                            <li class="nav-item" rel0="SettingController/sliderRevolution">
                                <a class="dropdown-item d-flex align-items-center" href="{{ action('Site\SettingController@sliderRevolution') }}">
                                    {{-- <i class="navbar-icon" style="">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 94.4 85.6" style="enable-background:new 0 0 94.4 85.6;" xml:space="preserve"><style type="text/css">.st0{fill:#93C2A0;}.st1{fill:#414042;}.st2{fill:#877083;}</style><g id="Layer_2_1_"><g id="Layer_1-2"><path class="st0" d="M37,58.5h18.1c2.3,0,4.2,1.9,4.2,4.2V78c0,2.3-1.9,4.2-4.2,4.2H37c-2.3,0-4.2-1.9-4.2-4.2V62.7 C32.8,60.4,34.7,58.5,37,58.5z"/><path class="st1" d="M94.4,32.8c0-1.9-0.3-3.8-0.9-5.6l0,0c0-0.3,0-0.3-0.3-0.6l-8-19.8c-1.5-4.2-5.6-6.9-10-6.8H19.2 c-4.7,0-8.3,2.4-9.7,6.5L0.9,26.8v0.6C0.3,29.3,0,31.3,0,33.3c-0.1,5.2,2.1,10.1,5.9,13.6v29.8c0,4.9,4,8.8,8.9,8.9h64 c4.9,0,8.8-4,8.9-8.9V48.1C91.7,43.7,94.4,38.4,94.4,32.8L94.4,32.8z M78.8,77.9h-64c-0.9,0-1.7-0.7-1.8-1.6c0-0.1,0-0.1,0-0.2 V50.5c2,0.6,4.1,0.9,6.2,0.9c5.5,0.1,10.8-2.4,14.2-6.8c3.5,4.2,8.7,6.5,14.2,6.5c5.5,0.1,10.8-2.4,14.2-6.8 c3.6,4.2,8.9,6.7,14.5,6.8c1.6,0,3.2-0.2,4.7-0.6v25.4C80.7,76.9,79.9,77.7,78.8,77.9L78.8,77.9z M81.4,43.1 c-1.7,0.9-3.7,1.3-5.6,1.2c-4.1,0-7.9-2.1-10-5.6c-0.3-0.3-0.3-0.9-0.9-1.5c-0.8-0.9-2-1.5-3.2-1.5c-1.3-0.1-2.5,0.5-3.2,1.5 c-0.4,0.4-0.7,0.9-0.9,1.5c-3.4,5.5-10.7,7.3-16.2,3.9c-1.6-1-2.9-2.3-3.9-3.9c-0.3-0.3-0.3-0.9-0.9-1.2c-1.5-1.8-5.3-1.8-6.5,0 c-0.4,0.4-0.8,0.9-0.9,1.5c-2.1,3.5-5.9,5.7-10,5.6c-1.9,0.1-3.9-0.3-5.6-1.2l0,0c-3.9-2.1-6.2-6.2-6.2-10.6 c0-1.3,0.2-2.6,0.6-3.8v-0.3l8.5-20.1c0.3-0.6,0.6-2.1,3.2-2.1h56.1c1.5-0.2,3,0.7,3.5,2.1l8,19.8v0.3c0.3,1.3,0.5,2.5,0.6,3.8 C87.8,36.9,85.3,40.9,81.4,43.1L81.4,43.1z"/><path class="st2" d="M67.1,27.3H26.7c-2.2,0-4-1.8-4-4s1.8-4,4-4h40.4c2.2,0,4,1.8,4,4S69.3,27.3,67.1,27.3z"/></g></g></svg>
                                    </i> --}}
                                    <span>{{ trans('messages.brand.sliders') }}</span>
                                </a>
                            </li>
                        @endif
                        <li class="nav-item" rel0="SourceController">
                            <a class="dropdown-item d-flex align-items-center" href="{{ action('Site\SourceController@index') }}">
                                {{-- <i class="navbar-icon" style="">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 94.4 85.6" style="enable-background:new 0 0 94.4 85.6;" xml:space="preserve"><style type="text/css">.st0{fill:#93C2A0;}.st1{fill:#414042;}.st2{fill:#877083;}</style><g id="Layer_2_1_"><g id="Layer_1-2"><path class="st0" d="M37,58.5h18.1c2.3,0,4.2,1.9,4.2,4.2V78c0,2.3-1.9,4.2-4.2,4.2H37c-2.3,0-4.2-1.9-4.2-4.2V62.7 C32.8,60.4,34.7,58.5,37,58.5z"/><path class="st1" d="M94.4,32.8c0-1.9-0.3-3.8-0.9-5.6l0,0c0-0.3,0-0.3-0.3-0.6l-8-19.8c-1.5-4.2-5.6-6.9-10-6.8H19.2 c-4.7,0-8.3,2.4-9.7,6.5L0.9,26.8v0.6C0.3,29.3,0,31.3,0,33.3c-0.1,5.2,2.1,10.1,5.9,13.6v29.8c0,4.9,4,8.8,8.9,8.9h64 c4.9,0,8.8-4,8.9-8.9V48.1C91.7,43.7,94.4,38.4,94.4,32.8L94.4,32.8z M78.8,77.9h-64c-0.9,0-1.7-0.7-1.8-1.6c0-0.1,0-0.1,0-0.2 V50.5c2,0.6,4.1,0.9,6.2,0.9c5.5,0.1,10.8-2.4,14.2-6.8c3.5,4.2,8.7,6.5,14.2,6.5c5.5,0.1,10.8-2.4,14.2-6.8 c3.6,4.2,8.9,6.7,14.5,6.8c1.6,0,3.2-0.2,4.7-0.6v25.4C80.7,76.9,79.9,77.7,78.8,77.9L78.8,77.9z M81.4,43.1 c-1.7,0.9-3.7,1.3-5.6,1.2c-4.1,0-7.9-2.1-10-5.6c-0.3-0.3-0.3-0.9-0.9-1.5c-0.8-0.9-2-1.5-3.2-1.5c-1.3-0.1-2.5,0.5-3.2,1.5 c-0.4,0.4-0.7,0.9-0.9,1.5c-3.4,5.5-10.7,7.3-16.2,3.9c-1.6-1-2.9-2.3-3.9-3.9c-0.3-0.3-0.3-0.9-0.9-1.2c-1.5-1.8-5.3-1.8-6.5,0 c-0.4,0.4-0.8,0.9-0.9,1.5c-2.1,3.5-5.9,5.7-10,5.6c-1.9,0.1-3.9-0.3-5.6-1.2l0,0c-3.9-2.1-6.2-6.2-6.2-10.6 c0-1.3,0.2-2.6,0.6-3.8v-0.3l8.5-20.1c0.3-0.6,0.6-2.1,3.2-2.1h56.1c1.5-0.2,3,0.7,3.5,2.1l8,19.8v0.3c0.3,1.3,0.5,2.5,0.6,3.8 C87.8,36.9,85.3,40.9,81.4,43.1L81.4,43.1z"/><path class="st2" d="M67.1,27.3H26.7c-2.2,0-4-1.8-4-4s1.8-4,4-4h40.4c2.2,0,4,1.8,4,4S69.3,27.3,67.1,27.3z"/></g></g></svg>
                                </i> --}}
                                <span>{{ trans('messages.stores_connections') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="navbar-right">
                <ul class="navbar-nav me-auto mb-md-0">
                    @include('layouts.core._top_activity_log')

                    @include('layouts.core._menu_frontend_user')
                </ul>
            </div>
        </div>
    </div>
</nav>

<script>
    var MenuFrontend = {
        saveLeftbarState: function(state) {
            var url = '{{ action('AccountController@leftbarState') }}';

            $.ajax({
                method: "GET",
                url: url,
                data: {
                    _token: CSRF_TOKEN,
                    state: state,
                }
            });
        }
    };

    $(function() {
        //
        $('.leftbar .leftbar-hide-menu').on('click', function(e) {
            if (!$('.leftbar').hasClass('leftbar-closed')) {
                $('.leftbar').addClass('leftbar-closed');

                $('.leftbar').removeClass('state-open');
                $('.leftbar').addClass('state-closed');

                // close menu
                $('#mainAppNav .lvl-1.show').dropdown('hide');

                MenuFrontend.saveLeftbarState('closed');
            } else {
                $('.leftbar').removeClass('leftbar-closed');

                $('.leftbar').removeClass('state-closed');
                $('.leftbar').addClass('state-open');

                // open menu
                if ($('#mainAppNav .nav-item.active .lvl-1').closest('.dropdown').length) {
                    $('#mainAppNav .nav-item.active .lvl-1').dropdown('show');
                }

                MenuFrontend.saveLeftbarState('open');
            }
        });
    });
</script>
