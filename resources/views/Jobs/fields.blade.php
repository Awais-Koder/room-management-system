<div class="row">
    <div class="mb-3 col-md-6">
        <label for="name" class="form-label">Job Name <sup class="text-danger">*</sup></label>
        <input type="text" class="form-control" name="name" id="name" aria-describedby="nameHelpId"
            placeholder="Enter Name" value="{{ $data['name'] ?? old('name') }}" />
        <strong id="nameHelpId" class="form-text text-danger">
            @error('name')
                {{ $message }}
            @enderror
        </strong>
    </div>
<div class="mb-3 col-md-6">
        <label for="room" class="form-label">Rooms</label>
        <select name="room_id[]" id="" class="form-control" multiple>
            <option selected disabled>-- select room --</option>
            @foreach (App\Services\DefaultService::getRooms() as $room)
                <option value="{{ $room->id }}" {{ isset($rooms) && in_array($room->id, $rooms) ? 'selected' : '' }}>
                    {{ $room->name }}
                </option>
            @endforeach
        </select>
    </div>
</div>
