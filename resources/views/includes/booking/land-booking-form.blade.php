
<form class="mt-4" id="formLand" method="POST" action="{{ route('property.request.sale') }}">
    @csrf
    <input type="hidden" name="property_id" value="{{ $property->id }}" readonly>
    <input type="hidden" name="type_status" value="sale" readonly>
    <input type="hidden" name="currency" value="{{ $property->propertyLandDetail->currency }}" readonly>
    <input type="hidden" name="price" value="{{ $property->propertyLandDetail->price }}" readonly>
    <div class="form-group mt-4 validate">
        <label for="">How many plots</label>
        <input type="tel" name="plots" class="form-control" placeholder="Enter number of plots you want" onkeypress="return isNumber(event)" data-price="{{ $property->propertyLandDetail->price }}"  />
        <span class="text-danger small mySpan" role="alert"></span>
    </div>

    <div class="form-group mt-4 validate">
        <label for="">Total amount to be paid for selected plots</label>
        <input type="text" readonly name="total_amount" class="form-control" value="0.00"  />
        <span class="text-danger small mySpan" role="alert"></span>
    </div>

    <input type="hidden" readonly name="step" value="3">

    <div class="form-group mt-4">
        <button class="btn btn-primary pl-5 pr-5 confirmBooking font-weight-600 btn-block" data-href="{{ route('single.property', $property->id) }}">CONFIRM BOOKING REQUEST</button>
    </div>
</form>

