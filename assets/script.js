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

if(typeof document.forms["signUpForm"] !== 'undefined' && document.forms["signUpForm"] !== null){
  const signUpBtn = document.querySelector("[name='signUp']");
  const fname = document.querySelector("#fname");
  const lname = document.querySelector("#lname");
  const email = document.querySelector("#email");
  const rePassword = document.querySelector("#repeatPassword");
  const password = document.querySelector("#password");
  const invalidIcon = document.querySelector(".Invalid");
  const validIcon = document.querySelector(".Valid");
  const invalidIconP = document.querySelector(".InvalidP");
  const validIconP = document.querySelector(".ValidP");
  const indicator = document.querySelector(".passwordIndicator");
  const weak = document.querySelector(".weak");
  const medium = document.querySelector(".medium");
  const strong = document.querySelector(".strong");
  const text = document.querySelector(".text");

  let mailFormat =  /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  let regExpWeak = /[a-z]/;
  let regExpMedium = /\d+/;
  let regExpStrong = /.[!,@,#,$,% ,^,&‚*, ?‚_‚~‚¯‚ (,)]/;

  var firstNameValid = false;
  let lastNameValid;
  let emailValid;
  let passwordValid;
  let rePasswordValid;

  function containsNumbers(str) {
    if(str == "") return -1;
    else if(/\d/.test(str)) return 0;
    else return 1;
  }

  function fnameChecker(){
    if(containsNumbers(fname.value) == 1){
      fname.style.borderColor = "#27ae60";
      firstNameValid = true;
      return true;
    }else if(containsNumbers(fname.value) == 0){
      fname.style.borderColor = "#e74c3c";
      firstNameValid = false;
      return false;
    }else{
      fname.style.borderColor = "lightgrey";
      firstNameValid = false;
      return false;
    }
  }

  function lnameChecker(){
    if(containsNumbers(lname.value) == 1){
      lname.style.borderColor = "#27ae60";
      lastNameValid = true;
      return true;
    }else if(containsNumbers(lname.value) == 0){
      lname.style.borderColor = "#e74c3c";
      lastNameValid = false;
      return false;
    }else{
      lname.style.borderColor = "lightgrey";
      lastNameValid = false;
      return false;
    }
  }

  function emailChecker(){
    if(email.value.match(mailFormat)){
      email.style.borderColor = "#27ae60";
      invalidIcon.style.display = "none";
      validIcon.style.display = "block";
      emailValid = true;
      return true;
    }else if(!email.value.match(mailFormat) && email.value !== ""){
      email.style.borderColor = "#e74c3c";
      invalidIcon.style.display = "block";
      validIcon.style.display = "none";
      emailValid = false;
      return false;
    }else{
      email.style.borderColor = "lightgrey";
      invalidIcon.style.display = "none";
      validIcon.style.display = "none";
      emailValid = false;
      return false;
    }
  }

  function passwordChecker(){
    var no;
    if(password.value != ""){
      indicator.style.display = "block";
      indicator.style.display = "flex";
      if(password.value.length <= 7 && (password.value.match(regExpWeak) || password.value.match(regExpMedium) || password.value.match(regExpStrong))) no = 1;
      if(password.value.length >= 8 && ((password.value.match(regExpWeak) && password.value.match(regExpMedium)) || (password.value.match(regExpMedium) && password.value.match(regExpStrong)) || (password.value.match(regExpWeak) && password.value.match(regExpStrong)))) no = 2;
      if(password.value.length >= 8 && password.value.match(regExpWeak) && password.value.match(regExpMedium) && password.value.match(regExpStrong)) no = 3;

      if(no == 1){
        weak.classList.add("active");
        text.style.display = "block";
        text.textContent = "Your password is too week.";
        text.classList.add("weak");
        passwordValid = true;
      }

      if(no == 2){
        medium.classList.add("active");
        text.textContent = "Your password is medium.";
        text.classList.add("medium");
        passwordValid = false;
      }else{
        medium.classList.remove("active");
        text.classList.remove("medium");
      }

      if(no == 3){
        medium.classList.add("active");
        strong.classList.add("active");
        text.textContent = "Your password is strong.";
        text.classList.add("strong");
        passwordValid = false;
      }else{
        strong.classList.remove("active");
        text.classList.remove("strong");
      }
    }else{
      indicator.style.display = "none";
      text.style.display = "none"
    }
    if(no == 1) return false;
    else if(no == 2) return true;
    else return true;
  }

  function repeatPasswordChecker(){
    if(rePassword.value != ""){
      if(password.value === rePassword.value){
        rePassword.style.borderColor = "#27ae60";
        invalidIconP.style.display = "none";
        validIconP.style.display = "block";
        rePasswordValid = true;
        return true;
      }else{
        rePassword.style.borderColor = "#e74c3c";
        invalidIconP.style.display = "block";
        validIconP.style.display = "none";
        rePasswordValid = true;
        return false;
      }
    }else{
      rePassword.style.borderColor = "lightgrey";
      invalidIconP.style.display = "none";
      validIconP.style.display = "none";
      rePasswordValid = true;
      return false;
    }
  }
  
}