<div>

    <form wire:submit="save">
        @csrf
        <div class="form-group">
            <label for="" class="form-label">Name</label>
            <input wire:model="name" name="name" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="" class="form-label">Email</label>
            <input wire:model="email" name="email" type="email" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary mt-2" wire:loading.attr="disabled">
            <span wire:loading.remove>Submit</span>
            <span wire:loading>
                <span class="spinner-border spinner-border-sm me-1" role="status " aria-hidden="true"></span>
                Loading...
            </span>
        </button>
        @if ($errors->any())
            <div class="alert alert-danger mt-2">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>
    <table class="table table-bordered mt-2">
        <tr>
            <thead>
                <th>Name</th>
                <th>Email</th>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                    <tr>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </tr>
    </table>
</div>
