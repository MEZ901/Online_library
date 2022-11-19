window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
    document.getElementById("navbar").style.top = "0";
  } else {
    document.getElementById("navbar").style.top = "-50px";
  }
}

function signUpJs(){
  document.getElementById("signUp").style.display="block";
  document.getElementById("login").style.display="none";
}

function loginJs(){
  document.getElementById("signUp").style.display="none";
  document.getElementById("login").style.display="block";
}

function bookInfo(title,author,genre,price,language,publicationDate,description){
  document.getElementById("modal-title").innerHTML = title;
  document.getElementById("modal-author").innerHTML = author;
  document.getElementById("modal-language").innerHTML = language;
  document.getElementById("modal-genre").innerHTML = genre;
  document.getElementById("modal-publication-date").innerHTML = publicationDate;
  document.getElementById("modal-price").innerHTML = price;
  document.getElementById("modal-description").innerHTML = description;
}