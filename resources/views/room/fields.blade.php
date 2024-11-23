<div class="row">
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
        <label for="name" class="form-label">Job Role</label>
        <select name="position_id[]" id="" class="form-control" multiple>
            <option selected disabled>-- select a job role --</option>
            @foreach (App\Services\DefaultService::getPositions() as $position)
                <option value="{{ $position->id }}"
                    {{ isset($roomPositions) && in_array($position->id, $roomPositions) ? 'selected' : '' }}>
                    {{ $position->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3 col-md-12">
        <label for="description" class="form-label">Description</label>
        <textarea type="text" class="form-control" name="description" id="description" aria-describedby="descriptionHelpId"
            placeholder="Enter Description" rows="5">{{ $data['description'] ?? old('description') }}</textarea>
        <strong id="descriptionHelpId" class="form-text text-danger">
            @error('description')
                {{ $message }}
            @enderror
        </strong>
    </div>

    <div class="mb-3 col-md-12">
        <label for="image" class="form-label">Image
            @isset($data)
            @else
                <sup class="text-danger">*</sup>
            @endisset
        </label>
        <input type="file" class="form-control" name="image" id="image" accept="image/*" />
        <strong id="imageHelpId" class="form-text text-danger">
            @error('image')
                {{ $message }}
            @enderror
        </strong>
    </div>
    @isset($data)
        <div class="mb-3 col-md-12 d-flex flex-column">
            <label for="" class="form-label">Current Image</label>
            <img src="{{ Storage::url($data->image) }}" alt="" width="50%">
        </div>
    @else
    @endisset
</div>
