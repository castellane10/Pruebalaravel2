@extends('layout')

@section('title', 'Crear Request')

@section('content')
    <h1>Crear Nuevo Request</h1>

    <form id="requestForm">
        <div class="mb-3">
            <label for="titulo" class="form-label">Título:</label>
            <input type="text" id="titulo" name="titulo" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción:</label>
            <textarea id="descripcion" name="descripcion" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label for="estado" class="form-label">Estado:</label>
            <select id="estado" name="estado" class="form-select" required>
                <option value="Prioridad baja">Prioridad baja</option>
                <option value="Prioridad media">Prioridad media</option>
                <option value="Prioridad alta">Prioridad alta</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Crear Request</button>
    </form>

    <script>
        document.getElementById('requestForm').addEventListener('submit', function(event) {
            event.preventDefault(); 
            const titulo = document.getElementById('titulo').value;
            const descripcion = document.getElementById('descripcion').value;
            const estado = document.getElementById('estado').value;

            fetch('http://127.0.0.1:8000/api/requests', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                },
                body: JSON.stringify({
                    titulo: titulo,
                    descripcion: descripcion,
                    estado: estado
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 201) {
                    alert('Request creado con éxito');
                    window.location.href = '/requests'; 
                } else {
                    alert('Error al crear el request: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Ocurrió un error al enviar el request');
            });
        });
    </script>
@endsection
