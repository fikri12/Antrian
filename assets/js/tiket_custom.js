$("#sub").click(function() {
	$("#kode").val('1');
	$.post($("#myForm").attr("action"), $("#myForm :input").serializeArray(), function(info) { $("#result").html(info); });
	
});
$("#sub2").click(function() {
	$("#kode").val('2');
	$.post($("#myForm").attr("action"), $("#myForm :input").serializeArray(), function(info) { $("#result").html(info); });
	
}); 
$("#myForm").submit(function(){
	return false;
});
 
function clearInput(){
	$("#myForm :input").each(function(){
		$(this).val('');
	});
};