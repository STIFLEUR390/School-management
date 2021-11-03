

<footer class="main-footer">
    <div class="pull-right d-none d-sm-inline-block">
        <ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
            <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)">FAQ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)">{{ env("APP_URL") }}</a>
            </li>
        </ul>
    </div>
    &copy; <script> document.write(new Date().getFullYear()); </script> <a href="{{ env("APP_URL") }}">{{ __(env("APP_NAME", "Easy School Management System")) }}</a>. @lang('All rights reserved.')
</footer>
