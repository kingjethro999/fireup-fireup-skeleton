# FireUp PHP Framework Starter

A modern, lightweight PHP framework starter project designed for simplicity and ease of use. FireUp makes PHP development faster and more enjoyable for beginners while providing powerful features for experienced developers.

## 🌟 Features

- **Simple & Lightweight MVC Structure**
- **Instant API Mode** - Auto-generate RESTful APIs
- **Built-in Dashboard** - Visual development tools
- **Advanced CLI Commands** - Like Laravel Artisan
- **OpenAPI Documentation** - Auto-generated API docs
- **WebSocket Support** - Real-time features out of the box
- **Flexible Theming System** - Multiple active themes
- **No ORM Lock-in** - Use any database system

## 🚀 Quick Start

### Prerequisites

- PHP 8.0 or higher
- Composer
- PDO PHP Extension
- JSON PHP Extension
- Mbstring PHP Extension

### Installation

1. **Create a new project:**
```bash
composer create-project fireup/fireup-skeleton my-app
cd my-app
```

2. **Set up environment:**
```bash
cp .env.example .env
# Edit .env with your database settings
```

3. **Install JavaScript dependencies:**
   ```bash
   npm install
   ```

4. **Start development servers:**
   ```bash
   # Terminal 1: Start PHP server
   fireup serve
   
   # Terminal 2: Start JavaScript build process
   npm run dev
   ```

5. **Visit your app:**
Open http://localhost:8000 in your browser

## 📁 Project Structure

```
my-app/
├── app/
│   └── Controllers/          # Your application controllers
├── config/
│   └── database.php          # Database configuration
├── public/
│   ├── index.php            # Application entry point
│   └── .htaccess            # Apache configuration
├── routes/
│   └── web.php              # Route definitions
├── view/
│   └── welcome.php          # Views
├── vendor/
│   └── fireup/fireup/       # FireUp framework core
├── .env                     # Environment variables
└── composer.json            # Dependencies
```

## 🛠️ Available Commands

Once installed, you can use FireUp CLI commands:

```bash
# Start development server
fireup serve

# Create new controller
fireup create:controller UserController

# Create new model
fireup create:model User

# Create new view
fireup create:view users.index

# Run database migrations
fireup migrate

# List all routes
fireup route:list

# Generate API docs
fireup route:list --docs

# Prepare for mobile apps
fireup api:mobile-ready

# Create custom commands
fireup make:command MyCommand

# Frontend development
fireup frontend init      # Initialize frontend setup
fireup frontend install   # Install frontend dependencies
fireup frontend dev       # Start Vite dev server
fireup frontend build     # Build for production
fireup frontend watch     # Watch for changes

# Create middleware
fireup make:middleware Auth

# Create policies
fireup make:policy UserPolicy

# Create seeders
fireup make:seeder UserSeeder

# Create factories
fireup make:factory UserFactory

# Create events
fireup make:event UserRegistered
```

## 🎯 Development Workflow

### 1. Create a Controller
```bash
fireup create:controller ProductController
```

### 2. Create a Model
```bash
fireup create:model Product
```

### 3. Add Routes
Edit `routes/web.php`:
```php
$router->get('/products', [App\Controllers\ProductController::class, 'index']);
```

### 4. Create Views
```bash
fireup create:view products.index
```

## 🔥 Advanced Features

### API Generation
FireUp automatically generates RESTful APIs for your models:

```bash
fireup api:mobile-ready
# Visit http://localhost:8000/api/docs
```

### Dashboard
Access the visual development dashboard at `/dashboard` (dev mode only).

### WebSocket Support
Built-in WebSocket server for real-time features.

### Theming
Multiple active themes with inheritance support.

## 🚀 JavaScript Workflow

FireUp comes with modern JavaScript tooling powered by Vite:

### Setup
```bash
# Initialize frontend (if not already done)
fireup frontend init

# Install dependencies
npm install
```

### Development
```bash
# Start Vite dev server (hot reload)
npm run dev

# Or use FireUp CLI
fireup frontend dev
```

### Production
```bash
# Build optimized assets
npm run build

# Or use FireUp CLI
fireup frontend build
```

### Available Scripts
- `npm run dev` - Start development server with hot reload
- `npm run build` - Build for production
- `npm run preview` - Preview production build
- `npm run watch` - Watch for changes and rebuild

### JavaScript Features
- **Modern ES6+** - Use latest JavaScript features
- **Axios Integration** - Built-in HTTP client for API calls
- **Event System** - Custom event handling
- **Utility Functions** - Notifications, date formatting, debouncing
- **Tailwind CSS** - Utility-first CSS framework
- **Hot Module Replacement** - Instant updates during development

### Example Usage
```javascript
// API calls
FireUp.api.get('/api/users')
  .then(response => console.log(response.data));

// Notifications
FireUp.utils.notify('Success!', 'success');

// Events
FireUp.events.on('user-logged-in', (user) => {
  console.log('User logged in:', user);
});
```

## 📚 Documentation

For detailed documentation, visit: https://fire-updev.vercel.app

## 🤝 Contributing

We welcome contributions! Please see [CONTRIBUTING.md](CONTRIBUTING.md) for details.

## 📄 License

FireUp is open-sourced software licensed under the [MIT license](LICENSE).

## 🆘 Support

- Documentation: https://fire-updev.vercel.app
- Issues: https://github.com/fireup/fireup-skeleton/issues
- Email: jethrojerrybj@gmail.com

## 🙏 Acknowledgments

- Inspired by Laravel, CodeIgniter, and WordPress
- Built with ❤️ by the FireUp Team

