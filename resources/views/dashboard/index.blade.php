<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-screen flex flex-col overflow-hidden font-mona">
    <!-- Header -->
    <header class="sticky top-0 z-50 bg-white">
        <div class="h-12 p-8 items-center flex justify-between">
            <h1 class="text-2xl font-semibold">Komang</h1>
            <img class="h-8" src="{{ asset('logo/bell.png') }}" alt="">
        </div>
    </header>

    <!-- Main Content (Scrollable) -->
    <main class="flex-1 overflow-y-auto w-full p-8 text-black">
        <div class="bg-black w-full rounded-[25px] h-52 shadow-black/55 shadow-xl">
            <div class="text-white p-6 space-y-10">
                <div class="flex justify-between">
                    <h1 class="text-2xl font-semibold">Rp. 1.000.000</h1>
                    <img class="h-5" src="{{ asset('logo/visa.png') }}" alt="">
                </div>
                <h1 class="text-lg font-thin" style="font-family: monospace;">4225 **** **** 1234</h1>
                <div class="flex justify-between">
                    <h1 class="text-sm text-purple-300">Debit Card</h1>
                    <h1 class="text-sm" style="font-family: monospace;">09/24</h1>
                </div>
            </div>
        </div>

        <div class="flex justify-between mt-10 gap-5">
            <a href="{{ route('dashboard.expense') }}" class="bg-amber-400 w-full rounded-2xl h-16 items-center flex justify-center">
                <h1 class="text-lg font-medium">Keluar</h1>
            </a>
            <a href="{{ route('dashboard.income') }}" class="bg-[#b1e0b7] w-full rounded-2xl h-16 items-center flex justify-center">
                <h1 class="text-lg font-medium">Masuk</h1>
            </a>
        </div>

        <div class="flex justify-between mt-10 gap-5">
            <h1 class="text-xl font-semibold">Transaksi Terbaru</h1>
            <img class="w-8" src="{{ asset('logo/more.png') }}" alt="">
        </div>

        <div class="mt-5 gap-6 flex flex-col">
            <!-- Card Transaksi Terbaru -->
            <div class="p-4 border-white/50 w-full rounded-xl h-24 shadow-2xl shadow-black/5">
                <div class="flex justify-between">
                    <div class="flex h-full w-50 gap-3">
                        <div class="w-16 h-16 bg-[#b1e0b7] rounded-xl flex items-center justify-center">
                            <img class="w-9 h-9" src="{{ asset('logo/bell.png') }}" alt="">
                        </div>
                        <div class="gap-3 flex flex-col">
                            <h1 class="text-lg font-semibold">Bensin Ken..</h1>
                            <span class="text-sm text-gray-400">1 Jan 2025</span>
                        </div>
                    </div>
                    <div class="text-red-500">- 12.000.000</div>
                </div>
            </div>
            <div class="p-4 border-white/50 w-full rounded-xl h-24 shadow-2xl shadow-black/5">
                <div class="flex justify-between">
                    <div class="flex h-full w-50 gap-3">
                        <div class="w-16 h-16 bg-[#b1e0b7] rounded-xl flex items-center justify-center">
                            <img class="w-9 h-9" src="{{ asset('logo/bell.png') }}" alt="">
                        </div>
                        <div class="gap-3 flex flex-col">
                            <h1 class="text-lg font-semibold">Bensin Ken..</h1>
                            <span class="text-sm text-gray-400">1 Jan 2025</span>
                        </div>
                    </div>
                    <div class="text-red-500">- 12.000.000</div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="sticky bottom-0 z-50 bg-white">
        <div class="justify-between flex items-center w-full h-20 p-6">
            <img class="w-8" src="{{ asset('logo/home.png') }}" alt="">
            <img class="w-7" src="{{ asset('logo/line-chart.png') }}" alt="">
            <img class="w-20" src="{{ asset('logo/scan.png') }}" class="w-8" alt="Scan">
            <img class="w-8" src="{{ asset('logo/wallet.png') }}" alt="">
            <img class="w-10" src="{{ asset('logo/person.png') }}" alt="">
        </div>
    </footer>
</body>

</html>