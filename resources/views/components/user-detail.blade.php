<div class="user-profile text-center mt-3">
    <div class="" style="display:flex;justify-content:center;">
        @if (auth()->check() && auth()->user()->profile_image)
            <img src="{{ asset(auth()->user()->profile_image) }}" alt="User Profile Image" class="avatar-md rounded-circle">
        @else
            <img src="{{ Avatar::create(auth()->user()->name)->toBase64() }}" alt="Default Profile Image" class="avatar-md rounded-circle">
        @endif
    </div>

    <div class="mt-3">
        <h4 class="font-size-16 mb-1">{{ auth()->user()->name }}</h4>
        <span class="text-muted">
            <i class="ri-record-circle-line align-middle font-size-14 text-success"></i> {{ auth()->user()->position }}
        </span>
    </div>
</div>
