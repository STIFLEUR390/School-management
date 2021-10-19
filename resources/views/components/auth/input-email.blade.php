@props(['email' => ''])

<div class="form-group">
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text bg-transparent"><i class="ti-email"></i></span>
        </div>
        <input type="email" name="email" value="{{ old('email', $email) }}" required autofocus class="form-control pl-15 bg-transparent" placeholder="@lang('Email')">
    </div>
</div>
