<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
<table class="table table-light">
    @foreach ($array as $i => $a)
    <tr>
        @foreach ($a as $j => $b)
            @if ($i > 2 && $j > 7)
                <td>{{ number_format(floatval($b)*100,2).'%'}}</td>
            @elseif ($i == 5 && $j > 2)
                <td>{{ number_format(floatval($b)*100,2).'%'}}</td>
            @elseif ($i == 7 && $j > 2)
                <td>{{ number_format(floatval($b)*100,2).'%'}}</td>
            @elseif ($i == 10 && $j > 2)
                <td>{{ number_format(floatval($b)*100,2).'%'}}</td>
            @elseif ($i == 12 && $j > 2)
                <td>{{ number_format(floatval($b)*100,2).'%'}}</td>
            @elseif ($i == 14 && $j > 2)
                <td>{{ number_format(floatval($b)*100,2).'%'}}</td>
            @elseif ($i == 18 && $j > 2)
                <td>{{ number_format(floatval($b)*100,2).'%'}}</td>
            @elseif ($i == 22 && $j > 2)
                <td>{{ number_format(floatval($b)*100,2).'%'}}</td>
            @elseif ($i > 2 && $j > 2)
                <td>{{number_format(ceil(floatval($b)))}}</td>
            @else
                <td>{{$b}}</td>
            @endif
        @endforeach
    </tr>
    @endforeach
</table>