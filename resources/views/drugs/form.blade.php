<div class="form-row ">
    <div class="form-group {{ $errors->has('name') ? 'has-danger' : '' }} mb-4 col-md-6">
        <label for="input_name" class="ul-form__label">Drug Name:</label>
        <input name="name" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
               id="input_name"
               placeholder="Enter drug name" required value="{{ old('name', $drug->name ?? '') }}">
        <small class="ul-form__text form-text">
            Please enter drug name
        </small>
        <div class="invalid-tooltip">Please enter drug name </div>
        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @else
            <div class="invalid-tooltip">Please enter drug name</div>
        @endif
    </div>
    <div class="form-group {{ $errors->has('description') ? 'has-danger' : '' }} mb-4 col-md-6">
        <label for="input_description" class="ul-form__label">Drug description:</label>
        <input name="description" type="text" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}"
               id="input_description"
               placeholder="Enter drug description" required value="{{ old('description', $drug->description ?? '') }}">
        <small class="ul-form__text form-text">Please enter drug description</small>
            <div class="invalid-tooltip">Please enter drug description </div>
            @if ($errors->has('description'))
                <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
            @else
                <div class="invalid-tooltip">Please enter drug description</div>
        @endif
    </div>
</div>
<div class="form-row ">
    <div class="form-group {{ $errors->has('quantity') ? 'has-danger' : '' }} mb-4 col-md-3">
        <label for="input_Quantity" class="ul-form__label">Quantity:</label>
        <input name="quantity" type="text" class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}"
               id="input_Quantity"
               placeholder="Enter drug quantity" required value="{{ old('quantity', $drug->quantity ?? '') }}">
        <small class="ul-form__text form-text">
            Please enter drug quantity
        </small>
        <div class="invalid-tooltip">Please enter drug quantity</div>
        @if ($errors->has('quantity'))
            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('quantity') }}</strong>
                                        </span>
        @else
            <div class="invalid-tooltip">Please enter drug quantity</div>
        @endif
    </div>
    <div class="col-md-6 form-group mb-4">
        <label for="datePicker" class="ul-form__label">Appointment date</label>
        <div class="input-group">
            <input type="text" readonly name="date" id="datePicker" class="form-control select"
                   placeholder="Enter appointment date" value="{{ old('date') }}" required>

            <div class="input-group-append">
                <button class="btn btn-primary text-white" type="button">
                    <i class="icon-regular i-Calendar-4"></i>
                </button>
            </div>
        </div>
        <small class="ul-form__text form-text ">
            Please select expired date
        </small>
        <div class="invalid-tooltip datepicker_error">Please select expired date</div>
    </div>
</div>