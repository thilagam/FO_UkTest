<?php /* Smarty version 2.6.19, created on 2016-04-28 15:08:35
         compiled from Contrib/mission-article-deliver.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'utf8_decode', 'Contrib/mission-article-deliver.phtml', 56, false),array('modifier', 'count', 'Contrib/mission-article-deliver.phtml', 91, false),array('modifier', 'date_format', 'Contrib/mission-article-deliver.phtml', 168, false),array('modifier', 'zero_cut', 'Contrib/mission-article-deliver.phtml', 198, false),)), $this); ?>
<?php echo '
<script type="text/javascript">
$(\'body\').removeClass(\'homepage\');
$(\'body\').addClass(\'mission\');
</script>
<style type="text/css">
.btn-success_custom
{
	background-color: #5BB75B;    
    border-width: 0;
    color: #FFFFFF;
	font-weight:600
	background-image: linear-gradient(to bottom, #62C462, #51A351);
    background-repeat: repeat-x;
    border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
}
.btn-success_custom:hover, .btn-success_custom:active, .btn-success_custom.active, .btn-success_custom.disabled, .btn-success_custom[disabled] {
    background-color: #51A351;
    color: #FFFFFF;
}
.btn-success
{
margin-top: 0;
padding:5px 13px;
}
</style>
'; ?>


<div class="container">
<br>
<?php if ($this->_tpl_vars['missionDetails'] | @ count > 0): ?>
	<?php $_from = $this->_tpl_vars['missionDetails']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['details'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['details']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['article']):
        $this->_foreach['details']['iteration']++;
?>
	<ul class="breadcrumb">
		<li><a href="/contrib/home">Home</a> <span class="divider">/</span></li>
		<li><a href="/contrib/ongoing">My contributions</a> <span class="divider">/</span></li>
		<li class="active"><?php echo $this->_tpl_vars['article']['title']; ?>
</li>
	</ul> 
	<?php if ($this->_tpl_vars['article']['status'] == 'disapproved'): ?>
	<div class="alert alert-warning">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<a class="btn-link disabled btn-mini pull-right" href="#">I will not be able to adhere to these deadlines.</a>
		<i class="icon-exclamation-sign"></i> As your articles need rewriting/amendments, your deadline has been extended by <?php echo $this->_tpl_vars['article']['article_resubmit_time_text']; ?>
 to update them. 
	</div>
	<?php endif; ?>
	
	<!-- start, Summary -->
	<section id="summary">
		<div class="row-fluid">
			<div class="span8">
				<?php if ($this->_tpl_vars['article']['ao_type'] == 'premium'): ?>
					<?php if ($this->_tpl_vars['article']['missiontest'] == 'yes'): ?>
						<span class="label label-test-mission"><i class="icon-star icon-white"></i> Staffing</span>
					<?php else: ?>
						<span class="label label-premium">Premium Mission</span>&nbsp;&nbsp;managed by <b><?php echo $this->_tpl_vars['article']['bo_user']; ?>
</b>. <a style="color:#fff;font-weight:bold;text-decoration:underline;" href="/contrib/compose-mail?senduser=<?php echo $this->_tpl_vars['article']['article_id']; ?>
">Contact us !</a>
					<?php endif; ?>
					<h1><?php echo ((is_array($_tmp=$this->_tpl_vars['article']['title'])) ? $this->_run_mod_handler('utf8_decode', true, $_tmp) : smarty_modifier_utf8_decode($_tmp)); ?>
</h1>	
				<?php else: ?>	
					<?php if ($this->_tpl_vars['article']['missiontest'] == 'yes'): ?>
						<span class="label label-test-mission"><i class="icon-star icon-white"></i> Staffing</span>
					<?php else: ?>
						<span class="label label-quote">Freedom Mission</span>
					<?php endif; ?>
					<h1><?php echo $this->_tpl_vars['article']['title']; ?>
</h1>	
				<?php endif; ?>	
			</div>
			<div class="span3 stat">
				<p>Delivery date </p>
				<!-- add classname "less24" if time is < 24h  -->
				<!-- p class="num-large less24">Livrée</p-->
				<?php if ($this->_tpl_vars['article']['status'] == 'bid' || $this->_tpl_vars['article']['status'] == 'disapproved' || $this->_tpl_vars['article']['status'] == 'disapprove_client'): ?>
					<p class="num-large less24">
						<span id="dtime_<?php echo $this->_tpl_vars['article']['article_id']; ?>
_<?php echo $this->_tpl_vars['article']['article_submit_expires']; ?>
">
							<span id="dtext_<?php echo $this->_tpl_vars['article']['article_id']; ?>
_<?php echo $this->_tpl_vars['article']['article_submit_expires']; ?>
"><?php echo $this->_tpl_vars['article']['article_submit_expires']; ?>
</span>
						</span>
					</p>
				<?php else: ?>
					<p class="num-large less24" style="font-size:18px"><?php echo $this->_tpl_vars['article']['status_trans']; ?>
</p>
				<?php endif; ?>	
			</div>
						<div class="span1 stat">
				<div class="icon-comment-large new"><a href="#comment" class="scroll" id="comment_count"><?php echo count($this->_tpl_vars['commentDetails']); ?>
</a></div>
			<!--  to active if new comment, add classname "new" -->
			<!--div class="icon-comment-large new"><a href="#comment">3</a></div-->


			</div>
		</div>
	</section>
	<!-- end, summary --> 
 
	<div class="row-fluid"> 
		<div class="span9">
			<section id="a_o">
				<div class="mod">
					<div class="summary clearfix">
						<h4>PROJECT DETAILS</h4>
						<ul class="unstyled">
							<li><strong>Call to writers</strong> <span class="bullet">&#9679;</span></li>
							<li> Language : <img class="flag flag-<?php echo $this->_tpl_vars['article']['language']; ?>
" src="/FO/images/shim.gif"> <span class="bullet">&#9679;</span></li>
							<li>Category : <?php echo $this->_tpl_vars['article']['category']; ?>
 <span class="bullet">&#9679;</span></li>
							<li>Nb. Of words : <?php echo $this->_tpl_vars['article']['num_min']; ?>
 - <?php echo $this->_tpl_vars['article']['num_max']; ?>
 / article
							
							<?php if ($this->_tpl_vars['article']['spec_exists'] == 'yes'): ?>
								<li class="pull-right"><a href="/contrib/download-file?type=clientbrief&article_id=<?php echo $this->_tpl_vars['article']['article_id']; ?>
" class="btn btn-small btn-success"><i class="icon-white icon-circle-arrow-down"></i> Download the client brief</a></li>
							<?php endif; ?>	
						</ul>
					</div>
				</div>
			</section>
			<section id="file-management">				
				<div class="row-fluid file-management-cont">    
					<i class="outbox"></i><h4 class="clearfix">Edit-place box</h4>	 
					<p>Add the articles for this mission below. Beware, only one send per mission, so please send your files in a .zip if you have more than one file to share</p>				
					<?php if ($this->_tpl_vars['article']['status'] == 'bid' || $this->_tpl_vars['article']['status'] == 'disapproved' || $this->_tpl_vars['article']['status'] == 'disapprove_client'): ?>
					<?php if ($this->_tpl_vars['clientId'] == '120218054512919v'): ?>
                    <form action="/contrib/sendarticle" method="post" enctype="multipart/form-data">
                    <div class="pull-center">
							<p>
                                <!--<span class="btn btn-primary fileinput-button">
                                    <i class="icon-plus icon-white"></i>
                                    <span id="send-status">Ajouter un fichier...</span>-->
									<input type="file" id="send-article" name="article" class="span3">
								<!--</span>-->
								<button type="submit" class="btn btn-success" name="submit_article" id="submit_article" style="display:''">Send</button>
								<input type="hidden" name="participation_id" value="<?php echo $this->_tpl_vars['participation_id']; ?>
" id="send_participate_id">
                                <input type="hidden" name="clientId" value="<?php echo $this->_tpl_vars['clientId']; ?>
" id="clientId">
							</p>	
						</div>
                    </form>
                    <?php else: ?>
                        <div class="pull-center">
                            <p>
                                <span class="btn btn-primary fileinput-button">
                                    <i class="icon-plus icon-white"></i>
                                    <span id="send-status">Add a file...</span>
                                <!--<input type="file" id="send-article" name="article">-->
                                </span>
                                <button type="button" class="btn btn-success" name="submit_article" id="submit_article" style="display:''">Send</button>
                                <input type="hidden" name="participation_id" value="<?php echo $this->_tpl_vars['participation_id']; ?>
" id="send_participate_id">
                                <input type="hidden" name="clientId" value="<?php echo $this->_tpl_vars['clientId']; ?>
" id="clientId">
                            </p>
                        </div>
                    <?php endif; ?>
                    <?php endif; ?>
					
					<table style="margin-left: 4%" class="table mod span11 offset1">
						<thead>
						<tr>
							<th class="span6">File</th>
							<th class="span4" style="text-align:center">Date</th>
							<th class="span2">Size</th>
						</tr>
						</thead>
						<tbody>
							<?php if ($this->_tpl_vars['AllVersionArticles'] | @ count > 0): ?>
								<?php $_from = $this->_tpl_vars['AllVersionArticles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['articledetails'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['articledetails']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['versionarticle']):
        $this->_foreach['articledetails']['iteration']++;
?>
									<tr><td class="span8"><i class="icon-download"></i> <a href="/contrib/download-version-article?processid=<?php echo $this->_tpl_vars['versionarticle']['id']; ?>
"><?php echo $this->_tpl_vars['versionarticle']['article_name']; ?>
</a></td>
									<td class="span4 muted" style="text-align:center"><?php echo ((is_array($_tmp=$this->_tpl_vars['versionarticle']['article_sent_at'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y %H:%M") : smarty_modifier_date_format($_tmp, "%d/%m/%Y %H:%M")); ?>
</td>
									<td class="span2 muted"><?php echo $this->_tpl_vars['versionarticle']['file_size']; ?>
</td></tr>
								<?php endforeach; endif; unset($_from); ?>
							
							<?php else: ?>
								<tr><td colspan="4"></td></tr>
							<?php endif; ?>	
						</tbody>
					</table>

					
					<!-- call to action set -->
					<div class="pull-center btn-group">
						<?php if ($this->_tpl_vars['article']['status'] == 'bid' || $this->_tpl_vars['article']['status'] == 'disapproved' || $this->_tpl_vars['article']['status'] == 'disapprove_client' || $this->_tpl_vars['article']['status'] == 'time_out'): ?>
							<button href="/contrib/ask-more-time?ao_type=<?php echo $this->_tpl_vars['article']['ao_type']; ?>
&article_id=<?php echo $this->_tpl_vars['article']['article_id']; ?>
" role="button" data-toggle="modal" data-target="#moretime-ajax" class="btn" rel="tooltip" data-original-title="Ask for a deadline extension"><i class="icon-time"></i><sup>+</sup> Ask for a deadline extension</button>
						<?php endif; ?>	
						<a data-original-title="Aide" rel="tooltip" class="btn" href="/contrib/compose-mail?senduser=111201092609847"><i class="icon-question-sign"></i> Help</a>
					</div>
					
							
				</div>
			</section>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "Contrib/article-comments.phtml", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		</div>

		<div class="span3">
		<!--  right column  -->
			<aside>
				<div class="aside-bg">
					<div class="editor-price">
						<p class="quote-price">Royalties :<strong><?php if ($this->_tpl_vars['article']['free_article'] == 'yes'): ?>Free<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['article']['price_user'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['article']['currency']; ?>
;<?php endif; ?></strong></p>
						<?php if ($this->_tpl_vars['article']['ao_type'] != 'premium'): ?>
							<ul class="unstyled stripe">
								<li> Edit-place Commission included : <?php echo $this->_tpl_vars['article']['ep_commission']; ?>
%</li>
								<li>Total price paid by the client  : <?php echo ((is_array($_tmp=$this->_tpl_vars['article']['final_price'])) ? $this->_run_mod_handler('zero_cut', true, $_tmp, 2) : smarty_modifier_zero_cut($_tmp, 2)); ?>
 &<?php echo $this->_tpl_vars['article']['currency']; ?>
;</li>
							</ul>
						<?php endif; ?>	
					</div> 
					<div id="selected-editor" class="aside-block">
						<div class="editor-container">
							<h4>Your Client</h4>
							<img src="<?php echo $this->_tpl_vars['article']['client_pic']; ?>
" title="<?php echo $this->_tpl_vars['article']['company_name']; ?>
">
							<p class="editor-name"><?php echo $this->_tpl_vars['article']['company_name']; ?>
</p>
							<?php if ($this->_tpl_vars['article']['ao_type'] == 'premium'): ?>
								<a href="/contrib/compose-mail?senduser=110923143523902" class="btn btn-small">Contact us</a>
							<?php else: ?>
								<p>Tel : <?php echo $this->_tpl_vars['article']['phone_number']; ?>
</p> 
								<!--<a href="/contrib/compose-mail?senduser=<?php echo $this->_tpl_vars['article']['article_id']; ?>
" class="btn btn-small">Envoyer un message</a>-->
								<p>Email : <?php echo $this->_tpl_vars['article']['email']; ?>
</p> 
							<?php endif; ?>	
						</div>
					</div>
					<?php if ($this->_tpl_vars['article']['ao_type'] != 'premium'): ?>
					<div class="aside-block" id="liberte-guide" style="margin-top: 40px">
						<h4>Guide du r&eacute;dacteur</h4>
						<div class="pull-center inc"><span class="label label-quote">mission liberte</span></div>
						<p><strong>Avant de d&eacute;marrer... </strong></p>
						<ul>
							<li>Contactez le client par email ou t&eacute;l&eacute;phone d&egrave;s que vous &ecirc;tes s&eacute;lectionn&eacute;(e).     </li>
							<li>Demandez une confirmation du brief, du timing de rendu et du nombre d&rsquo;articles.</li>
						</ul>
						<p><strong>Une fois les articles r&eacute;dig&eacute;s...</strong></p>
						<ul>
							<li>T&eacute;l&eacute;chargez les &eacute;l&eacute;ments sur la plateforme.</li>
							<li>N'envoyez jamais votre travail complet par email au client.</li>
						</ul>
						<hr>
						<p class="pull-center"><a href="/contrib/download-file?type=guide_mission_liberte" class="btn btn-small"><i class="icon-download"></i> T&eacute;l&eacute;charger le guide complet</a></p>
					</div>
					<?php endif; ?>
					<div class="aside-block" id="garantee">
						<h4>Your Guarantees</h4>
						<dl>
							<dt><span class="umbrella"></span>Edit-place is your mediator</dt>
							<dd>In case of disputes/issues (delivery deadline, article rewrite/amendment, refund...)</dd>
							<dt><span class="locked"></span>Secure payment</dt>
							<dd>Our online payment solution guarantees a hassle-free transaction</dd>
						</dl>
					</div>
				</div>
			</aside>  
		</div>
	</div>
<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>	
</div>
<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['livesite']; ?>
/FO/css/common/bootstrap-wysihtml5.css"></link>
<script src="<?php echo $this->_tpl_vars['livesite']; ?>
/FO/script/common/wysihtml5-0.3.0.min.js"></script>
<script src="<?php echo $this->_tpl_vars['livesite']; ?>
/FO/script/common/bootstrap-wysihtml5.js"></script> 
<?php echo '
<script type="text/javascript">
var cur_date='; ?>
<?php echo time(); ?>
<?php echo ';
	var js_date=(new Date().getTime())/ 1000;
	var diff_date=Math.floor(js_date-cur_date);
	$("#menu_ongoing").addClass("active");
	startMissionTimer(\'dtime\',\'dtext\');

	
/**article uploading**/
$(function(){
		var btnUpload=$(\'.fileinput-button\');
		var status=$(\'#send-status\');
		var participation_id=$(\'#send_participate_id\').val();
		var client_id=$(\'#clientId\').val();
		var blwlcheck=$(\'#blwlcheck\').val();
	var uploader=new AjaxUpload(btnUpload, {
			action: \'sendarticle\',
			name: \'send_article\',
			data:{participation_id:participation_id, clientId:client_id},
			autoSubmit: false,			
			onChange: function(file, ext){
	if(! (ext && /^(doc|docx|zip|rar)$/.test(ext)) && blwlcheck == \'yes\'){
		            // extension is not allowed 
						status.html(\'only doc,zip,rar files are allowed\').css({\'color\':\'#fff\',"background": "none repeat scroll 0 0 #f47d31","border-radius":"10px","padding": "4px"});
						return false;
					}else if (! (ext && /^(doc|docx|pdf|xls|xlsx|zip|rar)$/.test(ext))){ 
                    // extension is not allowed 
					status.html(\'Only doc,docx,xls,xlsx,pdf,zip,rar files are allowed\').css({\'color\':\'#fff\',"background": "none repeat scroll 0 0 #ea7171","border-radius":"10px","padding": "4px"});
					return false;
				}	
				else
				{
					$("#submit_article").show();
				
				}					
				 /*if (! (ext && /^(doc|docx|rtf)$/.test(ext))){ 
                    // extension is not allowed 
					status.html(\'Only doc,docx,rtf files are allowed\').css(\'color\',\'#FF0000\');
					return false;
					}*/
				//status.html(\'<img src="/FO/images/icon-generic.gif" /> Uploading..\');
				status.html(\'<img src="/FO/images/icon-generic.gif" /> \'+file);
			},
			onComplete: function(file, response){
				//On completion clear the status
				//status.html(\'<img src="/FO/images/icon-generic.gif" /> Uploading..\');
				status.html(\'<img src="/FO/images/icon-generic.gif" /> \'+file);
				//alert(response);
				var patt=/not readable/g;
				var result=patt.test(response);
				
				if(result)
				{
					status.text(\'File is not readable\').css({\'color\':\'#fff\',"background": "none repeat scroll 0 0 #ea7171","border-radius":"10px","padding": "4px"});
				}
				else
				{
					var obj = $.parseJSON(response); //alert(response);
					if(obj.status=="success"){
						location.reload();					
					}
					else if(obj.status=="file_sent"){
						//status.text(\'File already sent for this article\').css({\'color\':\'#fff\',"background": "none repeat scroll 0 0 #f47d31","border-radius":"10px","padding": "4px"});	
						location.reload();						
					}
					    else if(obj.status=="blwlerror"){
						 $(\'#wlblresult\').html(decodeURIComponent(obj.result));
						 $("#wlblresult").modal(\'show\');
					    }
					    else if(obj.status=="blwlerrormessage"){
						//status.html(\'your zip or rar file should only contain .doc files (not .docx)\').css({\'color\':\'#fff\',"background": "none repeat scroll 0 0 #f47d31","border-radius":"10px","padding": "4px"});
						$("#wlblalert").modal(\'show\');
						$("#wlblalert .modal-body").html("your zip or rar file should only contain .doc files (not .docx)");
						return false;
					    }
					    else if(obj.status=="docerrormessage"){
						$("#wlblalert").modal(\'show\');
						if(obj.result == \'multi\')
						    $("#wlblalert .modal-body").html("Your .zip or .rar must only contain .doc files. Please save your file(s) in the correct format, zip them and reupload.");
						else
						    $("#wlblalert .modal-body").html("Your file have not been saved in .doc format. Please save your file with the correct format and reupload.");
						//bootbox.alert("Your file(s) have not been saved in .doc. Please saved your file(s) with the good extension and reupload.");
						status.html(\'<img src="/FO/images/icon-generic.gif" /> \'+file);
						return false;
					    }
					    else{
					       // location.reload();
									windows.location="/contrib/ongoing";
					}
				}	
			}
		});	

	$("#submit_article").click(function(e){
		if($("#blwlcheck").val() == \'yes\')   //150128182032170- venere test id
        	{
           	  $("#loading").modal(\'show\');
            	  $(\'html,body\').animate({ scrollTop: 10 }, \'slow\');
        	}
		uploader.submit();
	});
		
});	

	
</script>
'; ?>


<div id="moretime-ajax" class="modal container hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h3 id="myModalLabel">Deadline extension request</h3>
</div>
<div class="modal-body">

</div>

</div>

<!--///show loading time for file uploading ///-->
<div id="loading" class="modal hide fade" tabindex="-1" >
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 >Processing the file to check Black and White lists</h3>
    </div>
    <div class="modal-body">
        <h3>Uploading...
            <img src="/FO/images/progressbar.gif"></h3>
    </div>

</div>

<!--///show loading time for file uploading ///-->
<div id="wlblresult" class="modal container hide fade" tabindex="-1" >


</div>

<div id="wlblalert" class="modal hide fade" tabindex="-1" >
    <div class="modal-header">
        <button type="button" id="reload" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 >Alert</h3>
    </div>
    <div class="modal-body">

    </div>
<div class="form-group pull-center">
            <button type="button" class="btn btn-info" id="blackclose" name="blackclose" onclick="" >Close</button>
         </div>
	<div class="span1" style="height:5px;"></div>
</div>
<?php echo '
<script>

    $(\'#reload\').click(function() {
        location.reload();
    });
    $(\'#blackclose\').click(function() {
        location.reload();
    });
   

</script>
'; ?>

