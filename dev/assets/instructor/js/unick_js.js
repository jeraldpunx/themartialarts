$(document).ready(function(){

  // custom notifier initialization
  var noty = new unick_notifier();
  noty.init("notifier1");

  // custom notifier initialization
  var popup = new unick_popup();
  popup.init("popup1");


  $("#sample_alert").click(function(){

    // this code is used to trigger the notifier
    noty.notify("hahahahahahahahahahahahh","danger",0);
  });

  $("#filter").click(function(){
    // this code is used to trigger the popup
    popup.open();
  });

  $("#edit-bttn").click(function(){
    document.getElementById("content1").style.left = "-100%";
    document.getElementById("content2").style.display = "block";
    setTimeout(function(){
      document.getElementById("content2").style.opacity = "1";
      document.getElementById("content1").style.opacity = "0";
      document.getElementById("content2").style.left = "0px";
      setTimeout(function(){
        document.getElementById("content1").style.display="none";
      },500);
    },10);
  });

  $("#cancel-bttn").click(function(){
    document.getElementById("content2").style.left = "100%";
    document.getElementById("content1").style.display = "block";
    setTimeout(function(){
      document.getElementById("content1").style.opacity = "1";
      document.getElementById("content2").style.opacity = "0";
      document.getElementById("content1").style.left = "0px";
      setTimeout(function(){
        document.getElementById("content2").style.display="none";
      },500);
    },10);
  });

});