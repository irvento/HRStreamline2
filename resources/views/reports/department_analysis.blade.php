@extends('reports.index')

@section('content')

<h3 class="text-2xl font-semibold text-white">Department Analysis</h3>
<br><br>

<!-- Card Grid Container -->
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-6">

    @foreach ($departmentInfo as $info)
        <!-- Generate Random Gradient -->
        @php
            $colors = [
                ['from-blue-400', 'to-blue-600'],
                ['from-green-400', 'to-green-600'],
                ['from-red-400', 'to-red-600'],
                ['from-purple-400', 'to-purple-600'],
                ['from-pink-400', 'to-pink-600'],
                ['from-yellow-400', 'to-yellow-600']
            ];
            $randomGradient = $colors[array_rand($colors)];
        @endphp

        <!-- Department Card with Random Gradient -->
        <div class="bg-gradient-to-r {{ $randomGradient[0] }} {{ $randomGradient[1] }} rounded-lg shadow-lg p-6 flex flex-col">
            <h4 class="text-xl font-semibold text-white mb-4">{{ $info['department']->department_name }}</h4>
            
            <div class="flex flex-col space-y-2">
                <!-- Employee Count -->
                <div class="flex items-center">
                    <span class="text-sm font-medium text-white">Employee Count:</span>
                    <span class="ml-2 text-lg font-semibold text-white">{{ $info['employee_count'] }}</span>
                </div>
                
                <!-- Department Head -->
                <div class="flex items-center">
                    <span class="text-sm font-medium text-white">Department Head:</span>
                    <span class="ml-2 text-lg font-semibold text-white">{{ $info['department_head'] }}</span>
                </div>
            </div>
        </div>
    @endforeach

</div>
<style>
    @media print {
        body * {
            visibility: hidden;
        }
        table, table * {
            visibility: visible;
        }
        table {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
        }
    }
</style>

@endsection
