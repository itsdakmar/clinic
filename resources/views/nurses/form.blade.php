<div class="form-row ">
    <div class="form-group {{ $errors->has('email') ? 'has-danger' : '' }} mb-4 col-md-6">
        <label for="input_email" class="ul-form__label">Email Address:</label>
        <input name="email" type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
               id="input_email"
               placeholder="Enter your email address" required value="{{ old('email', $nurse->email ?? '') }}">
        <small class="ul-form__text form-text">
            Please enter your email address
        </small>
        <div class="invalid-tooltip">Please enter your email address</div>
        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @else
            <div class="invalid-tooltip">Please enter your email address</div>
        @endif
    </div>
    <div class="form-group {{ $errors->has('matricStaffId') ? 'has-danger' : '' }} mb-4 col-md-3">
        <label for="input_matricStaffId" class="ul-form__label">Staff Id:</label>
        <input name="matricStaffId" type="text"
               class="form-control {{ $errors->has('matricStaffId') ? 'is-invalid' : '' }}" id="input_matricStaffId"
               placeholder="Enter your staff id" required
               value="{{ old('matricStaffId', $nurse->matricStaffId ?? '') }}">
        <small class="ul-form__text form-text">
            Please enter your staff id
        </small>
        <div class="invalid-tooltip">Please enter your staff id</div>
        @if ($errors->has('matricStaffId'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('matricStaffId') }}</strong>
            </span>
        @else
            <div class="invalid-tooltip">Please enter your staff id</div>
        @endif
    </div>
</div>
<div class="form-row ">
    <div class="form-group {{ $errors->has('firstName') ? 'has-danger' : '' }} mb-4 col-md-6">
        <label for="input_firstName" class="ul-form__label">First Name:</label>
        <input name="firstName" type="text" class="form-control {{ $errors->has('firstName') ? 'is-invalid' : '' }}"
               id="input_firstName"
               placeholder="Enter first name" required value="{{ old('firstName', $nurse->firstName ?? '') }}">
        <small class="ul-form__text form-text">
            Please enter your first name
        </small>
        <div class="invalid-tooltip">Please enter your first name</div>
        @if ($errors->has('firstName'))
            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('firstName') }}</strong>
                                        </span>
        @else
            <div class="invalid-tooltip">Please enter your first name</div>
        @endif
    </div>
    <div class="form-group {{ $errors->has('lastName') ? 'has-danger' : '' }} mb-4 col-md-6">
        <label for="input_lastName" class="ul-form__label">Last Name:</label>
        <input name="lastName" type="text" class="form-control {{ $errors->has('firstName') ? 'is-invalid' : '' }}"
               id="input_lastName"
               placeholder="Enter last name" required value="{{ old('lastName', $nurse->lastName ?? '') }}">
        <small class="ul-form__text form-text ">
            Please enter your last name
        </small>
        <div class="invalid-tooltip">Please enter your last name</div>
        @if ($errors->has('lastName'))
            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('lastName') }}</strong>
                                        </span>
        @else
            <div class="invalid-tooltip">Please enter your first name</div>
        @endif
    </div>
</div>