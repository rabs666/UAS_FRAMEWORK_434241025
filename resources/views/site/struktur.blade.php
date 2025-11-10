@extends('layouts.app')

@section('title', 'Struktur Organisasi - RSHP')

@section('content')
    <main class="container" style="padding:2rem 0">
        <div style="text-align:center;margin-bottom:2rem">
            <h2 style="color:#2463d6;font-size:2rem;margin-bottom:0.5rem">Struktur Organisasi</h2>
            <p style="color:#6b7280">Tim Manajemen Rumah Sakit Hewan Pendidikan UNAIR</p>
        </div>

        {{-- Grid Layout for Organization Structure --}}
        <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:1.5rem;margin-top:2rem">
            
            {{-- Card 1: Direktur --}}
            <div style="background:#fff;border-radius:12px;overflow:hidden;box-shadow:0 4px 12px rgba(0,0,0,0.08);transition:transform 0.2s">
                <img src="{{ asset('assets/img/struktur1.png') }}" alt="Direktur RSHP" style="width:100%;height:300px;object-fit:cover;object-position:center top;display:block">
                <div style="padding:1.25rem">
                    <h3 style="color:#1f2937;font-size:1.125rem;margin-bottom:0.5rem;font-weight:600">Dr. John Doe</h3>
                    <p style="color:#2463d6;font-weight:500;margin-bottom:0.25rem">Direktur RSHP</p>
                    <p style="color:#6b7280;font-size:0.875rem">Memimpin operasional dan strategi RSHP</p>
                </div>
            </div>

            {{-- Card 2: Wakil Direktur --}}
            <div style="background:#fff;border-radius:12px;overflow:hidden;box-shadow:0 4px 12px rgba(0,0,0,0.08);transition:transform 0.2s">
                <img src="{{ asset('assets/img/struktur2.png') }}" alt="Wakil Direktur" style="width:100%;height:300px;object-fit:cover;object-position:center top;display:block">
                <div style="padding:1.25rem">
                    <h3 style="color:#1f2937;font-size:1.125rem;margin-bottom:0.5rem;font-weight:600">Dr. Jade Smith</h3>
                    <p style="color:#2463d6;font-weight:500;margin-bottom:0.25rem">Wakil Direktur</p>
                    <p style="color:#6b7280;font-size:0.875rem">Koordinasi program dan kebijakan</p>
                </div>
            </div>

            {{-- Card 3: Kepala Klinik --}}
            <div style="background:#fff;border-radius:12px;overflow:hidden;box-shadow:0 4px 12px rgba(0,0,0,0.08);transition:transform 0.2s">
                <img src="{{ asset('assets/img/struktur3.png') }}" alt="Kepala Klinik" style="width:100%;height:300px;object-fit:cover;object-position:center top;display:block">
                <div style="padding:1.25rem">
                    <h3 style="color:#1f2937;font-size:1.125rem;margin-bottom:0.5rem;font-weight:600">Dr. Emily White</h3>
                    <p style="color:#2463d6;font-weight:500;margin-bottom:0.25rem">Kepala Klinik</p>
                    <p style="color:#6b7280;font-size:0.875rem">Mengawasi layanan medis hewan</p>
                </div>
            </div>

            {{-- Card 4: Departemen Medis --}}
            <div style="background:#fff;border-radius:12px;overflow:hidden;box-shadow:0 4px 12px rgba(0,0,0,0.08);transition:transform 0.2s">
                <img src="{{ asset('assets/img/struktur4.png') }}" alt="Departemen Medis" style="width:100%;height:300px;object-fit:cover;object-position:center top;display:block">
                <div style="padding:1.25rem">
                    <h3 style="color:#1f2937;font-size:1.125rem;margin-bottom:0.5rem;font-weight:600">Dr. Alice Johnson</h3>
                    <p style="color:#2463d6;font-weight:500;margin-bottom:0.25rem">Kepala Departemen Medis</p>
                    <p style="color:#6b7280;font-size:0.875rem">Pengelolaan tim medis dan perawatan</p>
                </div>
            </div>

            {{-- Card 5: Departemen Administrasi 1 --}}
            <div style="background:#fff;border-radius:12px;overflow:hidden;box-shadow:0 4px 12px rgba(0,0,0,0.08);transition:transform 0.2s">
                <img src="{{ asset('assets/img/struktur5.png') }}" alt="Departemen Administrasi" style="width:100%;height:300px;object-fit:cover;object-position:center top;display:block">
                <div style="padding:1.25rem">
                    <h3 style="color:#1f2937;font-size:1.125rem;margin-bottom:0.5rem;font-weight:600">Mr. Bob Brown</h3>
                    <p style="color:#2463d6;font-weight:500;margin-bottom:0.25rem">Kepala Administrasi</p>
                    <p style="color:#6b7280;font-size:0.875rem">Mengelola administrasi dan keuangan</p>
                </div>
            </div>

            {{-- Card 6: Departemen Administrasi 2 --}}
            <div style="background:#fff;border-radius:12px;overflow:hidden;box-shadow:0 4px 12px rgba(0,0,0,0.08);transition:transform 0.2s">
                <img src="{{ asset('assets/img/struktur6.png') }}" alt="Departemen Administrasi" style="width:100%;height:300px;object-fit:cover;object-position:center top;display:block">
                <div style="padding:1.25rem">
                    <h3 style="color:#1f2937;font-size:1.125rem;margin-bottom:0.5rem;font-weight:600">Mrs. Judy Maxine</h3>
                    <p style="color:#2463d6;font-weight:500;margin-bottom:0.25rem">Manajer Operasional</p>
                    <p style="color:#6b7280;font-size:0.875rem">Koordinasi operasional harian</p>
                </div>
            </div>

            {{-- Card 7: Kepala Laboratorium --}}
            <div style="background:#fff;border-radius:12px;overflow:hidden;box-shadow:0 4px 12px rgba(0,0,0,0.08);transition:transform 0.2s">
                <img src="{{ asset('assets/img/struktur7.png') }}" alt="Kepala Laboratorium" style="width:100%;height:300px;object-fit:cover;object-position:center top;display:block">
                <div style="padding:1.25rem">
                    <h3 style="color:#1f2937;font-size:1.125rem;margin-bottom:0.5rem;font-weight:600">Dr. Michael Jackie</h3>
                    <p style="color:#2463d6;font-weight:500;margin-bottom:0.25rem">Kepala Laboratorium</p>
                    <p style="color:#6b7280;font-size:0.875rem">Pengelolaan lab dan diagnostik</p>
                </div>
            </div>

            {{-- Card 8: Kepala Farmasi --}}
            <div style="background:#fff;border-radius:12px;overflow:hidden;box-shadow:0 4px 12px rgba(0,0,0,0.08);transition:transform 0.2s">
                <img src="{{ asset('assets/img/struktur8.png') }}" alt="Kepala Farmasi" style="width:100%;height:300px;object-fit:cover;object-position:center top;display:block">
                <div style="padding:1.25rem">
                    <h3 style="color:#1f2937;font-size:1.125rem;margin-bottom:0.5rem;font-weight:600">Apt. GeorgeMartinez</h3>
                    <p style="color:#2463d6;font-weight:500;margin-bottom:0.25rem">Kepala Farmasi</p>
                    <p style="color:#6b7280;font-size:0.875rem">Pengelolaan obat dan apotek</p>
                </div>
            </div>

            {{-- Card 9: Koordinator Perawatan --}}
            <div style="background:#fff;border-radius:12px;overflow:hidden;box-shadow:0 4px 12px rgba(0,0,0,0.08);transition:transform 0.2s">
                <img src="{{ asset('assets/img/struktur9.png') }}" alt="Koordinator Perawatan" style="width:100%;height:300px;object-fit:cover;object-position:center top;display:block">
                <div style="padding:1.25rem">
                    <h3 style="color:#1f2937;font-size:1.125rem;margin-bottom:0.5rem;font-weight:600">Ns. Linda Garcia</h3>
                    <p style="color:#2463d6;font-weight:500;margin-bottom:0.25rem">Koordinator Perawatan</p>
                    <p style="color:#6b7280;font-size:0.875rem">Supervisi tim perawat dan staf</p>
                </div>
            </div>

            {{-- Card 10: Manajer Keuangan --}}
            <div style="background:#fff;border-radius:12px;overflow:hidden;box-shadow:0 4px 12px rgba(0,0,0,0.08);transition:transform 0.2s">
                <img src="{{ asset('assets/img/struktur10.png') }}" alt="Manajer Keuangan" style="width:100%;height:300px;object-fit:cover;object-position:center top;display:block">
                <div style="padding:1.25rem">
                    <h3 style="color:#1f2937;font-size:1.125rem;margin-bottom:0.5rem;font-weight:600">Mrs. Joana Lee</h3>
                    <p style="color:#2463d6;font-weight:500;margin-bottom:0.25rem">Manajer Keuangan</p>
                    <p style="color:#6b7280;font-size:0.875rem">Pengelolaan anggaran dan keuangan</p>
                </div>
            </div>

        </div>
    </main>
@endsection