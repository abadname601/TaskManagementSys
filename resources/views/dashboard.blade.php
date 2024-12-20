@section('title', 'TaskMaster - Dashboard')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6"> 
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex flex-col justify-center items-center text-center">
                    <h1 class="text-gray-900 mb-2" style="font-size: 3.5rem; font-weight: 900;">TaskMaster</h1> 
                    <p>{{ __("Let's turn your to-dos into accomplishments, one step at a time!") }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Task Summary and Task Categories Overview -->
    <div class="py-6"> 
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 grid grid-cols-2 gap-6">
                    
                    <!-- Task Summary -->
                    <div>
                        <h3 class="text-lg font-semibold mb-4">Task Summary</h3>
                        <div class="grid grid-cols-1 gap-4">
                            <div class="bg-blue-500 text-white p-4 rounded flex flex-col justify-between">
                                <h3 class="font-bold">Total Tasks</h3>
                                <p class="text-lg">{{ $totalTasks }}</p>
                            </div>
                            <div class="p-4 rounded flex flex-col justify-between" style="background-color: #FF8C00; color: #FFFFFF;">
                                <h3 class="font-bold">Tasks Due Today</h3>
                                <p class="text-lg">{{ $tasksDueToday }}</p>
                            </div>
                            <div class="bg-green-500 text-white p-4 rounded flex flex-col justify-between">
                                <h3 class="font-bold">Completed Tasks</h3>
                                <p class="text-lg">{{ $completedTasks }}</p>
                            </div>
                            <div class="bg-red-500 text-white p-4 rounded flex flex-col justify-between">
                                <h3 class="font-bold">Overdue Tasks</h3>
                                <p class="text-lg">{{ $overdueTasks }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Task Categories Overview -->
                    <div>
                        <h3 class="text-lg font-semibold mb-4">Task Categories Overview</h3>
                        <div style="width: 100%; height: 400px;">
                            <canvas id="categoryChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const ctx = document.getElementById('categoryChart').getContext('2d');
        const categoryChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: @json($tasksByCategory->pluck('category')),
                datasets: [{
                    label: 'Tasks by Category',
                    data: @json($tasksByCategory->pluck('count')),
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0'],
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false 
            }
        });
    </script>


    <!-- Calendar Overview -->
    <div class="py-6"> 
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Calendar Overview</h3>
                    <div id="calendar" style="width: 100%; height: 500px;"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');
            
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,dayGridWeek,timeGridDay'
                },
                events: @json($tasks->map(function ($task) {
                    return [
                        'title' => $task->title,
                        'start' => $task->deadline ? $task->deadline->toIso8601String() : null
                    ];
                })).filter(event => event.start !== null)
            });

            calendar.render();
        });
    </script>

</x-app-layout>
