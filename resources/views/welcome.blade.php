<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background-color: #000;
            color: #fff;
            margin: 0;
            padding: 0;
        }

        .bg-overlay {
            background: linear-gradient(180deg, #000, #1a1a1a);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            position: relative;
        }

        .logo {
            animation: breathe 4s ease-in-out infinite, float 6s ease-in-out infinite;
        }

        nav {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
        }

        nav a {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            border: 2px solid #fff;
            text-decoration: none;
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 0.05em;
            color: #fff;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease-in-out;
        }

        nav a:hover {
            color: #000;
            background-color: #fff;
            transform: translateY(-3px);
        }

        nav a::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 0%;
            background-color: #fff;
            z-index: -1;
            transition: width 0.3s ease-in-out;
        }

        nav a:hover::before {
            width: 100%;
        }

        footer {
            position: absolute;
            bottom: 1rem;
            font-size: 0.875rem;
            color: #666;
        }

        /* Animations */
        @keyframes breathe {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.1);
            }
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        nav a:nth-child(1) {
            animation: slideIn 0.8s ease-out forwards;
            animation-delay: 0.5s;
        }

        nav a:nth-child(2) {
            animation: slideIn 0.8s ease-out forwards;
            animation-delay: 0.7s;
        }
    </style>
</head>

<body>

    <div class="bg-overlay">
        <!-- Logo -->
        <div class="logo">
            <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="150" height="150" viewBox="0 0 480 480"
                preserveAspectRatio="xMidYMid meet" class="fill-current text-white">
                <g transform="translate(0.000000,480.000000) scale(0.100000,-0.100000)" fill="#FFFFFF" stroke="none">
                    <path d="M2394 3772 c-116 -63 -174 -97 -174 -102 1 -3 81 -51 180 -108 99
                        -57 193 -117 210 -134 137 -136 65 -311 -162 -389 -52 -18 -86 -22 -193 -23
                        -163 0 -215 17 -408 133 -196 118 -239 136 -292 124 -48 -11 -335 -174 -328
                        -185 2 -5 11 -8 20 -8 8 0 105 -52 214 -116 110 -64 230 -129 267 -144 367
                        -155 890 -120 1195 79 246 161 292 390 115 577 -66 71 -99 93 -321 221 -208
                        119 -232 125 -323 75z" />
                    <path d="M3027 3591 c70 -55 119 -116 156 -191 29 -59 32 -74 32 -160 0 -110
                        -12 -147 -83 -248 -118 -169 -383 -296 -697 -333 -149 -18 -395 -6 -525 24
                        -156 37 -254 80 -476 210 -209 122 -238 132 -283 101 -48 -34 -51 -59 -51
                        -416 l1 -333 24 76 c62 190 183 295 356 306 108 8 187 -10 305 -68 316 -155
                        585 -519 690 -932 25 -95 27 -122 31 -382 4 -210 8 -285 18 -301 20 -32 70
                        -49 110 -38 32 9 596 326 590 332 -2 2 -29 -4 -60 -14 -86 -24 -222 -16 -295
                        18 -114 53 -197 163 -235 313 -33 130 -13 362 46 545 59 181 196 418 324 559
                        131 144 201 197 448 337 179 101 217 130 217 168 0 45 -27 94 -67 121 -38 26
                        -611 345 -620 345 -3 0 17 -17 44 -39z" />
                    <path d="M2089 3591 c-45 -15 -79 -43 -104 -86 -23 -39 -25 -51 -25 -188 0
                        -167 -5 -158 102 -199 66 -26 237 -36 318 -19 128 27 226 106 224 182 -2 66
                        -40 100 -230 210 -175 102 -225 119 -285 100z" />
                    <path d="M3704 3063 c-6 -10 -29 -28 -50 -39 -133 -72 -367 -212 -414 -246
                        -259 -192 -485 -575 -535 -905 -18 -120 -18 -175 -1 -274 26 -143 91 -239 196
                        -288 74 -34 194 -35 290 -2 58 20 352 182 454 250 62 41 76 83 76 234 0 115
                        -7 147 -25 118 -7 -12 -320 -193 -365 -211 -19 -8 -60 -14 -91 -14 -220 3
                        -261 305 -80 573 63 92 141 154 336 265 233 133 223 115 227 369 2 103 1 187
                        -2 187 -3 0 -10 -8 -16 -17z" />
                    <path d="M1425 2547 c-94 -32 -154 -85 -200 -176 -45 -91 -55 -162 -55 -426 0
                        -316 -18 -283 231 -428 l46 -27 -1 227 c0 225 0 229 26 284 14 31 38 65 54 76
                        164 117 418 -50 526 -344 19 -51 22 -88 27 -314 l6 -256 26 -34 c18 -23 79
                        -65 178 -122 84 -48 153 -87 156 -87 2 0 -1 15 -6 32 -5 18 -9 144 -9 279 0
                        266 -9 341 -56 486 -119 367 -425 719 -704 813 -81 27 -191 35 -245 17z" />
                    <path d="M3354 2355 c-129 -88 -234 -279 -234 -427 0 -71 18 -117 56 -147 24
                        -19 38 -22 80 -19 41 4 79 21 205 92 192 110 217 128 240 180 34 74 19 154
                        -38 208 -30 28 -231 148 -248 148 -5 -1 -33 -16 -61 -35z" />
                    <path d="M1565 2006 c-18 -19 -35 -49 -39 -66 -12 -64 -7 -419 8 -453 29 -71
                        125 -124 197 -111 19 4 89 38 157 77 139 79 134 72 108 198 -42 196 -218 389
                        -354 389 -38 0 -50 -5 -77 -34z" />
                </g>
            </svg>
        </div>

        <!-- Navigation -->
        @if (Route::has('login'))
            <nav>
                @auth
                    <a href="{{ url('/dashboard') }}">Dashboard</a>
                @else
                    <a href="{{ route('login') }}">Log In</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </nav>
        @endif

        <!-- Footer -->
        <footer>
            © {{ now()->year }} HRStreamline. All rights reserved.
        </footer>
    </div>

</body>

</html>
