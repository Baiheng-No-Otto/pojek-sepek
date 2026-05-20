<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan Kriteria - SkinDecide</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;700;900&family=Syne:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
    <style>
        :root {
            --neon: #82cd27;
            --neon-dim: rgba(130, 205, 39, 0.15);
            --neon-glow: rgba(130, 205, 39, 0.4);
            --gold: #f0b429;
            --bg-void: #090d12;
            --bg-deep: #0d1319;
            --bg-card: #111820;
            --bg-input: #0d1319;
            --border: rgba(255,255,255,0.07);
            --border-hover: rgba(130, 205, 39, 0.5);
            --text-primary: #e8edf3;
            --text-muted: #5a6a7a;
            --text-dim: #8898a8;
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        html { scroll-behavior: smooth; }

        body {
            font-family: 'Syne', sans-serif;
            background-color: var(--bg-void);
            color: var(--text-primary);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            position: relative;
            overflow-x: hidden;
            
            background-image: linear-gradient(to bottom, rgba(9, 13, 18, 0.85), rgba(9, 13, 18, 0.95)), url('/images/hero-bg.jpg');
            background-size: cover;
            background-position: center top;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image:
                linear-gradient(rgba(130,205,39,0.025) 1px, transparent 1px),
                linear-gradient(90deg, rgba(130,205,39,0.025) 1px, transparent 1px);
            background-size: 48px 48px;
            pointer-events: none;
            z-index: 1;
        }

        body::after {
            content: '';
            position: fixed;
            top: -30%;
            left: 50%;
            transform: translateX(-50%);
            width: 900px;
            height: 500px;
            background: radial-gradient(ellipse at center, rgba(130,205,39,0.06) 0%, transparent 70%);
            pointer-events: none;
            z-index: 1;
        }

        header {
            position: relative;
            z-index: 10;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 18px 40px;
            border-bottom: 1px solid var(--border);
            background: rgba(9,13,18,0.85);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
        }

        .logo {
            font-family: 'Orbitron', monospace;
            font-weight: 900;
            font-size: 1.5rem;
            letter-spacing: 0.05em;
            display: flex;
            align-items: center;
            gap: 2px;
            text-decoration: none;
        }

        .logo-skin {
            color: var(--neon);
            text-shadow: 0 0 20px var(--neon-glow), 0 0 40px rgba(130,205,39,0.2);
        }

        .logo-decide { color: var(--text-primary); }

        .logo-dot {
            width: 6px;
            height: 6px;
            background: var(--neon);
            border-radius: 50%;
            margin-right: 8px;
            box-shadow: 0 0 10px var(--neon-glow);
            animation: pulse-dot 2s ease-in-out infinite;
        }

        @keyframes pulse-dot {
            0%, 100% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.5; transform: scale(0.7); }
        }

        .nav-link {
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.75rem;
            letter-spacing: 0.1em;
            color: var(--text-dim);
            text-decoration: none;
            border: 1px solid rgba(255,255,255,0.06);
            padding: 8px 18px;
            border-radius: 6px;
            text-transform: uppercase;
            transition: all 0.2s ease;
            background: rgba(255,255,255,0.02);
        }

        .nav-link:hover {
            border-color: var(--neon);
            color: var(--neon);
            background: var(--neon-dim);
            box-shadow: 0 0 15px rgba(130,205,39,0.25);
        }

        main {
            position: relative;
            z-index: 5;
            flex-grow: 1;
            display: flex;
            align-items: flex-start;
            justify-content: center;
            padding: 48px 20px;
        }

        .app-container {
            width: 100%;
            max-width: 1100px;
        }

        .page-header {
            text-align: center;
            margin-bottom: 48px;
            animation: fadeSlideDown 0.6s ease both;
        }

        @keyframes fadeSlideDown {
            from { opacity: 0; transform: translateY(-20px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .page-header .label {
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.65rem;
            letter-spacing: 0.2em;
            color: var(--neon);
            text-transform: uppercase;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .page-header .label::before,
        .page-header .label::after {
            content: '';
            display: block;
            width: 40px;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--neon));
        }

        .page-header .label::after {
            background: linear-gradient(90deg, var(--neon), transparent);
        }

        .page-header h1 {
            font-family: 'Orbitron', monospace;
            font-size: clamp(1.6rem, 4vw, 2.6rem);
            font-weight: 900;
            letter-spacing: 0.04em;
            color: var(--text-primary);
            line-height: 1.15;
            margin-bottom: 14px;
        }

        .page-header h1 span { color: var(--neon); }

        .page-header p {
            font-size: 0.85rem;
            color: var(--text-dim);
            max-width: 750px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* ─── GRID LAYOUT FOR CARDS ─── */
        .criteria-list-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 24px;
            margin-bottom: 48px;
        }

        @media (min-width: 768px) {
            .criteria-list-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        .criteria-card {
            background: rgba(17, 24, 32, 0.85);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 24px;
            position: relative;
            transition: border-color 0.3s ease, box-shadow 0.3s ease, transform 0.3s ease;
            animation: cardIn 0.4s ease both;
        }

        @keyframes cardIn {
            from { opacity: 0; transform: translateY(16px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .criteria-card:hover {
            border-color: rgba(130,205,39,0.25);
            box-shadow: 0 8px 32px rgba(0,0,0,0.4), 0 0 0 1px rgba(130,205,39,0.08);
            transform: translateY(-2px);
        }

        .criteria-card-title {
            font-family: 'Orbitron', monospace;
            font-size: 1rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid var(--border);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .criteria-card-title span.badge {
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.65rem;
            padding: 2px 8px;
            border-radius: 4px;
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.08);
            color: var(--text-dim);
        }

        .criteria-card-title span.badge.max {
            border-color: rgba(130,205,39,0.3);
            color: var(--neon);
            background: rgba(130,205,39,0.05);
        }

        .criteria-card-title span.badge.min {
            border-color: rgba(240,180,41,0.3);
            color: var(--gold);
            background: rgba(240,180,41,0.05);
        }

        /* ─── FORM CONTROLS ─── */
        .form-group {
            margin-bottom: 14px;
        }

        .form-row-2 {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
        }

        .form-label {
            display: block;
            font-size: 0.65rem;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: var(--text-muted);
            margin-bottom: 6px;
            font-weight: 600;
        }

        .form-input,
        .form-select {
            width: 100%;
            background: var(--bg-input);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 8px;
            padding: 9px 12px;
            font-size: 0.82rem;
            font-family: 'Syne', sans-serif;
            color: var(--text-primary);
            outline: none;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
            appearance: none;
            -webkit-appearance: none;
        }

        .form-select {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%235a6a7a' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 10px center;
            padding-right: 28px;
            cursor: pointer;
        }

        .form-input:focus,
        .form-select:focus {
            border-color: var(--neon);
            box-shadow: 0 0 0 3px rgba(130,205,39,0.1);
        }

        /* ─── PARAMETERS CONTAINER ─── */
        .parameters-container {
            margin-top: 14px;
            padding: 14px;
            background: rgba(0,0,0,0.2);
            border: 1px dashed rgba(255,255,255,0.05);
            border-radius: 8px;
            display: none; /* dynamically displayed */
        }

        .parameters-title {
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.65rem;
            letter-spacing: 0.05em;
            color: var(--text-dim);
            margin-bottom: 10px;
            text-transform: uppercase;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .parameters-title::before {
            content: '';
            display: inline-block;
            width: 4px;
            height: 4px;
            background: var(--neon);
            border-radius: 50%;
        }

        .parameter-desc {
            font-size: 0.6rem;
            color: var(--text-muted);
            line-height: 1.4;
            margin-top: 4px;
        }

        /* ─── BUTTONS ─── */
        .btn-container {
            display: flex;
            gap: 10px;
            margin-top: 20px;
            border-top: 1px solid var(--border);
            padding-top: 16px;
        }

        .btn-action {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            padding: 10px 16px;
            border-radius: 8px;
            font-family: 'Syne', sans-serif;
            font-size: 0.8rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            text-decoration: none;
            outline: none;
        }

        .btn-update {
            background: var(--neon-dim);
            border: 1px solid rgba(130,205,39,0.3);
            color: var(--neon);
        }

        .btn-update:hover {
            background: var(--neon);
            border-color: var(--neon);
            color: #000;
            box-shadow: 0 4px 15px rgba(130,205,39,0.25);
        }

        .btn-danger {
            background: rgba(239, 68, 68, 0.08);
            border: 1px solid rgba(239, 68, 68, 0.25);
            color: #f87171;
            flex: 0 0 auto;
            width: 42px;
            padding: 10px 0;
        }

        .btn-danger:hover {
            border-color: rgba(239, 68, 68, 0.6);
            color: #fff;
            background: rgba(239, 68, 68, 0.6);
            box-shadow: 0 4px 15px rgba(239,68,68,0.25);
        }

        .btn-submit {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
            padding: 12px 24px;
            background: var(--neon);
            border: none;
            border-radius: 8px;
            color: #000;
            font-family: 'Orbitron', monospace;
            font-size: 0.8rem;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            cursor: pointer;
            transition: all 0.25s ease;
            box-shadow: 0 4px 15px rgba(130,205,39,0.3);
            margin-top: 14px;
        }

        .btn-submit:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(130,205,39,0.45);
        }

        /* ─── CORNER DECORATIONS ─── */
        .corner-deco {
            position: absolute;
            width: 14px;
            height: 14px;
            pointer-events: none;
        }

        .corner-deco-tl { top: 0; left: 0; border-top: 1.5px solid var(--neon); border-left: 1.5px solid var(--neon); }
        .corner-deco-tr { top: 0; right: 0; border-top: 1.5px solid var(--neon); border-right: 1.5px solid var(--neon); }
        .corner-deco-bl { bottom: 0; left: 0; border-bottom: 1.5px solid var(--neon); border-left: 1.5px solid var(--neon); }
        .corner-deco-br { bottom: 0; right: 0; border-bottom: 1.5px solid var(--neon); border-right: 1.5px solid var(--neon); }

        /* ─── SELECT FIX ─── */
        select option {
            background: #111820;
            color: #e8edf3;
        }

        /* ─── ADD NEW SECTION ─── */
        .section-separator {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 32px;
            margin-top: 16px;
        }

        .section-separator h2 {
            font-family: 'Orbitron', monospace;
            font-size: 1.1rem;
            font-weight: 700;
            letter-spacing: 0.06em;
            color: var(--text-primary);
            white-space: nowrap;
        }

        .section-separator h2 span { color: var(--neon); }

        .section-separator-line {
            flex: 1;
            height: 1px;
            background: linear-gradient(90deg, var(--border-hover), transparent);
        }

        .new-criteria-card {
            background: rgba(17, 24, 32, 0.7);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            border: 1px dashed rgba(130,205,39,0.3);
            border-radius: 14px;
            padding: 28px;
            position: relative;
            margin-bottom: 48px;
        }

        /* ─── TOAST NOTIFICATION ─── */
        #toast-container {
            position: fixed;
            bottom: 28px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 9999;
        }

        .toast {
            background: #111820;
            border: 1px solid var(--neon);
            color: var(--text-primary);
            font-family: 'Syne', sans-serif;
            font-size: 0.85rem;
            padding: 12px 24px;
            border-radius: 8px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.5), 0 0 10px rgba(130,205,39,0.15);
            animation: toastIn 0.3s ease both;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .toast-success::before {
            content: '✓';
            color: var(--neon);
            font-weight: 700;
        }

        @keyframes toastIn {
            from { opacity: 0; transform: translateY(12px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* ─── SCROLL ─── */
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: rgba(130,205,39,0.2); border-radius: 3px; }
        ::-webkit-scrollbar-thumb:hover { background: rgba(130,205,39,0.4); }
    </style>
</head>
<body>

    <header>
        <a href="/" class="logo">
            <div class="logo-dot"></div>
            <span class="logo-skin">SKIN</span><span class="logo-decide">DECIDE</span>
        </a>
        <a href="/" class="nav-link">← Halaman Utama</a>
    </header>

    <main>
        <div class="app-container">

            <div class="page-header">
                <div class="label">SkinDecide - Konfigurasi Sistem</div>
                <h1>Pengaturan <span>Kriteria</span></h1>
                <p>Sesuaikan tipe kriteria, bobot kepentingan, serta tipe fungsi preferensi PROMETHEE beserta batas threshold ($p, q, s$).</p>
            </div>

            @if(session('success'))
                <div id="toast-container">
                    <div class="toast toast-success">
                        {{ session('success') }}
                    </div>
                </div>
                <script>
                    setTimeout(() => {
                        const toast = document.querySelector('.toast');
                        if (toast) {
                            toast.style.opacity = '0';
                            toast.style.transition = 'opacity 0.5s ease';
                            setTimeout(() => toast.remove(), 500);
                        }
                    }, 3000);
                </script>
            @endif

            <form id="delete-form" method="POST" style="display:none;">
                @csrf
                @method('DELETE')
            </form>

            <div class="section-separator">
                <h2>Daftar <span>Kriteria</span> Aktif</h2>
                <div class="section-separator-line"></div>
            </div>

            <div class="criteria-list-grid">
                @foreach($criterias as $criteria)
                    <div class="criteria-card" id="card-{{ $criteria->id }}">
                        <div class="corner-deco corner-deco-tl"></div>
                        <div class="corner-deco corner-deco-tr"></div>
                        <div class="corner-deco corner-deco-bl"></div>
                        <div class="corner-deco corner-deco-br"></div>

                        <form action="{{ route('kriteria.update', $criteria->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="criteria-card-title">
                                <span>{{ $criteria->name }}</span>
                                <span class="badge {{ $criteria->type }}">
                                    {{ $criteria->type === 'maximize' ? 'Maximize (▲)' : 'Minimize (▼)' }}
                                </span>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Nama Kriteria</label>
                                <input type="text" name="name" value="{{ old('name', $criteria->name) }}" required class="form-input">
                            </div>

                            <div class="form-row-2">
                                <div class="form-group">
                                    <label class="form-label">Tipe Optimasi</label>
                                    <select name="type" class="form-select">
                                        <option value="maximize" {{ $criteria->type === 'maximize' ? 'selected' : '' }}>Maximize</option>
                                        <option value="minimize" {{ $criteria->type === 'minimize' ? 'selected' : '' }}>Minimize</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Bobot (Weight)</label>
                                    <input type="number" step="0.01" name="weight" value="{{ old('weight', $criteria->weight) }}" required class="form-input">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Fungsi Preferensi</label>
                                <select name="preference_function" class="form-select preference-select" onchange="toggleParams(this, {{ $criteria->id }})">
                                    <option value="usual" {{ $criteria->preference_function === 'usual' ? 'selected' : '' }}>Tipe I — Usual (Biasa)</option>
                                    <option value="linear" {{ $criteria->preference_function === 'linear' ? 'selected' : '' }}>Tipe II — Linear (V-Shape)</option>
                                    <option value="quasi" {{ $criteria->preference_function === 'quasi' ? 'selected' : '' }}>Tipe III — Quasi (U-Shape)</option>
                                    <option value="linear_quasi" {{ $criteria->preference_function === 'linear_quasi' ? 'selected' : '' }}>Tipe IV — Linear Quasi (V-Shape Indifference)</option>
                                    <option value="level" {{ $criteria->preference_function === 'level' ? 'selected' : '' }}>Tipe V — Level (Tingkat)</option>
                                    <option value="gaussian" {{ $criteria->preference_function === 'gaussian' ? 'selected' : '' }}>Tipe VI — Gaussian</option>
                                </select>
                            </div>

                            <!-- Parameters dynamic block -->
                            <div class="parameters-container" id="params-container-{{ $criteria->id }}">
                                <div class="parameters-title">Parameter Threshold</div>
                                
                                <div class="form-row-2">
                                    <div class="form-group param-field-p" id="p-field-{{ $criteria->id }}">
                                        <label class="form-label">Preference (p)</label>
                                        <input type="number" step="any" name="p" value="{{ old('p', $criteria->p) }}" class="form-input">
                                        <p class="parameter-desc">Selisih minimum untuk preferensi mutlak.</p>
                                    </div>
                                    <div class="form-group param-field-q" id="q-field-{{ $criteria->id }}">
                                        <label class="form-label">Indifference (q)</label>
                                        <input type="number" step="any" name="q" value="{{ old('q', $criteria->q) }}" class="form-input">
                                        <p class="parameter-desc">Selisih maksimum di mana tidak ada perbedaan.</p>
                                    </div>
                                </div>

                                <div class="form-group param-field-s" id="s-field-{{ $criteria->id }}">
                                    <label class="form-label">Gaussian (s)</label>
                                    <input type="number" step="any" name="s" value="{{ old('s', $criteria->s) }}" class="form-input">
                                    <p class="parameter-desc">Parameter s (standar deviasi deviasi gaussian).</p>
                                </div>
                            </div>

                            <div class="btn-container">
                                <button type="submit" class="btn-action btn-update">Simpan</button>
                                <button type="button" class="btn-action btn-danger" onclick="confirmDelete({{ $criteria->id }}, '{{ $criteria->name }}')">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3 6h18m-2 0v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6m3 0V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2m-6 5v6m4-6v6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </button>
                            </div>

                        </form>
                    </div>
                @endforeach
            </div>

            <div class="section-separator">
                <h2>Tambah <span>Kriteria Baru</span></h2>
                <div class="section-separator-line"></div>
            </div>

            <div class="new-criteria-card">
                <div class="corner-deco corner-deco-tl"></div>
                <div class="corner-deco corner-deco-tr"></div>
                <div class="corner-deco corner-deco-bl"></div>
                <div class="corner-deco corner-deco-br"></div>

                <form action="{{ route('kriteria.store') }}" method="POST">
                    @csrf

                    <div class="form-row-2">
                        <div class="form-group">
                            <label class="form-label">Nama Kriteria Baru</label>
                            <input type="text" name="name" placeholder="Misal: Efek Suara Skin" required value="{{ old('name') }}" class="form-input">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Tipe Optimasi</label>
                            <select name="type" class="form-select">
                                <option value="maximize">Maximize</option>
                                <option value="minimize">Minimize</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row-2">
                        <div class="form-group">
                            <label class="form-label">Bobot (Weight)</label>
                            <input type="number" step="0.01" name="weight" placeholder="1.0" required value="{{ old('weight') }}" class="form-input">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Fungsi Preferensi</label>
                            <select name="preference_function" class="form-select preference-select" onchange="toggleParams(this, 'new')">
                                <option value="usual" selected>Tipe I — Usual (Biasa)</option>
                                <option value="linear">Tipe II — Linear (V-Shape)</option>
                                <option value="quasi">Tipe III — Quasi (U-Shape)</option>
                                <option value="linear_quasi">Tipe IV — Linear Quasi (V-Shape Indifference)</option>
                                <option value="level">Tipe V — Level (Tingkat)</option>
                                <option value="gaussian">Tipe VI — Gaussian</option>
                            </select>
                        </div>
                    </div>

                    <!-- Parameters dynamic block for new criteria -->
                    <div class="parameters-container" id="params-container-new">
                        <div class="parameters-title">Parameter Threshold</div>
                        
                        <div class="form-row-2">
                            <div class="form-group param-field-p" id="p-field-new">
                                <label class="form-label">Preference (p)</label>
                                <input type="number" step="any" name="p" placeholder="0" class="form-input">
                                <p class="parameter-desc">Selisih minimum untuk preferensi mutlak.</p>
                            </div>
                            <div class="form-group param-field-q" id="q-field-new">
                                <label class="form-label">Indifference (q)</label>
                                <input type="number" step="any" name="q" placeholder="0" class="form-input">
                                <p class="parameter-desc">Selisih maksimum di mana tidak ada perbedaan.</p>
                            </div>
                        </div>

                        <div class="form-group param-field-s" id="s-field-new">
                            <label class="form-label">Gaussian (s)</label>
                            <input type="number" step="any" name="s" placeholder="0" class="form-input">
                            <p class="parameter-desc">Parameter s (standar deviasi deviasi gaussian).</p>
                        </div>
                    </div>

                    <button type="submit" class="btn-submit">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 5v14M5 12h14" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
                        </svg>
                        Tambahkan Kriteria Baru
                    </button>
                </form>
            </div>

        </div>
    </main>

    <footer>
        <div class="footer-brand"><span>SKIN</span>DECIDE</div>
        <div class="footer-copy">&copy; 2026 Promethee Team</div>
    </footer>

    <script>
        function toggleParams(selectElement, id) {
            const val = selectElement.value;
            const container = document.getElementById(`params-container-${id}`);
            const pField = document.getElementById(`p-field-${id}`);
            const qField = document.getElementById(`q-field-${id}`);
            const sField = document.getElementById(`s-field-${id}`);

            if (val === 'usual') {
                container.style.display = 'none';
            } else {
                container.style.display = 'block';
                
                if (val === 'linear') {
                    pField.style.display = 'block';
                    qField.style.display = 'none';
                    sField.style.display = 'none';
                } else if (val === 'quasi') {
                    pField.style.display = 'none';
                    qField.style.display = 'block';
                    sField.style.display = 'none';
                } else if (val === 'linear_quasi' || val === 'level') {
                    pField.style.display = 'block';
                    qField.style.display = 'block';
                    sField.style.display = 'none';
                } else if (val === 'gaussian') {
                    pField.style.display = 'none';
                    qField.style.display = 'none';
                    sField.style.display = 'block';
                }
            }
        }

        function confirmDelete(id, name) {
            if (confirm(`Apakah Anda yakin ingin menghapus kriteria "${name}"? Tindakan ini tidak dapat dibatalkan.`)) {
                const form = document.getElementById('delete-form');
                form.action = `/kriteria/${id}`;
                form.submit();
            }
        }

        // Initialize state on page load
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.preference-select').forEach(select => {
                // Find ID from the element's onchange attribute structure
                const match = select.getAttribute('onchange').match(/toggleParams\(this,\s*(.+)\)/);
                if (match) {
                    const id = match[1].replace(/['"]/g, '');
                    toggleParams(select, id);
                }
            });
        });
    </script>
</body>
</html>
