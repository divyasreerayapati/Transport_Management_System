function handleSideNavAdmin(type) {
  if (type === "active") {
    document.getElementById("completed").style.display = "none";
    document.getElementById("active").style.display = "block";
    document.getElementById("activeLi").style.backgroundColor = "#737373";
    document.getElementById("completedLi").style.backgroundColor = "#d6d6d6";
  } else {
    document.getElementById("active").style.display = "none";
    document.getElementById("completed").style.display = "block";
    document.getElementById("completedLi").style.backgroundColor = "#737373";
    document.getElementById("activeLi").style.backgroundColor = "#d6d6d6";
  }
}
