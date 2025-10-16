// Contact Form Handler
class ContactForm {
    constructor() {
        this.form = document.getElementById('contactForm');
        this.submitButton = null;
        this.originalButtonText = '';
       
        this.init();
    }
   
    init() {
        if (!this.form) return;
       
        this.submitButton = this.form.querySelector('button[type="submit"]');
        this.originalButtonText = this.submitButton ? this.submitButton.textContent : '';
       
        this.form.addEventListener('submit', (e) => this.handleSubmit(e));
       
        // Add real-time validation
        this.setupValidation();
    }
   
    setupValidation() {
        const inputs = this.form.querySelectorAll('input, textarea');
       
        inputs.forEach(input => {
            input.addEventListener('blur', () => this.validateField(input));
            input.addEventListener('input', () => this.clearFieldError(input));
        });
    }
   
    validateField(field) {
        const value = field.value.trim();
        let isValid = true;
        let errorMessage = '';
       
        // Clear previous errors
        this.clearFieldError(field);
       
        // Required field validation
        if (!value) {
            isValid = false;
            errorMessage = this.getFieldLabel(field) + ' is required';
        }
       
        // Email validation
        if (field.type === 'email' && value) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(value)) {
                isValid = false;
                errorMessage = 'Please enter a valid email address';
            }
        }
       
        // Message length validation
        if (field.name === 'message' && value && value.length > 2000) {
            isValid = false;
            errorMessage = 'Message is too long (max 2000 characters)';
        }
       
        if (!isValid) {
            this.showFieldError(field, errorMessage);
        }
       
        return isValid;
    }
   
    getFieldLabel(field) {
        const label = this.form.querySelector(`label[for="${field.id}"]`);
        return label ? label.textContent.replace(':', '') : field.name;
    }
   
    showFieldError(field, message) {
        field.classList.add('error');
       
        // Remove existing error message
        const existingError = field.parentNode.querySelector('.error-message');
        if (existingError) {
            existingError.remove();
        }
       
        // Add new error message
        const errorDiv = document.createElement('div');
        errorDiv.className = 'error-message';
        errorDiv.textContent = message;
        field.parentNode.appendChild(errorDiv);
    }
   
    clearFieldError(field) {
        field.classList.remove('error');
        const errorMessage = field.parentNode.querySelector('.error-message');
        if (errorMessage) {
            errorMessage.remove();
        }
    }
   
    async handleSubmit(e) {
        e.preventDefault();
       
        // Validate all fields
        const inputs = this.form.querySelectorAll('input, textarea');
        let isFormValid = true;
       
        inputs.forEach(input => {
            if (!this.validateField(input)) {
                isFormValid = false;
            }
        });
       
        if (!isFormValid) {
            this.showNotification('Please fix the errors above', 'error');
            return;
        }
       
        // Prepare form data
        const formData = new FormData(this.form);
        const data = {
            name: formData.get('name'),
            email: formData.get('email'),
            message: formData.get('message')
        };
       
        try {
            await this.submitForm(data);
        } catch (error) {
            console.error('Form submission error:', error);
            this.showNotification('Something went wrong. Please try again.', 'error');
        }
    }
   
    async submitForm(data) {
        // Show loading state
        this.setLoadingState(true);
       
        try {
            const response = await fetch('contact.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data)
            });
           
            const result = await response.json();
           
            if (result.success) {
                this.showNotification('Message sent successfully! I\'ll get back to you soon.', 'success');
                this.form.reset();
               
                // Clear any existing errors
                const inputs = this.form.querySelectorAll('input, textarea');
                inputs.forEach(input => this.clearFieldError(input));
               
            } else {
                if (result.errors && Array.isArray(result.errors)) {
                    this.showNotification(result.errors.join(', '), 'error');
                } else {
                    this.showNotification(result.message || 'Failed to send message', 'error');
                }
            }
           
        } catch (error) {
            this.showNotification('Network error. Please check your connection and try again.', 'error');
        } finally {
            this.setLoadingState(false);
        }
    }
   
    setLoadingState(loading) {
        if (!this.submitButton) return;
       
        if (loading) {
            this.submitButton.disabled = true;
            this.submitButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending...';
        } else {
            this.submitButton.disabled = false;
            this.submitButton.textContent = this.originalButtonText;
        }
    }
   
    showNotification(message, type = 'info') {
        // Remove existing notification
        const existing = document.querySelector('.notification');
        if (existing) {
            existing.remove();
        }
       
        // Create notification element
        const notification = document.createElement('div');
        notification.className = `notification notification--${type}`;
        notification.innerHTML = `
            <div class="notification__content">
                <i class="fas ${type === 'success' ? 'fa-check-circle' : type === 'error' ? 'fa-exclamation-circle' : 'fa-info-circle'}"></i>
                <span>${message}</span>
                <button class="notification__close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        `;
       
        // Add to page
        document.body.appendChild(notification);
       
        // Add close functionality
        const closeBtn = notification.querySelector('.notification__close');
        closeBtn.addEventListener('click', () => this.removeNotification(notification));
       
        // Auto remove after 5 seconds
        setTimeout(() => this.removeNotification(notification), 5000);
       
        // Show animation
        requestAnimationFrame(() => {
            notification.classList.add('notification--show');
        });
    }
   
    removeNotification(notification) {
        if (!notification || !notification.parentNode) return;
       
        notification.classList.remove('notification--show');
        setTimeout(() => {
            if (notification.parentNode) {
                notification.parentNode.removeChild(notification);
            }
        }, 300);
    }
}
 
// Initialize contact form when DOM is loaded
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => new ContactForm());
} else {
    new ContactForm();
}