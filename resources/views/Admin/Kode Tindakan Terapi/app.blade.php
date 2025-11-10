<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'RSHP - Rumah Sakit Hewan Pendidikan')</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/css/Style.css') }}">
    <style>
        /* Reset & Base */
        *{margin:0;padding:0;box-sizing:border-box}
        body{font-family:'Segoe UI',Tahoma,Geneva,Verdana,sans-serif;background:#f5f7fb;color:#1f2937}
        .container{max-width:1200px;margin:0 auto;padding:0 20px}
        
        /* Navigation */
        nav.navbar-container{background:#fff;border-radius:8px;padding:0.75rem 1rem;margin:1rem 0;box-shadow:0 2px 4px rgba(0,0,0,0.04)}
        nav.navbar-container ul{list-style:none;display:flex;gap:0.75rem;justify-content:center;flex-wrap:wrap;padding:0;margin:0}
        nav.navbar-container li{margin:0}
        nav.navbar-container a{
            display:inline-block;
            padding:0.6rem 1.25rem;
            border-radius:6px;
            color:#2463d6;
            text-decoration:none;
            font-weight:500;
            transition:all 0.2s ease
        }
        nav.navbar-container a:hover{background:#e0f2fe;color:#1e40af}
        
        /* Header Section */
        header.header-section{
            background:linear-gradient(135deg,#2463d6 0%,#1e40af 100%);
            color:#fff;
            padding:1.5rem;
            border-radius:10px;
            box-shadow:0 4px 12px rgba(36,99,214,0.15);
            margin-bottom:1.5rem
        }
        .logo-container{
            display:flex;
            align-items:center;
            justify-content:center;
            gap:1.5rem;
            flex-wrap:wrap
        }
        .logo-img{
            height:80px;
            width:80px;
            object-fit:cover;
            border-radius:50%;
            background:#fff;
            border:3px solid rgba(255,255,255,0.9);
            padding:6px;
            display:block;
            box-shadow:0 4px 8px rgba(0,0,0,0.12)
        }
        .logo-content{
            font-size:1.25rem;
            font-weight:700;
            text-align:center;
            line-height:1.4;
            letter-spacing:0.5px
        }
        .container-2{margin-top:0.75rem;text-align:center}
        .navbar-ul2{list-style:none;padding:0;margin:0;display:inline-flex}
        .struktur-link2{
            color:#fff;
            text-decoration:none;
            padding:0.4rem 0.8rem;
            border-radius:4px;
            font-size:0.875rem;
            background:rgba(255,255,255,0.15);
            transition:background 0.2s
        }
        .struktur-link2:hover{background:rgba(255,255,255,0.25)}
        
        /* Footer */
        footer.footer-section{
            background:#1f2937;
            color:#9ca3af;
            padding:1.5rem;
            border-radius:8px;
            margin-top:2rem;
            text-align:center
        }
        footer h2{color:#e5e7eb;font-size:1.125rem;margin-bottom:0.5rem}
        footer p{font-size:0.875rem}
        
        /* Responsive */
        @media (max-width:768px){
            .logo-container{gap:1rem}
            .logo-img{height:60px;width:60px;padding:4px}
            .logo-content{font-size:1rem}
            nav.navbar-container ul{gap:0.25rem}
            nav.navbar-container a{padding:0.4rem 0.75rem;font-size:0.875rem}
        }
    </style>
</head>
<body>
    <div class="container">
        <nav class="navbar-container">
            <ul class="navbar-ul">
                <li class="navbar-li"><a href="https://unair.ac.id/" class="struktur-link" target="_blank" rel="noopener">UNAIR</a></li>
                <li class="navbar-li"><a href="{{ route('home') }}" class="struktur-link">Home</a></li>
                <li class="navbar-li"><a href="{{ route('struktur') }}" class="struktur-link">Struktur Organisasi</a></li>
                <li class="navbar-li"><a href="{{ route('layanan') }}" class="struktur-link">Layanan Umum</a></li>
                <li class="navbar-li"><a href="{{ route('kontak') }}" class="struktur-link">Kontak</a></li>
                <li class="navbar-li"><a href="{{ route('login') }}" class="struktur-link">Login</a></li>
                
                </ul>
            </ul>
        </nav>

        <header class="header-section">
            <div class="logo-container">
                <img src="{{ asset('assets/img/LogoRSHP.png') }}" alt="Logo RSHP" class="logo-img">
                <h1 class="logo-content">RUMAH SAKIT HEWAN<br>UNIVERSITAS AIRLANGGA</h1>
                <img src="{{ asset('assets/img/Logouner.png') }}" alt="Logo UNAIR" class="logo-img">
            </div>
            <div class="container-2">
  
            </div>
        </header>

        <main>
            <table style="width:100%;border-collapse:collapse">
                <thead style="background:#f1f5f9">
                    <tr>
                        <th style="padding:12px;text-align:left;font-weight:600;color:#1f2937">ID Kategori</th>
                        <th style="padding:12px;text-align:left;font-weight:600;color:#1f2937">Nama Kategori</th>
                        <th style="padding:12px;text-align:left;font-weight:600;color:#1f2937">Deskripsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kategoriKlinis as $kategori)
                    <tr style="border-bottom:1px solid #e5e7eb">
                        <td style="padding:12px;color:#374151">{{ $kategori->id }}</td>
                        <td style="padding:12px;color:#374151">{{ $kategori->nama_kategori }}</td>
                        <td style="padding:12px;color:#374151">{{ $kategori->deskripsi }}</td>
                    </tr>
                    @endforeach
                </tbody>
        </main>

        <footer class="footer-section" style="margin-top:2rem;padding:1rem 0;text-align:center">
            <div class="container-footer-1">
                <div class="footer-content">
                    <h2>SMART SERVICE</h2>
                    <p>&copy; {{ date('Y') }} Rumah Sakit Hewan Universitas Airlangga. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
