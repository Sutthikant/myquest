<x-site-layout title='List of users'>

    <ul class="list-disc ml-5">
        @foreach($users as $user)
            <li>
                <a class="underline hover:bg-pink-200" href="/users/{{$user->id}}">
                    {{ $user->name }}
                </a>
            </li>
        @endforeach
    </ul>
</x-site-layout>