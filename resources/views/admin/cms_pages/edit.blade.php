<div class="modal fade" id="update{{$data['id']}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{$data['name']}}</h5>
      </div>
      <form id="updateCmsPage" action="{{route('cmspage.update',$data->id)}}" method="post">@csrf
       @method('PUT')
      <div class="modal-body">

          <div class="form-group">
            <label class="col-form-label">Change Page Type:</label>
            <select name="type" class="form-control" required>
              <option value="">---select option---</option>
              <option value="header" {{$data->type == 'header' ? 'selected' : ''}}> Header Page</option>
              <option value="footer" {{$data->type == 'footer' ? 'selected' : ''}}> Footer Page </option>
            </select>
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Page Name:</label>
            <input type="text" class="form-control" name="name" value="{{$data['name']}}">
          </div>

          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" name="content">{!! $data['content'] !!}</textarea>
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