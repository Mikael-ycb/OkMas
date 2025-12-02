<x-layout>
    <section class="relative bg-cover bg-center bg-no-repeat h-[350px] w-full"
        style="background-image: url('{{ asset('img/oke.avif') }}');">
        <div class="absolute inset-0"></div>

        <div class="relative z-10 flex flex-col md:flex-row items-center justify-between h-full px-8 lg:px-20">
            <div class="text-center md:text-left max-w-2xl text-white space-y-6">
                <h1 class="text-4xl sm:text-5xl font-bold leading-tight text-blue-900">
                    Login
                </h1>
            </div>
        </div>
    </section>
    

    <div class="flex flex-col items-center mt-6 space-y-4">
        {{-- ✅ Pesan sukses --}}
        @if(session('success'))
            <div class="bg-green-100 text-green-700 border border-green-300 px-4 py-2 rounded w-64 text-center">
                {{ session('success') }}
            </div>
        @endif

        {{-- ✅ Pesan error --}}
        @if(session('error'))
            <div class="bg-red-100 text-red-700 border border-red-300 px-4 py-2 rounded w-64 text-center">
                {{ session('error') }}
            </div>
        @endif

        {{-- ✅ Pesan validasi --}}
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 border border-red-300 px-4 py-2 rounded w-64 text-center">
                {{ $errors->first() }}
            </div>
        @endif

        <!-- ✅ FORM LOGIN -->
        <form method="POST" action="{{ route('login') }}" class="flex flex-col items-center space-y-4">
            @csrf

            <!-- Input NIK / Username -->
            <input
                type="text"
                name="login"
                value="{{ old('login') }}"
                placeholder="NIK atau Username"
                class="w-64 px-4 py-2 border border-gray-300 rounded-lg text-center focus:outline-none focus:ring-2 focus:ring-blue-500"
                required />

            <!-- Input Password -->
            <input
                type="password"
                name="password"
                placeholder="Password"
                class="w-64 px-4 py-2 border border-gray-300 rounded-lg text-center focus:outline-none focus:ring-2 focus:ring-blue-500"
                required />

            <!-- Tombol Sign In dan Login -->
            <div class="flex justify-center gap-6 mt-4">
                <a
                    href="/register"
                    class="bg-blue-900 hover:bg-blue-800 text-white px-8 py-2 rounded-lg shadow-md transition">
                    SIGN UP
                </a>

                <!-- Tombol LOGIN -->
                <button
                    type="submit"
                    class="bg-blue-900 hover:bg-blue-800 text-white px-8 py-2 rounded-lg shadow-md transition">
                    LOGIN
                </button>
            </div>
        </form>

        <!-- Lupa Password -->
        <a href="{{ route('password.request') }}" class="text-blue-500 text-sm hover:underline mt-3">
            Lupa password?
        </a>
    </div>
</x-layout>
