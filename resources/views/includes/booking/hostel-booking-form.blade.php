
<form class="mt-4" id="formHostel" method="POST" action="{{ route('property.request.hostel') }}">
    @csrf
    <input type="hidden" name="property_id" value="{{ $property->id }}" readonly>
    <input type="hidden" name="type_status" value="hostel" readonly>
    <div class="form-group mt-4 validate">
        <label for="">Select room type you wish to stay</label>
        <select name="room_type" class="form-control">
            <option value="">--Select--</option>
            <option value="single_room">Single Room</option>
            <option value="chamber_and_hall">Chamber And Hall</option>
            <option value="apartment">Apartment</option>
        </select>
        <span class="text-danger small mySpan" role="alert"></span>
    </div>
    <div class="form-group mt-4 validate">
        <label for="">Select gender you're booking for</label>
        <select name="gender" class="form-control" data-href="{{ route('property.get.block.names') }}">
            <option value="">--Select--</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
        <span class="text-danger small mySpan" role="alert"></span>
    </div>
    <div class="form-group mt-4 validate">
        <label for="">Block you wish to stay</label>
        <select name="block" class="form-control" data-href="{{ route('property.get.roomnumber') }}">
            <option value="" class="after">--Select--</option>
        </select>
        <span class="text-danger small mySpan" role="alert"></span>
    </div>

    <div class="form-group mt-4 validate">
        <label for="">Room you wish to stay</label>
        <select name="room" class="form-control">
            <option value="" class="after">--Select--</option>

        </select>
        <span class="text-danger small mySpan" role="alert"></span>
    </div>

    <div class="form-group mt-4 validate">
        <label for="">Total amount to be paid for chosen room</label>
        <input type="text" readonly name="total_amount" class="form-control" value="0.00"  />
        <span class="text-danger small mySpan" role="alert"></span>
    </div>

    <input type="hidden" readonly name="step" value="3">

    <div class="form-group mt-4">
        <button class="btn btn-primary pl-5 pr-5 confirmBooking font-weight-600 btn-block" data-href="{{ route('single.property', $property->id) }}">CONFIRM BOOKING REQUEST</button>
    </div>
</form>
