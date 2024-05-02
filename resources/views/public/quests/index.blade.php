<x-site-layout title="List of Quests">

    <div class="grid grid-2 gap-8">
        @foreach($quests as $quest)
            <x-article-display-card :quest="$quest" />
        @endforeach
    </div>

</x-site-layout>