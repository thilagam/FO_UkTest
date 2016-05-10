<?php /* Smarty version 2.6.19, created on 2014-12-01 12:57:33
         compiled from Contrib/profile_image_crop.phtml */ ?>
<?php echo '
	<script language="Javascript">
		$(function(){
			$("#saveimage,#original,#cancel").click(function(){
					var id_name=$(this).attr("id");
					$("#function").val(id_name);
					if(id_name=="cancel")
					{
						$("#cropbox").attr(\'src\',\'#\');
						$(".jcrop-holder").remove();
						$("#cropbox").removeData(\'Jcrop\');
					}
					else if((checkCoords() && id_name=="saveimage") || id_name=="original"  )
					{
						$.post("/contrib/cropprofilepic", $("#crop_form").serialize(),
							function(data) {
								//alert(data);
								var obj = $.parseJSON(data);
								var approot="/FO/";
								var profilepic=approot+obj.path+obj.identifier+"_p."+obj.ext+ \'?\' + (new Date()).getTime();
								$("#profilepic").attr("src",profilepic);						
								
								
								$("#cropbox").attr(\'src\',\'#\');
								$(".jcrop-holder").remove();
								$("#cropbox").show();
								$("#cropbox").removeData(\'Jcrop\');
								$(\'#Cropimage\').modal(\'hide\');
								
							
							
					   });
						
					}
					$(\'html, body\').animate( { scrollTop: 100 }, \'slow\' );
			});
		});	
			function updateCoords(c)
			{
				$(\'#x\').val(c.x);
				$(\'#y\').val(c.y);
				$(\'#w\').val(c.w);
				$(\'#h\').val(c.h);
			};
			function checkCoords()
			{
				if (parseInt($(\'#w\').val())) return true;
				alert(\'Please select a crop region then press submit.\');
				return false;
			};
		</script>
'; ?>

	<!-- Overlay brief client  -->
		<p>
			You can resize your photo/logo/image. The size of the image that will appear on your profile is highlighted in the default square. Click on "save" once you have resized your image.
		</p>	
		<!--<hr>-->
		<div class="cropdiv"><img src="#" id="cropbox"></div>
		

		<!-- This is the form that our event handler fills -->
		<form action="" method="post" id="crop_form">
			<input type="hidden" id="function" name="function" value="saveimage"/>
			<input type="hidden" id="x" name="x" value="50"/>
			<input type="hidden" id="y" name="y" value="100"/>
			<input type="hidden" id="w" name="w" value="100"/>
			<input type="hidden" id="h" name="h" value="100"/>
			<a class="btn btn-primary" name="Enregistrer" id="saveimage">SAVE</a>
			<a class="btn btn-primary" name="original" id="original">Do not resize</a>
			<button class="btn" data-dismiss="modal" name="cancel" id="cancel">Cancel</button>			
		</form>