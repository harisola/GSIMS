
// Element Data extraction
var get_element_data = function(element_type,elememt_selector){
	
	var data = [];

	if(element_type  == 'selectbox'){
		data['value'] = $(elememt_selector+" option:selected").val();
	}

	return data;
}
