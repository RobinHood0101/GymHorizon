<div>
    <form wire:submit="{{ $submitAction }}">
        <div class="mb-3">
            <label class="form-label" for="name">Name der Kategorie</label>
            <input class="form-control" type="text" name="name" id="name" value="{{ $name }}" autofocus wire:model="name">
            @error('name')
            <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="btn-group mt-3">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                Schliessen
            </button>
            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">{{ $buttonText }}</button>
        </div>
    </form>
</div>
