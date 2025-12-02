<x-layout>
    <div class="flex flex-col items-center mt-10">
        <form method="POST" action="{{ route('password.update') }}" class="space-y-4 w-72">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <input type="password" name="password" placeholder="Password Baru" class="input" required>
            <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" class="input" required>

            <button class="bg-blue-900 text-white w-full py-2 rounded-lg">Reset Password</button>
        </form>
    </div>
</x-layout>
