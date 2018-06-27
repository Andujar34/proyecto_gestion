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
            
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th colspan="12" style="font-size:0.8em">Factura</th>
                    </tr>
                </thead>
                <thead class="thead-dark">
                        <tr>
                            <th colspan="6" style="font-size:0.8em">Emisor</th>
                            <th colspan="6" style="font-size:0.8em">Cliente</th>
                        </tr>
                </thead>
                <tbody>
                    <tr>
                        <th colspan="1" style="background: whitesmoke;width:25%;font-size:0.8em">Nombre</th>
                        <td colspan="5" style="width:25%;font-size:0.8em">{{Auth::user()->name}}</td>
                        <th colspan="1" style="background: whitesmoke;width:25%;font-size:0.8em">Nombre</th>
                        <td colspan="5" style="width:25%;font-size:0.8em">{{$customer->name}}</td>
                    </tr>
                    <tr>
                        <th colspan="1" style="background: whitesmoke;width:25%;font-size:0.8em">DNI/CIF</th>
                        <td colspan="5" style="width:25%;font-size:0.8em">{{Auth::user()->DNI}}</td>
                        <th colspan="1" style="background: whitesmoke;width:25%;font-size:0.8em">DNI/CIF</th>
                        <td colspan="5" style="width:25%;font-size:0.8em">{{$customer->CIF}}</td>
                    </tr>
                    <tr>
                        <th colspan="1" style="background: whitesmoke;width:25%;font-size:0.8em">Dirección</th>
                        <td colspan="5" style="width:25%;font-size:0.8em">{{Auth::user()->address}}</td>
                        <th colspan="1" style="background: whitesmoke;width:25%;font-size:0.8em">Apellidos</th>
                        <td colspan="5" style="width:25%;font-size:0.8em">{{$customer->surname}}</td>
                    </tr>
                    <tr>
                        <th colspan="6" style="color:white;background-color:black;font-size:0.8em">Datos Factura</th>
                        <th colspan="1" style="background: whitesmoke;width:25%;font-size:0.8em">Dirección</th>
                        <td colspan="5" style="width:25%;font-size:0.8em">{{$customer->address}}</td>
                    </tr>
                    <tr>
                        <th colspan="1" style="background:whitesmoke;font-size:0.8em">NªFact</th>
                        <td colspan="5" style="width:25%;font-size:0.8em">{{$numFactura}}</td>
                        <th colspan="1" style="background: whitesmoke;width:25%;font-size:0.8em">Teléfono</th>
                        <td colspan="5" style="width:25%;font-size:0.8em">{{$customer->phone}}</td>
                    </tr>
                    <tr>
                        <th colspan="1" style="background:whitesmoke;font-size:0.8em">Fecha</th>
                        <td colspan="5" style="width:25%;font-size:0.8em">{{$invoice[0]['date']}}</td>
                        <th colspan="1" style="background: whitesmoke;width:25%;font-size:0.8em">CC</th>
                        <td colspan="5" style="width:25%;font-size:0.8em">{{$customer->cc}}</td>
                    </tr>
                </tbody>
                <thead class="thead-dark">
                        <tr>
                            <th colspan="1" style="width:25%;font-size:0.8em">Nº</th>
                            <th colspan="5" style="width:25%;font-size:0.8em">Servicio</th>
                            <th colspan="2" style="width:25%;font-size:0.8em">Cantidad</th>
                            <th colspan="2" style="width:25%;font-size:0.8em">Precio Unitario</th>
                            <th colspan="2" style="width:25%;font-size:0.8em">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $total=0; ?>
                        @foreach($invoice as $key =>$invo)
                            <tr>
                                <td colspan="1" style="width:25%;font-size:0.8em">{{$key+1}}</th>
                                <td colspan="5" style="width:25%;font-size:0.8em">{{$invo['name']}}</th>
                                <td colspan="2" style="width:25%;font-size:0.8em">{{$invo['amount']}}</th>
                                <td colspan="2" style="width:25%;font-size:0.8em">{{$invo['price']}}</th>
                                <td colspan="2" style="width:25%;font-size:0.8em">{{$invo['amount'] * $invo['price']}}</td>
                            </tr>
                            <?php $total +=$invo['amount'] * $invo['price']?> 
                        @endforeach
                    </tbody>
                    <tbody>
                        <tr>
                            <th colspan="10" style="background: whitesmoke;width:25%;font-size:0.8em">Total</th>
                            <td colspan="2" style="width:25%;font-size:0.8em">{{$total}}</td>
                        </tr>
                        <tr>
                            <th colspan="10" style="background: whitesmoke;width:25%;font-size:0.8em">Iva</th>
                            <td colspan="2" style="width:25%;font-size:0.8em">{{$total*0.21}}</td>
                        </tr>
                        <tr>
                            <th colspan="10" style="background: whitesmoke;width:25%;font-size:0.8em">Total+Iva</th>
                            <td colspan="2" style="width:25%;font-size:0.8em">{{$total*1.21}}</td>
                        </tr>
                    </tbody>
            </table>
            <table class="table table-bordered">
               
            </table>
            </section>
            </main>
    </body>
</html>


  