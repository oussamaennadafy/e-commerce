<div class="wsus__dashboard_menu">
    <div class="wsusd__dashboard_user">
        <img src="{{ Auth::user()->image ? asset(Auth::user()->image) : asset('frontend/images/default_profile_picture.jpeg') }}"
            alt="img" class="img-fluid">
        <p>{{ Auth::user()->name }}</p>
    </div>
</div>
