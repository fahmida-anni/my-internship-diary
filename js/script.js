const contactForm = document.getElementById("contactForm");
const formMessage = document.getElementById("formMessage");

contactForm.addEventListener("submit", function (e) {
  e.preventDefault();
  const formData = new FormData(contactForm);

  fetch("http://localhost/my-website-template/submit_contact.php", {
    method: "POST",
    body: formData,
  })
    .then((response) => response.text())
    .then((data) => {
      if (data.trim() === "success") {
        showMessage("Thank you! Your message has been sent.", "success");
        contactForm.reset();
      } else {
        showMessage("Oops! Something went wrong. Please try again.", "danger");
      }
    })
    .catch((error) => {
      console.error("Error:", error);
      showMessage("Server error. Make sure XAMPP Apache is running!", "danger");
    });
});

// Function to display message and fade out
function showMessage(message, type) {
  formMessage.innerText = message;
  formMessage.className = `mt-3 text-center text-${type}`;
  
  // Fade out after 4 seconds
  setTimeout(() => {
    formMessage.innerText = "";
  }, 4000);
}

// Auto fade-out alerts after 3 seconds
document.addEventListener("DOMContentLoaded", function() {
  const alerts = document.querySelectorAll('.alert');
  alerts.forEach(alert => {
    setTimeout(() => {
      alert.classList.add('fade-out');
      setTimeout(() => alert.remove(), 500);
    }, 3000);
  });
});
