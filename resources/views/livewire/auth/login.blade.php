<div>
    {{-- content livewire. --}}
    <style>
        .text-info:hover {
            text-decoration: underline;
        }
    </style>

    <div class="row justify-content-center">
        <div class="col-sm-10">
            <div class="card card-outline card-info">
                <div class="card-header text-center d-flex flex-column align-items-center p-4">
                    <img src="{{ asset('adminlte/dist/img/logoUI-new.png') }}" alt="Logo Kampus" class="logo-img" />
                    <span class="card-title">Form Login | LST - FMIPA Universitas Indonesia</span>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="login">
                        <div class="form-group mb-4">
                            <input wire:model="email" type="email" class="form-control form-control-border border-info border-width-2" id="email" placeholder="Email">
                        </div>
                        <div class="form-group mb-4">
                            <input wire:model="password" type="password" class="form-control form-control-border border-info border-width-2" id="password" placeholder="Password">
                            <div class="form-group mt-2">
                                <a href="javascript:void(0)" class="text-info" onclick="togglePassword()" id="togglePasswordText">Tampilkan password</a>
                            </div>
                        </div>
                        @if($errorMessage) <p class="text-danger mb-4">{{ $errorMessage }}</p> @endif
                        <div class="form-group">
                            <button type="submit" class="btn btn-block btn-outline-info">Login</button>
                        </div>
                        <div class="text-center">
                            <a class="text-info" href="{{ url('/register') }}">Daftar Akun</a>
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