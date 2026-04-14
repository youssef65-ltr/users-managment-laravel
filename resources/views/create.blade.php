<x-layout>
    <x-slot name="title">
        create user
    </x-slot>
    <form method="POST" action={{ route("users.store") }} id="create_user">
        @csrf
        <div>
            <label for="fullName">full name : </label>
            <input type="text" name="fullName">
        </div>
        <div>
            <label for="age">age : </label>
            <input type="number" name="age">
        </div>
        <input type="submit" value="add user">
    </form>
</x-layout>