<div class="container my-5">
    <div class="card shadow-sm p-4 p-md-5 bg-light rounded">
        <div class="text-center mb-4">
            <h1 class="display-4 fw-bold">Quick Start Guide</h1>
            <p class="lead">Willkommen bei GymHorizon! Diese Anleitung hilft dir, direkt loszulegen.</p>
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
                            <p class="card-text">Unter Allgemein findest du wichtige Infos über Ernährung, Training, Anatomie und vieles mehr</p>
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
                            <a href="{{ route('nutrition') }}" class="btn btn-primary btn-sm">Mehr erfahren</a>
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
                            <a href="{{ route('training-plans.index') }}" class="btn btn-primary btn-sm">Mehr
                                erfahren</a>
                        </div>
                    </div>
                </div>
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
