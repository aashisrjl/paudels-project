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


//functioning mailto 
function sendMail(event) {
    event.preventDefault(); // Prevent form submission

    // Get form values
    const name = document.getElementById("name").value;
    const email = document.getElementById("email").value;
    const message = document.getElementById("message").value;


    const subject = `Contact from ${name}`;
    const body = `Name: ${name}\nEmail: ${email}\n\nMessage:\n${message}`;

    window.location.href = `mailto:shishirpoudel92@gmail.com?subject=${encodeURIComponent(subject)}&body=${encodeURIComponent(body)}`;
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
