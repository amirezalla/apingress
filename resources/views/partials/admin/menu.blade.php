{{--@php--}}
{{--    use App\Models\Utility;--}}
{{--      //  $logo=asset(Storage::url('uploads/logo/'));--}}
{{--        $logo=\App\Models\Utility::get_file('uploads/logo/');--}}
{{--        $company_logo=Utility::getValByName('company_logo_dark');--}}
{{--        $company_logos=Utility::getValByName('company_logo_light');--}}
{{--        $company_small_logo=Utility::getValByName('company_small_logo');--}}
{{--        $setting = \App\Models\Utility::colorset();--}}
{{--        $mode_setting = \App\Models\Utility::mode_layout();--}}
{{--        $emailTemplate     = \App\Models\EmailTemplate::first();--}}
{{--        $lang= Auth::user()->lang;--}}


{{--@endphp--}}

@if (isset($setting['cust_theme_bg']) && $setting['cust_theme_bg'] == 'on')
    <nav class="dash-sidebar light-sidebar transprent-bg">
@else
    <nav class="dash-sidebar light-sidebar">
@endif
    <div class="navbar-wrapper">
        <div class="m-header main-logo">
            <a href="#" class="b-brand">
{{--                <img src="{{ asset(Storage::url('uploads/logo/'.$logo)) }}" alt="{{ env('APP_NAME') }}" class="logo logo-lg" />--}}
                <img src="{{ asset('assets/images/adminingress.png') }}" alt="logo" width="40%"/>
{{--                @if($mode_setting['cust_darklayout'] && $mode_setting['cust_darklayout'] == 'on' )--}}
{{--                    <img src="{{ $logo . '/' . (isset($company_logos) && !empty($company_logos) ? $company_logos : 'logo-dark.png') }}"--}}
{{--                         alt="{{ config('app.name', 'ERPGo-SaaS') }}" class="logo logo-lg">--}}
{{--                @else--}}
{{--                    <img src="{{ $logo . '/' . (isset($company_logo) && !empty($company_logo) ? $company_logo : 'logo-dark.png') }}"--}}
{{--                         alt="{{ config('app.name', 'ERPGo-SaaS') }}" class="logo logo-lg">--}}
{{--                @endif--}}

            </a>
        </div>
        <div class="navbar-content">

            @if((Auth::user()->type == 'super admin'))
                <ul class="dash-navbar">

                    <li class="dash-item dash-hasmenu {{ (Request::segment(1) == 'dashboard') ? ' active' : '' }}">
                        {{--                            <a href="{{ route('client.dashboard.view') }}" class="dash-link">--}}
                        <a href="" class="dash-link">
                            <span class="dash-micon"><i class="ti ti-dashboard"></i></span><span class="dash-mtext">{{__('Dashboard')}}</span>
                        </a>
                    </li>

                    <li class="dash-item dash-hasmenu
                                             ">
                        <a href="#!" class="dash-link"><span class="dash-micon"><i class="ti ti-home"></i></span><span class="dash-mtext">{{__('Manage immobiliare')}}</span><span class="dash-arrow"><i data-feather="chevron-right"></i></span></a>
                        <ul class="dash-submenu">

                                <li class="dash-item  {{Request::segment(1) == 'project' || Request::route()->getName() == 'projects.list' || Request::route()->getName() == 'projects.list' ||Request::route()->getName() == 'projects.index' || Request::route()->getName() == 'projects.show' || request()->is('projects/*') ? 'active' : ''}}">
                                    <a class="dash-link" href="{{ route('order.index') }}">{{__('Listed')}}</a>
                                </li>


                                <li class="dash-item {{ (request()->is('taskboard*') ? 'active' : '')}}">
{{--                                    <a class="dash-link" href="{{ route('taskBoard.view', 'list') }}">{{__('Tasks')}}</a>--}}
                                    <a class="dash-link" href="">{{__('Add')}}</a>
                                </li>



                        </ul>
                    </li>
                    <li class="dash-item dash-hasmenu
                                             ">
                        <a href="#!" class="dash-link"><span class="dash-micon"><i class="ti ti-paint"></i></span><span class="dash-mtext">{{__('Manage Collection')}}</span><span class="dash-arrow"><i data-feather="chevron-right"></i></span></a>
                        <ul class="dash-submenu">

                                <li class="dash-item  {{Request::segment(1) == 'project' || Request::route()->getName() == 'projects.list' || Request::route()->getName() == 'projects.list' ||Request::route()->getName() == 'projects.index' || Request::route()->getName() == 'projects.show' || request()->is('projects/*') ? 'active' : ''}}">
                                    <a class="dash-link" href="{{ route('order.index') }}">{{__('Listed')}}</a>
                                </li>


                                <li class="dash-item {{ (request()->is('taskboard*') ? 'active' : '')}}">
{{--                                    <a class="dash-link" href="{{ route('taskBoard.view', 'list') }}">{{__('Tasks')}}</a>--}}
                                    <a class="dash-link" href="">{{__('Add')}}</a>
                                </li>



                        </ul>
                    </li>
                    <li class="dash-item dash-hasmenu
                                             ">
                        <a href="#!" class="dash-link"><span class="dash-micon"><i class="ti ti-shopping-cart-plus"></i></span><span class="dash-mtext">{{__('Manage Order')}}</span><span class="dash-arrow"><i data-feather="chevron-right"></i></span></a>
                        <ul class="dash-submenu">

                                <li class="dash-item  {{Request::segment(1) == 'project' || Request::route()->getName() == 'projects.list' || Request::route()->getName() == 'projects.list' ||Request::route()->getName() == 'projects.index' || Request::route()->getName() == 'projects.show' || request()->is('projects/*') ? 'active' : ''}}">
                                    <a class="dash-link" href="{{ route('order.index') }}">{{__('Listed')}}</a>
                                </li>


                                <li class="dash-item {{ (request()->is('taskboard*') ? 'active' : '')}}">
{{--                                    <a class="dash-link" href="{{ route('taskBoard.view', 'list') }}">{{__('Tasks')}}</a>--}}
                                    <a class="dash-link" href="">{{__('Add')}}</a>
                                </li>



                        </ul>
                    </li>
                    <li class="dash-item dash-hasmenu
                                             ">
                        <a href="#!" class="dash-link"><span class="dash-micon"><i class="ti ti-users"></i></span><span class="dash-mtext">{{__('Manage User')}}</span><span class="dash-arrow"><i data-feather="chevron-right"></i></span></a>
                        <ul class="dash-submenu">

                                <li class="dash-item  {{Request::segment(1) == 'project' || Request::route()->getName() == 'projects.list' || Request::route()->getName() == 'projects.list' ||Request::route()->getName() == 'projects.index' || Request::route()->getName() == 'projects.show' || request()->is('projects/*') ? 'active' : ''}}">
                                    <a class="dash-link" href="{{ route('users.index') }}">{{__('Listed')}}</a>
                                </li>


                                <li class="dash-item {{ (request()->is('taskboard*') ? 'active' : '')}}">
{{--                                    <a class="dash-link" href="{{ route('taskBoard.view', 'list') }}">{{__('Tasks')}}</a>--}}
                                    <a class="dash-link" href="">{{__('Add')}}</a>
                                </li>



                        </ul>
                    </li>
                    <li class="dash-item dash-hasmenu
                                             ">
                        <a href="#!" class="dash-link"><span class="dash-micon"><i class="ti ti-share"></i></span><span class="dash-mtext">{{__('Manage category')}}</span><span class="dash-arrow"><i data-feather="chevron-right"></i></span></a>
                        <ul class="dash-submenu">

                                <li class="dash-item  {{Request::segment(1) == 'project' || Request::route()->getName() == 'projects.list' || Request::route()->getName() == 'projects.list' ||Request::route()->getName() == 'projects.index' || Request::route()->getName() == 'projects.show' || request()->is('projects/*') ? 'active' : ''}}">
                                    <a class="dash-link" href="{{ route('category.index') }}">{{__('Listed')}}</a>
                                </li>


                                <li class="dash-item {{ (request()->is('taskboard*') ? 'active' : '')}}">
{{--                                    <a class="dash-link" href="{{ route('taskBoard.view', 'list') }}">{{__('Tasks')}}</a>--}}
                                    <a class="dash-link" href="{{ route('category.create') }}">{{__('Add')}}</a>
                                </li>



                        </ul>
                    </li>
                    <li class="dash-item dash-hasmenu
                                             ">
                        <a href="#!" class="dash-link"><span class="dash-micon"><i class="ti ti-share"></i></span><span class="dash-mtext">{{__('Manage vitrina')}}</span><span class="dash-arrow"><i data-feather="chevron-right"></i></span></a>
                        <ul class="dash-submenu">

                                <li class="dash-item  {{Request::segment(1) == 'project' || Request::route()->getName() == 'projects.list' || Request::route()->getName() == 'projects.list' ||Request::route()->getName() == 'projects.index' || Request::route()->getName() == 'projects.show' || request()->is('projects/*') ? 'active' : ''}}">
                                    <a class="dash-link" href="{{ route('nft.index') }}">{{__('Listed')}}</a>
                                </li>


                                <li class="dash-item {{ (request()->is('taskboard*') ? 'active' : '')}}">
{{--                                    <a class="dash-link" href="{{ route('taskBoard.view', 'list') }}">{{__('Tasks')}}</a>--}}
                                    <a class="dash-link" href="">{{__('Tasks')}}</a>
                                </li>



                        </ul>
                    </li>
                    <li class="dash-item dash-hasmenu
                                            {{ ( Request::segment(1) == 'project' || Request::segment(1) == 'bugs-report' || Request::segment(1) == 'bugstatus' ||
                                                 Request::segment(1) == 'project-task-stages' || Request::segment(1) == 'calendar' || Request::segment(1) == 'timesheet-list' ||
                                                 Request::segment(1) == 'taskboard' || Request::segment(1) == 'timesheet-list' || Request::segment(1) == 'taskboard' ||
                                                 Request::segment(1) == 'project' || Request::segment(1) == 'projects' || Request::segment(1) == 'project_report') ? 'active dash-trigger' : ''}}">
                        <a href="#!" class="dash-link"><span class="dash-micon"><i class="ti ti-share"></i></span><span class="dash-mtext">{{__('Manage shipping')}}</span><span class="dash-arrow"><i data-feather="chevron-right"></i></span></a>
                        <ul class="dash-submenu">

                                <li class="dash-item  {{Request::segment(1) == 'project' || Request::route()->getName() == 'projects.list' || Request::route()->getName() == 'projects.list' ||Request::route()->getName() == 'projects.index' || Request::route()->getName() == 'projects.show' || request()->is('projects/*') ? 'active' : ''}}">
                                    <a class="dash-link" href="{{ route('shipping.index') }}">{{__('Listed')}}</a>
                                </li>


                                <li class="dash-item {{ (request()->is('taskboard*') ? 'active' : '')}}">
{{--                                    <a class="dash-link" href="{{ route('taskBoard.view', 'list') }}">{{__('Tasks')}}</a>--}}
                                    <a class="dash-link" href="">{{__('Tasks')}}</a>
                                </li>



                        </ul>
                    </li>
                    <li class="dash-item dash-hasmenu
                                            {{ ( Request::segment(1) == 'project' || Request::segment(1) == 'bugs-report' || Request::segment(1) == 'bugstatus' ||
                                                 Request::segment(1) == 'project-task-stages' || Request::segment(1) == 'calendar' || Request::segment(1) == 'timesheet-list' ||
                                                 Request::segment(1) == 'taskboard' || Request::segment(1) == 'timesheet-list' || Request::segment(1) == 'taskboard' ||
                                                 Request::segment(1) == 'project' || Request::segment(1) == 'projects' || Request::segment(1) == 'project_report') ? 'active dash-trigger' : ''}}">
                        <a href="#!" class="dash-link"><span class="dash-micon"><i class="ti ti-share"></i></span><span class="dash-mtext">{{__('Manage Bid')}}</span><span class="dash-arrow"><i data-feather="chevron-right"></i></span></a>
                        <ul class="dash-submenu">

                                <li class="dash-item  {{Request::segment(1) == 'project' || Request::route()->getName() == 'projects.list' || Request::route()->getName() == 'projects.list' ||Request::route()->getName() == 'projects.index' || Request::route()->getName() == 'projects.show' || request()->is('projects/*') ? 'active' : ''}}">
                                    <a class="dash-link" href="{{ route('bid.index') }}">{{__('Listed')}}</a>
                                </li>


                                <li class="dash-item {{ (request()->is('taskboard*') ? 'active' : '')}}">
{{--                                    <a class="dash-link" href="{{ route('taskBoard.view', 'list') }}">{{__('Tasks')}}</a>--}}
                                    <a class="dash-link" href="">{{__('Tasks')}}</a>
                                </li>



                        </ul>
                    </li>
                    <li class="dash-item dash-hasmenu
                                            {{ ( Request::segment(1) == 'project' || Request::segment(1) == 'bugs-report' || Request::segment(1) == 'bugstatus' ||
                                                 Request::segment(1) == 'project-task-stages' || Request::segment(1) == 'calendar' || Request::segment(1) == 'timesheet-list' ||
                                                 Request::segment(1) == 'taskboard' || Request::segment(1) == 'timesheet-list' || Request::segment(1) == 'taskboard' ||
                                                 Request::segment(1) == 'project' || Request::segment(1) == 'projects' || Request::segment(1) == 'project_report') ? 'active dash-trigger' : ''}}">
                        <a href="#!" class="dash-link"><span class="dash-micon"><i class="ti ti-share"></i></span><span class="dash-mtext">{{__('Manage Nft')}}</span><span class="dash-arrow"><i data-feather="chevron-right"></i></span></a>
                        <ul class="dash-submenu">

                                <li class="dash-item  {{Request::segment(1) == 'project' || Request::route()->getName() == 'projects.list' || Request::route()->getName() == 'projects.list' ||Request::route()->getName() == 'projects.index' || Request::route()->getName() == 'projects.show' || request()->is('projects/*') ? 'active' : ''}}">
                                    <a class="dash-link" href="{{ route('nft.index') }}">{{__('Listed')}}</a>
                                </li>


                                <li class="dash-item {{ (request()->is('taskboard*') ? 'active' : '')}}">
{{--                                    <a class="dash-link" href="{{ route('taskBoard.view', 'list') }}">{{__('Tasks')}}</a>--}}
                                    <a class="dash-link" href="">{{__('Tasks')}}</a>
                                </li>



                        </ul>
                    </li>



                        <li class="dash-item dash-hasmenu {{ (Request::route()->getName() == 'systems.index') ? ' active' : '' }}">
{{--                            <a href="{{ route('systems.index') }}" class="dash-link">--}}
                            <a href="" class="dash-link">
                                <span class="dash-micon"><i class="ti ti-settings"></i></span><span class="dash-mtext">{{__('Settings')}}</span>
                            </a>
                        </li>


                </ul>
            @endif

        </div>
    </div>
</nav>
