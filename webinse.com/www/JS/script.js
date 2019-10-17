'use strict';

var inputTask = document.getElementById('task_create');
var unfinishedTask = document.getElementById('unfinished');

var addButton = document.getElementById('add_task');
var correctButton = document.getElementById('correct_task');
var dellButton = document.getElementById('dell_task');

function createNewElement(task){
    let fragment = new DocumentFragment();
    let task__list_wrapp_check = document.createElement("div");
    task__list_wrapp_check.className = "task__list_wrapp-check";
   
    let checkbox = document.createElement('input');
	 checkbox.className="task__list-check";
     checkbox.type="checkbox";
     task__list_wrapp_check.appendChild(checkbox);
     
     checkbox.onchange = function(){
        if(checkbox.checked == true){
            finishTask();
        } else{
            unfinishTask();
        };
    }
    
    let labelList = document.createElement("label");
     labelList.className = "task__list-text";
     labelList.type = "text";
     labelList.innerText = inputTask.value;
     
     var instrumentsList = document.createElement("div");
     instrumentsList.className = "task__list-instruments";
     instrumentsList.id = "instruments";
    
     /*let btnListSelect = document.createElement("button");
     btnListSelect.className = "task__list-select"; 
     let imgBtnListSelect = document.createElement("img");
     imgBtnListSelect.className = "task__list-select-img";
     imgBtnListSelect.src = "images/icons/select-mini.png";
     btnListSelect.append(imgBtnListSelect);*/

     let btnListRemove = document.createElement("button");
     btnListRemove.className = "task__list-remove"; 
     let imgBtnListRemove = document.createElement("img");
     imgBtnListRemove.src = "images/icons/correct-mini.png";
     btnListRemove.append(imgBtnListRemove);

     let btnListDelete = document.createElement("button");
     btnListDelete.className = "task__list-delete"; 
     let imgBtnListDelete = document.createElement("img");
     imgBtnListDelete.src = "images/icons/dell-mini.png";
     btnListDelete.append(imgBtnListDelete);
     
     /*instrumentsList.append(btnListSelect);*/
     instrumentsList.append(btnListRemove);
     instrumentsList.append(btnListDelete);

     let showBlock = document.createElement("div");
     showBlock.id = "Show-correct";
     showBlock.className = "correct";
     showBlock.style.display = 'none';
     let showBlockInput = document.createElement("input");
     showBlockInput.id = "correct-input";
     showBlockInput.value = inputTask.value;
     showBlock.appendChild(showBlockInput);
     let showBlockSavebtn = document.createElement("button");
     showBlockSavebtn.innerText = "Save Correct";

     showBlock.appendChild(showBlockInput);
     showBlock.appendChild(showBlockSavebtn);

     let taskList = document.createElement("div");
     taskList.className = "task__list";
     taskList.id = "show-instrument";
     
     taskList.append(task__list_wrapp_check);
     taskList.append(labelList);
     taskList.append(instrumentsList);
     taskList.append(showBlock);

     fragment.append(taskList);

     btnListRemove.onclick = function correctTaskFun(){
        showBlock.style.display = 'block';
        showBlockSavebtn.onclick = function(){
            labelList.innerText = showBlockInput.value;
            showBlock.style.display = 'none';
        }
     }

     btnListDelete.onclick = function(){
         taskList.remove();
     }
     function finishTask() {
        labelList.className = "task__list-text task__list-done";
    }
    function unfinishTask() { 
        labelList.className = "task__list-text";
    }

return fragment;
}

function addTask() {
	if(inputTask.value){
		var listItem = createNewElement(inputTask.value);
		unfinishedTask.append(listItem);
		/*bindTaskEvents(listItem, finishTask);*/
        inputTask.value="";
	}
}
addButton.onclick=addTask;

/*
function delitTasks() {
    let listItem=this.parentNode;
    let ul=listItem.parentNode;
    ul.removeChild(listItem);
    
  }*/


