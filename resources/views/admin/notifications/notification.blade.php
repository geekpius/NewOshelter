<!-- item-->
<h6 class="dropdown-item-text">
    Notifications ({{ count($notifications)+count($noti_confirms)+count($bookings)+count($confirms) }})
</h6>
<div class="slimscroll notification-list">
    @if (count($notifications))
        @foreach ($notifications as $item)
            <!-- item-->
            <a href="{{ route('requests.extension.detail', $item->id) }}" class="dropdown-item notify-item active">
                <div class="notify-icon bg-success"><i class="fa fa-bell"></i></div>
                <p class="notify-details">Extension Request<small class="text-muted">{{ $item->user->name }} wants to extend stay to {{ \Carbon\Carbon::parse($item->extension_date)->format('d-M-Y') }}</small></p>
            </a>
        @endforeach
    @endif

    @if (count($noti_confirms))
        @foreach ($noti_confirms as $item)
            <!-- item-->
            <a href="{{ route('requests.extension.payment', $item->id) }}" class="dropdown-item notify-item active">
                <div class="notify-icon bg-success"><i class="fa fa-bell"></i></div>
                <p class="notify-details">Extension Payment Request<small class="text-muted">Pending</small></p>
            </a>
        @endforeach
    @endif


    @if (count($bookings))
    @foreach ($bookings as $item)
       <!-- item-->
       <a href="{{ route('requests.detail', $item->id) }}" class="dropdown-item notify-item active">
            <div class="notify-icon bg-success"><i class="fa fa-exchange-alt"></i></div>
            <p class="notify-details">Booking Request<small class="text-muted">Pending</small></p>
        </a> 
    @endforeach
    @endif

    @if (count($confirms))
    @foreach ($confirms as $item)
       <!-- item-->
       <a href="{{ route('requests.payment', $item->id) }}" class="dropdown-item notify-item active">
            <div class="notify-icon bg-success"><i class="fa fa-money-bill"></i></div>
            <p class="notify-details">Payment Request<small class="text-muted">Pending</small></p>
        </a> 
    @endforeach
    @endif
</div>
