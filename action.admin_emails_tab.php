<?php
if( !isset($gCms) ) exit;

if (!$this->CheckPermission('absence use'))
{
	echo $this->ShowErrors($this->Lang('needpermission'));
	return;
}
//debug_display($params, 'Parameters');
if(!empty($_POST))
{
	if( isset($_POST['cancel']) ) {
            $this->RedirectToAdminTab();
        }
	//on sauvegarde ! Ben ouais !
	$this->SetPreference('pageid_etudiant', $_POST['pageid_etudiant']);
	//$this->SetPreference('admin_email', $_POST['adminemail']);
	$this->SetPreference('email_absence_subject', $_POST['emailabsencesubject']);
	$this->SetTemplate('absencemail_Sample', $_POST['emailabsencebody']);
	
	//on redirige !
	$this->RedirectToAdminTab('emails');
	
}
else
{
	$tpl = $smarty->CreateTemplate($this->GetTemplateResource('admin_emails.tpl'), null, null, $smarty);
	$tpl->assign('pageid_etudiant', $this->GetPreference('pageid_etudiant'));
	$tpl->assign('email_absence_subject', $this->GetPreference('email_absence_subject'));
	$tpl->assign('absencemail_Sample', $this->GetTemplate('absencemail_Sample'));
	$tpl->display();
}

#
# EOF
#
?>