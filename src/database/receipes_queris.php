function getCategories($pdo) {
    return $pdo->query('SELECT * FROM category');
}
//example of what to do