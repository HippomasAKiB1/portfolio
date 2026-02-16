<?php
/**
 * Header View
 */
?>
<header>
    <div class="logo" onclick="scrollToSection('hero')">AKIB</div>
    <nav>
        <?php foreach ($navigation as $item): ?>
            <a onclick="scrollToSection('<?php echo $item['id']; ?>')"><?php echo $item['label']; ?></a>
        <?php endforeach; ?>
    </nav>
    <div class="header-controls">
        <button class="theme-toggle" onclick="toggleTheme()" title="Toggle Theme">
            <i class="fas fa-moon"></i>
        </button>
    </div>
</header>
