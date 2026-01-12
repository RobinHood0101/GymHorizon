<div class="modal fade" id="exampleModalCenter" tabindex="-1"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">
                    Modal title
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="save">
                    <div class="mb-3">
                        <label class="form-label" for="name">Name der Kategorie</label>
                        <input class="form-control" type="text" name="name" id="name" value="name" autofocus wire:model.defer="name">
                        @error('name')
                        <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="btn-group mt-3">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Schliessen
                        </button>
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Erstellen</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
