<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>TaxTables {{ $title }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

        <!-- Bootstrap & AOS for Animations -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <!-- Include Flatpickr CSS and JS files -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.7.0/vanilla-tilt.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<style>
  #toast {
      position: fixed;
      bottom: 20px;
      right: 20px;
      background-color: #4caf50; /* Default green for success */
      color: white;
      padding: 12px 20px;
      border-radius: 8px;
      box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
      opacity: 0;
      transform: translateX(100px); /* Initially off-screen */
      transition: opacity 0.3s ease, transform 0.3s ease;
  }
  
  .hidden {
      display: none;
  }
</style>

<div id="toast" class="hidden">
    <span></span>
</div>

<script>
function showToast(message, type = 'success') {
    const toast = document.getElementById("toast");
    
    if (!toast) {
        console.error("Toast element not found!");
        return;
    }

    const messageSpan = toast.querySelector("span");
    if (!messageSpan) {
        console.error("Toast message span not found!");
        return;
    }

    // Set the text
    messageSpan.textContent = message;
    toast.classList.remove("hidden");

    // Apply color based on type
    if (type === 'success') {
        toast.style.backgroundColor = "#4caf50"; // Green
    } else {
        toast.style.backgroundColor = "#f44336"; // Red
    }

    // Show toast with animation
    toast.style.opacity = "1";
    toast.style.transform = "translateX(0)";
    if (toast) {
        toast.style.zIndex = "1000"; // Ensure it appears above other elements
        toast.style.position = "fixed"; // Required for z-index to work
    }

    setTimeout(() => {
        toast.style.opacity = "0";
        toast.style.transform = "translateX(100px)";
        setTimeout(() => {
            toast.classList.add("hidden");
        }, 300);
    }, 5000);
}
</script>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>

 <!-- jQuery CDN -->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JS CDN (with Popper.js for modals) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script>
    AOS.init({
        duration: 800, // Animation duration in milliseconds
        once: true // Animation runs once
    });
</script>