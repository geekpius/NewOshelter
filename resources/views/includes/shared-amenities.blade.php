<div class="row mt-4">
    <div class="form-group col-sm-4">
        <div class="checkbox checkbox-primary">
            <input id="checkboxs0" type="checkbox" {{ ($property->isSharedAmenityChecked('Swimming Pool'))? 'checked':'' }} value="Swimming Pool" name="shared_amenities[]">
            <label for="checkboxs0">Swimming Pool</label>
        </div>
    </div>
    <div class="form-group col-sm-4">
        <div class="checkbox checkbox-primary">
            <input id="checkboxs1" type="checkbox" {{ ($property->isSharedAmenityChecked('Laundry'))? 'checked':'' }} value="Laundry" name="shared_amenities[]">
            <label for="checkboxs1">Laundry</label>
        </div>
    </div>
    <div class="form-group col-sm-4">
        <div class="checkbox checkbox-primary">
            <input id="checkboxs2" type="checkbox" {{ ($property->isSharedAmenityChecked('Emergency Bell'))? 'checked':'' }} value="Emergency Bell" name="shared_amenities[]">
            <label for="checkboxs2">Emergency Bell</label>
        </div>
    </div>
    <div class="form-group col-sm-4">
        <div class="checkbox checkbox-primary">
            <input id="checkboxs3" type="checkbox" {{ ($property->isSharedAmenityChecked('Garden'))? 'checked':'' }} value="Garden" name="shared_amenities[]">
            <label for="checkboxs3">Garden</label>
        </div>
    </div>
    <div class="form-group col-sm-4">
        <div class="checkbox checkbox-primary">
            <input id="checkboxs4" type="checkbox" {{ ($property->isSharedAmenityChecked('Basketball Court'))? 'checked':'' }} value="Basketball Court" name="shared_amenities[]">
            <label for="checkboxs4">Basketball Court</label>
        </div>
    </div>
    <div class="form-group col-sm-4">
        <div class="checkbox checkbox-primary">
            <input id="checkboxs5" type="checkbox" {{ ($property->isSharedAmenityChecked('Tennis Court'))? 'checked':'' }} value="Tennis Court" name="shared_amenities[]">
            <label for="checkboxs5">Tennis Court</label>
        </div>
    </div>
    <div class="form-group col-sm-4">
        <div class="checkbox checkbox-primary">
            <input id="checkboxs6" type="checkbox" {{ ($property->isSharedAmenityChecked('Car Park'))? 'checked':'' }} value="Car Park" name="shared_amenities[]">
            <label for="checkboxs6">Car Parking Space</label>
        </div>
    </div>
    <div class="form-group col-sm-4">
        <div class="checkbox checkbox-primary">
            <input id="checkboxs7" type="checkbox" {{ ($property->isSharedAmenityChecked('Fire Extinguisher'))? 'checked':'' }} value="Fire Extinguisher" name="shared_amenities[]">
            <label for="checkboxs7">Fire Extinguisher</label>
        </div>
    </div>
    <div class="form-group col-sm-4">
        <div class="checkbox checkbox-primary">
            <input id="checkboxs8" type="checkbox" {{ ($property->isSharedAmenityChecked('Standby Generator'))? 'checked':'' }} value="Standby Generator" name="shared_amenities[]">
            <label for="checkboxs8">Standby Generator</label>
        </div>
    </div>
    <div class="form-group col-sm-4">
        <div class="checkbox checkbox-primary">
            <input id="checkboxs9" type="checkbox" {{ ($property->isSharedAmenityChecked('Wifi Connection'))? 'checked':'' }} value="Wifi Connection" name="shared_amenities[]">
            <label for="checkboxs9">Wifi Connection</label>
        </div>
    </div>

    <div class="form-group col-sm-4">
        <div class="checkbox checkbox-primary">
            <input id="checkboxs10" type="checkbox" {{ ($property->isSharedAmenityChecked('Water Reservoir'))? 'checked':'' }} value="Water Reservoir" name="shared_amenities[]">
            <label for="checkboxs10">Water Reservoir</label>
        </div>
    </div>
    <div class="form-group col-sm-4">
        <div class="checkbox checkbox-primary">
            <input id="checkboxs11" type="checkbox" {{ ($property->isSharedAmenityChecked('Gym'))? 'checked':'' }} value="Gym" name="shared_amenities[]">
            <label for="checkboxs11">Gym</label>
        </div>
    </div>

</div>

