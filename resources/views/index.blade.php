<x-layout>
   <x-slot name="title">
        index users
    </x-slot> 
    <h1>index users</h1>
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
                </td>
            </tr>
        @endforeach    
        </table>
    
</x-layout>