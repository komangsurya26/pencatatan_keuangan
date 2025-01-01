<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-[200vh] overflow-hidden font-mona">
    <div class="w-full h-full p-8 bg-black text-white">
        <form id="login">
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
                <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            </div>
            <div class="mb-9">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-300">Password</label>
                <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
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

<script>
    document.getElementById('login').addEventListener('submit', (e) => {
        e.preventDefault();
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;

        fetch('/api/login', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                email: email,
                password: password,
            }),
        }).then((response) => {
            if (response.status === 200) {
                window.location.href = '/dashboard';
            } else {
                alert('Login failed');
            }
        });
    })
</script>

</html>