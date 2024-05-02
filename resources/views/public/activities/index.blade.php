<x-site-layout title="List of activities">

    <ul class="list-disc ml-5">
        @foreach($activities as $activity)
            <li>
                    {{ $activity->name }}
            </li>
        @endforeach
    </ul>

</x-site-layout>