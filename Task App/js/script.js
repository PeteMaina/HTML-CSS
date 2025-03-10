// Getting all required elements
const inputField = document.querySelector(".input-field textarea"),
  todoLists = document.querySelector(".todoLists"),
  pendingNum = document.querySelector(".pending-num"),
  clearButton = document.querySelector(".clear-button");

// Load tasks from local storage on page load
document.addEventListener("DOMContentLoaded", loadTasks);

function loadTasks() {
  const tasks = JSON.parse(localStorage.getItem("tasks")) || [];
  tasks.forEach((task) => {
    addTaskToDOM(task.text, task.completed);
  });
  allTasks();
}

function saveTasks() {
  const tasks = [];
  document.querySelectorAll(".todoLists .list").forEach((taskEl) => {
    tasks.push({
      text: taskEl.querySelector(".task").textContent,
      completed: taskEl.classList.contains("completed"),
    });
  });
  localStorage.setItem("tasks", JSON.stringify(tasks));
}

function allTasks() {
  let tasks = document.querySelectorAll(".pending");
  pendingNum.textContent = tasks.length === 0 ? "no" : tasks.length;

  let allLists = document.querySelectorAll(".list");
  todoLists.style.marginTop = allLists.length > 0 ? "20px" : "0px";
  clearButton.style.pointerEvents = allLists.length > 0 ? "auto" : "none";
}

// Add task when Enter is pressed
inputField.addEventListener("keyup", (e) => {
  let inputVal = inputField.value.trim();
  if (e.key === "Enter" && inputVal.length > 0) {
    addTaskToDOM(inputVal);
    inputField.value = "";
    saveTasks();
    allTasks();
  }
});

function addTaskToDOM(text, completed = false) {
  let liTag = document.createElement("li");
  liTag.className = `list ${completed ? "completed" : "pending"}`;
  liTag.innerHTML = `
    <input type="checkbox" ${completed ? "checked" : ""} />
    <span class="task">${text}</span>
    <i class="uil uil-trash" onclick="deleteTask(this)"></i>
  `;
  liTag.querySelector("input").addEventListener("change", () => handleStatus(liTag));
  todoLists.appendChild(liTag);
}

function handleStatus(taskEl) {
  taskEl.classList.toggle("completed");
  taskEl.classList.toggle("pending");
  saveTasks();
  allTasks();
}

function deleteTask(e) {
  e.parentElement.remove();
  saveTasks();
  allTasks();
}

clearButton.addEventListener("click", () => {
  todoLists.innerHTML = "";
  localStorage.removeItem("tasks");
  allTasks();
});
