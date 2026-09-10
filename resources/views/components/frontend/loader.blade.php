<div id="medvion-loader" style="
    position: fixed; inset: 0; z-index: 99999;
    background: #ffffff;
    display: flex; flex-direction: column; align-items: center; justify-content: center;
    transition: opacity 0.25s ease-out;
    pointer-events: none;
    contain: strict;
">
    {{-- Stage: Circular Orbit Rings & Centered Logo (No Pulse) --}}
    <div class="mv-loader-stage">
        {{-- Dual Precision Medical Orbit Rings (Circular Motion) --}}
        <div class="mv-rings-wrap">
            {{-- Outer Teal Precision Orbit --}}
            <svg class="mv-ring-outer" viewBox="0 0 120 120">
                <circle cx="60" cy="60" r="54" fill="none" stroke="rgba(13, 148, 136, 0.12)" stroke-width="2" />
                <circle cx="60" cy="60" r="54" fill="none" stroke="url(#mv-teal-grad)" stroke-width="2.5" stroke-linecap="round" stroke-dasharray="80 260" />
                <defs>
                    <linearGradient id="mv-teal-grad" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" stop-color="#0D9488" stop-opacity="0" />
                        <stop offset="100%" stop-color="#0D9488" stop-opacity="1" />
                    </linearGradient>
                </defs>
            </svg>

            {{-- Inner Navy Counter Orbit --}}
            <svg class="mv-ring-inner" viewBox="0 0 100 100">
                <circle cx="50" cy="50" r="44" fill="none" stroke="rgba(10, 74, 123, 0.08)" stroke-width="1.5" stroke-dasharray="4 4" />
                <circle cx="50" cy="50" r="44" fill="none" stroke="url(#mv-navy-grad)" stroke-width="2" stroke-linecap="round" stroke-dasharray="45 230" />
                <defs>
                    <linearGradient id="mv-navy-grad" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" stop-color="#0A4A7B" stop-opacity="0" />
                        <stop offset="100%" stop-color="#0A4A7B" stop-opacity="1" />
                    </linearGradient>
                </defs>
            </svg>
        </div>

        {{-- Centered Stable Logo --}}
        <div class="mv-logo-stage">
            <img src="{{ asset('favicon.png') }}"
                 alt="Medvion"
                 width="72"
                 height="72"
                 fetchpriority="high"
                 decoding="async"
                 class="mv-center-logo" />
            <div class="mv-sheen-sweep"></div>
        </div>
    </div>

    {{-- Live Medical ECG Waveform Monitor (Wave Motion) --}}
    <div class="mv-ecg-monitor">
        <svg viewBox="0 0 150 28" class="mv-ecg-svg">
            <defs>
                <linearGradient id="mv-wave-grad" x1="0%" y1="0%" x2="100%" y2="0%">
                    <stop offset="0%" stop-color="#0A4A7B" stop-opacity="0" />
                    <stop offset="35%" stop-color="#0D9488" stop-opacity="0.3" />
                    <stop offset="70%" stop-color="#0D9488" stop-opacity="1" />
                    <stop offset="100%" stop-color="#14B8A6" stop-opacity="0.9" />
                </linearGradient>
            </defs>
            {{-- Ghost Track Line --}}
            <path d="M 0,14 L 40,14 L 48,14 L 54,9 L 60,19 L 66,2 L 72,26 L 78,8 L 84,17 L 90,14 L 150,14"
                  fill="none" stroke="rgba(10, 74, 123, 0.10)" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
            {{-- Active Pulse Wave --}}
            <path class="mv-wave-beam"
                  d="M 0,14 L 40,14 L 48,14 L 54,9 L 60,19 L 66,2 L 72,26 L 78,8 L 84,17 L 90,14 L 150,14"
                  fill="none" stroke="url(#mv-wave-grad)" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
    </div>

    <style>
        /* Container Stage */
        .mv-loader-stage {
            position: relative;
            width: 120px;
            height: 120px;
            display: flex;
            align-items: center;
            justify-content: center;
            contain: layout style paint;
        }

        /* Dual Orbit Rings */
        .mv-rings-wrap {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            pointer-events: none;
        }

        .mv-ring-outer {
            position: absolute;
            width: 100%;
            height: 100%;
            transform: translateZ(0);
            animation: mv-spin-cw 2.4s linear infinite;
        }

        .mv-ring-inner {
            position: absolute;
            width: 86%;
            height: 86%;
            transform: translateZ(0);
            animation: mv-spin-ccw 1.9s linear infinite;
        }

        /* Stable Logo Stage */
        .mv-logo-stage {
            position: relative;
            width: 72px;
            height: 72px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            border-radius: 20px;
            transform: translateZ(0);
        }

        .mv-center-logo {
            display: block;
            position: relative;
            z-index: 1;
            object-fit: contain;
        }

        /* Subtle Sheen Sweep across the logo */
        .mv-sheen-sweep {
            position: absolute;
            top: -50%;
            left: -60%;
            width: 50%;
            height: 200%;
            background: linear-gradient(90deg, transparent 0%, rgba(255, 255, 255, 0.7) 50%, transparent 100%);
            transform: rotate(25deg);
            animation: mv-sheen 2.8s cubic-bezier(0.4, 0, 0.2, 1) infinite;
            pointer-events: none;
            z-index: 2;
        }

        /* Live ECG Waveform Monitor */
        .mv-ecg-monitor {
            margin-top: 18px;
            width: 140px;
            height: 26px;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0.95;
            transform: translateZ(0);
        }

        .mv-ecg-svg {
            width: 100%;
            height: 100%;
            overflow: visible;
        }

        .mv-wave-beam {
            stroke-dasharray: 50 170;
            stroke-dashoffset: 220;
            animation: mv-wave-sweep 1.6s cubic-bezier(0.25, 0.1, 0.25, 1) infinite;
        }

        /* 
           PERFORMANCE OPTIMIZED KEYFRAMES (GPU ONLY):
           No scale/pulse, zero layout shifts, zero repaints.
        */
        @keyframes mv-spin-cw {
            from { transform: rotate(0deg); }
            to   { transform: rotate(360deg); }
        }

        @keyframes mv-spin-ccw {
            from { transform: rotate(360deg); }
            to   { transform: rotate(0deg); }
        }

        @keyframes mv-wave-sweep {
            0% {
                stroke-dashoffset: 220;
                opacity: 0;
            }
            12% {
                opacity: 1;
            }
            85% {
                opacity: 1;
            }
            100% {
                stroke-dashoffset: -50;
                opacity: 0;
            }
        }

        @keyframes mv-sheen {
            0%        { transform: translateX(-120%) rotate(25deg); opacity: 0; }
            8%        { opacity: 1; }
            40%, 100% { transform: translateX(380%) rotate(25deg); opacity: 0; }
        }
    </style>
</div>
