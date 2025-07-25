@extends('layouts.app')

@section('title', 'تفاصيل الشركة')

@section('content')
<!-- <style>
    :root {
        --primary-color: #1E3A8A; /* Deep Blue */
        --secondary-color: #3B82F6; /* Bright Blue */
        --accent-color: #F43F5E; /* Vibrant Red */
        --light-color: #F8FAFC; /* Light Gray */
        --dark-color: #0F172A; /* Dark Slate */
        --text-color: #1F2937; /* Dark Gray */
        --text-light: #6B7280; /* Muted Gray */
        --border-radius-lg: 12px;
        --border-radius-sm: 6px;
        --box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
        --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* Global Styles */
    body {
        font-family: 'Cairo', sans-serif;
        background-color: var(--light-color);
        color: var(--text-color);
        line-height: 1.8;
        margin: 0;
        overflow-x: hidden;
    }

    .container-fluid {
        max-width: 1440px;
        margin: 0 auto;
        padding: 0 1.5rem;
    }

    /* Animations */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes float {
        0% { transform: translateY(0); }
        50% { transform: translateY(-12px); }
        100% { transform: translateY(0); }
    }

    @keyframes scaleIn {
        from { transform: scale(0.95); opacity: 0; }
        to { transform: scale(1); opacity: 1; }
    }

    /* Company Container */
    .company-container {
        background: white;
        border-radius: var(--border-radius-lg);
        box-shadow: var(--box-shadow);
        margin: 3rem auto;
        overflow: hidden;
        animation: fadeIn 0.8s ease-out;
    }

    /* Header Section */
    .company-header {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        color: white;
        padding: 5rem 2rem;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .company-header::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 100%;
        height: 100%;
        background: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23ffffff' fill-opacity='0.08' fill-rule='evenodd'/%3E%3C/svg%3E");
        opacity: 0.3;
    }

    .company-title {
        font-size: 2.8rem;
        font-weight: 800;
        margin-bottom: 1rem;
        position: relative;
        display: inline-block;
        text-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
    }

    .company-title::after {
        content: '';
        position: absolute;
        bottom: -10px;
        right: 50%;
        transform: translateX(50%);
        width: 120px;
        height: 5px;
        background: linear-gradient(to left, var(--accent-color), transparent);
        border-radius: 3px;
    }

    .company-subtitle {
        font-size: 1.2rem;
        font-weight: 400;
        opacity: 0.85;
        max-width: 800px;
        margin: 0 auto;
        line-height: 1.6;
    }

    .company-logo {
        width: 150px;
        height: 150px;
        object-fit: contain;
        background: white;
        padding: 15px;
        border-radius: 50%;
        border: 5px solid var(--light-color);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
        position: absolute;
        bottom: -75px;
        right: 50%;
        transform: translateX(50%);
        z-index: 10;
        animation: float 5s ease-in-out infinite;
        transition: var(--transition);
    }

    .company-logo:hover {
        transform: translateX(50%) scale(1.05);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
    }

    /* Content Section */
    .company-content {
        padding: 7rem 3rem 4rem;
        position: relative;
    }

    /* Carousel */
    .company-carousel {
        border-radius: var(--border-radius-lg);
        overflow: hidden;
        margin-bottom: 4rem;
        box-shadow: var(--box-shadow);
        position: relative;
        background: var(--light-color);
    }

    .company-img {
        height: 600px;
        object-fit: cover;
        width: 100%;
        transition: transform 0.6s ease, filter 0.4s ease;
    }

    .carousel-item:hover .company-img {
        transform: scale(1.05);
        filter: brightness(1.1);
    }

    .carousel-indicators {
        bottom: 25px;
        margin-bottom: 0;
    }

    .carousel-indicators button {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        margin: 0 8px;
        border: 2px solid white;
        background: transparent;
        opacity: 0.8;
        transition: var(--transition);
    }

    .carousel-indicators button.active {
        background: var(--accent-color);
        border-color: var(--accent-color);
        transform: scale(1.3);
    }

    .carousel-control-prev,
    .carousel-control-next {
        width: 70px;
        height: 70px;
        top: 50%;
        transform: translateY(-50%);
        border-radius: 50%;
        background: rgba(0, 0, 0, 0.4);
        opacity: 0;
        transition: var(--transition);
    }

    .company-carousel:hover .carousel-control-prev,
    .company-carousel:hover .carousel-control-next {
        opacity: 1;
    }

    .carousel-control-prev {
        right: 20px;
    }

    .carousel-control-next {
        left: 20px;
    }

    .carousel-control-prev:hover,
    .carousel-control-next:hover {
        background: rgba(0, 0, 0, 0.7);
        transform: translateY(-50%) scale(1.1);
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        background-size: 2rem;
    }

    /* Company Details */
    .company-details {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        margin-bottom: 5rem;
    }

    .detail-card {
        background: white;
        border-radius: var(--border-radius-lg);
        padding: 2rem;
        box-shadow: var(--box-shadow);
        transition: var(--transition);
        border-right: 4px solid var(--secondary-color);
        position: relative;
        overflow: hidden;
    }

    .detail-card::before {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(59, 130, 246, 0.05), transparent);
        transition: var(--transition);
    }

    .detail-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 32px rgba(0, 0, 0, 0.12);
    }

    .detail-card:hover::before {
        background: linear-gradient(135deg, rgba(59, 130, 246, 0.1), transparent);
    }

    .detail-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--primary-color);
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        position: relative;
        padding-bottom: 1rem;
    }

    .detail-title i {
        margin-left: 1rem;
        color: var(--accent-color);
        font-size: 1.7rem;
        transition: var(--transition);
    }

    .detail-card:hover .detail-title i {
        transform: rotate(10deg);
    }

    .detail-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        right: 0;
        width: 50px;
        height: 3px;
        background: var(--accent-color);
        transition: width 0.4s ease;
    }

    .detail-card:hover .detail-title::after {
        width: 80px;
    }

    .detail-card p {
        margin: 0.5rem 0;
        color: var(--text-light);
        font-size: 1rem;
    }

    .detail-card a {
        color: var(--secondary-color);
        text-decoration: none;
        transition: var(--transition);
    }

    .detail-card a:hover {
        color: var(--accent-color);
        text-decoration: underline;
    }

    /* Section Titles */
    .section-title {
        font-size: 2.2rem;
        font-weight: 700;
        color: var(--primary-color);
        margin: 4rem 0 2rem;
        position: relative;
        padding-right: 2.5rem;
        display: inline-block;
    }

    .section-title::after {
        content: '';
        position: absolute;
        right: 0;
        top: 50%;
        transform: translateY(-50%);
        width: 8px;
        height: 50px;
        background: var(--accent-color);
        border-radius: 4px;
        transition: var(--transition);
    }

    .section-title:hover::after {
        height: 60px;
    }

    /* Badges */
    .badge {
        background: var(--secondary-color);
        color: white;
        padding: 0.6rem 1.3rem;
        border-radius: 50px;
        font-weight: 600;
        margin: 0 0.7rem 0.7rem 0;
        display: inline-flex;
        align-items: center;
        transition: var(--transition);
        font-size: 0.95rem;
    }

    .badge i {
        margin-left: 0.6rem;
        font-size: 0.9rem;
    }

    .badge:hover {
        background: var(--accent-color);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    /* Projects Grid */
    .projects-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(360px, 1fr));
        gap: 2rem;
        margin-bottom: 4rem;
    }

    .project-card {
        border-radius: var(--border-radius-lg);
        overflow: hidden;
        box-shadow: var(--box-shadow);
        transition: var(--transition);
        background: white;
        position: relative;
    }

    .project-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 16px 36px rgba(0, 0, 0, 0.12);
    }

    .project-img {
        height: 300px;
        object-fit: cover;
        width: 100%;
        transition: transform 0.6s ease, filter 0.4s ease;
    }

    .project-card:hover .project-img {
        transform: scale(1.08);
        filter: brightness(1.05);
    }

    .project-body {
        padding: 2rem;
        position: relative;
        z-index: 1;
    }

    .project-title {
        font-size: 1.6rem;
        font-weight: 700;
        margin-bottom: 1rem;
        color: var(--primary-color);
        transition: var(--transition);
    }

    .project-card:hover .project-title {
        color: var(--accent-color);
    }

    .project-description {
        color: var(--text-light);
        margin-bottom: 1.5rem;
        font-size: 1rem;
    }

    /* Certifications */
    .certification-list {
        list-style: none;
        padding: 0;
        margin-bottom: 4rem;
    }

    .certification-item {
        background: white;
        border-radius: var(--border-radius-lg);
        padding: 1.8rem;
        margin-bottom: 1.5rem;
        box-shadow: var(--box-shadow);
        border-right: 5px solid var(--accent-color);
        transition: var(--transition);
        display: flex;
        align-items: center;
        gap: 1.5rem;
    }

    .certification-item:hover {
        transform: translateX(8px);
        box-shadow: 0 12px 28px rgba(0, 0, 0, 0.1);
    }

    .certification-icon {
        font-size: 2.2rem;
        color: var(--accent-color);
        flex-shrink: 0;
    }

    .certification-name {
        font-weight: 700;
        margin-bottom: 0.4rem;
        color: var(--primary-color);
        font-size: 1.2rem;
    }

    .certification-details {
        color: var(--text-light);
        font-size: 0.95rem;
    }

    /* Team Section */
    .team-list {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 2rem;
        margin-bottom: 4rem;
    }

    .team-member {
        background: white;
        border-radius: var(--border-radius-lg);
        padding: 1.8rem;
        box-shadow: var(--box-shadow);
        transition: var(--transition);
        display: flex;
        align-items: center;
        gap: 1.5rem;
    }

    .team-member:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 28px rgba(0, 0, 0, 0.1);
    }

    .team-avatar {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid var(--light-color);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        transition: var(--transition);
    }

    .team-member:hover .team-avatar {
        transform: scale(1.08);
        border-color: var(--accent-color);
    }

    .team-info h5 {
        font-weight: 700;
        margin-bottom: 0.4rem;
        color: var(--primary-color);
        font-size: 1.2rem;
    }

    .team-info p {
        color: var(--text-light);
        font-size: 0.95rem;
    }

    /* Action Buttons */
    .action-buttons {
        display: flex;
        justify-content: space-between;
        gap: 1.5rem;
        margin-top: 4rem;
        flex-wrap: wrap;
    }

    .btn-primary {
        background: var(--accent-color);
        border: none;
        padding: 1rem 2.5rem;
        border-radius: 50px;
        font-weight: 600;
        color: white;
        transition: var(--transition);
        display: inline-flex;
        align-items: center;
        font-size: 1.1rem;
    }

    .btn-primary:hover {
        background: #e11d48;
        transform: translateY(-4px);
        box-shadow: 0 8px 24px rgba(244, 63, 94, 0.3);
    }

    .btn-outline-primary {
        border: 2px solid var(--accent-color);
        color: var(--accent-color);
        padding: 1rem 2.5rem;
        border-radius: 50px;
        font-weight: 600;
        transition: var(--transition);
        display: inline-flex;
        align-items: center;
        font-size: 1.1rem;
    }

    .btn-outline-primary:hover {
        background: var(--accent-color);
        color: white;
        transform: translateY(-4px);
        box-shadow: 0 8px 24px rgba(244, 63, 94, 0.3);
    }

    .btn i {
        margin-left: 0.7rem;
        font-size: 1.2rem;
    }

    /* Empty States */
    .empty-state {
        text-align: center;
        padding: 3rem;
        background: white;
        border-radius: var(--border-radius-lg);
        box-shadow: var(--box-shadow);
        margin-bottom: 3rem;
    }

    .empty-state i {
        font-size: 3.5rem;
        color: var(--text-light);
        margin-bottom: 1.5rem;
        opacity: 0.6;
    }

    .empty-state h4 {
        color: var(--primary-color);
        margin-bottom: 0.8rem;
        font-size: 1.4rem;
    }

    .empty-state p {
        color: var(--text-light);
        font-size: 1rem;
        max-width: 400px;
        margin: 0 auto;
    }

    /* Responsive Design */
    @media (max-width: 1200px) {
        .company-img {
            height: 500px;
        }

        .projects-grid {
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        }
    }

    @media (max-width: 992px) {
        .company-header {
            padding: 4rem 1.5rem;
        }

        .company-title {
            font-size: 2.4rem;
        }

        .company-logo {
            width: 130px;
            height: 130px;
            bottom: -65px;
        }

        .company-content {
            padding: 6rem 2rem 3rem;
        }

        .company-img {
            height: 450px;
        }

        .section-title {
            font-size: 2rem;
        }
    }

    @media (max-width: 768px) {
        .company-header {
            padding: 3rem 1rem;
        }

        .company-title {
            font-size: 2rem;
        }

        .company-subtitle {
            font-size: 1.1rem;
        }

        .company-logo {
            width: 110px;
            height: 110px;
            bottom: -55px;
        }

        .company-content {
            padding: 5rem 1.5rem 2.5rem;
        }

        .company-img {
            height: 400px;
        }

        .company-details {
            grid-template-columns: 1fr;
        }

        .projects-grid {
            grid-template-columns: 1fr;
        }

        .team-member {
            flex-direction: column;
            text-align: center;
            gap: 1rem;
        }

        .team-avatar {
            margin-left: 0;
            margin-bottom: 1rem;
        }

        .action-buttons {
            flex-direction: column;
        }

        .action-buttons .btn {
            width: 100%;
        }
    }

    @media (max-width: 576px) {
        .company-title {
            font-size: 1.8rem;
        }

        .company-img {
            height: 350px;
        }

        .section-title {
            font-size: 1.8rem;
            padding-right: 2rem;
        }

        .section-title::after {
            height: 40px;
        }

        .detail-title {
            font-size: 1.4rem;
        }

        .empty-state {
            padding: 2.5rem 1rem;
        }
    }
</style> -->
<style>
    /* تحسين استجابة الصفحة وجمالها، بدون تغيير أي متغير أو إضافة عناصر */

/* كارت الشركة الرئيسي */
.company-container {
    background: #fff;
    border-radius: 18px;
    box-shadow: 0 6px 32px 0 rgba(30,58,138,0.08), 0 1.5px 7px 0 #f43f5e11;
    margin: 2.5rem auto;
    overflow: hidden;
    animation: fadeIn 0.8s;
    border: 1px solid #f1f5f9;
}

/* الهيدر */
.company-header {
    background: linear-gradient(120deg, #1e3a8a 55%, #f43f5e);
    color: #fff;
    padding: 3.5rem 1rem 4.5rem;
    text-align: center;
    position: relative;
    border-radius: 0 0 50px 50px;
    box-shadow: 0 6px 18px #1e3a8a13;
}
.company-title {
    font-size: 2.35rem;
    font-weight: 900;
    letter-spacing: 1.2px;
    text-shadow: 0 2px 8px #0002;
}
.company-subtitle {
    font-size: 1.18rem;
    opacity: .96;
    max-width: 600px;
    margin: 0 auto;
    margin-top: .5rem;
    color: #f1f5f9;
}

@media (max-width: 768px){
    .company-header { padding: 1.2rem 0.4rem 2.2rem; border-radius: 0 0 24px 24px;}
    .company-title { font-size: 1.25rem; }
    .company-subtitle { font-size: 1rem; }
}

/* الكاروسيل */
.company-carousel {
    border-radius: 18px;
    box-shadow: 0 2px 22px #1e3a8a15;
    margin: -3.2rem auto 2.2rem;
    background: #fff;
    overflow: hidden;
    max-width: 900px;
}
.company-img {
    width: 100%;
    height: 370px;
    object-fit: cover;
    border-radius: 18px;
    transition: transform .5s, filter .3s;
}
.carousel-item:hover .company-img { transform: scale(1.03); filter: brightness(1.07);}
.carousel-indicators button {
    width:10px; height:10px; border-radius:50%;
    background:#3b82f6; opacity:.38; border:none; margin:0 4px;
    transition: all .32s;
}
.carousel-indicators .active {
    opacity: 1; background: #f43f5e; transform: scale(1.13);
}
.carousel-control-prev, .carousel-control-next {
    width:38px; height:38px; top:50%; border-radius:50%;
    background:rgba(30,58,138,.12); opacity:.85;
    transition:all .23s;
}
.carousel-control-prev:hover, .carousel-control-next:hover { background: #f43f5e; color: #fff;}

@media (max-width: 768px) {
    .company-img { height: 145px; }
    .company-carousel { margin: -1.9rem auto 1.2rem; }
}

/* تفاصيل الشركة */
.company-content { padding: 2.5rem 1rem 1.2rem; max-width:1200px; margin:auto;}
.company-details {
    display: grid; grid-template-columns: repeat(auto-fit, minmax(240px,1fr));
    gap: 1.1rem;
    margin-bottom: 1.8rem;
}
.detail-card {
    background: #fff;
    border-radius: 17px;
    box-shadow: 0 2px 18px #1e3a8a0c;
    padding: 1.2rem 1.1rem;
    transition: all .27s;
    border-right: 4px solid #3b82f6;
    min-height: 135px;
    overflow: hidden;
    position: relative;
}
.detail-title {
    font-weight: 700;
    color: #1e3a8a;
    font-size: 1.11rem;
    margin-bottom: 0.9rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}
.detail-title i { color: #f43f5e; font-size: 1.3rem; }
.detail-card:hover { box-shadow: 0 8px 36px #f43f5e24; transform:translateY(-4px);}
.detail-card:hover .detail-title i { color: #3b82f6; }
.detail-card p, .detail-card a {
    color: #64748b;
    font-size: 0.96rem;
    margin-bottom: 0.2rem;
}
.detail-card a { text-decoration: underline dotted; }
.detail-card a:hover { color: #f43f5e; }

@media (max-width: 768px) {
    .company-content { padding: 1.3rem 0.3rem 0.7rem; }
    .company-details { gap: 0.6rem; }
    .detail-title { font-size: 1rem; }
    .detail-card { padding: 0.8rem 0.6rem; min-height: 90px;}
}

/* العناوين الفرعية */
.section-title {
    font-size: 1.25rem;
    font-weight: 800;
    color: #1e3a8a;
    margin: 2rem 0 1rem;
    display: block;
    position: relative;
}
.section-title::after {
    content: '';
    display: inline-block;
    width: 32px;
    height: 4px;
    margin-right: 8px;
    border-radius: 6px;
    background: linear-gradient(90deg, #f43f5e, transparent 90%);
    vertical-align: middle;
}

/* بادجات الخدمات */
.badge {
    background: linear-gradient(90deg, #3b82f6 55%, #f43f5e);
    color: #fff;
    padding: 0.5rem 1.1rem;
    margin: 0 0.45rem 0.6rem 0;
    border-radius: 22px;
    font-size: 0.97rem;
    font-weight: 600;
    display: inline-flex; align-items: center;
    box-shadow: 0 1px 6px #2563eb09;
    transition: all .21s;
}
.badge i { margin-left: 0.38rem; font-size: 1rem;}
.badge:hover { background:#f43f5e; transform: scale(1.07); }

/* المشاريع */
.projects-grid {
    display: grid; gap: 1.1rem;
    grid-template-columns: repeat(auto-fill,minmax(260px,1fr));
    margin-bottom: 2.2rem;
}
.project-card {
    border-radius: 16px;
    box-shadow: 0 2px 10px #f43f5e0a, 0 2px 8px #1e3a8a09;
    background: #fff;
    transition: all .23s;
    overflow: hidden;
    min-height: 120px;
    display: flex; flex-direction: column;
}
.project-img {
    height: 100px; width: 100%; object-fit: cover;
    border-radius: 16px 16px 0 0;
    transition: transform .4s, filter .21s;
}
.project-card:hover { box-shadow: 0 10px 30px #f43f5e15; transform:translateY(-4px);}
.project-card:hover .project-img { filter:brightness(1.09); transform:scale(1.04);}
.project-body { padding: 0.8rem 1rem;}
.project-title { font-size: 1.03rem; font-weight: 700; color: #1e3a8a;}
.project-description { color: #64748b; font-size: 0.98rem; }

@media (max-width: 768px) {
    .projects-grid { grid-template-columns:1fr; }
    .project-img { height: 65px; }
}

/* الشهادات والفريق */
.certification-list, .team-list {
    list-style: none;
    padding: 0;
    margin-bottom: 2rem;
    display: grid; gap: 0.9rem;
}
.certification-item, .team-member {
    background: #fff;
    border-radius: 17px;
    padding: 1.1rem;
    box-shadow: 0 2px 10px #3b82f609;
    display: flex; align-items: center; gap: 1.1rem;
    transition: all .18s;
    min-height: 60px;
}
.certification-item:hover, .team-member:hover { transform:translateX(4px); box-shadow: 0 8px 26px #f43f5e11;}
.certification-icon, .team-avatar {
    font-size: 1.7rem; color: #f43f5e; flex-shrink: 0;
}
.team-avatar {
    width: 38px; height: 38px; border-radius:50%; object-fit:cover;
    border: 2px solid #eee;
}
.certification-name { font-weight: 700; color: #1e3a8a; font-size: 1.05rem;}
@media(max-width: 576px) {
    .certification-item, .team-member { padding: 0.7rem; flex-direction: column; gap: 0.5rem;}
    .team-avatar { width: 28px; height: 28px;}
}

/* الأزرار */
.action-buttons { display: flex; gap: 1.2rem; margin-top: 2rem; flex-wrap: wrap;}
.btn-primary, .btn-outline-primary {
    border-radius: 38px;
    font-weight: 700;
    font-size: 1.01rem;
    padding: 0.7rem 1.65rem;
    box-shadow: 0 2px 8px #2563eb12;
    transition: all .22s;
}
.btn-primary {
    background: linear-gradient(90deg, #f43f5e 55%, #3b82f6);
    border: none; color: #fff;
}
.btn-primary:hover { background: #1e3a8a; color:#fff; transform: translateY(-2px);}
.btn-outline-primary {
    border: 2px solid #f43f5e; color: #f43f5e; background: transparent;
}
.btn-outline-primary:hover {
    color: #fff; background: #f43f5e; border-color: #f43f5e;
}
.btn i { margin-left: 0.4rem; font-size: 1rem;}
@media (max-width: 768px){ .action-buttons{flex-direction:column; gap:0.6rem;} .btn{width:100%;} }

/* الرسائل الفارغة */
.empty-state { text-align:center; background:#fff; padding:1.8rem; border-radius:15px; box-shadow:0 2px 12px #1e3a8a07; margin-bottom:0.7rem;}
.empty-state i { font-size:2.1rem; color:#64748b; opacity:.7;}
.empty-state h4 { color:#1e3a8a; margin:0.4rem 0;}

@media (max-width: 576px) {
    .company-title { font-size: 1.05rem; }
    .company-header { padding: 0.65rem 0.1rem 1.2rem; }
    .company-img { height: 65px; }
    .company-content { padding: 0.7rem 0.13rem 0.2rem;}
}
</style>

<div class="container-fluid">
    <div class="company-container">
        <!-- Header -->
        <div class="company-header">
            <h1 class="company-title">{{ $company->name }}</h1>
            <p class="company-subtitle">{{ $company->description ?? 'شركة هندسية متخصصة في تقديم حلول متكاملة' }}</p>
            {{-- @if ($company->logo)
                <img src="{{ asset('storage/' . $company->logo) }}" class="company-logo" alt="شعار {{ $company->name }}">
            @endif --}}
        </div>

        <!-- Content -->
        <div class="company-content">
            <!-- Carousel -->
            <div id="companyCarousel" class="company-carousel carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @forelse ($company->images ?? [] as $index => $image)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                            <img
                                src="{{ asset('storage/' . $image['path']) }}"
                                class="d-block w-100 company-img"
                                alt="{{ $image['caption'] ?? $company->name }}"
                                onerror="this.src='{{ asset('storage/default.jpg') }}'"
                            >
                        </div>
                    @empty
                        <div class="carousel-item active">
                            <img
                                src="{{ asset('storage/' . ($company->image ?? 'default.jpg')) }}"
                                class="d-block w-100 company-img"
                                alt="{{ $company->name }}"
                            >
                        </div>
                    @endforelse
                </div>
                @if (count($company->images ?? []) > 1)
                    <div class="carousel-indicators">
                        @foreach ($company->images ?? [] as $index => $image)
                            <button
                                type="button"
                                data-bs-target="#companyCarousel"
                                data-bs-slide-to="{{ $index }}"
                                class="{{ $index == 0 ? 'active' : '' }}"
                                aria-current="{{ $index == 0 ? 'true' : 'false' }}"
                                aria-label="Slide {{ $index + 1 }}"
                            ></button>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#companyCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">السابق</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#companyCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">التالي</span>
                    </button>
                @endif
            </div>

            <!-- Company Details -->
            <div class="company-details">
                <div class="detail-card animate-on-scroll" style="height: 200px">
                    <h3 class="detail-title"><i class="fas fa-info-circle"></i> عن الشركة</h3>
                    <p>{{ $company->description ?? 'لا توجد معلومات متاحة عن الشركة.' }}</p>
                </div>

                <div class="detail-card animate-on-scroll" style="height: 200px">
                    <h3 class="detail-title"><i class="fas fa-map-marker-alt"></i> المدينة</h3>
                    <p><strong>المدينة:</strong> {{ $company->city ?? 'غير محدد' }}</p>
                </div>
                <div class="detail-card animate-on-scroll" style="height: 200px">
                    <h3 class="detail-title"><i class="fas fa-map-marker-alt"></i> سنوات الخبره</h3>
                    <p><strong>سنوات الخبرة:</strong> {{ $company->years_experience ?? 'غير محدد' }} سنة</p>
                </div>
                <div class="detail-card animate-on-scroll" style="height: 200px">
                    <h3 class="detail-title"><i class="fas fa-map-marker-alt"></i> الجميل</h3>
                    <p><i class="fas fa-envelope me-2"></i> {{ $company->email ?? 'غير متوفر' }}</p>
                </div>
                <div class="detail-card animate-on-scroll" style="height: 200px">
                    <h3 class="detail-title"><i class="fas fa-map-marker-alt"></i> الموقع</h3>
                    @if ($company->website)
                    <a href="{{ $company->website }}" target="_blank" rel="noopener noreferrer">{{ $company->website }}</a>
                @else
                    غير متوفر
                @endif
                </div>

                <div class="detail-card animate-on-scroll" style="height: 200px">
                    <h3 class="detail-title"><i class="fas fa-address-card"></i>  رقم الفون</h3>
                    <p><i class="fas fa-phone me-2"></i> {{ $company->phone ?? 'غير متوفر' }}</p>
                    </p>
                </div>
            </div>

            <!-- Services -->
            <h3 class="section-title animate-on-scroll">الخدمات المقدمة</h3>
            <div class="animate-on-scroll">
                @forelse ($company->services ?? [] as $service)
                    <span class="badge"><i class="fas fa-check-circle"></i> {{ $service }}</span>
                @empty
                    <div class="empty-state">
                        <i class="fas fa-tools"></i>
                        <h4>لا توجد خدمات</h4>
                        <p>لم يتم إضافة خدمات لهذه الشركة بعد.</p>
                    </div>
                @endforelse
            </div>

            <!-- Projects -->
            <h3 class="section-title animate-on-scroll">المشاريع السابقة</h3>
            <div class="projects-grid">
                @forelse ($company->projects ?? [] as $project)
                    <div class="project-card animate-on-scroll">
                    <img src="{{ $company->image ? asset('storage/' . $company->image) : 'https://via.placeholder.com/300' }}" 
                             alt="{{ $company->name }}" class="company-image">
                        <img src="{{ $company->image ? asset('storage/' . $company->image) : 'https://via.placeholder.com/100' }}" 
                             alt="شعار {{ $company->name }}" class="company-logo">
                 
                        <div class="project-body">
                            <h4 class="project-title">{{ $company->name }}</h4>
                            <p class="project-description">{{ $company->description ?? 'لا توجد تفاصيل متاحة.' }}</p>
                        </div>
                    </div>
                @empty
                    <div class="empty-state">
                        <i class="fas fa-project-diagram"></i>
                        <h4>لا توجد مشاريع</h4>
                        <p>لم يتم إضافة مشاريع لهذه الشركة بعد.</p>
                    </div>
                @endforelse
            </div>

            <!-- Certifications -->
            <h3 class="section-title animate-on-scroll">شهادات الاعتماد</h3>
            <ul class="certification-list">
                @forelse ($company->certifications ?? [] as $cert)
                    <li class="certification-item animate-on-scroll">
                        <i class="fas fa-certificate certification-icon"></i>
                        <div>
                            <h5 class="certification-name">{{ $company->name }}</h5>
                        </div>
                    </li>
                @empty
                    <div class="empty-state">
                        <i class="fas fa-award"></i>
                        <h4>لا توجد شهادات</h4>
                        <p>لم يتم إضافة شهادات اعتماد لهذه الشركة بعد.</p>
                    </div>
                @endforelse
            </ul>

            <!-- Team -->
            <h3 class="section-title animate-on-scroll">فريق العمل</h3>
            <div class="team-list">
                @forelse ($company->team ?? [] as $member)
                    <div class="team-member animate-on-scroll">
                        <img
                            src="{{ asset('storage/' . ($member['image'] ?? 'default-avatar.jpg')) }}"
                            class="team-avatar"
                            alt="{{ $company->name }}"
                        >
                        <div class="team-info">
                            <h5>{{ $company->name }}</h5>
                        </div>
                    </div>
                @empty
                    <div class="empty-state">
                        <i class="fas fa-users"></i>
                        <h4>لا يوجد فريق</h4>
                        <p>لم يتم إضافة أعضاء فريق لهذه الشركة بعد.</p>
                    </div>
                @endforelse
            </div>

            <!-- Action Buttons -->
            <div class="action-buttons animate-on-scroll">
                <a href="{{ route('engineering_companies.index') }}" class="btn btn-outline-primary">
                    <i class="fas fa-arrow-right me-2"></i> العودة إلى القائمة
                </a>
                <a href="{{ url('contact') }}" class="btn btn-primary">
                    <i class="fas fa-envelope me-2"></i> تواصل معنا
                </a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Pause carousel on hover
    const carousel = document.querySelector('#companyCarousel');
    if (carousel) {
        const bsCarousel = new bootstrap.Carousel(carousel);
        carousel.addEventListener('mouseenter', () => bsCarousel.pause());
        carousel.addEventListener('mouseleave', () => bsCarousel.cycle());
    }

    // Scroll animations
    const animateElements = document.querySelectorAll('.animate-on-scroll');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate__animated', 'animate__fadeInUp');
                entry.target.style.animationDelay = `${entry.target.dataset.delay || 0}s`;
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.2,
        rootMargin: '0px 0px -50px 0px'
    });

    animateElements.forEach((el, index) => {
        el.dataset.delay = (index % 4) * 0.1;
        observer.observe(el);
    });

    // Smooth scroll for internal links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });
</script>

<!-- Include Animate.css for animations -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
@endsection