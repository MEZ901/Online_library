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

function bookInfo(title,author,genre,price,language,publicationDate,description,id,cover){
  document.getElementById("modal-title").innerHTML = title;
  document.getElementById("modal-author").innerHTML = author;
  document.getElementById("modal-language").innerHTML = language;
  document.getElementById("modal-genre").innerHTML = genre;
  document.getElementById("modal-publication-date").innerHTML = publicationDate;
  document.getElementById("modal-price").innerHTML = price + "$";
  document.getElementById("modal-description").innerHTML = description;
  document.getElementById("bookId").value = id;
  document.getElementById("bookCover").value = cover;
  document.querySelector('.button-edit-book').id=id;
  get_id(id);
}

function get_id(id){
  return id;
}

if(typeof document.getElementById("cstmCover") !== 'undefined' && document.getElementById("cstmCover") !== null){
  document.getElementById("cstmCover").addEventListener("click", function(){
    document.getElementById("cover").click()
  })


  document.getElementById("cover").addEventListener("change", function(){
    const img = document.getElementById("cstmCover");
    const file = this.files[0];
    if(file){
      const reader = new FileReader;
      reader.onload = function(){
        const result = reader.result;
        img.src = result;
      }
      reader.readAsDataURL(file);
    }
  })
}

if(typeof document.forms["loginForm"] !== 'undefined' && document.forms["loginForm"] !== null){
  const email = document.querySelector("#loginEmail");
  const invalidIcon = document.querySelector(".invalid");
  const validIcon = document.querySelector(".valid");
  const loginBtn = document.querySelector("[name='login']");
  
  let mailFormat =  /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  function loginChecker(){
    if(email.value.match(mailFormat)){
      email.style.borderColor = "#27ae60";
      invalidIcon.style.display = "none";
      validIcon.style.display = "block";
      loginBtn.removeAttribute("disabled");
    }else{
      email.style.borderColor = "#e74c3c";
      invalidIcon.style.display = "block";
      validIcon.style.display = "none";
      loginBtn.setAttribute('disabled', '');
    }
    if(email.value == ""){
      email.style.borderColor = "lightgrey";
      invalidIcon.style.display = "none";
      validIcon.style.display = "none";
      loginBtn.setAttribute('disabled', '');
    }
  }
}
