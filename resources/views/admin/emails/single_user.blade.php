<div class="modal fade" id="sendMessage{{$data['id']}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{$data['email']}}</h5>
      </div>
      <form id="updataCustomer" action="{{route('email.send',$data['id'])}}" method="post">@csrf
      <div class="modal-body">
        
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Email Title:</label>
            <input type="text" class="form-control" name="name">
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Email Body:</label>
            <textarea class="form-control" name="body" rows="10"></textarea>
          </div>


      </div>
       <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Send Email Notification</button>
       </div>
     </form>
    </div>
  </div>
</div>