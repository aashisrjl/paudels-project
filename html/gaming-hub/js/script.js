const hamburger = document.getElementById('hamburger');
const navLinks = document.getElementById('nav-links');
const searchIcon = document.getElementById('search-icon');
const searchOverlay = document.getElementById('search-overlay');
const closeBtn = document.getElementById('close-btn');
const carousel = document.querySelector('.topups-carousel');
const prevButton = document.querySelector('.prev');
const nextButton = document.querySelector('.next');


// Hamburger Menu Toggle
hamburger.addEventListener('click', () => {
  if (navLinks.style.display === 'flex') {
    navLinks.style.display = 'none';
    hamburger.innerHTML = '<i class="fas fa-bars"></i>';
  } else {
    navLinks.style.display = 'flex';
    hamburger.innerHTML = '<i class="fas fa-times"></i>'; // Change to cross icon
  }
});

// Open search overlay
searchIcon.addEventListener('click', () => {
  searchOverlay.classList.add('show');
});

// Close search overlay
closeBtn.addEventListener('click', () => {
  searchOverlay.classList.remove('show');
});

let currentIndex = 0;
const itemsToShow = 4;
const totalItems = document.querySelectorAll('.topups-item').length;

prevButton.addEventListener('click', () => {
  if (currentIndex > 0) {
    currentIndex--;
  }
  carousel.style.transform = `translateX(-${currentIndex * (100 / itemsToShow)}%)`;
});

nextButton.addEventListener('click', () => {
  if (currentIndex < totalItems - itemsToShow) {
    currentIndex++;
  }
  carousel.style.transform = `translateX(-${currentIndex * (100 / itemsToShow)}%)`;
});