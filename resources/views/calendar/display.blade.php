@extends('layouts.app')
@section('content')
<div id="calendar"></div>
@include('calendar.modalbooking')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar(calendarEl, {
            plugins: [ dayGridPlugin, timeGridPlugin, listPlugin, interactionPlugin ],
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title'
            },
            slotDuration: '00:10:00',
            defaultDate: '2026-04-01',
            editable: true,
            events: '{{ route('calendar.json') }}',
            dateClick: function(info) {
                document.getElementById('starttime').value = info.date.toISOString().substring(11, 16);
                document.getElementById('bookingDate').value = info.date.toISOString().substring(0, 10);
                var modalElement = document.getElementById('fullCalModal');
                var modal = new bootstrap.Modal(modalElement);
                modal.show();
            },
        });
        calendar.render();
    });

    document.addEventListener("DOMContentLoaded", () => {
        document.getElementById("submitButton").addEventListener("click", function (e) {
            e.preventDefault();
            const form = document.getElementById("bookingForm");
            form.submit();
            const modal = bootstrap.Modal.getInstance(document.getElementById("fullCalModal"));
            modal.hide();
        });
    });
</script>
@endsection
