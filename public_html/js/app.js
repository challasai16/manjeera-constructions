let sideMenuopen = document.querySelector(".side-nav");
let sideMenu = document.querySelector(".side-menu-main");
let closeSidemenu = document.querySelector(".side-close-icon");


sideMenuopen.addEventListener("click", ()=> {
    sideMenu.classList.add("side-manu");
});
closeSidemenu.addEventListener("click", ()=> {
    sideMenu.classList.remove("side-manu");
});

let closeMobilemenu = document.querySelector(".mobilemenu-close");
let mobileMainmenu = document.querySelector(".mobile-menu");
let mobileMenuopen = document.querySelector(".mobile-menu-iconbox");

mobileMenuopen.addEventListener("click", ()=> {
    mobileMainmenu.classList.add("mobile-menu-manu");
});

closeMobilemenu.addEventListener("click", ()=> {
   mobileMainmenu.classList.remove("mobile-menu-manu");
});
let mobileProjectbtn = document.querySelector(".mobile-projectbtn");
let mprojectMenuclose = document.querySelector(".m-projectmenu-close");
let mobileProjectmenu = document.querySelector(".mobile-projectmenu");

mobileProjectbtn.addEventListener("click", ()=> {
    mobileProjectmenu.classList.add("mobile-projectmenu-manu");
});
mprojectMenuclose.addEventListener("click", ()=> {
    mobileProjectmenu.classList.remove("mobile-projectmenu-manu");
});
let companyMenuBtn = document.querySelector(".mobileCompanybtn");
let companyMenu = document.querySelector(".our-companumenu");
let companymenuClose = document.querySelector(".m-companymenu-close");

companyMenuBtn.addEventListener("click", ()=> {
    companyMenu.classList.add("our-companumenu-manu");
});
companymenuClose.addEventListener("click", ()=> {
    companyMenu.classList.remove("our-companumenu-manu");
});

// CAREERS 
let applyCareers = document.querySelectorAll(".c-apply");
let careersForm = document.querySelector(".job-apply-main");
let closeCareersform = document.querySelector(".c-close-icon");


applyCareers.forEach(link=> {
    
    link.addEventListener("click", () => {
        careersForm.classList.add("job-apply-main-manu");
    });
});

closeCareersform.addEventListener("click", ()=> {
    careersForm.classList.remove("job-apply-main-manu");
});


// faviicon starts here 
window.onload = function() {
  var link = top.document.createElement("link");
  link.type = "image/x-icon";
  link.rel = "shortcut icon";
  link.href = "./manjeera-favi.png";
  top.document.getElementsByTagName("head")[0].appendChild(link);
}


// faviicon ends here 


