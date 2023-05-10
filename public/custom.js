$(document).ready(function(){
	$('.userList').click(function(){
		$('.startHeader').hide();
		$('.chatSectionHide').show();
	});
});

Echo.join('status-update')
.here((users)=>{
	console.log(users);
})
.joining(()=>{

})
.leaving(()=>{

})
.listen('UserStatusEvent',(e)=>{
 console.log('abcn'+e);
})