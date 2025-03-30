<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $input = json_decode(file_get_contents('php://input'), true) ?? $_POST;
        
        if (empty($input['nombre'])) {
            throw new Exception('El nombre es requerido');
        }
        
        // Aquí iría tu lógica para guardar en la base de datos
        // $guardado = guardarEnBD($input['nombre']);
        $guardado = true; // Simulación
        
        if ($guardado) {
            echo json_encode([
                'success' => true,
                'message' => 'Pasatiempo agregado correctamente'
            ]);
        } else {
            throw new Exception('Error al guardar en la base de datos');
        }
    } catch (Exception $e) {
        http_response_code(400);
        echo json_encode([
            'success' => false,
            'error' => $e->getMessage()
        ]);
    }
} else {
    http_response_code(405);
    echo json_encode([
        'success' => false,
        'error' => 'Método no permitido. Se esperaba POST'
    ]);
}
?>
