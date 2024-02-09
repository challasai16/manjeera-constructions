// access starts here 
let input = document.querySelectorAll('.lead-access input')
let accessBtn = document.querySelector('.access-btn');
let username = document.querySelector('.access-username');
let password = document.querySelector('.access-password');
let errorMsg = document.querySelector('.error-access');
let accessMain = document.querySelector('.lead-access');

accessMain.addEventListener('click', ()=> {
    if(username.value=="admin" && password.value=="manjeera@123") {
         // Hide the popup
         document.getElementById("popup").classList.add('lead-access-manu');

        // Store a flag in localStorage to prevent the popup from showing again during this session
        let localS = localStorage.setItem("popupClosed", "true");
       }else {
          errorMsg.innerHTML  = "Please check once Username or Password are not matched";
         
    }
  
});
 if(localStorage.getItem("popupClosed")) {
        document.getElementById("popup").classList.add('lead-access-manu');
    }else {
    //   document.getElementById("popup").style.display = "block";
    }
    
    
let logout = document.querySelector('.logout');
logout.addEventListener('click', ()=> {
    localStorage.clear("popupClosed", "true");
    window.location.href = "./";
   
});
