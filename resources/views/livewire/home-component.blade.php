<div class="container">
    <div class="jumbotron">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Add Phone Number
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent='storePhoneNumber'>
                            <div class="form-group mb-2">
                                <label>Enter Phone Number</label>
                                <input type="tel" class="form-control" placeholder="Enter Phone Number"
                                    wire:model='states.phone_number'>
                            </div>
                            @error('phone_number')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <button type="submit" class="btn btn-primary">Register User</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Send SMS message
                    </div>
                    <div class="card-body">
                        <div>
                            @if(Session::has('message'))
                            <p>{{ Session::get('message') }}
                            </p>
                            @endif
                        </div>
                        <form wire:submit.prevent='sendCustomeMessage'>
                            <div class="form-group">
                                <label>Select users to notify</label>
                                <select multiple class="form-control" wire:model='values.phone_number'>
                                    @foreach ($users as $user)
                                    <option>{{ $user->phone_number }}</option>
                                    @endforeach
                                </select>
                                @error('receivers')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label>Notification Message</label>
                                <textarea class="form-control" rows="3" wire:model='message'></textarea>
                                @error('message')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Send Notification</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>