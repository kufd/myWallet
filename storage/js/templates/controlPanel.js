var controlPanel = new Object();

controlPanel.templates = []; 

/**
 * Add template to template list of controlPanel
 * @param template
 */
controlPanel.addTemplate = function(template)
{
	controlPanel.templates.push(template);
}

/**
 * @return bool
 */
controlPanel.isRendered = function()
{
	for(var key in controlPanel.templates)
	{
		if(controlPanel.templates[key].isRendered())
		{
			return true;
		}
	}
	
	return false;
}
