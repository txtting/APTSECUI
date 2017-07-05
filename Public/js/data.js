function get_base_info(){
	var data = $('#base_info').serialize();
    return data;
} 


function send(url,data){
		$.ajax({
	     type: 'POST',
	     url: url,
	     data: data ,
	     success:function(data){
	            alert('成功');
	      },    
	     error:function(){} 
	});
}