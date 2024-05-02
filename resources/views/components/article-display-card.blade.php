<div class="inline-block p-2 bg-pink-200 rounded hover:bg-pink-300 shadow-xl relative">
    <a href="{{ route('quests.show', ['id' => $quest->id]) }}" class="flex items-center">
        <img src="{{ $quest->getCardImageUrl() }}" class="w-32 h-32 object-cover mr-4 rounded">

        <div>
            <h3 class="font-bold text-xl">{{ $quest->title }}</h3>
            <div>Created by {{ $quest->user->name }}</div>
            <p class="line-clamp-3">Reward: {{ $quest->reward }}</p>
        </div>
    </a>
</div>
