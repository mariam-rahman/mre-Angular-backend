<div>
    <form wire:submit.prevent>
        <div class="form-group">
        
            <label><strong>Email</strong></label>
            <input type="email" wire:model='email' class="form-control">
            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label><strong>Password</strong></label>
            <input type="password" wire:model='password' class="form-control">
            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-row d-flex justify-content-between mt-4 mb-2">


            <div class="form-group">
                <a href="#">Forgot Password?</a>
            </div>
        </div>
        <div class="text-center">
            <button class="btn btn-primary btn-block" wire:click="login()">Sign in</button>
        </div>
    </form>
</div>