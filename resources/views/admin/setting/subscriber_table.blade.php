<div class="panel">
  <div class="panel-heading">

     <div class="panel-title">
      Uer Subscriber List

       <span  style="float: right;margin: -5px;">
         <a href="" class="btn btn-success btn-sm" style="color: white;" data-toggle="modal" data-target="#allUser">
          <i class="fa fa-envelope-o"></i>
          Send All User Email
        </a>
      </span>

     </div>
     
  </div>

<div class="panel-body">
<table class="table table-bordered">

<thead>
<tr>
  <th>Action</th>
  <th>User Name</th>
  <th>User Email</th>
  <th>Status</th>
</tr>
</thead>

<tbody>
@foreach($subscriberData as $data)
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
            <a href="#" class="icon fa fa-fw fa-angle-double-right" data-toggle="modal" data-target="#sendMessage{{$data['id']}}"> Send Message</a>
          </li>

          <li>
            <a href="#">
            <form action="{{ route('subscribers.destroy', $data['id']) }}" method="post">@csrf
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
   <td> {{ $data->email }}</td>
   <td> {{ $data->status }}</td>
</tr>
 @include('admin.setting.edit_subscriber')
 @include('admin.emails.single_user')
@endforeach
</tbody>
</table>
</div>
</div>