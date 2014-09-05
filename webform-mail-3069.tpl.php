<?php
// $Id: webform-mail.tpl.php,v 1.1.2.5 2009/11/06 00:59:47 quicksketch Exp $

/**
 * @file
 * Customize the e-mails sent by Webform after successful submission.
 *
 * This file may be renamed "webform-mail-[nid[.tpl.php" to target a
 * specific webform e-mail on your site. Or you can leave it
 * "webform-mail.tpl.php" to affect all webform e-mails on your site.
 *
 * Available variables:
 * - $form_values: The values submitted by the user.
 * - $node: The node object for this webform.
 * - $user: The current user submitting the form.
 * - $ip_address: The IP address of the user submitting the form.
 * - $sid: The unique submission ID of this submission.
 * - $cid: The component for which this e-mail is being sent.
 *
 * The $cid can be used to send different e-mails to different users, such as
 * generating a reciept-type e-mail to send to the user that filled out the
 * form. Each form element in a webform is assigned a CID, by doing special
 * logic on CIDs you can customize various e-mails.
 */
?>
<?php print t('Submitted on @date', array('@date' => format_date(time(), 'small'))) ?>

<?php if ($user->uid): ?>
<?php print t('Submitted by user: @username [@ip_address]', array('@username' => $user->name, '@ip_address' => $ip_address)) ?>
<?php else: ?>
<?php print t('Submitted by anonymous user: [@ip_address]', array('@ip_address' => $ip_address)) ?>
<?php endif; ?>


<?php print t('Submitted values are') ?>:




<html>
<body>
<table><tr><td colspan="3"><font size="2em"><b>Personal Information</b></font></td></tr>
<tr><td rowspan="11">&nbsp;</td><td width="30%"><font size="2em">Name:</font></td><td valign="top"><font size="2em"> <b> <?php print t($form_values['submitted']['2']) ?> <?php print t($form_values['submitted']['3']) ?></b></font></td></tr>
<tr><td ><font size="2em">Date of birth:</font></td><td valign="top"><font size="2em"> <b>  <?php  foreach($form_values['submitted']['78'] as $value) {
	
	print ("$value ");} ?></b></font></td></tr>
<tr><td >
<font size="2em">E-mail address:</font></td><td valign="top"><font size="2em"> <b> <?php print t($form_values['submitted_tree']['personal_information']['balloon']) ?></b></font><br />
</td></tr>
<tr><td >
<font size="2em">Cell phone:</font></td><td valign="top"><font size="2em"> <b> <?php print t($form_values['submitted_tree']['present_address_fs']['cell_phone']) ?></b></font><br />
</td></tr>

<tr><td >
<font size="2em">Country of Citizenship:</font></td><td valign="top"><font size="2em"> <b> <?php print t($form_values['submitted_tree']['citizenship']['country_of_citizenship']) ?></b></font><br />
</td></tr>
<tr><td ><font size="2em">Permanent Residency Status:</font></td><td valign="top"><font size="2em"> <b> <?php print t($form_values['submitted_tree']['citizenship']['in_not_us_citizen_indicate_your_permanent_residency_status']) ?></b></font><br />
</td></tr>
<tr><td ><font size="2em">Do you consider yourself an ethnic minority? </font></td><td valign="top"><font size="2em"> <b> <?php print t($form_values['submitted']['10']) ?></b></font><br />
</td></tr>

<tr><td ><font size="2em">Ethnicity:</font></td><td valign="top"><font size="2em"> <b>  <?php  foreach($form_values['submitted']['11'] as $value) {
	
	print ("$value<br /> ");} ?></b></font></td></tr>

<tr><td ><font size="2em">If you selected Hispanic/Latino or Other, please specify ethnicity and race:</font></td><td valign="top"><font size="2em"> <b> <?php print t($form_values['submitted_tree']['collect']['specify']) ?></b></font><br />

</td></tr>
<tr><td ><font size="2em">Are you a first generation college student?</font></td><td valign="top"><font size="2em"> <b>  <?php print t($form_values['submitted']['12']) ?></b></font><br />
</td></tr>
<tr><td ><font size="2em">Are you from an economically disadvantaged background?</font></td><td valign="top"><font size="2em"> <b>  <?php print t($form_values['submitted']['13']) ?></b></font><br /><br />
</td></tr>
<tr><td colspan="3">&nbsp;</td></tr>
<tr><td colspan="3"><font size="2em"><b>Education</b></font><br />
</td></tr>
<tr><td rowspan="18">&nbsp;</td><td>
<font size="2em">Current institution:</font></td><td valign="top"><font size="2em"> <b> <?php print t($form_values['submitted_tree']['education']['current_institution'] ) ?></b></font><br />
</td></tr>
<tr><td ><font size="2em">City:</font></td><td valign="top"><font size="2em"> <b> <?php print t($form_values['submitted_tree']['education']['city'] ) ?></b></font><br />
</td></tr>
<tr><td ><font size="2em">State:</font></td><td valign="top"><font size="2em"> <b> <?php print t($form_values['submitted_tree']['education']['state'] ) ?></b></font><br />
</td></tr>
<tr><td ><font size="2em">Major:</font></td><td valign="top"><font size="2em"> <b> <?php print t($form_values['submitted_tree']['education']['major'] ) ?></b></font><br />
</td></tr>
<tr><td ><font size="2em">Minor:</font></td><td valign="top"><font size="2em"> <b> <?php print t($form_values['submitted_tree']['education']['minor'] ) ?></b></font><br />
</td></tr>
<tr><td ><font size="2em">Major GPA:</font></td><td valign="top"><font size="2em"> <b> <?php print t($form_values['submitted_tree']['education']['major_gpa'] ) ?></b></font><br />
</td></tr>
<tr><td ><font size="2em">Cumulative GPA:</font></td><td valign="top"><font size="2em"> <b> <?php print t($form_values['submitted_tree']['education']['cumulative_gpa'] ) ?></b></font><br />
</td></tr>
<tr><td ><font size="2em">Current classification:</font></td><td valign="top"><font size="2em"> <b> <?php print t($form_values['submitted_tree']['education']['current_classification'] ) ?></b></font><br />
</td></tr>
<tr><td ><font size="2em">Expected graduation date:</font></td><td valign="top"><font size="2em"> <b> <?php print t($form_values['submitted_tree']['education']['expected_graduation_date'] ) ?></b></font><br /> 
</td></tr>
<tr><td ><font size="2em">Previous institution:</font></td><td valign="top"><font size="2em"> <b> <?php print t($form_values['submitted_tree']['education']['previous_institution'] ) ?></b></font><br />
</td></tr>
<tr><td ><font size="2em">City:</font></td><td valign="top"><font size="2em"> <b> <?php print t($form_values['submitted_tree']['education']['prev_inst_city'] ) ?></b></font><br />
</td></tr>
<tr><td ><font size="2em">State:</font></td><td valign="top"><font size="2em"> <b> <?php print t($form_values['submitted_tree']['education']['prev_inst_state'] ) ?></b></font><br />
</td></tr>
<tr><td ><font size="2em">Previous degree(s) awarded:</font></td><td valign="top"><font size="2em"> <b> <?php print t($form_values['submitted_tree']['education']['prev_degree'] ) ?></b></font><br />
</td></tr>
<tr><td ><font size="2em">Relevant scholarships awards and honors:</font></td><td valign="top"><font size="2em"> <b> <?php print t($form_values['submitted_tree']['education']['scholarships_awards_and_honors'] ) ?></b></font><br />
</td></tr>
<tr><td ><font size="2em">Relevant poster and/or oral presentations at conferences/symposia:</font></td><td valign="top"><font size="2em"> <b> <?php print t($form_values['submitted_tree']['education']['posters'] ) ?></b></font><br />
</td></tr>
<tr><td ><font size="2em">Publications, posters at conferences/symposia:</font></td><td valign="top"><font size="2em"> <b> <?php print t($form_values['submitted_tree']['education']['pub_citations'] ) ?></b></font><br />
</td></tr>
<tr><td ><font size="2em">Math or science courses (to be completed by summer 2013):</font></td><td valign="top"><font size="2em"> <b> <?php print t($form_values['submitted_tree']['education']['list_current_or_planned_courses_math_science_and_engineering_that_you_will_have_completed_by_summer_2012']) ?></b></font><br /> 
</td></tr>
<tr><td ><font size="2em">Computer programming proficiency, relevant experience and skills:</font></td><td valign="top"><font size="2em"> <b> <?php print t($form_values['submitted_tree']['education']['computer_skills'] ) ?></b></font></td></tr>
<tr><td colspan="3">&nbsp;</td></tr>
<tr><td colspan="3"><font size="2em"><b>Post-baccalaureate Plans</b></font>
</td></tr>

<tr><td rowspan="5">&nbsp;</td><td><font size="2em">Post-baccalaureate interest:</font></td><td valign="top"><font size="2em"> <b> <?php print t($form_values['submitted_tree']['additional_information']['list_in_order_of_preference_your_post_baccalaureate_interest_phd_md_mdphd_ms_other'] ) ?></b></font><br />
</td></tr>
<tr><td ><font size="2em">Plan to take/have taken MCAT?</font></td><td valign="top"><font size="2em"> <b> <?php print t($form_values['submitted_tree']['additional_information']['mcat'] ) ?></b></font><br />
</td></tr>
<tr><td ><font size="2em">If so, when? </font></td><td valign="top"><font size="2em"> <b> <?php print t($form_values['submitted_tree']['additional_information']['ifso_mcat'] ) ?></b></font><br />
</td></tr>
<tr><td ><font size="2em">Plan to take/have taken GRE?</font></td><td valign="top"><font size="2em"> <b> <?php print t($form_values['submitted_tree']['additional_information']['gre'] ) ?></b></font><br />
</td></tr>
<tr><td ><font size="2em">If so, when? </font></td><td valign="top"><font size="2em"> <b> <?php print t($form_values['submitted_tree']['additional_information']['ifso_gre'] ) ?></b></font></td><tr>
<tr><td colspan="3">&nbsp;</td></tr>
<tr><td colspan="3"><font size="2em"><b>Housing arrangements and program requirements</b></font>
</td></tr>
<tr><td rowspan="1">&nbsp;</td><td valign="top" >
<font size="2em">Availability for duration of program:</font></td><td valign="top"><font size="2em"> <b> <?php print t($form_values['submitted_tree']['availability_for_duration_of_program']['availability']) ?></b></font><br />
</td></tr></table>
</body>
</html>
