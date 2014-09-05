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
<table  border="0" width="100%"><tr><td  colspan="3">&nbsp;</td></tr><tr><td  colspan="3"><font size="2em">Personal Information</font></td></tr>
<tr><td width="5%" rowspan="2" >&nbsp;</td><td width="45%"><font size="2em">Name:</td><td valign="top"><font size="2em"><b><?php print t($form_values['submitted_tree']['personal_information']['name']) ?></b></font></td></tr>


<tr><td ><font size="2em">E-mail address:</td><td valign="top"><font size="2em"><b><?php print t($form_values['submitted_tree']['personal_information']['e_mail_address']) ?></b></font></td></tr>
</table>
<table  border="0" width="100%">

<tr><td  colspan="3">&nbsp;</td></tr><tr><td  colspan="3"><font size="2em">About</font></td></tr>

<tr><td width="5%" rowspan="8">&nbsp;</td><td width="45%"><font size="2em">Preliminary workshop title:</td><td valign="top"><font size="2em"><b><?php print t($form_values['submitted_tree']['about']['workshop_title']) ?></b></font></td></tr>


<tr><td ><font size="2em">Workshop goal:</td><td valign="top"><font size="2em"><b><?php print t($form_values['submitted']['7']) ?></b></font></td></tr>


<tr><td ><font size="2em">Course description:</td><td valign="top"><font size="2em"><b><?php print t($form_values['submitted_tree']['about']['formal_course_description']) ?></b></font></td></tr>


<tr><td ><font size="2em">Target audience:</td><td valign="top"><font size="2em"><b><?php print t($form_values['submitted_tree']['about']['target_audience']) ?></b></font></td></tr>

Workshop prerequisites (if any):</td><td valign="top"><font size="2em"><b><?php print t($form_values['submitted_tree']['about']['workshop_participant_prerequisites_if_any']) ?></b></font></td></tr>


<tr><td ><font size="2em">Participants encouraged to bring own data</td><td valign="top"><font size="2em"><b><?php print t($form_values['submitted']['13']) ?></b></font></td></tr>


<tr><td ><font size="2em">Participants may review their own data or analysis with organizer:</td><td valign="top"><font size="2em"><b><?php print t($form_values['submitted']['14']) ?></b></font></td></tr>



<tr><td ><font size="2em">Additional presenters:</td><td valign="top"><font size="2em"><b><?php print t($form_values['submitted_tree']['about']['additional_presenters']) ?></b></font></td></tr>
</table>
<table  border="0" width="100%">
<tr><td  colspan="3">&nbsp;</td></tr><tr><td  colspan="3"><font size="2em">Date and Time</b></font></td></tr>

<tr><td width="5%" rowspan="9">&nbsp;</td><td width="45%"><font size="2em">Start date:</td><td valign="top"><font size="2em"><b>
<?php  foreach($form_values['submitted']['56'] as $value)  { print ("$value ");} ?></b></font></td></tr>
<tr><td ><font size="2em">End date:</td><td valign="top"><font size="2em"><b>
 <?php  foreach($form_values['submitted']['57'] as $value)  { print ("$value ");} ?> </b></font></td></tr>

<tr><td>


<tr><td ><font size="2em">Day 1</font></td></tr>
<tr><td ><font size="2em">Start time:</font></td><td><font-size="2em"><b> <?php print t($form_values['submitted']['66']) ?></b> </font></td></tr>
<tr><td ><font size="2em">End time: </font></td><td><font-size="2em"><b><?php print t($form_values['submitted']['68']) ?> </b></font></td></tr>

<tr><td ><font size="2em">Day 2</b></font></td></tr>
<tr><td ><font size="2em">Start time: </font></td><td><font-size="2em"><b><?php print t($form_values['submitted']['67']) ?> </b></font></td></tr>
<tr><td ><font size="2em">End time:</font></td><td><font-size="2em"><b><?php print t($form_values['submitted']['69']) ?></b></font></td></tr>

</table>
<table  border="0" width="100%">
<tr><td  colspan="3">&nbsp;</td></tr><tr><td  colspan="3"><font size="2em">Planning</b></font></td></tr>
<tr><td width="5%" rowspan="2">&nbsp;</td><td ><font size="2em">Film workshop?</td><td valign="top"><font size="2em"><b>
 <?php print t($form_values['submitted']['71']) ?></b></font></td></tr>
<tr><td  colspan="3">&nbsp;</td></tr><tr><td  colspan="3"><font size="2em">Participants</b></font></td></tr>
<tr><td width="5%" rowspan="2">&nbsp;</td><td width="45%"><font size="2em">Desired number</td><td valign="top"><font size="2em"><b><?php print t($form_values['submitted_tree']['planning']['attendees_fs']['des_number_of_attendees']) ?></b></font></td></tr>


<tr><td ><font size="2em">Maximum number</td><td valign="top"><font size="2em"><b><?php print t($form_values['submitted_tree']['planning']['attendees_fs']['max_number_of_attendees']) ?></b></font></td></tr>

</table>
<table  border="0" width="100%">

<tr><td  colspan="3">&nbsp;</td></tr><tr><td  colspan="3"><font size="2em">Room specifications</b></font></td></tr>
<tr><td width="5%" rowspan="4">&nbsp;</td><td width="45%"><font size="2em">Preferred or usual room:</td><td valign="top"><font size="2em"><b><?php print t($form_values['submitted_tree']['planning']['room_specifications']['is_there_a_room_you_useprefer']) ?></b></font></td></tr>


<tr><td  valign="top"><font size="2em">Type of room:</td><td valign="top"><font size="2em"><b><?php  foreach($form_values['submitted']['18'] as $value)  { print ("$value <br /> ");} ?> </b></font></td></tr>
<tr>
<td  valign="top">Audiovisual needs:</td><td valign="top"><font size="2em"><b><?php  foreach($form_values['submitted']['19'] as $value)  { print ("$value <br /> ");} ?> </b></font></td></tr>

<td >Technical specifications required:</td><td valign="top"><font size="2em"><b><?php print t($form_values['submitted_tree']['planning']['technical_specifications_required_of_the_workshop_venue']) ?></b></font></td></tr>
</table>
<table  border="0" width="100%">

<tr><td  width="100%" colspan="3">&nbsp;</td></tr>
<tr><td  colspan="3"><font size="2em">IT requirements</font></td></tr>
<tr><td width="5%" rowspan="17">&nbsp;</td><td width="45%" ><font size="2em">Participants encouraged to <br />bring own computers?</td><td valign="top"><font size="2em"><b><?php print t($form_values['submitted']['43']) ?></b></font></td></tr>

<tr><td ><font size="2em">If yes, hardware/software requirements:</td><td valign="top"><font size="2em"><b><?php print t($form_values['submitted_tree']['planning']['it_requirements']['if_yes_please_specify_hardwaresoftware_requirements']) ?></b></font></td></tr>
<tr><td width="45%" ><font size="2em">Peripherals needed:</td><td valign="top"><font size="2em"><b><?php print t($form_values['submitted_tree']['planning']['it_requirements']['other_info_own']) ?></b></font></td></tr>

<tr><td width="45%" colspan="6">&nbsp;</td></tr>
<tr><td width="45%" colspan="3"><font size="2em">PC laptops:</font></td></tr>
<tr><td width="45%"><font size="2em">Qty:</td><td valign="top"><font size="2em"><b><?php print t($form_values['submitted_tree']['planning']['it_requirements']['qty_pc']) ?></b></font></td></tr>
<tr><td width="45%"><font size="2em">Other info:</td><td valign="top"><font size="2em"><b><?php print t($form_values['submitted_tree']['planning']['it_requirements']['other_info_pc']) ?></b></font></td></tr>

<tr><td width="45%" colspan="6">&nbsp;</td></tr><tr><td  colspan="3"><font size="2em">Mac laptops:</font></td></tr>
<tr><td width="45%"><font size="2em">Qty:</td><td valign="top"><font size="2em"><b><?php print t($form_values['submitted_tree']['planning']['it_requirements']['qty_mac']) ?></b></font></td></tr>
<tr><td width="45%"><font size="2em">Other info:</td><td valign="top"><font size="2em"><b><?php print t($form_values['submitted_tree']['planning']['it_requirements']['other_info_mac']) ?></b></font></td></tr>
<tr><td width="45%" colspan="6">&nbsp;</td></tr>
<tr><td ><font size="2em">Other hardware needs:</td><td valign="top"><font size="2em"><b><?php print t($form_values['submitted_tree']['planning']['it_requirements']['other_hardware']) ?></b></font></td></tr>
<tr><td valign="top"><font size="2em">Software:</td><td valign="top"><font size="2em"><b><?php  foreach($form_values['submitted']['33'] as $value)  { print ("$value <br /> ");} ?> </b></font></td></tr>

<tr><td ><font size="2em">Other software required:</td><td valign="top"><font size="2em"><b><?php print t($form_values['submitted_tree']['planning']['it_requirements']['if_you_selected_other_please_tell_us_what_software_you_need']) ?></b></font></td></tr>


</table>
<table  border="0" width="100%">

<tr><td  colspan="3">&nbsp;</td></tr><tr><td  colspan="3"><font size="2em">Teaching Materials and Staff</font></td></tr>
<tr><td width="5%" rowspan="7">&nbsp;</td><td width="45%"><font size="2em">Presenter will distribute:</td><td valign="top"><font size="2em"><b><?php print t($form_values['submitted_tree']['teaching_materials']['description_of_teaching_materials_you_will_distribute']) ?></b></font></td></tr>
<tr><td width="45%"><font size="2em">Links to reference materials:</td><td valign="top"><font size="2em"><b><?php print t($form_values['submitted_tree']['teaching_materials']['reference_materials']) ?></b></font></td></tr>


<tr><td ><font size="2em">Needs assistance in preparing teaching materials?</td><td valign="top"><font size="2em"><b><?php print t($form_values['submitted']['38']) ?></b></font></td></tr>
Are there materials participants will need prior to workshop:</td><td valign="top"><font size="2em"><b><?php print t($form_values['submitted']['46']) ?></b></font></td></tr>

<tr><td ><font size="2em">Will have instructional staff/teaching assistants:</td><td valign="top"><font size="2em"><b><?php print t($form_values['submitted']['40']) ?></b></font></td></tr>
 
<tr><td ><font size="2em">If yes, how many: </td><td valign="top"><font size="2em"><b><?php print t($form_values['submitted']['41']) ?></b></font></td></tr>
</table>
<table  border="0" width="100%"><tr><td  colspan="3">&nbsp;</td></tr><tr><td  colspan="3"><font size="2em">Additional Information/Questions</font></td></tr>

<tr><td width="5%">&nbsp;</td><td width="45%"><font size="2em"><font size="2em">&nbsp;</td><td valign="top"><font size="2em"><b><?php print t($form_values['submitted_tree']['additional_information']['additional_informationneeds']) ?></b></font></td></tr>
</table>
</body>
</html>
