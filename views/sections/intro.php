<?php
/**
 * Intro Page View
 */
?>
<div id="intro-page">
    <canvas class="intro-canvas" id="introCanvas"></canvas>
    <div class="intro-content">
        <h1 class="intro-title"><?php echo $hero['name']; ?></h1>
        <p class="intro-subtitle"><?php echo $hero['tagline']; ?></p>
        <button class="explore-btn" onclick="startExplore()">Explore</button>
    </div>
</div>
