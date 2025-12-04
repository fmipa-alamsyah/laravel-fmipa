<?php

namespace App\Livewire\Admin\Mitra;

use App\Models\Mitra;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    // attribute class
    public $search = "";
    public $paginate = "1000";
    protected $paginationTheme = 'bootstrap';
    protected $queryString = ['search', 'paginate'];

    public function render()
    {
        $mitra = Mitra::where('status_data', 'Aktif')->where(function ($query) {
            $query->where('nama_mitra', 'like', '%' . $this->search . '%')
                ->orWhere('email_mitra', 'like', '%' . $this->search . '%')
                ->orWhere('telp_mitra', 'like', '%' . $this->search . '%')
                ->orWhere('nama_institusi', 'like', '%' . $this->search . '%');
        })->orderBy('nama_mitra')->paginate($this->paginate);

        return view('livewire.admin.mitra.index', [
            'mitra' => $mitra
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

    // ----------------------------------------------------

    public $id_mitra, $nik_mitra, $nama_mitra, $email_mitra, $telp_mitra, $nama_institusi, $alamat_institusi, $status_data;
    public $created_at, $updated_at, $deleted_at;

    public function showData($id)
    {
        $mitra = Mitra::where('id_mitra', $id)->firstOrFail();
        $this->nik_mitra = $mitra->nik_mitra ?? '-';
        $this->nama_mitra = $mitra->nama_mitra ?? '-';
        $this->email_mitra = $mitra->email_mitra ?? '-';
        $this->telp_mitra = $mitra->telp_mitra ?? '-';
        $this->nama_institusi = $mitra->nama_institusi ?? '-';
    }
}
