<div class="panel-body">
   <div class="form-group col-md-12">
      <label> Meta Title</label>
      <input type="text" class="form-control" name="meta_title" value="{{ $setting['meta_title'] }}">
   </div>

   <div class="form-group col-md-12">
      <label> Meta Keyword </label>
      <input type="text" class="form-control" name="meta_keywords" value="{{ $setting['meta_keywords'] }}">
   </div>

    <div class="form-group col-md-12">
      <label> Meta Description </label>
     <textarea class="form-control" name="meta_description" rows="5">{!! $setting['meta_description'] !!}</textarea>
   </div>



</div>


