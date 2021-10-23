<!-- item-->
<h6 class="dropdown-item-text">
    Notifications ({{ count($rejectReasons) }})
</h6>
<div class="slimscroll notification-list">
    @if (count($rejectReasons))
        @foreach ($rejectReasons as $item)
            <!-- item-->
{{--            <a href="{{ route('requests.extension.detail', $item->id) }}" class="dropdown-item notify-item">--}}
            <a href="#" class="dropdown-item notify-item">
                <div class="notify-icon bg-success"><i class="fa fa-bell"></i></div>
                <p class="notify-details">
                    Rejected Reason
                    <small class="text-muted">
                        {{ $item->rejectedReasonType() }}
                    </small>
                </p>
            </a>
        @endforeach
    @endif

    @if(!count($rejectReasons))
    <a href="#" class="dropdown-item notify-item">
        <div class="notify-icon bg-danger"><i class="fa fa-bell"></i></div>
        <p class="notify-details">No Notifications</p>
    </a>
    @endif


</div>
