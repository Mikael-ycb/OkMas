<x-layout>
    <div class="flex flex-col items-center mt-10">
        <form method="POST" action="{{ route('password.email') }}" class="space-y-4 w-72">
            @csrf

            <input type="text" name="nik" placeholder="Masukkan NIK Anda" class="input" required>

            <button class="bg-blue-900 text-white w-full py-2 rounded-lg">Kirim Token Reset</button>
        </form>
    </div>
</x-layout>
