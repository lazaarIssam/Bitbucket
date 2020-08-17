@extends('layouts.app')

@section('content')
<div class="container">
{{-- @include('partials._messages') --}}
<button type="button" class="btn btn-outline-success float-right mb-2" data-toggle="modal" data-target="#exampleModal">Ajouter</button>
{{-- Form de recherche --}}
  <form action="{{ route('employees.recherche') }}" id="frmrecherche" method="post" enctype="multipart/form-data">
    @csrf
    <div class="input-group mb-3">
      {{-- <input type="text" name="recherche" id="recherche" class="form-control" placeholder="Zone de recherche"> --}}
      <div class="form-group">
        <label for="message-text" class="col-form-label">Recherche avec nom de la company</label> <br/>
        <select name="recherche" id="recherche"  class="form-control">
            <option value="">Company</option>
            @foreach($listCompanies as $info)
          <option value="{{$info->Name}}">{{$info->Name}}</option>
          @endforeach
        </select> <br/>
        <button class="btn btn-outline-secondary" form="frmrecherche" type="submit">Recherche</button>
    <div class="input-group-append">
    </div>
  </div>
</form>
{{-- Modal for Adding Employee || Modal pour l'ajout des Employees --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nouveau Employee</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('employees.store') }}" method="post" id="frm" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="message-text" class="col-form-label">Company</label>
                <select name="companie_id" id="companie_id1"  class="form-control" required>
                    <option value="">Choose...</option>
                    @foreach($listCompanies as $info)
                  <option value="{{$info->id}}">{{$info->Name}}</option>
                  @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="message-text" class="col-form-label">Designation</label>
                <select name="Designation" id="Designation1"  class="form-control" required>
                    <option value="">Choose...</option>
                    <option value="Mr.">Mr.</option>
                    <option value="Mme.">Mme.</option>
                </select>
            </div>
            <div class="form-group">
              <label for="FirstName1" class="col-form-label">First Name :</label>
              <input type="text" class="form-control" name="FirstName" id="FirstName1" required>
            </div>
            <div class="form-group">
                <label for="LastName1" class="col-form-label">Last Name :</label>
                <input type="text" class="form-control" name="LastName" id="LastName1" required>
              </div>
            <div class="form-group">
              <label for="Email1" class="col-form-label">Email :</label>
              <input type="text" class="form-control" name="Email" id="Email1" required>
            </div>
            <div class="form-group">
                <label for="Address1" class="col-form-label">Address :</label>
                <textarea type="text" class="form-control" name="Address" id="Address1"> </textarea>
            </div>
            <div class="form-group">
                <label for="Mobile" class="col-form-label">Mobile :</label>
                <input type="text" class="form-control" name="Mobile" id="Mobile1" required>
              </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"> Close</button>
          <button type="submit" form="frm" class="btn btn-primary"> Submit</button>
        </div>
      </div>
    </div>
  </div>

{{-- Modèle de modification des données --}}
{{-- Ce modèle s'ouvre qaund on clique sur le button modifier qui fait appel à la fonction java script qui par son tour fait appel à ce modèle et remplisles données de la ligne en question --}}
{{-- Une fois les données charger sur le modèle, on insere nos modification puis ce dernier fait appel à la méthode update ans notre controlleur EmployeesController --}}
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1">Modifier Materiel</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('employees.update') }}" method="post" id="frm1" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="idm" name="id">
            <div class="form-group">
                <label for="message-text" class="col-form-label">Company</label>
                <select name="companie_id" id="companie_id"  class="form-control" required>
                    <option value="">Choose...</option>
                    @foreach($listCompanies as $info)
                  <option value="{{$info->id}}">{{$info->Name}}</option>
                  @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="message-text" class="col-form-label">Designation</label>
                <select name="Designation" id="Designation"  class="form-control" required>
                    <option value="">Choose...</option>
                    <option value="Mr.">Mr.</option>
                    <option value="Mme.">Mme.</option>
                </select>
            </div>
            <div class="form-group">
              <label for="FirstName" class="col-form-label">First Name :</label>
              <input type="text" class="form-control" name="FirstName" id="FirstName" required>
            </div>
            <div class="form-group">
                <label for="LastName" class="col-form-label">Last Name :</label>
                <input type="text" class="form-control" name="LastName" id="LastName" required>
              </div>
            <div class="form-group">
              <label for="Email" class="col-form-label">Email :</label>
              <input type="text" class="form-control" name="Email" id="Email" required>
            </div>
            <div class="form-group">
                <label for="Address" class="col-form-label">Address :</label>
                <textarea type="text" class="form-control" name="Address" id="Address"> </textarea>
            </div>
            <div class="form-group">
                <label for="Mobile" class="col-form-label">Mobile :</label>
                <input type="text" class="form-control" name="Mobile" id="Mobile" required>
              </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"> Fermer</button>
          <button type="submit" form="frm1" class="btn btn-primary"> Modifier</button>
        </div>
      </div>
    </div>
  </div>
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
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
       @php $cnt=1; @endphp
        @foreach($list as $item)
            <tr style="white-space: wrap;overflow: hidden;">
                {{-- On insere des Input de type hidden afin de recuperer les informations de la ligne concerne en utilisant une fonction javascript --}}
                {{-- Notre fonction javascript va utiliser les id des inputs caché afin de récupérer les données --}}
                <input type="hidden" id="idtr{{$cnt}}" value="{{ $item->id }}">
                <input type="hidden" id="companie_idtr{{$cnt}}" value="{{ $item->companie_id }}">
                <input type="hidden" id="FirstNametr{{$cnt}}" value="{{ $item->FirstName }}">
                <input type="hidden" id="LastNametr{{$cnt}}" value="{{ $item->LastName }}">
                <input type="hidden" id="Designationtr{{$cnt}}" value="{{ $item->Designation }}">
                <input type="hidden" id="Emailtr{{$cnt}}" value="{{ $item->Email }}">
                <input type="hidden" id="Addresstr{{$cnt}}" value="{{ $item->Address }}">
                <input type="hidden" id="Mobiletr{{$cnt}}" value="{{ $item->Mobile }}">
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
                <td scope="row text-center">{{ substr($item->Address, 0, 15) }}...</td>
                @endif
                {{-- Phone --}}
                @if($item->Mobile == NULL)
                <td scope="row text-center">---</td>
                @else
                <td scope="row text-center">{{ $item->Mobile }}</td>
                @endif
                {{-- Action --}}
                <td>
                <div class="row">
                <div class="col-md-4">
                <button type="button" id="modifier{{$cnt}}" onclick="modifier({{$cnt}})" class="btn btn-outline-primary btn-sm"> Modifier</button>
                </div>
                <div class="col-md-4">
                <form method="post" action="{{ route('employees.destroy', ['id' => $item->id]) }}">
                    @csrf
                      <button onclick="return suppressionAffirmation();" class="btn btn-outline-danger btn-sm"> Supprimer</button>
                </form>
                </div>
                </div>
                </td>
            </tr>
            @php $cnt++; @endphp
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
<script>
  // Fonction qui récupere les données et les insere dans notre Modèle de modification
function modifier(params) {
  //alert(params);
  $('#idm').val($('#idtr'+params).val());
  $('#companie_id').val($('#companie_idtr'+params).val());
  $('#FirstName').val($('#FirstNametr'+params).val());
  $('#LastName').val($('#LastNametr'+params).val());
  $('#Designation').val($('#Designationtr'+params).val());
  $('#Email').val($('#Emailtr'+params).val());
  $('#Address').val($('#Addresstr'+params).val());
  $('#Mobile').val($('#Mobiletr'+params).val());
  $('#exampleModal1').modal();
}
// Fonction de confirmation de suppression
function suppressionAffirmation() {
      if(!confirm("Etes-vous sur de vouloir supprimer cette objet ?"))
      event.preventDefault();
  }
</script>
@endsection
