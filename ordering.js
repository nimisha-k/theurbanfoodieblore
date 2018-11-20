function order(incoming_id)
{
	alert("We have recieved your Order. Please continue ordering.")
	alert(document.getElementById(incoming_id).innerHTML)
	var arr = document.getElementById(incoming_id).innerHTML.split(':')
	localStorage.setItem("price", )
}