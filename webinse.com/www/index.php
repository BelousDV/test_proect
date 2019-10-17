<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="vieport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Table List</title>
	<script src="JS/jquery-3.4.1.min.js"></script>

</head>
<body>
<div class="wrapper">
    <header class="header">
		<div class="container">
	    	<div class="header__text">SIMPLE TABLE LISTS OF PEOPLE</div>
			<div class="header__logo">FROM WEBINSE</div>
		</div>
	</header>
    <section class="tablelist">
        <div class="container">
            <div class="tablelist__innet">
            <form name="person">
                <div class="tablelist__title">
                    <div class="tablelist__wrapp-input">
						<input type="text" name="first_name" class="tablelist__input" id="first_name" placeholder="First Name" required/> 
						<input type="text" name="last_name" class="tablelist__input" id="last_name" placeholder="Second Name" required/> 
						<input type="email" name="email" class="tablelist__input" id="email" placeholder="E-mail" required/> 
						<button type="submit" name="inputPerson_btn" class="tablelist__create-add" id="add_task" onClick="ValidMail()">Add Person</button>
                    </div>
                </div>
            </form>
            <table class="persons__list">
				<thead class="persons__list-header">
					<tr>
						<td>First name</td>
						<td>Second name</td>
						<td>E-mail</td>
						<!--<td><input type="button" class="delete_task" id="delete" value="p" /></td>-->
					</tr>
				</thead>
				<tbody class="persons__table-list" id="data_bd">
						
				</tbody>
			</table>
			</div>
        </div>
    </section>	
</div>			
<script>

//Check input data e-mail
function ValidMail() {
    var re = /^[\w-\.]+@[\w-]+\.[a-z]{2,4}$/i;
    var myMail = document.getElementById('email').value;
    var valid = re.test(myMail);
    if (valid){
	   validForm();
	   output = 'Адрес эл. почты введен правильно!';
	}else {
		output = 'Адрес электронной почты введен неправильно либо не все поля заполнены!';
		alert(output);
	};
}

$( document ).ready(function() {

var ajax = new XMLHttpRequest();
var method = "POST";
var url = "data.php";
var asynchronous = true;

ajax.open(method, url, asynchronous);

ajax.send();

ajax.onreadystatechange = function(){

    if(this.readyState == 4 && this.status == 200){
		
		var data = JSON.parse(this.responseText);
		
		var html = "";
        for(let i = 0; i<data.length; i++){
			let firstName = data[i].first_name;
			let lastName = data[i].last_name;
			let email = data[i].email;
			let personId = data[i].id;

			html += "<tr id=" + personId + ">";
			    html += "<td><label id=\"" + personId+1 + "\" value=\"" + firstName + "\" class=\"person__list-text\">" + firstName + "</label></td>"; 
				html += "<td><label id=\"" + personId+2 + "\" value=\"" + lastName + "\" class=\"person__list-text\">" + lastName + "</label></td>";
				html += "<td><label id=\"" + personId+3 + "\" value=\"" + email + "\" class=\"person__list-text\">" + email + "</label></td>";
				//html += "<td><label class=\"person__list-text\">" + personId + "</label></td>";
			    html += "<td><button type=\"submit\" class=\"person__list-remove\" id=\"remove\" onclick=\"changePerson(this.value)\" value=" + personId + ">Remove</button>";
			    html += "<button type=\"submit\" class=\"person__list-delete\" id=\"delete\" onclick=\"deletePerson(this.value)\" value=" + personId + ">Delete</button></td>";
				html += "<td><div class=\"person__list-correct\" id=\"Show-correct"+personId+"\" style=\"display: none;\"><input id=\"correct-input" + personId+1 + "\" value=\""+ firstName +"\"/><input id=\"correct-input"+ personId+2 +"\"value=\""+ lastName +"\"/><input id=\"correct-input"+ personId+3 +"\"value=\""+ email +"\"/><button id=\"save_change"+personId+"\"\>Save</button></div></td>";    
				html += "</tr>";
		}
		document.getElementById("data_bd").innerHTML = html;
	}
}
});	
//Send data and create new Person
function validForm(){
    let formData = new FormData(document.forms.person);
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "main.php");
    xhr.send(formData);
}
//delete Person
function deletePerson(x){
	var param = x;
	    console.log(param);
	var deleteElement = document.getElementById(param);
	    console.log(deleteElement);
    var data_id= new FormData();
	data_id.append("person", param)
	let xhr = new XMLHttpRequest();
	    xhr.open("POST", "delete.php", true);
		deleteElement.remove();
	    xhr.send(data_id); 
}
//Remove data Person
function changePerson(x){
	var param = x;
	var firstId = param+1;
	var secondId = param+2;
	var thirdId = param+3;
	
	var firstInputId = "correct-input" + firstId;
	var secondInputId = "correct-input" + secondId;
	var thirdInputId = "correct-input" + thirdId;

	var showBlock = document.getElementById("Show-correct"+ param);
	var btnRemove = document.getElementById("remove");
	var btnSaveChange = document.getElementById("save_change"+ param);

	var labelList1 = document.getElementById(firstId);
	var labelList2 = document.getElementById(secondId);
	var labelList3 = document.getElementById(thirdId);
		
	var showInputFirst = document.getElementById(firstInputId);
	var showInputLast = document.getElementById(secondInputId);
	var showInputEmail = document.getElementById(thirdInputId);
	    showInputFirst.innerText = labelList1.textContent;
		showInputLast.innerText = labelList2.textContent;
		showInputEmail.innerText = labelList3.textContent;

        showBlock.style.display = 'block';
        btnSaveChange.onclick = function(){
			labelList1.innerText = showInputFirst.value;
			labelList2.innerText = showInputLast.value;
			labelList3.innerText = showInputEmail.value;
            showBlock.style.display = 'none';

			var data_remove= new FormData();
	            data_remove.append("firstName", showInputFirst.value);
	            data_remove.append("lastName", showInputLast.value);
	            data_remove.append("email", showInputEmail.value);
	            data_remove.append("person", param);
	        let xhr = new XMLHttpRequest();
		        xhr.open("POST", "remove.php", true);
	            xhr.send(data_remove);    
		        //xhr.onload = () => alert(xhr.response);
        }  
}

</script>
</body>
</html>
