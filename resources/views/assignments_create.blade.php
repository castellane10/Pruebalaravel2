@extends('layout')

@section('title', 'Crear Asignación')

@section('content')
    <h1>Crear Nueva Asignación</h1>
    <form id="assignmentForm">
        <div class="mb-3">
            <label for="assign_method" class="form-label">Método de Asignación:</label>
            <select id="assign_method" name="assign_method" class="form-select" required>
                <option value="directo">Directo</option>
                <option value="aleatorio">Aleatorio</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="request" class="form-label">Request:</label>
            <select id="request" name="request" class="form-select" required>
                <option value="">Seleccione un request</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="usuario" class="form-label">Usuario:</label>
            <select id="usuario" name="usuario" class="form-select" required>
                <option value="">Seleccione un usuario</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Crear Asignación</button>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetch('http://127.0.0.1:8000/api/requests')
                .then(response => response.json())
                .then(data => {
                    const requestSelect = document.getElementById('request');
                    data.forEach(request => {
                        const option = document.createElement('option');
                        option.value = request.id;
                        option.text = request.titulo;
                        requestSelect.add(option);
                    });
                })
                .catch(error => console.error('Error al obtener los requests:', error));

            fetch('http://127.0.0.1:8000/api/user')
                .then(response => response.json())
                .then(data => {
                    const usuarioSelect = document.getElementById('usuario');
                    data.forEach(usuario => {
                        const option = document.createElement('option');
                        option.value = usuario.id;
                        option.text = usuario.nombre;
                        usuarioSelect.add(option);
                    });
                })
                .catch(error => console.error('Error al obtener los usuarios:', error));

            const assignMethodSelect = document.getElementById('assign_method');
            const usuarioSelect = document.getElementById('usuario');

            assignMethodSelect.addEventListener('change', function() {
                const assignMethod = this.value;
                
                if (assignMethod === 'aleatorio') {
                    usuarioSelect.disabled = true;
                } else {
                    usuarioSelect.disabled = false;
                }
            });
        });

        document.getElementById('assignmentForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const assignMethodValue = document.getElementById('assign_method').value;
            const requestValue = document.getElementById('request').value;
            const usuarioSelect = document.getElementById('usuario');
            let usuarioValue = usuarioSelect.value;
            let usuarioNombre = '';

            if (assignMethodValue === 'aleatorio') {
                const options = usuarioSelect.options;
                const randomIndex = Math.floor(Math.random() * (options.length - 1)) + 1; 
                usuarioValue = options[randomIndex].value; 
                usuarioNombre = options[randomIndex].text; 
            } else {
                usuarioNombre = usuarioSelect.options[usuarioSelect.selectedIndex].text; 
            }

            alert(`Asignando la solicitud al usuario: ${usuarioNombre}`);

            fetch('http://127.0.0.1:8000/api/assignments', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                },
                body: JSON.stringify({
                    assign_method: assignMethodValue,
                    request: requestValue,
                    usuario: usuarioValue
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 201) {
                    alert('Asignación creada con éxito');
                    window.location.href = '/assignments'; 
                } else {
                    alert('Error al crear la asignación: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Ocurrió un error al enviar la asignación');
            });
        });
    </script>
@endsection
