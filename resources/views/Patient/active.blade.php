@if(Cache::has('user-is-online-' . $user->id))
    <span class="text-success">Online</span>
@else
    <span class="text-secondary">Offline</span>
@endif