@extends('layouts.app')

@section('title', 'Layanan - RSHP')

@section('content')
    <main class="container" style="padding:2rem 0">
        <div style="text-align:center;margin-bottom:2rem">
            <h2 style="color:#2463d6;font-size:2rem;margin-bottom:0.5rem">Layanan RSHP</h2>
            <p style="color:#6b7280">Pelayanan Kesehatan Hewan Terpadu dan Profesional</p>
        </div>

        {{-- Grid Layout for Services --}}
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:1.5rem;margin-top:2rem">
            
            {{-- Card 1: Konsultasi Umum --}}
            <div style="background:#fff;border-radius:12px;overflow:hidden;box-shadow:0 4px 12px rgba(0,0,0,0.08);transition:transform 0.2s">
                <img src="{{ asset('assets/img/layanan1.png') }}" alt="Konsultasi Umum" style="width:100%;height:200px;object-fit:cover;object-position:center;display:block">
                <div style="padding:1.25rem">
                    <h3 style="color:#1f2937;font-size:1.125rem;margin-bottom:0.5rem;font-weight:600">Konsultasi Umum</h3>
                    <p style="color:#2463d6;font-weight:500;margin-bottom:0.5rem">📅 Senin - Jumat</p>
                    <p style="color:#6b7280;font-size:0.875rem;margin-bottom:0.25rem">👨‍⚕️ Dr. Veteriner</p>
                    <p style="color:#059669;font-size:0.875rem;font-weight:600">✓ Tersedia</p>
                </div>
            </div>

            {{-- Card 2: Operasi --}}
            <div style="background:#fff;border-radius:12px;overflow:hidden;box-shadow:0 4px 12px rgba(0,0,0,0.08);transition:transform 0.2s">
                <img src="{{ asset('assets/img/layanan2.png') }}" alt="Operasi" style="width:100%;height:200px;object-fit:cover;object-position:center;display:block">
                <div style="padding:1.25rem">
                    <h3 style="color:#1f2937;font-size:1.125rem;margin-bottom:0.5rem;font-weight:600">Operasi</h3>
                    <p style="color:#2463d6;font-weight:500;margin-bottom:0.5rem">📅 Selasa, Kamis</p>
                    <p style="color:#6b7280;font-size:0.875rem;margin-bottom:0.25rem">👨‍⚕️ Dr. Spesialis Bedah</p>
                    <p style="color:#059669;font-size:0.875rem;font-weight:600">✓ Tersedia</p>
                </div>
            </div>

            {{-- Card 3: Rawat Inap --}}
            <div style="background:#fff;border-radius:12px;overflow:hidden;box-shadow:0 4px 12px rgba(0,0,0,0.08);transition:transform 0.2s">
                <img src="{{ asset('assets/img/layanan3.png') }}" alt="Rawat Inap" style="width:100%;height:200px;object-fit:cover;object-position:center;display:block">
                <div style="padding:1.25rem">
                    <h3 style="color:#1f2937;font-size:1.125rem;margin-bottom:0.5rem;font-weight:600">Rawat Inap</h3>
                    <p style="color:#2463d6;font-weight:500;margin-bottom:0.5rem">📅 24 Jam</p>
                    <p style="color:#6b7280;font-size:0.875rem;margin-bottom:0.25rem">Fasilitas perawatan intensif hewan</p>
                    <p style="color:#059669;font-size:0.875rem;font-weight:600">✓ Tersedia</p>
                </div>
            </div>

            {{-- Card 4: Vaksinasi --}}
            <div style="background:#fff;border-radius:12px;overflow:hidden;box-shadow:0 4px 12px rgba(0,0,0,0.08);transition:transform 0.2s">
                <img src="{{ asset('assets/img/layanan4.png') }}" alt="Vaksinasi" style="width:100%;height:200px;object-fit:cover;object-position: center;display:block">
                <div style="padding:1.25rem">
                    <h3 style="color:#1f2937;font-size:1.125rem;margin-bottom:0.5rem;font-weight:600">Vaksinasi</h3>
                    <p style="color:#2463d6;font-weight:500;margin-bottom:0.5rem">📅 Setiap Hari</p>
                    <p style="color:#6b7280;font-size:0.875rem;margin-bottom:0.25rem">👨‍⚕️ Dr. Veteriner</p>
                    <p style="color:#059669;font-size:0.875rem;font-weight:600">✓ Tersedia</p>
                </div>
            </div>

            {{-- Card 5: Grooming --}}
            <div style="background:#fff;border-radius:12px;overflow:hidden;box-shadow:0 4px 12px rgba(0,0,0,0.08);transition:transform 0.2s">
                <img src="{{ asset('assets/img/layanan5.png') }}" alt="Grooming" style="width:100%;height:200px;object-fit:cover;object-position:center;display:block">
                <div style="padding:1.25rem">
                    <h3 style="color:#1f2937;font-size:1.125rem;margin-bottom:0.5rem;font-weight:600">Grooming</h3>
                    <p style="color:#2463d6;font-weight:500;margin-bottom:0.5rem">📅 Senin - Sabtu</p>
                    <p style="color:#6b7280;font-size:0.875rem;margin-bottom:0.25rem">Perawatan dan kebersihan hewan</p>
                    <p style="color:#059669;font-size:0.875rem;font-weight:600">✓ Tersedia</p>
                </div>
            </div>

            {{-- Card 6: Pemeriksaan Lab --}}
            <div style="background:#fff;border-radius:12px;overflow:hidden;box-shadow:0 4px 12px rgba(0,0,0,0.08);transition:transform 0.2s">
                <img src="{{ asset('assets/img/layanan6.png') }}" alt="Pemeriksaan Lab" style="width:100%;height:200px;object-fit:cover;object-position:center;display:block">
                <div style="padding:1.25rem">
                    <h3 style="color:#1f2937;font-size:1.125rem;margin-bottom:0.5rem;font-weight:600">Pemeriksaan Lab</h3>
                    <p style="color:#2463d6;font-weight:500;margin-bottom:0.5rem">📅 Senin - Jumat</p>
                    <p style="color:#6b7280;font-size:0.875rem;margin-bottom:0.25rem">Tes darah, urine, feses, dan lainnya</p>
                    <p style="color:#059669;font-size:0.875rem;font-weight:600">✓ Tersedia</p>
                </div>
            </div>

        </div>
    </main>
@endsection