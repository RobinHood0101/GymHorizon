'use strict';

/* TODO: In Alpine JS schreiben*/
/* https://wireui.dev/getting-started */


document.addEventListener('DOMContentLoaded', () => {

    const addExerciseBtn = document.querySelector('#add-exercise-btn');
    const exercisesContainer = document.querySelector('#exercise-container');
    const form = document.querySelector('form');
    let isFormDirty = false;

    // check if on edit page
/*    if (existingExercises !== undefined) {
        console.log(existingExercises);
        showExistingExercises();
    }*/

    // Mark form as "dirty" when user changes something
    document.querySelectorAll('input, textarea, select').forEach(element => {
        element.addEventListener('change', () => isFormDirty = true);
    });

    // Warn user before leaving unsaved form
    window.addEventListener('beforeunload', (e) => {
        if (isFormDirty) {
            e.preventDefault();
        }
    });

    // Reset dirty state on submit
    if (form) {
        form.addEventListener('submit', () => isFormDirty = false);
    }

    // Add new exercise
    if (addExerciseBtn && exercisesContainer) {
        addExerciseBtn.addEventListener('click', (e) => {
            e.preventDefault();

            const exerciseCount = exercisesContainer.children.length + 1;

            const newExerciseDiv = document.createElement('div');
            newExerciseDiv.classList.add('exercise', 'mb-4');

            // map data to options
            const optionsHTML = exerciseCategories.map(cat => {
                const exerciseOptions = cat.exercises
                    .map(ex => `<option value="${ex.id}">${ex.name}</option>`)
                    .join('');
                return `<optgroup label="${cat.name}">${exerciseOptions}</optgroup>`;
            }).join('');

            newExerciseDiv.innerHTML = `
                <div class="exercise-card">
                  <h5 class="fw-semibold mb-3">Übung ${exerciseCount}</h5>
                  <div class="exercise-entry row g-3 align-items-end p-3 border rounded-3 bg-light shadow-sm">
                        
                    <div class="col-lg-3 col-md-4">
                      <label class="form-label mb-1">Übung</label>
                      <select class="form-select exercise-select" name="exercises[]" style="width: 100%;">
                        <option selected disabled>Wähle...</option>
                        ${optionsHTML}
                      </select>
                    </div>
        
                    <div class="col-lg-2 col-md-4">
                      <label class="form-label mb-1">Gewicht (kg)</label>
                      <input type="number" class="form-control" name="weights[]">
                    </div>
        
                    <div class="col-lg-2 col-md-4">
                      <label class="form-label mb-1">Wdh.</label>
                      <input type="number" class="form-control" name="reps[]">
                    </div>
        
                    <div class="col-lg-2 col-md-4">
                      <label class="form-label mb-1">Sätze</label>
                      <input type="number" class="form-control" name="sets[]">
                    </div>
        
                    <div class="col-lg-3 col-md-4 d-flex justify-content-end">
                      <button type="button" class="btn btn-outline-danger w-100 remove-exercise-btn">
                        <i class="bi bi-trash me-1"></i> Entfernen
                      </button>
                    </div>
        
                  </div>
                </div>
            `;

            exercisesContainer.appendChild(newExerciseDiv);

            // search select2
            $(newExerciseDiv).find('.exercise-select').select2({
                theme: 'bootstrap-5',
                placeholder: 'Übung suchen…',
                allowClear: true,
                width: '100%',
            });


            const removeBtn = newExerciseDiv.querySelector('.remove-exercise-btn');
            removeBtn.addEventListener('click', () => removeExercise(newExerciseDiv));

            isFormDirty = true;
        });
    }

    // delete exercise
    function removeExercise(exerciseDiv) {
        exerciseDiv.style.transition = 'opacity 0.3s ease';
        exerciseDiv.style.opacity = 0;

        setTimeout(() => {
            exerciseDiv.remove();
            updateExerciseHeaders();
        }, 300);
    }

    // update headers
    function updateExerciseHeaders() {
        document.querySelectorAll('#exercise-container .exercise').forEach((exerciseDiv, index) => {
            const header = exerciseDiv.querySelector('h5');
            if (header) header.textContent = `Übung ${index + 1}`;
        });
    }

    function showExistingExercises() {
        const optionsHTML = exerciseCategories.map(cat => {
            const exerciseOptions = cat.exercises
                .map(ex => `<option value="${ex.id}">${ex.name}</option>`)
                .join('');
            return `<optgroup label="${cat.name}">${exerciseOptions}</optgroup>`;
        }).join('');


        existingExercises.forEach((exercise) => {
            console.log(exercise);
            const newExerciseDiv = document.createElement('div');
            newExerciseDiv.classList.add('exercise', 'mb-4');
            newExerciseDiv.innerHTML = `
                <div class="exercise-card">
                  <h5 class="fw-semibold mb-3">Übung </h5>
                  <div class="exercise-entry row g-3 align-items-end p-3 border rounded-3 bg-light shadow-sm">
                        
                    <div class="col-lg-3 col-md-4">
                      <label class="form-label mb-1">Übung</label>
                      <select class="form-select exercise-select" name="exercises[]" style="width: 100%;">
                        ${optionsHTML}
                      </select>
                    </div>
        
                    <div class="col-lg-2 col-md-4">
                      <label class="form-label mb-1">Gewicht (kg)</label>
                      <input type="number" class="form-control" name="weights[]" value="${exercise.pivot.weight}">
                    </div>
        
                    <div class="col-lg-2 col-md-4">
                      <label class="form-label mb-1">Wdh.</label>
                      <input type="number" class="form-control" name="reps[]" value="${exercise.pivot.repetitions}">
                    </div>
        
                    <div class="col-lg-2 col-md-4">
                      <label class="form-label mb-1">Sätze</label>
                      <input type="number" class="form-control" name="sets[]" value="${exercise.pivot.sets}">
                    </div>
        
                    <div class="col-lg-3 col-md-4 d-flex justify-content-end">
                      <button type="button" class="btn btn-outline-danger w-100 remove-exercise-btn">
                        <i class="bi bi-trash me-1"></i> Entfernen
                      </button>
                    </div>
        
                  </div>
                </div>
            `;

            exercisesContainer.appendChild(newExerciseDiv);
        });
    }
});
