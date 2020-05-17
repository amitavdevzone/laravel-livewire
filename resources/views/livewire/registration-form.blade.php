<div class="row">
    <div class="col-md-12">
        <form wire:submit.prevent="onSubmit">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" wire:model="name">
                @error('name') <span class="error">{{$message}}</span> @enderror
            </div>

            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" wire:model="email">
                @error('email') <span class="error">{{$message}}</span> @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" wire:model="password">
                @error('password') <span class="error">{{$message}}</span> @enderror
            </div>

            <div class="form-group">
                <label for="confirm_password">Confirm password</label>
                <input type="password" class="form-control" id="confirm_password" wire:model="confirmPassword">
                @error('confirmPassword') <span class="error">{{$message}}</span> @enderror
            </div>

            <button class="btn btn-success">Register</button>
        </form>
    </div>
</div>
