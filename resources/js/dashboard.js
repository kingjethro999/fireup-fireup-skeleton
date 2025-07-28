// FireUp Dashboard JavaScript
import FireUp from './app.js';

class FireUpDashboard {
    constructor() {
        this.init();
    }
    
    init() {
        this.setupEventListeners();
        this.loadDashboardData();
    }
    
    setupEventListeners() {
        // Dashboard navigation
        const navLinks = document.querySelectorAll('[data-dashboard-nav]');
        navLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                this.navigateToSection(link.dataset.dashboardNav);
            });
        });
        
        // Real-time updates
        this.setupRealTimeUpdates();
    }
    
    navigateToSection(section) {
        // Hide all sections
        document.querySelectorAll('.dashboard-section').forEach(s => {
            s.classList.add('hidden');
        });
        
        // Show target section
        const targetSection = document.querySelector(`[data-section="${section}"]`);
        if (targetSection) {
            targetSection.classList.remove('hidden');
            
            // Update active nav
            document.querySelectorAll('[data-dashboard-nav]').forEach(link => {
                link.classList.remove('active');
            });
            document.querySelector(`[data-dashboard-nav="${section}"]`)?.classList.add('active');
        }
    }
    
    async loadDashboardData() {
        try {
            // Load system stats
            const stats = await FireUp.api.get('/api/dashboard/stats');
            this.updateStats(stats.data);
            
            // Load recent logs
            const logs = await FireUp.api.get('/api/dashboard/logs');
            this.updateLogs(logs.data);
            
        } catch (error) {
            console.error('Failed to load dashboard data:', error);
            FireUp.utils.notify('Failed to load dashboard data', 'error');
        }
    }
    
    updateStats(stats) {
        const statsContainer = document.getElementById('dashboard-stats');
        if (!statsContainer) return;
        
        statsContainer.innerHTML = `
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div class="bg-white p-4 rounded-lg shadow">
                    <h3 class="text-lg font-semibold text-gray-700">Total Users</h3>
                    <p class="text-3xl font-bold text-blue-600">${stats.users || 0}</p>
                </div>
                <div class="bg-white p-4 rounded-lg shadow">
                    <h3 class="text-lg font-semibold text-gray-700">API Calls</h3>
                    <p class="text-3xl font-bold text-green-600">${stats.apiCalls || 0}</p>
                </div>
                <div class="bg-white p-4 rounded-lg shadow">
                    <h3 class="text-lg font-semibold text-gray-700">Errors</h3>
                    <p class="text-3xl font-bold text-red-600">${stats.errors || 0}</p>
                </div>
                <div class="bg-white p-4 rounded-lg shadow">
                    <h3 class="text-lg font-semibold text-gray-700">Uptime</h3>
                    <p class="text-3xl font-bold text-purple-600">${stats.uptime || '99.9%'}</p>
                </div>
            </div>
        `;
    }
    
    updateLogs(logs) {
        const logsContainer = document.getElementById('dashboard-logs');
        if (!logsContainer) return;
        
        const logsHtml = logs.map(log => `
            <div class="border-l-4 border-${this.getLogLevelColor(log.level)}-400 pl-4 py-2">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-sm font-medium text-gray-900">${log.message}</p>
                        <p class="text-xs text-gray-500">${log.context}</p>
                    </div>
                    <span class="text-xs text-gray-400">${FireUp.utils.formatDate(log.timestamp)}</span>
                </div>
            </div>
        `).join('');
        
        logsContainer.innerHTML = logsHtml;
    }
    
    getLogLevelColor(level) {
        switch(level.toLowerCase()) {
            case 'error': return 'red';
            case 'warning': return 'yellow';
            case 'info': return 'blue';
            default: return 'gray';
        }
    }
    
    setupRealTimeUpdates() {
        // Simulate real-time updates every 30 seconds
        setInterval(() => {
            this.loadDashboardData();
        }, 30000);
    }
}

// Initialize dashboard when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    if (document.querySelector('[data-dashboard]')) {
        new FireUpDashboard();
    }
});

export default FireUpDashboard; 