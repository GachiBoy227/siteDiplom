function toggleSidebar() {
    var sidebar = document.getElementById("sidebar");
    var bt = document.getElementById("menuButton");
    if (sidebar.style.left === "-200px") { 
      sidebar.style.left = "0";
      bt.style.rotate = "-180deg";
    } else {
      sidebar.style.left = "-200px"; 
      bt.style.rotate = "0deg";
    }
  }