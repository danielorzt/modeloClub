<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CashFlow - Peer-to-Peer Lending Platform</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        .hero-section {
            background: linear-gradient(135deg, #6B73FF 0%, #000DFF 100%);
            color: white;
        }
        .feature-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: #4e54c8;
        }
        .testimonial-card {
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
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
            background: #4e54c8;
            color: white;
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }
        .calculator-result {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 1.5rem;
            margin-top: 1rem;
        }
        .nav-pills .nav-link.active {
            background-color: #4e54c8;
        }
        .btn-primary {
            background-color: #4e54c8;
            border-color: #4e54c8;
        }
        .btn-primary:hover {
            background-color: #3a41b5;
            border-color: #3a41b5;
        }
    </style>
</head>
<body>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#" style="color: #4e54c8;">
            <i class="fas fa-hand-holding-usd me-2"></i>CashFlow
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#borrow">Borrow</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#lend">Lend</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#how-it-works">How It Works</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#testimonials">Testimonials</a>
                </li>
                <li class="nav-item ms-lg-3">
                    <a class="btn btn-outline-primary" href="#login">Login</a>
                </li>
                <li class="nav-item ms-lg-2">
                    <a class="btn btn-primary" href="#signup">Sign Up</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero-section py-5">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h1 class="display-4 fw-bold mb-4">Borrow or Lend Money with Confidence</h1>
                <p class="lead mb-4">Connect with trusted individuals in our community for fair and transparent cash transactions.</p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="#borrow" class="btn btn-light btn-lg px-4">I Need Money</a>
                    <a href="#lend" class="btn btn-outline-light btn-lg px-4">I Want to Lend</a>
                </div>
            </div>
            <div class="col-lg-6">
                <img src="https://images.unsplash.com/photo-1579621970563-ebec7560ff3e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&q=80" alt="Financial exchange" class="img-fluid rounded-4 shadow">
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-5 bg-light">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Why Choose CashFlow?</h2>
            <p class="lead text-muted">We make borrowing and lending simple, secure, and rewarding</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="text-center p-4 h-100 bg-white rounded-3 shadow-sm">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h4>Secure Transactions</h4>
                    <p class="text-muted">Verified users and escrow protection ensure your money is safe throughout the transaction.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="text-center p-4 h-100 bg-white rounded-3 shadow-sm">
                    <div class="feature-icon">
                        <i class="fas fa-percentage"></i>
                    </div>
                    <h4>Fair Rates</h4>
                    <p class="text-muted">Competitive interest rates that benefit both borrowers and lenders without hidden fees.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="text-center p-4 h-100 bg-white rounded-3 shadow-sm">
                    <div class="feature-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h4>Flexible Terms</h4>
                    <p class="text-muted">Customize repayment schedules that work for both parties with our flexible terms.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Borrow/Lend Tabs -->
<section class="py-5" id="borrow">
    <div class="container py-5">
        <ul class="nav nav-pills mb-4 justify-content-center" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-borrow-tab" data-bs-toggle="pill" data-bs-target="#pills-borrow" type="button" role="tab">Borrow Money</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-lend-tab" data-bs-toggle="pill" data-bs-target="#pills-lend" type="button" role="tab">Lend Money</button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <!-- Borrow Tab -->
            <div class="tab-pane fade show active" id="pills-borrow" role="tabpanel">
                <div class="row">
                    <div class="col-lg-6 mb-4 mb-lg-0">
                        <h2 class="fw-bold mb-4">Get the cash you need quickly</h2>
                        <p class="lead mb-4">Connect with lenders who can help you with short-term financial needs.</p>
                        <div class="mb-4">
                            <div class="how-it-works-step mb-4" data-step="1">
                                <h5>Create Your Loan Request</h5>
                                <p class="text-muted">Tell us how much you need and for how long. We'll help you set reasonable terms.</p>
                            </div>
                            <div class="how-it-works-step mb-4" data-step="2">
                                <h5>Get Matched with Lenders</h5>
                                <p class="text-muted">Our system will match you with lenders who meet your criteria.</p>
                            </div>
                            <div class="how-it-works-step" data-step="3">
                                <h5>Receive Funds Quickly</h5>
                                <p class="text-muted">Once approved, funds are transferred directly to your account within hours.</p>
                            </div>
                        </div>
                        <a href="#signup" class="btn btn-primary btn-lg px-4">Apply to Borrow Now</a>
                    </div>
                    <div class="col-lg-6">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-4">
                                <h4 class="mb-4">Loan Calculator</h4>
                                <form id="borrow-calculator">
                                    <div class="mb-3">
                                        <label for="loan-amount" class="form-label">Loan Amount ($)</label>
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
                                        <label for="loan-term" class="form-label">Loan Term (months)</label>
                                        <select class="form-select" id="loan-term">
                                            <option value="3">3 months</option>
                                            <option value="6">6 months</option>
                                            <option value="12" selected>12 months</option>
                                            <option value="24">24 months</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="credit-score" class="form-label">Credit Score Range</label>
                                        <select class="form-select" id="credit-score">
                                            <option value="excellent">Excellent (720+)</option>
                                            <option value="good" selected>Good (680-719)</option>
                                            <option value="fair">Fair (640-679)</option>
                                            <option value="poor">Poor (639 or below)</option>
                                        </select>
                                    </div>
                                    <button type="button" class="btn btn-primary w-100" id="calculate-borrow">Calculate</button>
                                </form>
                                <div class="calculator-result d-none" id="borrow-result">
                                    <h5>Estimated Loan Details</h5>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Monthly Payment:</span>
                                        <span class="fw-bold" id="monthly-payment">$187.50</span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Interest Rate:</span>
                                        <span class="fw-bold" id="interest-rate">7.5%</span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span>Total Repayment:</span>
                                        <span class="fw-bold" id="total-repayment">$2,250.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Lend Tab -->
            <div class="tab-pane fade" id="pills-lend" role="tabpanel">
                <div class="row">
                    <div class="col-lg-6 mb-4 mb-lg-0">
                        <h2 class="fw-bold mb-4">Earn competitive returns on your money</h2>
                        <p class="lead mb-4">Help others while growing your savings with better-than-bank returns.</p>
                        <div class="mb-4">
                            <div class="how-it-works-step mb-4" data-step="1">
                                <h5>Set Your Lending Criteria</h5>
                                <p class="text-muted">Choose the loan amounts, terms, and borrower profiles you're comfortable with.</p>
                            </div>
                            <div class="how-it-works-step mb-4" data-step="2">
                                <h5>Browse Loan Requests</h5>
                                <p class="text-muted">Review borrower profiles and select those that match your investment goals.</p>
                            </div>
                            <div class="how-it-works-step" data-step="3">
                                <h5>Earn Monthly Returns</h5>
                                <p class="text-muted">Receive principal plus interest through automatic monthly payments.</p>
                            </div>
                        </div>
                        <a href="#signup" class="btn btn-primary btn-lg px-4">Start Lending Today</a>
                    </div>
                    <div class="col-lg-6">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-4">
                                <h4 class="mb-4">Investment Calculator</h4>
                                <form id="lend-calculator">
                                    <div class="mb-3">
                                        <label for="investment-amount" class="form-label">Investment Amount ($)</label>
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
                                        <label for="investment-term" class="form-label">Investment Term (months)</label>
                                        <select class="form-select" id="investment-term">
                                            <option value="6">6 months</option>
                                            <option value="12" selected>12 months</option>
                                            <option value="24">24 months</option>
                                            <option value="36">36 months</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="expected-return" class="form-label">Expected Return</label>
                                        <select class="form-select" id="expected-return">
                                            <option value="conservative">Conservative (5-8%)</option>
                                            <option value="balanced" selected>Balanced (8-12%)</option>
                                            <option value="aggressive">Aggressive (12-15%)</option>
                                        </select>
                                    </div>
                                    <button type="button" class="btn btn-primary w-100" id="calculate-lend">Calculate</button>
                                </form>
                                <div class="calculator-result d-none" id="lend-result">
                                    <h5>Projected Investment Returns</h5>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Monthly Income:</span>
                                        <span class="fw-bold" id="monthly-income">$45.83</span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>Annual Return:</span>
                                        <span class="fw-bold" id="annual-return">11%</span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span>Total Earnings:</span>
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

<!-- How It Works -->
<section class="py-5 bg-light" id="how-it-works">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold">How CashFlow Works</h2>
            <p class="lead text-muted">Simple steps to get started with peer-to-peer lending</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="fas fa-user-plus fs-3 text-primary"></i>
                        </div>
                        <h4>1. Create Your Profile</h4>
                        <p class="text-muted">Sign up and complete your profile with verification to establish trust in our community.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="fas fa-search-dollar fs-3 text-primary"></i>
                        </div>
                        <h4>2. Browse Opportunities</h4>
                        <p class="text-muted">As a borrower, create your loan request. As a lender, review available loan requests.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="fas fa-handshake fs-3 text-primary"></i>
                        </div>
                        <h4>3. Connect & Transact</h4>
                        <p class="text-muted">Agree on terms and complete the transaction through our secure platform.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="py-5" id="testimonials">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold">What Our Users Say</h2>
            <p class="lead text-muted">Real experiences from our community members</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="testimonial-card card h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <img src="https://randomuser.me/api/portraits/women/43.jpg" alt="User" class="rounded-circle me-3" width="50">
                            <div>
                                <h5 class="mb-0">Sarah Johnson</h5>
                                <small class="text-muted">Borrower</small>
                            </div>
                        </div>
                        <p class="mb-0">"CashFlow helped me cover unexpected medical bills when traditional banks turned me down. The process was simple and the lenders were understanding of my situation."</p>
                    </div>
                    <div class="card-footer bg-transparent border-top">
                        <div class="text-warning">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="testimonial-card card h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="User" class="rounded-circle me-3" width="50">
                            <div>
                                <h5 class="mb-0">Michael Chen</h5>
                                <small class="text-muted">Lender</small>
                            </div>
                        </div>
                        <p class="mb-0">"I've been using CashFlow to diversify my investments. The returns are much better than my savings account, and I enjoy helping people achieve their financial goals."</p>
                    </div>
                    <div class="card-footer bg-transparent border-top">
                        <div class="text-warning">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="testimonial-card card h-100">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="User" class="rounded-circle me-3" width="50">
                            <div>
                                <h5 class="mb-0">Emily Rodriguez</h5>
                                <small class="text-muted">Borrower & Lender</small>
                            </div>
                        </div>
                        <p class="mb-0">"I started as a borrower to fund my small business, and now I'm also lending to others. The platform is transparent and the community is supportive. Highly recommend!"</p>
                    </div>
                    <div class="card-footer bg-transparent border-top">
                        <div class="text-warning">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ -->
<section class="py-5 bg-light">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h2 class="fw-bold mb-4">Frequently Asked Questions</h2>
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item mb-3 border-0 shadow-sm">
                        <h3 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                How does CashFlow protect my money?
                            </button>
                        </h3>
                        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                We use escrow services to hold funds until loan terms are met, identity verification for all users, and secure payment processing. Additionally, our dispute resolution system helps mediate any issues that may arise.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item mb-3 border-0 shadow-sm">
                        <h3 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                                What happens if a borrower doesn't repay?
                            </button>
                        </h3>
                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                We have a collections process that includes reminders, payment plans, and credit reporting. While we can't guarantee repayment, our system is designed to minimize risk through borrower verification and credit checks.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item mb-3 border-0 shadow-sm">
                        <h3 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                                How are interest rates determined?
                            </button>
                        </h3>
                        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Rates are based on market conditions, borrower creditworthiness, and loan terms. Borrowers can request specific rates, and lenders can choose which loans to fund based on their desired return.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4 d-flex flex-column">
                        <h2 class="fw-bold mb-4">Ready to Get Started?</h2>
                        <p class="mb-4">Join our community of borrowers and lenders today. Whether you need financial assistance or want to grow your savings, CashFlow provides the platform to make it happen.</p>
                        <div class="mt-auto">
                            <a href="#signup" class="btn btn-primary btn-lg w-100 mb-3">Sign Up Now</a>
                            <p class="text-center text-muted mb-0">Already have an account? <a href="#login">Log in</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-dark text-white py-5">
    <div class="container py-4">
        <div class="row g-4">
            <div class="col-lg-4">
                <h4 class="fw-bold mb-4">
                    <i class="fas fa-hand-holding-usd me-2"></i>CashFlow
                </h4>
                <p>Connecting people who need money with those who have money to lend, creating win-win financial solutions.</p>
                <div class="d-flex gap-3 mt-4">
                    <a href="#" class="text-white"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-white"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-white"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" class="text-white"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-2 col-md-4">
                <h5 class="fw-bold mb-4">Quick Links</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="#" class="text-white-50">Home</a></li>
                    <li class="mb-2"><a href="#borrow" class="text-white-50">Borrow</a></li>
                    <li class="mb-2"><a href="#lend" class="text-white-50">Lend</a></li>
                    <li class="mb-2"><a href="#how-it-works" class="text-white-50">How It Works</a></li>
                    <li class="mb-2"><a href="#testimonials" class="text-white-50">Testimonials</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-4">
                <h5 class="fw-bold mb-4">Legal</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="#" class="text-white-50">Terms of Service</a></li>
                    <li class="mb-2"><a href="#" class="text-white-50">Privacy Policy</a></li>
                    <li class="mb-2"><a href="#" class="text-white-50">Lending Agreement</a></li>
                    <li class="mb-2"><a href="#" class="text-white-50">Borrower Agreement</a></li>
                    <li class="mb-2"><a href="#" class="text-white-50">Dispute Resolution</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-4">
                <h5 class="fw-bold mb-4">Contact Us</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><i class="fas fa-map-marker-alt me-2"></i> 123 Finance St, Money City</li>
                    <li class="mb-2"><i class="fas fa-phone me-2"></i> (555) 123-4567</li>
                    <li class="mb-2"><i class="fas fa-envelope me-2"></i> support@cashflow.com</li>
                </ul>
            </div>
        </div>
        <hr class="my-4 bg-secondary">
        <div class="text-center text-muted">
            <p class="mb-0">&copy; 2023 CashFlow. All rights reserved.</p>
        </div>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Custom JS -->
<script>
    // Loan calculator functionality
    document.addEventListener('DOMContentLoaded', function() {
        // Sync range and number inputs for borrow calculator
        const loanAmount = document.getElementById('loan-amount');
        const loanAmountInput = document.getElementById('loan-amount-input');

        loanAmount.addEventListener('input', function() {
            loanAmountInput.value = this.value;
        });

        loanAmountInput.addEventListener('input', function() {
            if(this.value > 10000) this.value = 10000;
            if(this.value < 100) this.value = 100;
            loanAmount.value = this.value;
        });

        // Calculate borrow results
        document.getElementById('calculate-borrow').addEventListener('click', function() {
            const amount = parseFloat(loanAmountInput.value);
            const term = parseInt(document.getElementById('loan-term').value);
            const creditScore = document.getElementById('credit-score').value;

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
            const monthlyRate = rate / 12;
            const totalInterest = amount * rate * (term / 12);
            const monthlyPayment = (amount + totalInterest) / term;
            const totalRepayment = amount + totalInterest;

            // Display results
            document.getElementById('monthly-payment').textContent = '$' + monthlyPayment.toFixed(2);
            document.getElementById('interest-rate').textContent = (rate * 100).toFixed(1) + '%';
            document.getElementById('total-repayment').textContent = '$' + totalRepayment.toFixed(2);

            // Show results
            document.getElementById('borrow-result').classList.remove('d-none');
        });

        // Sync range and number inputs for lend calculator
        const investmentAmount = document.getElementById('investment-amount');
        const investmentAmountInput = document.getElementById('investment-amount-input');

        investmentAmount.addEventListener('input', function() {
            investmentAmountInput.value = this.value;
        });

        investmentAmountInput.addEventListener('input', function() {
            if(this.value > 50000) this.value = 50000;
            if(this.value < 500) this.value = 500;
            investmentAmount.value = this.value;
        });

        // Calculate lend results
        document.getElementById('calculate-lend').addEventListener('click', function() {
            const amount = parseFloat(investmentAmountInput.value);
            const term = parseInt(document.getElementById('investment-term').value);
            const expectedReturn = document.getElementById('expected-return').value;

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
            document.getElementById('lend-result').classList.remove('d-none');
        });
    });
</script>
</body>
</html>
