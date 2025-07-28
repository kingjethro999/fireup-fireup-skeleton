// FireUp Skeleton - Main JavaScript Application
import axios from 'axios';

// Configure axios defaults
axios.defaults.baseURL = window.location.origin;
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// CSRF token setup for Laravel-like protection
const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
if (token) {
    axios.defaults.headers.common['X-CSRF-TOKEN'] = token;
}

// Global FireUp object
window.FireUp = {
    // API helpers
    api: {
        get: (url, config = {}) => axios.get(url, config),
        post: (url, data = {}, config = {}) => axios.post(url, data, config),
        put: (url, data = {}, config = {}) => axios.put(url, data, config),
        delete: (url, config = {}) => axios.delete(url, config),
    },
    
    // Utility functions
    utils: {
        // Show notification
        notify: (message, type = 'info') => {
            const notification = document.createElement('div');
            notification.className = `fixed top-4 right-4 p-4 rounded-lg shadow-lg z-50 ${
                type === 'success' ? 'bg-green-500 text-white' :
                type === 'error' ? 'bg-red-500 text-white' :
                type === 'warning' ? 'bg-yellow-500 text-white' :
                'bg-blue-500 text-white'
            }`;
            notification.textContent = message;
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.remove();
            }, 3000);
        },
        
        // Format date
        formatDate: (date) => {
            return new Date(date).toLocaleDateString();
        },
        
        // Debounce function
        debounce: (func, wait) => {
            let timeout;
            return function executedFunction(...args) {
                const later = () => {
                    clearTimeout(timeout);
                    func(...args);
                };
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
            };
        }
    },
    
    // Event system
    events: {
        listeners: {},
        on: (event, callback) => {
            if (!window.FireUp.events.listeners[event]) {
                window.FireUp.events.listeners[event] = [];
            }
            window.FireUp.events.listeners[event].push(callback);
        },
        emit: (event, data) => {
            const listeners = window.FireUp.events.listeners[event] || [];
            listeners.forEach(callback => callback(data));
        }
    }
};

// Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    console.log('🚀 FireUp JavaScript loaded successfully!');
    
    // Example: Add click handlers for demo buttons
    const demoButtons = document.querySelectorAll('[data-fireup-demo]');
    demoButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            e.preventDefault();
            const action = button.dataset.fireupDemo;
            
            switch(action) {
                case 'api-test':
                    FireUp.api.get('/api/users')
                        .then(response => {
                            FireUp.utils.notify('API call successful!', 'success');
                            console.log('API Response:', response.data);
                        })
                        .catch(error => {
                            FireUp.utils.notify('API call failed!', 'error');
                            console.error('API Error:', error);
                        });
                    break;
                    
                case 'notification':
                    FireUp.utils.notify('This is a test notification!', 'success');
                    break;
                    
                case 'event':
                    FireUp.events.emit('demo-event', { message: 'Event triggered!' });
                    break;
            }
        });
    });
    
    // Listen for demo events
    FireUp.events.on('demo-event', (data) => {
        console.log('Demo event received:', data);
        FireUp.utils.notify(`Event: ${data.message}`, 'info');
    });
});

// Export for module usage
export default window.FireUp; 