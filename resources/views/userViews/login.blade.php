

<x-layout>
    <x-slot name="title">
        {{"login"}}
    </x-slot>
    <form action="{{ route("submitLogin") }}" id="login_form" method="POST">
        @csrf
        <div>
            <label for="email">email : </label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="password">password : </label>
            <input type="password" id="password" name="password" required>
        </div>
        <input type="submit" value="login">
    </form>
</x-layout>