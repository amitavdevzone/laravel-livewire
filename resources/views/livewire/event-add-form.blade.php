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
                            <div class="form-group">
                                <label for="banner">Event banner</label>
                                <input type="file" name="banner" id="banner"
                                       class="form-control" wire:model="banner">
                                @error('banner')
                                <div class="error">{{$message}}</div>
                                @enderror
                                @if ($banner)
                                    <img src="{{ $banner->temporaryUrl() }}" class="w-50 p-4">
                                @endif
                                @if (!$banner && isset($event->banner))
                                    <img src="{{ Storage::url($event->banner) }}" class="w-50 p-4">
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <label for="downloads">Downloads</label>
                                        @for($i = 0; $i < $fields; $i++)
                                            <input type="file" id="downloads"
                                                   class="form-control mb-2"
                                                   wire:change="$emit('file_upload_start')">
                                        @endfor
                                    </div>
                                    <div class="form-group">
                                        <a class="btn btn-primary" href="#" wire:click.prevent="handleAddField">Add
                                            file</a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    @if (isset($event->downloads))
                                        <ul>
                                            @foreach($event->downloads as $download)
                                                <li>
                                                    <a href="{{Storage::url($download->path)}}">{{$download->filename}}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
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
