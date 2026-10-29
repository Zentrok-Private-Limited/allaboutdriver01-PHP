<?php
/**
 * Lucide SVG Icons Helper
 */

function render_icon($name, $classes = '', $size = 20) {
    $commonAttrs = 'xmlns="http://www.w3.org/2000/svg" width="' . (int)$size . '" height="' . (int)$size . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="' . htmlspecialchars($classes, ENT_QUOTES, 'UTF-8') . '"';

    switch ($name) {
        case 'printer':
            return '<svg ' . $commonAttrs . '><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><path d="M6 9V3a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v6"/><rect x="6" y="14" width="12" height="8" rx="1"/></svg>';

        case 'search':
            return '<svg ' . $commonAttrs . '><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>';

        case 'menu':
            return '<svg ' . $commonAttrs . '><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>';

        case 'x':
            return '<svg ' . $commonAttrs . '><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>';

        case 'arrow-right':
            return '<svg ' . $commonAttrs . '><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>';

        case 'arrow-left':
            return '<svg ' . $commonAttrs . '><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>';

        case 'check-circle':
        case 'circle-check':
        case 'check-circle-2':
            return '<svg ' . $commonAttrs . '><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg>';

        case 'clock':
        case 'clock-3':
            return '<svg ' . $commonAttrs . '><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16.5 12"/></svg>';

        case 'shield-check':
            return '<svg ' . $commonAttrs . '><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/></svg>';

        case 'sparkles':
            return '<svg ' . $commonAttrs . '><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/><path d="M5 3v4"/><path d="M19 17v4"/><path d="M3 5h4"/><path d="M17 19h4"/></svg>';

        case 'laptop':
            return '<svg ' . $commonAttrs . '><path d="M20 16V7a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v9m16 0H4m16 0 1.28 2.55a1 1 0 0 1-.9 1.45H3.62a1 1 0 0 1-.9-1.45L4 16"/></svg>';

        case 'network':
            return '<svg ' . $commonAttrs . '><rect x="16" y="16" width="6" height="6" rx="1"/><rect x="2" y="16" width="6" height="6" rx="1"/><rect x="9" y="2" width="6" height="6" rx="1"/><path d="M5 16v-3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3"/><path d="M12 12V8"/></svg>';

        case 'file-text':
            return '<svg ' . $commonAttrs . '><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="M10 9H8"/><path d="M16 13H8"/><path d="M16 17H8"/></svg>';

        case 'gauge':
            return '<svg ' . $commonAttrs . '><path d="m12 14 4-4"/><path d="M3.34 19a10 10 0 1 1 17.32 0"/></svg>';

        case 'settings-2':
            return '<svg ' . $commonAttrs . '><path d="M20 7h-9"/><path d="M14 17H5"/><circle cx="17" cy="17" r="3"/><circle cx="7" cy="7" r="3"/></svg>';

        case 'lightbulb':
            return '<svg ' . $commonAttrs . '><path d="M15 14c.2-1 .7-1.7 1.5-2.5 1-.9 1.5-2.2 1.5-3.5A6 6 0 0 0 6 8c0 1 .2 2.2 1.5 3.5.7.7 1.3 1.5 1.5 2.5"/><path d="M9 18h6"/><path d="M10 22h4"/></svg>';

        case 'chevron-down':
            return '<svg ' . $commonAttrs . '><path d="m6 9 6 6 6-6"/></svg>';

        case 'book-open':
            return '<svg ' . $commonAttrs . '><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>';

        default:
            return '<svg ' . $commonAttrs . '><circle cx="12" cy="12" r="10"/></svg>';
    }
}
