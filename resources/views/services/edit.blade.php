@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
@section('content')
   <main style="height:80%;d">
    <section style="margin-left:10%;margin-right:10%;padding:2%;border-radius:1.5em;margin-top:2%;" class="card" id="main">
        <div class="panel-heading">
            <div class="panel-title card-header"><h4>Editar Servicio</h4></div>
        </div>
        {{ Form::open( array('route'=>['services.update', $service->id],'method'=>'POST','files'=>true))}}
   
    <table class="table">
            {{ Form::hidden('invisible', '', array('id' => 'invisible_id')) }} 
            {{ Form::hidden('invisible_old', 'secret', array('id' => 'invisible_id_old')) }}
            {{ Form::hidden('numProducts', 0, array('id' => 'numProduct')) }}
        <tbody>
            <tr {{ $errors->has('name') ? 'class=has-error' : '' }}>
                <td style="width:25%;font-size:0.8em">Nombre</td>
                <td colspan="4">
                    <?php $curValue = old('name') ? old('name') : (!empty($service->name)?$service->name:'') ?>
                    {{ Form::text('name', $curValue, ['class' => 'form-control ' . ($errors->has('name') ? 'has-error' : ''),'style=font-size:0.8em']) }}
                    @if ($errors->has('name'))
                    <p class="help-block text-danger">{{ $errors->first('name') }}</p>
                    @endif
                </td>
            </tr>
            <tr {{ $errors->has('price') ? 'class=has-error' : '' }}>
                <td style="width:25%;font-size:0.8em">Precio</td>
                <td colspan="4">
                    <?php $curValue = old('price') ? old('price') : (!empty($service->price)?$service->price:'') ?>
                    {{ Form::text('price', $curValue, ['class' => 'form-control ' . ($errors->has('price') ? 'has-error' : ''),'type=number','min=0','style=font-size:0.8em']) }}
                   @if ($errors->has('price'))
                    <p class="help-block text-danger">{{ $errors->first('price') }}</p>
                    @endif
                </td>
            </tr>
            <tr {{ $errors->has('description') ? 'class=has-error' : '' }}>
                    <td  style="width:25%;font-size:0.8em">Descripción</th>
                    <td colspan="4">
                        <?php $curValue = old('description') ? old('description') : (!empty($service->description)?$service->description:'') ?>
                        {{ Form::text('description', $curValue, ['class' => 'form-control ' . ($errors->has('description') ? 'has-error' : ''),'style=font-size:0.8em']) }}
                        @if ($errors->has('description'))
                        <p class="help-block text-danger">{{ $errors->first('description') }}</p>
                        @endif
                    </td>
                </tr>
            <tr {{ $errors->has('products1') ? 'class=has-error' : '' }} id="productos">
                <td  style="width:25%;font-size:0.8em">Productos</td>
                <td colspan="3">
                    <?php $curValue = old('products') ? old('products') : (!empty($products)?$products:'') ?>
                        {!! Form::select('products', $products, $curValue, ['class' => 'form-control ' . ($errors->has('products') ? 'has-error' : ''),'id' => 'sel_products','style=font-size:0.8em']) !!}
                        @if ($errors->has('products'))
                        <p class="help-block text-danger">{{ $errors->first('products') }}</p>
                        @endif
                </td>
                <td><button style="font-size:0.8em" type="button" id="addProduct" onclick="createProduct()" class="btn btn-primary">+</button></td>
            </tr>

            <tbody id="products">
                    <tr id="1">
                   @foreach($products_services as $product_service)
                    
                            <td style="width:25%;font-size:0.8em">Producto: </td>
                            <td>
                                <?php $curValue = old($product_service['product']) ? old($product_service['product']) : (!empty($products)?$products:$product_service['name']) ?>
                                <input style="font-size:0.8em" class="form-control" type="text" disabled id={{$product_service['product']}} data-value="{{$product_service['id']}}" value="{{$product_service['name']}}">
        
                                </td>
                                <td>
                                    {{ Form::text($product_service['num'], $product_service['amount'], ['class' => 'form-control ' . ($errors->has($product_service['num']) ? 'has-error' : ''),'id='.$product_service['num'],'type="number"', 'style=text-align:center;font-size:0.8em',' onblur="createProducts()"']) }}
                                </td> 
                                <td><button style="font-size:0.8em" type="button" class="btn btn-primary"  onclick="removeProduct({{$product_service['cant']}})">-</button></td>
                    </tr>
                    <tr id={{$product_service['cant']+1}}>
                   @endforeach
                    </tr>
                </tbody>
        </tbody>

    </table>
    <div>
        {{ Form::submit('Actualizar Servicio',['class'=>'btn btn-primary','style=font-size:0.8em']) }}
        <a href="/services" class="btn btn-primary" style="float:right;font-size:0.8em">Atrás</a>
    </div>
    {{ Form::close()}}
   </section>
    
    </main>

<script>
        let long_id ;
    window.onload = () =>{
            long_id = window.document.getElementById('products').children.length;
            const select = window.document.getElementById('products');
        let products_amount = [];
        for(let i =0;i<select.children.length-1;i++){
            products_amount[select.children[i].children[1].children[0].dataset.value] = parseInt([select.children[i].children[2].children[0].value]);
        }
        window.document.getElementById('invisible_id_old').value = JSON.stringify(products_amount);
        createProducts();
        }
    const createProduct = () => {
        const select = window.document.getElementById('sel_products');
        const text = select.options[select.selectedIndex].text;
        const value = select.options[select.selectedIndex].value;
        window.document.getElementById(long_id).innerHTML += generateTupla(text,value);
        long_id++;
        const tr = window.document.createElement('tr');
        tr.id = long_id;
        window.document.getElementById('products').appendChild(tr);
        select.options[select.selectedIndex].parentNode.removeChild(select.options[select.selectedIndex]);
      
    }
   
    const removeProduct = (id) => {
        
        const value = window.document.getElementById(`products${id}`).dataset.value;
        const text = window.document.getElementById(`products${id}`).value;
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
    const generateTupla = (text,value) => {
              
                return ` <tr id="${long_id}">
                                        <td  style="width:25%;font-size:0.8em">Producto: </td>
                                        <td>
                                           
                                            <input style="font-size:0.8em" class="form-control" type="text" disabled id="products${long_id}" data-value="${value}" value="${text}">
                                        
                                            </td>
                                            <td>
                                            {{ Form::text('amount${long_id}', 0, ['class' => 'form-control ' . ($errors->has('amount${long_id}') ? 'has-error' : ''),'id="amount${long_id}"','type="number"', 'style=text-align:center;font-size:0.8em',' onblur="createProducts()"']) }}
                              
                                                </td> 
                                            <td><button style="font-size:0.8em" type="button" class="btn btn-primary"  onclick="removeProduct(${long_id})">-</button></td>
                                </tr>`;
            }
    
</script>
@endsection