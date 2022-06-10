@extends('layouts.app')
@section('content')

    <livewire:popular-games/>

    <div class="flex flex-col lg:flex-row my-10">
        <livewire:recently-reviewed/>

        {{--        Most Anticipated--}}
        <div class="w-full lg:w-1/4 mt-12 lg:mt-0">

            <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Most Anticipated</h2>
            <div class="space-y-10 mt-8">

            </div>

            <livewire:coming-soon/>

        </div>
    </div>

@endsection
