function createCookie(type, item)
{
	var expirationDate = new Date();
	
	expirationDate.setMonth(expirationDate.getMonth() + 1);
	document.cookie = type + "=" + item + ";path=/;expires=" + expirationDate.toGMTString();
}

function getCookie(type)
{
	var allCookies = document.cookie.split(';');
	
	for (i in allCookies)
	{
		if ((allCookies[i].indexOf(type)) != -1)
		{
			return allCookies[i].substring(type.length + 1, allCookies[i].length);
		}
	}
	return -1;
}

function updateCookie(type, item)
{
	var cookieExists = getCookie(type);
	
	if (cookieExists == -1)
	{
		createCookie(type, item);
	}
	else
	{
		createCookie(type, cookieExists + "|" + item);
	}
}

