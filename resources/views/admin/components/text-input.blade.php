<div class="row mb-6">
    <label class="col-lg-4 col-form-label {{ $required ? 'required' : '' }} fw-semibold fs-6">{{ $label }}</label>
    <div class="col-lg-8 fv-row">
        <input type="{{ $type }}" {{ $id ? 'id=' . $id : '' }} name="{{ $name }}"
            class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="{{ $placeholder }}"
            value="{{ old($name, $value) }}" />
        @error($name)
            <div class="fv-plugins-message-container invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>