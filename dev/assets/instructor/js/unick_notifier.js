function unick_notifier()
{
  this.elementId;
  this.ready = true;

  this.init = function(elementId)
  {
    this.element = document.getElementById(elementId);
  }

  this.notify = function(message,type,delay)
  {
    var object = this;
    var element = this.element;

    element.getElementsByClassName("text")[0].innerHTML = message;

    this.animate(type,delay);

    $(element).click(function(){
      object.close();
    });
  }

  this.close = function()
  {
    var element = this.element;

    element.style.opacity = "0";
    element.style.right = "-400px";

    setTimeout(function(){
      element.style.display="none";
      object.ready = true;
    },500);
  }

  this.animate = function(type,delay)
  {
    if(this.ready == true)
    {
      var element = this.element;

      var object = this;

      if(type == "success")
      {
        element.getElementsByClassName("this_icon")[0].innerHTML = "<i class='fa fa-check'></i> ";
        element.style.background = "#dff0d8";
        element.style.borderColor = "#d6e9c6";
        element.style.color="#3c763d";
      }
      else if(type == "warning")
      {
        element.getElementsByClassName("this_icon")[0].innerHTML = "<i class='fa fa-warning'></i> ";
        element.style.background = "#fcf8e3";
        element.style.borderColor = "#faebcc";
        element.style.color="#8a6d3b";
      }
      else if(type == "danger")
      {
        element.getElementsByClassName("this_icon")[0].innerHTML = "<i class='fa fa-times-circle'></i> ";
        element.style.background = "#f2dede";
        element.style.borderColor = "#ebccd1";
        element.style.color="#a94442";
      }

      element.style.display="block";

      setTimeout(function(){
        element.style.opacity = "1";
        element.style.right = "10px";

        if(delay != 0)
        {
          setTimeout(function(){
            object.close();
          },delay);
        }
        
      },10);
      
    }
  }
}
