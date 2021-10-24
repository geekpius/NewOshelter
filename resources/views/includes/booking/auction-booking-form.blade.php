
<form class="mt-4" id="formAuction" method="POST" action="{{ route('property.request.auction') }}">
    @csrf
    <input type="hidden" name="property_id" value="{{ $property->id }}" readonly>
    <input type="hidden" name="type_status" value="auction" readonly>

    <div class="form-group mt-4 validate">
        <label for="">Auction Date</label>
        <input type="text" readonly name="auction_date" class="form-control" value="{{ $property->propertyAuctionSchedule->auction_date }}"  />
        <span class="text-danger small mySpan" role="alert"></span>
    </div>

    <div class="form-group mt-4 validate">
        <label for="">Auction Time</label>
        <input type="text" readonly name="auction_time" class="form-control" value="{{ date('h:ia', strtotime($property->propertyAuctionSchedule->auction_time)) }}"  />
        <span class="text-danger small mySpan" role="alert"></span>
    </div>

    <input type="hidden" readonly name="step" value="3">

    <div class="form-group mt-4">
        <button class="btn btn-primary pl-5 pr-5 confirmBooking font-weight-600 btn-block" data-href="{{ route('single.property', $property->id) }}">CONFIRM BOOKING REQUEST</button>
    </div>
</form>
