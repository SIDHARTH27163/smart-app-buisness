function validateForm() {
    let isValid = true;

    // Get the form fields
    let memberName = document.getElementById("member_name").value.trim();
    let gmail = document.getElementById("gmail").value.trim();
    let portfolio = document.getElementById("portfolio").value.trim();
    let description = document.getElementById("description").value.trim();
    let image = document.getElementById("image").value.trim();

    // Clear previous error messages
    document.getElementById("memberNameError").innerText = '';
    document.getElementById("gmailError").innerText = '';
    document.getElementById("portfolioError").innerText = '';
    document.getElementById("descriptionError").innerText = '';
    document.getElementById("imageError").innerText = '';

    // Validate member name
    if (memberName === "") {
        document.getElementById("memberNameError").innerText = "Member name is required.";
        isValid = false;
    }

    // Validate email (gmail)
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Simple email regex
    if (gmail === "") {
        document.getElementById("gmailError").innerText = "Gmail is required.";
        isValid = false;
    } else if (!emailPattern.test(gmail)) {
        document.getElementById("gmailError").innerText = "Please enter a valid Gmail address.";
        isValid = false;
    }

    // Validate portfolio URL (optional validation)
    if (portfolio === "") {
        document.getElementById("portfolioError").innerText = "Portfolio URL is required.";
        isValid = false;
    } else {
        // Simple URL validation
        const urlPattern = /^(https?:\/\/)?([\da-z.-]+)\.([a-z.]{2,6})([\/\w .-]*)*\/?$/; // Simple URL regex
        if (!urlPattern.test(portfolio)) {
            document.getElementById("portfolioError").innerText = "Please enter a valid portfolio URL.";
            isValid = false;
        }
    }

    // Validate description (max 200 characters)
    if (description === "") {
        document.getElementById("descriptionError").innerText = "Description is required.";
        isValid = false;
    } else if (description.length > 500) {
        document.getElementById("descriptionError").innerText = "Description cannot exceed 200 characters.";
        isValid = false;
    }

    // Validate image file
    if (image === "") {
        document.getElementById("imageError").innerText = "Please select an image.";
        isValid = false;
    } else {
        // Check allowed file extensions
        let allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
        if (!allowedExtensions.exec(image)) {
            document.getElementById("imageError").innerText = "Only JPG, JPEG, PNG, and GIF files are allowed.";
            isValid = false;
        }
    }

    return isValid; // Submit form only if validation passes
}