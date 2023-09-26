@extends('layouts.app')

@section('content')
    <h2>Select Reference Period</h2>
    <input type="date" id="startDate" name="startDate">
    <input type="date" id="endDate" name="endDate">
    <button id="searchButton">Search</button>

    <h2>CV Data for the Selected Period</h2>
    <table>
        <thead>
            <tr>
                <th>Name----</th>
                <th>Date of Birth------</th>
                <th>Skills------</th>
            </tr>
        </thead>
        <tbody id="cvData">
        </tbody>
    </table>        

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>

        $('#searchButton').on('click', function() {
        const startDate = $('#startDate').val();
        const endDate = $('#endDate').val();

        $.ajax({
            url: '/fetch-cv-data',
            type: 'GET',
            data: { startDate: startDate, endDate: endDate },
            success: function(data) {
                const cvData = data.cvData;

                // Clear previous data
                $('#cvData').empty();

                cvData.forEach(cv => {
                    const row = `<tr>
                                    <td>${cv.firstName} ${cv.middleName} ${cv.lastName}</td>
                                    <td>${cv.birthday}</td>
                                    <td>${cv.skills}</td>
                                </tr>`;
                    $('#cvData').append(row);
                });
            }
        });
    });
    </script>
@endsection