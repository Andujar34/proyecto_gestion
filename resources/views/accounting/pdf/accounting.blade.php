<html>
    <head>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    </head>
    <body>
            <main style="height:80%;">
   
    
            <section style="margin-left:10%;margin-right:10%;padding:2%;border-radius:1.5em;margin-top:2%;">
                <table class="table table-bordered" style="font-size:0.7em">
                        <thead class="thead-dark">
                                <tr>
                                    <th colspan="6" style="text-align:center">Listado de Resultado de Cuentas Anual</th>
                                </tr>
                            </thead>
                        <thead>
                                <tr>
                                        <th scope="col" style="background:whitesmoke;text-align: center">Año</th>
                                        <th scope="col" style="background:whitesmoke;text-align: center">Primer</th>
                                        <th scope="col" style="background:whitesmoke;text-align: center">Segundo</th>
                                        <th scope="col" style="background:whitesmoke;text-align: center">Tercer</th>
                                        <th scope="col" style="background:whitesmoke;text-align: center">Cuarto</th>
                                        <th scope="col" style="background:whitesmoke;text-align: center">Total</th>
                                </tr>
                        </thead>
                        <tbody>
                                @foreach($invoices as $yearsvalue => $years)
                                <tr style="background:white;" >
                                        <td scope="row" style="text-align: center">{{$yearsvalue}}</td>
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
                                        <td style="text-align: center">{{$curValuePrimer}}</td>
                                        <td style="text-align: center">{{$curValueSegundo}}</td>
                                        <td style="text-align: center">{{$curValueTercer}}</td>
                                        <td style="text-align: center">{{$curValueCuarto}}</td>
                                        <td style="text-align: center">{{$curTotal = $curValuePrimer + $curValueSegundo + $curValueTercer + $curValueCuarto}}</td>
                                </tr>
                                @endforeach
                        </tbody>
                    
                    </table>
            </section>
                   
                    </main>
    </body>
</html>


