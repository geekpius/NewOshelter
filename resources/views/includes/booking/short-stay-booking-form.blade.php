
<form class="mt-4" id="formShortStay" method="POST" action="{{ route('property.request.short.stay') }}">
    @csrf
    <input type="hidden" name="property_id" value="{{ $property->id }}" readonly>
    <input type="hidden" name="currency" value="{{ $property->propertyPrice->currency }}" readonly>
    <div class="form-group mt-4 validate" id="dateMaxMin" data-min="{{ $property->propertyPrice->minimum_stay }}" data-max="{{ $property->propertyPrice->maximum_stay }}">
        <label for="">Duration you wish to stay for</label>
        <div class="input-group" id="dateRanger" data-date="{{ \Carbon\Carbon::parse(\Carbon\Carbon::tomorrow())->format('m-d-Y') }}">
            <input type="text" name="check_in" value="" class="form-control" placeholder="Check In" readonly />
            <div class="input-group-prepend">
                <span class="input-group-text fa fa-arrow-right small" id="inputGroup-sizing-sm"></span>
            </div>
            <input type="text" name="check_out" value="" class="form-control" placeholder="Check Out" readonly />
        </div>
        <span class="text-danger small mySpan" role="alert"></span>
    </div>

    <div class="form-group mt-4 validate">
        <label for="">Total amount to be paid for chosen duration</label>
        <input type="text" readonly name="total_amount" class="form-control" value="0.00"  />
        <span class="text-danger small mySpan" role="alert"></span>
    </div>
    <div class="form-group mt-4 validate">
        <label for="">How many adult are coming?</label>
        <select name="adult" class="form-control" data-number="{{ $property->adult }}">
            <option value="">--Select--</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>
        <span class="text-danger small mySpan" role="alert"></span>
    </div>

    <div class="form-group mt-4 validate">
        <label for="">How many children are coming?</label>
        <select name="children" class="form-control" data-number="{{ $property->children }}">
            <option value="">--Select--</option>
            @for($i = 1; $i <= 10; $i++)
                <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>
        <span class="text-danger small mySpan" role="alert"></span>
    </div>

    <input type="hidden" readonly name="step" value="3">

    <input type="hidden" id="initialAmount" value="{{ $property->propertyPrice->property_price }}">
    <div class="form-group mt-4">
        <button class="btn btn-primary pl-5 pr-5 confirmBooking font-weight-600 btn-block" data-href="{{ route('single.property', $property->id) }}">CONFIRM BOOKING REQUEST</button>
    </div>
</form>
