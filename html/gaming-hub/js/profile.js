document.getElementById('dashboard-link').addEventListener('click', function() {
    showContent('dashboard-content');
});

document.getElementById('orders-link').addEventListener('click', function() {
    showContent('orders-content');
});

document.getElementById('settings-link').addEventListener('click', function() {
    showContent('settings-content');
});

function showContent(contentId) {
    // Hide all content sections
    var contentSections = document.querySelectorAll('.content-section');
    contentSections.forEach(function(section) {
        section.classList.remove('active');
    });

    // Show the selected content section
    document.getElementById(contentId).classList.add('active');

    // Update the active link in the sidebar
    var links = document.querySelectorAll('.sidebar-links a');
    links.forEach(function(link) {
        link.classList.remove('active');
    });
    document.querySelector(`[id=${contentId.split('-')[0]}-link]`).classList.add('active');
}
