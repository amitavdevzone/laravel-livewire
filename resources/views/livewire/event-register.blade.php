<div class="content">
    <h2>Event name: {{$event->event_name}}</h2>
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <p>Contact person: {{$event->contact_person}}</p>
                    <p>Contact email: <a href="mailto:{{$event->contact_email}}">{{$event->contact_email}}</a></p>

                    @if($event->allowed_participant !== 0)
                        <p>Total seats: {{$event->allowed_participant}}</p>
                        <p>Seats available: {{$event->allowed_participant - $event->registered_participant}}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <p>If you are interested to join this event, enter your email address below:</p>

                    <form wire:submit.prevent="submit" class="w-50">
                        <div class="form-group">
                            <input type="text" name="name" id="name" class="form-control"
                                   wire:model="name" placeholder="Enter your name" autocomplete="off"
                                   tabindex="1">
                            @error('name')
                            <div class="error">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="text" name="email_address" id="email_address" class="form-control"
                                   wire:model="email" placeholder="Enter your email address" autocomplete="off"
                                   tabindex="2">
                            @error('email')
                            <div class="error">{{$message}}</div>
                            @enderror
                        </div>

                        <button class="btn btn-success">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
