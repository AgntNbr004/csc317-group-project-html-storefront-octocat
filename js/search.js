function octoSearch()
{
	var input, filter, table, tr, td, i, txtValue;
	input = document.getElementById("myInput");
	filter = input.value.toUpperCase();
	
	// 3D MODEL FILTER
	table = document.getElementById("modelTable");
	tr = table.getElementsByTagName("tr");
	for (i = 0; i < tr.length; i++)
	{
		td = tr[i].getElementsByTagName("td");
		for (var j = 0; j < td.length; j++)
		{
			cell = td[j].id;
			if (cell)
			{
				if (cell.toUpperCase().indexOf(filter) > -1)
				{
					td[j].style.display = "";
				}
				else
				{
					td[j].style.display = "none";
				}
				if (filter.length == 0)
				{
					td[j].style.display = "none";
				}
			}
		}
	}
	
	// SCRIPT FILTER
	table = document.getElementById("scriptTable");
	tr = table.getElementsByTagName("tr");
	for (i = 0; i < tr.length; i++)
	{
		td = tr[i].getElementsByTagName("td");
		for (var j = 0; j < td.length; j++)
		{
			cell = td[j].id;
			if (cell)
			{
				if (cell.toUpperCase().indexOf(filter) > -1)
				{
					td[j].style.display = "";
				}
				else
				{
					td[j].style.display = "none";
				}
				if (filter.length == 0)
				{
					td[j].style.display = "none";
				}
			}
		}
	}
	
	// AUDIO FILTER
	table = document.getElementById("soundTable");
	tr = table.getElementsByTagName("tr");
	for (i = 0; i < tr.length; i++)
	{
		td = tr[i].getElementsByTagName("td");
		for (var j = 0; j < td.length; j++)
		{
			cell = td[j].id;
			if (cell)
			{
				if (cell.toUpperCase().indexOf(filter) > -1)
				{
					td[j].style.display = "";
				}
				else
				{
					td[j].style.display = "none";
				}
				if (filter.length == 0)
				{
					td[j].style.display = "none";
				}
			}
		}
	}
}
