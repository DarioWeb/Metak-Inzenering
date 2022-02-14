let menu = false;
document.getElementById("hamburger").onclick = function (){
    if (!menu){
        document.getElementById("hamburger").innerHTML = "&times;";
        document.getElementById("nav").style.width = "210px";
        document.getElementById("nav").style.overflow = "auto";
        menu = true;
    }else if (menu){
        document.getElementById("hamburger").innerHTML = "<i class='fas fa-bars'></i>";
        document.getElementById("nav").style.width = "0";
        document.getElementById("nav").style.overflow = "hidden";
        menu = false;
    }
}




