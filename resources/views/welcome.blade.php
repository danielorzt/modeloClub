{{-- resources/views/welcome.blade.php --}}
    <!DOCTYPE html>
{{-- Define el idioma y prepara para el tema oscuro/claro --}}
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="light"> {{-- Empieza en claro por defecto --}}
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Título (podrías hacerlo traducible también si quieres) --}}
    <title>CashFlow - {{ __('messages.title_suffix') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        /* Define variables CSS para el tema claro */
        :root, html[data-bs-theme="light"] {
            --bs-body-bg: #ffffff;
            --bs-body-color: #212529;
            --bs-secondary-bg: #f8f9fa; /* bg-light */
            --bs-tertiary-bg: #ffffff; /* bg-white */
            --bs-emphasis-color: #000000;
            --bs-secondary-color: #6c757d; /* text-muted */
            --bs-primary-rgb: 78, 84, 200; /* Color primario #4e54c8 como RGB */
            --bs-primary: #4e54c8;
            --bs-primary-hover: #3a41b5;
            --bs-border-color: #dee2e6;
            --bs-link-color: #4e54c8;
            --bs-link-hover-color: #3a41b5;
            --custom-hero-gradient: linear-gradient(135deg, #6B73FF 0%, #000DFF 100%);
            --custom-hero-text: white;
            --custom-feature-icon-color: var(--bs-primary);
            --custom-card-shadow: 0 10px 20px rgba(0,0,0,0.1);
            --custom-footer-bg: #212529; /* bg-dark */
            --custom-footer-text: white;
            --custom-footer-text-muted: rgba(255, 255, 255, 0.5);
        }

        /* Define variables CSS para el tema oscuro */
        html[data-bs-theme="dark"] {
            --bs-body-bg: #212529;
            --bs-body-color: #dee2e6;
            --bs-secondary-bg: #343a40; /* Un gris más oscuro para bg-light en dark mode */
            --bs-tertiary-bg: #2b3035; /* Un gris oscuro para bg-white en dark mode */
            --bs-emphasis-color: #ffffff;
            --bs-secondary-color: #adb5bd; /* text-muted más claro */
            --bs-primary-rgb: 110, 117, 255; /* Un primario ligeramente más brillante? Ajustar */
            --bs-primary: #6e75ff; /* Ajustar color primario para dark mode */
            --bs-primary-hover: #868cff;
            --bs-border-color: #495057;
            --bs-link-color: #868cff;
            --bs-link-hover-color: #a0a5ff;
            --custom-hero-gradient: linear-gradient(135deg, #3a41b5 0%, #0007a1 100%); /* Gradiente más oscuro */
            --custom-hero-text: #dee2e6;
            --custom-feature-icon-color: var(--bs-primary);
            --custom-card-shadow: 0 10px 20px rgba(255,255,255,0.05);
            --custom-footer-bg: #1a1d20; /* Footer aún más oscuro */
            --custom-footer-text: #dee2e6;
            --custom-footer-text-muted: rgba(222, 230, 238, 0.5);
            /* Ajustes específicos para elementos Bootstrap en modo oscuro si es necesario */
            --bs-navbar-color: rgba(222, 230, 238, 0.75);
            --bs-navbar-hover-color: rgba(222, 230, 238, 0.9);
            --bs-nav-link-color: rgba(222, 230, 238, 0.75);
            --bs-nav-link-hover-color: rgba(222, 230, 238, 0.9);
            --bs-nav-pills-link-active-bg: var(--bs-primary);
            --bs-accordion-bg: var(--bs-tertiary-bg);
            --bs-accordion-border-color: var(--bs-border-color);
            --bs-accordion-button-color: var(--bs-body-color);
            --bs-accordion-button-icon: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23adb5bd'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
            --bs-accordion-active-color: var(--bs-primary);
            --bs-accordion-active-bg: var(--bs-tertiary-bg); /* O un color ligeramente diferente */
        }

        /* Aplicar variables a estilos personalizados */
        .hero-section {
            background: var(--custom-hero-gradient);
            color: var(--custom-hero-text);
        }
        .feature-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: var(--custom-feature-icon-color);
        }
        .testimonial-card {
            border-radius: 15px;
            box-shadow: var(--custom-card-shadow);
            transition: transform 0.3s ease;
            background-color: var(--bs-tertiary-bg); /* Usar variable para fondo de tarjeta */
            border: 1px solid var(--bs-border-color); /* Añadir borde sutil */
        }
        .testimonial-card:hover {
            transform: translateY(-5px);
        }
        .how-it-works-step {
            position: relative;
            padding-left: 3rem;
        }
        .how-it-works-step:before {
            content: attr(data-step);
            position: absolute;
            left: 0;
            top: 0;
            background: var(--bs-primary);
            color: var(--bs-body-bg); /* Texto claro sobre fondo primario */
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }
        .calculator-result {
            background-color: var(--bs-secondary-bg); /* Usar variable */
            border-radius: 8px;
            padding: 1.5rem;
            margin-top: 1rem;
            border: 1px solid var(--bs-border-color);
        }
        .nav-pills .nav-link.active {
            background-color: var(--bs-primary);
        }
        /* Botones primarios */
        .btn-primary {
            background-color: var(--bs-primary);
            border-color: var(--bs-primary);
            /* Asegurar contraste de texto en botón */
            color: var(--bs-tertiary-bg); /* O un color específico como #fff */
        }
        .btn-primary:hover {
            background-color: var(--bs-primary-hover);
            border-color: var(--bs-primary-hover);
            color: var(--bs-tertiary-bg);
        }
        /* Botones outline primarios */
        .btn-outline-primary {
            color: var(--bs-primary);
            border-color: var(--bs-primary);
        }
        .btn-outline-primary:hover {
            color: var(--bs-tertiary-bg); /* O blanco */
            background-color: var(--bs-primary);
            border-color: var(--bs-primary);
        }
        /* Estilo para sección bg-light */
        .bg-light {
            background-color: var(--bs-secondary-bg) !important; /* Forzar sobreescritura */
        }
        /* Estilo para sección bg-dark del footer */
        .bg-dark {
            background-color: var(--custom-footer-bg) !important; /* Forzar sobreescritura */
            color: var(--custom-footer-text);
        }
        .bg-dark .text-white-50 {
            color: var(--custom-footer-text-muted) !important;
        }
        .bg-dark a.text-white-50:hover {
            color: var(--custom-footer-text) !important;
        }
        .bg-dark .text-white {
            color: var(--custom-footer-text) !important;
        }
        .bg-dark a.text-white:hover {
            color: var(--custom-footer-text-muted) !important; /* O un color más brillante */
        }
        /* Navbar background */
        .navbar.bg-white {
            background-color: var(--bs-tertiary-bg) !important;
        }
        /* Ajuste para navbar toggler icon en modo oscuro */
        [data-bs-theme="dark"] .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28222, 230, 238, 0.75%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        /* Estilo para el botón de cambio de tema */
        .theme-toggle-btn {
            cursor: pointer;
            font-size: 1.25rem; /* Tamaño del icono */
        }

    </style>
</head>
<body>
{{-- Aplicar clases de Bootstrap para color de fondo y texto --}}
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('home') }}" style="color: var(--bs-primary);"> {{-- Usar variable --}}
            <i class="fas fa-hand-holding-usd me-2"></i>CashFlow
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="{{ __('messages.navbar_toggle') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center"> {{-- align-items-center para alinear verticalmente los iconos --}}
                <li class="nav-item">
                    <a class="nav-link" href="#borrow">{{ __('messages.navbar_borrow') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#lend">{{ __('messages.navbar_lend') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#how-it-works">{{ __('messages.navbar_how_it_works') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#testimonials">{{ __('messages.navbar_testimonials') }}</a>
                </li>
                <li class="nav-item ms-lg-3">
                    <a class="btn btn-outline-primary" href="#login">{{ __('messages.navbar_login') }}</a>
                </li>
                <li class="nav-item ms-lg-2">
                    <a class="btn btn-primary" href="#signup">{{ __('messages.navbar_signup') }}</a>
                </li>

                {{-- Selector de Idioma --}}
                <li class="nav-item dropdown ms-lg-2">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownLanguage" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-globe me-1"></i> {{ strtoupper(app()->getLocale()) }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownLanguage">
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <li>
                                <a class="dropdown-item {{ app()->getLocale() == $localeCode ? 'active' : '' }}" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    {{ $properties['native'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>

                {{-- Selector de Tema --}}
                <li class="nav-item ms-lg-2">
                    <a class="nav-link theme-toggle-btn" id="theme-toggler" title="{{ __('messages.toggle_theme') }}">
                        <i class="fas fa-sun" id="theme-icon-light"></i>
                        <i class="fas fa-moon d-none" id="theme-icon-dark"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<section class="hero-section py-5">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h1 class="display-4 fw-bold mb-4">{{ __('messages.hero_title') }}</h1>
                <p class="lead mb-4">{{ __('messages.hero_subtitle') }}</p>
                <div class="d-flex flex-wrap gap-3">
                    {{-- El estilo del botón claro se ajustará automáticamente con el tema de Bootstrap --}}
                    <a href="#borrow" class="btn btn-light btn-lg px-4">{{ __('messages.hero_button_need') }}</a>
                    {{-- El estilo del botón outline-light también se ajustará --}}
                    <a href="#lend" class="btn btn-outline-light btn-lg px-4">{{ __('messages.hero_button_lend') }}</a>
                </div>
            </div>
            <div class="col-lg-6">
                {{-- Considera tener imágenes alternativas para modo oscuro si es necesario --}}
                <img src="https://images.unsplash.com/photo-1579621970563-ebec7560ff3e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&q=80" alt="{{ __('messages.hero_image_alt') }}" class="img-fluid rounded-4 shadow">
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light"> {{-- bg-light usará variable --}}
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold">{{ __('messages.features_title') }}</h2>
            <p class="lead text-muted">{{ __('messages.features_subtitle') }}</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                {{-- bg-white usará variable --}}
                <div class="text-center p-4 h-100 bg-white rounded-3 shadow-sm">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h4>{{ __('messages.feature_secure_title') }}</h4>
                    <p class="text-muted">{{ __('messages.feature_secure_text') }}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="text-center p-4 h-100 bg-white rounded-3 shadow-sm">
                    <div class="feature-icon">
                        <i class="fas fa-percentage"></i>
                    </div>
                    <h4>{{ __('messages.feature_rates_title') }}</h4>
                    <p class="text-muted">{{ __('messages.feature_rates_text') }}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="text-center p-4 h-100 bg-white rounded-3 shadow-sm">
                    <div class="feature-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h4>{{ __('messages.feature_terms_title') }}</h4>
                    <p class="text-muted">{{ __('messages.feature_terms_text') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5" id="borrow">
    <div class="container py-5">
        {{-- Los nav-pills se ajustarán con el tema --}}
        <ul class="nav nav-pills mb-4 justify-content-center" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-borrow-tab" data-bs-toggle="pill" data-bs-target="#pills-borrow" type="button" role="tab">{{ __('messages.tab_borrow_title') }}</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-lend-tab" data-bs-toggle="pill" data-bs-target="#pills-lend" type="button" role="tab">{{ __('messages.tab_lend_title') }}</button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-borrow" role="tabpanel">
                <div class="row">
                    <div class="col-lg-6 mb-4 mb-lg-0">
                        <h2 class="fw-bold mb-4">{{ __('messages.borrow_section_title') }}</h2>
                        <p class="lead mb-4">{{ __('messages.borrow_section_subtitle') }}</p>
                        <div class="mb-4">
                            <div class="how-it-works-step mb-4" data-step="1">
                                <h5>{{ __('messages.borrow_step1_title') }}</h5>
                                <p class="text-muted">{{ __('messages.borrow_step1_text') }}</p>
                            </div>
                            <div class="how-it-works-step mb-4" data-step="2">
                                <h5>{{ __('messages.borrow_step2_title') }}</h5>
                                <p class="text-muted">{{ __('messages.borrow_step2_text') }}</p>
                            </div>
                            <div class="how-it-works-step" data-step="3">
                                <h5>{{ __('messages.borrow_step3_title') }}</h5>
                                <p class="text-muted">{{ __('messages.borrow_step3_text') }}</p>
                            </div>
                        </div>
                        <a href="#signup" class="btn btn-primary btn-lg px-4">{{ __('messages.borrow_apply_button') }}</a>
                    </div>
                    <div class="col-lg-6">
                        {{-- La tarjeta usará variables --}}
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-4">
                                <h4 class="mb-4">{{ __('messages.borrow_calculator_title') }}</h4>
                                <form id="borrow-calculator">
                                    <div class="mb-3">
                                        <label for="loan-amount" class="form-label">{{ __('messages.calculator_loan_amount') }} ($)</label>
                                        <input type="range" class="form-range" min="100" max="10000" step="100" id="loan-amount" value="2000">
                                        <div class="d-flex justify-content-between">
                                            <span>$100</span>
                                            <span>$10,000</span>
                                        </div>
                                        <div class="mt-2">
                                            <input type="number" class="form-control" id="loan-amount-input" value="2000">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="loan-term" class="form-label">{{ __('messages.calculator_loan_term') }}</label>
                                        <select class="form-select" id="loan-term">
                                            <option value="3">{{ __('messages.term_3_months') }}</option>
                                            <option value="6">{{ __('messages.term_6_months') }}</option>
                                            <option value="12" selected>{{ __('messages.term_12_months') }}</option>
                                            <option value="24">{{ __('messages.term_24_months') }}</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="credit-score" class="form-label">{{ __('messages.calculator_credit_score') }}</label>
                                        <select class="form-select" id="credit-score">
                                            <option value="excellent">{{ __('messages.score_excellent') }} (720+)</option>
                                            <option value="good" selected>{{ __('messages.score_good') }} (680-719)</option>
                                            <option value="fair">{{ __('messages.score_fair') }} (640-679)</option>
                                            <option value="poor">{{ __('messages.score_poor') }} (639 {{ __('messages.or_below') }})</option>
                                        </select>
                                    </div>
                                    <button type="button" class="btn btn-primary w-100" id="calculate-borrow">{{ __('messages.calculator_calculate_button') }}</button>
                                </form>
                                <div class="calculator-result d-none" id="borrow-result">
                                    <h5>{{ __('messages.calculator_borrow_result_title') }}</h5>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>{{ __('messages.calculator_monthly_payment') }}:</span>
                                        <span class="fw-bold" id="monthly-payment">$187.50</span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>{{ __('messages.calculator_interest_rate') }}:</span>
                                        <span class="fw-bold" id="interest-rate">7.5%</span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span>{{ __('messages.calculator_total_repayment') }}:</span>
                                        <span class="fw-bold" id="total-repayment">$2,250.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="pills-lend" role="tabpanel">
                <div class="row">
                    <div class="col-lg-6 mb-4 mb-lg-0">
                        <h2 class="fw-bold mb-4">{{ __('messages.lend_section_title') }}</h2>
                        <p class="lead mb-4">{{ __('messages.lend_section_subtitle') }}</p>
                        <div class="mb-4">
                            <div class="how-it-works-step mb-4" data-step="1">
                                <h5>{{ __('messages.lend_step1_title') }}</h5>
                                <p class="text-muted">{{ __('messages.lend_step1_text') }}</p>
                            </div>
                            <div class="how-it-works-step mb-4" data-step="2">
                                <h5>{{ __('messages.lend_step2_title') }}</h5>
                                <p class="text-muted">{{ __('messages.lend_step2_text') }}</p>
                            </div>
                            <div class="how-it-works-step" data-step="3">
                                <h5>{{ __('messages.lend_step3_title') }}</h5>
                                <p class="text-muted">{{ __('messages.lend_step3_text') }}</p>
                            </div>
                        </div>
                        <a href="#signup" class="btn btn-primary btn-lg px-4">{{ __('messages.lend_start_button') }}</a>
                    </div>
                    <div class="col-lg-6">
                        <div class="card border-0 shadow-sm"> {{-- La tarjeta usará variables --}}
                            <div class="card-body p-4">
                                <h4 class="mb-4">{{ __('messages.lend_calculator_title') }}</h4>
                                <form id="lend-calculator">
                                    <div class="mb-3">
                                        <label for="investment-amount" class="form-label">{{ __('messages.calculator_investment_amount') }} ($)</label>
                                        <input type="range" class="form-range" min="500" max="50000" step="100" id="investment-amount" value="5000">
                                        <div class="d-flex justify-content-between">
                                            <span>$500</span>
                                            <span>$50,000</span>
                                        </div>
                                        <div class="mt-2">
                                            <input type="number" class="form-control" id="investment-amount-input" value="5000">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="investment-term" class="form-label">{{ __('messages.calculator_investment_term') }}</label>
                                        <select class="form-select" id="investment-term">
                                            <option value="6">{{ __('messages.term_6_months') }}</option>
                                            <option value="12" selected>{{ __('messages.term_12_months') }}</option>
                                            <option value="24">{{ __('messages.term_24_months') }}</option>
                                            <option value="36">{{ __('messages.term_36_months') }}</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="expected-return" class="form-label">{{ __('messages.calculator_expected_return') }}</label>
                                        <select class="form-select" id="expected-return">
                                            <option value="conservative">{{ __('messages.return_conservative') }} (5-8%)</option>
                                            <option value="balanced" selected>{{ __('messages.return_balanced') }} (8-12%)</option>
                                            <option value="aggressive">{{ __('messages.return_aggressive') }} (12-15%)</option>
                                        </select>
                                    </div>
                                    <button type="button" class="btn btn-primary w-100" id="calculate-lend">{{ __('messages.calculator_calculate_button') }}</button>
                                </form>
                                <div class="calculator-result d-none" id="lend-result">
                                    <h5>{{ __('messages.calculator_lend_result_title') }}</h5>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>{{ __('messages.calculator_monthly_income') }}:</span>
                                        <span class="fw-bold" id="monthly-income">$45.83</span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>{{ __('messages.calculator_annual_return') }}:</span>
                                        <span class="fw-bold" id="annual-return">11%</span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span>{{ __('messages.calculator_total_earnings') }}:</span>
                                        <span class="fw-bold" id="total-earnings">$550.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light" id="how-it-works"> {{-- bg-light usará variable --}}
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold">{{ __('messages.how_it_works_title') }}</h2>
            <p class="lead text-muted">{{ __('messages.how_it_works_subtitle') }}</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                {{-- La tarjeta usará variables --}}
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        {{-- El fondo del círculo también podría usar una variable si quieres cambiarlo por tema --}}
                        <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="fas fa-user-plus fs-3 text-primary"></i> {{-- text-primary usará variable --}}
                        </div>
                        <h4>1. {{ __('messages.how_step1_title') }}</h4>
                        <p class="text-muted">{{ __('messages.how_step1_text') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="fas fa-search-dollar fs-3 text-primary"></i>
                        </div>
                        <h4>2. {{ __('messages.how_step2_title') }}</h4>
                        <p class="text-muted">{{ __('messages.how_step2_text') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="fas fa-handshake fs-3 text-primary"></i>
                        </div>
                        <h4>3. {{ __('messages.how_step3_title') }}</h4>
                        <p class="text-muted">{{ __('messages.how_step3_text') }}</p>
                    </div>
                </div>
            </div>
        </div>
        {{-- Ejemplo de cómo mostrar datos del HomeController --}}
        <div class="text-center mt-5">
            <p class="text-muted">{{ __('messages.total_members') }}: {{ $totalAsociados ?? 'N/A' }} | {{ __('messages.total_activities') }}: {{ $totalActividades ?? 'N/A' }}</p>
            @if(isset($ultimasActividades) && $ultimasActividades->count() > 0)
                <h5 class="mt-3">{{ __('messages.latest_activities') }}</h5>
                <ul class="list-inline">
                    @foreach($ultimasActividades as $actividad)
                        {{-- Accede a los atributos usando snake_case como en el modelo --}}
                        <li class="list-inline-item text-muted small">[{{ $actividad->fecha }}] {{ $actividad->nombre }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</section>

<section class="py-5" id="testimonials">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold">{{ __('messages.testimonials_title') }}</h2>
            <p class="lead text-muted">{{ __('messages.testimonials_subtitle') }}</p>
        </div>
        <div class="row g-4">
            {{-- Testimonio 1 --}}
            <div class="col-md-4">
                <div class="testimonial-card card h-100"> {{-- Usa la clase con variables --}}
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <img src="https://randomuser.me/api/portraits/women/43.jpg" alt="{{ __('messages.testimonial1_alt') }}" class="rounded-circle me-3" width="50">
                            <div>
                                <h5 class="mb-0">Sarah Johnson</h5> {{-- Considera traducir nombres si es demo --}}
                                <small class="text-muted">{{ __('messages.testimonial1_role') }}</small>
                            </div>
                        </div>
                        <p class="mb-0 fst-italic">"{{ __('messages.testimonial1_text') }}"</p>
                    </div>
                    <div class="card-footer bg-transparent border-top-0 pt-0 text-end"> {{-- Quitar borde superior si no se usa --}}
                        <div class="text-warning">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Testimonio 2 --}}
            <div class="col-md-4">
                <div class="testimonial-card card h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="{{ __('messages.testimonial2_alt') }}" class="rounded-circle me-3" width="50">
                            <div>
                                <h5 class="mb-0">Michael Chen</h5>
                                <small class="text-muted">{{ __('messages.testimonial2_role') }}</small>
                            </div>
                        </div>
                        <p class="mb-0 fst-italic">"{{ __('messages.testimonial2_text') }}"</p>
                    </div>
                    <div class="card-footer bg-transparent border-top-0 pt-0 text-end">
                        <div class="text-warning">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Testimonio 3 --}}
            <div class="col-md-4">
                <div class="testimonial-card card h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="{{ __('messages.testimonial3_alt') }}" class="rounded-circle me-3" width="50">
                            <div>
                                <h5 class="mb-0">Emily Rodriguez</h5>
                                <small class="text-muted">{{ __('messages.testimonial3_role') }}</small>
                            </div>
                        </div>
                        <p class="mb-0 fst-italic">"{{ __('messages.testimonial3_text') }}"</p>
                    </div>
                    <div class="card-footer bg-transparent border-top-0 pt-0 text-end">
                        <div class="text-warning">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light"> {{-- bg-light usará variable --}}
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h2 class="fw-bold mb-4">{{ __('messages.faq_title') }}</h2>
                {{-- El acordeón usará variables de Bootstrap --}}
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item mb-3 border-0 shadow-sm">
                        <h3 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                {{ __('messages.faq1_question') }}
                            </button>
                        </h3>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                {{ __('messages.faq1_answer') }}
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item mb-3 border-0 shadow-sm">
                        <h3 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                {{ __('messages.faq2_question') }}
                            </button>
                        </h3>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                {{ __('messages.faq2_answer') }}
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item mb-3 border-0 shadow-sm">
                        <h3 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                {{ __('messages.faq3_question') }}
                            </button>
                        </h3>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                {{ __('messages.faq3_answer') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                {{-- La tarjeta usará variables --}}
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4 d-flex flex-column">
                        <h2 class="fw-bold mb-4">{{ __('messages.cta_title') }}</h2>
                        <p class="mb-4">{{ __('messages.cta_text') }}</p>
                        <div class="mt-auto">
                            <a href="#signup" class="btn btn-primary btn-lg w-100 mb-3">{{ __('messages.cta_button_signup') }}</a>
                            <p class="text-center text-muted mb-0">{{ __('messages.cta_login_prompt') }} <a href="#login">{{ __('messages.cta_login_link') }}</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="bg-dark text-white py-5"> {{-- bg-dark usará variables --}}
    <div class="container py-4">
        <div class="row g-4">
            <div class="col-lg-4">
                <h4 class="fw-bold mb-4">
                    <i class="fas fa-hand-holding-usd me-2"></i>CashFlow
                </h4>
                <p class="text-white-50">{{ __('messages.footer_about') }}</p> {{-- text-white-50 usará variable --}}
                <div class="d-flex gap-3 mt-4">
                    {{-- text-white usará variable --}}
                    <a href="#" class="text-white"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-white"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-white"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" class="text-white"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-2 col-md-4">
                <h5 class="fw-bold mb-4">{{ __('messages.footer_quick_links') }}</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="#" class="text-white-50">{{ __('messages.footer_home') }}</a></li>
                    <li class="mb-2"><a href="#borrow" class="text-white-50">{{ __('messages.navbar_borrow') }}</a></li>
                    <li class="mb-2"><a href="#lend" class="text-white-50">{{ __('messages.navbar_lend') }}</a></li>
                    <li class="mb-2"><a href="#how-it-works" class="text-white-50">{{ __('messages.navbar_how_it_works') }}</a></li>
                    <li class="mb-2"><a href="#testimonials" class="text-white-50">{{ __('messages.navbar_testimonials') }}</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-4">
                <h5 class="fw-bold mb-4">{{ __('messages.footer_legal') }}</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="#" class="text-white-50">{{ __('messages.footer_terms') }}</a></li>
                    <li class="mb-2"><a href="#" class="text-white-50">{{ __('messages.footer_privacy') }}</a></li>
                    <li class="mb-2"><a href="#" class="text-white-50">{{ __('messages.footer_lending_agreement') }}</a></li>
                    <li class="mb-2"><a href="#" class="text-white-50">{{ __('messages.footer_borrower_agreement') }}</a></li>
                    <li class="mb-2"><a href="#" class="text-white-50">{{ __('messages.footer_dispute') }}</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-4">
                <h5 class="fw-bold mb-4">{{ __('messages.footer_contact') }}</h5>
                <ul class="list-unstyled text-white-50"> {{-- Aplicar a la lista también --}}
                    <li class="mb-2"><i class="fas fa-map-marker-alt me-2"></i> 123 Finance St, Money City</li>
                    <li class="mb-2"><i class="fas fa-phone me-2"></i> (555) 123-4567</li>
                    <li class="mb-2"><i class="fas fa-envelope me-2"></i> support@cashflow.com</li>
                </ul>
            </div>
        </div>
        <hr class="my-4" style="border-color: var(--bs-border-color);"> {{-- Usar variable para el hr --}}
        <div class="text-center text-muted"> {{-- text-muted usará variable --}}
            <p class="mb-0">&copy; {{ date('Y') }} CashFlow. {{ __('messages.footer_rights') }}</p>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

<script>
    // Función para aplicar el tema (claro/oscuro)
    const applyTheme = (theme) => {
        const htmlEl = document.documentElement;
        const lightIcon = document.getElementById('theme-icon-light');
        const darkIcon = document.getElementById('theme-icon-dark');

        htmlEl.setAttribute('data-bs-theme', theme);
        if (theme === 'dark') {
            lightIcon?.classList.add('d-none');
            darkIcon?.classList.remove('d-none');
        } else {
            lightIcon?.classList.remove('d-none');
            darkIcon?.classList.add('d-none');
        }
        // Guardar preferencia en localStorage
        localStorage.setItem('theme', theme);
    };

    // Función para obtener el tema preferido (localStorage o sistema)
    const getPreferredTheme = () => {
        const storedTheme = localStorage.getItem('theme');
        if (storedTheme) {
            return storedTheme;
        }
        // Si no hay preferencia guardada, usar la del sistema
        return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
    };

    // Lógica que se ejecuta cuando el DOM está listo
    document.addEventListener('DOMContentLoaded', function() {

        // --- Lógica del Tema Claro/Oscuro ---
        const themeToggler = document.getElementById('theme-toggler');
        const currentTheme = getPreferredTheme();

        // Aplicar tema inicial al cargar la página
        applyTheme(currentTheme);

        // Listener para el botón de cambio de tema
        themeToggler?.addEventListener('click', () => {
            const newTheme = document.documentElement.getAttribute('data-bs-theme') === 'dark' ? 'light' : 'dark';
            applyTheme(newTheme);
        });

        // Listener para cambios en la preferencia del sistema (opcional)
        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', event => {
            // Solo cambiar si no hay preferencia explícita en localStorage
            if (!localStorage.getItem('theme')) {
                applyTheme(event.matches ? 'dark' : 'light');
            }
        });


        // --- Lógica de la Calculadora (existente) ---
        // Sync range and number inputs for borrow calculator
        const loanAmount = document.getElementById('loan-amount');
        const loanAmountInput = document.getElementById('loan-amount-input');
        const borrowCalculatorBtn = document.getElementById('calculate-borrow');
        const borrowResultDiv = document.getElementById('borrow-result');

        if(loanAmount && loanAmountInput) {
            loanAmount.addEventListener('input', function() {
                loanAmountInput.value = this.value;
            });

            loanAmountInput.addEventListener('input', function() {
                const max = parseFloat(loanAmount.getAttribute('max'));
                const min = parseFloat(loanAmount.getAttribute('min'));
                if(this.value > max) this.value = max;
                if(this.value < min) this.value = min;
                if (this.value === '') this.value = min; // Evitar NaN si está vacío
                loanAmount.value = this.value;
            });
        }

        // Calculate borrow results
        borrowCalculatorBtn?.addEventListener('click', function() {
            const amount = parseFloat(loanAmountInput?.value);
            const termEl = document.getElementById('loan-term');
            const creditScoreEl = document.getElementById('credit-score');
            const term = parseInt(termEl?.value);
            const creditScore = creditScoreEl?.value;

            if (isNaN(amount) || isNaN(term) || !creditScore) {
                console.error("Calculator inputs missing or invalid");
                return; // Salir si falta algún dato
            }


            // Determine interest rate based on credit score
            let rate;
            switch(creditScore) {
                case 'excellent': rate = 0.06; break;
                case 'good': rate = 0.075; break;
                case 'fair': rate = 0.09; break;
                case 'poor': rate = 0.12; break;
                default: rate = 0.075;
            }

            // Calculate monthly payment (simple interest for demo)
            const totalInterest = amount * rate * (term / 12);
            const monthlyPayment = (amount + totalInterest) / term;
            const totalRepayment = amount + totalInterest;

            // Display results
            document.getElementById('monthly-payment').textContent = '$' + monthlyPayment.toFixed(2);
            document.getElementById('interest-rate').textContent = (rate * 100).toFixed(1) + '%';
            document.getElementById('total-repayment').textContent = '$' + totalRepayment.toFixed(2);

            // Show results
            borrowResultDiv?.classList.remove('d-none');
        });

        // Sync range and number inputs for lend calculator
        const investmentAmount = document.getElementById('investment-amount');
        const investmentAmountInput = document.getElementById('investment-amount-input');
        const lendCalculatorBtn = document.getElementById('calculate-lend');
        const lendResultDiv = document.getElementById('lend-result');

        if (investmentAmount && investmentAmountInput) {
            investmentAmount.addEventListener('input', function() {
                investmentAmountInput.value = this.value;
            });

            investmentAmountInput.addEventListener('input', function() {
                const max = parseFloat(investmentAmount.getAttribute('max'));
                const min = parseFloat(investmentAmount.getAttribute('min'));
                if(this.value > max) this.value = max;
                if(this.value < min) this.value = min;
                if (this.value === '') this.value = min; // Evitar NaN
                investmentAmount.value = this.value;
            });
        }

        // Calculate lend results
        lendCalculatorBtn?.addEventListener('click', function() {
            const amount = parseFloat(investmentAmountInput?.value);
            const termEl = document.getElementById('investment-term');
            const expectedReturnEl = document.getElementById('expected-return');
            const term = parseInt(termEl?.value);
            const expectedReturn = expectedReturnEl?.value;

            if (isNaN(amount) || isNaN(term) || !expectedReturn) {
                console.error("Lend Calculator inputs missing or invalid");
                return; // Salir si falta algún dato
            }

            // Determine return rate based on risk profile
            let rate;
            switch(expectedReturn) {
                case 'conservative': rate = 0.065; break;
                case 'balanced': rate = 0.11; break;
                case 'aggressive': rate = 0.135; break;
                default: rate = 0.11;
            }

            // Calculate earnings (simple interest for demo)
            const monthlyIncome = (amount * rate) / 12;
            const totalEarnings = amount * rate * (term / 12);

            // Display results
            document.getElementById('monthly-income').textContent = '$' + monthlyIncome.toFixed(2);
            document.getElementById('annual-return').textContent = (rate * 100).toFixed(0) + '%';
            document.getElementById('total-earnings').textContent = '$' + totalEarnings.toFixed(2);

            // Show results
            lendResultDiv?.classList.remove('d-none');
        });
    });
</script>

</body>
</html>
