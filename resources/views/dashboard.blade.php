<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Calendar Section -->
            <div class="mt-8 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold">Calendar</h3>
                    <div id="calendar"></div> <!-- Calendar container -->
                </div>
            </div>
        </div>
    </div>

    <!-- Include FullCalendar JavaScript and CSS -->
    @push('styles')
        <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.css" rel="stylesheet">
        
        <!-- Custom Styles for Calendar -->
        <style>
            #calendar {
                max-width: 100%;
                margin: 0 auto;
                padding: 10px;
                background-color: rgb(182, 212, 243); /* Light background */
                border-radius: 8px;
                height: 600px; /* Set a fixed height */
            }
        </style>
    @endpush

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const calendarEl = document.getElementById('calendar');
                const tasks = @json($tasks); // Pass tasks data to JavaScript
                
                console.log('Tasks:', tasks); // Debugging - Ensure tasks are formatted correctly

                // Format tasks as events for FullCalendar
                const events = tasks.map(task => ({
                    title: task.title,
                    start: task.due_date, // Task due date as event start date
                    color: 'blue' // Customize event color if needed
                }));

                // Initialize FullCalendar
                const calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth', // Default view is monthly grid
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay'
                    },
                    events: events, // Pass events to FullCalendar
                    eventClick: function (info) {
                        alert('Task: ' + info.event.title); // Handle event clicks
                    }
                });

                calendar.render(); // Render the calendar
            });
        </script>
    @endpush
</x-app-layout>
