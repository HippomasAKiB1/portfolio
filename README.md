# AKIB Portfolio - MVC Architecture

This portfolio website is built using **MVC (Model-View-Controller) architecture with procedural PHP**, ensuring clean code separation and maintainability.

## 📁 Project Structure

```
emni/
├── index.php                          # Entry point / Router
├── config/
│   └── config.php                     # Configuration constants
├── models/
│   └── portfolio_model.php            # Data retrieval functions
├── controllers/
│   └── portfolio_controller.php       # Business logic & routing
├── views/
│   ├── layout.php                     # Main HTML layout template
│   └── sections/
│       ├── loading.php                # Loading screen
│       ├── intro.php                  # Intro/teaser page
│       ├── header.php                 # Navigation header
│       ├── hero.php                   # Hero section
│       ├── about.php                  # About section
│       ├── education.php              # Education timeline
│       ├── skills.php                 # Skills cards
│       ├── projects.php               # Projects portfolio
│       ├── recommendations.php        # Testimonials carousel
│       ├── contact.php                # Contact section
│       └── footer.php                 # Footer with social links
└── assets/
    ├── css/
    │   └── styles.css                 # All CSS styles
    └── js/
        └── script.js                  # All JavaScript functionality
```

## 🏗️ MVC Architecture Breakdown

### **Model** (`models/portfolio_model.php`)
- Contains **procedural functions** to retrieve and manage data
- Functions include:
  - `get_hero_data()` - Hero section content
  - `get_about_data()` - About section text
  - `get_education_data()` - Education timeline items
  - `get_skills_data()` - Skills list with proficiency levels
  - `get_projects_data()` - Projects portfolio
  - `get_testimonials_data()` - Customer testimonials
  - `get_contact_data()` - Contact information
  - `get_navigation_items()` - Navigation menu items
  - `get_social_links()` - Social media links

### **View** (`views/`)
- **layout.php** - Main HTML template that includes all sections
- **sections/** - Individual view components for each section
- Views use PHP's `extract()` to access variable data
- Presentation layer only - no business logic

### **Controller** (`controllers/portfolio_controller.php`)
- **Procedural functions** that bridge models and views
- `get_page_data()` - Fetches all data from models
- `render_view()` - Includes view files with extracted variables
- `render_portfolio()` - Main function to render entire page
- Handles data preparation and view rendering

### **Configuration** (`config/config.php`)
- Central place for all constants
- Site information (name, email, phone, etc.)
- Color schemes and theme definitions
- Social media URLs
- Asset paths

## 🚀 How It Works

1. **User requests index.php** → Entry point runs
2. **config/config.php** → Loads all constants
3. **controllers/portfolio_controller.php** → Loads models and prepares data
4. **models/portfolio_model.php** → Provides all portfolio content
5. **views/layout.php** → Main template render begins
6. **views/sections/*.php** → Individual sections included with data
7. **assets/css/styles.css** → Styling loaded
8. **assets/js/script.js** → Interactivity and animations

## 🎨 Key Features

✨ **Clean Separation of Concerns**
- Models handle data logic
- Views handle presentation
- Controllers handle orchestration

🔄 **Easy to Maintain**
- Change data? Modify models
- Change layout? Modify views
- Change flow? Modify controllers

📦 **Scalable Structure**
- Easy to add new sections
- Reusable component system
- Modular view files

🎯 **Procedural PHP**
- No complex OOP patterns
- Easy to understand
- Simple and straightforward

## 📝 How to Add New Content

### Add a New Skill:
```php
// In models/portfolio_model.php - Add to get_skills_data() array
array(
    'name' => 'Your Skill',
    'icon' => 'fab fa-icon-class',
    'description' => 'Skill description',
    'proficiency' => 90
)
```

### Add a New Project:
```php
// In models/portfolio_model.php - Add to get_projects_data() array
array(
    'emoji' => '🎯',
    'title' => 'Project Name',
    'description' => 'Project description',
    'tags' => array('Tag1', 'Tag2'),
    'demo_url' => '#',
    'code_url' => '#'
)
```

### Add a New Section:
1. Create `views/sections/newsection.php`
2. Create data function in `models/portfolio_model.php`
3. Call `render_view('sections/newsection', $data)` in `views/layout.php`

## 🛠️ Customization

Edit `config/config.php` to change:
- `PORTFOLIO_EMAIL` - Your email
- `PORTFOLIO_PHONE` - Your phone number
- `PORTFOLIO_LOCATION` - Your location
- `SOCIAL_*` - Social media links
- Color constants - Theme colors

## 📱 Responsive & Interactive

✅ Mobile-friendly responsive design
✅ Dark/Light mode toggle
✅ Smooth animations and transitions
✅ Interactive canvas animations
✅ Scroll progress indicator
✅ Custom cursor effects
✅ Smooth scrolling navigation

## 🌐 Browser Support

Works on all modern browsers:
- Chrome, Firefox, Safari, Edge
- Mobile browsers
- Responsive on tablet and mobile devices

---

**Created with:** Procedural PHP + MVC Architecture
