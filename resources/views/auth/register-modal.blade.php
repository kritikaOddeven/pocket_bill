<!-- Register Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0 pb-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-4 pb-4">
                <div class="text-center mb-4">
                    <h4 class="modal-title fw-bold" id="registerModalLabel">Create Your Account</h4>
                    <p class="text-muted">Join thousands of businesses using Pocket Bill</p>
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="name" class="form-label fw-semibold">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required autocomplete="given-name">

                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Email Address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autocomplete="email">

                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="new-password">

                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label fw-semibold">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required autocomplete="new-password">
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input @error('terms') is-invalid @enderror" id="terms" name="terms" required>
                        <label class="form-check-label" for="terms">
                            I agree to the <a href="#" class="text-decoration-none">Terms of Service</a> and
                            <a href="#" class="text-decoration-none">Privacy Policy</a>
                        </label>

                    </div>

                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-primary btn-lg">
                            Create Account
                        </button>
                    </div>
                </form>

                <hr class="my-4">

                <div class="text-center">
                    <p class="mb-0 text-muted">Already have an account?
                        <a href="#" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#loginModal" class="text-decoration-none fw-semibold">
                            Sign in here
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .modal-content {
        border: none;
        border-radius: 16px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    }

    .modal-header {
        padding: 1.5rem 1.5rem 0;
    }

    .modal-body {
        padding: 0 1.5rem 1.5rem;
    }

    .form-control {
        border: 2px solid #e2e8f0;
        border-radius: 8px;
        padding: 0.75rem 1rem;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: var(--primary-orange);
        box-shadow: 0 0 0 0.2rem rgba(255, 107, 53, 0.25);
    }

    .form-check-input:checked {
        background-color: var(--primary-orange);
        border-color: var(--primary-orange);
    }

    .btn-close {
        opacity: 0.5;
        transition: opacity 0.3s ease;
    }

    .btn-close:hover {
        opacity: 1;
    }

    .modal-title {
        color: var(--text-dark);
    }

    .form-label {
        color: var(--text-dark);
        margin-bottom: 0.5rem;
    }

    .text-muted {
        color: var(--text-light) !important;
    }

    hr {
        border-color: #e2e8f0;
        opacity: 1;
    }

    .form-check-label a {
        color: var(--primary-orange);
    }

    .form-check-label a:hover {
        color: var(--primary-orange-dark);
    }
</style>
