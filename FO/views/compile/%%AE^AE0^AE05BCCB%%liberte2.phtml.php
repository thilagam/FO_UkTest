<?php /* Smarty version 2.6.19, created on 2013-12-04 11:53:42
         compiled from Client/liberte2.phtml */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'utf8_decode', 'Client/liberte2.phtml', 202, false),)), $this); ?>
<?php echo '
<script language="javascript">
	(function($,W,D)
	{
		var JQUERY4U = {};

		JQUERY4U.UTIL =
		{
			setupFormValidation: function()
			{
				var option=$("input[name=\'optionsRadios\']:checked").val();
				if(option=="option1")
				{
					//form validation rules
					$("#registerformliberte2").validate({
						onkeyup:false,
						rules: {
							email:  {
								required: true,
								email: true,
								remote: "/client/checknewuseremail"
											
							},
							libertepassword: {
								required: true,
								minlength: 6
							},
							liberteconfirmpassword: {
								required: true,
								minlength: 6,
								equalTo:"#libertepassword"
							},
							termscheck: "required"
						},
						messages: {
							email: {
								required:"Please enter email address",
								email:"Please enter valid email address",
								remote:"Email address already exists"
							},
							libertepassword: {
								required:"Please enter password",
								minlength:"Password length should be greater than 6"
							},
							liberteconfirmpassword: {
								required:"Please confirm your password",
								minlength:"Password length should be greater than 6",
								equalTo: "Password must be the same"
							},
							termscheck: "Please validate the CGU"						
						}
						
					});
			    }
			}
		}

		//when the dom has loaded setup form validation rules
		$(D).ready(function($) {
			JQUERY4U.UTIL.setupFormValidation();
		});

	})(jQuery, window, document);
	
		//Liberte2 form switching
	function switchloginform(opt)
	{
		if(opt=="option1")
		{
			$("#form1fields").show();
			$("#form2fields").hide();
		}
		else if(opt=="option2")
		{
			$("#form1fields").hide();
			$("#form2fields").show();
		}
	}
</script>

'; ?>
	

<section id="free_form">
 <div class="container">
		<div class="row-fluid">
			<div class="span12" style="position: relative">
				<h1>Edit-place <span>Freedom</span></h1>
				<small>Looking for a journalist to work on your project content ? <br>Post your ad and receive quotes within 24 h</small>
				<div class="freequote"></div>
				<div id="state">
					<ul class="unstyled">
						<li rel="tooltip" title="Post your project"><span>Create offer</span></li>
						<li class="hightlight" rel="tooltip" title="Our writers take a look at your offer and you receive quotes"><span class="online">Publication of offer on Edit-place</span></li> 
						<li rel="tooltip" title="Choose the writer who will work on your project"><span class="writer_select">Writer selection</span></li>
					</ul>
				</div>
				<div class="row-fluid">   
					<div class="span8">
							<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert">&times;</button>
								<h4>Last step !</h4> Creating an account Edit-place is required to submit your ad and receive your quote!
							</div>
							<div class="border">
							   <!-- form, start --> 
								
									<fieldset>
										<legend>My Account</legend>  
										<label class="radio inline">
											<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked onclick="switchloginform('option1');">
											<strong>New? Create an account</strong> 
										</label>
										<label class="radio inline">
											<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2" onclick="switchloginform('option2');">
											I already have an account with Edit-place
										</label>
										<hr>  
										<div id="form1fields">
											<form method="POST" name="registerformliberte2" id="registerformliberte2" action="/client/liberte3">
											<label>Email address</label>
											<input type="text" placeholder="" class="span12" name="email" id="email" >
											
											<div class="controls controls-row">
												<div class="span6">
													<label>Create a password</label>
													<input type="password" class="span12" placeholder="" name="libertepassword" id="libertepassword">
												</div>
												<div class="span6">
													<label>Confirm password</label>
													<input type="password" class="span12" placeholder="" name="liberteconfirmpassword" id="liberteconfirmpassword">
												</div>
											</div>
								 
											<label class="checkbox">
											<input type="checkbox" name="termscheck" id="termscheck">I agree to <a href="#termsliberte" data-toggle="modal">Edit-place's terms and conditions  </a></input>
											<label class="error" for="termscheck" generated="true"></label>
											</label>
											<input type="hidden" name="newuser" id="newuser" value="1" />
											<br>
											<legend>What happens next?</legend><br> 
											<ol>
												<li>My ad will be verified, validated and posted by Edit-place no later than  <span class="label label-inverse"><?php echo $this->_tpl_vars['onlinelimit']; ?>
</span></li>
												<li>I receive quote on <span class="label label-inverse" id="participationlimit"><?php echo $this->_tpl_vars['participationlimit']; ?>
</span></li>
												<li>I can select the best writer for my project</li>
											</ol> 
											<br>
											<button type="submit" name="register_client" class="btn btn-large btn-primary" value="submit">Validate and disseminate my ad</button>
											</form>
										</div>
										
										<div id="form2fields" style="display:none;"> 
											<form method="POST" name="registerform" id="registerform" action="/client/liberte3">
											<label>Email</label>
											<input type="text" placeholder="" class="span12" name="loginemail" id="loginemail" style="width:350px;">
												<div class="error" id="emailerrlib2"></div>
											<div class="controls controls-row">
												<div class="span6">
													<label>Password</label>
													<input type="password" class="span12" placeholder="" name="loginpassword" id="loginpassword">
													<div class="error" id="passerrlib2"></div>
												</div>
											</div>
											<!-- forgot password-->
											<label class="checkbox">
												<input type="checkbox" data-toggle="collapse" data-target="#forgotpwdmail" name="forgotpwd" id="forgotpwd">Forgotten your password?
											</label>
											<div id="forgotpwdmail" class="collapse out">
												<div class="controls controls-row container-field">
													<input type="text" name="forgotemail" id="forgotemail" value="<?php echo $this->_tpl_vars['forgotemail']; ?>
"> 
													<div style="display:inline-block;vertical-align:top">
														<button type="button" name="forgot_sendmail" class="btn btn-small btn-primary" value="Send Mail" onClick="return forgotpasswordmail();">Reset password</button>
													</div>
													<br>
													<span id="forgot_text"></span>
													
												</div>
											</div>
											
											<input type="hidden" name="newuser" id="newuser" value="0" />
											<br>
											<legend>What happens next?</legend><br>
											<ol>
												<li>My ad will be verified, validated and posted by Edit-place no later than <span class="label label-inverse"><?php echo $this->_tpl_vars['onlinelimit']; ?>
</span></li>
												<li>I receive quote on <span class="label label-inverse"><?php echo $this->_tpl_vars['participationlimit']; ?>
</span></li>
												<li>I can select the best writer for my project</li>
											</ol> 
											<br>
											<button type="submit" name="register_client" class="btn btn-large btn-primary" value="submit" onClick="return validate_liberte2();">Validate and disseminate my ad</button>
											</form>
										</div>
											
									</fieldset>
								</form>    
							 <!-- form, end -->   
							</div>
					</div>
				
					<div class="span3">
					<!--  right column  -->
						<aside>
							<div class="alert alert-success clearfix">
								<?php if ($this->_tpl_vars['navigate'] == 1): ?>
									<h4>Registered Project</h4><br>
									<i class="icon-ok"></i> <?php echo ((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('utf8_decode', true, $_tmp) : smarty_modifier_utf8_decode($_tmp)); ?>
<br>
									<a href="/client/liberte1" class="btn btn-link pull-right" style="color:#000000;">Return to Step 1 </a>
								<?php endif; ?>
							</div>
							<div id="garantee">
								<h3>YOUR GUARANTEES</h3>
								<dl>
									<dd><span class="umbrella"></span>Edit-place is your mediator</dd>
									<dd>In the event of a dispute/issue (delay in delivery, article rewrites, refund�)</dd>
									<dd><span class="locked"></span>Secure payment</dd>
									<dd>Our online payment solution guarantees you a hassle-free transaction</dd>
								</dl>
							</div>
						</aside>  
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<div id="termsliberte" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h3 id="myModalLabel">Terms of Use</h3>
	</div>
	<div class="modal-body " style="text-align:justify">
			<h4 style="text-align:center;">Terms of Use</h4> 
			<h4 style="text-align:center;">Edit-place.com</h4>
		<div class="pre-scrollable" style="padding-right:5px">	
			<p>This page (together with the documents referred to on it) tells you the terms and conditions on which we supply any of the services <b>(Services)</b> listed on our website 
			<a href="www.edit-place.co.uk">www.edit-place.co.uk</a> <b>(our site)</b> to you.  Please read these terms and conditions carefully before ordering any Services from our site.  You should understand that by ordering any of our Services you agree to be bound by these terms and conditions.</p> 
			<p>You should print a copy of these terms and conditions for future reference.</p>
			<p>Please click on the button marked "I Accept" at the end of these terms and conditions if you accept them.  Please understand that if you refuse to accept these terms and conditions, you will not be able to order any Services from our site.</p>
			<br>
			<b>1.	INFORMATION ABOUT US</b>
			<p>1.1	www.edit-place.co.uk is a site operated by Edit Place UK LTD <b>(we)</b>.  We are registered, a private limited company registered under the laws of England and Wales (Company Number: 8610398), with its head office at 20 Hanover Square London W1S1JY</p>
			<br>
			<b>2.	YOUR STATUS</b>
			<p>By placing an order through our site, you warrant that:</p>
			<ol>
				<li>(a)	You are legally capable of entering into binding contracts; and</li>
				<li>(b)	You are at least 18 years old;</li>
			</ol>
			<br>	
			<b>3.	HOW THE CONTRACT IS FORMED BETWEEN YOU AND US</b>
			<p>3.1	After placing an order, you will receive an e-mail from us acknowledging that we have received your order.  Please note that this does not mean that your order has been accepted.  Your order constitutes an offer to us to buy a Service.  All orders are subject to acceptance by us, and we will confirm such acceptance to you by sending you an e-mail confirming our acceptance of the assignment (the <b>Dispatch Confirmation</b>).  The contract between us <b>(Contract)</b> will only be formed when we send you the Dispatch Confirmation.</p>
			<p>3.2	The Contract will relate only to those Services we have confirmed in the Dispatch Confirmation.  We will not be obliged to supply any other Services which may have been part of your order until such other Services have been confirmed in a separate Dispatch Confirmation.</p>
			<br>
			<b>4.	OUR STATUS</b>
			<p>4.1	Please note that in some cases, we accept orders as agents on behalf of third party sellers.  The resulting legal contract is between you and that third party seller, and is subject to the terms and conditions of that third party seller, which they will advise you of directly.  You should carefully review their terms and conditions applying to the transaction.</p>
			<p>4.2	We may also provide links on our site to the websites of other companies, whether affiliated with us or not.  We cannot give any undertaking, that services you purchase from third party sellers through our site, or from companies to whose website we have provided a link on our site, will be of satisfactory quality, and any such warranties are DISCLAIMED by us absolutely.  This DISCLAIMER does not affect your statutory rights against the third party seller.  We will notify you when a third party is involved in a transaction, and we may disclose your customer information related to that transaction to the third party seller. </p>
			<br>
			<b>5.	AVAILABILITY AND DELIVERY</b>
			<p>Your order will be fulfilled by the date set out in the Dispatch Confirmation or, if no delivery date is specified, then within 30 days of the date of the Dispatch Confirmation, unless there are exceptional circumstances.</p>  
			<br>
			<b>6.	PRICE AND PAYMENT</b>
			<p>6.1	The price of any Services will be as quoted on our site from time to time, except in cases of obvious error.  </p>
			<p>6.2	These prices include VAT.  </p>
			<p>6.3	Prices are liable to change at any time, but changes will not affect orders in respect of which we have already sent you a Dispatch Confirmation.</p>
			<p>6.4	Our site contains a large number of Services and it is always possible that, despite our best efforts, some of the Services listed on our site may be incorrectly priced.  We will normally verify prices as part of our dispatch procedures so that, where a Service's correct price is less than our stated price, we will charge the lower amount when Invoicing for the Service to you.  If a Service�s correct price is higher than the price stated on our site, we will normally, at our discretion, either contact you for instructions before starting the provision of the services, or reject your order and notify you of such rejection. </p>
			<p>6.5	We are under no obligation to provide the Sevice to you at the incorrect (lower) price, even after we have sent you a Dispatch Confirmation, if the pricing error is obvious and unmistakeable and could have reasonably been recognised by you as a mis-pricing.</p>
			<br>
			<b>7.	OUR LIABILITY</b>
				<p>7.1	We warrant to you that any Service purchased from us through our site is of satisfactory quality and reasonably fit for all the purposes for which Services of the kind are commonly supplied.  </p>
				<p>7.2	Our liability for losses you suffer as a result of us breaking this agreement including deliberate breaches is strictly limited to the purchase price of the Service you purchased and any losses which are a foreseeable consequence of us breaking the agreement. Losses are foreseeable where they could be contemplated by you and us at the time your order is accepted by us. </p>
				<p>7.3	This does not include or limit in any way our liability:</p>
					<dl>
					<dd>(a)	For death or personal injury caused by our negligence;</dd>
					<dd>(b)	Under section 2(3) of the Consumer Protection Act 1987; </dd>
					<dd>(c)	For fraud or fraudulent misrepresentation; or</dd>
					<dd>(d)	For any deliberate breaches of these Terms by us that would entitle you to terminate the contract between us.</dd>
					<dd>(e)	For any matter for which it would be illegal for us to exclude, or attempt to exclude, our liability.</dd>
					</dl>
				<p>7.4	We are not responsible for indirect losses which happen as a side effect of the main loss or damage and which are not foreseeable by you and usand even if such losses result from a deliberate breach of these Terms by us that would entitle you to terminate the contract between us, including but not limited to:</p>
					<dl>
					<dd>(a)	loss of income or revenue</dd>
					<dd>(b)	loss of business</dd>
					<dd>(c)	loss of profits or contracts</dd>
					<dd>(d)	loss of anticipated savings</dd>
					<dd>(e)	loss of data</dd>
					<dd>(f)	waste of management or office time however arising and whether caused by tort (including negligence), breach of contract or otherwise.</dd>
					</dl>
				<p>7.5	Where you buy any Service from a third party seller through our site, the seller's individual liability will be set out in the seller's terms and conditions.</p>
			<br>	
			<b>8.	IMPORT DUTY</b>
				<p>8.1	If you order Services from our site for delivery outside the UK, they may be subject to import duties and taxes which are levied when the delivery reaches the specified destination.  You will be responsible for payment of any such import duties and taxes.  Please note that we have no control over these charges and cannot predict their amount.  Please contact your local customs office for further information before placing your order.</p>
				<p>8.2	Please also note that you must comply with all applicable laws and regulations of the country for which the Services are destined.  We will not be liable for any breach by you of any such laws.</p>
			<br>	
			<b>9.	WRITTEN COMMUNICATIONS</b>
				<p>Applicable laws require that some of the information or communications we send to you should be in writing.  When using our site, you accept that communication with us will be mainly electronic.  We will contact you by e-mail or provide you with information by posting notices on our website.  For contractual purposes, you agree to this electronic means of communication and you acknowledge that all contracts, notices, information and other communications that we provide to you electronically comply with any legal requirement that such communications be in writing.  This condition does not affect your statutory rights.</p>
			<br>	
			<b>10.	NOTICES</b>
				<p>All notices given by you to us must be given to Edit Place at the address notified in clause 1. We may give notice to you at either the e-mail or postal address you provide to us when placing an order, or in any of the ways specified in clause 9 above.  Notice will be deemed received and properly served immediately when posted on our website, 24 hours after an e-mail is sent, or three days after the date of posting of any letter.  In proving the service of any notice, it will be sufficient to prove, in the case of a letter, that such letter was properly addressed, stamped and placed in the post and, in the case of an e-mail, that such e-mail was sent to the specified e-mail address of the addressee.</p>
			<br>	
			<b>11.	TRANSFER OF RIGHTS AND OBLIGATIONS</b>
				<p>11.1	The contract between you and us is binding on you and us and on our respective successors and assigns.  </p>
				<p>11.2	You may not transfer, assign, charge or otherwise dispose of a Contract, or any of your rights or obligations arising under it, without our prior written consent.  </p>
				<p>11.3	We may transfer, assign, charge, sub-contract or otherwise dispose of a Contract, or any of our rights or obligations arising under it, at any time during the term of the Contract.</p>
			<br>	
			<b>12.	EVENTS OUTSIDE OUR CONTROL</b>
				<p>12.1	We will not be liable or responsible for any failure to perform, or delay in performance of, any of our obligations under a Contract that is caused by events outside our reasonable control <b>(Force Majeure Event)</b>.  </p>
				<p>12.2	A Force Majeure Event includes any act, event, non-happening, omission or accident beyond our reasonable control and includes in particular (without limitation) the following:
					<dl>
					<dd>(a)	Strikes, lock-outs or other industrial action.</dd>
					<dd>(b)	Civil commotion, riot, invasion, terrorist attack or threat of terrorist attack, war (whether declared or not) or threat or preparation for war.</dd>
					<dd>(c)	Fire, explosion, storm, flood, earthquake, subsidence, epidemic or other natural disaster.</dd>
					<dd>(d)	Impossibility of the use of railways, shipping, aircraft, motor transport or other means of public or private transport.</dd>
					<dd>(e)	Impossibility of the use of public or private telecommunications networks.</dd>
					<dd>(f)	The acts, decrees, legislation, regulations or restrictions of any government.</dd>
					</dl>
				</p>	
				<p>12.3	Our performance under any Contract is deemed to be suspended for the period that the Force Majeure Event continues, and we will have an extension of time for performance for the duration of that period.  We will use our reasonable endeavours to bring the Force Majeure Event to a close or to find a solution by which our obligations under the Contract may be performed despite the Force Majeure Event.</p>
			<br>
			<b>13.	WAIVER</b>
				<p>13.1	If we fail, at any time during the term of a Contract, to insist upon strict performance of any of your obligations under the Contract or any of these terms and conditions, or if we fail to exercise any of the rights or remedies to which we are entitled under the Contract, this shall not constitute a waiver of such rights or remedies and shall not relieve you from compliance with such obligations.</p>
				<p>13.2	A waiver by us of any default shall not constitute a waiver of any subsequent default.</p>
				<p>13.3	No waiver by us of any of these terms and conditions shall be effective unless it is expressly stated to be a waiver and is communicated to you in writing in accordance with clause 14 above.</p>
			<br>
			<b>14.	SEVERABILITY</b>
				<p>If any of these terms and Conditions or any provisions of a Contract are determined by any competent authority to be invalid, unlawful or unenforceable to any extent, such term, condition or provision will to that extent be severed from the remaining terms, conditions and provisions which will continue to be valid to the fullest extent permitted by law.</p>
			<br>
			<b>15.	ENTIRE AGREEMENT</b>
				<p>15.1	These terms and conditions and any document expressly referred to in them constitute the whole agreement between us and supersede any previous arrangement, understanding or agreement between us, relating to the subject matter of any Contract.</p>
				<p>15.2	We each acknowledge that, in entering into a Contract, (and the documents referred to in it), neither of us relies on any statement, representation, assurance or warranty <b>(Representation)</b> of any person (whether a party to that Contract or not) other than as expressly set out in these terms and conditions.</p>
				<p>15.3	Each of us agrees that the only rights and remedies available to us arising out of or in connection with a Representation shall be for breach of contract as provided in these terms and conditions.</p>
				<p>15.4	Nothing in this clause shall limit or exclude any liability for fraud.</p>
			<br>
			<b>16.	OUR RIGHT TO VARY THESE TERMS AND CONDITIONS</b>
				<p>16.1	We have the right to revise and amend these terms and conditions from time to time. </p>
				<p>16.2	You will be subject to the policies and terms and conditions in force at the time that you order Services from us, unless any change to those policies or these terms and conditions is required to be made by law or governmental authority (in which case it will apply to orders previously placed by you), or if we notify you of the change to those policies or these terms and conditions before we send you the Dispatch Confirmation (in which case we have the right to assume that you have accepted the change to the terms and conditions, unless you notify us to the contrary within seven working days of receipt by you of the Services).</p>
			<br>
			<b>17.	LAW AND JURISDICTION</b>
				<p>Contracts for the purchase of Services through our site and any dispute or claim arising out of or in connection with them or their subject matter or formation (including non-contractual disputes or claims) will be governed by English law.  Any dispute or claim arising out of or in connection with such Contracts or their formation (including non-contractual disputes or claims) shall be subject to the non-exclusive jurisdiction of the courts of England and Wales. </p>

		</div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		</div>
</div>