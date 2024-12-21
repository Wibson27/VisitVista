<?php
function validateRegistration($data, $role) {
    $errors = [];

    // Common validations
    if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Valid email is required";
    }

    if (empty($data['password']) || strlen($data['password']) < 6) {
        $errors['password'] = "Password must be at least 6 characters";
    }

    if ($data['password'] !== $data['confirm_password']) {
        $errors['confirm_password'] = "Passwords do not match";
    }

    if (empty($data['name'])) {
        $errors['name'] = "Name is required";
    }

    // Role specific validations
    if ($role === 'CUSTOMER') {
        if (empty($data['date_of_birth'])) {
            $errors['date_of_birth'] = "Date of birth is required";
        }
        if (empty($data['gender'])) {
            $errors['gender'] = "Gender is required";
        }
    } else {
        if (empty($data['business_name'])) {
            $errors['business_name'] = "Business name is required";
        }
        if (empty($data['city'])) {
            $errors['city'] = "City is required";
        }
        if (empty($data['description'])) {
            $errors['description'] = "Business description is required";
        }
    }

    return $errors;
}

function validateLogin($data) {
    $errors = [];

    if (empty($data['email']) || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Valid email is required";
    }

    if (empty($data['password'])) {
        $errors['password'] = "Password is required";
    }

    return $errors;
}