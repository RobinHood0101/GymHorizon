<div>
    @if($exerciseCategories->isEmpty())
        <div class="alert alert-info" role="alert">
            Noch keine Kategorien vorhanden.
        </div>
    @endif
    @foreach($exerciseCategories as $exerciseCategory)
        <div class="card category-card shadow-sm" wire:key="exercise-category-{{ $exerciseCategory->id }}">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <h2 class="card-title">{{ $exerciseCategory->name }}</h2>
                    <div class="d-flex flex-column gap-2">
                        <button
                                type="button"
                                class="btn btn-warning btn-sm"
                                data-bs-toggle="modal"
                                data-bs-target="#updateModalCenter-{{ $exerciseCategory->id }}">
                            Bearbeiten
                        </button>
                        <div class="modal fade" id="updateModalCenter-{{ $exerciseCategory->id }}" tabindex="-1"
                             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">
                                            Kategorie bearbeiten
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <livewire:exercise-category-form
                                                submitAction="update"
                                                buttonText="Speichern"
                                                :name="$exerciseCategory->name"
                                                :id="$exerciseCategory->id"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button
                                class="btn btn-danger btn-sm"
                                wire:click="delete({{ $exerciseCategory->id }})"
                                wire:confirm="Sind Sie sicher, dass Sie diese Kategorie löschen wollen?">
                            Löschen
                        </button>
                    </div>
                </div>
                @if($exerciseCategory->exercises->isEmpty())
                    <p class="text-muted fst-italic">Noch keine Übungen in dieser Kategorie vorhanden.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead class="table-light">
                            <tr>
                                <th>Übung</th>
                                <th>Bemerkung</th>
                                <th>Ort</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($exerciseCategory->exercises as $exercise)
                                <tr wire:key="exercise-{{ $exercise->id }}">
                                    <td>{{ $exercise->name }}</td>
                                    <td>{{ $exercise->description }}</td>
                                    <td>{{ $exercise->place }}</td>
                                    <td class="text-center" style="width: 120px;">
                                        <div class="d-flex justify-content-center gap-2">
                                            <!-- edit -->
                                            <a wire:navigate href="{{ route('exercises.edit', $exercise->id) }}" class="btn btn-sm btn-warning" title="Bearbeiten">
                                                <i class="bi bi-pencil"></i>
                                            </a>

                                            <!-- delete -->
                                            <form action="{{ route('exercises.destroy', $exercise->id) }}" method="POST" onsubmit="return confirm('Diese Übung wirklich löschen?')" class="m-0">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" title="Löschen">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif

                <a wire:navigate href="{{ route('exercises.create') }}?category={{ $exerciseCategory->id }}"
                   class="btn btn-primary mt-3">
                    Neue Übung zu {{ $exerciseCategory->name }} hinzufügen
                </a>
            </div>
        </div>
    @endforeach
</div>
