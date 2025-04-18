<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - FreshFarm</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.about-section {
    padding: 50px 20px;
    background-color: #f4f4f4;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
}

.title {
    font-size: 2.5em;
    text-align: center;
    color: rgb(73, 252, 3);
}

.intro {
    text-align: center;
    margin-top: 10px;
    font-size: 2.2em;
    color: rgb(73, 252, 3);
}

.content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 30px;
}

.image img {
    max-width: 100%;
    height: auto;
    width: 500px; /* Adjust this to fit your design */
}

.text {
    flex: 1;
    margin-left: 30px;
   
}

.text h2 {
    font-size: 1.8em;
    margin-top: 20px;
    background-color:yellow;
}

.text ul {
    list-style-type: none;
    padding: 0;
}

.text li {
    font-size: 1.2em;
    margin-bottom: 10px;
}



    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
</head>
<body>
    <section class="about-section">
        <div class="container">
            <h1 class="title">About FreshFarm</h1>
            <p class="intro">Empowering farmers, delivering fresh and organic produce directly to consumers.</p>
            <div class="content">
                <div class="image">
                    <img src="assets/images/farm-hero.webp" alt="Farmers at work">
                </div>
                <div class="text">
                    <h2>Our Mission</h2>
                    <p>FreshFarm aims to bridge the gap between farmers and customers by providing a platform for selling fresh, organic products at fair prices.</p>
                    <h2>Why Choose Us?</h2>
                    <ul>
                        <li>✅ 100% Organic & Fresh Products</li>
                        <li>✅ Direct from Farmers</li>
                        <li>✅ Easy Online Ordering & Pickup</li>
                        <li>✅ Support Local Agriculture</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    
    <script>
        gsap.from(".title", { duration: 1, y: -50, opacity: 0, ease: "bounce.out" });
        gsap.from(".intro", { duration: 1.2, opacity: 0, delay: 0.5 });
        gsap.from(".content", { duration: 1.5, x: -100, opacity: 0, delay: 0.8 });
    </script>
</body>
</html>
