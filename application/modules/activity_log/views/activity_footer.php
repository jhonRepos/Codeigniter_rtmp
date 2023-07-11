
<script>

             
var movielist= $('#movielist').DataTable({

	
    ordering:false,
  	
	 "ajax":{
			   "url": 'activity_log/fetch',
         
			},

	    
	});

</script>