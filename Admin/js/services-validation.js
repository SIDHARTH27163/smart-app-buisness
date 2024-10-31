function validateForm() {
    let isValid = true;

    // Get the form fields
    let serviceName = document.getElementById("service_name").value.trim();
    let serviceDesc = document.getElementById("service_desc").value.trim();
    let image = document.getElementById("image").value.trim();

    // Clear previous error messages
    document.getElementById("serviceNameError").innerText = '';
    document.getElementById("serviceDescError").innerText = '';
    document.getElementById("imageError").innerText = '';

    // Validate service name
    if (serviceName === "") {
        document.getElementById("serviceNameError").innerText = "Service name is required.";
        isValid = false;
    }

    // Validate service description (should be max 70 words)
    let wordCount = serviceDesc.split(/\s+/).filter(word => word.length > 0).length;
    if (serviceDesc === "") {
        document.getElementById("serviceDescError").innerText = "Service description is required.";
        isValid = false;
    } else if (wordCount > 1000) {
        document.getElementById("serviceDescError").innerText = "Service description cannot exceed 70 words.";
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
