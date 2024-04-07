<?php
// Koneksi ke database (ganti informasi sesuai dengan database Anda)
$koneksi = mysqli_connect("localhost", "root", "", "contact_owner");

// Periksa koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit();
}


$query = "SELECT * FROM list_contact";
$result = mysqli_query($koneksi, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="sidebar">
        <ul>
            <li><a href="#"><img src="akun.png" alt="account Icon"> Account</a></li>
            <li><a href="#"><img src="setting.png" alt="Settings Icon"> Settings</a></li>
            <li><a href="#"><img src="logout.png" alt="Settings Icon"> Logout</a></li>
        </ul>
    </div>
    <div class="main">
        <h2>List Contact</h2>
        <table>
            <thead>
                <tr>
                    <th>No ID</th>
                    <th>No HP</th>
                    <th>Owner</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Tampilan data kontak dalam tabel
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['No_ID'] . "</td>"; 
                    echo "<td>" . $row['No_HP'] . "</td>"; 
                    echo "<td>" . $row['Owner'] . "</td>"; 
                    echo "<td>";
                    echo "<button>Edit</button>";
                    echo "<button>Delete</button>";
                    echo "</td>";
                    echo "</tr>";
                }
                
                // Bebaskan hasil
                mysqli_free_result($result);
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
<?php
//menutup koneksi
mysqli_close($koneksi);
?>
