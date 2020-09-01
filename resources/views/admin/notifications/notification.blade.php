<!-- item-->
<h6 class="dropdown-item-text">
    Notifications ({{ count($notifications) }})
</h6>
<div class="slimscroll notification-list">
    @if (count($notifications))
        @foreach ($notifications as $item)
            <!-- item-->
            <a href="{{ route('visits.extension.request', $item->id) }}" class="dropdown-item notify-item active">
                <div class="notify-icon bg-success"><i class="fa fa-bell"></i></div>
                <p class="notify-details">Extension Request<small class="text-muted">{{ $item->user->name }} wants to extend stay to {{ \Carbon\Carbon::parse($item->extension_date)->format('d-M-Y') }}</small></p>
            </a>
        @endforeach
    @else
        <a href="javascript:void(0);" class="dropdown-item notify-item active">
            <div class="notify-icon bg-danger"><i class="fa fa-bell"></i></div>
            <p class="notify-details">No Notification<small class="text-muted">No notification found.</small></p>
        </a>
    @endif
</div>
