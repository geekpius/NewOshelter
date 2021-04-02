<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <div class="checkbox checkbox-primary">
                <input id="utility1" type="checkbox" {{ ($property->isIncludeUtilityChecked('water'))? 'checked':'' }} value="water" name="includes[]">
                <label for="utility1">Include water utitlity</label>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <div class="checkbox checkbox-primary">
                <input id="utility2" type="checkbox" {{ ($property->isIncludeUtilityChecked('sanitation'))? 'checked':'' }} value="sanitation" name="includes[]">
                <label for="utility2">Include sanitation utitlity</label>
            </div>
        </div>
    </div>
</div>