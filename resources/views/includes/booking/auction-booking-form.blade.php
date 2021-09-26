
<form class="mt-4" id="formSale" method="POST" action="{{ route('property.request.auction') }}">
    @csrf
    <input type="hidden" name="property_id" value="{{ $property->id }}" readonly>
    <input type="hidden" name="type_status" value="sale" readonly>
    <div class="form-group mt-4 validate">
        <label for="">How do you wish to pay?</label>
        <select name="payment_method" class="form-control" data-price="{{ $property->propertyPrice->property_price }}">
            <option value="">--Select--</option>
            <option value="full">Full Payment</option>
            <option value="installment">Installment</option>
        </select>
        <span class="text-danger small mySpan" role="alert"></span>
    </div>

    <div class="form-group mt-4 validate">
        <label for="">Total amount to be paid for chosen method (monthly if installment is chosen)</label>
        <input type="text" readonly name="total_amount" class="form-control" value="0.00"  />
        <span class="text-danger small mySpan" role="alert"></span>
    </div>

    <input type="hidden" readonly name="step" value="3">

    <div class="form-group mt-4">
        <button class="btn btn-primary pl-5 pr-5 confirmBooking font-weight-600 btn-block" data-href="{{ route('single.property', $property->id) }}">CONFIRM BOOKING REQUEST</button>
    </div>
</form>
