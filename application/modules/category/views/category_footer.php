
<script>
setTimeout(function () {
             $('.toast').removeClass('show');
             }, 3000);
             
             
var cattable= $('#cattable').DataTable({

	
    ordering:false,
  	
	 "ajax":{
			   "url": 'category/fetch',
         
			},

	    
	});


$(document).on('click','.editbtn',function(){
var id=$(this).data('id');

$('#name'+id).toggle();
  $('#des'+id).toggle();
$('#namedis'+id).toggle();
$('#desdis'+id).toggle();
$('#editbtn'+id).toggle();
$('#close'+id).toggle();
$('#check'+id).toggle();
})

$(document).on('click','.close',function(){
var id=$(this).data('id');

$('#name'+id).toggle();
  $('#des'+id).toggle();
$('#namedis'+id).toggle();
$('#desdis'+id).toggle();
$('#editbtn'+id).toggle();
$('#close'+id).toggle();
$('#check'+id).toggle();
})

$(document).on('click','.check',function(){
var id=$(this).data('id');


var name=$('#name'+id).val();
var des=$('#des'+id).val();

 $.ajax({
            url:"<?=site_url('category/editcategory')?>",
            method:"POST",
            data:{name,des,id},
            dataType:"json",
            success:function(data){
           
              $('#toastajax').addClass('show');
              $('#toastval').html(data); 
              setTimeout(function () {
            	 location.reload();
             },1000);               
            },
        })
        

})

</script>