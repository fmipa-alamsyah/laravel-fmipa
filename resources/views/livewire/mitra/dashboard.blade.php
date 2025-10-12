@section('mt-dashboard', 'active')

<div>
    {{-- content livewire. --}}

    <div class="row mb-3">
        <div class="col-sm-12">
            <div class="callout callout-success pb-1">
                <p class="text-dark">Jika terdapat kendala-kendala harap hubungi administrator. Kontak WA Akhmad Futukillah F.A. - 0858-0677-3755.</p>
                <span class="text-dark">Rekomendasi untuk Kenyamanan Penggunaan:</span>
                <ul class="text-dark">
                    <li>Browser - Google Chrome, Mozila Firefox, atau Microsoft Edge.</li>
                    <li>Ukuran layar - Minimal 15 inci dengan resolusi 1080 piksel.</li>
                </ul>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="callout callout-success">
                <span class="text-dark">Tata Cara Pendaftaran & Pengujian Material di laboratorium FMIPA Universitas Indonesia</span>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card card-outline card-success">
                <div class="card-body">
                    <span class="text-dark">
                        1. Anda harus melakukan registrasi & pendaftaran.
                    </span>
                </div>
                <div class="card-footer">
                    <span class="badge bg-danger badge-custom">Belum Disetujui</span>
                    <span class="badge bg-success badge-custom">Sudah Disetujui</span>
                </div>
                {{-- card-body --}}
            </div>
            {{-- card --}}
        </div>
        {{-- col --}}

        <div class="col-sm-4">
            <div class="card card-outline card-success">
                <div class="card-body">
                    <span class="text-dark">
                        2. Anda harus mengirimkan sampel ke fakultas FMIPA UI.
                        Pastikan jenis sampel sesuai dengan pengujian materialnya.
                    </span>
                </div>
                <div class="card-footer">
                    <span class="badge bg-danger badge-custom">Belum Dikirim</span>
                    <span class="badge bg-success badge-custom">Sudah Dikirm</span>
                </div>
                {{-- card-body --}}
            </div>
            {{-- card --}}
        </div>
        {{-- col --}}

        <div class="col-sm-4">
            <div class="card card-outline card-success">
                <div class="card-body">
                    <span class="text-dark">
                        3. Teknisi laboran akan melakukan pengujian material sesuai dengan permintaan Anda.
                    </span>
                </div>
                <div class="card-footer">
                    <span class="badge bg-danger badge-custom">Belum Selesai</span>
                    <span class="badge bg-success badge-custom">Sudah Selesai</span>
                </div>
                {{-- card-body --}}
            </div>
            {{-- card --}}
        </div>
        {{-- col --}}

        <div class="col-sm-4">
            <div class="card card-outline card-success">
                <div class="card-body">
                    <span class="text-dark">
                        4. Tenaga Ahli akan memverifikasi hasil pengujian tersebut.
                    </span>
                </div>
                <div class="card-footer">
                    <span class="badge bg-danger badge-custom">Belum Diverifikasi</span>
                    <span class="badge bg-success badge-custom">Sudah Diverifikasi</span>
                </div>
                {{-- card-body --}}
            </div>
            {{-- card --}}
        </div>
        {{-- col --}}

        <div class="col-sm-4">
            <div class="card card-outline card-success">
                <div class="card-body">
                    <span class="text-dark">
                        5. Anda akan diberikan invoice berdasarkan jumlah sampel yang dikirimkan, diujikan, dan <strong>ditambah ppn</strong>.
                    </span>
                </div>
                <div class="card-footer">
                    <span class="badge bg-danger badge-custom">Belum Diberikan</span>
                    <span class="badge bg-success badge-custom">Sudah Diberikan</span>
                </div>
                {{-- card-body --}}
            </div>
            {{-- card --}}
        </div>
        {{-- col --}}

        <div class="col-sm-4">
            <div class="card card-outline card-success">
                <div class="card-body">
                    <span class="text-dark">
                        6. Proses Pembayaran melalui transfer bank ke rekening Universitas Indonesia. Adapun nomor rekening tersedia pada tagihan invoice.
                    </span>
                </div>
                <div class="card-footer">
                    <span class="badge bg-danger badge-custom">Belum Dibayar</span>
                    <span class="badge bg-success badge-custom">Sudah Dibayar</span>
                </div>
                {{-- card-body --}}
            </div>
            {{-- card --}}
        </div>
        {{-- col --}}

        <div class="col-sm-4">
            <div class="card card-outline card-success">
                <div class="card-body">
                    <span class="text-dark">
                        7. Jika anda sudah melakukan pembayaran maka kami akan memberikan bukti kwitansi pembyaran.
                    </span>
                </div>
                <div class="card-footer">
                    <span class="badge bg-danger badge-custom">Belum Diberikan</span>
                    <span class="badge bg-success badge-custom">Sudah Diberikan</span>
                </div>
                {{-- card-body --}}
            </div>
            {{-- card --}}
        </div>
        {{-- col --}}

        <div class="col-sm-4">
            <div class="card card-outline card-success">
                <div class="card-body">
                    <span class="text-dark">
                        8. Anda dapat mengunduh hasil pengujian melalui sistem ini.
                    </span>
                </div>
                <div class="card-footer"></div>
                {{-- card-body --}}
            </div>
            {{-- card --}}
        </div>
        {{-- col --}}
    </div>
    {{-- row --}}

    <div class="row">
        <div class="col-sm-12">
            <div class="callout callout-success">
                <span class="text-dark">Informasi Umum Pengujian Material di LST FMIPA UI</span>
            </div>
        </div>
        {{-- /.col --}}

        @foreach($data as $key => $item)
        <div class="col-sm-6">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <span class="text-dark">
                        <strong>{{ $item->nama_pengujian }} + {{ $item->jenis_pengujian }}</strong>
                    </span>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <span class="text-dark"><strong>Deskripsi Singkat.</strong></span>
                    <p class="card-text" style="text-align:justify;">
                        {{ $item->deskripsi_pengujian }}
                    </p>

                    <span class="text-dark"><strong>Alat Pengujian</strong></span>
                    <p class="card-text">
                        {{ $item->alat_pengujian }}
                    </p>

                    <span class="text-dark"><strong>Metode Pengujian</strong></span>
                    <p class="card-text" style="text-align:justify;">
                        {{ $item->metode_pengujian }}
                    </p>

                    <span class="text-dark"><strong>Jenis Sampel</strong></span>
                    <p class="card-text">{{ $item->keterangan_sampel }}</p>
                    <a wire:navigate href="{{ route('mitra.pengujian-material.index') }}" class="btn btn-block btn-outline-info">
                        <i class="fa-solid fa-clone mr-1"></i> Daftar Sekarang
                    </a>
                </div>
                <div class="card-footer">
                    <span class="text-danger">Biaya pengujian {{ formatRupiah($item->biaya_pengujian)}} persampel (Mahasiswa disc. 50%)</span>
                </div>
            </div>
        </div>
        {{-- /.col --}}
        @endforeach

    </div>
    {{-- /.row --}}

    {{-- content livewire. --}}
</div>