<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="vehicle_type" class="form-label">{{ __('Tipo Vehículo') }}</label>
            <select name="vehicle_type" class="form-control @error('vehicle_type') is-invalid @enderror"  id="vehicle_type">
                <option value="Auto" @if(isset($vehicle) &&  $vehicle->vehicle_type == 'Auto') selected @endif>Auto</option>
                <option value="Camioneta" @if(isset($vehicle) &&  $vehicle->vehicle_type == 'Camioneta') selected @endif>Camioneta</option>
                <option value="Motocicleta" @if(isset($vehicle) &&  $vehicle->vehicle_type == 'Motocicleta') selected @endif>Motocicleta</option>
                <option value="Trimoto" @if(isset($vehicle) &&  $vehicle->vehicle_type == 'Trimoto') selected @endif>Trimoto</option>
                <option value="Moto eléctrica"  @if(isset($vehicle) &&  $vehicle->vehicle_type == 'Moto eléctrica') selected @endif>Moto eléctrica</option>
            </select>
            {!! $errors->first('vehicle_type', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="plate" class="form-label">{{ __('Placa') }}</label>
            <input type="text" name="plate" class="form-control @error('plate') is-invalid @enderror" value="{{ old('plate', $vehicle?->plate) }}" id="plate" placeholder="Plate">
            {!! $errors->first('plate', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="disabled_person" class="form-label">{{ __('¿Persona con discapacidad?') }}</label>
            <select name="disabled_person" class="form-control @error('disabled_person') is-invalid @enderror"  id="disabled_person">
                <option value="0" @if(isset($vehicle) && !$vehicle->disabled_person) selected @endif>No</option>
                <option value="1" @if(isset($vehicle) && $vehicle->disabled_person) selected @endif>Sí</option>
            </select>
            {!! $errors->first('disabled_person', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="has_conadis_distinctive" class="form-label">{{ __('¿Cuenta con distintivo vehicular otorgado por el conadis?') }}</label>
            <select name="has_conadis_distinctive" class="form-control @error('has_conadis_distinctive') is-invalid @enderror"  id="has_conadis_distinctive">
                <option value="0" @if(isset($vehicle) && !$vehicle->has_conadis_distinctive) selected @endif>No</option>
                <option value="1" @if(isset($vehicle) && $vehicle->has_conadis_distinctive) selected @endif>Sí</option>
            </select>
            {!! $errors->first('has_conadis_distinctive', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
    </div>
</div>