<div class="panel">
  <div class="panel-heading">
  <div class="panel-title">Cms Pages List</div>
</div>

<div class="panel-body">
<table class="table table-bordered">

<thead>
<tr>
<th>Action</th>
<th>Page Name</th>
<th>Slug</th>
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
            <a href="#" class="icon fa fa-fw fa-angle-double-right" data-toggle="modal" data-target="#highlight{{$data['id']}}"> Highlight Data</a>
          </li>
          <li>
            <a href="#" class="icon fa fa-fw fa-angle-double-right" data-toggle="modal" data-target="#update{{$data['id']}}"> Edit Data</a>
          </li>

          <li>
            <a href="#">
            <form action="{{ route('cmspage.destroy', $data['id']) }}" method="post">@csrf
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
   <td> {{ $data->slug }}</td>
   <td>
     
      <form id="status{{ $data['id'] }}" action="{{ route('cmspage.status') }}" method="post">
        @csrf
        <input type="hidden" value="{{ $data['id'] }}" name="cms_id">
        <div id="checkbox{{ $data['id'] }}">
          <input type="checkbox" {{ $data['status'] == 1 ? 'checked' : '' }} data-toggle="toggle" data-width="30">
        </div>
     </form>

   </td>
</tr>
@include('admin.cms_pages.highlight')
@include('admin.cms_pages.edit')
@endforeach
</tbody>
</table>
</div>

</div>