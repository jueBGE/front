<script>
$('a.btn').on('click', function(e) {
    e.preventDefault();
    var url = $(this).attr('href');
	$('.modal-content').css({"width" : "100%","height" : "100%"});
	$('.modal-header').css({"height" : "10%"});
	$('.modal-body').css({"height" : "1000px"});
	$('.modal-footer').css({"height" : "5%"});
	$('.modal-header').html('<img src="/BGE/files/images/BGE.jpg" alt="logoBGE" width="10%"></img>');
    $(".modal-body").html('<iframe  width="100%" height="1000px" frameborder="0" scrolling="yes" allowtransparency="true" src="'+url+'"></iframe>');//width="850px" height="900px"
});
</script>