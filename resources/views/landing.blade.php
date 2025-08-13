<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pocket Bill - Streamline Invoicing, Get Paid Faster</title>
    <meta name="description" content="Create, manage, and send professional invoices with ease. Pocket Bill helps you get paid faster with professional invoicing tools.">
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --primary-orange: #ff6b35;
            --primary-orange-dark: #e55a2b;
            --dark-green: #1a5f7a;
            --dark-blue: #2c3e50;
            --text-dark: #2d3748;
            --text-light: #718096;
            --white: #ffffff;
            --light-gray: #f7fafc;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
        }
        
        .navbar {
            background: var(--white);
            border-bottom: 1px solid #e2e8f0;
            padding: 1rem 0;
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--text-dark) !important;
            text-decoration: none;
        }
        
        .navbar-brand i {
            color: var(--primary-orange);
            margin-right: 0.5rem;
        }
        
        .nav-link {
            font-weight: 500;
            color: var(--text-dark) !important;
            margin: 0 0.5rem;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .nav-link:hover {
            color: var(--primary-orange) !important;
        }
        
        .btn-primary {
            background: var(--primary-orange);
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-weight: 600;
            color: var(--white);
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
        }
        
        .btn-primary:hover {
            background: var(--primary-orange-dark);
            color: var(--white);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(255, 107, 53, 0.3);
        }
        
        .btn-outline-primary {
            border: 2px solid var(--primary-orange);
            color: var(--primary-orange);
            background: transparent;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
        }
        
        .btn-outline-primary:hover {
            background: var(--primary-orange);
            color: var(--white);
            transform: translateY(-2px);
        }
        
        .btn-white {
            background: var(--white);
            color: var(--primary-orange);
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
        }
        
        .btn-white:hover {
            background: #f8f9fa;
            color: var(--primary-orange);
            transform: translateY(-2px);
        }
        
        .hero-section {
            background: var(--white);
            padding: 80px 0;
            position: relative;
            overflow: hidden;
        }
        
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 50%;
            height: 100%;
            background: linear-gradient(135deg, rgba(255, 107, 53, 0.1) 0%, rgba(26, 95, 122, 0.1) 100%);
            border-radius: 50% 0 0 50%;
            transform: translateX(50%);
        }
        
        .hero-content {
            position: relative;
            z-index: 2;
        }
        
        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            line-height: 1.2;
            color: var(--text-dark);
        }
        
        .hero-subtitle {
            font-size: 1.25rem;
            margin-bottom: 2rem;
            color: var(--text-light);
        }
        
        .hero-buttons {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            margin-bottom: 2rem;
        }
        
        .app-store-badges {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }
        
        .app-badge {
            background: #000;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            text-decoration: none;
            font-size: 0.875rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .app-badge:hover {
            background: #333;
            color: white;
        }
        
        .hero-visual {
            position: relative;
            z-index: 2;
        }
        
        .laptop-mockup {
            background: #f8f9fa;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            position: relative;
        }
        
        .phone-mockup {
            position: absolute;
            top: -20px;
            right: -20px;
            background: #333;
            border-radius: 20px;
            padding: 1rem;
            width: 120px;
            height: 200px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }
        
        .testimonials-section {
            background: var(--white);
            padding: 60px 0;
        }
        
        .rating-box {
            background: var(--light-gray);
            padding: 1.5rem;
            border-radius: 12px;
            text-align: center;
        }
        
        .rating-stars {
            color: #fbbf24;
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
        }
        
        .testimonial-card {
            background: var(--white);
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            border: 1px solid #e2e8f0;
            margin: 0 1rem;
        }
        
        .testimonial-text {
            font-style: italic;
            margin-bottom: 1rem;
            color: var(--text-dark);
        }
        
        .testimonial-author {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .author-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: var(--primary-orange);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
        }
        
        .features-section {
            background: var(--white);
            padding: 80px 0;
        }
        
        .section-title {
            text-align: center;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 3rem;
            color: var(--text-dark);
        }
        
        .feature-block {
            text-align: center;
            padding: 2rem;
        }
        
        .feature-icon {
            width: 80px;
            height: 80px;
            background: var(--white);
            border: 3px solid var(--primary-orange);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            color: var(--primary-orange);
            font-size: 2rem;
        }
        
        .feature-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--text-dark);
        }
        
        .feature-description {
            color: var(--text-light);
            line-height: 1.6;
        }
        
        .showcase-section {
            background: var(--white);
            padding: 80px 0;
        }
        
        .showcase-content {
            display: flex;
            align-items: center;
            gap: 4rem;
        }
        
        .showcase-text {
            flex: 1;
        }
        
        .showcase-image {
            flex: 1;
            text-align: center;
        }
        
        .showcase-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: var(--text-dark);
        }
        
        .showcase-description {
            font-size: 1.1rem;
            color: var(--text-light);
            margin-bottom: 2rem;
            line-height: 1.6;
        }
        
        .showcase-link {
            color: var(--primary-orange);
            text-decoration: none;
            font-weight: 600;
            font-size: 1.1rem;
        }
        
        .showcase-link:hover {
            color: var(--primary-orange-dark);
        }
        
        .placeholder-image {
            background: #e2e8f0;
            border-radius: 12px;
            height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-light);
            font-size: 1.1rem;
        }
        
        .cta-green {
            background: var(--dark-green);
            color: var(--white);
            padding: 80px 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .cta-green::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><circle fill="rgba(255,255,255,0.1)" cx="200" cy="200" r="100"/><circle fill="rgba(255,255,255,0.05)" cx="800" cy="300" r="150"/><circle fill="rgba(255,255,255,0.08)" cx="400" cy="700" r="120"/></svg>');
            background-size: cover;
        }
        
        .cta-green-content {
            position: relative;
            z-index: 2;
        }
        
        .cta-green-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 2rem;
        }
        
        .mobile-section {
            background: var(--white);
            padding: 80px 0;
            text-align: center;
        }
        
        .mobile-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 2rem;
            color: var(--text-dark);
        }
        
        .mobile-description {
            font-size: 1.1rem;
            color: var(--text-light);
            margin-bottom: 3rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .video-placeholder {
            background: #e2e8f0;
            border-radius: 12px;
            height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-light);
            font-size: 1.1rem;
            margin-top: 2rem;
        }
        
        .testimonial-blue {
            background: var(--dark-blue);
            color: var(--white);
            padding: 80px 0;
        }
        
        .quote-icon {
            font-size: 4rem;
            color: rgba(255, 255, 255, 0.3);
            margin-bottom: 2rem;
        }
        
        .testimonial-quote {
            font-size: 1.5rem;
            font-style: italic;
            margin-bottom: 2rem;
            line-height: 1.6;
        }
        
        .star-rating {
            color: #fbbf24;
            font-size: 1.25rem;
            margin-bottom: 1rem;
        }
        
        .cta-orange {
            background: var(--primary-orange);
            color: var(--white);
            padding: 80px 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .cta-orange::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><circle fill="rgba(255,255,255,0.1)" cx="300" cy="300" r="80"/><circle fill="rgba(255,255,255,0.08)" cx="700" cy="200" r="120"/><circle fill="rgba(255,255,255,0.06)" cx="500" cy="600" r="100"/></svg>');
            background-size: cover;
        }
        
        .cta-orange-content {
            position: relative;
            z-index: 2;
        }
        
        .cta-orange-title {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        
        .cta-orange-subtitle {
            font-size: 1.25rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }
        
        .footer {
            background: var(--white);
            padding: 60px 0 30px;
            border-top: 1px solid #e2e8f0;
        }
        
        .footer-brand {
            margin-bottom: 2rem;
        }
        
        .footer-brand h4 {
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 1rem;
        }
        
        .footer-brand i {
            color: var(--primary-orange);
            margin-right: 0.5rem;
        }
        
        .footer-copyright {
            color: var(--text-light);
            margin-bottom: 1rem;
        }
        
        .social-links {
            display: flex;
            gap: 1rem;
        }
        
        .social-links a {
            width: 40px;
            height: 40px;
            background: var(--light-gray);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-dark);
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .social-links a:hover {
            background: var(--primary-orange);
            color: var(--white);
        }
        
        .footer-section h5 {
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 1rem;
        }
        
        .footer-links {
            list-style: none;
        }
        
        .footer-links li {
            margin-bottom: 0.5rem;
        }
        
        .footer-links a {
            color: var(--text-light);
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .footer-links a:hover {
            color: var(--primary-orange);
        }
        
        .footer-contact-btn {
            margin-top: 1rem;
        }
        
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .showcase-content {
                flex-direction: column;
                gap: 2rem;
            }
            
            .hero-buttons {
                align-items: center;
            }
            
            .app-store-badges {
                justify-content: center;
            }
        }
    </style>
</head>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pocket Bill - Streamline Invoicing, Get Paid Faster</title>
    <meta name="description" content="Create, manage, and send professional invoices with ease. Pocket Bill helps you get paid faster with professional invoicing tools.">
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --primary-orange: #ff6b35;
            --primary-orange-dark: #e55a2b;
            --dark-green: #1a5f7a;
            --dark-blue: #2c3e50;
            --text-dark: #2d3748;
            --text-light: #718096;
            --white: #ffffff;
            --light-gray: #f7fafc;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
        }
        
        .navbar {
            background: var(--white);
            border-bottom: 1px solid #e2e8f0;
            padding: 1rem 0;
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--text-dark) !important;
            text-decoration: none;
        }
        
        .navbar-brand i {
            color: var(--primary-orange);
            margin-right: 0.5rem;
        }
        
        .nav-link {
            font-weight: 500;
            color: var(--text-dark) !important;
            margin: 0 0.5rem;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .nav-link:hover {
            color: var(--primary-orange) !important;
        }
        
        .btn-primary {
            background: var(--primary-orange);
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-weight: 600;
            color: var(--white);
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
        }
        
        .btn-primary:hover {
            background: var(--primary-orange-dark);
            color: var(--white);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(255, 107, 53, 0.3);
        }
        
        .btn-outline-primary {
            border: 2px solid var(--primary-orange);
            color: var(--primary-orange);
            background: transparent;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
        }
        
        .btn-outline-primary:hover {
            background: var(--primary-orange);
            color: var(--white);
            transform: translateY(-2px);
        }
        
        .btn-white {
            background: var(--white);
            color: var(--primary-orange);
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
        }
        
        .btn-white:hover {
            background: #f8f9fa;
            color: var(--primary-orange);
            transform: translateY(-2px);
        }
        
        .hero-section {
            background: var(--white);
            padding: 80px 0;
            position: relative;
            overflow: hidden;
        }
        
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 50%;
            height: 100%;
            background: linear-gradient(135deg, rgba(255, 107, 53, 0.1) 0%, rgba(26, 95, 122, 0.1) 100%);
            border-radius: 50% 0 0 50%;
            transform: translateX(50%);
        }
        
        .hero-content {
            position: relative;
            z-index: 2;
        }
        
        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            line-height: 1.2;
            color: var(--text-dark);
        }
        
        .hero-subtitle {
            font-size: 1.25rem;
            margin-bottom: 2rem;
            color: var(--text-light);
        }
        
        .hero-buttons {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            margin-bottom: 2rem;
        }
        
        .app-store-badges {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }
        
        .app-badge {
            background: #000;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            text-decoration: none;
            font-size: 0.875rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .app-badge:hover {
            background: #333;
            color: white;
        }
        
        .hero-visual {
            position: relative;
            z-index: 2;
        }
        
        .laptop-mockup {
            background: #f8f9fa;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            position: relative;
        }
        
        .phone-mockup {
            position: absolute;
            top: -20px;
            right: -20px;
            background: #333;
            border-radius: 20px;
            padding: 1rem;
            width: 120px;
            height: 200px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }
        
        .testimonials-section {
            background: var(--white);
            padding: 60px 0;
        }
        
        .rating-box {
            background: var(--light-gray);
            padding: 1.5rem;
            border-radius: 12px;
            text-align: center;
        }
        
        .rating-stars {
            color: #fbbf24;
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
        }
        
        .testimonial-card {
            background: var(--white);
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            border: 1px solid #e2e8f0;
            margin: 0 1rem;
        }
        
        .testimonial-text {
            font-style: italic;
            margin-bottom: 1rem;
            color: var(--text-dark);
        }
        
        .testimonial-author {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .author-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: var(--primary-orange);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
        }
        
        .features-section {
            background: var(--white);
            padding: 80px 0;
        }
        
        .section-title {
            text-align: center;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 3rem;
            color: var(--text-dark);
        }
        
        .feature-block {
            text-align: center;
            padding: 2rem;
        }
        
        .feature-icon {
            width: 80px;
            height: 80px;
            background: var(--white);
            border: 3px solid var(--primary-orange);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            color: var(--primary-orange);
            font-size: 2rem;
        }
        
        .feature-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--text-dark);
        }
        
        .feature-description {
            color: var(--text-light);
            line-height: 1.6;
        }
        
        .showcase-section {
            background: var(--white);
            padding: 80px 0;
        }
        
        .showcase-content {
            display: flex;
            align-items: center;
            gap: 4rem;
        }
        
        .showcase-text {
            flex: 1;
        }
        
        .showcase-image {
            flex: 1;
            text-align: center;
        }
        
        .showcase-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: var(--text-dark);
        }
        
        .showcase-description {
            font-size: 1.1rem;
            color: var(--text-light);
            margin-bottom: 2rem;
            line-height: 1.6;
        }
        
        .showcase-link {
            color: var(--primary-orange);
            text-decoration: none;
            font-weight: 600;
            font-size: 1.1rem;
        }
        
        .showcase-link:hover {
            color: var(--primary-orange-dark);
        }
        
        .placeholder-image {
            background: #e2e8f0;
            border-radius: 12px;
            height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-light);
            font-size: 1.1rem;
        }
        
        .cta-green {
            background: var(--dark-green);
            color: var(--white);
            padding: 80px 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .cta-green::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><circle fill="rgba(255,255,255,0.1)" cx="200" cy="200" r="100"/><circle fill="rgba(255,255,255,0.05)" cx="800" cy="300" r="150"/><circle fill="rgba(255,255,255,0.08)" cx="400" cy="700" r="120"/></svg>');
            background-size: cover;
        }
        
        .cta-green-content {
            position: relative;
            z-index: 2;
        }
        
        .cta-green-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 2rem;
        }
        
        .mobile-section {
            background: var(--white);
            padding: 80px 0;
            text-align: center;
        }
        
        .mobile-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 2rem;
            color: var(--text-dark);
        }
        
        .mobile-description {
            font-size: 1.1rem;
            color: var(--text-light);
            margin-bottom: 3rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .video-placeholder {
            background: #e2e8f0;
            border-radius: 12px;
            height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-light);
            font-size: 1.1rem;
            margin-top: 2rem;
        }
        
        .testimonial-blue {
            background: var(--dark-blue);
            color: var(--white);
            padding: 80px 0;
        }
        
        .quote-icon {
            font-size: 4rem;
            color: rgba(255, 255, 255, 0.3);
            margin-bottom: 2rem;
        }
        
        .testimonial-quote {
            font-size: 1.5rem;
            font-style: italic;
            margin-bottom: 2rem;
            line-height: 1.6;
        }
        
        .star-rating {
            color: #fbbf24;
            font-size: 1.25rem;
            margin-bottom: 1rem;
        }
        
        .cta-orange {
            background: var(--primary-orange);
            color: var(--white);
            padding: 80px 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .cta-orange::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><circle fill="rgba(255,255,255,0.1)" cx="300" cy="300" r="80"/><circle fill="rgba(255,255,255,0.08)" cx="700" cy="200" r="120"/><circle fill="rgba(255,255,255,0.06)" cx="500" cy="600" r="100"/></svg>');
            background-size: cover;
        }
        
        .cta-orange-content {
            position: relative;
            z-index: 2;
        }
        
        .cta-orange-title {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        
        .cta-orange-subtitle {
            font-size: 1.25rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }
        
        .footer {
            background: var(--white);
            padding: 60px 0 30px;
            border-top: 1px solid #e2e8f0;
        }
        
        .footer-brand {
            margin-bottom: 2rem;
        }
        
        .footer-brand h4 {
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 1rem;
        }
        
        .footer-brand i {
            color: var(--primary-orange);
            margin-right: 0.5rem;
        }
        
        .footer-copyright {
            color: var(--text-light);
            margin-bottom: 1rem;
        }
        
        .social-links {
            display: flex;
            gap: 1rem;
        }
        
        .social-links a {
            width: 40px;
            height: 40px;
            background: var(--light-gray);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-dark);
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .social-links a:hover {
            background: var(--primary-orange);
            color: var(--white);
        }
        
        .footer-section h5 {
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 1rem;
        }
        
        .footer-links {
            list-style: none;
        }
        
        .footer-links li {
            margin-bottom: 0.5rem;
        }
        
        .footer-links a {
            color: var(--text-light);
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .footer-links a:hover {
            color: var(--primary-orange);
        }
        
        .footer-contact-btn {
            margin-top: 1rem;
        }
        
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .showcase-content {
                flex-direction: column;
                gap: 2rem;
            }
            
            .hero-buttons {
                align-items: center;
            }
            
            .app-store-badges {
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-check-square"></i>Pocket Bill
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#features">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#pricing">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#support">Support</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#blog">Blog</a>
                    </li> --}}
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/home') }}">Dashboard</a>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link" href="{{ url('/logout') }}">Logout</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-primary ms-2" href="#" data-bs-toggle="modal" data-bs-target="#registerModal">Sign Up</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 hero-content">
                    <h1 class="hero-title">Streamline Invoicing, Get Paid Faster, & Grow Sales</h1>
                    <p class="hero-subtitle">Create professional invoices in seconds, track payments, and manage your business finances with ease. Pocket Bill helps you get paid faster with our intuitive invoicing platform.</p>
                    <div class="hero-buttons">
                        @auth
                            <a href="{{ url('/home') }}" class="btn btn-primary btn-lg">Create an Invoice Now</a>
                        @else
                            <a href="#" data-bs-toggle="modal" data-bs-target="#registerModal" class="btn btn-primary btn-lg">Create an Invoice Now</a>
                        @endauth
                        <a href="#features" class="btn btn-outline-primary btn-lg">Learn More</a>
                    </div>
                    {{-- <div class="app-store-badges">
                        <a href="#" class="app-badge">
                            <i class="fab fa-apple"></i>
                            Download on the App Store
                        </a>
                        <a href="#" class="app-badge">
                            <i class="fab fa-google-play"></i>
                            Get it on Google Play
                        </a>
                    </div> --}}
                </div>
                <div class="col-lg-6 hero-visual">
                    <div class="laptop-mockup">
                        <div class="placeholder-image">
                            <i class="fas fa-laptop" style="font-size: 3rem; color: var(--primary-orange);"></i>
                        </div>
                        <div class="phone-mockup">
                            <div style="background: var(--white); height: 100%; border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-mobile-alt" style="font-size: 2rem; color: var(--primary-orange);"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    {{-- <section class="testimonials-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <div class="rating-box">
                        <div class="rating-stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <div style="font-weight: 600; margin-bottom: 0.5rem;">Top rated</div>
                        <div style="color: var(--text-light);">4.8/5</div>
                        <div style="color: var(--text-light); font-size: 0.875rem;">200k+ reviews</div>
                        <div style="margin-top: 1rem;">
                            <i class="fab fa-apple" style="margin-right: 0.5rem;"></i>
                            <i class="fab fa-google-play"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="testimonial-card">
                                <div class="testimonial-text">"Pocket Bill has completely transformed how I handle invoicing. It's so easy to use and my clients love the professional look."</div>
                                <div class="testimonial-author">
                                    <div class="author-avatar">S</div>
                                    <div>
                                        <div style="font-weight: 600;">Sarah Johnson</div>
                                        <div style="color: var(--text-light); font-size: 0.875rem;">Freelance Designer</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="testimonial-card">
                                <div class="testimonial-text">"The mobile app is fantastic! I can create and send invoices from anywhere. It's saved me so much time."</div>
                                <div class="testimonial-author">
                                    <div class="author-avatar">M</div>
                                    <div>
                                        <div style="font-weight: 600;">Mike Chen</div>
                                        <div style="color: var(--text-light); font-size: 0.875rem;">Contractor</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="testimonial-card">
                                <div class="testimonial-text">"Finally, an invoicing solution that actually gets me paid faster. The payment tracking is incredible."</div>
                                <div class="testimonial-author">
                                    <div class="author-avatar">E</div>
                                    <div>
                                        <div style="font-weight: 600;">Emma Davis</div>
                                        <div style="color: var(--text-light); font-size: 0.875rem;">Consultant</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- Features Section -->
    <section id="features" class="features-section">
        <div class="container">
            <h2 class="section-title">The Easiest Invoicing Software You'll Ever Use</h2>
            <div class="row">
                <div class="col-lg-4">
                    <div class="feature-block">
                        <div class="feature-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <h3 class="feature-title">Save Time</h3>
                        <p class="feature-description">Create professional invoices in seconds with our intuitive interface and customizable templates.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="feature-block">
                        <div class="feature-icon">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                        <h3 class="feature-title">Get Paid</h3>
                        <p class="feature-description">Track payments, send reminders, and get paid faster with our automated payment system.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="feature-block">
                        <div class="feature-icon">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <h3 class="feature-title">Look Professional</h3>
                        <p class="feature-description">Impress your clients with beautiful, branded invoices that reflect your business quality.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Showcase Sections -->
    {{-- <section class="showcase-section">
        <div class="container">
            <div class="showcase-content">
                <div class="showcase-text">
                    <h3 class="showcase-title">Professional Invoice Templates</h3>
                    <p class="showcase-description">Choose from dozens of professionally designed templates that you can customize with your brand colors, logo, and business information. Every template is optimized for readability and looks great on any device.</p>
                    <a href="#" class="showcase-link">Learn more about templates →</a>
                </div>
                <div class="showcase-image">
                    <div class="placeholder-image">
                        <i class="fas fa-user-tie" style="font-size: 3rem; color: var(--primary-orange);"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="showcase-section">
        <div class="container">
            <div class="showcase-content">
                <div class="showcase-image">
                    <div class="placeholder-image">
                        <i class="fas fa-mobile-alt" style="font-size: 3rem; color: var(--primary-orange);"></i>
                    </div>
                </div>
                <div class="showcase-text">
                    <h3 class="showcase-title">Online Invoice Generator</h3>
                    <p class="showcase-description">Create invoices on the go with our mobile app. Add line items, calculate totals, and send invoices instantly. Perfect for contractors, freelancers, and small business owners who work from multiple locations.</p>
                    <a href="#" class="showcase-link">Try the invoice generator →</a>
                </div>
            </div>
        </div>
    </section>

    <section class="showcase-section">
        <div class="container">
            <div class="showcase-content">
                <div class="showcase-text">
                    <h3 class="showcase-title">Easy to Use Invoice Templates</h3>
                    <p class="showcase-description">No design skills required. Our drag-and-drop editor makes it easy to customize your invoices. Add your logo, change colors, and adjust layouts with just a few clicks.</p>
                    <a href="#" class="showcase-link">Explore templates →</a>
                </div>
                <div class="showcase-image">
                    <div class="placeholder-image">
                        <i class="fas fa-tools" style="font-size: 3rem; color: var(--primary-orange);"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="showcase-section">
        <div class="container">
            <div class="showcase-content">
                <div class="showcase-image">
                    <div class="placeholder-image">
                        <i class="fas fa-receipt" style="font-size: 3rem; color: var(--primary-orange);"></i>
                    </div>
                </div>
                <div class="showcase-text">
                    <h3 class="showcase-title">Online Receipt Maker</h3>
                    <p class="showcase-description">Generate professional receipts for your customers instantly. Include all necessary details and maintain a complete record of all transactions for your business.</p>
                    <a href="#" class="showcase-link">Create receipts →</a>
                </div>
            </div>
        </div>
    </section>

    <section class="showcase-section">
        <div class="container">
            <div class="showcase-content">
                <div class="showcase-text">
                    <h3 class="showcase-title">Business Expense Tracker</h3>
                    <p class="showcase-description">Keep track of all your business expenses in one place. Categorize expenses, attach receipts, and generate reports for tax time. Perfect for small business owners and freelancers.</p>
                    <a href="#" class="showcase-link">Track expenses →</a>
                </div>
                <div class="showcase-image">
                    <div class="placeholder-image">
                        <i class="fas fa-chart-pie" style="font-size: 3rem; color: var(--primary-orange);"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="showcase-section">
        <div class="container">
            <div class="showcase-content">
                <div class="showcase-image">
                    <div class="placeholder-image">
                        <i class="fas fa-credit-card" style="font-size: 3rem; color: var(--primary-orange);"></i>
                    </div>
                </div>
                <div class="showcase-text">
                    <h3 class="showcase-title">Flexible Ways To Get Paid</h3>
                    <p class="showcase-description">Accept payments online through credit cards, bank transfers, or digital wallets. Set up recurring payments and automatic reminders to ensure you get paid on time.</p>
                    <a href="#" class="showcase-link">Set up payments →</a>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- CTA Green Section -->
    {{-- <section class="cta-green">
        <div class="container">
            <div class="cta-green-content">
                <h2 class="cta-green-title">See Why 500,000+ Small Business Owners Love Pocket Bill's App</h2>
                <a href="#" class="btn btn-white btn-lg">Download the App</a>
            </div>
        </div>
    </section> --}}

    <!-- Mobile Section -->
    {{-- <section class="mobile-section">
        <div class="container">
            <h2 class="mobile-title">Pocket Bill On The Go</h2>
            <div class="app-store-badges justify-content-center">
                <a href="#" class="app-badge">
                    <i class="fab fa-apple"></i>
                    Download on the App Store
                </a>
                <a href="#" class="app-badge">
                    <i class="fab fa-google-play"></i>
                    Get it on Google Play
                </a>
            </div>
            <p class="mobile-description">Take your invoicing with you wherever you go. Create, send, and track invoices from your smartphone or tablet with our powerful mobile app.</p>
            <div class="video-placeholder">
                <i class="fas fa-play-circle" style="font-size: 3rem; color: var(--primary-orange);"></i>
                <span style="margin-left: 1rem;">Watch Demo Video</span>
            </div>
        </div>
    </section> --}}

    <!-- Testimonial Blue Section -->
    {{-- <section class="testimonial-blue">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-2">
                    <div class="quote-icon">
                        <i class="fas fa-quote-left"></i>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="testimonial-quote">"Pocket Bill has been a game-changer for my business. I can create professional invoices in minutes, track payments, and manage my cash flow like never before. The mobile app is incredible - I can handle everything from my phone."</div>
                    <div class="star-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <div style="font-weight: 600; font-size: 1.1rem;">Jason</div>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- CTA Orange Section -->
    <section class="cta-orange">
        <div class="container">
            <div class="cta-orange-content">
                <h2 class="cta-orange-title">Get Started for Free</h2>
                <p class="cta-orange-subtitle">No credit card required. Cancel anytime.</p>
                @auth
                    <a href="{{ url('/home') }}" class="btn btn-white btn-lg">Create Your First Invoice</a>
                @else
                    <a href="#" data-bs-toggle="modal" data-bs-target="#registerModal" class="btn btn-white btn-lg">Create Your First Invoice</a>
                @endauth
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="footer-brand">
                        <h4><i class="fas fa-check-square"></i>Pocket Bill</h4>
                        <p class="footer-copyright">&copy; 2024 Pocket Bill. All rights reserved.</p>
                        {{-- <div class="social-links">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div> --}}
                    </div>
                </div>
                
                {{-- <div class="col-lg-2 col-md-6">
                    <h5>Product</h5>
                    <ul class="footer-links">
                        <li><a href="#features">Features</a></li>
                        <li><a href="#pricing">Pricing</a></li>
                        <li><a href="#">Templates</a></li>
                        <li><a href="#">API</a></li>
                        <li><a href="#">Mobile App</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-2 col-md-6">
                    <h5>Resources</h5>
                    <ul class="footer-links">
                        <li><a href="#">Help Center</a></li>
                        <li><a href="#">Documentation</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Video Tutorials</a></li>
                        <li><a href="#">Community</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-2 col-md-6">
                    <h5>Company</h5>
                    <ul class="footer-links">
                        <li><a href="#">About</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Press</a></li>
                        <li><a href="#">Partners</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div> --}}

                <div class="col-lg-3 col-md-6">
                    
                    <div class="footer-contact-btn">
                        <a href="#" class="btn btn-primary">Contact Us</a>
                    </div>
                </div>

                
                <div class="col-lg-3 col-md-6 text-end">
                    <h5>Get Started</h5>
                    <ul class="footer-links">
                        <li><a href="{{ route('register') }}">Sign Up</a></li>
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="#">Free Trial</a></li>
                        <li><a href="#">Demo</a></li>
                        <li><a href="#">Pricing</a></li>
                    </ul>
                    {{-- <div class="footer-contact-btn">
                        <a href="#" class="btn btn-primary">Contact Us</a>
                    </div> --}}
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Auth Modals -->
    @include('auth.login-modal')
    @include('auth.register-modal')
    
    <!-- Smooth Scrolling -->
    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>
</html> 