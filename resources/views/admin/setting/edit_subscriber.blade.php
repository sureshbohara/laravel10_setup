<div class="modal fade" id="update{{$data['id']}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{$data['name']}}</h5>
      </div>
      <form id="updateSubscriber" action="{{route('subscribers.update',$data->id)}}" method="post">@csrf
       @method('PUT')
      <div class="modal-body">
        
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Name:</label>
            <input type="text" class="form-control" name="name" value="{{$data['name']}}">
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Email:</label>
            <input type="email" class="form-control" name="email" value="{{$data['email']}}">
          </div>


      </div>
       <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Change Data</button>
       </div>
     </form>
    </div>
  </div>
</div>