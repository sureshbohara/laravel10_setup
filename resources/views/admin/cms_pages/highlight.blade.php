<div class="modal fade" id="highlight{{$data['id']}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
         <h5 class="modal-title">Page Name : {{$data['name']}}</h5>
      </div>
      <form action="{{route('cmspage.highlite',$data['id'])}}" method="post">@csrf
      <div class="modal-body">
        <div class="form-group">
            <label class="col-form-label">Change Highlight:</label>
            <select name="type" class="form-control" required>
              <option value="">---select option---</option>
              <option value="header" {{$data->type == 'header' ? 'selected' : ''}}> Header Page</option>
              <option value="footer" {{$data->type == 'footer' ? 'selected' : ''}}> Footer Page </option>
            </select>
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