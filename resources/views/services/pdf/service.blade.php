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
                        <th colspan="6" style="font-size:0.8em">Ficha de Servicio</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th colspan="1" scope="col" style="background:whitesmoke;width:25%;font-size:0.8em">Nombre</th>
                        <td colspan="5" style="font-size:0.8em;">{{$service->name}}</td>
                    </tr>
                    <tr>
                        <th colspan="1" scope="col" style="background:whitesmoke;width:25%;font-size:0.8em">Precio</th>
                        <td colspan="5" style="font-size:0.8em;">{{$service->price}}</td>
                    </tr>
                    <tr>
                        <th colspan="1" scope="col" style="background:whitesmoke;width:25%;font-size:0.8em">Descripción</th>
                        <td colspan="5" style="font-size:0.8em;">{{$service->description}}</td>
                    </tr>
                    @foreach($service->products as $serv)
                    <tr>
                        <th colspan="1"scope="col" style="background: whitesmoke;width:25%;font-size:0.8em">Producto</th>
                        <td colspan="3"style="font-size:0.6em">{{$serv->name}}</td>
                        <th colspan="1"scope="col" style="background: whitesmoke;width:25%;font-size:0.8em">Cantidad</th>
                        <td colspan="1"style="font-size:0.8em">{{$serv->pivot->amount}}</td>
                    </tr>
                    @endforeach
                </tbody>
        
            </table>
            </section>
            </main>
    </body>
</html>
