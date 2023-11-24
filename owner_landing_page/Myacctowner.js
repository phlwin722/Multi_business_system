
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
  }
  
  // Close the dropdown if the user clicks outside of it
  window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }

//upload image
$(document).ready(function() {
  // Listen for changes in the file input
  $('#fileInput').on('change', function() {
      var input = this;
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
              // Set the source of the image element to the uploaded image
              $('#imagePreview').attr('src', e.target.result);
          };
          reader.readAsDataURL(input.files[0]);
      }
  })
})
//upload image

//this is for tabbed pane in my account
function myaccount(cityName) {
  let i;
  let x = document.getElementsByClassName("acctinfo");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  document.getElementById(cityName).style.display = "block";  
}
