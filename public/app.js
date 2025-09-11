 // Create animated particles
        function createParticles() {
            const particlesContainer = document.getElementById('particles');
            const particleCount = 50;

            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.className = 'particle';
                
                // Random position
                particle.style.left = Math.random() * 100 + '%';
                particle.style.top = Math.random() * 100 + '%';
                
                // Random animation delay
                particle.style.animationDelay = Math.random() * 8 + 's';
                
                // Random animation duration
                particle.style.animationDuration = (Math.random() * 10 + 5) + 's';
                
                particlesContainer.appendChild(particle);
            }
        }

        // Smooth scrolling for navigation links
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

        // Scroll animations
        function handleScrollAnimations() {
            const elements = document.querySelectorAll('.fade-in');
            
            elements.forEach(element => {
                const elementTop = element.getBoundingClientRect().top;
                const elementVisible = 150;
                
                if (elementTop < window.innerHeight - elementVisible) {
                    element.classList.add('visible');
                }
            });
        }

        // Mobile sidebar toggle
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('active');
        }

        // Close sidebar when clicking on main content on mobile
        document.querySelector('.main-content').addEventListener('click', function() {
            if (window.innerWidth <= 900) {
                const sidebar = document.getElementById('sidebar');
                sidebar.classList.remove('active');
            }
        });

        // Form submission with animation
        document.querySelector('.contact-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const button = this.querySelector('button');
            const originalText = "Verstuur Bericht";
            
            button.textContent = 'Verzenden...';
            button.style.background = 'linear-gradient(135deg, #4facfe 0%, #00f2fe 100%)';
            
            // Simulate form submission
            setTimeout(() => {
                button.textContent = 'Verstuurd! ✓';
                button.style.background = 'linear-gradient(135deg, #11998e 0%, #38ef7d 100%)';
                
                setTimeout(() => {
                    button.textContent = originalText;
                    button.style.background = '';
                    this.reset();
                }, 2000);
            }, 1500);
        });

        // Profile picture click effect
        document.querySelector('.profile-pic').addEventListener('click', function() {
            this.style.transform = 'scale(1.2) rotate(360deg)';
            setTimeout(() => {
                this.style.transform = '';
            }, 600);
        });

        // Parallax effect for hero section
        window.addEventListener('scroll', function() {
            const scrolled = window.pageYOffset;
            const rate = scrolled * -0.3;
            const hero = document.querySelector('.hero');
            
            if (hero) {
                hero.style.transform = `translateY(${rate}px)`;
            }
            
            handleScrollAnimations();
        });

        // Dynamic typing effect for hero title
        function typeWriter(element, text, speed = 100) {
            element.innerHTML = '';
            let i = 0;
            
            function type() {
                if (i < text.length) {
                    element.innerHTML += text.charAt(i);
                    i++;
                    setTimeout(type, speed);
                }
            }
            type();
        }

        // Initialize everything when DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            createParticles();
            handleScrollAnimations();
            
            // Add loading animation
            document.body.style.opacity = '0';
            setTimeout(() => {
                document.body.style.transition = 'opacity 0.5s ease';
                document.body.style.opacity = '1';
            }, 100);
        });

        // Add keyboard navigation
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                const sidebar = document.getElementById('sidebar');
                sidebar.classList.remove('active');
            }
        });

        // Add intersection observer for better performance
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        // Observe all fade-in elements
        document.querySelectorAll('.fade-in').forEach(el => {
            observer.observe(el);
        });