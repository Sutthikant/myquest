<x-site-layout title="Creating a new Activity">

    @if($errors->any())
        <div class="bg-red-50 rounded p-2 text-red-500">
            {{ $errors->any() ? $errors : ''}}
        </div>
    @endif

    <form action="{{route('user.activities.store')}}" method="post" class="flex flex-col gap-4">
        @csrf

        <x-form-text label="Name" name="name"/>

        <div class="mt-4 flex justify">
            <button type="submit" class="p-1 bg-teal-500 text-white rounded">Create</button>
        </div>
    </form>

</x-site-layout>