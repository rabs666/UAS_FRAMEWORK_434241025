@extends('layouts.app')

@section('title', 'Home - RSHP')

@section('content')
    {{-- Success Message --}}
    @if(session('success'))
        <div style="background:#d4edda;border:1px solid #c3e6cb;color:#155724;padding:1rem;border-radius:6px;margin-bottom:1.5rem;text-align:center">
            {{ session('success') }}
        </div>
    @endif

    {{-- Hero Section --}}
    <section class="main-content" style="background:#fff;padding:2rem;border-radius:8px;margin-bottom:2rem;box-shadow:0 2px 8px rgba(0,0,0,0.06)">
        <div class="container-content" style="max-width:900px;margin:0 auto">
            <h2 style="color:#2463d6;margin-bottom:1rem;font-size:1.5rem">Selamat Datang di RSHP UNAIR</h2>
            <p class="p-content" style="line-height:1.8;color:#4b5563;margin-bottom:1.5rem">
                Rumah Sakit Hewan Pendidikan Universitas Airlangga berinovasi untuk selalu
                meningkatkan kualitas pelayanan. RSHP menyediakan pendaftaran online untuk
                mempermudah pendaftaran hewan kesayangan Anda.
            </p>

            <div class="video-container" style="margin-top:1.5rem;text-align:center">
                <iframe width="100%" height="450" style="max-width:720px;border-radius:8px"
                    src="https://www.youtube.com/embed/rCfvZPECZvE?autoplay=0&mute=1"
                    title="YouTube video player"
                    frameborder="0"
                    allow="autoplay; encrypted-media"
                    allowfullscreen>
                </iframe>
            </div>
        </div>
    </section>

    {{-- Services Section --}}
    <section class="services-section" style="background:#f8fafc;padding:2rem;border-radius:8px;margin-bottom:2rem">
        <div class="List-content">
            <h3 style="color:#2463d6;margin-bottom:1rem">Layanan Kami</h3>
            <p style="color:#6b7280;line-height:1.7;margin-bottom:1rem">
                RSHP menyediakan layanan kesehatan hewan, operasi, vaksinasi, serta informasi
                jadwal dokter dan berita terbaru.
            </p>

            <p style="margin-bottom:1rem">
                <a href="https://rshp.unair.ac.id" target="_blank" rel="noopener" 
                   style="color:#18a18a;font-weight:600;text-decoration:none;border-bottom:2px solid #18a18a">
                   Kunjungi Website Resmi RSHP UNAIR →
                </a>
            </p>

            <ul class="services-list" style="list-style:none;padding:0">
                <li class="li-content" style="padding:0.5rem 0;color:#374151">✓ Pendaftaran Online & Jadwal Konsultasi</li>
                <li class="li-content" style="padding:0.5rem 0;color:#374151">✓ Layanan Kesehatan Hewan</li>
                <li class="li-content" style="padding:0.5rem 0;color:#374151">✓ Informasi Kesehatan Hewan</li>
                <li class="li-content" style="padding:0.5rem 0;color:#374151">✓ Informasi Berita Terbaru</li>
            </ul>
        </div>
    </section>

    {{-- Schedule Table --}}
    <section class="data-section" style="margin-bottom:2rem">
        <h3 style="color:#2463d6;margin-bottom:1rem">Jadwal Layanan</h3>
        <div class="table-container" style="overflow-x:auto;background:#fff;border-radius:8px;box-shadow:0 2px 8px rgba(0,0,0,0.06)">
            <table class="data-table" style="width:100%;border-collapse:collapse">
                <thead style="background:#f1f5f9">
                    <tr>
                        <th style="padding:12px;text-align:left;font-weight:600;color:#1f2937">Layanan</th>
                        <th style="padding:12px;text-align:left;font-weight:600;color:#1f2937">Jadwal</th>
                        <th style="padding:12px;text-align:left;font-weight:600;color:#1f2937">Dokter</th>
                        <th style="padding:12px;text-align:left;font-weight:600;color:#1f2937">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="border-bottom:1px solid #e5e7eb">
                        <td style="padding:12px;color:#374151">Konsultasi Umum</td>
                        <td style="padding:12px;color:#6b7280">Senin - Jumat</td>
                        <td style="padding:12px;color:#6b7280">Dr. Veteriner</td>
                        <td style="padding:12px;color:#059669;font-weight:600">Tersedia</td>
                    </tr>
                    <tr style="border-bottom:1px solid #e5e7eb">
                        <td style="padding:12px;color:#374151">Operasi</td>
                        <td style="padding:12px;color:#6b7280">Selasa, Kamis</td>
                        <td style="padding:12px;color:#6b7280">Dr. Spesialis</td>
                        <td style="padding:12px;color:#059669;font-weight:600">Tersedia</td>
                    </tr>
                    <tr style="border-bottom:1px solid #e5e7eb">
                        <td style="padding:12px;color:#374151">Vaksinasi</td>
                        <td style="padding:12px;color:#6b7280">Setiap Hari</td>
                        <td style="padding:12px;color:#6b7280">Dr. Veteriner</td>
                        <td style="padding:12px;color:#059669;font-weight:600">Tersedia</td>
                    </tr>
                    <tr>
                        <td style="padding:12px;color:#374151">Perawatan</td>
                        <td style="padding:12px;color:#6b7280">Senin - Sabtu</td>
                        <td style="padding:12px;color:#6b7280">Perawat</td>
                        <td style="padding:12px;color:#059669;font-weight:600">Tersedia</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    {{-- News Section --}}
    <section class="news-section" style="margin-bottom:2rem">
        <div class="container-content-berita" style="text-align:center;margin-bottom:1.5rem">
            <h2 class="h1-content-berita" style="color:#2463d6;font-size:1.75rem;margin-bottom:0.5rem">Berita Terbaru</h2>
            <h3 class="h2-content-berita" style="color:#6b7280;font-size:1rem;font-weight:400">RSHP Latest News</h3>
        </div>

        <div class="container-content-berita-1" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:1.5rem;margin-top:1.5rem">
            <article class="news-item" style="background:#fff;border-radius:8px;overflow:hidden;box-shadow:0 2px 8px rgba(0,0,0,0.06)">
                <img src="{{ asset('assets/img/berita1.png') }}" alt="Berita 1" class="img-content-berita" style="width:100%;height:200px;object-fit:cover;display:block">
                <div style="padding:1rem">
                    <h4 style="font-size:1rem;color:#1f2937;margin-bottom:0.5rem">Berita RSHP 1</h4>
                    <p style="font-size:0.875rem;color:#6b7280">Informasi terbaru seputar layanan RSHP</p>
                </div>
            </article>
            <article class="news-item" style="background:#fff;border-radius:8px;overflow:hidden;box-shadow:0 2px 8px rgba(0,0,0,0.06)">
                <img src="{{ asset('assets/img/berita2.png') }}" alt="Berita 2" class="img-content-berita" style="width:100%;height:200px;object-fit:cover;display:block">
                <div style="padding:1rem">
                    <h4 style="font-size:1rem;color:#1f2937;margin-bottom:0.5rem">Berita RSHP 2</h4>
                    <p style="font-size:0.875rem;color:#6b7280">Update kegiatan dan program RSHP</p>
                </div>
            </article>
            <article class="news-item" style="background:#fff;border-radius:8px;overflow:hidden;box-shadow:0 2px 8px rgba(0,0,0,0.06)">
                <img src="{{ asset('assets/img/berita3.png') }}" alt="Berita 3" class="img-content-berita" style="width:100%;height:200px;object-fit:cover;display:block">
                <div style="padding:1rem">
                    <h4 style="font-size:1rem;color:#1f2937;margin-bottom:0.5rem">Berita RSHP 3</h4>
                    <p style="font-size:0.875rem;color:#6b7280">Pengumuman dan event RSHP terbaru</p>
                </div>
            </article>
        </div>
    </section>
@endsection
