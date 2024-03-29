<?php
if(isset($_POST['ee_submit_plugin'])){
	Enhanced_Ecommerce_Google_Settings::add_update_settings('ee_options');
}
$data = unserialize(get_option('ee_options'));
?>
<div class="container">
	<div class="row" style="margin-left:-11%; !important;">
		<div class= "col col-9" >
			<div class="card mw-100" style="padding:0px;">
				<div class="card-header">
					<h5>Enhanced Ecommerce Google Analytics</h5>
				</div>
			<div class="card-body">
			<form id="ee_plugin_form" method="post" action="" enctype="multipart/form-data" >
						<table class="table table-bordered">
							<tbody>

								<tr>
									<td>
										<label class="align-middle" for="woocommerce_ee_google_analytics_ga_id">Google Analytics ID</label>
									</td>
									<td>
										<input type="text" id="ga_id" name = "ga_id" required = "required" value="<?php echo $data['ga_id'];?>">
										<i style="cursor: help;" class="fas fa-question-circle" title="Enter your Google Analytics ID here. You can login into your Google Analytics account to find your ID. e.g. UA-XXXXXX-XX"></i>
									</td>
								</tr>
								<tr>
									<td>
										<label class="align-middle" for="tracking_code">Tracking Code</label>
									</td>
									<td>
										<label  class = "align-middle" for="ga_code">
										<?php $ga_ST = !empty($data['ga_ST'])? 'checked' : ''; ?>
										<input type="checkbox"  name="ga_ST" id="ga_ST" <?php echo $ga_ST; ?> >
										Add Global Site Tracking Code 'gtag.js'
										<p class="description">This feature adds New gtag.js Tracking Code to your Store. You don't need to enable this if gtag.js implemented via a 3rd party analytics plugin.</p>
										</label><br/>
										<label  class = "align-middle" for="ga_enhance_ecommerce">
										<?php $ga_eeT = !empty($data['ga_eeT'])? 'checked' : ''; ?>
										<input type="checkbox"  name="ga_eeT" id="ga_eeT" <?php echo $ga_eeT; ?> >
										Add Enhanced Ecommerce Tracking Code
										<p class="description">This feature adds Enhanced Ecommerce Tracking Code to your Store</p>
										</label><br/>
										<label  class = "align-middle" for="ga_login_step">
										<?php $ga_gUser = !empty($data['ga_gUser'])? 'checked' : ''; ?>
										<input type="checkbox"  name="ga_gUser" id="ga_gUser" <?php echo $ga_gUser; ?> >
										 Add Code to Track the Login Step of Guest Users (Optional)
										<p class="description">If you have Guest Check out enable, we recommend you to add this code</p>
										</label><br/>
									</td>
								</tr>
								<tr>
									<td>
										<label for="ga_Impr">Impression Thresold</label>
									</td>
									<td>
										<?php $ga_Impr = !empty($data['ga_Impr'])? $data['ga_Impr'] : 6; ?>
										<input type="number" min="1" id="ga_Impr"  name = "ga_Impr" value = "<?php echo $ga_Impr; ?>"><br/>
										<p class="description">This feature sets Impression threshold for category page. It sends hit after these many numbers of products impressions.</p>
									</td>
								</tr>
								<tr>
									<td>
										<label class = "align-middle" for="ga_IPA">I.P. Anoymization</label>
									</td>
									<td>
										<label  class = "align-middle" for="ga_IPA">
											<?php $ga_IPA = !empty($data['ga_IPA'])? 'checked' : ''; ?>
										<input class="" type="checkbox" name="ga_IPA" id="ga_IPA"  <?php echo $ga_IPA; ?>>
										Enable I.P. Anonymization
										<p class="description">Use this feature to anonymize (or stop collecting) the I.P Address of your users in Google Analytics. Be in legal compliance by using I.P Anonymization which is important for EU countries As per the GDPR compliance</p>
										</label>
									</td>
								</tr>
								<tr>
									<td>
										<label class = "align-middle" for="ga_OPTOUT">Google Analytics Opt Out</label>
									</td>
									<td>
										<label  class = "align-middle" for="ga_OPTOUT">
											<?php $ga_OPTOUT = !empty($data['ga_OPTOUT'])? 'checked' : ''; ?>
										<input class="" type="checkbox" name="ga_OPTOUT" id="ga_OPTOUT"  <?php echo $ga_OPTOUT; ?>>
										Enable Google Analytics Opt Out (Optional)
										<p class="description">Use this feature to provide website visitors the ability to prevent their data from being used by Google Analytics As per the GDPR compliance.Go through the documentation to check the setup</p>
										</label>
									</td>
								</tr>
								<tr>
									<td>
										<label class = "align-middle" for="ga_PrivacyPolicy">Privacy Policy</label>
									</td>
									<td>
										<label  class = "align-middle" for="ga_PrivacyPolicy">
											<?php $ga_PrivacyPolicy = !empty($data['ga_PrivacyPolicy'])? 'checked' : ''; ?>
										<input type="checkbox" onchange="enableSubmit();" name="ga_PrivacyPolicy" id="ga_PrivacyPolicy" required="required" <?php echo $ga_PrivacyPolicy; ?>>
										Accept Privacy Policy of Plugin
										<p class="description">By using Tatvic Plugin, you agree to Tatvic plugin's <a href= "https://www.tatvic.com/privacy-policy/?ref=plugin_policy&utm_source=plugin_backend&utm_medium=woo_premium_plugin&utm_campaign=GDPR_complaince_ecomm_plugins" target="_blank">Privacy Policy</a></p>
										</label>
									</td>
								</tr>
							</tbody>
						</table>
					<p class="submit save-for-later" id="save-for-later">
						<button type="submit"  class="btn btn-primary btn-success" id="ee_submit_plugin" name="ee_submit_plugin">Submit</button>
					</p>
			</form>
			</div>
			</div>
		</div>
		<?php require_once('sidebar.php');?>
	</div>
</div>