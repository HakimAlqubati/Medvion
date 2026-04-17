<div id="medvion-loader" style="
    position: fixed; inset: 0; z-index: 99999;
    background: #ffffff;
    display: flex; flex-direction: column; align-items: center; justify-content: center;
    transition: opacity 0.7s ease-in-out;
    pointer-events: none;
">
    <div style="position: relative; width: 72px; height: 72px; margin-bottom: 24px; display: flex; align-items: center; justify-content: center;">
        {{-- Background Track --}}
        <div style="position: absolute; inset: 4px; border: 2px solid rgba(10, 74, 123, 0.08); border-radius: 50%;"></div>
        
        {{-- The Orbiting Line (SVG) --}}
        <svg style="position: absolute; inset: 0; width: 100%; height: 100%; animation: medvion-ring-spin 1.4s linear infinite;" viewBox="0 0 100 100">
            <defs>
                <linearGradient id="orbit-grad" x1="0%" y1="0%" x2="100%" y2="100%">
                    <stop offset="0%" stop-color="#0A4A7B" />
                    <stop offset="100%" stop-color="#0D9488" />
                </linearGradient>
            </defs>
            <circle cx="50" cy="50" r="46" fill="none" stroke="url(#orbit-grad)" stroke-width="5" stroke-linecap="round" stroke-dasharray="90 200"></circle>
        </svg>

        {{-- Static Pill --}}
        <div style="
            width: 18px; height: 42px; 
            display: flex; flex-direction: column;
            border-radius: 21px;
            overflow: hidden;
            box-shadow: 0 6px 12px rgba(10, 74, 123, 0.15);
            transform: rotate(30deg);
        ">
            <div style="height: 50%; background-color: #0D9488;"></div>
            <div style="height: 50%; background-color: #0A4A7B; border-top: 1px solid rgba(255, 255, 255, 0.3);"></div>
        </div>
    </div>

    {{-- Brand Name --}}
    <div style="color: #0A4A7B; font-weight: 700; letter-spacing: 0.2em; font-size: 14px; animation: medvion-pulse 1.8s ease-in-out infinite;">
        MEDVION
    </div>

    <style>
        @keyframes medvion-ring-spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        @keyframes medvion-pulse { 0%, 100% { opacity: 1; } 50% { opacity: 0.5; } }
    </style>
</div>
