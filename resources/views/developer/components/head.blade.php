<meta charset="utf-8" />
<title>Developer - School Management System</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport" />
<meta content="" name="keywords" />
<meta content="" name="description" />
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Favicon -->
<link href="/img/favicon.ico" rel="icon" />

<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
  rel="stylesheet" />

<!-- Icon Font Stylesheet -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />

<!-- Libraries Stylesheet -->
<link href="/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />
<link href="/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

<!-- Customized Bootstrap Stylesheet -->
<link href="/css/bootstrap.min.css" rel="stylesheet" />

<!-- Template Stylesheet -->
<link href="/css/style.css" rel="stylesheet" />

<style>
  .valid-feedback {
      color: rgb(21, 211, 15) !important;
  }

  .already-given {
      color: #f64c72 !important;
  }

  :root {
      --light: rgb(255, 255, 255) !important;
      --primary: rgb(255, 255, 255);
      --secondary: #2c2c2c !important;
      --dark: linear-gradient(to right, rgb(252, 124, 92), rgb(255, 31, 31));
  }

  .bg-secondary {
      background-color: var(--secondary) !important;
  }

  .text-primary {
      color: var(--primary) !important;
  }

  .btn-primary {
      background-image: linear-gradient(to right, rgb(252, 124, 92), rgb(255, 31, 31)) !important;
  }

  .form-select {
      border-color: var(--light) !important;
  }

  .body {
      background-color: #000000 !important;
  }
  
  .form-control {
      background-color: #030303;
      border-color: var(--light) !important;
  }

  .form-check-input {
      background-color: #000000;
      border-color: var(--light) !important;
  }

  .input-group-text {
    background-color: #eee !important;
    color: #000000;
  }

  .form-select {
    background-color: #000000 !important;
  }
  
</style>