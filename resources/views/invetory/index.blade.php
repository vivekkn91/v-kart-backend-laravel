@extends('layouts.app')

@section('content')

@include('sidebar')
<div>
    <form action="{{route('invetory.create')}}" method="POST">
        @csrf
        <table class="table table-bordered" id="dynamicTable">

            <tr>
                <th>item</th>
                <th>tax</th>
                <th>price</th>
                <th>type</th>
                <th>selling_price</th>
                <th>total_price</th>
                <th>Action</th>
            </tr>
            <input name="invetory[0][status]" value="0" type="hidden" />

            <td><input type="text" name="invetory[0][item]" class="form-control" required /></td>
            <td>
                <select class="form-control" name="invetory[0][type]">
                    @forelse($products as $product)

                    <option value=" {{$product->typeoffood}}">{{$product->typeoffood}}</option>
                    @empty
                    <option selected>Pick Type</option>
                    @endforelse

                </select>
            </td>
            <td><input type="text" name="invetory[0][tax]" class="form-control" required /></td>
            <td><input type="text" name="invetory[0][price]" class="form-control" required /></td>

            <td><input type="text" name="invetory[0][selling_price]" class="form-control" required /></td>
            <td><input type="text" name="invetory[0][total_price]" class="form-control" required /></td>

            </tr>
            <button type="button" name="add" id="add" class="btn btn-success">Add More</button>

            <button type="submit" class="btn btn-success">Save</button>
    </form>

    @endsection
