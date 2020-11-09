<!-- item-->
<h6 class="dropdown-item-text">
    Messages ({{ count($notifications)+count($bookings) }})
</h6>
<div class="slimscroll notification-list">
    @if (count($notifications))
    @foreach ($notifications as $item)
       <!-- item-->
       <a href="javascript:void(0);" class="dropdown-item notify-item active">
            <div class="notify-icon bg-success"><i class="fa fa-envelope"></i></div>
            <p class="notify-details">New Message<small class="text-muted">{{ \Illuminate\Support\Str::limit($item->message, 60, '...') }}</small></p>
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
</div>
<!-- All-->
@if (count($notifications))
<a href="{{ route('messages') }}" class="dropdown-item text-center text-primary">
    View all <i class="fi-arrow-right"></i>
</a>
@endif