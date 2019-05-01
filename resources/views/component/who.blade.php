@if(Auth::guard('web')->check())

    <p class="bg-success text-white">
        you are logged as a <strong>User</strong>
    </p>


    @else

    <p class="bg-danger text-white">
        you are logout as a <strong>User</strong>
    </p>

    @endif


@if(Auth::guard('admin')->check())

    <p class="bg-success text-white">
        you are logged as a <strong>Admin</strong>
    </p>


@else

    <p class="bg-danger text-white">
        you are logout as a <strong>Admin</strong>
    </p>

@endif