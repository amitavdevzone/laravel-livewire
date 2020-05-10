<div>
    <p>This is my counter component {{$count}}</p>
    <p>
        <button wire:click="increment">Add</button>
        <button wire:click="decrement">Remove</button>
    </p>

    <p><input type="text" wire:model.lazy="name" /></p>

    @if(!$user == null)
    <p>
        Name: {{$user->name}}
        <br>
        Email: {{$user->email}}
    </p>
    @endif
</div>
