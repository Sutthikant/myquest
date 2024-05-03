<x-site-layout title="List of activities">

    <div class="flex justify-end w-full mb-4">
        @if(!empty(auth()->user()->superadmin))
            @if(auth()->user()->superadmin)
                <a href="{{route('user.activities.index')}}" class="p-1 bg-green-400 text-white rounded">Manage categories</a>
            @endif
        @endif
    </div>

    <ul class="list-disc ml-5">
        @foreach($activities as $activity)
            <li>
                    {{ $activity->name }}
            </li>
        @endforeach
    </ul>

</x-site-layout>