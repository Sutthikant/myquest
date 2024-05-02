<x-site-layout title="List of Quests">

    <div class="grid grid-cols-2 gap-8">
        @foreach($quests as $quest)
            {{$quest -> title}}<br/>
        @endforeach
    </div>

</x-site-layout>