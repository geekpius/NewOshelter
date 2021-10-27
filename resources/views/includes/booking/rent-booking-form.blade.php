
<form class="mt-4" id="formRent" method="POST" action="{{ route('property.request.rent') }}">
    @csrf
    <input type="hidden" name="property_id" value="{{ $property->id }}" readonly>
    <input type="hidden" name="type_status" value="rent" readonly>
    <input type="hidden" name="currency" value="{{ $property->propertyPrice->currency }}" readonly>
    <div class="form-group mt-4 validate">
        <label for="">Duration you wish to stay for</label>
        <select name="duration" class="form-control" data-price="{{ $property->propertyPrice->property_price }}">
            <option value="">--Select--</option>
            <option value="6">6 Months</option>
            <option value="12">1 Year</option>
            <option value="24">2 Years</option>
            <option value="36">3 Years</option>
        </select>
        <span class="text-danger small mySpan" role="alert"></span>
    </div>

    <div class="form-group mt-4 validate">
        <label for="">Total amount to be paid for chosen duration</label>
        <input type="text" readonly name="total_amount" class="form-control" value="0.00"  />
        <span class="text-danger small mySpan" role="alert"></span>
    </div>
    <div class="form-group mt-4 validate">
        <label for="">How many adults?</label>
        <select name="adult" class="form-control">
            <option value="">--Select--</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>
        <span class="text-danger small mySpan" role="alert"></span>
    </div>

    <div class="form-group mt-4 validate">
        <label for="">How many children?</label>
        <select name="children" class="form-control">
            <option value="">--Select--</option>
            @for($i = 1; $i <= 10; $i++)
                <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>
        <span class="text-danger small mySpan" role="alert"></span>
    </div>

    <input type="hidden" readonly name="step" value="3">

    <div class="form-group mt-4">
        <button class="btn btn-primary pl-5 pr-5 confirmBooking font-weight-600 btn-block" data-href="{{ route('single.property', $property->id) }}">CONFIRM BOOKING REQUEST</button>
    </div>
</form>
