
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

$sql = " SELECT * FROM User  ";
$result = mysqli_query($conn, $sql);

// Vérifier si la requête a réussi
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

while ($row = mysqli_fetch_assoc($result)) {
    echo "Username : " . $row["Username"] . "email : " . $row["email"] 
    . "password: " . $row["password"] . "adresse : " . $row["adresse"] . "num: " . $row["numero"] .
    "<br>";
}

mysqli_close($conn);
?>