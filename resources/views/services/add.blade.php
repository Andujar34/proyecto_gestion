@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
@section('content')
   <main style="height:80%;">
    <section style="margin-left:10%;margin-right:10%;padding:2%;border-radius:1.5em;margin-top:2%;" class="card" id="main">
        <div class="panel-heading" style="margin-bottom:1%">
            <div class="panel-title card-header"><h4>Formulario Servicio</h4></div>
        </div>
        {{ Form::open( array('route'=>'services.store', 'method'=>'POST','files'=>true))}}
    <table class="table">
            {{ Form::hidden('invisible', 'secret', array('id' => 'invisible_id')) }} 
            {{ Form::hidden('numProducts', 0, array('id' => 'numProduct')) }}
        <tbody>
            <tr {{ $errors->has('name') ? 'class=has-error' : '' }}>
                <td  style="width:25%;font-size:0.8em">Nombre</td>
                <td colspan="4">
                    <?php $curValue = old('name') ? old('name') : (!empty($service->name)?$service->name:'') ?>
                    {{ Form::text('name', $curValue, ['class' => 'form-control ' . ($errors->has('name') ? 'has-error' : ''), 'style=font-size:0.8em']) }}
                    @if ($errors->has('name'))
                    <p  class="help-block text-danger">{{ $errors->first('name') }}</p>
                    @endif
                </td>
            </tr>
            <tr {{ $errors->has('price') ? 'class=has-error' : '' }}>
                <td  style="width:25%;font-size:0.8em">Precio</td>
                <td colspan="4">
                    <?php $curValue = old('price') ? old('price') : (!empty($service->price)?$service->price:'') ?>
                    {{ Form::text('price', $curValue, ['class' => 'form-control ' . ($errors->has('price') ? 'has-error' : ''),'type=number','min=0', 'style=font-size:0.8em']) }}
                   @if ($errors->has('price'))
                    <p class="help-block text-danger">{{ $errors->first('price') }}</p>
                    @endif
                </td>
            </tr>
            <tr {{ $errors->has('description') ? 'class=has-error' : '' }}>
                    <td  style="width:25%;font-size:0.8em">Descripción</td>
                    <td colspan="4">
                        <?php $curValue = old('description') ? old('description') : (!empty($service->description)?$service->description:'') ?>
                        {{ Form::text('description', $curValue, ['class' => 'form-control ' . ($errors->has('description') ? 'has-error' : ''), 'style=font-size:0.8em']) }}
                        @if ($errors->has('description'))
                        <p class="help-block text-danger">{{ $errors->first('description') }}</p>
                        @endif
                    </td>
                </tr>
            <tr {{ $errors->has('products1') ? 'class=has-error' : '' }} id="productos">
                <td  style="width:25%;font-size:0.8em">Productos</td>
                <td colspan="3">
                    <?php $curValue = old('products') ? old('products') : (!empty($products)?$products:'') ?>
                        {!! Form::select('products', $products, $curValue, ['class' => 'form-control ' . ($errors->has('products') ? 'has-error' : ''),'id' => 'sel_products', 'style=font-size:0.8em']) !!}
                        @if ($errors->has('products'))
                        <p class="help-block text-danger">{{ $errors->first('products') }}</p>
                        @endif
                </td>
                <td><button style="font-size:0.8em" type="button" id="addProduct" onclick="createProduct()" class="btn btn-primary">+</button></td>
            </tr>

            <tbody id="products">
                   <tr {{ $errors->has('products1') ? 'class=has-error' : '' }} id="1"></tr>
                </tbody>
        </tbody>

    </table>
    <div>
        {{ Form::submit('Crear Servicio',['class'=>'btn btn-primary',"style=font-size:0.8em"]) }}
        <a href="/services" class="btn btn-primary" style="float:right;font-size:0.8em">Atrás</a>
    </div>
    {{ Form::close()}}
   </section>
    
    </main>

<script>
                let long_id = 0;
            const createProduct = () => {
                const select = window.document.getElementById('sel_products');
                const text = select.options[select.selectedIndex].text;
                const value = select.options[select.selectedIndex].value;
                long_id++;
                window.document.getElementById(long_id).innerHTML += generateTupla(text,value);
                const tr = window.document.createElement('tr');
                tr.id = long_id+1;
                window.document.getElementById('products').appendChild(tr);
                select.options[select.selectedIndex].parentNode.removeChild(select.options[select.selectedIndex]);
                
            }
            const generateTupla = (text,value) => {
                return `
                                        <td  style="width:25%;font-size:0.8em">Producto: </th>
                                        <td>
                                            <?php $curValue = old('products${long_id}') ? old('products${long_id}') : (!empty($products)?$products:${text}) ?>
                                            <input style="font-size:0.8em" class="form-control" type="text" disabled id="product${long_id}" data-value="${value}" value="${text}">
                                        
                                            </td>
                                            <td>
                                                <?php $curValue = old('amount${long_id}') ? old('amount${long_id}') : 0 ?>
                                                {{ Form::text('description', $curValue, ['class' => 'form-control ' . ($errors->has('description') ? 'has-error' : ''),'id=""amount${long_id}','type="number"', 'style=text-align:center;font-size:0.8em',' onblur="createProducts()"']) }}
                                           </td> 
                                            <td><button style="font-size:0.8em" type="button" class="btn btn-primary"  onclick="removeProduct(${long_id})">-</button></td>
                               `;
            }
            const removeProduct = (id) => {
                const value = window.document.getElementById(`product${id}`).dataset.value;
                const text = window.document.getElementById(`product${id}`).value;
                window.document.getElementById('sel_products').innerHTML += createOption(text,value);
                window.document.getElementById('products').removeChild(window.document.getElementById(id));
                createProducts();
            }
            const createOption = (text,value) => {
                return `<option value="${value}">${text}</option>`;
            }
            const createProducts = () => {
                const select = window.document.getElementById('products');
                let products_amount = [];
                for(let i =0;i<select.children.length-1;i++){
                    products_amount[select.children[i].children[1].children[0].dataset.value] = parseInt([select.children[i].children[2].children[0].value]);
                }
                window.document.getElementById('invisible_id').value = JSON.stringify(products_amount);
            }
</script>
@endsection