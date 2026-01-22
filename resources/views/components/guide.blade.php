<div class="modal fade" id="quickStartModal" tabindex="-1" aria-labelledby="quickStartLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title fw-bold" id="quickStartLabel">Willkommen bei GymHorizon!</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>
            <div class="modal-body bg-light">
                <div class="text-center mb-4">
                    <h1 class="display-6 fw-bold">Quick Start Guide</h1>
                    <p class="lead">Diese Anleitung hilft dir, direkt loszulegen.</p>
                </div>

                <div class="row g-4">

                    <!-- Allgemein -->
                    <div class="col-md-6">
                        <div class="card h-100 guide-card border-0 shadow-sm">
                            <div class="card-body d-flex align-items-start">
                                <div class="me-3 fs-2 text-primary">
                                    <i class="icon ion-information"></i>
                                </div>
                                <div>
                                    <h5 class="card-title">Verschiedene Infos</h5>
                                    <p class="card-text">Unter Allgemein findest du wichtige Infos über Ernährung, Training, Anatomie und vieles mehr.</p>
                                    <a href="{{ route('tips') }}" class="btn btn-primary btn-sm">Mehr erfahren</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Exercises -->
                    <div class="col-md-6">
                        <div class="card h-100 guide-card border-0 shadow-sm">
                            <div class="card-body d-flex align-items-start">
                                <div class="me-3 fs-2 text-primary">
                                    <i class="icon ion-ios-body"></i>
                                </div>
                                <div>
                                    <h5 class="card-title">Übungen</h5>
                                    <p class="card-text">Erstelle und verwalte neue Übungen für dein Training.</p>
                                    <a href="{{ route('exercises.index') }}" class="btn btn-primary btn-sm">Mehr erfahren</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Weekplan -->
                    <div class="col-md-6">
                        <div class="card h-100 guide-card border-0 shadow-sm">
                            <div class="card-body d-flex align-items-start">
                                <div class="me-3 fs-2 text-primary">
                                    <i class="icon ion-ios-time"></i>
                                </div>
                                <div>
                                    <h5 class="card-title">Wochenplan</h5>
                                    <p class="card-text">Erstelle individuelle Wochenpläne.</p>
                                    <a href="{{ route('week-plans.index') }}" class="btn btn-primary btn-sm">Mehr erfahren</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Training plan -->
                    <div class="col-md-6">
                        <div class="card h-100 guide-card border-0 shadow-sm">
                            <div class="card-body d-flex align-items-start">
                                <div class="me-3 fs-2 text-primary">
                                    <i class="icon ion-ios-list"></i>
                                </div>
                                <div>
                                    <h5 class="card-title">Trainingsplan</h5>
                                    <p class="card-text">Erstelle deine eigenen Trainingspläne und behalte den Überblick.</p>
                                    <a href="{{ route('training-plans.index') }}" class="btn btn-primary btn-sm">Mehr erfahren</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Schließen</button>
            </div>
        </div>
    </div>
</div>

<style>
    .guide-card {
        transition: transform 0.2s, box-shadow 0.2s;
        border-radius: 12px;
    }

    .guide-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const quickStartModal = new bootstrap.Modal(document.getElementById('quickStartModal'));
        quickStartModal.show();
    });
</script>
