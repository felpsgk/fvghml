//session_start();

    $servername = "localhost"; /* pode deixar localhost */

    $username = "hnrtco66_felpsgk"; /* nome do usuario do banco de dados */ 

    $password = "rootdoadmin"; /* senha do banco de dados caso exista senao deixa $password = "" */

    $dbname = "hnrtco66_fvghml"; /* nome do seu banco de dados*/

    $port = "3306"; /* nome do seu banco de dados*/
    // Criando a conexão com o banco de dados
    $strcon = new mysqli($servername, $username, $password, $dbname, $port);
    $connect = new PDO("mysql:host=localhost;dbname=hnrtco66_fvghml", $username, $password);

    // Checando a conexão com o banco de dados

	@@ -24,4 +23,4 @@

    } 

?>
