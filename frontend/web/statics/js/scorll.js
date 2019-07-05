$(function(){
	var top1=0;
	$(".ui-loginbar").addClass("on");
	$(window).scroll(function(){
		var top2=$(window).scrollTop();
		if(top2>top1){
			$(".na1").addClass("on")
			$(".ui-loginbar").removeClass("on")
			}else{
				$(".ui-loginbar").addClass("on")
				$(".na1").removeClass("on")
				}
				
		})
	})
