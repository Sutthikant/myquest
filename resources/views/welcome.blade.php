<x-site-layout title='Welcome'>

    <h2 class="text-2xl font-bold m-10">Welcome to MyQuest, Let's start your own quest!!!</h2>


    <div class='grid grid-cols-2 gap-8'>
        @foreach($quests as $quest)
            <x-article-display-card :quest="$quest"/>
        @endforeach
    </div>
    
</x-site-layout>
