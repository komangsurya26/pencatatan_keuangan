@extends('layouts.app')

@section('title', 'Login')

@section('content')
<body class="h-[200vh] overflow-hidden font-mona">
    <div class="w-full h-full p-8 bg-black text-white">
        <form>
            <div class="relative text-center h-48 mb-36">
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

            <div class="mb-9">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-300">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            </div>
            <div class="mb-9">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-300">Password</label>
                <input type="password" id="password" name="password"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            </div>
            <div class="mb-9">
                <button type="submit"
                    class="block text-center w-full py-6 px-8 bg-[#b1e0b7] rounded-xl transition duration-300 hover:-translate-y-0.5">
                    <h1 class="text-black font-semibold text-lg">Login</h1>
                </button>
            </div>
        </form>
    </div>
</body>
@endsection

@push('scripts')
<script>
    document.querySelector('form').addEventListener('submit', async (e) => {
        e.preventDefault();

        const email = document.querySelector('#email').value;
        const password = document.querySelector('#password').value;

        try {
            const response = await fetch('/api/login', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({
                    email,
                    password
                })
            });
            
            const data = await response.json();

            if (data.meta.code === 200) {
                window.location.href = '/dashboard';
            }
        } catch (error) {
            console.error(error);
        }
    });
</script>
@endpush

</html>