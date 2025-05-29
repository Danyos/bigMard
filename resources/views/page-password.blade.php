<!DOCTYPE html>
<html>
<head>
    <title>Գաղտնաբառ Protected Էջ</title>
</head>
<body>
<form method="POST" action="{{ route('page.password.check') }}">
    @csrf
    <label>Մուտքագրեք գաղտնաբառը</label>
    <input type="password" name="password" required>
    <input type="hidden" name="redirect" value="{{ $redirect }}">
    <button type="submit">Մուտք</button>
    @error('password')
    <div style="color: red">{{ $message }}</div>
    @enderror
</form>
</body>
</html>
