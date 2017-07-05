/**
 * Created by zhou on 2015/11/16.
 */
(function ($) {
    $.fn.citySelecter = function (url, provinceId, cityId) {

        var $_this          = this;
        var province        = $("<select name='province'>");
        var city_c          = $_this.find("[name='city']");
        var province_c      = $_this.find("[name='province']");
        var province_change = function () {
            var _this = province;
            var city  = $("<select name='city'>");
            if (provinceId !== undefined) {
                var cselectIndex = 0;
            }
            $.post(url, {action: 'getCity', province: _this.val()}, function (data) {

                $.each(data, function (index, value) {
                    city.append($("<option value='" + value.id + "'>").html(value.name));
                    if (cityId !== undefined) {
                        if (cityId == value.id) {
                            cselectIndex = city.find("option").length - 1;
                        }
                    }
                });
                if (cityId !== undefined) {
                    city.get(0).selectedIndex = cselectIndex;
                }
                if (city_c.length == 1) {
                    city_c.html(city);
                }
            });


        };

        $.post(url, {action: 'getProvince'}, function (data) {
            if (provinceId !== undefined) {
                var selectIndex = 0;
            }
            province.append($("<option value=''>").html('请选择'));
            $.each(data, function (index, value) {
                // console.log(value.id,value.name);
                province.append($("<option value='" + value.id + "'>").html(value.name));
                if (provinceId !== undefined) {
                    if (provinceId == value.id) {
                        selectIndex = province.find("option").length - 1;
                    }
                }
            });
            if (provinceId !== undefined) {
                province.get(0).selectedIndex = selectIndex;
                province_change(province);
            }
            if (province_c.length == 1) {
                province_c.html(province);
            }
        });


        province.bind("change", province_change);


    };
})(jQuery);

function bytesToSize(bytes) {
  bytes = Number(bytes);
  if (bytes === 0) return '0 B';
  var k     = 1024,
      sizes = ['B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'],
      i     = Math.floor(Math.log(bytes) / Math.log(k));
  return (bytes / Math.pow(k, i)).toFixed(3) + ' ' + sizes[i];
}