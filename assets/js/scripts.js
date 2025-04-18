// DOM Ready
document.addEventListener("DOMContentLoaded", () => {
    console.log("FreshFarm is ready!");

    // Example: Navbar Scroll Effect
    const header = document.querySelector("header");
    window.addEventListener("scroll", () => {
        if (window.scrollY > 50) {
            header.classList.add("scrolled");
        } else {
            header.classList.remove("scrolled");
        }
    });

    // Example: Smooth Scroll for Anchor Links
    const links = document.querySelectorAll("a[href^='#']");
    links.forEach(link => {
        link.addEventListener("click", event => {
            event.preventDefault();
            const target = document.querySelector(link.getAttribute("href"));
            if (target) {
                target.scrollIntoView({ behavior: "smooth" });
            }
        });
    });

    // Example: Alert for Buttons
    const buttons = document.querySelectorAll(".btn");
    buttons.forEach(button => {
        button.addEventListener("click", () => {
            alert("Button clicked! Redirecting...");
        });
    });
});

// Example: Form Validation
function validateForm(event) {
    const form = event.target;
    const requiredFields = form.querySelectorAll("[required]");
    let isValid = true;

    requiredFields.forEach(field => {
        if (!field.value.trim()) {
            isValid = false;
            field.style.borderColor = "red";
            alert(`Please fill in the ${field.name} field.`);
        } else {
            field.style.borderColor = "green";
        }
    });

    return isValid;
}
