<div class="row mt-4 validate">
    <div class="form-group col-sm-4">
        <div class="checkbox checkbox-primary">
            <input id="checkboxa9" type="checkbox" {{ ($property->isAmenityChecked('Bed'))? 'checked':'' }} value="Bed" name="amenities[]">
            <label for="checkboxa9">Bed</label>
        </div>
    </div>
    <div class="form-group col-sm-4">
        <div class="checkbox checkbox-primary">
            <input id="checkboxa0" type="checkbox" {{ ($property->isAmenityChecked('TV'))? 'checked':'' }} value="TV" name="amenities[]">
            <label for="checkboxa0">TV</label>
        </div>
    </div>
    <div class="form-group col-sm-4">
        <div class="checkbox checkbox-primary">
            <input id="checkboxa1" type="checkbox" {{ ($property->isAmenityChecked('Fridge'))? 'checked':'' }} value="Fridge" name="amenities[]">
            <label for="checkboxa1">Fridge</label>
        </div>
    </div>
    <div class="form-group col-sm-4">
        <div class="checkbox checkbox-primary">
            <input id="checkboxa2" type="checkbox" {{ ($property->isAmenityChecked('Internet Connection'))? 'checked':'' }} value="Internet Connection" name="amenities[]">
            <label for="checkboxa2">Internet Connection</label>
        </div>
    </div>
    <div class="form-group col-sm-4">
        <div class="checkbox checkbox-primary">
            <input id="checkboxa3" type="checkbox" {{ ($property->isAmenityChecked('Telephone'))? 'checked':'' }} value="Telephone" name="amenities[]">
            <label for="checkboxa3">Telephone</label>
        </div>
    </div>
    <div class="form-group col-sm-4">
        <div class="checkbox checkbox-primary">
            <input id="checkboxa4" type="checkbox" {{ ($property->isAmenityChecked('Towel,Soap'))? 'checked':'' }} value="Towel,Soap" name="amenities[]">
            <label for="checkboxa4">Towel,Soap</label>
        </div>
    </div>
    <div class="form-group col-sm-4">
        <div class="checkbox checkbox-primary">
            <input id="checkboxa5" type="checkbox" {{ ($property->isAmenityChecked('Fire Extinguisher'))? 'checked':'' }} value="Fire Extinguisher" name="amenities[]">
            <label for="checkboxa5">Fire Extinguisher</label>
        </div>
    </div>
    <div class="form-group col-sm-4">
        <div class="checkbox checkbox-primary">
            <input id="checkboxa6" type="checkbox" {{ ($property->isAmenityChecked('Smoke Detector'))? 'checked':'' }} value="Smoke Detector" name="amenities[]">
            <label for="checkboxa6">Smoke Detector</label>
        </div>
    </div>
    <div class="form-group col-sm-4">
        <div class="checkbox checkbox-primary">
            <input id="checkboxa7" type="checkbox" {{ ($property->isAmenityChecked('Air Conditioning'))? 'checked':'' }} value="Air Conditioning" name="amenities[]">
            <label for="checkboxa7">Air Conditioning</label>
        </div>
    </div>
    <div class="form-group col-sm-4">
        <div class="checkbox checkbox-primary">
            <input id="checkboxa8" type="checkbox" {{ ($property->isAmenityChecked('ceiling Fan'))? 'checked':'' }} value="Ceiling Fan" name="amenities[]">
            <label for="checkboxa8">Ceiling Fan</label>
        </div>
    </div>
    <div class="form-group col-sm-4">
        <div class="checkbox checkbox-primary">
            <input id="checkboxa10" type="checkbox" {{ ($property->isAmenityChecked('Balcony'))? 'checked':'' }} value="Balcony" name="amenities[]">
            <label for="checkboxa10">Balcony</label>
        </div>
    </div>
    <div class="form-group col-sm-4">
        <div class="checkbox checkbox-primary">
            <input id="checkboxa11" type="checkbox" {{ ($property->isAmenityChecked('Wardrobe'))? 'checked':'' }} value="Wardrobe" name="amenities[]">
            <label for="checkboxa11">Wardrobe</label>
        </div>
    </div>
    <div class="form-group col-sm-4">
        <div class="checkbox checkbox-primary">
            <input id="checkboxa12" type="checkbox" {{ ($property->isAmenityChecked('Water Reservoir'))? 'checked':'' }} value="Water Reservoir" name="amenities[]">
            <label for="checkboxa12">Water Reservoir</label>
        </div>
    </div>


    <span class="text-danger small" id="selectMsg" style="display:none" role="alert">Select at least one amenity</span>
</div>