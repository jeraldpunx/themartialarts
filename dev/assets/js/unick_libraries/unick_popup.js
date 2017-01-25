function unick_popup()
{
  this.element;
  this.init = function(elementId)
  {
    var object = this;
    this.element = document.getElementById(elementId);

    $(this.element.getElementsByClassName("popup-close")).click(function(){
      object.close();
    });
  }

  this.open = function()
  {
    var element = this.element;

    element.style.display = "block";

    setTimeout(function(){
      element.style.opacity = "1";

      element.getElementsByClassName("popup-box")[0].style.top = "0";
    },10);
  }

  this.close = function()
  {
    var element = this.element;
    element.style.opacity = "0";
    element.getElementsByClassName("popup-box")[0].style.top = "-400px";

    setTimeout(function(){
      element.style.display = "none";
    },500);
  }
}