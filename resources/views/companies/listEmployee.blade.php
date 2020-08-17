@extends('layouts.app')

@section('content')
<div class="container">
{{-- Table d'affichage des Données --}}
<table class="table table-striped" >
    <thead>
    <tr>
        <th scope="col">Designation</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Email</th>
        <th scope="col">Company</th>
        <th scope="col">Address</th>
        <th scope="col">Mobile</th>
    </tr>
    </thead>
    <tbody>
        @foreach($list as $item)
            <tr style="white-space: wrap;overflow: hidden;">
                {{-- Designation --}}
                <td scope="row text-center">{{ $item->Designation }}</td>
                {{-- FirstName --}}
                @if($item->FirstName == NULL)
                <td scope="row text-center">---</td>
                @else
                <td scope="row text-center">{{ $item->FirstName }}</td>
                @endif
                {{-- LastName --}}
                @if($item->LastName == NULL)
                <td scope="row text-center">---</td>
                @else
                <td scope="row text-center">{{ $item->LastName }}</td>
                @endif
                {{-- Email --}}
                @if($item->Email == NULL)
                <td scope="row text-center">---</td>
                @else
                <td scope="row text-center">{{ $item->Email }}</td>
                @endif
                {{-- companie_id --}}
                @if($item->companie_id == NULL)
                <td scope="row text-center">---</td>
                @else
                <td scope="row text-center">{{ $item->compName }}</td>
                @endif
                {{-- Address --}}
                @if($item->Address == NULL)
                <td scope="row text-center">---</td>
                @else
                <td scope="row text-center">{{ $item->Address }}</td>
                @endif
                {{-- Phone --}}
                @if($item->Mobile == NULL)
                <td scope="row text-center">---</td>
                @else
                <td scope="row text-center">{{ $item->Mobile }}</td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>
{{-- La fonction links() nous permet d'afficher la pagination --}}
<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
      <span>{{$list->links()}}</span>
  </ul>
</nav>
</div>
@endsection
