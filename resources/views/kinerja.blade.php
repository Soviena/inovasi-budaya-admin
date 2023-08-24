@extends('layout.blank')
@section('content')
<table class="table table-light">
    @foreach ($array as $i => $a)
    <tr class="
        @if($i<2)
            table-primary
        @elseif($i==2)
            table-dark
        @elseif($i<6)
            table-success
        @elseif($i<8)
            table-danger
        @elseif($i==8)
            table-success
        @elseif($i<11)
            table-danger
        @elseif($i<13)
            table-success
        @elseif($i<15)
            table-danger
        @elseif($i<17)
            table-success
        @elseif($i<19)
            table-danger
        @elseif($i<21)
            table-success
        @else
            table-danger
        @endif
    ">
        @foreach ($a as $j => $b)
            <td>
                @if($i>2 && $i < 5)
                    @if($j > 0 && $j < 6)
                        {{number_format((floatval($b)))}} JT
                    @elseif($j>0)
                        {{ number_format(floatval($b)*100,2).'%'}}
                    @else
                        {{$b}}
                    @endif
                @elseif($i==5 && $j>0)
                    {{ number_format(floatval($b)*100,2).'%'}}
                @elseif($i == 6)
                    @if($j > 0 && $j < 6)
                        {{number_format((floatval($b)))}} JT
                    @elseif($j>0)
                        {{ number_format(floatval($b)*100,2).'%'}}
                    @else
                        {{$b}}
                    @endif
                @elseif($i==7 && $j>0)
                    {{ number_format(floatval($b)*100,2).'%'}}
                @elseif($i>7 && $i< 10)
                    @if($j > 0 && $j < 6)
                        {{number_format((floatval($b)))}} JT
                    @elseif($j>0)
                        {{ number_format(floatval($b)*100,2).'%'}}
                    @else
                        {{$b}}
                    @endif
                @elseif($i==10 && $j>0)
                    {{ number_format(floatval($b)*100,2).'%'}}
                @elseif($i == 11)
                    @if($j > 0 && $j < 6)
                        {{number_format((floatval($b)))}} JT
                    @elseif($j>0)
                        {{ number_format(floatval($b)*100,2).'%'}}
                    @else
                        {{$b}}
                    @endif
                @elseif($i==12 && $j>0)
                    {{ number_format(floatval($b)*100,2).'%'}}
                @elseif($i == 13)
                    @if($j > 0 && $j < 6)
                        {{number_format((floatval($b)))}} JT
                    @elseif($j>0)
                        {{ number_format(floatval($b)*100,2).'%'}}
                    @else
                        {{$b}}
                    @endif
                @elseif($i==14 && $j>0)
                    {{ number_format(floatval($b)*100,2).'%'}}
                @elseif($i>14 && $i < 17 && $j>0)
                    {{ number_format((floatval($b)))}} JT
                @elseif($i == 17)
                    @if($j > 0 && $j < 6)
                        {{number_format((floatval($b)))}} JT
                    @elseif($j>0)
                        {{ number_format(floatval($b)*100,2).'%'}}
                    @else
                        {{$b}}
                    @endif
                @elseif($i==18 && $j>0)
                    {{ number_format(floatval($b)*100,2).'%'}}
                @elseif($i>18 && $i < 21)
                    @if($j > 0 && $j < 6)
                        {{number_format((floatval($b)))}} JT
                    @elseif($j>0)
                        {{ number_format(floatval($b)*100,2).'%'}}
                    @else
                        {{$b}}
                    @endif
                 @elseif($i == 21)
                    @if($j > 0 && $j < 6)
                        {{number_format((floatval($b)))}} JT
                    @elseif($j>0)
                        {{ number_format(floatval($b)*100,2).'%'}}
                    @else
                        {{$b}}
                    @endif
                @elseif($i==22 && $j>0)
                    {{ number_format(floatval($b)*100,2).'%'}}
                @else
                    {{$b}}
                @endif
            </td>
        @endforeach
    </tr>
    @endforeach
</table>
@endsection

