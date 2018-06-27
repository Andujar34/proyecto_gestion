@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
@section('content')
   <main style="height:80%;">
        <section style="margin-left:10%;margin-right:10%;padding:2%;border-radius:1.5em;margin-top:2%;" class="card" id="main">
                @if(count($invoices)>0)
                    <table class="table" style="font-size:0.7em">
                        <thead class='thead-dark'>
                            <tr>
                                <th scope="col" style="text-align: center">Año</th>
                                <th scope="col" style="text-align: center">Primer</th>
                                <th scope="col" style="text-align: center">Segundo</th>
                                <th scope="col" style="text-align: center">Tercer</th>
                                <th scope="col" style="text-align: center">Cuarto</th>
                                <th scope="col" style="text-align: center">Total</th>
                            </tr>
                        </thead>
                        <tbody id='accounting'>
                    @foreach($invoices as $yearsvalue => $years)
                    <tr style="background:white;" >
                            <td scope="row" style="background:whitesmoke;text-align: center">{{$yearsvalue}}</td>
                            <?php $curValuePrimer = $curValueSegundo = $curValueTercer = $curValueCuarto = 0; ?>
                            @foreach($years as $key => $value)
                            <?php 
                                if($key === 'primer'){
                                    $curValuePrimer=$value;
                                }
                                if($key === 'segundo'){
                                    $curValueSegundo=$value;
                                }
                                if($key === 'tercer'){
                                    $curValueTercer=$value;
                                }
                                if($key === 'cuarto'){
                                    $curValueCuarto=$value;
                                }
                            ?>
                            @endforeach
                            <td style="background:whitesmoke;text-align: center;font-size:0.8em">{{$curValuePrimer}}</td>
                            <td style="background:whitesmoke;text-align: center;font-size:0.8em">{{$curValueSegundo}}</td>
                            <td style="background:whitesmoke;text-align: center;font-size:0.8em">{{$curValueTercer}}</td>
                            <td style="background:whitesmoke;text-align: center;font-size:0.8em">{{$curValueCuarto}}</td>
                            <td style="background:whitesmoke;text-align: center;font-size:0.8em">{{$curTotal = $curValuePrimer + $curValueSegundo + $curValueTercer + $curValueCuarto}}</td>
                    </tr>
                    @endforeach
                        </tbody>
                    </table>
                    <a href="{{ route('accounting.pdf') }}" class="btn btn-sm btn-primary" style="font-size:0.8em">
                            Descargar Contabilidad en PDF
                        </a>
                @else
                No existen datos de facturación
                @endif
               
           
        </section>
        
    </main>
    
@endsection
