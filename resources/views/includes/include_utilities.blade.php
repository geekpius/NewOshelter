<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <div class="checkbox checkbox-primary">
                <input id="utility1" type="checkbox" {{ ($property->isIncludeUtilityChecked('water bill'))? 'checked':'' }} value="water bill" name="includes[]">
                <label for="utility1">Include water bill</label>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <div class="checkbox checkbox-primary">
                <input id="utility2" type="checkbox" {{ ($property->isIncludeUtilityChecked('sanitation fee'))? 'checked':'' }} value="sanitation fee" name="includes[]">
                <label for="utility2">Include sanitation fee</label>
            </div>
        </div>
    </div>
</div>