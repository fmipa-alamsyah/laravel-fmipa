<div>
    {{-- content livewire. --}}

    <style>
        .logo-img {
            display: block;
            max-width: 128px;
            width: 100%;
            height: auto;
            margin: auto;
            padding-bottom: 20px;
        }

        .text-info:hover {
            text-decoration: underline;
        }
    </style>

    <div class="row justify-content-center">
        <div class="col-sm-10">
            <div class="card card-outline card-info">
                <div class="card-header text-center d-flex flex-column align-items-center p-4">
                    <img src="{{ asset('adminlte/dist/img/logoUI-new.png') }}" alt="Logo Kampus" class="logo-img" />
                    <span class="card-title">Daftar Akun | LST - FMIPA Universitas Indonesia</span>
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group mb-4">
                            <label for="nik_mitra" class="required">NIK/NPWP</label>
                            <input wire:model="nik_mitra" type="text" class="form-control form-control-border border-info border-width-2" id="nik_mitra" placeholder="Pastikan Nomor NIK/NPWP Anda Benar.">
                            @error('nik_mitra') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="nama_mitra" class="required">Nama Mitra</label>
                            <input wire:model="nama_mitra" type="text" class="form-control form-control-border border-info border-width-2" id="nama_mitra" placeholder="Contoh. Aryajaya Alamsyah.">
                            @error('nama_mitra') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="email_mitra" class="required">Email Aktif</label>
                            <input wire:model="email_mitra" type="email" class="form-control form-control-border border-info border-width-2" id="email_mitra" placeholder="Contoh. aryajaya.alamsyah@gmail.com">
                            @error('email_mitra') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="telp_mitra" class="required">Nomor WA</label>
                            <input wire:model="telp_mitra" type="text" class="form-control form-control-border border-info border-width-2" id="telp_mitra" placeholder="Contoh. 08193285-xxxx">
                            @error('telp_mitra') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="nama_institusi" class="required">Nama Institusi</label>
                            <input wire:model="nama_institusi" type="text" class="form-control form-control-border border-info border-width-2" id="nama_institusi" placeholder="Contoh. Universitas Indonesia">
                            @error('nama_institusi') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="password" class="required">Password Login</label>
                            <input wire:model="password" type="password" class="form-control form-control-border border-info border-width-2" id="password" placeholder="Password minimal 8 karakter.">
                            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                            <div class="form-group mt-2">
                                <a href="javascript:void(0)" class="text-info" onclick="togglePassword()" id="togglePasswordText">Tampilkan password</a>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="reset" class="btn btn-outline-danger">
                                <i class="fas fa-undo mr-1"></i> Hapus
                            </button>
                            <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#confirmModal">
                                <i class="fas fa-save mr-1"></i> Simpan
                            </button>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <p class="text-dark">Jika terdapat kendala-kendala harap hubungi administrator. Kontak WA Akhmad Futukillah F.A. - 0858-0677-3755.</p>
                    <span class="text-dark">Rekomendasi untuk Kenyamanan Penggunaan:</span>
                    <ul class="text-dark">
                        <li>Browser - Google Chrome, Mozila Firefox, atau Microsoft Edge.</li>
                        <li>Ukuran layar - Minimal 15 inci dengan resolusi 1080 piksel.</li>
                    </ul>
                </div>
            </div>
            <!-- /. card -->
        </div>
        <!-- /. col -->
    </div>
    <!-- /. row -->

    {{-- Modal Konfirmasi Simpan --}}
    <div wire:ignore.self class="modal fade" id="confirmModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content modal-success-outline">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi.</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span class="text-dark">Pastikan data-data yang dimasukan sudah benar.</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">
                        <i class="fas fa-undo mr-1"></i> Tutup
                    </button>
                    <button type="button" class="btn btn-outline-success" data-dismiss="modal" wire:click="store">
                        <i class="fas fa-save mr-1"></i>Simpan
                    </button>
                </div>
            </div>
        </div>
        {{-- /.modal-dialog --}}
    </div>
    {{-- Modal Konfirmasi Simpan --}}

    <script>
        function togglePassword() {
            const input = document.getElementById('password');
            const toggleText = document.getElementById('togglePasswordText');
            if (input.type === 'password') {
                input.type = 'text';
                toggleText.textContent = 'Sembunyikan password';
            } else {
                input.type = 'password';
                toggleText.textContent = 'Tampilkan password';
            }
        }
    </script>

    {{-- content livewire. --}}
</div>