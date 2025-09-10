// Dark Mode Functionality
document.addEventListener('DOMContentLoaded', function() {
    //to check what is the current theme runnig
    const currentTheme = localStorage.getItem('theme');
    const darkModeToggle = document.getElementById('darkModeToggle');
    
    // default to light
    if (!currentTheme) {
        localStorage.setItem('theme', 'light');
        currentTheme = 'light';
    }
    
    //apply the theme now
    if (currentTheme === 'dark') {
        document.body.classList.add('dark-mode');
    } else {
        document.body.classList.remove('dark-mode'); 
    }
    
    // Dark mode toggle functionality
    if (darkModeToggle) {
        darkModeToggle.addEventListener('click', function() {
            document.body.classList.toggle('dark-mode');
            
            if (document.body.classList.contains('dark-mode')) {
                localStorage.setItem('theme', 'dark');
            } else {
                localStorage.setItem('theme', 'light');
            }
        });
    }
    
    // Mobile menu toggle functionality
    const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
    const navMenu = document.querySelector('.nav-menu');
    
    if (mobileMenuToggle && navMenu) {
        mobileMenuToggle.addEventListener('click', function() {
            navMenu.classList.toggle('active');
        });
    }
    
    // Blog slider functionality
    const slides = document.querySelectorAll('.slide');
    const dots = document.querySelectorAll('.dot');
    const prevBtn = document.querySelector('.prev-slide');
    const nextBtn = document.querySelector('.next-slide');

    let currentSlide = 0;
    
    function showSlide(index) {
        slides.forEach(slide => slide.classList.remove('active'));
        dots.forEach(dot => dot.classList.remove('active'));
        
        if (slides[index]) {
            slides[index].classList.add('active');
        }
        if (dots[index]) {
            dots[index].classList.add('active');
        }
    }
    
    function nextSlide() {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
    }
    
    function prevSlide() {
        currentSlide = (currentSlide - 1 + slides.length) % slides.length;
        showSlide(currentSlide);
    }
    
    //  if slides exist then show N and D Buttons
    if (slides.length > 0) {
        showSlide(0);
        setInterval(nextSlide, 5000);
        
        // Navigation buttons
        if (nextBtn) {
            nextBtn.addEventListener('click', nextSlide);
        }
        if (prevBtn) {
            prevBtn.addEventListener('click', prevSlide);
        }
        
        // Dot navigation
        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                currentSlide = index;
                showSlide(currentSlide);
            });
        });
    }
    
// Load more button functionality
//frontend logic
const loadMoreBtn = document.getElementById('load-more-posts');
const postsContainer = document.getElementById('posts-container');

if (loadMoreBtn && postsContainer) {
    loadMoreBtn.addEventListener('click', function() {
        const currentPage = parseInt(this.dataset.page);
        const nextPage = currentPage + 1;
        
        // Show loading state
        this.textContent = 'Loading...';
        this.disabled = true;
        
        // Make AJAX request
        const formData = new FormData();
        formData.append('action', 'load_more_posts');
        formData.append('page', currentPage);
        
        fetch(loadmore.ajaxurl, {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            if (data && data !== '0') {
                postsContainer.insertAdjacentHTML('beforeend', data);
                this.dataset.page = nextPage;
                this.textContent = 'Load More';
                this.disabled = false;
            } else {
                this.textContent = 'No more posts';
                this.disabled = true;
            }
        })
        .catch(error => {
            console.error('Error:', error);
            this.textContent = 'Load More';
            this.disabled = false;
        });
    });
}

//toggle for filter functionality
        const buttons = document.querySelectorAll(".filter-btn");
        const cards   = document.querySelectorAll(".product-card");

        buttons.forEach(btn => {
            btn.addEventListener("click", () => {
                buttons.forEach(b => b.classList.remove("active"));
                btn.classList.add("active");

                const filter = btn.getAttribute("data-cat");

                cards.forEach(card => {
                    if (filter === "all" || card.classList.contains(filter)) {
                        card.style.display = "block";
                    } else {
                        card.style.display = "none";
                    }
                });
            });
        });
});