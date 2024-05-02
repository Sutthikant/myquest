<x-site-layout title="List of Quests">

    <div class="grid grid-cols-2 gap-8">                
        
        @foreach($quests as $quest)
            <a class="underline hover:bg-pink-200" href="/quests/{{$quest->id}}">
                {{$quest -> title}}<br/>                
            </a>
        @endforeach
        
    </div>

</x-site-layout>