$(document).ready(function(){
	
	$('#create-task').submit(function (event) {
		event.preventDefault();

		var form = $(this);

		var formData = form.serialize();

		$.ajax({
			url: 'create.php',
			method: 'POST', //got to specify the request
			data: formData,
			success: function (data) {
				$('#ajax_msg').css("display", "block").delay(3000).slideUp(300).html(data);
				document.getElementById("create-task").reset();
			}
		});

	});
	$('#task-list').load('read.php'); //reads the content of the read.php file and puts it into tasks.php using ajax
});

function makeElementEditable(div){
	div.style.border = "1px dolif lavender";
	div.style.padding = "5px";
	div.style.background = "white";
	div.contentEditable = true;
}

function updateTaskName(target, todoId){
	var data = target.textContent; //get the content of whichever feed is clicked on
	target.style.border = "none";
	target.style.padding = "0px";
	target.style.background = "#ececec";
	target.contentEditable = false;

	$.ajax({
			url: 'update.php',
			method: 'POST', //got to specify the request
			data: {name: data, id:todoId},
			success: function (data) {
				$('#ajax_msg').css("display", "block").delay(3000).slideUp(300).html(data);
			}
		});
}

function updateTaskDescription(target, todoId){
	var data = target.textContent; //get the content of whichever feed is clicked on
	target.style.border = "none";
	target.style.padding = "0px";
	target.style.background = "#ececec";
	target.contentEditable = false;

	$.ajax({
			url: 'update.php',
			method: 'POST', //got to specify the request
			data: {description: data, id:todoId},
			success: function (data) {
				$('#ajax_msg').css("display", "block").delay(3000).slideUp(300).html(data);
			}
		});
}

function updateTaskStatus(target, todoId){
	var data = target.textContent; //get the content of whichever feed is clicked on
	target.style.border = "none";
	target.style.padding = "0px";
	target.style.background = "#ececec";
	target.contentEditable = false;

	$.ajax({
			url: 'update.php',
			method: 'POST', //got to specify the request
			data: {status: data, id:todoId},
			success: function (data) {
				$('#ajax_msg').css("display", "block").delay(3000).slideUp(300).html(data);
			}
		});
}


function deleteTask(todoId){
	if(confirm("Do you really want to delete this task?")){
		$.ajax({
			url: 'delete.php',
			method: 'POST', //got to specify the request
			data: {id:todoId},
			success: function (data) {
				$('#ajax_msg').css("display", "block").delay(3000).slideUp(300).html(data);
			}
		});

		$('#task-list').load('read.php');
	}
	return false;

}