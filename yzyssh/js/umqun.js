$(document).ready(function(){
    $('#ajax_key').click(function() {
		$.ajax({
            type: "get",
            url: "./api.php",
            dataType: "json",
            data: "do=get&v=" + $("#key").val(),
            async: true,
            success: function(res) {
                if (res.status == 200) {
                    res = res.res;
                    var Divhtml = "";
					var oDiv = document.getElementById('moda');
                    for (i in res) {	
                        Divhtml = Divhtml + '<a href=javascript:play(' + res[i] + ')>' + i + '</a>';
                    }
					oDiv.innerHTML = '<div class="moda">'+Divhtml+'</div>';
                } else {
                    alert(res.res);
                }
			},
            error: function(a) {
                alert("失败,请检查关键字。");
			}
		});
    });
});
function play(id){
    $.ajax({
        type: "GET",
        url: "./api.php",
        dataType: "json",
        data: "do=play&v=" + id,
        async: true,
        success: function(res) {
            if (res.status == 200) {
                res=res.res;
                var Divhtml = "";
				var oDiv = document.getElementById('moda');
                for (i in res) {
                    Divhtml = Divhtml + '<a target="_blank" href="' + res[i] + '">' + i + '</a>';
                }
				oDiv.innerHTML = '<div class="moda">'+Divhtml+'</div>';
            } else {
                alert(res.res);
            }
        },
        error: function(a) {
            alert("失败，请检查关键字。");
        }
    })
}