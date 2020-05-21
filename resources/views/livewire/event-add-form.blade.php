<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add new Event</div>
                    <div class="card-body">
                        <form wire:submit.prevent="submit">
                            <div class="form-group">
                                <label for="event_name">Event name</label>
                                <input type="text" name="event_name" id="event_name" class="form-control"
                                       wire:model="eventName">
                                @error('eventName')
                                <div class="error">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="contact_name">Contact name</label>
                                <input type="text" name="contact_name" id="contact_name" class="form-control"
                                       wire:model="contactName">
                                @error('contactName')
                                <div class="error">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="content_email">Contact email</label>
                                <input type="text" name="content_email" id="content_email" class="form-control"
                                       wire:model="contactEmail">
                                @error('contactEmail')
                                <div class="error">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="allowed_participants">Allowed participants</label>
                                <input type="text" name="allowed_participants" id="allowed_participants"
                                       class="form-control" wire:model="allowedParticipants">
                                <small>Keep the value to 0 in case it's unlimited</small>
                                @error('allowedParticipants')
                                <div class="error">{{$message}}</div>
                                @enderror
                            </div>
                            <button class="btn btn-success mr-4">Save</button>
                            <a href="{{route('home')}}">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
