<x-site-layout title="List of all Activities">

    @if( session('success_message') !== null)
        <div class="bg-green-50 text-green-500 p-2 rounded">
            {{session('success_message')}}
        </div>
    @endif

    <div class="flex justify-end w-full mb-4">
        <a href="{{route('user.activities.create')}}" class="p-1 bg-teal-500 text-white rounded">Create new activity</a>
    </div>

    @foreach($activities as $activity)
        <div class="bg-white p-1 mb-1 flex flex-row justify-between">
            <h2 class="text-lg font-bold">{{$activity->name}}</h2>
            <div class="flex gap-2 text-sm">
                    <a href="{{route('user.activities.edit', ['activity' => $activity->id])}}" class="text-blue-500">Edit</a>

                    <form action="{{route('user.activities.destroy', ['activity' => $activity->id])}}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="text-blue-500">Delete</button>
                    </form>
            </div>
        </div>
    @endforeach

</x-site-layout>