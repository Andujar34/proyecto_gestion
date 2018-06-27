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
                        <th colspan="2" style="font-size:0.8em">Ficha de Proveedor</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="col" style="background:whitesmoke;width:25%;font-size:0.8em">Nombre</th>
                        <td style="font-size:0.8em;">{{$provider->name}}</td>
                    </tr>
                    <tr>
                        <th scope="col" style="background:whitesmoke;width:25%;font-size:0.8em">Dirección</th>
                        <td style="font-size:0.8em;">{{$provider->address}}</td>
                    </tr>
                    <tr>
                        <th scope="col" style="background:whitesmoke;width:25%;font-size:0.8em">DNI/CIF</th>
                        <td style="font-size:0.8em;">{{$provider->CIF}}</td>
                    </tr>
                    <tr>
                        <th scope="col" style="background:whitesmoke;width:25%;font-size:0.8em">Teléfono</th>
                        <td style="font-size:0.8em;">{{$provider->phone}}</td>
                    </tr>
                    <tr>
                        <th scope="col" style="background:whitesmoke;width:25%;font-size:0.8em">Cuenta Corriente</th>
                        <td style="font-size:0.8em;">{{$provider->cc}}</td>
                    </tr>
                </tbody>
        
            </table>
            </section>
            </main>
    </body>
</html>


  