<!DOCTYPE html>
<html lang="en">
<head>
    <title>Invited People</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
          crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h1 class="mt-4 mb-4">Invited People</h1>
    @if (!empty($invitedPeople))
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Affiliate ID</th>
                <th scope="col">Name</th>
                <th scope="col">Latitude</th>
                <th scope="col">Longitude</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($invitedPeople as $person)
                <tr>
                    <td>{{ $person->affiliateId }}</td>
                    <td>{{ $person->name }}</td>
                    <td>{{ $person->latitude }}</td>
                    <td>{{ $person->longitude }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p>No people to invite</p>
    @endif
</div>

<!-- Include Bootstrap JS (Optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-eAE538YgbfJz3PGCBK/6zmUpz2stogfCjay4ME8l5FOg5KTOp9tpy5z5cR5Rj5TC" crossorigin="anonymous"></script>
</body>
</html>
