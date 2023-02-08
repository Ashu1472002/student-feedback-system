//For Sidenav 
const openNav = () => {
    document.getElementById('sidebar-container').style.width = "350px";
    document.getElementById('close_btn').style.display = "block";
}
const closeNav = () => {
    document.getElementById('sidebar-container').style.width = "0";
    document.getElementById('close_btn').style.display = "none";
}

//For Feedback Form
function visible_Feedback() {
    const x = document.getElementById("sel").value;
    if (x == "--") {
        document.getElementById("feedback").style.visibility = 'hidden';
    }
    else {
        document.getElementById("feedback").style.visibility = 'visible';
    }
}