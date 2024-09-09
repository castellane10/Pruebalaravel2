@extends('layout')

@section('title', 'Lista de Requests')

@section('content')
    <h1>Lista de Requests</h1>
    <table class="table table-bordered" id="requestsTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Descripción</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>

    <script>
        // Consumir API para obtener requests
        fetch('http://127.0.0.1:8000/api/requests')
            .then(response => response.json())
            .then(data => {
                const tableBody = document.querySelector('#requestsTable tbody');
                
                // Iterar sobre los datos y añadir las filas a la tabla
                data.forEach(request => {
                    const row = `<tr>
                        <td>${request.id}</td>
                        <td>${request.titulo}</td>
                        <td>${request.descripcion}</td>
                        <td>${request.estado}</td>
                    </tr>`;
                    tableBody.innerHTML += row;
                });
            })
            .catch(error => {
                console.error('Error al obtener los requests:', error);
                const tableBody = document.querySelector('#requestsTable tbody');
                const row = `<tr><td colspan="4" class="text-center">Ocurrió un error al cargar los requests.</td></tr>`;
                tableBody.innerHTML += row;
            });
    </script>
@endsection
