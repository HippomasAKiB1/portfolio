<?php
/**
 * loading.php — "SYSTEM BOOT" terminal loading screen
 */
$boot_lines = [
    '> Initializing neural pathways...',
    '> Loading match history [████████░░] 80%',
    '> Calibrating problem-solving modules...',
    '> Mounting data analysis cores...',
    '> Establishing esports telemetry link...',
    '> Compiling creative subroutines...',
    '> Verifying ML model integrity... [OK]',
    '> All systems nominal.',
    '> Welcome, operator.',
];
?>
<div id="loading-screen" aria-label="Loading">
    <div class="boot-container">
        <div class="boot-header">
            <span class="boot-logo">AKIB.SYS</span>
            <span class="boot-version">v3.0.0 // 2026</span>
        </div>
        <div class="boot-lines" id="boot-lines">
            <?php foreach ($boot_lines as $i => $line): ?>
                <div class="boot-line" data-index="<?php echo $i; ?>"><?php echo htmlspecialchars($line); ?></div>
            <?php endforeach; ?>
        </div>
        <div class="boot-progress-wrap">
            <div class="boot-progress-label">
                <span>LOADING PORTFOLIO</span>
                <span id="boot-percent">0%</span>
            </div>
            <div class="boot-progress-bar">
                <div class="boot-progress-fill" id="boot-progress-fill"></div>
            </div>
        </div>
    </div>
    <!-- Glitch overlay strips -->
    <div class="glitch-strip glitch-strip-1" aria-hidden="true"></div>
    <div class="glitch-strip glitch-strip-2" aria-hidden="true"></div>
    <div class="glitch-strip glitch-strip-3" aria-hidden="true"></div>
</div>
