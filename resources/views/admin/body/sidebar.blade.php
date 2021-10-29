

<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar position-relative">
        <div class="multinav">
            <div class="multinav-scroll" style="height: 100%;">
                <!-- sidebar menu-->
                <ul class="sidebar-menu" data-widget="tree">
                    @foreach(config('menu') as $name => $elements)
                        @if($elements['role'] === 'admin' && Auth::user()->role=="Admin")
                            @if($elements['isHeader'])
                                <li class="header">@lang($name)</li>
                            @else
                                @isset($elements['children'])
                                    <li class="treeview {{ menuOpen($elements['children']) }} {{ currentChildActive($elements['children']) }}">
                                        <a href="#">
                                            <i class="{{ $elements['icon'] }}">
                                                <span class="path1"></span><span class="path2"></span>
                                            </i>
                                            <span>@lang($name)</span>
                                            <span class="pull-right-container">
                                              <i class="fa fa-angle-right pull-right"></i>
                                            </span>
                                        </a>
                                        <ul class="treeview-menu">
                                            @foreach($elements['children'] as $child)
                                                @if(($elements['role'] === 'admin' && Auth::user()->role=="Admin") && $child['name'] !== 'fake')
                                                    <x-back.menu-item :route="$child['route']" :sub="true">
                                                        @lang($child['name'])
                                                    </x-back.menu-item>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                @else
                                    <x-back.menu-item :route="$elements['route']" :icon="$elements['icon']">
                                        @lang($name)
                                    </x-back.menu-item>
                                @endisset
                            @endif
                        @endif
                        @if($elements['role'] === 'user' && (Auth::user()->role=="User" || Auth::user()->role=="Admin"))
                            @if($elements['isHeader'])
                                <li class="header">@lang($name)</li>
                            @else
                                @isset($elements['children'])
                                    <li class="treeview {{ menuOpen($elements['children']) }} {{ currentChildActive($elements['children']) }}">
                                        <a href="#">
                                            <i class="{{ $elements['icon'] }}">
                                                <span class="path1"></span><span class="path2"></span>
                                            </i>
                                            <span>@lang($name)</span>
                                            <span class="pull-right-container">
                                              <i class="fa fa-angle-right pull-right"></i>
                                            </span>
                                        </a>
                                        <ul class="treeview-menu">
                                            @foreach($elements['children'] as $child)
                                                @if(($elements['role'] === 'user' && (Auth::user()->role=="User" || Auth::user()->role=="Admin")) && $child['name'] !== 'fake')
                                                    <x-back.menu-item :route="$child['route']" :sub="true">
                                                        @lang($child['name'])
                                                    </x-back.menu-item>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                @else
                                    <x-back.menu-item :route="$elements['route']" :icon="$elements['icon']">
                                        @lang($name)
                                    </x-back.menu-item>
                                @endisset
                            @endif
                        @endif
                        @if($elements['role'] === 'operator' && (Auth::user()->role=="Operator" || Auth::user()->role=="Admin"))
                                @if($elements['isHeader'])
                                    <li class="header">@lang($name)</li>
                                @else
                                    @isset($elements['children'])
                                        <li class="treeview {{ menuOpen($elements['children']) }} {{ currentChildActive($elements['children']) }}">
                                            <a href="#">
                                                <i class="{{ $elements['icon'] }}">
                                                    <span class="path1"></span><span class="path2"></span>
                                                </i>
                                                <span>@lang($name)</span>
                                                <span class="pull-right-container">
                                              <i class="fa fa-angle-right pull-right"></i>
                                            </span>
                                            </a>
                                            <ul class="treeview-menu">
                                                @foreach($elements['children'] as $child)
                                                    @if(($elements['role'] === 'operator' && (Auth::user()->role=="Operator" || Auth::user()->role=="Admin")) && $child['name'] !== 'fake')
                                                        <x-back.menu-item :route="$child['route']" :sub="true">
                                                            @lang($child['name'])
                                                        </x-back.menu-item>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </li>
                                    @else
                                        <x-back.menu-item :route="$elements['route']" :icon="$elements['icon']">
                                            @lang($name)
                                        </x-back.menu-item>
                                    @endisset
                                @endif
                            @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
    <div class="sidebar-footer">
        <a href="javascript:void(0);" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><span class="icon-Settings-2"></span></a>
        <a href="javascript:void(0);" class="link" data-toggle="tooltip" title="" data-original-title="Email"><span class="icon-Mail"></span></a>

        <form action="{{ route('logout') }}" method="POST" hidden> @csrf </form>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.previousElementSibling.submit();" class="link" data-toggle="tooltip" title="" data-original-title="@lang('Logout')"><span class="icon-Lock-overturning"><span class="path1"></span><span class="path2"></span></span></a>
    </div>
</aside>
