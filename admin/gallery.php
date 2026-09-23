<?php
require_once 'config.php';
require_once 'auth.php';

$db = getDB();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    $caption = $db->real_escape_string($_POST['caption'] ?? '');
    
    $file = $_FILES['image'];
    if ($file['error'] === UPLOAD_ERR_OK) {
        $allowed = ['jpg', 'jpeg', 'png', 'webp'];
        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        
        if (in_array($ext, $allowed) && $file['size'] <= 5000000) {
            $filename = uniqid('gal_') . '.' . $ext;
            $destination = '../assets/images/gallery/' . $filename;
            
            if (move_uploaded_file($file['tmp_name'], $destination)) {
                $res = $db->query("SELECT MAX(display_order) as max_ord FROM gallery");
                $max = $res->fetch_assoc()['max_ord'] ?? 0;
                $new_ord = $max + 1;
                
                $db->query("INSERT INTO gallery (filename, caption, display_order) VALUES ('$filename', '$caption', $new_ord)");
            }
        }
    }
    header('Location: gallery.php');
    exit;
}

if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $res = $db->query("SELECT filename FROM gallery WHERE id = $id");
    if ($row = $res->fetch_assoc()) {
        $filepath = '../assets/images/gallery/' . $row['filename'];
        if (file_exists($filepath)) unlink($filepath);
        $db->query("DELETE FROM gallery WHERE id = $id");
    }
    header('Location: gallery.php');
    exit;
}

$images = $db->query("SELECT * FROM gallery ORDER BY display_order ASC, created_at DESC")->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Gallery Admin - Lucy Mworia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/main.css">
    <style>
        body { background-color: var(--color-ink); color: var(--color-ivory); }
        .gallery-card { border: 1px solid rgba(184,147,90,0.3); padding: 1rem; margin-bottom: 1rem; }
        .gallery-img { width: 100%; height: 200px; object-fit: cover; border-radius: 4px; }
    </style>
</head>
<body class="p-4">
    <div class="d-flex justify-content-between align-items-center mb-5 border-bottom border-secondary pb-3">
        <h2 style="font-family: var(--font-heading); color: var(--color-gold);">Manage Gallery</h2>
        <div>
            <a href="dashboard.php" class="btn btn-outline-light me-3">Back to Orders</a>
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>
    </div>
    
    <div class="row">
        <div class="col-lg-4 mb-4">
            <div class="p-4" style="background: rgba(184,147,90,0.05); border: 1px dashed var(--color-gold);">
                <h4 class="mb-4" style="color: var(--color-gold);">Upload New Image</h4>
                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="eyebrow">Image (JPG, PNG - Max 5MB)</label>
                        <input type="file" name="image" class="form-control mt-2" style="background: transparent; color: #fff;" required accept="image/*">
                    </div>
                    <div class="mb-4">
                        <label class="eyebrow">Caption (Optional)</label>
                        <input type="text" name="caption" class="form-control mt-2" style="background: transparent; color: #fff;">
                    </div>
                    <button class="btn-gold-solid w-100">Upload Image</button>
                </form>
            </div>
        </div>
        
        <div class="col-lg-8">
            <div class="row">
                <?php foreach ($images as $img): ?>
                <div class="col-sm-6 col-md-4">
                    <div class="gallery-card">
                        <img src="../assets/images/gallery/<?= htmlspecialchars($img['filename']) ?>" class="gallery-img mb-3">
                        <p class="small mb-3 text-truncate" style="opacity: 0.8; font-family: var(--font-ui);"><?= htmlspecialchars($img['caption']) ?: '<em style="opacity:0.5;">No caption</em>' ?></p>
                        <a href="?delete=<?= $img['id'] ?>" class="btn btn-sm btn-outline-danger w-100" onclick="return confirm('Are you sure you want to delete this image?');">Delete</a>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php if (count($images) == 0): ?>
                    <p class="text-center w-100 py-5" style="opacity:0.5; font-family: var(--font-ui);">No images uploaded yet.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>
