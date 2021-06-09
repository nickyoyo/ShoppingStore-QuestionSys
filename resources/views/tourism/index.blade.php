@extends('layouts.app')

@section('content')
<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                        aaa
               
            
                    @foreach($test as $test1)
                        <div>
                           {{$test1 -> name}} - {{$test1 -> type}} - {{$test1 -> base}}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
</div>
@endsection
