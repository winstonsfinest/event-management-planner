@extends('admin.layouts.app')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Events</h1>
                    </div>

                </div>
            </div>
        </section>

        <section class="content">

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Upcoming Events</h3>

                    <div class="card-tools">
                        <a href="{{ route('admin.events.add') }}" class="btn btn-primary float-end">Add Event</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped" data-order="[[ 1, &quot;desc&quot; ]]">
                        <thead>
                        <tr>
                            <th scope="col">Date</th>
                            <th scope="col">Client</th>
                            <th scope="col">Location</th>
                            <th scope="col">Event Type</th>
                            <th scope="col">Pax</th>
                            <th scope="col">Action</th>
                            <th scope="col">Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                        $currentMonth = null;
                        @endphp

                        @foreach($events->sortBy('date') as $event)
                            @if(\Carbon\Carbon::parse($event->date)->addHours(6)->lt(\Carbon\Carbon::now()))
                                @continue
                            @endif

                            @if(\Carbon\Carbon::parse($event->date)->month != $currentMonth)
                                @php
                                $currentMonth = \Carbon\Carbon::parse($event->date)->month;
                                @endphp
                                <tr>
                                    <td colspan="7" class="bg-dark">{{ \Carbon\Carbon::parse('2022-'.$currentMonth.'-01')->format('F') }}</td>
                                </tr>
                            @endif
                            <tr>
                                <td>{{ $event->date }}</td>
                                <td>{{ $event->client->business_name ?? '' }}</td>
                                <td>{{ $event->location->name ?? '' }}</td>
                                <td>{{ $event->event_style }}</td>
                                <td>{{ $event->pax }}</td>
                                <td>
                                    <a class="btn btn-sm btn-primary"
                                       href="{{ route('admin.events.edit', $event) }}">Edit</a>
                                    <a class="btn btn-sm btn-primary"
                                       href="{{ route('admin.events.show', $event) }}">View</a>
                                </td>
                                <td>
                                    <button type="button"
                                            class="btn btn-sm btn-danger"
                                            onclick="deleteEvent({{ $event->id }})">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">All Events</h3>

                    <div class="card-tools">
                        <a href="{{ route('admin.events.add') }}" class="btn btn-primary float-end">Add Event</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped dataTable" data-order="[[ 0, &quot;desc&quot; ]]">
                        <thead>
                        <tr>
                            <th scope="col">Date</th>
                            <th scope="col">Client</th>
                            <th scope="col">Location</th>
                            <th scope="col">Event Type</th>
                            <th scope="col">Pax</th>
                            <th scope="col">Action</th>
                            <th scope="col">Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($events as $event)
                            <tr>
                                <td>{{ $event->date }}</td>
                                <td>{{ $event->client->business_name ?? '' }}</td>
                                <td>{{ $event->location->name ?? '' }}</td>
                                <td>{{ $event->event_style }}</td>
                                <td>{{ $event->pax }}</td>
                                <td>
                                    <a class="btn btn-sm btn-primary"
                                       href="{{ route('admin.events.edit', $event) }}">Edit</a>
                                    <a class="btn btn-sm btn-primary"
                                       href="{{ route('admin.events.show', $event) }}">View</a>
                                </td>
                                <td>
                                    <button type="button"
                                            class="btn btn-sm btn-danger"
                                            onclick="deleteEvent({{ $event->id }})">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>

@endsection

@push('js')
    <script>
        function deleteEvent(eventId) {
            if (!confirm('Are you sure you want to delete this event?')) {
                return;
            }

            $.ajax({
                url: `/events/${eventId}/delete`,
                type: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.success) {
                        $('tr').each(function() {
                            if ($(this).find('button[onclick="deleteEvent(' + eventId + ')"]').length > 0) {
                                $(this).fadeOut(function() {
                                    $(this).remove();
                                });
                            }
                        });
                        tata.success('Success', 'Event deleted successfully');
                    } else {
                        tata.error('Error', 'Failed to delete event');
                    }
                },
                error: function() {
                    tata.error('Error', 'Failed to delete event');
                }
            });
        }
    </script>
@endpush
