<div class="row">
    <div class="mb-3 col-md-6">
        <label for="name" class="form-label">Position Role</label>
        <select name="position_id[]" id="" class="form-control" multiple>
            <option selected disabled>-- select a position role --</option>
            @foreach (App\Services\DefaultService::getPositions() as $position)
                <option value="{{ $position->id }}"
                    {{ isset($userPositions) && in_array($position->id, $userPositions) ? 'selected' : '' }}>
                    {{ $position->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3 col-md-6">
        <label for="name" class="form-label">Name <sup class="text-danger">*</sup></label>
        <input type="text" class="form-control" name="name" id="name" aria-describedby="nameHelpId"
            placeholder="Enter Name" value="{{ $data['name'] ?? old('name') }}" />
        <strong id="nameHelpId" class="form-text text-danger">
            @error('name')
                {{ $message }}
            @enderror
        </strong>
    </div>

    <div class="mb-3 col-md-6">
        <label for="phone_number" class="form-label">Phone Number @isset($data)
            @else
                <sup class="text-danger">*</sup>
            @endisset</label>
        <input type="text" class="form-control" name="phone_number" id="phone_number"
            aria-describedby="phone_numberHelpId" placeholder="Enter Phone number"
            value="{{ $data['phone_number'] ?? old('phone_number') }}" />
        <strong id="phone_numberHelpId" class="form-text text-danger">
            @error('phone_number')
                {{ $message }}
            @enderror
        </strong>
    </div>

    <div class="mb-3 col-md-6">
        <label for="card_number" class="form-label">Card Number @isset($data)
            @else
                <sup class="text-danger">*</sup>
            @endisset</label>
        <input type="text" class="form-control" name="card_number" id="card_number"
            aria-describedby="card_numberHelpId" placeholder="Enter Card Number"
            value="{{ $data['card_number'] ?? old('card_number') }}" />
        <strong id="card_numberHelpId" class="form-text text-danger">
            @error('card_number')
                {{ $message }}
            @enderror
        </strong>
    </div>
    <div class="mb-3 col-md-6">
        <label for="email" class="form-label">Email <sup class="text-danger">*</sup></label>
        <input type="text" class="form-control" name="email" id="email" aria-describedby="emailHelpId"
            placeholder="Enter Email" value="{{ $data['email'] ?? old('email') }}" />
        <strong id="emailHelpId" class="form-text text-danger">
            @error('email')
                {{ $message }}
            @enderror
        </strong>
    </div>
    <div class="mb-3 col-md-6">
        <label for="password" class="form-label">Password
            @isset($data)
            @else
                <sup class="text-danger">*</sup>
            @endisset
        </label>
        <input type="password" class="form-control" name="password" id="password" aria-describedby="passwordHelpId"
            placeholder="Enter password" value="" />
        <strong id="passwordHelpId" class="form-text text-danger">
            @error('password')
                {{ $message }}
            @enderror
        </strong>
    </div>
    <div class="mb-3 col-md-6">
        <label for="password" class="form-label">Confirm Password
            @isset($data)
            @else
                <sup class="text-danger">*</sup>
            @endisset
        </label>
        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"
            aria-describedby="passwordHelpId" placeholder="Enter Confirm password" value="" />
        <strong id="passwordHelpId" class="form-text text-danger">
            @error('password_confirmation')
                {{ $message }}
            @enderror
        </strong>
    </div>

</div>
