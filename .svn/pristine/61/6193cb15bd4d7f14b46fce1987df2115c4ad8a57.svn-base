(function($){

	$.fn.createCity = function(url){

		var _url = url;
		var _this = this;
        var province = _this.find("select[name='province']");
	    var city = _this.find("select[name='city']");
	    var county = _this.find("select[name='county']");
	    var setAct = {
	        init : function(){
                setAct.fillHtml();
                setAct.bindFunc();
	        },
            
	        fillHtml : function(){
	            var data = setAct.getCityByPid(1);
	            var str = '<option value="">省份</option>';
	            $.each(data, function(index, val) {
	            	str += '<option value="' + val.id + '">' + val.name + '</option>';
	            });
	            province.html(str);
	        },

	        bindFunc : function(){
                province.change(function() {
                	var pid = province.val();
                	var data = setAct.getCityByPid(pid);
                	var str = '<option value="">市/区</option>';
	                $.each(data, function(index, val) {
	                	str += '<option value="' + val.id + '">' + val.name + '</option>';  	
		            });
		            city.html(str);
                });

                city.change(function() {
                	var pid = city.val();
                	var data = setAct.getCityByPid(pid);
                	var str = '<option value="">县/区</option>';
	                $.each(data, function(index, val) {
	                	str += '<option value="' + val.id + '">' + val.name + '</option>';  		
		            });
		            county.html(str);
                });
	        },

	        getCityByPid : function(pid){
	            var datas = [];
	            if (!pid) {
	            	return datas;
	            }
                $.ajax({
                	async:false,
                	url: _url,
                	type: 'POST',
                	dataType: 'json',
                	data: {pid: pid},
                	success: function (data, textStatus) {
	                    datas = data;
	                },
	                error: function (XMLHttpRequest, textStatus, errorThrown) {
	                }
                })
            
                return datas;
	        }
	    };
	    setAct.init();
	}
    
})(jQuery);