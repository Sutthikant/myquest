<x-site-layout title="{{$quest->title}}">
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

    
</x-site-layout>