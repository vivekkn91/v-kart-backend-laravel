@extends('layouts.app')

@section('content') 

@include('sidebar')
<div>
    {{-- @dump($post) --}}
     {{-- {{ print_r($products) }} --}}

      
       {{-- <li class="list-group-item">{{$product->item}}</li>         --}}
       <span>Total Items :  {{ $products->count() }}</span>  
  
 
        <table class="table table-bordered" id="dynamicTable">  
            <tr>
                <th>item</th>
                <th>tax</th>
                <th>price</th>
                <th>selling_price</th>
                <th>total_price</th>
                <th>Action</th>
                <th>Action</th>
            </tr>
             @forelse($products as $product) 
              <form action="{{route('invetory.edit')}}" method="POST">
          @csrf 
          @method('PUT')
               {{-- <input name="invetory[0][status]"  value="0"  type="hidden" /> --}}
           <input  name="id" value={{$product->user_id}} class="form-control"   type="hidden" />
                <td> <input type="text" name="item" value="{{$product->item}}" class="form-control" /></td>  
                <td><input type="text" name="tax" value="{{$product->tax}}"   class="form-control" /></td>  
                <td><input type="text" name="price" value="{{$product->price}}"  class="form-control" /></td>
                 <td><input type="text" name="selling_price"  value={{$product->selling_price}}  class="form-control" /></td>
                  <td><input type="text" name="total_price"  value="{{$product->total_price}}"  class="form-control" /></td>
                       <td> <button type="submit" class="btn btn-primary  ">Edit</button></td>
                          </form>
         

 @if($product->status =='0')
    <td>
      <button type="button" data-id="{{ $product->user_id }}" class="btn btn-success active_btn">active</button>
    </td>
  @else
    <td>
      <button type="button" data-id="{{ $product->user_id }}" class="btn btn-danger  deactive_btn">Deactive</button>
    </td>
  @endif
                 

            </tr>  
      
  {{-- <button type="button" name="add" id="add" class="btn btn-success">Add More</button>
    
        <button type="submit" class="btn btn-success">Save</button> --}}
       
           @empty
       <li class="list-group-item">No products</li>  
    @endforelse

@endsection
