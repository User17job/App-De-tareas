

const h11       = document.getElementById('h1')
const switche   = document.getElementById('onoff')
const inputE    = document.getElementById('task')
const link      = document.getElementById('link')
const tareas    = document.querySelectorAll('.form__tarea')
const deleteBs  = document.querySelectorAll('.toDo__btn2')
const cardFooter= document.querySelectorAll('.card-footer')

const luz1 = document.getElementById('luz1');
const luz2 = document.getElementById('luz2');
const luz3 = document.getElementById('luz3');
const luz4 = document.getElementById('luz4');
const luz5 = document.getElementById('luz5');
document.getElementById('onoff').addEventListener('change', cambio);      
 //funcion para cambiar el modo 
function cambio() {
const elementToHide    = document.getElementById('light-on');
const elementToHide2   = document.getElementById('light-off');
const luces            = [luz1, luz2, luz3, luz4, luz5];

if (this.checked) {
    elementToHide.style.display   = 'none';
    elementToHide2.style.display  = 'block';
    elementToHide2.style.color    = 'yellow';
    elementToHide2.style.filter   = 'drop-shadow(40px 40px 100px yellow)';
    switche.classList.add('on');
    h11.style.color="black";
    inputE.style.color='black';  
    link.style.color='black';
        // Cambia el color de fondo de todos los elementos con la clase "mi-elemento"
    tareas.forEach((elemento)       => {
        elemento.style.color = 'black';
    });
    // deleteBs.forEach((elemento)     => {
    //     elemento.style.color = 'black';
    // });
    cardFooter.forEach((elemento)   => {
        elemento.style.color = 'black';
    });
    luces.forEach(luz               => {
        luz.style.display = 'block';
        luz.classList.remove('slide-out');

        void luz.offsetWidth;
        luz.classList.add('slide-in');
    });
} else {
    elementToHide.style.display   = 'block';
    elementToHide2.style.display  = 'none';
    elementToHide2.style.color    = 'black';
    switche.classList.remove('on');
    h11.style.color="white";
    inputE.style.color='white';
    link.style.color='white';
    
    tareas.forEach((elemento)       => {
        elemento.style.color = 'white';
    });
    // deleteBs.forEach((elemento)     => {
    //     elemento.style.color = 'white';
    // });
    cardFooter.forEach((elemento)   => {
        elemento.style.color = 'white';
    });

    luces.forEach(luz               => {
        luz.classList.remove('slide-in');
        // Forzar reflujo para reiniciar la animación
        void luz.offsetWidth;
        luz.classList.add('slide-out');
        luz.addEventListener('animationend', () => {
            luz.style.display = 'none';
        }, { once: true });
    });
}
};


// $(document).ready(function() {
//     $('.form__input').on('change', function() {
//         var taskId = $(this).data('id');
//         var isChecked = $(this).is(':checked');
        
//         $.ajax({
//             url: '/todolists/' + taskId + '/complete',
//             method: 'POST',
//             data: {
//                 _token: '{{ csrf_token() }}',
//                 _method: 'PATCH', // Asegura que Laravel entiende la solicitud como PATCH
//                 completed: isChecked
//             },
//             success: function(response) {
//                 console.log('Task updated successfully');
//             },
//             error: function(response) {
//                 console.error('Error updating task');
//                 console.log(response.responseText); // Para más detalles del error
//             }
//         });
//     });
// });

// document.querySelectorAll('[id^="add-"]').forEach(button => {
//     button.addEventListener('click', function() {
//         const index = this.id.split('-')[1];
//         document.getElementById(`subtask-form-${index}`).classList.toggle('d-none');
//     });
// });

// document.querySelectorAll('[id^="completeSubtask-"]').forEach(checkbox => {
//     checkbox.addEventListener('change', function() {
//         const subtaskId = this.id.split('-')[1];
//         const isChecked = this.checked;

//         fetch(`/subtask/${subtaskId}/complete`, {
//             method: 'POST',
//             headers: {
              
//                 'Content-Type': 'application/json',
//               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
//                 'X-HTTP-Method-Override': 'PATCH' // Asegura que Laravel entiende la solicitud como PATCH
//             },
//             body: JSON.stringify({ complete: isChecked })
//         });
//     });
// });




document.querySelectorAll('[id^="add-"]').forEach(button => {
    button.addEventListener('click', function() {
        const index = this.id.split('-')[1];
        document.getElementById(`subtask-form-${index}`).classList.toggle('d-none');
    });
});
document.addEventListener('DOMContentLoaded', function () {
    // Handle task checkbox changes
    document.querySelectorAll('.task-checkbox').forEach(checkbox => {
        checkbox.addEventListener('change', function () {
            let taskId = this.dataset.id;
            let completed = this.checked;

            fetch(`/todolists/${taskId}/complete`, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                // headers: {
                //     'Content-Type': 'application/json',
                //     'X-CSRF-TOKEN': '{{ csrf_token() }}'
                // },
                // body: JSON.stringify({ completed })
                body: JSON.stringify({ completed})
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    console.log('Task updated successfully');
                }
            })
            .catch(error => {
                console.error('Error updating task', error);
            });
        });
    });

    // Handle subtask checkbox changes
    document.querySelectorAll('.subtask-checkbox').forEach(checkbox => {
        checkbox.addEventListener('change', function () {
            let subtaskId = this.dataset.id;
            let complete = this.checked;

            fetch(`/subtask/${subtaskId}/complete`, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({ complete })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    console.log('Subtask updated successfully');
                }
            })
            .catch(error => {
                console.error('Error updating subtask', error);
            });
        });
    });
});




