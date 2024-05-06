<?php
include "../koneksi.php";

// Delete image
if (isset($_GET['idgambar'])) {
    $id = $_GET['idgambar'];
    $sql = "SELECT fotogbr FROM foto WHERE idgambar=$id";
    $result = $link->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $filename = $row['fotogbr'];
        unlink("gambar/$filename"); // Delete file from server
        $sql = "DELETE FROM foto WHERE idgambar=$id";
        if ($link->query($sql) === TRUE) {
            echo "Image deleted successfully";
        } else {
            echo "Error deleting image: " . $link->error;
        }
    } else {
        echo "Image not found";
    }
    header('Location: tables.galeri.php');
}

$link->close();
?>
