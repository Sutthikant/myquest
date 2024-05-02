<x-site-layout title="List of Quests">

    <ul class="list-disc ml-5">
        @foreach($quests as $quest)
            <li>
                <a class="underline hover:bg-pink-200" href="/quests/{{$quest->id}}">
                    {{$quest -> title}}<br/>                
                </a>
            </li>
        @endforeach
    </ul>

</x-site-layout>