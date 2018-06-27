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
                                    <th colspan="4" style="text-align:center">Listado de Facturas</th>
                                </tr>
                            </thead>
                        <thead>
                            <tr>
                                <th scope="col" style="background:whitesmoke;text-align: center">NºFactura</th>
                                <th scope="col" style="background:whitesmoke;text-align: center">Cliente</th>
                                <th scope="col" style="background:whitesmoke;text-align: center">Fecha</th>
                                <th scope="col" style="background:whitesmoke;text-align: center">Importe</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($services_customers as $service_customer)
                        <tr style="background:white;">
                            <td scope="row" style="text-align: center">
                            {{ $service_customer->id_customer_service_user }}
                            </td>
                            <td style="text-align: center">{{ $service_customer->customer }}</td>
                            <td style="text-align: center">{{ $service_customer->date }}</td>
                            <td style="text-align: center">{{ $service_customer->importe }}</td>
                        </tr>
                     
                        @endforeach
                        </tbody>
                    
                    </table>
            </section>
                   
                    </main>
    </body>
</html>




   


