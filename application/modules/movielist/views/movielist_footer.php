
<script>

             
var movielist= $('#movielist').DataTable({

	
    ordering:false,
  	
	 "ajax":{
			   "url": 'movielist/fetch',
         
			},

	    
	});

</script>