// js file for courses.php, search.php, exams.php

// generate_dropdownmenu populates the drop down menu

// putInTable populates the actual data table based
// on use user's selection from the drop down menu

$(document).ready(function(){
	$("#form_1").submit(generate_dropdownmenu);
	$("#form1_list").change(putInTable);
});


function generate_dropdownmenu(e) {
	e.preventDefault();
	var form = $("#form1_course").val();
	var url = "exams.php?course=" + form;
	$.getJSON(url, function(data)
	{
		$.each(data, function(k, v)
		{
			var opt = "<option value=" + v.id + ">" + v.course + " " + v.section + " " + v.instructor + "</option>";
			$("#form1_list").append(opt);
		}
		);
	}
	);
}

function putInTable() {
	var regex = document.location.href.match(/[^\/]+$/)[0]; 
	if (regex == "courses.php")
	{                       
		var constraint = $("#form1_list").val();
		var url = "search.php?id=" + constraint;
		window.location.href = url;
	}
	else
	{                                              
		var i = 0;
		var courses = "";
		$("#myTable tr").each(function()
		{
   			var course = $(this).find("td:first").html();
   		
   			if (i == 1)
   			{
   				courses = "'" + course + "'";
   			}
   			else if (i > 1)
   			{
   				courses += ", '" + course + "'";
   			}

   			i += 1;
		});
		var constraint = $("#form1_list").val();
		var url = "search.php?id=" + constraint + "&courses=(" + courses + ")";
		window.location.href = url;
	}
}