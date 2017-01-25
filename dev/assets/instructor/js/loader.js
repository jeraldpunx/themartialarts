function loader()
      {
        var target;
        var loader_element;

        this.target = function(target)
        {
          this.target = target;
          this.loader_element = document.createElement("div");
          this.loader_element.className = "loader-container";
          this.loader_element.innerHTML = "<div class='gyroscope'><div class='loader'>Loading...</div></div>";


          var object = this;
          var element_position = $(this.target).css("position");

          if(element_position == "" || element_position == "inherit" || element_position == "initial")
          {
            $(this.target).addClass('relative');
          }

          $(this.target).append(this.loader_element);
          setTimeout(function(){
            object.loader_element.style.opacity ="1";
          },10);

          disableScroll();

          $(document).scrollTop(0);
          $(target.parentNode).scrollTop(0);
        }

        this.close = function()
        {
          var object = this;

          this.loader_element.style.opacity = "0";

          $(this.target).removeClass('relative');

          setTimeout(function(){
            $(object.loader_element).remove();
            enableScroll();
          },500);
        }
      }

      // left: 37, up: 38, right: 39, down: 40,
// spacebar: 32, pageup: 33, pagedown: 34, end: 35, home: 36
var keys = {37: 1, 38: 1, 39: 1, 40: 1};

function preventDefault(e) {
  e = e || window.event;
  if (e.preventDefault)
      e.preventDefault();
  e.returnValue = false;  
}

function preventDefaultForScrollKeys(e) {
    if (keys[e.keyCode]) {
        preventDefault(e);
        return false;
    }
}

function disableScroll() {
  if (window.addEventListener) // older FF
      window.addEventListener('DOMMouseScroll', preventDefault, false);
  window.onwheel = preventDefault; // modern standard
  window.onmousewheel = document.onmousewheel = preventDefault; // older browsers, IE
  window.ontouchmove  = preventDefault; // mobile
  document.onkeydown  = preventDefaultForScrollKeys;
}

function enableScroll() {
    if (window.removeEventListener)
        window.removeEventListener('DOMMouseScroll', preventDefault, false);
    window.onmousewheel = document.onmousewheel = null; 
    window.onwheel = null; 
    window.ontouchmove = null;  
    document.onkeydown = null;  
}