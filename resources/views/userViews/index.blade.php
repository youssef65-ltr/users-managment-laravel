<x-layout>
   <x-slot name="title">
        index users
    </x-slot> 
        <table id="list_users">
            <tr>
                <th>id</th>
                <th>name</th>
                <th>age</th>
                <th>actions</th>
            </tr>
        @foreach ($users as $user)   
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->age }}</td>
                <td>
                    <a role="button" href={{ route("users.show" , $user->id) }}>details</a>
                    <a role="button" href={{ route("users.edit" , $user->id) }}>update</a>
                    <form method="POST" action="{{ route("users.destroy" , $user->id) }}" style="display: inline">
                        @csrf
                        @method("DELETE")
                    <input type="submit" value="delete">
                    </form>
                    
                </td>
            </tr>
        @endforeach    
        </table>
    
</x-layout>