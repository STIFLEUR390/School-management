

<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar position-relative">
        <div class="multinav">
            <div class="multinav-scroll" style="height: 100%;">
                <!-- sidebar menu-->
                <ul class="sidebar-menu" data-widget="tree">
                    <li>
                        <a href="{{ route('dashboard') }}">
                            <i class="fa fa-tachometer"></i>
                            <span>@lang("Dashboard")</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
                            <span>@lang('Manage User')</span>
                            <span class="pull-right-container">
					  <i class="fa fa-angle-right pull-right"></i>
					</span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('user.view') }}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>@lang('View User')</a></li>
                            <li><a href="{{ route('user.add') }}"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>@lang('Add User')</a></li>
                        </ul>
                    </li>
                    <li class="header">Dashboard & Apps</li>
                    <li class="treeview">
                        <a href="#">
                            <i class="icon-Layout-4-blocks"><span class="path1"></span><span class="path2"></span></i>
                            <span>Dashboard</span>
                            <span class="pull-right-container">
					  <i class="fa fa-angle-right pull-right"></i>
					</span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="javascript:void(0);"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Dashboard 1</a></li>
                            <li><a href="javascript:void(0);"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Dashboard 2</a></li>
                            <li><a href="javascript:void(0);"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Dashboard 3</a></li>
                            <li><a href="javascript:void(0);"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Dashboard 4</a></li>
                            <li><a href="javascript:void(0);"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Dashboard 5</a></li>
                            <li><a href="javascript:void(0);"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Dashboard 6</a></li>
                        </ul>
                    </li>
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
