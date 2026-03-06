<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Login Masyarakat</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<style>

body{
    background:#f5f7fb;
}

.login-card{
    max-width:1100px;
    margin:auto;
    margin-top:60px;
    border-radius:15px;
    overflow:hidden;
    box-shadow:0 10px 30px rgba(0,0,0,0.1);
}

.left-panel{
    background:linear-gradient(135deg,#1c64f2,#0a2e63);
    color:white;
    padding:40px;
}

.left-panel h2{
    font-weight:700;
}

.right-panel{
    padding:40px;
    background:white;
}

.btn-login{
    background:#1c64f2;
    color:white;
    width:100%;
}

.btn-login:hover{
    background:#0d4ed8;
}

.admin-box{
    border:1px solid #eee;
    padding:15px;
    border-radius:10px;
    text-decoration:none;
    display:block;
}

</style>

</head>

<body>

<div class="container">

<div class="row login-card">

<!-- LEFT -->
<div class="col-md-6 left-panel">

<h5 class="mb-3">
<i class="bi bi-building"></i> Pelayanan Publik Terpadu
</h5>

<h2>Selamat Datang di Layanan Digital</h2>

<p>
Akses layanan administrasi kependudukan kelurahan dengan mudah,
cepat, dan transparan dari mana saja.
</p>

</div>


<!-- RIGHT -->
<div class="col-md-6 right-panel">

<h3 class="mb-3">Login Masyarakat</h3>

<p class="text-muted">
Silakan masuk dengan akun yang terdaftar untuk mengakses layanan.
</p>

<form method="POST" action="{{ route('login') }}">
@csrf

<div class="mb-3">

<label>Email atau NIK</label>

<input type="text"
name="email"
class="form-control"
placeholder="Masukkan Email atau NIK anda"
required>

</div>


<div class="mb-3">

<label>Password</label>

<input type="password"
name="password"
class="form-control"
required>

</div>


<div class="form-check mb-3">

<input class="form-check-input"
type="checkbox"
name="remember">

<label class="form-check-label">
Ingat saya di perangkat ini
</label>

</div>


<button class="btn btn-login">
Masuk Sekarang →
</button>

</form>


<hr>

<p class="text-center">

Belum memiliki akun?
<a href="{{ route('register') }}">
Daftar Akun Baru
</a>

</p>


<a href="{{ route('admin.login') }}" class="admin-box">

<strong>Login Admin</strong>

<br>

<small class="text-muted">
Halaman khusus petugas
</small>

</a>

</div>

</div>
</div>

</body>
</html>