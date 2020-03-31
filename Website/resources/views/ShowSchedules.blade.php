<html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
        crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/UpdateSchedule.css">
    <script src="/js/UpdateSchedule.js"></script>
</head>

<body>
    <div class="container">
        <h1>Schedules for {{$name}}</h1>

        <a class="btn btn-primary mb-2" href="/Schedule/New">New</a>

    <table class="w-75 mx-auto">
        <thead>
            <tr class="text-center px-3" style="border:1px solid black;">
                <!-- <th class="px-3" style="border:none!important">ID</th> -->
                <th class="px-3" style="border:none!important">Start Date</th>
                <th class="px-3" style="border:none!important">End Date</th>
                <th class="px-3" style="border:none!important"></th>
                <th class="px-3" style="border:none!important"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($schedules as $schedule)
                <tr style="border:1px solid black">
                    <!-- <td>{{$loop->index}}</td> -->
                    <td class="text-center">{{$schedule->StartDate}}</td>
                    <td class="text-center">{{$schedule->EndDate}}</td>
                    <td class="text-center"><a href="/Schedule/Update?id={{$schedule->id}}">Edit</a></td>
                    <td class="text-center"><a href="/Schedule/Delete?id={{$schedule->id}}">Delete</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</body>

</html>