<!DOCTYPE html>
<html>
    <head>
        <title>Hello World</title>
        <style>
            .modal {
                display: none;
                position: fixed;
                top: 18%;
                right: 70%;
                width: 250px; 
                background-color: white;
                padding: 20px;
                border: 1px solid #ccc;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                border-radius: 5px;
                z-index: 999;
            }
            .modal-content {
                display: flex;
                flex-direction: column;
            }
        </style>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
        <div>@yield('content')</div>

            <script>
            document.getElementById("university").selectedIndex = 0;
            </script>
            <script>
            document.getElementById("technology").selectedIndex = 0;
            </script>

            <script>
                function fetchOptions(url, selectId) {
                    const selectElement = document.getElementById(selectId);

                    fetch(url)
                        .then(response => response.json())
                        .then(data => {
                            data.forEach(option => {
                                const optionElement = document.createElement('option');
                                optionElement.value = option.id;
                                optionElement.textContent = option.name;
                                selectElement.appendChild(optionElement);
                            });
                        });
                }
                fetchOptions('/university-options', 'university');
                fetchOptions('/technology-options', 'technology');
            </script>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function() {
                
                    function getCsrfToken() {
                        return $('meta[name="csrf-token"]').attr('content');
                    }
            
                    $('#addTechnologyButton').on('click', function() {
                        const technology = prompt('Enter a new technology:');
                        if (technology) {
                            $.ajax({
                                url: '{{ route('cv.addTechnology') }}',
                                type: 'POST',
                                data: { technology: technology },
                                headers: {
                                    'X-CSRF-TOKEN': getCsrfToken()
                                },
                                success: function(data) {
                                    $('#technology').append(`<option value="${data.id}">${data.name}</option>`);
                                }
                            });
                        }
                    });
            
                    $('#addUniversityButton').on('click', function() {
                        const university = prompt('Enter a new university:');
                        if (university) {
                            $.ajax({
                                url: '{{ route('cv.addUniversity') }}',
                                type: 'POST',
                                data: { university: university },
                                headers: {
                                    'X-CSRF-TOKEN': getCsrfToken()
                                },
                                success: function(data) {
                                    $('#university').append(`<option value="${data.id}">${data.name}</option>`);
                                }
                            });
                        }
                    });
                });
            </script>

            <script>
                function redirectToSecondPage() {
                    window.location.href = "{{ route('second-page') }}";
                }
            </script>
    </body>
</html>