var user = new Object();

user.isControlPanelAllowed = function()
{
	var acl = db.getAcl();
	return acl && acl['control panel'];
}

/**
 * Method returns currency for user
 */
user.currency = function()
{
	return db.profile('currency');
}