<div class="panel-body">
<table class="table table-bordered">
<thead> 
<tr>
   <th>Action</th>
   <th>Name</th>
   <th>Type</th>
   <th>Address</th>
   <th>Contact No</th>
   <th>Email</th>
   <th>Status</th>
</tr>
</thead>

<tbody>
   @foreach($getData as $data)
   <tr>
      <td>
         
      <div class="btn-group">
        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       Action <span class="caret"></span>
      </button>
        <ul class="dropdown-menu">
          <li>
            <a href="{{route('adminuser.edit',$data['id'])}}" class="icon fa fa-fw fa-angle-double-right"> Edit Data</a>
          </li>

          <li>
            <a href="#">
            <form action="{{ route('adminuser.destroy', $data['id']) }}" method="post">@csrf
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
      <td>{{$data['name']}}</td>
      <td>{{$data['type']}}</td>
      <td>{{$data['address']}}</td>
      <td>{{$data['mobile_number']}}</td>
      <td>{{$data['email']}}</td>
      <td>
         <form id="status{{ $data['id'] }}" action="{{ route('change.status') }}" method="post">
        @csrf
        <input type="hidden" value="{{ $data['id'] }}" name="admin_id">
        <div id="checkbox{{ $data['id'] }}">
          <input type="checkbox" {{ $data['status'] == 1 ? 'checked' : '' }} data-toggle="toggle" data-width="30">
        </div>
     </form>
      </td>
   </tr>
   @endforeach
</tbody>
</table>
</div>