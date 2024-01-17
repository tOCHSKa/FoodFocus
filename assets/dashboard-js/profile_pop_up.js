document.addEventListener('DOMContentLoaded', function () {
 
  var checkbox = document.getElementById('checkbox');
  var maleImages = document.querySelector('.male');
  var femaleImages = document.querySelector('.female');



  checkbox.addEventListener('change', function () {

      if (checkbox.checked) {
          maleImages.style.display = 'none';
          femaleImages.style.display = 'block';
          resetSlideIndex();
      } else {

          maleImages.style.display = 'block';
          femaleImages.style.display = 'none';
          resetSlideIndex();
      }
  });
});


var slideIndex = 1;
function resetSlideIndex() {
  slideIndex = 1;
  showDivs(slideIndex);
}


showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  if (checkbox.checked) {
  var x = document.getElementsByClassName("mySlidesFemale");
  }
  else{  var x = document.getElementsByClassName("mySlidesMale");}
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length} ;
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  x[slideIndex-1].style.display = "block";
}


function editField(element){
  let field = element.dataset.field;
  let input = document.getElementById("input" + field)
  input.disabled = false;
  element.classList.add("d-none")
  document.getElementById("check" + field).classList.remove("d-none")
  document.getElementById("xmark" + field).classList.remove("d-none")
  document.getElementById("xmark" + field).dataset.oldvalue = input.value
  input.focus();
}

function cancelEdit(element){
  let field = element.dataset.field;
  let input = document.getElementById("input" + field)
  input.disabled = true;
  element.classList.add("d-none")
  document.getElementById("check" + field).classList.add("d-none")
  document.getElementById("edit" + field).classList.remove("d-none")
  input.value = element.dataset.oldvalue
}


function categorieActivite(choice){
  console.log(choice);
  if (choice == 1) {  
    document.getElementById("iconBed").style.border = "1px solid";
    document.getElementById("iconStanding").style.border = "none";
    document.getElementById("iconWalking").style.border = "none";
    document.getElementById("iconRunning").style.border = "none";
}
 else if (choice == 2) {  
  document.getElementById("iconBed").style.border = "none";
  document.getElementById("iconStanding").style.border = "1px solid";
  document.getElementById("iconWalking").style.border = "none";
  document.getElementById("iconRunning").style.border = "none";
}
else if (choice == 3) {  
  document.getElementById("iconBed").style.border = "none";
  document.getElementById("iconStanding").style.border = "none";
  document.getElementById("iconWalking").style.border = "1px solid";
  document.getElementById("iconRunning").style.border = "none";
}
else if (choice == 4) {  
  document.getElementById("iconBed").style.border = "none";
  document.getElementById("iconStanding").style.border = "none";
  document.getElementById("iconWalking").style.border = "none";
  document.getElementById("iconRunning").style.border = "1px solid";
}

};

function validateEmail(element) {
  let field = element.dataset.field;
  let input = document.getElementById("input" + field)
  if (input.value.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/)) {
    console.log("email ok")
  } else {
    console.log("email invalide")
  }
}

