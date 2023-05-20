<div>
    <label>{{ $label }} @if($required)<span class="text-danger">*</span>@endif</label>
    <input type="{{ $type }}" class="form-control" name="{{ $name }}" value="{{ old($name) ?? $value }}" @if($required) data-validation="required" @endif @if($disabled) disabled @endif/>
    @if($errors->has($name))
        <span class="help-block form-error">{{ $errors->first($name) }}</span>
    @endif

</div>
