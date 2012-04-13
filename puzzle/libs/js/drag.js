$(function(){
	$(".imgs img").draggable();
	$(".main_img").lightBox();
	var num_see=0;
	$(".show_img").click(function(){
		num_see ++;
		if(num_see > 3){
			$('.main_img').attr('href','img/main2.png');
			$('.main_img').attr('title','sorry,yoc cant see it again')
		}
	})	
	/*$(".place div div").droppable({
		accept:a($(this).attr('id')),
		drop: function( event, ui ) {
			var id_p ,id_img ;
			id_p=$(this).attr('id');
			id_img="#"+$(this).attr('id').substring(0,$(this).attr('id').indexOf("_p"));
			$('#correct' ).html(id_img);
			
		}
			
	});*/
	$(".result").click(function(){
		$('.result_content').show(1000);
	})
})
function dropable(rows_num,cols_num){
	$(function(){
		var correct=0;
		var mistake=rows_num*cols_num;;	
		for(i=1;i<=rows_num;i++){
			for(j=1;j<=cols_num;j++){
				id_place="#"+i+"_"+j+"_p" ;
				id_img="#"+i+"_"+j ;
				$(id_place).droppable({
					accept : "#"+i+"_"+j ,
					drop: function( event, ui ) {
						correct ++;
						mistake--;					
						$(this).droppable( "disable" );
						//$(this).html("<img>")
					},
					/*out: function(event, ui) {
						alert(1);
						$(this).droppable( "enable" );
						alert(3);
						correct -- ;
					 }*/
				})
			}
		}
		$(".result").click(function(){
			$(".result_content").html("you place "+correct+" pieces correctly and "+mistake+"uncorrect");
		})
		
	})
	
}