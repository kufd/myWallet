var user = new Object();

user.isControlPanelAllowed = function()
{
	var acl = db.getAcl();
	return acl && acl['control panel'];
}