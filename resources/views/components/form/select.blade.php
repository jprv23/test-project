<div>
    <label>{{ $label }} @if ($required)
            <span class="text-danger">*</span>
        @endif
    </label>
    <div class="input-group">
        <select class="form-control select2" data-value="{{ old($name) ?? $value }}" name="{{ $name }}" @if($required) data-validation="required" @endif>
            {{ $slot }}
        </select>
        @if($icon)
            <div class="input-group-append">
                <button class="btn btn-secondary" type="button"><i class="fa {{ $icon }}"></i></button>
            </div>
        @endif
    </div>

</div>
