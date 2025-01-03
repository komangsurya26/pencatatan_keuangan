@extends('layouts.app')

@section('title', 'Pengeluaran')

@section('content')
<body class="h-screen flex flex-col overflow-hidden font-mona">
    <!-- Header -->
    <header class="sticky top-0 z-50 bg-white">
        <div class="h-12 p-8 items-center flex justify-between">
            <a href="{{ route('dashboard') }}">
                <img class="h-6" src="{{ asset('logo/back.png') }}" alt="">
            </a>
            <h1 class="text-xl font-semibold">Pengeluaran</h1>
            <div class="h-6 w-6"></div>
        </div>
    </header>

    <!-- Total Pemasukan -->
    <div class="h-16 p-8 flex items-center justify-center">
        <h1 id="total" class="text-5xl font-bold overflow-x-scroll overflow-y-hidden">0</h1>
    </div>

    <main class="flex-1 overflow-y-auto p-8 h-full text-black">
        <!-- Kategori -->
        <div class="p-4 border-white/50 w-full rounded-xl h-24 shadow-2xl shadow-black/5">
            <div class="flex justify-between">
                <div class="flex h-full w-50 gap-3">
                    <div class="w-16 h-16 bg-[#b1e0b7] rounded-xl flex items-center justify-center">
                        <img class="w-9 h-9" src="{{ asset('logo/bell.png') }}" alt="">
                    </div>
                    <div class="gap-3 flex flex-col">
                        <span class="text-sm text-gray-400">Kategori</span>
                        <h1 class="text-lg font-semibold">Movie</h1>
                    </div>
                </div>
                <div class="flex items-center">
                    <img class="h-6" src="{{ asset('logo/down.png') }}" alt="">
                </div>
            </div>
        </div>

        <!-- Tambah Pemasukan -->
        <div id="numberButtons" class="mt-10 h-80 grid grid-rows-4 grid-cols-3 text-3xl font-medium">
            <div class="flex items-center justify-center">1</div>
            <div class="flex items-center justify-center">2</div>
            <div class="flex items-center justify-center">3</div>
            <div class="flex items-center justify-center">4</div>
            <div class="flex items-center justify-center">5</div>
            <div class="flex items-center justify-center">6</div>
            <div class="flex items-center justify-center">7</div>
            <div class="flex items-center justify-center">8</div>
            <div class="flex items-center justify-center">9</div>
            <div class="flex items-center justify-center"></div>
            <div class="flex items-center justify-center">0</div>
            <div id="removeButton" class="flex items-center justify-center">
                <img class="h-5" src="{{ asset('logo/back.png') }}" alt="Back">
            </div>
        </div>

        <!-- Submit -->
        <button type="submit" class="block text-center w-full mt-2 py-6 px-8 bg-black rounded-xl 
                  transition duration-300 hover:-translate-y-0.5">
            <h1 class="text-white font-semibold text-xl">Simpan</h1>
        </button>
    </main>
</body>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Ambil elemen angka total
        const totalElement = document.querySelector('#total');
        let currentValue = 0;

        // Ambil semua elemen angka di grid
        const numberButtons = document.querySelectorAll('#numberButtons div');

        // Tambahkan event listener ke setiap tombol angka
        numberButtons.forEach(button => {
            button.addEventListener('click', () => {
                const value = button.textContent.trim();

                // Jika tombol memiliki angka, tambahkan ke nilai sekarang
                if (value) {
                    currentValue = parseInt(currentValue.toString() + value);
                    totalElement.textContent = currentValue.toLocaleString();
                }
            });
        });

        // Reset tombol angka jika tombol "kembali" diklik
        const removeButton = document.querySelector('#removeButton');
        removeButton.addEventListener('click', () => {
            currentValue = currentValue.toString().slice(0, -1);
            currentValue = currentValue === '' ? 0 : parseInt(currentValue);
            totalElement.textContent = currentValue.toLocaleString();
        });
    });
</script>
@endpush

</html>