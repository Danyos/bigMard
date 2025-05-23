<!DOCTYPE html>
<html lang="hy">
<head>
    <meta charset="UTF-8">
    <title>BigMard - Մուտք</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons (optional, remove if you use your own icons) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(120deg, #e0e7ff 0%, #fff 100%);
            min-height: 100vh;
        }
        .login-box {
            border-radius: 18px;
            box-shadow: 0 2px 20px rgba(100, 116, 139, 0.08), 0 1.5px 6px rgba(59, 130, 246, 0.07);
        }
        .login-header {
            background: #fff;
            box-shadow: 0 1px 12px 0 rgba(0,0,0,.07);
        }
        .brand-logo span {
            font-size: 2rem;
            font-weight: 700;
            letter-spacing: 2px;
        }
    </style>
</head>
<body>
<!-- Header -->
<div class="login-header py-3">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <div class="brand-logo">
            <a href="{{ route('Homeindex') }}" class="text-decoration-none">
                <span class="text-dark">BigMard</span>
            </a>
        </div>
    </div>
</div>
<!-- Login Body -->
<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center py-5" style="min-height:80vh">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-6 col-lg-7 d-none d-md-flex justify-content-center">
                <img src="{{ asset('admin/vendors/images/login-page-img.png') }}"
                     alt="Մուտքի նկար"
                     class="img-fluid"
                     style="max-height: 390px;">
            </div>
            <div class="col-md-6 col-lg-5">
                <div class="login-box bg-white p-4">
                    <div class="login-title mb-4">
                        <h2 class="text-center text-primary fw-bold">Մուտք</h2>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Էլ․ փոստ</label>
                            <div class="input-group">
                                    <span class="input-group-text bg-light">
                                        <i class="bi bi-person"></i>
                                    </span>
                                <input
                                    id="email"
                                    type="email"
                                    placeholder="Մուտքագրեք էլ․ փոստը"
                                    class="form-control form-control-lg @error('email') is-invalid @enderror"
                                    name="email"
                                    value="{{ old('email') }}"
                                    required
                                    autocomplete="email"
                                    autofocus
                                >
                                @error('email')
                                <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Գաղտնաբառ</label>
                            <div class="input-group">
                                    <span class="input-group-text bg-light">
                                        <i class="bi bi-lock"></i>
                                    </span>
                                <input
                                    id="password"
                                    type="password"
                                    placeholder="**********"
                                    class="form-control form-control-lg @error('password') is-invalid @enderror"
                                    name="password"
                                    required
                                    autocomplete="current-password"
                                >
                                @error('password')
                                <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- Remember me -->
                        <div class="mb-3 form-check">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                name="remember"
                                id="remember"
                                {{ old('remember') ? 'checked' : '' }}
                            >
                            <label class="form-check-label" for="remember">
                                Հիշել ինձ
                            </label>
                        </div>
                        <div class="d-grid mb-2">
                            <button type="submit" class="btn btn-primary btn-lg fw-bold">
                                {{ __('Մուտք') }}
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
