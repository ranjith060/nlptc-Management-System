<!DOCTYPE html>
<html lang="en">
<head>
    <title>NLPTC Admission System</title>
    <link rel="stylesheet" href="assets/css/main.css">

    <style>
        /* ===== RESET ===== */
        *{
            box-sizing:border-box;
            margin:0;
            padding:0;
            font-family:Arial, Helvetica, sans-serif;
        }

        /* ===== COLLEGE HEADER STRIP ===== */
        .college-header{
            display:flex;
            align-items:center;
            gap:25px;
            background:#ffffff;
            padding:20px 40px;
            border-bottom:3px solid #002b5c;
        }

        .college-logo{
            width:110px;
            height:auto;
        }

        .college-text h1{
            margin:0;
            font-size:28px;
            color:#002b5c;
            font-weight:700;
        }

        .college-text p{
            margin-top:8px;
            font-size:14px;
            color:#1e293b;
            line-height:1.6;
        }

        /* ===== HEADER LOGIN ===== */
        .header-actions{
            margin-left:auto;
        }

        .header-login{
            padding:10px 26px;
            border-radius:25px;
            background:#002b5c;
            color:white;
            font-weight:600;
            text-decoration:none;
            transition:0.3s;
        }

        .header-login:hover{
            background:#004ea2;
        }

        /* ===== HERO SECTION ===== */
        .hero-section{
            background: linear-gradient(120deg,#002b5c,#004ea2);
            color:white;
            padding:80px 20px;
            text-align:center;
        }

        .hero-content{
            max-width:900px;
            margin:auto;
        }

        .hero-content h1{
            font-size:34px;
            margin-bottom:15px;
        }

        .hero-content p{
            font-size:18px;
            line-height:1.6;
            margin-bottom:35px;
        }

        /* ===== HERO BUTTON ===== */
        .hero-buttons{
            display:flex;
            justify-content:center;
            gap:20px;
            flex-wrap:wrap;
        }

        .btn{
            padding:14px 32px;
            border-radius:30px;
            font-size:16px;
            font-weight:600;
            text-decoration:none;
            transition:0.3s;
        }

        .btn.secondary{
            background:transparent;
            color:white;
            border:2px solid white;
        }

        .btn.secondary:hover{
            background:white;
            color:#002b5c;
        }

        /* ===== INFO SECTION ===== */
        .info-section{
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
            gap:25px;
            padding:60px 40px;
            background:#f8fafc;
        }

        .info-box{
            background:white;
            padding:30px;
            border-radius:14px;
            text-align:center;
            box-shadow:0 10px 20px rgba(0,0,0,0.08);
            transition:0.3s;
        }

        .info-box:hover{
            transform:translateY(-5px);
        }

        .info-box h3{
            color:#002b5c;
            margin-bottom:10px;
        }

        /* ===== FOOTER ===== */
        .footer{
            background:#0f172a;
            color:#cbd5f5;
            text-align:center;
            padding:20px;
            font-size:14px;
        }
    </style>
</head>

<body>

<!-- ===== COLLEGE HEADER ===== -->
<div class="college-header">
    <img src="assets/images/logo.png" class="college-logo" alt="College Logo">

    <div class="college-text">
        <h1>NANJIAH LINGAMMAL POLYTECHNIC COLLEGE</h1>
        <p>
            Approved by AICTE, New Delhi and Recognized by Govt of Tamil Nadu<br>
            Sponsored by Tamilnadu Kalvi Kappu Arakkattalai, Chennai – 600017<br>
            Ph: 86681 81886, 99435 67622
        </p>
    </div>

    <!-- LOGIN (TOP RIGHT) -->
    <div class="header-actions">
        <a href="auth/login.php" class="header-login">Login</a>
    </div>
</div>

<!-- ===== HERO ===== -->
<main class="hero-section">
    <div class="hero-content">
        <h1>Welcome to Nanjiah Lingammal Polytechnic College</h1>
        <p>
            An integrated digital platform for online admissions, approvals,
            and academic management designed for students and administrators.
        </p>

        <div class="hero-buttons">
            <a href="admin/admissions/admission_form.php" class="btn secondary">Apply for Admission</a>

        </div>
    </div>
</main>

<!-- ===== INFO ===== -->
<section class="info-section">
    <div class="info-box">
        <h3>Online Admissions</h3>
        <p>Students can apply online with academic and document details.</p>
    </div>

    <div class="info-box">
        <h3>Approval System</h3>
        <p>Admins verify and approve applications securely.</p>
    </div>

    <div class="info-box">
        <h3>Academic Management</h3>
        <p>Centralized student data and admission tracking.</p>
    </div>
</section>

<!-- ===== FOOTER ===== -->
<footer class="footer">
    © 2025 Nanjiah Lingammal Polytechnic College
</footer>

</body>
</html>
