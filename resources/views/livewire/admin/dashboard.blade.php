@section('adm-dashboard', 'active')

<div>
    {{-- content livewire. --}}

    {{-- Total Pemasukan --}}
    <div class="row mb-4">
        <div class="col-sm-12">
            <div class="callout callout-success">
                <span class="text-dark">
                    <i class="fa-solid fa-book mr-2"></i>Informasi Pemasukan LST FMIPA Univ.Indonesia
                </span>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ formatRupiah($total_pemasukan) }}</h3>
                    <p class="text-light">Total Pemasukan</p>
                </div>
                <div class="icon"><i class="fa-solid fa-chart-simple"></i></div>
            </div>
        </div>
        {{-- /.col --}}
    </div>
    {{-- /.row --}}

    {{-- Informasi Umum Aplikasi --}}
    <div class="row mb-4">
        <div class="col-sm-12">
            <div class="callout callout-success">
                <span class="text-dark"><i class="fa-solid fa-book mr-2"></i>Informasi Umum Aplikasi</span>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $pegawai['tenaga_ahli'] ?? 0 }}</h3>
                    <p class="text-light">Tenaga Ahli</p>
                </div>
                <div class="icon"><i class="fa-solid fa-user-graduate"></i></div>
                <a wire:navigate href="{{ route('admin.pegawai.index') }}" class="small-box-footer"><i
                        class="fa-solid fa-clone mr-1"></i> Selengkapnya</a>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $pegawai['teknisi_laboran'] ?? 0 }}</h3>
                    <p class="text-light">Teknisi Laboran</p>
                </div>
                <div class="icon"><i class="fa-solid fa-user-graduate"></i></div>
                <a wire:navigate href="{{ route('admin.pegawai.index') }}" class="small-box-footer"><i
                        class="fa-solid fa-clone mr-1"></i> Selengkapnya</a>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $mitra }}</h3>
                    <p class="text-light">Institusi & Mitra</p>
                </div>
                <div class="icon"><i class="fa-solid fa-building-columns"></i></div>
                <a wire:navigate href="{{ route('admin.mitra.index') }}" class="small-box-footer">
                    <i class="fa-solid fa-clone mr-1"></i> Selengkapnya
                </a>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $jenis_pengujian }}</h3>
                    <p class="text-light">Jenis Pengujian</p>
                </div>
                <div class="icon"><i class="fa-solid fa-flask"></i></div>
                <a wire:navigate href="{{ route('admin.jenis-pengujian.index') }}" class="small-box-footer"><i
                        class="fa-solid fa-clone mr-1"></i> Selengkapnya</a>
            </div>
        </div>
        {{-- /.col --}}
    </div>
    {{-- /.row --}}

    {{-- Informasi Hasil Pengujian --}}
    <div class="row mb-4">
        <div class="col-sm-12">
            <div class="callout callout-success">
                <span class="text-dark"><i class="fa-solid fa-book mr-2"></i>Informasi Hasil Pengujian</span>
            </div>
        </div>
        @foreach ($hasil_pengujian as $key => $item)
        <div class="col-sm-3">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $item->jumlah }}</h3>
                    <p>{{ $item->nama_pengujian }}</p>
                </div>
                <div class="icon"><i class="fa-solid fa-book"></i></div>
                <a wire:navigate href="{{ route('admin.hasil-pengujian.index') }}" class="small-box-footer"><i
                        class="fa-solid fa-clone mr-1"></i> Selengkapnya</a>
            </div>
        </div>
        @endforeach
        {{-- /.col --}}
    </div>
    {{-- /.row --}}

    {{-- Rekapitulasi Verifikasi Hasil Pengujian --}}
    <div class="row mb-4">
        <div class="col-sm-12">
            <div class="callout callout-success">
                <span class="text-dark"><i class="fa-solid fa-book mr-2"></i>Rekapitulasi Verifikasi Hasil
                    Pengujian</span>
            </div>
        </div>
        {{-- /.col --}}

        <div class="col-sm-9">
            <div class="card card-success card-outline">
                <div class="card-body table-responsive p-0">
                    <table class="table table-bordered table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th class="text-left">Nama Pengujian</th>
                                <th class="text-center">Sudah Diverifikasi</th>
                                <th class="text-center">Belum Diverifikasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($status_verifikasi as $item)
                            <tr>
                                <td class="text-left">{{ $item->nama_pengujian }} + {{ $item->jenis_pengujian }}
                                </td>
                                <td class="text-center">{{ number_format($item->sudah_diverifikasi ?? 0) }}</td>
                                <td class="text-center">{{ number_format($item->belum_diverifikasi ?? 0) }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td class="text-left font-weight-bold">Jumlah Data</td>
                                <td class="text-center font-weight-bold">
                                    {{ number_format($status_verifikasi->sum('sudah_diverifikasi')) }}
                                </td>
                                <td class="text-center font-weight-bold">
                                    {{ number_format($status_verifikasi->sum('belum_diverifikasi')) }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <small class="text-danger">Pembaharuan data di tanggal {{ date('Y-m-d') }} pukul
                        {{ date('H:i') }} WIB</small>
                </div>
                {{-- /.card-footer --}}
            </div>
            {{-- /.card --}}
        </div>
        {{-- /.col --}}

        <div class="col-sm-3">
            <div class="info-box bg-success">
                <span class="info-box-icon"><i class="fa-solid fa-check"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Sudah Diverifikasi</span>
                    <span class="info-box-number">{{ $status_verifikasi->sum('sudah_diverifikasi') }}</span>
                </div>
                <span class="info-box-icon"><i class="fa-solid fa-microscope"></i></span>
            </div>
            <div class="info-box bg-danger">
                <span class="info-box-icon"><i class="fa-solid fa-xmark"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Belum Diverifikasi</span>
                    <span class="info-box-number">{{ $status_verifikasi->sum('belum_diverifikasi') }}</span>
                </div>
                <span class="info-box-icon"><i class="fa-solid fa-microscope"></i></span>
            </div>
            {{-- /.info-box --}}
        </div>
        {{-- /.col --}}
    </div>
    {{-- /.row --}}

    {{-- Rekapitulasi Status Hasil Pengujian --}}
    <div class="row">
        <div class="col-sm-12">
            <div class="callout callout-success">
                <span class="text-dark"><i class="fa-solid fa-book mr-2"></i>Rekapitulasi Status Hasil
                    Pengujian</span>
            </div>
        </div>

        <div class="col-sm-9">
            <div class="card card-success card-outline">
                <div class="card-body table-responsive p-0">
                    <table class="table table-bordered table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th class="text-left">Nama Pengujian</th>
                                <th class="text-center">Sudah Selesai</th>
                                <th class="text-center">Belum Selesai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($status_pengujian as $item)
                            <tr>
                                <td class="text-left">{{ $item->nama_pengujian }} + {{ $item->jenis_pengujian }}
                                </td>
                                <td class="text-center">{{ number_format($item->sudah_selesai ?? 0) }}</td>
                                <td class="text-center">{{ number_format($item->belum_selesai ?? 0) }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td class="text-left font-weight-bold">Jumlah Data</td>
                                <td class="text-center font-weight-bold">
                                    {{ number_format($status_pengujian->sum('sudah_selesai')) }}
                                </td>
                                <td class="text-center font-weight-bold">
                                    {{ number_format($status_pengujian->sum('belum_selesai')) }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <small class="text-danger">Pembaharuan data di tanggal {{ date('Y-m-d') }} pukul
                        {{ date('H:i') }} WIB</small>
                </div>
                {{-- /.card-footer --}}
            </div>
            {{-- /.card --}}
        </div>
        {{-- /.col --}}

        <div class="col-sm-3">
            <div class="info-box bg-success">
                <span class="info-box-icon"><i class="fa-solid fa-check"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Sudah Selesai</span>
                    <span class="info-box-number">{{ $status_pengujian->sum('sudah_selesai') }}</span>
                </div>
                <span class="info-box-icon"><i class="fa-solid fa-flask"></i></span>
            </div>
            <div class="info-box bg-danger">
                <span class="info-box-icon"><i class="fa-solid fa-xmark"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Belum Selesai</span>
                    <span class="info-box-number">{{ $status_pengujian->sum('belum_selesai') }}</span>
                </div>
                <span class="info-box-icon"><i class="fa-solid fa-flask"></i></span>
            </div>
            {{-- /.info-box --}}
        </div>
        {{-- /.col --}}
    </div>
    {{-- /.row --}}

    {{-- content livewire. --}}
</div>