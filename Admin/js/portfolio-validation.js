function validateForm() {
    let isValid = true;

    // Clear previous error messages
    document.getElementById('projectnameError').innerText = '';
    document.getElementById('categoryError').innerText = '';
    document.getElementById('descriptionError').innerText = '';
    document.getElementById('imageError').innerText = '';
    document.getElementById('galleryError').innerText = '';

    // Project Name validation
    const projectName = document.getElementById('project_name').value.trim();
    if (!projectName) {
        document.getElementById('projectnameError').innerText = 'Project name is required.';
        isValid = false;
    }

    // Category validation
    const category = document.getElementById('category').value.trim();
    if (!category) {
        document.getElementById('categoryError').innerText = 'Category is required.';
        isValid = false;
    }

    // Description validation
    const description = document.getElementById('description').value.trim();
    if (!description) {
        document.getElementById('descriptionError').innerText = 'Description is required.';
        isValid = false;
    }

    // Main Image validation
    const imageInput = document.getElementById('image');
    const allowedImageTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
    if (imageInput.files.length === 0) {
        document.getElementById('imageError').innerText = 'Please upload a main image.';
        isValid = false;
    } else {
        const imageFile = imageInput.files[0];
        if (!allowedImageTypes.includes(imageFile.type)) {
            document.getElementById('imageError').innerText = 'Only JPG, JPEG, PNG, and GIF files are allowed.';
            isValid = false;
        } else if (imageFile.size > 5 * 1024 * 1024) { // 5MB limit
            document.getElementById('imageError').innerText = 'File size should be less than 5MB.';
            isValid = false;
        }
    }

    // Gallery Images validation
    const galleryInput = document.getElementById('gallery_images');
    if (galleryInput.files.length === 0) {
        document.getElementById('galleryError').innerText = 'Please upload at least one gallery image.';
        isValid = false;
    } else {
        for (let i = 0; i < galleryInput.files.length; i++) {
            const galleryFile = galleryInput.files[i];
            if (!allowedImageTypes.includes(galleryFile.type)) {
                document.getElementById('galleryError').innerText = 'Only JPG, JPEG, PNG, and GIF files are allowed.';
                isValid = false;
                break;
            } else if (galleryFile.size > 5 * 1024 * 1024) { // 5MB limit for each gallery image
                document.getElementById('galleryError').innerText = 'Each file size should be less than 5MB.';
                isValid = false;
                break;
            }
        }
    }

    return isValid;
}