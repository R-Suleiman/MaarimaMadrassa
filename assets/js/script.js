// admin dashboard toggle action
const toggleBtns = document.querySelectorAll(".toggleDashboard");
const dashboard = document.querySelector(".left-dashboard");
const dashContent = document.querySelector(".dashboard-content");
const hideDash2 = document.getElementById("hideDash2");
toggleBtns.forEach((toggleBtn) => {
  toggleBtn.addEventListener("click", () => {
    if (dashboard.classList.contains("toggleDash")) {
      dashboard.classList.remove("toggleDash");
      hideDash2.style.display = "inline";
    } else {
      dashboard.classList.toggle("toggleDash");
      hideDash2.style.display = "none";
    }
  });
});

// contact form
const contactForm = document.querySelector(".contact_form");
const nameInput = document.querySelector(".nameInput");
const phoneInput = document.querySelector(".phoneInput");
const msgInput = document.querySelector(".msgInput");
const nameMsg = document.querySelector("#nameMsg");
const phoneMsg = document.querySelector("#phoneMsg");
const msgMsg = document.querySelector("#msgMsg");

contactForm.addEventListener("submit", (e) => {
  const name = nameInput.value;
  const phone = phoneInput.value;
  const message = msgInput.value;

  console.log(name);

  if (name === "") {
    nameMsg.style.display = "block";
    nameMsg.style.color = "red";
    nameMsg.innerHTML = "Please provide your name!";
    e.preventDefault();
  }
  if (phone === "") {
    phoneMsg.style.display = "block";
    phoneMsg.style.color = "red";
    phoneMsg.innerHTML = "Please provide your phone number!";
    e.preventDefault();
  }
  if (message === "") {
    msgMsg.style.display = "block";
    msgMsg.style.color = "red";
    msgMsg.innerHTML = "Please provide your Message!";
    e.preventDefault();
  }
});
