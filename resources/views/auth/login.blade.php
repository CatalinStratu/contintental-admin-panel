<x-guest-layout>
    <x-slot name="content">
        <form class="box" method="POST" action="{{ route('login') }}">
            @csrf
            <h1>Admin Login</h1>
            <x-jet-validation-errors />
            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif
            <input type="email" placeholder="Enter Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" spellcheck="false" name="email"  value="{{ old('email') }}" id="email" required>
            <input type="password" placeholder="Enter Password" name="password" id="password" required>
            <input type="submit" name="" value="Login">
        </form>
    </x-slot>
</x-guest-layout>
