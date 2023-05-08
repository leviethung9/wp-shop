// xu ly menu tablet mobile
function openNav() {
    document.getElementById("menu-mb").style.width = "250px";
  }
  
  function closeNav() {
    document.getElementById("menu-mb").style.width = "0";
  }

  var subMenus = document.querySelectorAll('.custom-menu-ul .menu-item-has-children > a');
  for (var i = 0; i < subMenus.length; i++) {
    subMenus[i].addEventListener('click', function(e) {
      e.preventDefault();
      var subMenu = this.parentNode.querySelector('.custom-submenu-mb');
      if (subMenu) {
        subMenu.classList.toggle('sub-menu-active');
      }
    });
  }
  
  


