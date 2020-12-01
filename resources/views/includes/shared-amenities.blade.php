<div class="row mt-4">
    <div class="form-group col-sm-4">
        <div class="checkbox checkbox-primary">
            <input id="checkboxs0" type="checkbox" {{ ($property->isSharedAmenityChecked('Swimming Pool'))? 'checked':'' }} value="Swimming Pool" name="shared_amenities[]">
            <label for="checkboxs0">Swimming Pool</label>
        </div>
    </div>
    <div class="form-group col-sm-4">
        <div class="checkbox checkbox-primary">
            <input id="checkboxs1" type="checkbox" {{ ($property->isSharedAmenityChecked('Laundary'))? 'checked':'' }} value="Laundary" name="shared_amenities[]">
            <label for="checkboxs1">Laundary</label>
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
            <label for="checkboxs6">Car Park</label>
        </div>
    </div>
    <div class="form-group col-sm-4">
        <div class="checkbox checkbox-primary">
            <input id="checkboxs7" type="checkbox" {{ ($property->isSharedAmenityChecked('Fire Extinguisher'))? 'checked':'' }} value="Fire Extinguisher" name="shared_amenities[]">
            <label for="checkboxs7">Fire Extinguisher</label>
        </div>
    </div>

</div>

