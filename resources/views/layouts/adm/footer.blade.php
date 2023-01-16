
        <footer class="main-footer text-sm">
            {{-- <div class="float-right d-none d-sm-block">
                <b>Version</b> {{ \Setting::getSetting()->version_web }}
            </div> --}}
            <strong>Copyright &copy; {{ date('Y') }} <a href="{{ route('home') }}">{{ \Setting::getSetting()->footer_web }}</a></strong> All Rights Reserved.
        </footer>
