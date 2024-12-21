<?php
require_once __DIR__ . '/../config/db_connect.php';

// ====== Place Functions ======
function getAllPlaces() {
    global $db;
    try {
        $query = "
            SELECT
                p.*,
                bp.business_name,
                (SELECT image_url FROM place_images WHERE place_id = p.id LIMIT 1) as image_url
            FROM places p
            LEFT JOIN business_profiles bp ON p.business_id = bp.id
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
                bp.business_name,
                bp.city as business_city,
                GROUP_CONCAT(pi.image_url) as images
            FROM places p
            LEFT JOIN business_profiles bp ON p.business_id = bp.id
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

// Fungsi untuk mengambil semua kategori
function getAllCategories() {
    global $conn;
    
    try {
        $sql = "SELECT * FROM categories ORDER BY name ASC";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }
        return [];
    } catch (Exception $e) {
        error_log($e->getMessage());
        return [];
    }
}

// Fungsi untuk mengambil places dengan kategorinya
function getAllPlacesWithCategories() {
    global $conn;
    
    try {
        $sql = "SELECT p.*, c.name as category_name 
                FROM places p 
                LEFT JOIN categories c ON p.category_id = c.id 
                ORDER BY p.created_at DESC";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }
        return [];
    } catch (Exception $e) {
        error_log($e->getMessage());
        return [];
    }
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