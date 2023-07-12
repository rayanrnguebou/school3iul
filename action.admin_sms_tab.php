<?php
if( !isset($gCms) ) exit;

if (!$this->CheckPermission('absence use'))
{
	echo $this->ShowErrors($this->Lang('needpermission'));
	return;
}
$this->SetCurrentTab('sms');
//debug_display($params, 'Parameters');
if(!empty($_POST))
{
	if( isset($_POST['cancel']) ) {
            $this->RedirectToAdminTab();
        }
	//on sauvegarde ! Ben ouais !

	
	$this->SetPreference('sms_sender', $_POST['sms_sender']);
	$this->SetPreference('bitly_etudiant_id', $_POST['bitly_etudiant_id']);
	$this->SetPreference('bitly_etudiant_secret', $_POST['bitly_etudiant_secret']);
	$this->SetPreference('bitly_access_token', $_POST['bitly_access_token']);
	$this->SetTemplate('sms_relance', $_POST['sms_relance']);
	$this->SetPreference('bitly_redirect_uri', $_POST['bitly_redirect_uri']);
	
	//on redirige !
	$this->RedirectToAdminTab();
	
}
else
{
	$tpl = $smarty->CreateTemplate($this->GetTemplateResource('admin_sms.tpl'), null, null, $smarty);
	$tpl->assign('sms_sender', $this->GetPreference('sms_sender'));
	$tpl->assign('bitly_id_user', $this->GetPreference('bitly_id_user'));
	$tpl->assign('bitly_etudiant_secret', $this->GetPreference('bitly_etudiant_secret'));
	$tpl->assign('bitly_access_token', $this->GetPreference('bitly_access_token'));
	$tpl->assign('sms_relance', $this->GetTemplate('sms_relance'));
	$tpl->assign('bitly_redirect_uri', $this->GetPreference('bitly_redirect_uri'));
	$tpl->display();
}


#
# EOF
#
?>