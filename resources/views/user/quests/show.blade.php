<x-site-layout title="{{$quest->title}}">

    @if(session('success_message') !== null)
        <div class="bg-green-50 text-green-500 p-2 rounded flex">
            {{session('success_message')}}
        </div>
    @endif

    <div>
        Created by: {{$quest->user->name}}<br/>
        Reward: {{$quest -> reward}}
    </div>

    <div>
        Todoes:<br/>
        @foreach($quest->todos as $todo)
            <!-- <input type="checkbox" id="act-{{$todo -> activity_id}}" value="{{$todo -> activity_id}}" @checked($todo->done)/>
            <label for="act-{$todo -> activity_id}}">{{\App\Models\Activity::find($todo->activity_id) -> name}}</label><br/> -->

            {{\App\Models\Activity::find($todo->activity_id) -> name}} <br/>
        @endforeach
    </div>
    <div>
        <div class="w-full text-center mt-6">
            <a class="p-2 bg-pink-500 text-white hover:bg-pink-700 rounded text-sm uppercase" href="{{route('user.quests.edit', ['quest' => $quest->id])}}">Edit</a>
        </div>
        <div class="w-full text-center mt-6">
            <form action="{{route('user.quests.destroy', ['quest' => $quest->id])}}" method="post">
                @method('DELETE')
                @csrf
                <button class="p-2 bg-pink-500 text-white hover:bg-pink-700 rounded text-sm uppercase" type="submit" >Delete</button>
            </form>
        </div>
        <div class="w-full text-center mt-6">
            <a class="p-2 bg-pink-500 text-white hover:bg-pink-700 rounded text-sm uppercase" href="/user/quests">Check out the other quests</a>
        </div>
    </div>


</x-site-layout>