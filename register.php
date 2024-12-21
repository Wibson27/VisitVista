<?php

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

require_once __DIR__ . '/config/db_connect.php';
require_once __DIR__ . '/functions/database_functions.php';
require_once __DIR__ . '/functions/validation.php';

$error = '';
$success = '';
$errors = [];

// Handle Registration
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'register') {
  error_log('Registration attempt - Role: ' . $_POST['role']); // Debug log

  $errors = validateRegistration($_POST, $_POST['role']);

  error_log('Validation errors: ' . print_r($errors, true)); // Debug log

  if (empty($errors)) {
      try {
          $db->beginTransaction();
          error_log('Transaction started'); // Debug log
          // Check if email exists first
          if (getUserByEmail($_POST['email'])) {
              throw new Exception("Email already exists");
          }

          // Create user
          $userId = createUser(
              $_POST['email'],
              $_POST['password'],
              $_POST['name'],
              $_POST['phone'] ?? null,
              $_POST['role']
          );

          if (!$userId) {
              throw new Exception("Failed to create user");
          }

          // Prepare profile data based on role
          if ($_POST['role'] === 'CUSTOMER') {
              $profileData = [
                  'date_of_birth' => $_POST['date_of_birth'],
                  'gender' => $_POST['gender'],
                  'bio' => $_POST['bio'] ?? null
              ];
          } else {
              $profileData = [
                  'business_name' => $_POST['business_name'],
                  'city' => $_POST['city'],
                  'description' => $_POST['description']
              ];
          }

          if (!createProfile($userId, $profileData, $_POST['role'])) {
              throw new Exception("Failed to create profile");
          }

          $db->commit();
          $_SESSION['success'] = "Registration successful! Please login.";
          header('Location: register.php?tab=login');
          exit;

      } catch (Exception $e) {
          $db->rollBack();
          error_log('Registration error: ' . $e->getMessage()); // Debug log
          $error = $e->getMessage();
          $_SESSION['error'] = $error;
      }
  }
}

// Handle Login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'login') {
    $errors = validateLogin($_POST);

    if (empty($errors)) {
        try {
            $user = getUserByEmail($_POST['email']);

            if (!$user || !password_verify($_POST['password'], $user['password'])) {
                throw new Exception("Invalid email or password");
            }

            if ($user['role'] !== $_POST['role']) {
                throw new Exception("Invalid role selected");
            }

            // Start session and store user data
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['name'] = $user['name'];

            // Redirect based on role
            $redirect = $_SESSION['role'] === 'CUSTOMER' ? 'customer_dashboard.php' : 'business_dashboard.php';
            header("Location: $redirect");
            exit;

        } catch (Exception $e) {
            $error = $e->getMessage();
        }
    }
}

// Get active tab from URL or POST
$activeTab = isset($_GET['tab']) ? $_GET['tab'] : (isset($_POST['action']) ? $_POST['action'] : 'login');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VisitVista - Authentication</title>
    <style>
        :root {
            --accent-green: #bbf340;
            --dark: #000000;
            --white: #ffffff;
            --grey-light: rgba(255, 255, 255, 0.1);
            --grey-mid: rgba(255, 255, 255, 0.3);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        }

        html {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
            height: 100%;
        }

        body {
            background-color: var(--dark);
            color: var(--white);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow-x: hidden;
            position: relative;
            padding: 2rem;
        }

        .alert {
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            font-weight: 500;
        }

        .alert-error {
            background: rgba(255, 0, 0, 0.1);
            border: 1px solid rgba(255, 0, 0, 0.3);
            color: #ff3333;
        }

        .alert-success {
            background: rgba(0, 255, 0, 0.1);
            border: 1px solid rgba(0, 255, 0, 0.3);
            color: #00ff00;
        }

        .input-error {
            border-color: #ff3333 !important;
        }

        .error-text {
            color: #ff3333;
            font-size: 0.8rem;
            margin-top: 0.5rem;
        }

        /* Modern Particle Background */
        #particles-js {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        /* Auth Container */
        .auth-container {
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(10px);
            border: 1px solid var(--grey-light);
            border-radius: 20px;
            padding: 2.5rem;
            width: min(90%, 500px);
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.5);
        }

        /* Form Elements */
        .input-group {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .input-label {
            display: block;
            color: var(--white);
            margin-bottom: 0.8rem;
            font-size: 0.9rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .input-field {
            width: 100%;
            padding: 1rem;
            background: rgba(0, 0, 0, 0.7);
            border: 1px solid var(--grey-light);
            border-radius: 8px;
            color: var(--white);
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .input-field:hover {
            border-color: var(--grey-mid);
        }

        .input-field:focus {
            outline: none;
            border-color: var(--accent-green);
            box-shadow: 0 0 10px rgba(0, 255, 0, 0.1);
        }

        /* Buttons */
        .auth-tabs {
            display: flex;
            gap: 1rem;
            margin-bottom: 2.5rem;
        }

        .tab-btn, .role-btn {
            text-align: center; /* Centers the text inside buttons */
            display: flex;
            align-items: center;     /* Vertically centers the text */
            justify-content: center; /* Horizontally centers the text */
            background: transparent;
            border: 1px solid var(--grey-light);
            color: var(--white);
            padding: 1rem;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.2s ease;
            flex: 1;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 500;

        }

        .tab-btn:hover, .role-btn:hover {
            border-color: var(--accent-green);
            background: rgba(0, 255, 0, 0.1);
        }

        .tab-btn.active, .role-btn.active {
            border: 1px solid var(--grey-light);
            color: var(--white);
            padding: 1rem;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.2s ease;
            flex: 1;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 750;
            background: var(--accent-green);
            border-color: var(--accent-green);
            color: var(--dark);
        }

        .role-selector {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        /* Dropdown Styling */
        select.input-field {
            cursor: pointer;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='white' stroke-width='2'%3E%3Cpath d='M6 9l6 6 6-6'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            padding-right: 3rem;
        }

        select.input-field option {
            background-color: var(--dark);
            color: var(--white);
            padding: 1rem;
        }

        select.input-field option:hover {
            background-color: var(--accent-green);
            color: var(--dark);
        }

        /* Submit Button */
        .submit-btn {
            width: 100%;
            padding: 1.2rem;
            background: transparent;
            color: var(--white);
            border: 1px solid var(--accent-green);
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-top: 2rem;
        }

        .submit-btn:hover {
            background: var(--accent-green);
            color: var(--dark);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 255, 0, 0.2);
        }

        /* Form Transitions */
        .auth-form {
            transition: all 0.3s ease;
            opacity: 0;
            transform: translateY(10px);
            display: none;
        }

        .auth-form.active {
            opacity: 1;
            transform: translateY(0);
            display: block;
        }

        </style>
</head>
<body>
    <!-- Particle Background -->
    <div id="particles-js"></div>

    <div class="auth-container">
        <?php if ($error): ?>
            <div class="alert alert-error"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success"><?php echo htmlspecialchars($_SESSION['success']); ?></div>
            <?php unset($_SESSION['success']); ?>
        <?php endif; ?>

        <div class="auth-tabs">
            <button class="tab-btn" data-tab="login">LOGIN</button>
            <button class="tab-btn" data-tab="register">REGISTER</button>
        </div>

        <!-- Login Form -->
        <form id="loginForm" class="auth-form" method="POST" action="register.php">
            <input type="hidden" name="action" value="login">

            <div class="role-selector">
                <div class="role-btn" data-role="CUSTOMER">Customer</div>
                <div class="role-btn" data-role="BUSINESS">Business</div>
                <!-- Make sure the initial value matches the active button -->
                <input type="hidden" name="role" value="CUSTOMER">
            </div>

            <div class="input-group">
                <label class="input-label">EMAIL</label>
                <input type="email" name="email"
                      class="input-field <?php echo isset($errors['email']) ? 'input-error' : ''; ?>"
                      value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>"
                      required>
                <?php if (isset($errors['email'])): ?>
                    <div class="error-text"><?php echo htmlspecialchars($errors['email']); ?></div>
                <?php endif; ?>
            </div>

            <div class="input-group">
                <label class="input-label">PASSWORD</label>
                <input type="password" name="password"
                      class="input-field <?php echo isset($errors['password']) ? 'input-error' : ''; ?>"
                      required>
                <?php if (isset($errors['password'])): ?>
                    <div class="error-text"><?php echo htmlspecialchars($errors['password']); ?></div>
                <?php endif; ?>
            </div>

            <button type="submit" class="submit-btn">ENTER SYSTEM</button>
        </form>

        <!-- Register Form -->
        <form id="registerForm" class="auth-form" method="POST" action="register.php">
            <input type="hidden" name="action" value="register">

            <div class="role-selector">
                <div class="role-btn" data-role="CUSTOMER">Customer</div>
                <div class="role-btn" data-role="BUSINESS">Business</div>
                <input type="hidden" name="role" value="CUSTOMER">
            </div>

            <div class="input-group">
                <label class="input-label">EMAIL</label>
                <input type="email" name="email"
                      class="input-field <?php echo isset($errors['email']) ? 'input-error' : ''; ?>"
                      value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>"
                      required>
                <?php if (isset($errors['email'])): ?>
                    <div class="error-text"><?php echo htmlspecialchars($errors['email']); ?></div>
                <?php endif; ?>
            </div>

            <div class="input-group">
                <label class="input-label">PASSWORD</label>
                <input type="password" name="password"
                      class="input-field <?php echo isset($errors['password']) ? 'input-error' : ''; ?>"
                      required>
                <?php if (isset($errors['password'])): ?>
                    <div class="error-text"><?php echo htmlspecialchars($errors['password']); ?></div>
                <?php endif; ?>
            </div>

            <div class="input-group">
                <label class="input-label">CONFIRM PASSWORD</label>
                <input type="password" name="confirm_password"
                      class="input-field <?php echo isset($errors['confirm_password']) ? 'input-error' : ''; ?>"
                      required>
                <?php if (isset($errors['confirm_password'])): ?>
                    <div class="error-text"><?php echo htmlspecialchars($errors['confirm_password']); ?></div>
                <?php endif; ?>
            </div>

            <div class="input-group">
                <label class="input-label">FULL NAME</label>
                <input type="text" name="name"
                      class="input-field <?php echo isset($errors['name']) ? 'input-error' : ''; ?>"
                      value="<?php echo htmlspecialchars($_POST['name'] ?? ''); ?>"
                      required>
                <?php if (isset($errors['name'])): ?>
                    <div class="error-text"><?php echo htmlspecialchars($errors['name']); ?></div>
                <?php endif; ?>
            </div>

            <!-- Customer Fields -->
            <div id="customerFields" class="role-fields">
                <div class="input-group">
                    <label class="input-label">DATE OF BIRTH</label>
                    <input type="date" name="date_of_birth"
                          class="input-field <?php echo isset($errors['date_of_birth']) ? 'input-error' : ''; ?>"
                          value="<?php echo htmlspecialchars($_POST['date_of_birth'] ?? ''); ?>"
                          required>
                    <?php if (isset($errors['date_of_birth'])): ?>
                        <div class="error-text"><?php echo htmlspecialchars($errors['date_of_birth']); ?></div>
                    <?php endif; ?>
                </div>

                <div class="input-group">
                    <label class="input-label">GENDER</label>
                    <select name="gender"
                            class="input-field <?php echo isset($errors['gender']) ? 'input-error' : ''; ?>"
                            required>
                        <option value="male" <?php echo (isset($_POST['gender']) && $_POST['gender'] === 'male') ? 'selected' : ''; ?>>Male</option>
                        <option value="female" <?php echo (isset($_POST['gender']) && $_POST['gender'] === 'female') ? 'selected' : ''; ?>>Female</option>
                    </select>
                    <?php if (isset($errors['gender'])): ?>
                        <div class="error-text"><?php echo htmlspecialchars($errors['gender']); ?></div>
                    <?php endif; ?>
                </div>

                <div class="input-group">
                    <label class="input-label">BIO</label>
                    <textarea name="bio"
                              class="input-field <?php echo isset($errors['bio']) ? 'input-error' : ''; ?>"
                              rows="3"><?php echo htmlspecialchars($_POST['bio'] ?? ''); ?></textarea>
                    <?php if (isset($errors['bio'])): ?>
                        <div class="error-text"><?php echo htmlspecialchars($errors['bio']); ?></div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Business Fields -->
            <div id="businessFields" class="role-fields" style="display: none;">
                <div class="input-group">
                    <label class="input-label">BUSINESS NAME</label>
                    <input type="text" name="business_name"
                          class="input-field <?php echo isset($errors['business_name']) ? 'input-error' : ''; ?>"
                          value="<?php echo htmlspecialchars($_POST['business_name'] ?? ''); ?>"
                          required>
                    <?php if (isset($errors['business_name'])): ?>
                        <div class="error-text"><?php echo htmlspecialchars($errors['business_name']); ?></div>
                    <?php endif; ?>
                </div>

                <div class="input-group">
                    <label class="input-label">CITY</label>
                    <select name="city"
                            class="input-field <?php echo isset($errors['city']) ? 'input-error' : ''; ?>"
                            required>
                        <option value="Yogyakarta" <?php echo (isset($_POST['city']) && $_POST['city'] === 'Yogyakarta') ? 'selected' : ''; ?>>Yogyakarta City</option>
                        <option value="Bantul" <?php echo (isset($_POST['city']) && $_POST['city'] === 'Bantul') ? 'selected' : ''; ?>>Bantul</option>
                        <option value="Sleman" <?php echo (isset($_POST['city']) && $_POST['city'] === 'Sleman') ? 'selected' : ''; ?>>Sleman</option>
                        <option value="Gunungkidul" <?php echo (isset($_POST['city']) && $_POST['city'] === 'Gunungkidul') ? 'selected' : ''; ?>>Gunungkidul</option>
                        <option value="Kulon Progo" <?php echo (isset($_POST['city']) && $_POST['city'] === 'Kulon Progo') ? 'selected' : ''; ?>>Kulon Progo</option>
                    </select>
                    <?php if (isset($errors['city'])): ?>
                        <div class="error-text"><?php echo htmlspecialchars($errors['city']); ?></div>
                    <?php endif; ?>
                </div>

                <div class="input-group">
                    <label class="input-label">DESCRIPTION</label>
                    <textarea name="description"
                              class="input-field <?php echo isset($errors['description']) ? 'input-error' : ''; ?>"
                              rows="3"
                              required><?php echo htmlspecialchars($_POST['description'] ?? ''); ?></textarea>
                    <?php if (isset($errors['description'])): ?>
                        <div class="error-text"><?php echo htmlspecialchars($errors['description']); ?></div>
                    <?php endif; ?>
                </div>
            </div>

            <button type="submit" class="submit-btn">CREATE ACCOUNT</button>
        </form>
    </div>

    <!-- Particles.js Library -->
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Particle.js Configuration
            particlesJS('particles-js', {
                particles: {
                    number: {
                        value: 80,
                        density: {
                            enable: true,
                            value_area: 800
                        }
                    },
                    color: {
                        value: '#ffffff'
                    },
                    shape: {
                        type: 'circle'
                    },
                    opacity: {
                        value: 0.5,
                        random: true
                    },
                    size: {
                        value: 3,
                        random: true
                    },
                    line_linked: {
                        enable: true,
                        distance: 150,
                        color: '#ffffff',
                        opacity: 0.2,
                        width: 1
                    },
                    move: {
                        enable: true,
                        speed: 2,
                        direction: 'none',
                        random: false,
                        straight: false,
                        out_mode: 'out',
                        bounce: false
                    }
                },
                interactivity: {
                    detect_on: 'canvas',
                    events: {
                        onhover: {
                            enable: true,
                            mode: 'grab'
                        },
                        resize: true
                    },
                    modes: {
                        grab: {
                            distance: 140,
                            line_linked: {
                                opacity: 0.5
                            }
                        }
                    }
                }
            });

            // Set initial role values for both forms
            document.querySelectorAll('form').forEach(form => {
                const roleInput = form.querySelector('input[name="role"]');
                const activeRoleBtn = form.querySelector('.role-btn.active');
                if (roleInput && activeRoleBtn) {
                    roleInput.value = activeRoleBtn.dataset.role;
                    console.log('Initial role set:', roleInput.value); // Debug log
                }
            });

            // Tab Switching
            document.querySelectorAll('.tab-btn').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault(); // Prevent default button behavior
                    console.log('Tab clicked:', this.dataset.tab); // Debug log

                    // Remove existing success message when switching tabs
                    const successAlert = document.querySelector('.alert-success');
                    if (successAlert) {
                        successAlert.remove();
                    }

                    // Update active states
                    document.querySelectorAll('.tab-btn').forEach(btn =>
                        btn.classList.remove('active'));
                    this.classList.add('active');

                    // Switch forms
                    const formType = this.dataset.tab;
                    document.querySelectorAll('.auth-form').forEach(form => {
                        form.classList.remove('active');
                        form.style.display = 'none';
                    });

                    const targetForm = document.getElementById(formType + 'Form');
                    if (targetForm) {
                        targetForm.style.display = 'block';
                        setTimeout(() => targetForm.classList.add('active'), 50);
                    } else {
                        console.error('Target form not found:', formType + 'Form'); // Debug log
                    }
                });
            });

            // Manually trigger click on initial active tab
            const initialActiveTab = document.querySelector('.tab-btn.active');
            if (initialActiveTab) {
                initialActiveTab.click();
            } else {
                // If no active tab, default to login
                document.querySelector('.tab-btn[data-tab="login"]').click();
            }

            // Role Switching
            document.querySelectorAll('.role-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const form = this.closest('form');
                    const roleButtons = form.querySelectorAll('.role-btn');
                    const roleInput = form.querySelector('input[name="role"]');

                    roleButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');

                    // Update the hidden role input with the correct role value
                    roleInput.value = this.dataset.role;

                    if (form.id === 'registerForm') {
                        const isCustomer = this.dataset.role === 'CUSTOMER';
                        const customerFields = document.getElementById('customerFields');
                        const businessFields = document.getElementById('businessFields');

                        if (isCustomer) {
                            customerFields.style.display = 'block';
                            businessFields.style.display = 'none';
                            // Enable customer fields validation
                            customerFields.querySelectorAll('input, select, textarea').forEach(field => field.required = true);
                            businessFields.querySelectorAll('input, select, textarea').forEach(field => field.required = false);
                        } else {
                            customerFields.style.display = 'none';
                            businessFields.style.display = 'block';
                            // Enable business fields validation
                            customerFields.querySelectorAll('input, select, textarea').forEach(field => field.required = false);
                            businessFields.querySelectorAll('input, select, textarea').forEach(field => field.required = true);
                        }
                    }
                });
            });

            // Add form submission debug
            document.getElementById('registerForm').addEventListener('submit', function(e) {
                console.log('Form submitted'); // Debug log
                console.log('Selected role:', this.querySelector('input[name="role"]').value); // Debug log

                // Log all form data
                const formData = new FormData(this);
                for (let pair of formData.entries()) {
                    console.log(pair[0] + ':', pair[1]); // Debug log
                }
            });

            // Set active tab from PHP
            const activeTab = '<?php echo $activeTab; ?>';
            document.querySelector(`.tab-btn[data-tab="${activeTab}"]`).click();

            // Clear success message after 5 seconds
            const successAlert = document.querySelector('.alert-success');
            if (successAlert) {
                setTimeout(() => {
                    successAlert.style.opacity = '0';
                    setTimeout(() => successAlert.remove(), 300);
                }, 5000);
            }

            // Password Confirmation
            document.getElementById('registerForm').addEventListener('submit', function(e) {
                const password = this.querySelector('input[name="password"]');
                const confirm = this.querySelector('input[name="confirm_password"]');

                if (password.value !== confirm.value) {
                    e.preventDefault();
                    alert('Passwords do not match!');
                }
            });
        });
    </script>
</body>
</html>