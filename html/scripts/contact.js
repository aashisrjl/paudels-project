function sendMail(event) {
    event.preventDefault(); // Prevent form submission

    // Get form values
    const name = document.getElementById("name").value;
    const email = document.getElementById("email").value;
    const message = document.getElementById("message").value;

    // Format mailto link
    const subject = `Contact from ${name}`;
    const body = `Name: ${name}\nEmail: ${email}\n\nMessage:\n${message}`;

    // Open mailto link
    window.location.href = `mailto:shishirpoudel92@gmail.com?subject=${encodeURIComponent(subject)}&body=${encodeURIComponent(body)}`;
}