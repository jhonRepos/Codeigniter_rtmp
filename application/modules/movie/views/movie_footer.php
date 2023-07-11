<script>

$(document).on('click','#video_upload',function(event){
	event.preventDefault();	

var cat=$('#category').val();
if(cat !=''){
   var form = $('#uploadform')[0];
   var formData = new FormData(form);
         
       	$('#video_upload').hide();
  
   $.ajax({
        xhr: function() {
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function(evt) {
                        if (evt.lengthComputable) {
                            var percentComplete = ((evt.loaded / evt.total) * 100);
                            $(".progress-bar").width(percentComplete + '%');
                            $(".progress-bar").html(percentComplete+'%');
                        }
                    }, false);
                    return xhr;
                },
                
               type: 'post',
               url: '<?=site_url('movie/uploadvideo')?>',
               data:formData,
               cache: false,
               contentType: false,
               processData: false,
               dataType:'json',	
                beforeSend: function(){
                $(".progress-bar").width('0%');
   
                },
                error:function(err){
              
                    $('#uploadStatus').html('<p style="color:#EA4335;">File upload failed, please try again.</p>');
                },
               success: function (resp) {      
               console.log(resp);
                if(resp.res == 'ok'){
                $('#video_upload').show();
                    $('#uploadStatus').html('<p style="color:#28A74B;">File has uploaded successfully!</p>');  
                    $('#video_nameses').val(resp.msg);  
               
                }else{
                 $('#video_upload').show();
                 $('#uploadStatus').html('<p style="color:red;">No Movie Upload!</p>');
                }
                  
                                                                   
                        
                          
                           
               }
             });
 

 }else{
 alert('You need to select Category')
 }  
})


</script>