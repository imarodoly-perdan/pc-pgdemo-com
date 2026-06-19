<?php

/**
 * Renders a link card HTML snippet with escaped content.
 * 
 * @param string $url   The target URL for the card.
 * @param string $title The card title.
 * @param string $desc  A short description.
 * 
 * @return string Escaped HTML string.
 */
function renderLinkCard(string $url, string $title, string $desc): string {
    $safeUrl   = htmlspecialchars($url, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $safeTitle = htmlspecialchars($title, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $safeDesc  = htmlspecialchars($desc, ENT_QUOTES | ENT_HTML5, 'UTF-8');

    return <<<HTML
<div class="link-card">
    <a href="{$safeUrl}" target="_blank" rel="noopener noreferrer">
        <h3>{$safeTitle}</h3>
        <p>{$safeDesc}</p>
    </a>
</div>
HTML;
}

/**
 * Example usage: renders a sample link card.
 * 
 * @param string $url     The demo URL.
 * @param string $keyword Keyword to incorporate.
 * 
 * @return string The rendered card HTML.
 */
function sampleCard(string $url, string $keyword): string {
    $title = "{$keyword} 官方体验";
    $desc  = "立即访问 {$url}，开始您的 {$keyword} 之旅。";

    return renderLinkCard($url, $title, $desc);
}

// --- Configuration data (can be placed in a config file) ---
$demoUrl   = 'https://pc-pgdemo.com';
$demoTitle = 'pg模拟器';

// Render and output the example card
echo sampleCard($demoUrl, $demoTitle);