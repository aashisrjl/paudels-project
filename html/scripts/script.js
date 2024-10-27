//toggle navbar
function toggleMenu() {
    const navLinks = document.querySelector('.nav-links');
    navLinks.classList.toggle('show');
}

// handle modal for gallery
    function openModal(imageSrc) {
        document.getElementById("imageModal").style.display = "block";
        document.getElementById("modalImage").src = imageSrc;
    }

    function closeModal() {
        document.getElementById("imageModal").style.display = "none";
    }


// changing words in home page
const texts = ["Student", "Web Developer", "Learner"];
let index = 0;

const careerElement = document.querySelector(".career");

setInterval(() => {
    careerElement.textContent = texts[index]; 
    index = (index + 1) % texts.length; 
}, 1000); 


//form validation and mail send
function sendMail(event) {
    event.preventDefault(); // Prevent form submission

    // Get form elements
    const nameField = document.getElementById("name");
    const emailField = document.getElementById("email");
    const messageField = document.getElementById("message");

    // Get form values
    const name = nameField.value.trim();
    const email = emailField.value.trim();
    const message = messageField.value.trim();

    // Get error message elements
    const nameContent = document.getElementsByClassName("err-name")[0];
    const emailContent = document.getElementsByClassName("err-email")[0];
    const messageContent = document.getElementsByClassName("err-message")[0];

    // Validation
    let isValid = true;

    if (!name) {
        nameContent.style.display = "block";
        isValid = false;
    } else {
        nameContent.style.display = "none";
    }

    if (!email) {
        emailContent.style.display = "block";
        isValid = false;
    } else {
        emailContent.style.display = "none";
    }

    if (!message) {
        messageContent.style.display = "block";
        isValid = false;
    } else {
        messageContent.style.display = "none";
    }

    // If all fields are valid, proceed with email sending
    if (isValid) {
        const subject = `Contact from ${name}`;
        const body = `Name: ${name}\nEmail: ${email}\n\nMessage:\n${message}`;
        window.location.href = `mailto:shishirpoudel92@gmail.com?subject=${encodeURIComponent(subject)}&body=${encodeURIComponent(body)}`;
    }
}


// hide card toggle for gallery

function showHideCard() {
    const hideCards = document.querySelectorAll('#hideCard');
    const btn = document.getElementsByClassName("btt")[0];
    hideCards.forEach(card => {
        card.style.display = 'block'; 
    });
    btn.style.display = "none";
}

//details page
// function showContent(sectionId) {
//     // Hide all sections
//     const sections = document.querySelectorAll('.content-section');
//     sections.forEach(section => section.style.display = 'none');
    
//     // Show selected section
//     document.getElementById(sectionId).style.display = 'block';
// }
function showContent(sectionId) {
    // Hide all sections
    const sections = document.querySelectorAll('.content-section');
    sections.forEach(section => section.classList.remove('active'));
    
    // Show the selected section
    document.getElementById(sectionId).classList.add('active');
}



