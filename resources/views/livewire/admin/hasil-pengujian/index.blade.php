@section('adm-hasil-pengujian', 'active')

<div>
    {{-- content livewire. --}}

    <div class="row">
        <div class="col-sm-12">
            <div class="callout callout-success">
                <span class="text-dark">Hasil Pengujian Material</span>
            </div>
        </div>
        {{-- /.col --}}
    </div>
    {{-- /.row --}}

    @if (session()->has('message'))
    <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <span class="text-light">{{ session('message') }}</span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        {{-- /.col --}}
    </div>
    {{-- /.row --}}
    @endif

    <div class="row">
        <div class="col-sm-12">
            <div class="card card-outline card-success">
                <div class="card-header border-bottom-0 p-0">
                    <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="status-pendaftaran-tab" data-toggle="pill" href="#status-pendaftaran" role="tab" aria-controls="status-pendaftaran" aria-selected="true">Status Pendaftaran</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="status-sampel-tab" data-toggle="pill" href="#status-sampel" role="tab" aria-controls="status-sampel" aria-selected="false">Status Sampel</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="status-verifikasi-tab" data-toggle="pill" href="#status-verifikasi" role="tab" aria-controls="status-verifikasi" aria-selected="false">Status Verifikasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="status-pengujian-tab" data-toggle="pill" href="#status-pengujian" role="tab" aria-controls="status-pengujian" aria-selected="false">Status Pengujian</a>
                        </li>
						<li class="nav-item">
                            <a class="nav-link" id="status-invoice-tab" data-toggle="pill" href="#status-invoice" role="tab" aria-controls="status-invoice" aria-selected="false">Status Invoice</a>
                        </li>
						<li class="nav-item">
                            <a class="nav-link" id="status-pembayaran-tab" data-toggle="pill" href="#status-pembayaran" role="tab" aria-controls="status-pembayaran" aria-selected="false">Status Pembayaran</a>
                        </li>
						<li class="nav-item">
                            <a class="nav-link" id="status-kwitansi-tab" data-toggle="pill" href="#status-kwitansi" role="tab" aria-controls="status-kwitansi" aria-selected="false">Status Kwitansi</a>
                        </li>
                    </ul>
                </div>
                {{-- /.card-header --}}
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-three-tabContent">
                        <div class="tab-pane fade show active" id="status-pendaftaran" role="tabpanel" aria-labelledby="status-pendaftaran-tab">
                            <button wire:click="filterBy('status_pendaftaran', 'Sudah Disetujui')" type="button" class="btn btn-outline-success">
                                Sudah Disetujui
                                <span class="badge bg-info badge-custom ml-1">{{ number_format($jumlah_status_pendaftaran['sudah_disetujui'] ?? 0) }}</span>
                            </button>
                            <button wire:click="filterBy('status_pendaftaran', 'Belum Disetujui')" type="button" class="btn btn-outline-danger">
                                Belum Disetujui
                                <span class="badge bg-info badge-custom ml-1">{{ number_format($jumlah_status_pendaftaran['belum_disetujui'] ?? 0) }}</span>
                            </button>
                        </div>
                        <div class="tab-pane fade" id="status-sampel" role="tabpanel" aria-labelledby="status-sampel-tab">
                            Status Sampel
                        </div>
                        <div class="tab-pane fade" id="status-verifikasi" role="tabpanel" aria-labelledby="status-verifikasi-tab">
                            Status Verifikasi
                        </div>
                        <div class="tab-pane fade" id="status-pengujian" role="tabpanel" aria-labelledby="status-pengujian-tab">
                            Status Pengujian
                        </div>
                        <div class="tab-pane fade" id="status-invoice" role="tabpanel" aria-labelledby="status-invoice-tab">
                            Status Invoice
                        </div>
						<div class="tab-pane fade" id="status-pembayaran" role="tabpanel" aria-labelledby="status-pembayaran-tab">
                            Status Pembayaran
                        </div>
						<div class="tab-pane fade" id="status-kwitansi" role="tabpanel" aria-labelledby="status-kwitansi-tab">
                            Status Kwitansi
                        </div>
                    </div>
                </div>
                {{-- /.card-body --}}
            </div>
            {{-- /.card-success --}}
        </div>
        {{-- /.col-sm --}}
    </div>
    {{-- /.row --}}

    <div class="row">
        <div class="col-sm-12">
            <div class="card card-outline card-success">

                <div class="card-header">
                    <div class="mt-2 mb-2">
                        <a wire:navigate href="{{ route('admin.hasil-pengujian.create') }}" class="btn btn-outline-success">Tambah Data</a>
                    </div>
                </div>
                {{-- /.card-header --}}

                <div class="card-body table-responsive">

                    <div class="row mb-3">
                        <div class="col-sm-1">
                            <select wire:model.live="paginate" class="form-control form-control-border border-success border-width-2" id="paginate">
                                <option value="10">10</option>    
                                <option value="25">25</option>
                                <option value="50">50</option>
                            </select>
                        </div>
                        <div class="col-sm-11">
                            <input wire:model.live.debounce.500ms="search" type="text" class="form-control form-control-border border-success border-width-2" id="search" placeholder="Pencarian data berdasarkan nama mitra, nama institusi, nama pengujian, jenis pengujian">
                        </div>
                        {{-- /.col --}}
                    </div>
                    {{-- /.row --}}

                    <div class="row mb-3">
                        <div class="col-sm-12">
                            <table class="table table-bordered table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th rowspan="2">#</th>
                                        <th rowspan="2">Aksi</th>


                                        <th colspan="6" class="text-center text-success">Registrasi & Pendaftaran</th>

                                        <th colspan="4" class="text-center text-success">Sampel Material</th>

                                        <th colspan="4" class="text-center text-success">Pengujian Material</th>

                                        <th colspan="4" class="text-center text-success">Informasi Invoice</th>
                                        <th colspan="4" class="text-center text-success">Informasi Pembayaran</th>
                                        <th colspan="4" class="text-center text-success">Informasi Kwitansi</th>
                                        <th rowspan="2">Link Download</th>
                                        <th rowspan="2">Keterangan</th>
                                    </tr>
                                    <tr>
                                        <th>Nama Mitra</th>
                                        <th>Nama Institusi</th>
                                        <th>Nama Pengujian</th>
                                        <th>Jenis Pengujian</th>
                                        <th>Tanggal Pendaftaran</th>
                                        <th>Status Pendaftaran</th>
                                        <th>Tanggal Sampel</th>
                                        <th>Jenis Sampel</th>
                                        <th>Qty Sampel</th>
                                        <th>Status Sampel</th>
                                        <th>Tanggal Mulai</th>
                                        <th>Tanggal Selesai</th>
                                        <th>Status Verifikasi</th>
                                        <th>Status Pengujian</th>
                                        <th>Tanggal Invoice</th>
                                        <th>No. Invoice Internal</th>
                                        <th>No. Invoice Eksternal</th>
                                        <th>Status Invoice</th>
                                        <th>Tanggal Pembayaran</th>
                                        <th>Metode Pembayaran</th>
                                        <th class="text-right">Nominal Pembayaran</th>
                                        <th>Status Pembayaran</th>
                                        <th>Tanggal Kwitansi</th>
                                        <th>No. Kwitansi Internal</th>
                                        <th>No. Kwitansi Eksternal</th>
                                        <th>Status Kwitansi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $key => $item)
                                    <tr>
                                        <td>{{ number_format($data->firstItem() + $key) }}</td>
                                        <td>
                                            <a class="btn btn-sm btn-outline-info" wire:click="showData({{ $item->id_hasil_pengujian }})" data-toggle="modal" data-target="#confirmModal">
                                                <i class="fa-solid fa-display"></i>
                                            </a>
                                            <a class="btn btn-sm btn-outline-warning" wire:navigate href="{{ route('admin.hasil-pengujian.edit', ['id' => $item->id_hasil_pengujian]) }}">
                                                <i class="fa-solid fa-edit"></i>
                                            </a>
                                            <a class="btn btn-sm btn-outline-danger" wire:navigate href="{{ route('admin.hasil-pengujian.drop', ['id' => $item->id_hasil_pengujian]) }}">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                        </td>

                                        <td>{{ $item->mitra->nama_mitra ?? '-' }}</td>
                                        <td>{{ $item->mitra->nama_institusi ?? '-' }}</td>
                                        <td>{{ $item->jenisPengujian->nama_pengujian ?? '-' }}</td>
                                        <td>{{ $item->jenisPengujian->jenis_pengujian ?? '-' }}</td>

                                        <td>{{ $item->tanggal_pendaftaran ? \Carbon\Carbon::parse($item->tanggal_pendaftaran)->format('Y-m-d') : '-' }}</td>
                                        <td>{{ $item->status_pendaftaran ?? '-' }}</td>

                                        <td>{{ $item->tanggal_sampel ? \Carbon\Carbon::parse($item->tanggal_sampel)->format('Y-m-d') : '-' }}</td>
                                        <td>{{ $item->jenis_sampel ?? '-' }}</td>
                                        <td>{{ $item->qty_sampel ?? '-' }}</td>
                                        <td>{{ $item->status_sampel ?? '-' }}</td>

                                        <td>{{ $item->tanggal_pengujian_mulai ? \Carbon\Carbon::parse($item->tanggal_pengujian_mulai)->format('Y-m-d') : '-' }}</td>
                                        <td>{{ $item->tanggal_pengujian_selesai ? \Carbon\Carbon::parse($item->tanggal_pengujian_selesai)->format('Y-m-d') : '-' }}</td>
                                        <td>{{ $item->status_verifikasi ?? '-'}}</td>
                                        <td>{{ $item->status_pengujian ?? '-'}}</td>

                                        <td>{{ $item->tanggal_invoice ? \Carbon\Carbon::parse($item->tanggal_invoice)->format('Y-m-d') : '-' }}</td>
                                        <td>{{ $item->nomor_invoice_internal ?? '-' }}</td>
                                        <td>{{ $item->nomor_invoice_eksternal ?? '-' }}</td>
                                        <td>{{ $item->status_invoice ?? '-' }}</td>

                                        <td>{{ $item->tanggal_pembayaran ? \Carbon\Carbon::parse($item->tanggal_pembayaran)->format('Y-m-d') : '-' }}</td>
                                        <td>{{ $item->metode_pembayaran ?? '-'}}</td>
                                        <td class="text-right">{{ formatRupiah($item->nominal_pembayaran) }}</td>
                                        <td>{{ $item->status_pembayaran ?? '-'}}</td>

                                        <td>{{ $item->tanggal_kwitansi ? \Carbon\Carbon::parse($item->tanggal_kwitansi)->format('Y-m-d') : '-' }}</td>
                                        <td>{{ $item->nomor_kwitansi_internal ?? '-'}}</td>
                                        <td>{{ $item->nomor_kwitansi_eksternal ?? '-'}}</td>
                                        <td>{{ $item->status_kwitansi ?? '-'}}</td>

                                        <td>{{ $item->file_hasil_pengujian ?? '-'}}</td>
                                        <td>{{ $item->keterangan ?? '-'}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{-- /.col --}}
                    </div>
                    {{-- /.row --}}

                    <div class="row">
                        <div class="col-sm-12">
                            {{ $data->links() }}
                        </div>
                        {{-- /.col --}}
                    </div>
                    {{-- /.row --}}

                </div>
                {{-- /.card-body --}}

                <div class="card-footer">
                    <small class="text-danger">Pembaharuan data di tanggal {{ date('Y-m-d') }} pukul {{ date('H:i')}} WIB</small>
                </div>
                {{-- /.card-footer --}}

            </div>{{-- /.card --}}
        </div> {{-- /.col --}}
    </div> {{-- /.row --}}

    {{-- Modal Konfirmasi --}}
    <div wire:ignore.self class="modal fade" id="confirmModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Informasi.</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row border-bottom mb-5">
                        <div class="form-group col-sm-12 mb-2">
                            <h4 class="font-weight-normal text-info">Informasi Pendaftaran</h4>
                        </div>
                        <div class="form-group col-sm-6 mb-4">
                            <label for="nama_mitra" class="required">Nama Mitra</label>
                            <input wire:model="nama_mitra" type="text" class="form-control form-control-border border-info border-width-2" id="nama_mitra" disabled>
                        </div>
                        <div class="form-group col-sm-6 mb-4">
                            <label for="nama_institusi" class="required">Nama Institusi</label>
                            <input wire:model="nama_institusi" type="text" class="form-control form-control-border border-info border-width-2" id="nama_institusi" disabled>
                        </div>
                        <div class="form-group col-sm-6 mb-4">
                            <label for="nama_pengujian" class="required">Nama Pengujian</label>
                            <input wire:model="nama_pengujian" type="text" class="form-control form-control-border border-info border-width-2" id="nama_pengujian" disabled>
                        </div>
                        <div class="form-group col-sm-6 mb-4">
                            <label for="jenis_pengujian" class="required">Jenis Pengujian</label>
                            <input wire:model="jenis_pengujian" type="text" class="form-control form-control-border border-info border-width-2" id="jenis_pengujian" disabled>
                        </div>
                        <div class="form-group col-sm-6 mb-4">
                            <label for="tanggal_pendaftaran" class="required">Tanggal Pendaftaran</label>
                            <input wire:model="tanggal_pendaftaran" type="text" class="form-control form-control-border border-info border-width-2" id="tanggal_pendaftaran" disabled>
                        </div>
                        <div class="form-group col-sm-6 mb-4">
                            <label for="status_pendaftaran" class="required">Status Pendaftaran</label>
                            <input wire:model="status_pendaftaran" type="text" class="form-control form-control-border border-info border-width-2" id="status_pendaftaran" disabled>
                        </div>
                    </div>

                    <div class="form-row border-bottom mb-5">
                        <div class="form-group col-sm-12 mb-2">
                            <h4 class="font-weight-normal text-info">Sampel Material</h4>
                        </div>
                        <div class="form-group col-sm-6 mb-4">
                            <label for="tanggal_sampel" class="required">Tanggal Sampel</label>
                            <input wire:model="tanggal_sampel" type="text" class="form-control form-control-border border-info border-width-2" id="tanggal_sampel" disabled>
                        </div>
                        <div class="form-group col-sm-6 mb-4">
                            <label for="status_sampel" class="required">Status Sampel</label>
                            <input wire:model="status_sampel" type="text" class="form-control form-control-border border-info border-width-2" id="status_sampel" disabled>
                        </div>
                        <div class="form-group col-sm-6 mb-4">
                            <label for="jenis_sampel" class="required">Jenis Sampel</label>
                            <input wire:model="jenis_sampel" type="text" class="form-control form-control-border border-info border-width-2" id="jenis_sampel" disabled>
                        </div>
                        <div class="form-group col-sm-6 mb-4">
                            <label for="qty_sampel" class="required">Qty Sampel</label>
                            <input wire:model="qty_sampel" type="text" class="form-control form-control-border border-info border-width-2" id="qty_sampel" disabled>
                        </div>
                    </div>

                    <div class="form-row border-bottom mb-5">
                        <div class="form-group col-sm-12 mb-2">
                            <h4 class="font-weight-normal text-info">Pengujian Material</h4>
                        </div>
                        <div class="form-group col-sm-6 mb-4">
                            <label for="tanggal_pengujian_mulai" class="required">Tanggal Mulai Pengujian</label>
                            <input wire:model="tanggal_pengujian_mulai" type="text" class="form-control form-control-border border-info border-width-2" id="tanggal_pengujian_mulai" disabled>
                        </div>
                        <div class="form-group col-sm-6 mb-4">
                            <label for="status_verifikasi" class="required">Status Verifikasi</label>
                            <input wire:model="status_verifikasi" type="text" class="form-control form-control-border border-info border-width-2" id="status_verifikasi" disabled>
                        </div>
                        <div class="form-group col-sm-6 mb-4">
                            <label for="tanggal_pengujian_selesai" class="required">Tanggal Selesai Pengujian</label>
                            <input wire:model="tanggal_pengujian_selesai" type="text" class="form-control form-control-border border-info border-width-2" id="tanggal_pengujian_selesai" disabled>
                        </div>
                        <div class="form-group col-sm-6 mb-4">
                            <label for="status_pengujian" class="required">Status Pengujian</label>
                            <input wire:model="status_pengujian" type="text" class="form-control form-control-border border-info border-width-2" id="status_pengujian" disabled>
                        </div>
                    </div>

                    <div class="form-row border-bottom mb-5">
                        <div class="form-group col-sm-12 mb-2">
                            <h4 class="font-weight-normal text-info">Informasi Invoice</h4>
                        </div>
                        <div class="form-group col-sm-6 mb-4">
                            <label for="tanggal_invoice" class="required">Tanggal Invoice</label>
                            <input wire:model="tanggal_invoice" type="text" class="form-control form-control-border border-info border-width-2" id="tanggal_invoice" disabled>
                        </div>
                        <div class="form-group col-sm-6 mb-4">
                            <label for="status_invoice" class="required">Status Invoice</label>
                            <input wire:model="status_invoice" type="text" class="form-control form-control-border border-info border-width-2" id="status_invoice" disabled>
                        </div>
                        <div class="form-group col-sm-6 mb-4">
                            <label for="nomor_invoice_internal" class="required">No. Invoice Internal</label>
                            <input wire:model="nomor_invoice_internal" type="text" class="form-control form-control-border border-info border-width-2" id="nomor_invoice_internal" disabled>
                        </div>
                        <div class="form-group col-sm-6 mb-4">
                            <label for="nomor_invoice_eksternal" class="required">No. Invoice Eksternal</label>
                            <input wire:model="nomor_invoice_eksternal" type="text" class="form-control form-control-border border-info border-width-2" id="nomor_invoice_eksternal" disabled>
                        </div>
                    </div>

                    <div class="form-row border-bottom mb-5">
                        <div class="form-group col-sm-12 mb-2">
                            <h4 class="font-weight-normal text-info">Informasi Pembayaran</h4>
                        </div>
                        <div class="form-group col-sm-6 mb-4">
                            <label for="tanggal_pembayaran" class="required">Tanggal Pembayaran</label>
                            <input wire:model="tanggal_pembayaran" type="text" class="form-control form-control-border border-info border-width-2" id="tanggal_pembayaran" disabled>
                        </div>
                        <div class="form-group col-sm-6 mb-4">
                            <label for="status_pembayaran" class="required">Status Pembayaran</label>
                            <input wire:model="status_pembayaran" type="text" class="form-control form-control-border border-info border-width-2" id="status_pembayaran" disabled>
                        </div>
                        <div class="form-group col-sm-6 mb-4">
                            <label for="metode_pembayaran" class="required">Metode Pembayaran</label>
                            <input wire:model="metode_pembayaran" type="text" class="form-control form-control-border border-info border-width-2" id="metode_pembayaran" disabled>
                        </div>
                        <div class="form-group col-sm-6 mb-4">
                            <label for="nominal_pembayaran" class="required">Nominal Pembayaran</label>
                            <input wire:model="nominal_pembayaran" type="text" class="form-control form-control-border border-info border-width-2" id="nominal_pembayaran" disabled>
                        </div>
                    </div>

                    <div class="form-row border-bottom mb-5">
                        <div class="form-group col-sm-12 mb-2">
                            <h4 class="font-weight-normal text-info">Informasi Kwitansi</h4>
                        </div>
                        <div class="form-group col-sm-6 mb-4">
                            <label for="tanggal_kwitansi" class="required">Tanggal Kwitansi</label>
                            <input wire:model="tanggal_kwitansi" type="text" class="form-control form-control-border border-info border-width-2" id="tanggal_kwitansi" disabled>
                        </div>
                        <div class="form-group col-sm-6 mb-4">
                            <label for="status_kwitansi" class="required">Status Kwitansi</label>
                            <input wire:model="status_kwitansi" type="text" class="form-control form-control-border border-info border-width-2" id="status_kwitansi" disabled>
                        </div>
                        <div class="form-group col-sm-6 mb-4">
                            <label for="nomor_kwitansi_internal" class="required">No. Kwitansi Internal</label>
                            <input wire:model="nomor_kwitansi_internal" type="text" class="form-control form-control-border border-info border-width-2" id="nomor_kwitansi_internal" disabled>
                        </div>
                        <div class="form-group col-sm-6 mb-4">
                            <label for="nomor_kwitansi_eksternal" class="required">No. Kwitansi Eksternal</label>
                            <input wire:model="nomor_kwitansi_eksternal" type="text" class="form-control form-control-border border-info border-width-2" id="nomor_kwitansi_eksternal" disabled>
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <label for="file_hasil_pengujian" class="required">Link Download</label>
                        <textarea wire:model="file_hasil_pengujian" class="form-control form-control-border border-info border-width-2" id="file_hasil_pengujian" rows="5" disabled></textarea>
                    </div>

                    <div class="form-group mb-4">
                        <label for="keterangan" class="required">Keterangan</label>
                        <textarea wire:model="keterangan" class="form-control form-control-border border-info border-width-2" id="keterangan" rows="5" disabled></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="row w-100">
                        <div class="col-sm-10 text-left">
                            <p class="text-danger">Jika terdapat ketidaksesuaian harap hubungi administrator. WA 0819-3285-5946</p>
                        </div>
                        <div class="col-sm-2 text-right">
                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="fas fa-undo mr-1"></i> Tutup</button>
                        </div>
                    </div>
                    {{-- /.row --}}
                </div>
                {{-- /.modal-footer --}}
            </div>
            {{-- /.modal-content --}}
        </div>
        {{-- /.modal-dialog --}}
    </div>
    {{-- Modal Konfirmasi --}}

    {{-- content livewire. --}}
</div>