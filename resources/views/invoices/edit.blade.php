@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
@section('content')
<main style="height:100%;">
   
        <section style="margin-left:10%;margin-right:10%;padding:2%;border-radius:1.5em;margin-top:2%;" class="card" id="main">
        <div class="panel-heading" style="margin-bottom:1%">
            <div class="panel-title card-header"><h4>Edición Factura</h4></div>
        </div>
        {{ Form::open( array('route'=>['invoices.update',$invoice[0]['id_customer_service_user']], 'method'=>'POST','files'=>true))}}
        {{ Form::hidden('numInvoice', $numFactura, array('id' => 'numInvoice')) }}
        {{ Form::hidden('date', $invoice[0]['date'], array('id' => 'numDate')) }}
        <article class="row">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td colspan="7" style="background: grey;color:whitefont-size:0.8em;color:white">Emisor</td>
                            <td colspan="5" style="background: grey;color:whitefont-size:0.8em;color:white">Cliente</td>
                        </tr>
                        <tr>
                            <th colspan="1" style="background: whitesmoke;font-size:0.8em">Nombre</th>
                            <td colspan="6" atyle="font-size:0.8em">
                                {{Auth::user()->name}}
                            </td>
                            <th colspan="1" style="background: whitesmoke;font-size:0.8em">Nombre</th>
                            <th colspan="4">
                                <?php $curValue = old('customer_id') ? old('customer_id') : (!empty($customer->id)?$customer->id:'') ?>
                                {!! Form::select('customer_id', $customers, $curValue, ['class' => 'form-control ' . ($errors->has('customer_id') ? 'has-error' : ''),'style=font-size:0.8em','id' => 'customer_id', 'placeholder' => 'Seleccione una opcion','onchange=getCustomer(value)']) !!}
                                @if ($errors->has('customer_id'))
                                <p class="help-block text-danger">{{ $errors->first('customer_id') }}</p>
                                @endif
                            </th>
                                
                        </tr>
                        <tr>
                            <th colspan="1" style="background: whitesmoke;font-size:0.8em">DNI/CIF</th>
                            <td colspan="6" style='font-size:0.8em'>{{Auth::user()->DNI}}</td>
                            <th colspan="1" style="background: whitesmoke;font-size:0.8em">DNI/CIF</th>
                            <td colspan="4" id="CIF">
                                    <?php $curValue = old('CIF') ? old('CIF') : (!empty($customer->CIF)?$customer->CIF:'') ?>
                                    {{ Form::text('CIF', $curValue, ['class' => 'form-control ' . ($errors->has('CIF') ? 'has-error' : ''),'style=font-size:0.8em','disabled']) }}
                                    @if ($errors->has('CIF'))
                                    <p class="help-block text-danger">{{ $errors->first('CIF') }}</p>
                                    @endif
                            </td>
                                    
                        </tr>
                        <tr>
                            <th colspan="1" style="background: whitesmoke;font-size:0.8em">Dirección</th>
                            <td colspan="6" style='font-size:0.8em'>{{Auth::user()->address}}</td>
                            <th colspan="1" style="background: whitesmoke;font-size:0.8em">Apellidos</th>
                            <td colspan="4" id="surname">
                                    <?php $curValue = old('surname') ? old('surname') : (!empty($customer->surname)?$customer->surname:'') ?>
                                    {{ Form::text('surname', $curValue, ['class' => 'form-control ' . ($errors->has('surname') ? 'has-error' : ''),'style=font-size:0.8em','disabled']) }}
                                    @if ($errors->has('surname'))
                                    <p class="help-block text-danger">{{ $errors->first('surname') }}</p>
                                    @endif
                            </td>
                        </tr>
                        <tr>
                            <th colspan="7" style="background: grey;color:white;font-size:0.8em">Datos Factura</th>
                            <th colspan="1" style="background: whitesmoke;font-size:0.8em">Dirección</th>
                            <td colspan="4" id="address">
                                    <?php $curValue = old('address') ? old('address') : (!empty($customer->address)?$customer->address:'') ?>
                                    {{ Form::text('address', $curValue, ['class' => 'form-control ' . ($errors->has('address') ? 'has-error' : ''),'style=font-size:0.8em','disabled']) }}
                                    @if ($errors->has('address'))
                                    <p class="help-block text-danger">{{ $errors->first('address') }}</p>
                                    @endif
                            </td>
                        </tr>
                        <tr>
                                <th colspan="1"style="background: whitesmoke;font-size:0.8em">NºFact</th>
                                <td colspan="6" style="font-size:0.8em">{{$numFactura}}</td>
                                <th colspan="1" style="background: whitesmoke;font-size:0.8em">Teléfono</th>
                                <td colspan="4" id="phone">
                                        <?php $curValue = old('phone') ? old('phone') : (!empty($customer->phone)?$customer->phone:'') ?>
                                        {{ Form::text('phone', $curValue, ['class' => 'form-control ' . ($errors->has('address') ? 'has-error' : ''),'style=font-size:0.8em','disabled']) }}
                                        @if ($errors->has('phone'))
                                        <p class="help-block text-danger">{{ $errors->first('phone') }}</p>
                                        @endif
                                </td>
                        </tr>
                        <tr>
                                <th colspan="1" style="background: whitesmoke;font-size:0.8em">Fecha</th>
                                <td id="date" colspan="6">
                                      
                                       <?php $curValue = old('date') ? old('date') :  $invoice[0]['date']?>
                                       {{ Form::text('date', $curValue, ['class' => 'form-control ' . ($errors->has('cc') ? 'has-error' : ''),'style=font-size:0.8em','disabled']) }}
                                       @if ($errors->has('date'))
                                       <p class="help-block text-danger">{{ $errors->first('date') }}</p>
                                       @endif
                                </td>
                                <th colspan="1" style="background: whitesmoke;font-size:0.8em">CC</th>
                                <td colspan="4" id="cc">
                                        <?php $curValue = old('cc') ? old('cc') : (!empty($customer->cc)?$customer->cc:'') ?>
                                        {{ Form::text('cc', $curValue, ['class' => 'form-control ' . ($errors->has('cc') ? 'has-error' : ''),'style=font-size:0.8em','disabled']) }}
                                        @if ($errors->has('cc'))
                                        <p class="help-block text-danger">{{ $errors->first('cc') }}</p>
                                        @endif
                                </td>
                        </tr>
                    </tbody>
                </table>
        </article>
        <article class="row">
            <table class="table table-bordered">     
                    {{ Form::hidden('invisible', '', array('id' => 'invisible_id')) }}
                    {{ Form::hidden('invisible_old', '', array('id' => 'invisible_id_old')) }} 
                    <thead>
                            <tr>
                                <th colspan="12" style="background: grey;color:white;font-size:0.8em">
                                    Servicios
                                </th>
                            </tr>
                            <tr>
                                <td colspan="11">
                                <?php $curValue = old('services_select') ? old('services_select') : (!empty($services_select)?$services_select:'') ?>
                                     {!! Form::select('services_select', $services_select, $curValue, ['class' => 'form-control ' . ($errors->has('services_select') ? 'has-error' : ''),'id' => 'sel_products','style=font-size:0.8em']) !!}
                                     @if ($errors->has('services_select'))
                                     <p class="help-block text-danger">{{ $errors->first('services_select') }}</p>
                                     @endif
                                    </td>
                                <td><button style="font-size:0.8em" type="button" id="addProduct" onclick="createService()" class="btn btn-primary">+</button></td>
                                
                            </tr>
                        </thead>       
                <thead>
                    <tr>
                        <th style="background: grey;color:white;font-size:0.8em">Nº</th>
                        <th style="background: grey;color:white;font-size:0.8em" colspan="7">Servicio</th>
                        <th style="background: grey;color:white;font-size:0.8em">Cantidad</th>
                        <th style="background: grey;color:white;font-size:0.8em">Precio Unitario</th>
                        <th style="background: grey;color:white;font-size:0.8em">Precio</th>
                        <th style="background: grey;color:white;font-size:0.8em">Añadir</th>
                    </tr>
                       </thead>
                <tbody id="services">
                    <?php $num =1?>
                    <tr id="{{$num}}">
                    @foreach($invoice as $invo)
                      
                            <th>{{$num}}</th>
                            <th colspan="7">
                        
                                <input style='font-size:0.8em' class="form-control" type="text" disabled id="name{{$num}}" data-value="{{$invo['id_service']}}" value="{{$invo['name']}}" >
                       
                               </th>          
                            <td>
                                <?php $curValue = old('amount'.$num) ? old('amount'.$num) : $invo['amount'] ?>
                                {{ Form::text('amount'.$num, $curValue, ['class' => 'form-control ' . ($errors->has('amount'.$num) ? 'has-error' : ''),'style=text-align:center;font-size:0.8em','type="number"', 'min=0', 'step=1', 'onchange="calculateUnitPrice('.$num.')"']) }}
                            </td>
                            <td>
                                    <?php $curValue = old('unit1') ? old('unit1') : 0 ?>
                                   {{ Form::text('unit1', $curValue, ['class' => 'form-control ' . ($errors->has('unit1') ? 'has-error' : ''),'style=text-align:center;font-size:0.8em','disabled']) }}
                                </td>
                                <td>
                                        <?php $curValue = old('total1') ? old('total1') : 0 ?>
                                    {{ Form::text('total1', $curValue, ['class' => 'form-control ' . ($errors->has('total1') ? 'has-error' : ''),'style=text-align:center;font-size:0.8em','disabled']) }}
                                </td>
                                <td>
                                        <button type="button" class="btn btn-primary" onclick="removeService({{$num}})" style="color:white;text-align: center;font-size:0.8em" id="removeItem">-</button>
                                </td>
                        </tr>
                        <?php $num++; ?>
                        <tr id="{{$num}}">
                    @endforeach
                        </tr>
                </tbody>
                <tbody>
                        <tr>
                            <th colspan="10" style="background:whitesmoke;font-size:0.8em">Total</th>
                            <td id="total">
                                    <?php $curValue = old('total') ? old('total') : 0 ?>
                                    {{ Form::text('total', $curValue, ['class' => 'form-control ' . ($errors->has('total') ? 'has-error' : ''),'style=text-align:center;font-size:0.8em','type=number','style="text-align: center"','disabled']) }}
                                    @if ($errors->has('total'))
                                    <p class="help-block text-danger">{{ $errors->first('total') }}</p>
                                    @endif
                            </td>
                        </tr>
                        <tr>
                                <th colspan="10" style="background: whitesmoke;font-size:0.8em">Iva</th>
                                <td id="tax">
                                        <?php $curValue = old('tax') ? old('tax') : 0 ?>
                                        {{ Form::text('tax', $curValue, ['class' => 'form-control ' . ($errors->has('tax') ? 'has-error' : ''),'style=text-align:center;font-size:0.8em','type=number','style="text-align: center"','disabled']) }}
                                        @if ($errors->has('tax'))
                                        <p class="help-block text-danger">{{ $errors->first('tax') }}</p>
                                        @endif
                                </td>
                        </tr>
                        <tr>
                                <th colspan="10" style="background: whitesmoke;font-size:0.8em">Total+Iva</th>
                                <td id="totalTax">
                                        <?php $curValue = old('totalTax') ? old('totalTax') : 0 ?>
                                        {{ Form::text('totalTax', $curValue, ['class' => 'form-control ' . ($errors->has('totalTax') ? 'has-error' : ''),'style=text-align:center;font-size:0.8em','type=number','style="text-align: center"','disabled']) }}
                                        @if ($errors->has('totalTax'))
                                        <p class="help-block text-danger">{{ $errors->first('totalTax') }}</p>
                                        @endif
                                </td>
                              
                        </tr>
                </tbody>
            </table>
        </article>
        <div>
            {{ Form::submit('Editar Factura',['class'=>'btn btn-primary','style=font-size:0.8em']) }}
            <a href="/invoices" class="btn btn-primary" style="float:right;font-size:0.8em">Atrás</a>
        </div>
       {{ Form::close()}}
        </section>
    </section>
   
    </main>
<script>
    let long_id ;
    $(document).ready(function() {
        
        long_id = window.document.getElementById('services').children.length;
        let services_products = [];
        const select = window.document.getElementById('services');
        for(let i =1;i<=long_id-1;i++){
            const element = window.document.getElementById(`name${i}`);
            services_products[select.children[i-1].children[1].children[0].dataset.value]= parseInt([select.children[i-1].children[2].children[0].value]);
            getPrice(i);
        }
        window.document.getElementById('invisible_id_old').value = JSON.stringify(services_products);
    });
    const fieldsCustomer = ['CIF','surname','address','phone','cc'];
    const generateTupla = (text,value) => {
       
            return `
            <th>${long_id}</th>
                            <th colspan="7">
                        
                                <input style="font-size:0.8em" class="form-control" type="text" disabled id="name${long_id}" data-value="${value}" value="${text}" >
                       
                               </th>          
                            <td>
                                <?php $curValue = old('amount${long_id}') ? old('amount${long_id}') : 0 ?>
                                {{ Form::text('amount${long_id}', $curValue, ['class' => 'form-control ' . ($errors->has('amount${long_id}') ? 'has-error' : ''),'style=text-align:center;font-size:0.8em','type="number"', 'min=0', 'step=1', 'onchange="getPrice(${long_id})"']) }}
                            </td>
                            <td>
                                    <?php $curValue = old('unit${long_id}') ? old('unit${long_id}') : 0 ?>
                                   {{ Form::text('unit${long_id}', $curValue, ['class' => 'form-control ' . ($errors->has('unit${long_id}') ? 'has-error' : ''),'style=text-align:center;font-size:0.8em','disabled']) }}
                                </td>
                                <td>
                                        <?php $curValue = old('total${long_id}') ? old('total${long_id}') : 0 ?>
                                    {{ Form::text('total${long_id}', $curValue, ['class' => 'form-control ' . ($errors->has('total${long_id}') ? 'has-error' : ''),'style=text-align:center;font-size:0.8em','disabled']) }}
                                </td>
                                <td>
                                        <button type="button" class="btn btn-primary" onclick="removeService(${long_id})" style="color:white;text-align: center;font-size:0.8em" id="removeItem">-</button>
                                </td>
                         `;
    }
    const calculateUnitPrice = (id) => {
            const cant = window.document.getElementById(id).children[2].children[0].value;
            const value = window.document.getElementById(id).children[3].children[0].value;
            window.document.getElementById(id).children[4].children[0].value = cant*value;
            calculateTotal();
    }
    const calculateTotal = () => {
            const tuplas = window.document.getElementById('services').children;
            let total=0;
            const long = tuplas.length-1;
            for(let i=0;i<long;i++){
                total += parseFloat(tuplas[i].children[4].children[0].value); 
            }
            window.document.getElementById('total').children[0].value = total;
            calculateIva();
    }
    const calculateIva = () => {
            window.document.getElementById('tax').children[0].value = parseFloat(window.document.getElementById('total').children[0].value) * 0.21;
            calculateTotalWithTax();
    }
    const calculateTotalWithTax = () => {
            window.document.getElementById('totalTax').children[0].value = parseFloat(window.document.getElementById('total').children[0].value) + parseFloat(window.document.getElementById('tax').children[0].value);
            createInvoice();
    }
    const createInvoice = () => {
            const select = window.document.getElementById('services');
            const long = select.children.length-1;
            let factura = [];
            for(let i =0;i<long;i++){
                factura[select.children[i].children[1].children[0].dataset.value] = parseInt([select.children[i].children[2].children[0].value]);
            }
            window.document.getElementById('invisible_id').value = JSON.stringify(factura);
    }
    const getPrice = (id) => {
        
            $.ajax({
            type: 'GET',
            url: '{{ route("xhr.price") }}',
            dataType: 'json',
            data: { id: window.document.getElementById(`name${id}`).dataset.value }
            })
            .done(function(data) {
              window.document.getElementById(id).children[3].children[0].value = data.price;
              calculateUnitPrice(id);
            }); 
        }
    const getCustomer = (id) => {
            $.ajax({
            type: 'GET',
            url: '{{ route("xhr.customer") }}',
            dataType: 'json',
            data:{id: id}
            })
            .done(function(data) {
             for(let i =0;i<fieldsCustomer.length;i++){
                window.document.getElementById(fieldsCustomer[i]).children[0].value=data.customer[fieldsCustomer[i]];
                window.document.getElementById('customer_id').value = data.customer.id;
             }
            });
    }
    const removeService = (id) => {
        const value = window.document.getElementById(`name${id}`).dataset.value;
        const text = window.document.getElementById(`name${id}`).value;
        window.document.getElementById('sel_products').innerHTML += createOption(text,value);
        window.document.getElementById('services').removeChild(window.document.getElementById(id));
        formatInvoice();
        calculateTotal();
       
        createServices();
        
      
        
    }
    const createOption = (text,value) => {
        return `<option value="${value}">${text}</option>`;
    }
    const createService = () =>{
            const select = window.document.getElementById('sel_products');
                const text = select.options[select.selectedIndex].text;
                const value = select.options[select.selectedIndex].value;
                window.document.getElementById(long_id).innerHTML += generateTupla(text,value);
                long_id++;
                const tr = window.document.createElement('tr');
                tr.id=long_id;
                window.document.getElementById('services').appendChild(tr);
                select.options[select.selectedIndex].parentNode.removeChild(select.options[select.selectedIndex]);
                formatInvoice();
        
    }
    const createServices = () => {
        const select = window.document.getElementById('services');
        let services_products = [];
        for(let i =1;i<long_id-1;i++){
            services_products[select.children[i-1].children[1].children[0].dataset.value]= parseInt([select.children[i-1].children[2].children[0].value]);
        }
        window.document.getElementById('invisible_id').value = JSON.stringify(services_products);
    }
    const formatInvoice = () => {
            const long = window.document.getElementById('services').children.length;
            for(let i=1;i<long;i++){
                window.document.getElementById('services').children[i-1].children[0].innerHTML = i;
            }
        }


</script>
@endsection