@extends('layouts.app')
@section('content')

    <livewire:popular-games/>

    <div class="flex flex-col lg:flex-row my-10">
        <livewire:highest-rated/>

        <div class="w-full lg:w-1/4 mt-12 lg:mt-0">
            <livewire:most-anticipated/>
            <livewire:coming-soon/>
        </div>

    </div>

@endsection
