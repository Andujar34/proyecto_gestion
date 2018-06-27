
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
                                            <th colspan="7" style="text-align:center">Listado de Proveedores</th>
                                        </tr>
                                    </thead>
                                    <thead>
                                            <tr>
                                                <th scope="col" style="background:whitesmoke;text-align: center">ID</th>
                                                <th scope="col" style="background:whitesmoke;text-align: center">Nombre</th>
                                                <th scope="col" style="background:whitesmoke;text-align: center">Apellidos</th>
                                                <th scope="col" style="background:whitesmoke;text-align: center">DNI/CIF</th>
                                                <th scope="col" style="background:whitesmoke;text-align: center">Dirección</th>
                                                <th scope="col" style="background:whitesmoke;text-align: center">Teléfono</th>
                                                <th scope="col" style="background:whitesmoke;text-align: center">CC</th>
                                             
                                            </tr>
                                        </thead>
                                <tbody>
                                        @foreach($customers as $customer)
                                        <tr style="background:white;">
                                            <td scope="row" style="text-align: center">
                                            {{ $customer->id_customer_user }}
                                            </td>
                                            <td style="text-align: center">{{ $customer->name }}</td>
                                            <td style="text-align: center">{{ $customer->surname }}</td>
                                            <td style="text-align: center">{{ $customer->address }}</td>
                                            <td style="text-align: center">{{ $customer->CIF }}</td>
                                            <td style="text-align: center">{{ $customer->phone }}</td>
                                            <td style="text-align: center">{{ $customer->cc }}</td>
                                          
                                        </tr>
                                     
                                        @endforeach
                                </tbody>
                            
                            </table>
                    </section>
                           
                            </main>
            </body>
        </html>
        
        
        
        
           
        
