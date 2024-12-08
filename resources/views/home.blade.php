<x-app-layout x-data="{ open: false }">
<x-slot name="header">
    <!-- Removed the header text here as per your request -->
</x-slot>

<style>
    .main-content {
        position: relative;
        padding: 3rem 0;
        background: linear-gradient(to bottom right, #e3ffe7, #d9e7ff, #ffe3ff);
        min-height: 100vh;
    }

    .text-container {
        position: relative;
        text-align: center;
        margin-top: -5rem;
    }

    .heading {
        font-size: 3.5rem;
        font-weight: 800;
        font-style: italic;
        color: #2c5282;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        line-height: 1.2;
    }

    .subheading {
        font-size: 1.25rem;
        font-style: italic;
        color: #718096;
        width: 80%;
        margin: 2rem auto;
        line-height: 1.8;
    }

    .footer-text {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        background: linear-gradient(to top, #1e1e2f, transparent);
        padding: 2rem 0;
        text-align: center;
        color: white;
        z-index: 1;
    }

    .footer-text p {
        font-size: 1rem;
        font-weight: 600;
        font-style: italic;
    }
</style>

<div class="main-content">
    <!-- Removed background image -->
    <div class="text-container">
        <h1 class="heading">
            Career Guidance Web Application
        </h1>

        <p class="subheading">
            Step into a world of endless possibilities. Explore, learn, and unlock your full potential.
        </p>
    </div>

    <div class="footer-text">
        <p>LesCareerGuid@email.com</p>
    </div>
</div>
</x-app-layout>
