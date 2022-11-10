@extends('layouts.app')

@section('content')

@include('sidebar')


<div>

    <div class="form-row align-items-center">
        <div class="col-auto">
            <label class="sr-only" for="inlineFormInput">Add type</label>
            <form action="{{route('foodtype.createtype')}}" method="POST">
                @csrf
                <input type="text" name="typeoffood" class="form-control mb-2" id="inlineFormInput"
                    placeholder="Jane Doe">

        </div>


        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-2">Submit</button>
        </div>
    </div>
    </form>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Sl no</th>
                <th scope="col">Types</th>

            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
            <tr>
                <th scope="row">{{$product->id}}</th>

                <td>{{$product->typeoffood}}</td>

            </tr>
            <span></span>
            @empty
            <tr>No products</tr>
            @endforelse
        </tbody>
    </table>


</div>


@endsection
