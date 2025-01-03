@extends('layouts.app')

@section('title', 'Pencatatan Keuangan')

@section('content')
<body class="h-[200vh] overflow-hidden font-mona">
    <div class="w-full h-full p-8 bg-black text-white">
        <!-- Stacked Cards Section -->
        <div class="relative text-center h-48 mb-44">
            <!-- Background Card 1 -->
            <div class="absolute top-0 left-1/2 -translate-y-14 translate-x-20 w-40 h-[180px] border-[5px] border-[#bfdbfe] bg-white/5 z-20"></div>

            <!-- Background Card 2 -->
            <div class="absolute top-20 left-1/2 -translate-x-80 w-80 h-[220px] border-[5px] border-[#d8b4fe] bg-white/5 rounded-3xl z-10"></div>

            <!-- Main Card -->
            <div class="absolute inset-0 h-[220px] p-6 border-[6px] border-white rounded-3xl overflow-hidden bg-black z-30">
                <div class="flex justify-between items-center mb-8">
                    <div class="text-2xl text-green-300">Bank</div>
                    <img class="w-20 h-8" src="{{ asset('logo/visa.png') }}" alt="">
                </div>
                <img class="w-60 mx-auto" src="{{ asset('logo/smile.png') }}" alt="">
            </div>
        </div>

        <!-- Text Section -->
        <div class="mb-9">
            <div class="text-5xl gap-5 mb-3 flex tracking-wider">
                <h1>Bantu</h1>
                <h1>Kamu</h1>
                <span class="text-yellow-200 flex">✦</span>
            </div>
            <div class="text-5xl gap-5 mb-3 flex tracking-wider">
                <h1>Mengelola</h1>
            </div>
            <div class="text-5xl gap-5 mb-3 flex tracking-wider">
                <h1>Keuangan</h1>
            </div>
        </div>

        <!-- Button -->
        <a href="{{ route('login') }}"
            class="block text-center w-full py-6 px-8 bg-[#b1e0b7] rounded-xl 
                  transition duration-300 hover:-translate-y-0.5">
            <h1 class="text-black font-semibold text-xl">Mulai</h1>
        </a>
    </div>
</body>
@endsection

</html>