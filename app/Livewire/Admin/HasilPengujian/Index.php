<?php

namespace App\Livewire\Admin\HasilPengujian;

use App\Models\HasilPengujian;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Carbon;

class Index extends Component
{
    use WithPagination;

    // ...
    public $search = "";
    public $paginate = "50";
    protected $paginationTheme = 'bootstrap';
    protected $queryString = ['search', 'paginate'];

    // ...
    public $viewMode = 'default';
    public $filterType = null;
    public $filterValue = null;

    public function render()
    {
        $data = HasilPengujian::with(['mitra', 'jenisPengujian'])
            ->where('status_data', 'Aktif')
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    // Cari di relasi mitra
                    $q->whereHas('mitra', function ($subQuery) {
                        $subQuery->where('nama_mitra', 'like', '%' . $this->search . '%')
                            ->orWhere('nama_institusi', 'like', '%' . $this->search . '%');
                    });
                    // Atau cari di relasi jenisPengujian
                    $q->orWhereHas('jenisPengujian', function ($subQuery) {
                        $subQuery->where('nama_pengujian', 'like', '%' . $this->search . '%')
                            ->orWhere('jenis_pengujian', 'like', '%' . $this->search . '%');
                    });
                });
            })
            ->when($this->filterType && $this->filterValue, function ($query) {
                $query->where($this->filterType, $this->filterValue);
            })
            ->orderBy('tanggal_pendaftaran', 'desc')->paginate($this->paginate);

        // Informasi Registrasi & Pendaftaran
        $jumlah_status_pendaftaran = [
            'sudah_disetujui' => HasilPengujian::where('status_pendaftaran', 'Sudah Disetujui')->where('status_data', 'Aktif')->count('id_hasil_pengujian'),
            'belum_disetujui' => HasilPengujian::where('status_pendaftaran', 'Belum Disetujui')->where('status_data', 'Aktif')->count('id_hasil_pengujian'),
        ];

        // Informasi Sampel
        $jumlah_status_sampel = [
            'sudah_dikirim' => HasilPengujian::where('status_sampel', 'Sudah Dikirim')->where('status_data', 'Aktif')->count('id_hasil_pengujian'),
            'belum_dikirim' => HasilPengujian::where('status_sampel', 'Belum Dikirim')->where('status_data', 'Aktif')->count('id_hasil_pengujian'),
        ];

        $jumlah_status_verifikasi = [
            'sudah_diverifikasi' => HasilPengujian::where('status_verifikasi', 'Sudah Diverifikasi')->where('status_data', 'Aktif')->count('id_hasil_pengujian'),
            'belum_diverifikasi' => HasilPengujian::where('status_verifikasi', 'Belum Diverifikasi')->where('status_data', 'Aktif')->count('id_hasil_pengujian'),
        ];

        $jumlah_status_pengujian = [
            'sudah_selesai' => HasilPengujian::where('status_pengujian', 'Sudah Selesai')->where('status_data', 'Aktif')->count('id_hasil_pengujian'),
            'belum_selesai' => HasilPengujian::where('status_pengujian', 'Belum Selesai')->where('status_data', 'Aktif')->count('id_hasil_pengujian'),
        ];

        // // Informasi Invoice
        $jumlah_status_invoice = [
            'sudah_diberikan' => HasilPengujian::where('status_invoice', 'Sudah Diberikan')->where('status_data', 'Aktif')->count('id_hasil_pengujian'),
            'belum_diberikan' => HasilPengujian::where('status_invoice', 'Belum Diberikan')->where('status_data', 'Aktif')->count('id_hasil_pengujian'),
        ];

        $jumlah_status_pembayaran = [
            'sudah_dibayar' => HasilPengujian::where('status_pembayaran', 'Sudah Dibayar')->where('status_data', 'Aktif')->count('id_hasil_pengujian'),
            'belum_dibayar' => HasilPengujian::where('status_pembayaran', 'Belum Dibayar')->where('status_data', 'Aktif')->count('id_hasil_pengujian'),
        ];

        $jumlah_status_kwitansi = [
            'sudah_diberikan' => HasilPengujian::where('status_kwitansi', 'Sudah Diberikan')->where('status_data', 'Aktif')->count('id_hasil_pengujian'),
            'belum_diberikan' => HasilPengujian::where('status_kwitansi', 'Belum Diberikan')->where('status_data', 'Aktif')->count('id_hasil_pengujian'),
        ];

        return view('livewire.admin.hasil-pengujian.index', [
            'data' => $data,
            'jumlah_status_pendaftaran' => $jumlah_status_pendaftaran,
            'jumlah_status_sampel' => $jumlah_status_sampel,
            'jumlah_status_verifikasi' => $jumlah_status_verifikasi,
            'jumlah_status_pengujian' => $jumlah_status_pengujian,
            'jumlah_status_invoice' => $jumlah_status_invoice,
            'jumlah_status_pembayaran' => $jumlah_status_pembayaran,
            'jumlah_status_kwitansi' => $jumlah_status_kwitansi,
        ]);
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedPaginate()
    {
        $this->resetPage();
    }

    public function filterBy($type, $value)
    {
        $this->filterType = $type;
        $this->filterValue = $value;

        if ($type == 'status_pendaftaran') {
            $this->viewMode = 'mode_status_pendaftaran';
        } elseif ($type == 'status_sampel') {
            $this->viewMode = 'mode_status_sampel';
        } elseif ($type == 'status_verifikasi') {
            $this->viewMode = 'mode_status_verifikasi';
        } elseif ($type == 'status_pengujian') {
            $this->viewMode = 'mode_status_pengujian';
        } elseif ($type == 'status_invoice') {
            $this->viewMode = 'mode_status_invoice';
        } elseif ($type == 'status_pembayaran') {
            $this->viewMode = 'mode_status_pembayaran';
        } elseif ($type == 'status_kwitansi') {
            $this->viewMode = 'mode_status_kwitansi';
        } else {
            $this->viewMode = 'default';
        }

        $this->resetPage();
    }


    public $nama_mitra, $nama_institusi, $nama_pengujian, $jenis_pengujian;

    public $tanggal_pendaftaran, $status_pendaftaran;

    public $tanggal_sampel,
        $jenis_sampel,
        $qty_sampel,
        $status_sampel;

    public $tanggal_pengujian_mulai,
        $tanggal_pengujian_selesai,
        $file_hasil_pengujian,
        $status_verifikasi,
        $status_pengujian;

    public $tanggal_invoice,
        $nomor_invoice_internal,
        $nomor_invoice_eksternal,
        $status_invoice;

    public $tanggal_pembayaran,
        $metode_pembayaran,
        $nominal_pembayaran,
        $status_pembayaran;

    public $tanggal_kwitansi,
        $nomor_kwitansi_internal,
        $nomor_kwitansi_eksternal,
        $status_kwitansi;

    public $keterangan, $status_data, $created_at, $updated_at, $deleted_at;

    public function showData($id)
    {
        $data = HasilPengujian::with(['mitra', 'jenisPengujian'])->where('id_hasil_pengujian', $id)->firstOrFail();

        $this->tanggal_pendaftaran = $data->tanggal_pendaftaran ? Carbon::parse($data->tanggal_pendaftaran)->format('Y-m-d') : '-';
        $this->status_pendaftaran = $data->status_pendaftaran ?? '-';

        $this->tanggal_sampel = $data->tanggal_sampel ? Carbon::parse($data->tanggal_sampel)->format('Y-m-d') : '-';
        $this->jenis_sampel = $data->jenis_sampel ?? '-';
        $this->qty_sampel = $data->qty_sampel ?? '-';
        $this->status_sampel = $data->status_sampel ?? '-';

        $this->tanggal_pengujian_mulai = $data->tanggal_pengujian_mulai ? Carbon::parse($data->tanggal_pengujian_mulai)->format('Y-m-d') : '-';
        $this->tanggal_pengujian_selesai = $data->tanggal_pengujian_selesai ? Carbon::parse($data->tanggal_pengujian_selesai)->format('Y-m-d') : '-';
        $this->status_verifikasi = $data->status_verifikasi ?? '-';
        $this->status_pengujian = $data->status_pengujian ?? '-';

        $this->tanggal_invoice = $data->tanggal_invoice ? Carbon::parse($data->tanggal_invoice)->format('Y-m-d') : '-';
        $this->nomor_invoice_internal = $data->nomor_invoice_internal ?? '-';
        $this->nomor_invoice_eksternal = $data->nomor_invoice_eksternal ?? '-';
        $this->status_invoice = $data->status_invoice ?? '-';

        $this->tanggal_pembayaran = $data->tanggal_pembayaran ? Carbon::parse($data->tanggal_pembayaran)->format('Y-m-d') : '-';
        $this->metode_pembayaran = $data->metode_pembayaran ?? '-';
        $this->nominal_pembayaran = formatRupiah($data->nominal_pembayaran);
        $this->status_pembayaran = $data->status_pembayaran ?? '-';

        $this->tanggal_kwitansi = $data->tanggal_kwitansi ? Carbon::parse($data->tanggal_kwitansi)->format('Y-m-d') : '-';
        $this->nomor_kwitansi_internal = $data->nomor_kwitansi_internal ?? '-';
        $this->nomor_kwitansi_eksternal = $data->nomor_kwitansi_eksternal ?? '-';
        $this->status_kwitansi = $data->status_kwitansi ?? '-';

        $this->file_hasil_pengujian = $data->file_hasil_pengujian ?? '-';
        $this->keterangan = $data->keterangan ?? '-';
        $this->status_data = $data->status_data ?? '-';

        /* Relasi Mitra dan Jenis Pengujian */
        $this->nama_mitra = $data->mitra ? $data->mitra->nama_mitra : '-';
        $this->nama_institusi = $data->mitra ? $data->mitra->nama_institusi : '-';
        $this->nama_pengujian = $data->jenisPengujian ? $data->jenisPengujian->nama_pengujian : '-';
        $this->jenis_pengujian = $data->jenisPengujian ? $data->jenisPengujian->jenis_pengujian : '-';
    }
}
