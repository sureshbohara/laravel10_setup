<div class="panel">
  <div class="panel-heading">
  <div class="panel-title">User Role List</div>
</div>

<div class="panel-body">
<table class="table table-bordered">

<thead>
<tr>
<th>Action</th>
<th>Role Name</th>
<th>Status</th>
</tr>
</thead>

<tbody>
@foreach($roleData as $data)
 <tr>
  <td>
    
    <div class="btn-group">
        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       Action <span class="caret"></span>
      </button>
        <ul class="dropdown-menu">
          <li>
            <a href="#" class="icon fa fa-fw fa-angle-double-right" data-toggle="modal" data-target="#update{{$data['id']}}"> Edit Data</a>
          </li>

          <li>
            <a href="#">
            <form action="{{ route('role.destroy', $data['id']) }}" method="post">@csrf
               @method('DELETE')
               <input name="_method" type="hidden" value="DELETE">
               <inout  type="submit" title="delete data" class="show_confirm">
               <i class="fa fa-angle-double-right" aria-hidden="true"></i> Delete Data
            </form>
          </a>
        </li>

       </ul>
      </div>
  </td>
   <td> {{ $data->name }}</td>
   <td>
     
      <form id="status{{ $data['id'] }}" action="{{ route('role.status') }}" method="post">
        @csrf
        <input type="hidden" value="{{ $data['id'] }}" name="role_id">
        <div id="checkbox{{ $data['id'] }}">
          <input type="checkbox" {{ $data['status'] == 1 ? 'checked' : '' }} data-toggle="toggle" data-width="30">
        </div>
     </form>

   </td>
</tr>
@include('admin.role.edit')
@endforeach
</tbody>
</table>
</div>

</div>