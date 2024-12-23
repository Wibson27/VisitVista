<?php
require_once __DIR__ . '/../config/db_connect.php';

// ====== Place Functions ======
function getAllPlaces() {
    global $db;
    try {
        $query = "
            SELECT
                p.*,
                (SELECT image_url FROM place_images WHERE place_id = p.id LIMIT 1) as image_url
            FROM places p
            ORDER BY p.created_at DESC
        ";
        $stmt = $db->query($query);
        return $stmt->fetchAll();
    } catch(Exception $e) {
        error_log($e->getMessage());
        return [];
    }
}

function getPlaceById($id) {
    global $db;
    try {
        $query = "
            SELECT
                p.*,
                GROUP_CONCAT(pi.image_url) as images
            FROM places p
            LEFT JOIN place_images pi ON p.id = pi.place_id
            WHERE p.id = ?
            GROUP BY p.id
        ";
        $stmt = $db->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch();
    } catch(Exception $e) {
        error_log($e->getMessage());
        return null;
    }
}

function getPlacesByBusinessId($businessId) {
    global $db;
    try {
        $query = "
            SELECT
                p.*,
                (SELECT image_url FROM place_images WHERE place_id = p.id LIMIT 1) as image_url
            FROM places p
            WHERE p.business_id = ?
            ORDER BY p.created_at DESC
        ";
        $stmt = $db->prepare($query);
        $stmt->execute([$businessId]);
        return $stmt->fetchAll();
    } catch(Exception $e) {
        error_log($e->getMessage());
        return [];
    }
}


// ====== User Functions ======
function getUserById($id) {
    global $db;
    try {
        $stmt = $db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    } catch(Exception $e) {
        error_log($e->getMessage());
        return null;
    }
}

function getUserByEmail($email) {
    global $db;
    try {
        $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch();
    } catch(Exception $e) {
        error_log($e->getMessage());
        return null;
    }
}

// ====== Business Profile Functions ======
function getBusinessProfile($userId) {
    global $db;
    try {
        $stmt = $db->prepare("SELECT * FROM business_profiles WHERE user_id = ?");
        $stmt->execute([$userId]);
        return $stmt->fetch();
    } catch(Exception $e) {
        error_log($e->getMessage());
        return null;
    }
}

// ====== Booking Functions ======
function getUserBookings($userId) {
    global $db;
    try {
        $query = "
            SELECT
                b.*,
                p.name as place_name,
                p.city as place_city,
                (SELECT image_url FROM place_images WHERE place_id = p.id LIMIT 1) as place_image
            FROM bookings b
            JOIN places p ON b.place_id = p.id
            WHERE b.user_id = ?
            ORDER BY b.created_at DESC
        ";
        $stmt = $db->prepare($query);
        $stmt->execute([$userId]);
        return $stmt->fetchAll();
    } catch(Exception $e) {
        error_log($e->getMessage());
        return [];
    }
}

function getBookingById($id) {
    global $db;
    try {
        $query = "
            SELECT
                b.*,
                p.name as place_name,
                p.city as place_city,
                u.name as user_name,
                u.email as user_email
            FROM bookings b
            JOIN places p ON b.place_id = p.id
            JOIN users u ON b.user_id = u.id
            WHERE b.id = ?
        ";
        $stmt = $db->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch();
    } catch(Exception $e) {
        error_log($e->getMessage());
        return null;
    }
}

// ====== Review Functions ======
function getPlaceReviews($placeId) {
    global $db;
    try {
        $query = "
            SELECT
                r.*,
                u.name as user_name
            FROM reviews r
            JOIN users u ON r.user_id = u.id
            WHERE r.place_id = ?
            ORDER BY r.created_at DESC
        ";
        $stmt = $db->prepare($query);
        $stmt->execute([$placeId]);
        return $stmt->fetchAll();
    } catch(Exception $e) {
        error_log($e->getMessage());
        return [];
    }
}

function getUserReviews($userId) {
    global $db;
    try {
        $query = "
            SELECT
                r.*,
                p.name as place_name,
                p.city as place_city
            FROM reviews r
            JOIN places p ON r.place_id = p.id
            WHERE r.user_id = ?
            ORDER BY r.created_at DESC
        ";
        $stmt = $db->prepare($query);
        $stmt->execute([$userId]);
        return $stmt->fetchAll();
    } catch(Exception $e) {
        error_log($e->getMessage());
        return [];
    }
}

// ====== Statistics Functions ======
function getCityStatistics($city, $year = null, $month = null) {
    global $db;
    try {
        $params = [$city];
        $query = "SELECT * FROM tourism_statistics WHERE city = ?";

        if ($year) {
            $query .= " AND year = ?";
            $params[] = $year;
        }
        if ($month) {
            $query .= " AND month = ?";
            $params[] = $month;
        }

        $query .= " ORDER BY year DESC, month DESC";

        $stmt = $db->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll();
    } catch(Exception $e) {
        error_log($e->getMessage());
        return [];
    }
}

// ====== Article Functions ======
function getAllArticles() {
    global $db;
    try {
        $query = "SELECT * FROM articles ORDER BY created_at DESC";
        $stmt = $db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(Exception $e) {
        error_log($e->getMessage());
        return [];
    }
}

function getArticleById($id) {
    global $db; // Gunakan global $db yang sudah ada
    try {
        $stmt = $db->prepare("SELECT *,
                           COALESCE(content_full, content) as full_content
                           FROM articles WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch(Exception $e) {
        error_log($e->getMessage());
        return null;
    }
}

function getArticlesByCategory($category) {
    global $db;
    try {
        $query = "SELECT * FROM articles WHERE category = ? ORDER BY created_at DESC";
        $stmt = $db->prepare($query);
        $stmt->execute([$category]);
        return $stmt->fetchAll();
    } catch(Exception $e) {
        error_log($e->getMessage());
        return [];
    }
}

function createUser($email, $password, $name, $phone, $role) {
  global $db;
  try {
      // Generate user ID based on role
      $prefix = ($role === 'BUSINESS') ? 'B' : 'C';
      $stmt = $db->prepare("SELECT MAX(CAST(SUBSTRING(id, 2) AS UNSIGNED)) as max_id FROM users WHERE id LIKE ?");
      $stmt->execute([$prefix . '%']);
      $result = $stmt->fetch();
      $nextId = ($result['max_id'] ?? 0) + 1;
      $userId = $prefix . str_pad($nextId, 3, '0', STR_PAD_LEFT);

      // Insert user
      $stmt = $db->prepare("INSERT INTO users (id, email, password, name, phone, role) VALUES (?, ?, ?, ?, ?, ?)");
      $stmt->execute([$userId, $email, password_hash($password, PASSWORD_DEFAULT), $name, $phone, $role]);

      return $userId;
  } catch(Exception $e) {
      error_log($e->getMessage());
      return false;
  }
}

function createProfile($userId, $profileData, $role) {
  global $db;
  try {
      if ($role === 'BUSINESS') {
          $stmt = $db->prepare("INSERT INTO business_profiles (user_id, business_name, city, description, verification_status) VALUES (?, ?, ?, ?, 'PENDING')");
          $stmt->execute([
              $userId,
              $profileData['business_name'],
              $profileData['city'],
              $profileData['description']
          ]);
      } else {
          $stmt = $db->prepare("INSERT INTO customer_profiles (user_id, date_of_birth, gender, bio) VALUES (?, ?, ?, ?)");
          $stmt->execute([
              $userId,
              $profileData['date_of_birth'],
              $profileData['gender'],
              $profileData['bio']
          ]);
      }
      return true;
  } catch(Exception $e) {
      error_log($e->getMessage());
      return false;
  }
}



// Data tempat wisata untuk suggestions
function getPlacesSuggestions() {
    return [
        "Borobudur Temple",
        "Mount Bromo",
        "Bali Beach",
        "Tana Toraja",
        "Komodo Island",
        "Lake Toba",
        "Prambanan Temple",
        "Raja Ampat"
    ];
}

// Function untuk mencari suggestions
function searchSuggestions($query) {
    if (strlen($query) < 2) {
        return [];
    }

    $places = getPlacesSuggestions();
    return array_filter($places, function($place) use ($query) {
        return stripos($place, $query) !== false;
    });
}

// Fungsi untuk mendapatkan script JavaScript
function getSearchScripts() {
    return <<<HTML
    <script>
    const places = [
        "Borobudur Temple",
        "Mount Bromo",
        "Bali Beach",
        "Tana Toraja",
        "Komodo Island",
        "Lake Toba",
        "Prambanan Temple",
        "Raja Ampat"
    ];

    function showAllSuggestions() {
        const suggestionsDiv = document.getElementById('suggestions');
        suggestionsDiv.innerHTML = places
            .map(place =>
                '<div class="suggestion-item">' +
                    place +
                '</div>'
            )
            .join('');
        suggestionsDiv.style.display = 'block';
    }

    function filterSuggestions(query) {
        if (!query) {
            showAllSuggestions();
            return;
        }

        const suggestionsDiv = document.getElementById('suggestions');
        const filteredPlaces = places.filter(place =>
            place.toLowerCase().includes(query.toLowerCase())
        );

        if (filteredPlaces.length > 0) {
            suggestionsDiv.innerHTML = filteredPlaces
                .map(place =>
                    '<div class="suggestion-item">' +
                        place +
                    '</div>'
                )
                .join('');
            suggestionsDiv.style.display = 'block';
        } else {
            suggestionsDiv.innerHTML =
                '<div class="suggestion-item">' +
                    'No results found' +
                '</div>';
            suggestionsDiv.style.display = 'block';
        }
    }

    // Sembunyikan suggestions saat klik di luar
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.search-input-wrapper')) {
            document.getElementById('suggestions').style.display = 'none';
        }
    });
    </script>
HTML;
}

// Example usage in your pages:
/*
// In your places.php:
$places = getAllPlaces();

// In your place_detail.php:
$place = getPlaceById($_GET['id']);
$reviews = getPlaceReviews($_GET['id']);

// In your profile.php:
$userBookings = getUserBookings($_SESSION['user_id']);
$userReviews = getUserReviews($_SESSION['user_id']);

// In your business_dashboard.php:
$businessProfile = getBusinessProfile($_SESSION['user_id']);
$businessPlaces = getPlacesByBusinessId($businessProfile['id']);
*/