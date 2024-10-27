<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="vehicle_type" class="form-label">{{ __('Vehicle Type') }}</label>
            <input type="text" name="vehicle_type" class="form-control @error('vehicle_type') is-invalid @enderror" value="{{ old('vehicle_type', $vehicle?->vehicle_type) }}" id="vehicle_type" placeholder="Vehicle Type">
            {!! $errors->first('vehicle_type', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="plate" class="form-label">{{ __('Plate') }}</label>
            <input type="text" name="plate" class="form-control @error('plate') is-invalid @enderror" value="{{ old('plate', $vehicle?->plate) }}" id="plate" placeholder="Plate">
            {!! $errors->first('plate', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="disabled_person" class="form-label">{{ __('Disabled Person') }}</label>
            <input type="text" name="disabled_person" class="form-control @error('disabled_person') is-invalid @enderror" value="{{ old('disabled_person', $vehicle?->disabled_person) }}" id="disabled_person" placeholder="Disabled Person">
            {!! $errors->first('disabled_person', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="has_conadis_distinctive" class="form-label">{{ __('Has Conadis Distinctive') }}</label>
            <input type="text" name="has_conadis_distinctive" class="form-control @error('has_conadis_distinctive') is-invalid @enderror" value="{{ old('has_conadis_distinctive', $vehicle?->has_conadis_distinctive) }}" id="has_conadis_distinctive" placeholder="Has Conadis Distinctive">
            {!! $errors->first('has_conadis_distinctive', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="application_date" class="form-label">{{ __('Application Date') }}</label>
            <input type="text" name="application_date" class="form-control @error('application_date') is-invalid @enderror" value="{{ old('application_date', $vehicle?->application_date) }}" id="application_date" placeholder="Application Date">
            {!! $errors->first('application_date', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="is_approved" class="form-label">{{ __('Is Approved') }}</label>
            <input type="text" name="is_approved" class="form-control @error('is_approved') is-invalid @enderror" value="{{ old('is_approved', $vehicle?->is_approved) }}" id="is_approved" placeholder="Is Approved">
            {!! $errors->first('is_approved', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="approved_by" class="form-label">{{ __('Approved By') }}</label>
            <input type="text" name="approved_by" class="form-control @error('approved_by') is-invalid @enderror" value="{{ old('approved_by', $vehicle?->approved_by) }}" id="approved_by" placeholder="Approved By">
            {!! $errors->first('approved_by', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="user_id" class="form-label">{{ __('User Id') }}</label>
            <input type="text" name="user_id" class="form-control @error('user_id') is-invalid @enderror" value="{{ old('user_id', $vehicle?->user_id) }}" id="user_id" placeholder="User Id">
            {!! $errors->first('user_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>