<div class="row">
    <div class="form-group col-sm-6">
        <div class="checkbox checkbox-primary">
            <input id="smoking" type="checkbox" {{ ($property->isRuleChecked('No smoking'))? 'checked':'' }} value="No smoking" name="property_rules[]">
            <label for="smoking">No smoking</label>
        </div>
    </div>
    <div class="form-group col-sm-6">
        <div class="checkbox checkbox-primary">
            <input id="weapon" type="checkbox" {{ ($property->isRuleChecked('No deadly weapons'))? 'checked':'' }}  value="No deadly weapons" name="property_rules[]">
            <label for="weapon">No deadly weapons</label>
        </div>
    </div>
    <div class="form-group col-sm-6">
        <div class="checkbox checkbox-primary">
            <input id="pool" type="checkbox" {{ ($property->isRuleChecked('Dont urinate in pool'))? 'checked':'' }}  value="Dont urinate in pool" name="property_rules[]">
            <label for="pool">Don't urinate in pool</label>
        </div>
    </div>
    <div class="form-group col-sm-6">
        <div class="checkbox checkbox-primary">
            <input id="laundry" type="checkbox" {{ ($property->isRuleChecked('No washing outside laundry'))? 'checked':'' }}  value="No washing outside laundry" name="property_rules[]">
            <label for="laundry">No washing outside laundry</label>
        </div>
    </div>
    <div class="form-group col-sm-6">
        <div class="checkbox checkbox-primary">
            <input id="visitor" type="checkbox" {{ ($property->isRuleChecked('Dont host visitors more than 2 weeks'))? 'checked':'' }}  value="Dont host visitors more than 2 weeks" name="property_rules[]">
            <label for="visitor">Don't host visitors more than 2 weeks</label>
        </div>
    </div>
</div>