ajaxFunction("View All");

function ajaxFunction(choice)
{
	var httpxml;
	try  {
		httpxml=new XMLHttpRequest();
	}
	catch (e)  {
		try    {
			httpxml=new ActiveXObject("Msxml2.XMLHTTP");
		}
	catch (e)    {
			try      {
			httpxml=new ActiveXObject("Microsoft.XMLHTTP");
			}
		catch (e)      {
		alert("Your browser does not support AJAX!");
			return false;
			}
		}
	}
  
	function stateChanged(){
		if(httpxml.readyState==4){ 
            document.getElementById("your_div").innerHTML=httpxml.responseText;
		}
	}
	// Sends request to the PHP file once the user has selected on option from the selector
	httpxml.open("GET","./products/livingRoomGet.php?q="+choice,true);
    httpxml.send();
	httpxml.onreadystatechange=stateChanged;
}