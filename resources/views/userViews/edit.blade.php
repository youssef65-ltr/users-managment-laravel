<x-layout>
    <x-slot name="title">
        edit - {{ $user->name }}
    </x-slot>
    <form method="POST" action={{ route("users.update" , $user->id) }} id="form_update">
        @csrf
        @method("PUT")
        <div>
            <label for="id">id : </label>
            <input type="text" name="id" value={{ $user->id }} disabled>
        </div>
        <div>
            <label for="id">name : </label>
            <input type="text" name="name" value={{ $user->name }}>
        </div>
        <div>
            <label for="id">age : </label>
            <input type="text" name="age" value={{ $user->age }}>
        </div>
        <div>
            <label for="email">email : </label>
            <input type="email" id="email" name="email" value="{{ $user->email }}">
        </div>
        <div>
            <label for="password">password : </label>
            <input type="password" id="password" name="password">
        </div>
        @if (session()->has("sucssUpdate"))
            <h1 style="background-color : darkgreen">
            {{ session()->get("sucssUpdate") }}
        </h1>
         @endif
        <input type="submit" value="update">
    </form>
</x-layout>