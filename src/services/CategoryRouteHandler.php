use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
require 'src\config\db.php';  // Ajustați calea dacă e necesar
class CategoryRouteHandler
{
    public static function getCategory(Request $request, Response $response, $args)
    {
        // Extrageți ID-ul categoriei din parametrii rutei
        $categoryId = $args['category_id'];

        // Conexiunea la baza de date (asigurați-vă că fișierul db.php este inclus)
       

        // Preluăm datele categoriei din baza de date
        $stmt = $pdo->prepare("SELECT * FROM category WHERE category_id = :category_id");
        $stmt->execute(['category_id' => $category_id]);
        $category = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verificați dacă categoria a fost găsită
        if (!$category) {
            $response = $response->withStatus(404, 'Category not found');
            $jsonData = json_encode(['error' => 'Category not found']);
            $response->getBody()->write($jsonData);
            return $response;
        }

        // Convertiți datele categoriei în JSON
        $jsonData = json_encode($category);

        // Setează headerele de răspuns
        $response = $response->withHeader('Content-Type', 'application/json');

        // Scrieți datele JSON în corpul răspunsului
        $response->getBody()->write($jsonData);

        return $response;
    }
}
