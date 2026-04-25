<x-layout>
    <x-slot name="title">
        create user
    </x-slot>
    <form method="POST" action={{ route("users.store") }} id="create_user">
        @csrf
        <div>
            <label for="name">name : </label>
            <input type="text" name="name">
        </div>
        <div>
            <label for="age">age : </label>
            <input type="number" name="age">
        </div>
        <div>
            <label for="email">email : </label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="password">password : </label>
            <input type="password" id="password" name="password" required>
        </div>
        <input type="submit" value="add user">
    </form>
</x-layout>