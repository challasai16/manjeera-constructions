//about page script{

console.log("test");

const tabs = document.querySelectorAll(".highTab-links");
console.log(tabs);

const boxes = document.querySelectorAll(".highTab-content");
console.log(boxes);

tabs.forEach((tab) => {
  tab.addEventListener("click", () => {
    const selectTab = tab.dataset["select"];

    tabs.forEach((tab) => {
      tab.classList.remove("active");
    });

    tab.classList.add("active");

    boxes.forEach((box) => {
      box.style.display = "none";
    });

    const selectbox = document.querySelector(`.${selectTab}`);
    console.log(selectbox);

    selectbox.style.display = "block";
  });
});

//accordian section starts

const accordiansLeft = document.querySelectorAll(".coloum-1>.accordian");

accordiansLeft.forEach((accordian) => {
  const title = accordian.querySelector(".accordian-title");

  title.addEventListener("click", () => {
    accordiansLeft.forEach((accordian) => {
      accordian.classList.remove("isopen");
    });

    accordian.classList.add("isopen");
  });
});

const accordiansmiddle = document.querySelectorAll(".coloum-2>.accordian");

accordiansmiddle.forEach((accordian) => {
  const title = accordian.querySelector(".accordian-title");

  title.addEventListener("click", () => {
    accordiansmiddle.forEach((accordian) => {
      accordian.classList.remove("isopen");
    });

    accordian.classList.add("isopen");
  });
});

const accordiansright = document.querySelectorAll(".coloum-3>.accordian");

accordiansright.forEach((accordian) => {
  const title = accordian.querySelector(".accordian-title");

  title.addEventListener("click", () => {
    accordiansright.forEach((accordian) => {
      accordian.classList.remove("isopen");
    });

    accordian.classList.add("isopen");
  });
});



// index js

let searchform = document.querySelector("#search_form");
console.log(searchform);
const projectPopup = document.querySelector(".project_display");

const closePopup = document.querySelector(".closePopUp");


closePopup.addEventListener("click", () => {
  projectPopup.style.display = "none";
});



// form condition for numbers 
function isInputNumber(evt) {
        var ch = String.fromCharCode(evt.which);

        if (!/^[0-9]$/.test(ch)) {
          evt.preventDefault();
        }
      }

