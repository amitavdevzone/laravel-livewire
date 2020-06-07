<div>
    <table class="table table-hover table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Identifier</th>
            <th>Event name</th>
            <th>Contact person</th>
            <th>Contact email</th>
            <th>Allowed</th>
            <th>Registered</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($events as $event)
            <tr>
                <td>{{$event->id}}</td>
                <td>{{$event->identifier}}</td>
                <td>{{$event->event_name}}</td>
                <td>{{$event->contact_person}}</td>
                <td>{{$event->contact_email}}</td>
                <td>{{$event->allowed_participant}}</td>
                <td>{{$event->registered_participant}}</td>
                <td><a href="{{route('event.view', ['event' => $event->id])}}">View</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
