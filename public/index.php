<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Milan Carati Portfolio</title>
    <link rel="stylesheet" href="style.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet' />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />
</head>

<body>
    <div class="particles" id="particles"></div>

    <button class="mobile-menu" onclick="toggleSidebar()">
        <i class='bx bx-menu'></i>
    </button>

    <aside class="sidebar" id="sidebar">
        <nav>
            <div class="profile-pic-container">
                <img src="./assets/img/me.webp" alt="My profile picture" class="profile-pic" />
            </div>

            <ul class="nav-links">
                <li><a href="#hero"><i class='bx bx-home'></i> Home</a></li>
                <li><a href="#about"><i class='bx bx-user'></i> About Me</a></li>
                <li><a href="#projects"><i class='bx bx-briefcase'></i> Projects</a></li>
                <li><a href="#experience"><i class='bx bx-medal'></i> Experience</a></li>
                <li><a href="#contact"><i class='bx bx-envelope'></i> Contact</a></li>
            </ul>
        </nav>
        <ul class="social-links">
            <li><a target="_blank" href="https://www.linkedin.com/in/milan-carati-520953225/" aria-label="LinkedIn"><i
                        class="fa-brands fa-linkedin"></i></a></li>
            <li><a target="_blank" href="https://www.instagram.com/milancarati?igsh=aTdrOHNqc3N6YmJ4&utm_source=qr"
                    aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a></li>
            <li><a target="_blank" href="mailto:milan.carati@gmail.com" aria-label="Email"><i
                        class="fa-solid fa-envelope"></i></a></li>
            <li><a target="_blank" href="https://github.com/milan-c-37277" aria-label="GitHub"><i
                        class="fa-brands fa-github"></i></a>
            </li>
        </ul>
    </aside>

    <main class="main-content">
        <section class="hero fade-in" id="hero">
            <h1>I am <span class="accent">Milan Carati</span></h1>
            <h2>Web Developer</h2>
            <p>Welcome to my portfolio website. Here you can see all my projects, technical skills and training courses.
            </p>
            <div class="cta-buttons">
                <a href="#projects" class="cta-button cta-primary">View My Work</a>
                <a href="#contact" class="cta-button cta-secondary">Get in Touch</a>
            </div>
        </section>

        <section id="about" class="fade-in">
            <h2>About Me</h2>
            <p>
                Hey, I’m Milan Carati, an 18-year-old aspiring developer from Velserbroek, the Netherlands.
                Currently, I’m studying at the <a class="smalllink" target="_blank"
                    href="https://www.ma-web.nl/">Mediacollege Amsterdam</a>, where I’m enrolled in the Software
                Developer program.

            </p>
        </section>

        <section id="projects" class="fade-in">
            <h2>Projects</h2>
            <div class="project-grid">
                <div class="project-card">
                    <img src="./assets/img/sweden.png" alt="The Greenline" />
                    <h3>The Greenline</h3>
                    <p>A collaborative project for a front-end landing page, developed in international partnership with
                        a Swedish school, <a class="smalllink" target="_blank"
                            href="https://lbs.se/stockholmsodra/">LBS</a>.</p>
                    <div class="tags">
                        <span>HTML</span>
                        <span>CSS</span>
                        <span>JavaScript</span>
                        <span>PHP</span>
                        <span>Animation</span>
                    </div>
                    <div class="project-links">
                        <a target="_blank" href="https://github.com/coo1boy2169/Web-Sweden">GitHub</a>
                        <a target="_blank" href="https://37277.hosts2.ma-cloud.nl/sweden/">Live Demo</a>
                    </div>
                </div>

                <div class="project-card">
                    <img src="./assets/img/svunity.png" alt="SV Unity" />
                    <h3>SV Unity</h3>
                    <p>A professional association website focused on community building and modern web standards.
                        Optimized for all devices.</p>
                    <div class="tags">
                        <span>HTML</span>
                        <span>CSS</span>
                    </div>
                    <div class="project-links">
                        <a target="_blank" href="https://37277.hosts2.ma-cloud.nl/svunity/">Live Demo</a>
                    </div>
                </div>

                <div class="project-card">
                    <img src="./assets/img/blastingweb.png" alt="Blasting Galaxy" />
                    <h3>Blast Galaxy</h3>
                    <p>A client project for an interactive website, developed in collaboration with <a class="smalllink"
                            target="_blank" href="https://37277.hosts2.ma-cloud.nl/blasting-galaxy/">Blasting
                            Galaxy</a>.</p>
                    <div class="tags">
                        <span>HTML</span>
                        <span>CSS</span>
                        <span>JavaScript</span>
                        <span>Animation</span>
                    </div>
                    <div class="project-links">
                        <a target="_blank" href="https://github.com/milan-c-37277/BlastingWeb">GitHub</a>
                        <a target="_blank" href="https://37277.hosts2.ma-cloud.nl/blasting-galaxy/">Live Demo</a>
                    </div>
                </div>

                <div class="project-card">
                    <img src="./assets/img/nxt.png" alt="Blasting Galaxy" />
                    <h3>NXT Museum</h3>
                    <p>A client project for an interactive website, developed in collaboration with <a class="smalllink"
                            target="_blank" href="https://nxtmuseum.com/">NXT Museum</a>.</p>
                    <div class="tags">
                        <span>HTML</span>
                        <span>CSS</span>
                        <span>JavaScript</span>
                        <span>Animation</span>
                    </div>
                    <div class="project-links">
                        <a target="_blank" href="https://github.com/milan-c-37277/Eindopdracht-periode-2">GitHub</a>
                        <a target="_blank" href="https://37277.hosts2.ma-cloud.nl/eindopdracht-p2">Live Demo</a>
                    </div>
                </div>

                <div class="project-card">
                    <img src="https://platform.theverge.com/wp-content/uploads/sites/2/chorus/uploads/chorus_asset/file/25617319/flappy_bird_new.png?quality=90&strip=all&crop=0%2C30.334004392387%2C100%2C37.408491947291&w=2400"
                        alt="Flappy Bird" />
                    <h3>Flappy Bird</h3>
                    <p>A classic arcade game where players control a bird by moving a object infront of a distance
                        meter.</p>
                    <div class="tags">
                        <span>HTML</span>
                        <span>CSS</span>
                        <span>JavaScript</span>
                        <span>Animation</span>
                    </div>
                    <div class="project-links">
                        <a target="_blank" href="https://github.com/SaadSaedd/M6BO">GitHub</a>
                        <a target="_blank" href="./assets/img/flappybird.mp4">Live Demo</a>
                    </div>
                </div>
            </div>
        </section>

        <section id="skills" class="fade-in">
            <h2>Technical Skills</h2>
            <div class="tags">
                <span>HTML</span>
                <span>CSS</span>
                <span>JavaScript</span>
                <span>PHP</span>
                <span>MySQL</span>
                <span>Git & GitHub</span>
                <span>Responsive Design</span>
                <span>UI/UX Design</span>
            </div>
        </section>

        <section id="experience" class="fade-in">
            <h2>Education & Experience</h2>

            <div class="job">
                <span class="date">2023 — Present</span>
                <div class="information">
                    <h3>Student · Contactweg 36, 1014 AN Amsterdam</h3>
                    <span>Full Stack Software Developer</span>
                    <p>
                        I am currently a student at Mediacollege Amsterdam in the Full Stack Software Developer program.
                        Here I am learning about databases, backend and frontend development.
                    </p>
                </div>
            </div>

            <div class="job">
                <span class="date">2019 — 2023</span>
                <div class="information">
                    <h3>Student · Briniostraat 12, 1971 HM IJmuiden</h3>
                    <span>High School</span>
                    <p>
                        High school education with a focus on media, technology, and creative subjects.
                        During this time, I discovered my passion for programming. I also learned to work in teams
                        and developed problem-solving skills.
                    </p>
                </div>
            </div>

            <div class="job">
                <span class="date">2011 — 2019</span>
                <div class="information">
                    <h3>Student · Floraronde 293, 1991 LB Velserbroek</h3>
                    <span>Primary School</span>
                    <p>
                        Completed primary education, laying the foundation for my academic journey and personal growth.
                    </p>
                </div>
            </div>
        </section>

        <section id="contact" class="fade-in">
            <h2>Contact</h2>
            <p>Ready to work together? Send me a message or email me directly at <a
                    href="mailto:milan.carati@gmail.com">milan.carati@gmail.com</a></p>

            <form action="sendmail.php" method="POST" class="contact-form">
                <input type="text" name="name" placeholder="Your Name" required />
                <input type="email" name="email" placeholder="Email Address" required />
                <textarea name="message" placeholder="Tell me about your project or ask a question..." rows="6"
                    required></textarea>
                <button type="submit">Send Message</button>
            </form>
        </section>
    </main>
    <script src="app.js"></script>
</body>
</html>
<?php
session_start();
if (isset($_SESSION['success_message'])) {
    echo "<div class='alert alert-success'>" . $_SESSION['success_message'] . "</div>";
    unset($_SESSION['success_message']); // maar 1x tonen
}
?>
