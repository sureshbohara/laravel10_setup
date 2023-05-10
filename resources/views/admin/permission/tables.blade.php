<table class="table table-bordered">
<thead>
<tr>
   <th>Role Permissions</th>
   <th>Action</th>
</tr>
</thead>
<tbody>
@foreach($permissionsData as $data)
<tr>
<td>{{$data['role']['name']}}</td>
<td>

   <div class="btn-group">
        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       Action <span class="caret"></span>
      </button>
        <ul class="dropdown-menu">
          <li>
            <a href="{{route('permissions.edit',$data['id'])}}" class="icon fa fa-fw fa-angle-double-right"> Edit Data</a>
          </li>

          <li>
            <a href="#">
            <form action="{{ route('permissions.destroy', $data['id']) }}" method="post">@csrf
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
</tr>
@endforeach
</tbody>
</table>