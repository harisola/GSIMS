<input type="hidden" name="url" value="{{url('/')}}" class="main_url">
<input type="hidden" name="csrf" value="{{ csrf_token() }}" class="csrf">
<script type="text/javascript">
	window.applyRequiredError=function applyRequiredError(selector_type="id",selector_name,error){
	if(selector_type=="id"){
		feild="#"+selector_name;
	}else if(selector_type=="class"){
		feild="."+selector_name;
	}
	var feild = $(feild+":visible"); //using class instead of input:text
	var error_class=selector_name+'error';
	var my_error_class=selector_name+'error';
	window.remove_error='.'+error_class;
	$("."+error_class).remove();
	var attr='"'+my_error_class+' error"';
	var html = '<span class='+attr+'>'+error+'</span>';
    feild.after( html );
    return false;
}
$("input").keyup(function(){
  $(".error").remove();
});
$("input").click(function(){
  $(".error").remove();
});


</script>
