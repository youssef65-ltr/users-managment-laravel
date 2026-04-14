<x-layout>
    <x-slot name="title">
        {{ "show user - " . $user->name }}
    </x-slot> 
    <ul id="show-user">
        <div>
            id : {{ $user->id }}
        </div>
        <div>
            name : {{ $user->name }}
        </div>
        <div>
            age : {{ $user->age }}
        </div>
        <div>
            created at : {{ $user->created_at }}
        </div>
        <div>
            updated at : {{ $user->updated_at }}
        </div>
    </ul>
    <a href={{ route("users.index") }} role="button"><-back</a>
</x-layout>