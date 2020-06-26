<?php

namespace App\Http\Livewire;

use App\Models\Download;
use App\Models\Event;
use App\Services\FileHelper;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class EventAddForm extends Component
{
    use WithFileUploads;

    public $eventName;
    public $contactName;
    public $contactEmail;
    public $allowedParticipants;
    public $banner;
    public $event;
    public $fields;
    public $downloads;

    public $listeners = [
        'file_upload_end' => 'handleFileUploaded'
    ];

    public function mount($event)
    {
        $this->event = null;
        $this->banner = null;
        $this->downloads = [];
        $this->fields = 1;

        if ($event) {
            $this->event = $event;
            $this->eventName = $this->event->event_name;
            $this->contactName = $this->event->contact_person;
            $this->contactEmail = $this->event->contact_email;
            $this->allowedParticipants = $this->event->allowed_participant;
        }
    }

    public function handleFileUploaded($file)
    {
        $this->downloads[] = $file;
        unset($file);
    }

    public function handleAddField()
    {
        $this->fields = $this->fields + 1;
    }

    public function submit()
    {
        $edit = $this->event ? true : false;

        $rules = [
            'eventName' => ['required', 'min:3'],
            'contactName' => ['required', 'min:3'],
            'contactEmail' => ['required', 'email'],
            'allowedParticipants' => ['required', 'numeric'],
        ];

        if (!$edit) {
            $rules['banner'] = ['required', 'file'];
        }

        $this->validate($rules);

        $event = [
            'event_name' => $this->eventName,
            'contact_person' => $this->contactName,
            'contact_email' => $this->contactEmail,
            'allowed_participant' => $this->allowedParticipants,
        ];

        if ($this->banner) {
            $event['banner'] = $this->banner->store('public/banners');
        }

        if ($edit) {
            $this->handleEventUpload($event);
        } else {
            $event['identifier'] = Str::random(10);
            Event::create($event);
        }

        if (count($this->downloads) > 0) {
            $this->handleEventDownloads();
        }

        return $this->redirectRoute('home');
    }

    public function render()
    {
        return view('livewire.event-add-form');
    }

    private function handleEventUpload($event)
    {
        if ($this->banner !== null) {
            Storage::delete($this->event->banner);
        }

        Event::find($this->event->id)
            ->update($event);
    }

    private function handleEventDownloads()
    {
        foreach ($this->downloads as $key => $download) {
            $info = FileHelper::getFileInfo($download['data']);
            $fileName = $download['filename'] . Str::random(5) . ".{$info['file_extension']}";
            try {
                $path = "public/downloads/{$fileName}";

                Storage::put($path, $info['decoded_file']);

                Download::create([
                    'filename' => $download['filename'],
                    'path' => $path,
                    'event_id' => $this->event->id,
                ]);
            } catch (\Exception $e) {
                logger($e->getMessage());
            }
        }
    }
}
