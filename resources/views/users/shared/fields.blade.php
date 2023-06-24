@php
    $disabledStr = $readonlyData ?? false ? 'disabled' : '';
@endphp

<div class="mb-3 form-floating">
    <input type="text" class="form-control" name="name" id="inputName" {{ $disabledStr }}
        value="{{ old('name', $user->name) }}">
    <label for="inputName" class="form-label">Nome</label>
    @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="mb-3 form-floating">
    <input type="email" class="form-control" name="email" id="inputEmail" {{ $disabledStr }}
        value="{{ old('email', $user->email) }}">
    <label for="inputEmail" class="form-label">Email</label>
    @error('email')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="mb-3 form-floating">
    <input type="password" class="form-control" name="password" id="inputPassword" {{ $disabledStr }}
        value="{{ old('password', $user->password) }}">
    <label for="inputPassword" class="form-label">Password</label>
    @error('password')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

