<div class="wrap">
	<h2 class="nav-tab-wrapper">
		<a href="?page=jaiminho-sms/setting" class="nav-tab<?php if($_GET['tab'] == '') { echo " nav-tab-active";} ?>"><?php _e('General', 'wp-sms'); ?></a>
		<a href="?page=jaiminho-sms/setting&tab=web-service" class="nav-tab<?php if($_GET['tab'] == 'web-service') { echo " nav-tab-active"; } ?>"><?php _e('Web Service', 'wp-sms'); ?></a>
		<a href="?page=jaiminho-sms/setting&tab=newsletter" class="nav-tab<?php if($_GET['tab'] == 'newsletter') { echo " nav-tab-active"; } ?>"><?php _e('Newsletter', 'wp-sms'); ?></a>
		<a href="?page=jaiminho-sms/setting&tab=features" class="nav-tab<?php if($_GET['tab'] == 'features') { echo " nav-tab-active"; } ?>"><?php _e('Features', 'wp-sms'); ?></a>
		<a href="?page=jaiminho-sms/setting&tab=notification" class="nav-tab<?php if($_GET['tab'] == 'notification') { echo " nav-tab-active"; } ?>"><?php _e('Notification', 'wp-sms'); ?></a>
		<a href="?page=jaiminho-sms/setting&tab=quota" class="nav-tab<?php if($_GET['tab'] == 'quota') { echo " nav-tab-active"; } ?>"><?php _e('Quota', 'wp-sms'); ?></a>
	</h2>
	
	<table class="form-table">
		<form method="post" action="options.php" name="form">
			<?php wp_nonce_field('update-options');?>
			<tr>
				<td><?php _e('Your Mobile Number', 'wp-sms'); ?>:</td>
				<td>
					<input type="text" dir="ltr" style="width: 200px;" name="wp_admin_mobile" value="<?php echo get_option('wp_admin_mobile'); ?>"/>
				</td>
			</tr>
			
			<tr>
				<td><?php _e('Your mobile country code', 'wp-sms'); ?>:</td>
				<td>
					<input type="text" dir="ltr" style="width: 200px;" name="wp_sms_mcc" value="<?php echo get_option('wp_sms_mcc'); ?>"/>
					<p class="description"><?php _e('Enter your mobile country code. (For example: Iran 09, Australia 61)', 'wp-sms'); ?></p>
				</td>
			</tr>
			
			<tr>
				<td>
					<p class="submit">
						<input type="hidden" name="action" value="update" />
						<input type="hidden" name="page_options" value="wp_admin_mobile,wp_sms_mcc" />
						<input type="submit" class="button-primary" name="Submit" value="<?php _e('Update', 'wp-sms'); ?>" />
					</p>
				</td>
			</tr>
		</form>	
	</table>
</div>
