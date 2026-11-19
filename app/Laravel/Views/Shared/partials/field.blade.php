{{-- params: name, label, type (default text), value (optional) --}}
<div class="mb-3">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <input type="{{ $type ?? 'text' }}" id="{{ $name }}" name="{{ $name }}"
           value="{{ ($type ?? 'text') === 'password' ? '' : old($name, $value ?? '') }}"
           class="form-control @error($name) is-invalid @enderror">
    @error($name)<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>
