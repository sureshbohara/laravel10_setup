<div class="panel-body">
<div class="form-group col-md-6">
<label for="name">Mail Transport : </label>
<input type="text" class="form-control" name="mail_transport" value="{{ $setting['mail_transport'] }}" placeholder="smtp">
</div>

<div class="form-group col-md-6">
<label for="mail_host">Mail Host: </label>
<input type="text" class="form-control" name="mail_host" value="{{ $setting['mail_host'] }}" placeholder="smtp.mailgun.org">
</div>

<div class="form-group col-md-12">
<label for="mail_port">Mail Port: </label>
<input type="text" class="form-control" name="mail_port" value="{{ $setting['mail_port'] }}" placeholder="587">
</div>

<div class="form-group col-md-12">
<label for="mail_from_name">Mail From Name: </label>
<input type="text" class="form-control" name="mail_from_name" value="{{ $setting['mail_from_name'] }}" placeholder="Transnora Limo">
</div>

<div class="form-group col-md-12">
<label for="name">Mail Username: </label>
<input type="text" class="form-control" name="mail_username" value="{{ $setting['mail_username'] }}" placeholder="info@demo.com">
</div>

<div class="form-group col-md-12">
<label for="name">Mail Password: </label>
<input type="text" class="form-control" name="mail_password" value="{{ $setting['mail_password'] }}" placeholder="9765grg@SDthh">
</div>

<div class="form-group col-md-12">
<label for="name">Mail Encryption: </label>
<input type="text" class="form-control" name="mail_encryption" value="{{ $setting['mail_encryption'] }}" placeholder="tls">
</div>

<div class="form-group col-md-12">
<label for="name">Mail From Address: </label>
<input type="text" class="form-control" name="mail_from" value="{{ $setting['mail_from'] }}" placeholder="info@demo.com">
</div>
</div>