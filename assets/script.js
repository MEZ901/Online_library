window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
    document.getElementById("navbar").style.top = "0";
  } else {
    document.getElementById("navbar").style.top = "-50px";
  }
}

function signUp(){
  document.getElementById("signUp").style.display="block";
  document.getElementById("login").style.display="none";
}

function login(){
  document.getElementById("signUp").style.display="none";
  document.getElementById("login").style.display="block";
}