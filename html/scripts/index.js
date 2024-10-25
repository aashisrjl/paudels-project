// Array of texts to cycle through
const texts = ["Student", "Web Developer", "Learner"];
let index = 0;

// Get the element with the "career" class
const careerElement = document.querySelector(".career");

// Function to change text every second
setInterval(() => {
    careerElement.textContent = texts[index]; // Update text content
    index = (index + 1) % texts.length; // Move to next index, reset if end reached
}, 1000); // 1000ms = 1 second
