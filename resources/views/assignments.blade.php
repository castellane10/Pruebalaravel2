@extends('layout')

@section('title', 'Lista de Assignments')

@section('content')
    <h1>Lista de Assignments</h1>
    <table class="table table-bordered" id="assignmentsTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Request ID</th>
                <th>Usuario</th>
                <th>Método de Asignación</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>

    <script>
        fetch('http://127.0.0.1:8000/api/assignments')
            .then(response => response.json())
            .then(data => {
                const tableBody = document.querySelector('#assignmentsTable tbody');
                
                if (data.message) {
                    const row = `<tr><td colspan="4" class="text-center">${data.message}</td></tr>`;
                    tableBody.innerHTML += row;
                } else {
                    data.forEach(assignment => {
                        const row = `<tr>
                            <td>${assignment.id}</td>
                            <td>${assignment.request}</td>
                            <td>${assignment.usuario}</td>
                            <td>${assignment.assign_method}</td>
                        </tr>`;
                        tableBody.innerHTML += row;
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                const tableBody = document.querySelector('#assignmentsTable tbody');
                const row = `<tr><td colspan="4" class="text-center">Ocurrió un error al obtener los assignments</td></tr>`;
                tableBody.innerHTML += row;
            });
    </script>
@endsection
