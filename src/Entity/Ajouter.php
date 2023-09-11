<?
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "j";

// Créer la connexion
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Vérifier la connexion
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$nom = $_POST['username'];
$email = $_POST['email'];
$motdepasse = $_POST['password'];
$adresse = $_POST['adresse'];
$numero = $_POST['numero'];


$sql = "INSERT INTO User (nom, email, motdepasse, adresse, numero ) VALUES ('$nom', '$email' ,'$motdepasse','$adresse','$numero')";
$result = mysqli_query($conn, $sql);

// Vérifier si la requête a réussi
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
} else {
    echo "Données ajoutées avec succès !";
}

mysqli_close($conn);
?>