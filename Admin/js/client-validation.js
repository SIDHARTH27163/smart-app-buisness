function validateForm() {
    // Clear any previous errors
    document.getElementById('clientNameError').innerText = '';
    document.getElementById('websiteLinkError').innerText = '';
    document.getElementById('logoError').innerText = '';

    let hasError = false; // Track if any error exists

    let clientName = document.getElementById('client_name').value.trim();
    let websiteLink = document.getElementById('website_link').value.trim();
    let logo = document.getElementById('logo').files[0];

    // Check if client name is empty
    if (clientName === '') {
        document.getElementById('clientNameError').innerText = 'Client name cannot be empty.';
        hasError = true;
    }

    // Check if website link is a valid URL
    const urlPattern = new RegExp('^(https?:\\/\\/)?' + // protocol
                                  '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.?)+[a-z]{2,}|'+ // domain name
                                  '((\\d{1,3}\\.){3}\\d{1,3}))' + // OR ip (v4) address
                                  '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*' + // port and path
                                  '(\\?[;&a-z\\d%_.~+=-]*)?' + // query string
                                  '(\\#[-a-z\\d_]*)?$','i'); // fragment locator
    if (!urlPattern.test(websiteLink)) {
        document.getElementById('websiteLinkError').innerText = 'Please enter a valid website link.';
        hasError = true;
    }

    // Validate logo file
    if (!logo) {
        document.getElementById('logoError').innerText = 'Please select a logo to upload.';
        hasError = true;
    } else {
        const allowedFileTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/jpg'];
        const maxSize = 5 * 1024 * 1024; // 5MB

        // Check file type
        if (!allowedFileTypes.includes(logo.type)) {
            document.getElementById('logoError').innerText = 'Only JPG, JPEG, PNG, and GIF files are allowed for logo.';
            hasError = true;
        }

        // Check file size
        if (logo.size > maxSize) {
            document.getElementById('logoError').innerText = 'Logo size should not exceed 5MB.';
            hasError = true;
        }
    }

    // If any error exists, prevent form submission
    return !hasError;
}
