<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Académico PHP - POO</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php
    // ============================================
    // CLASES PARA FORMAS GEOMÉTRICAS
    // ============================================
    
    // Variables para el footer
    date_default_timezone_set('America/Panama');
    $fechaActual = date('d/m/Y');
    $anio = date('Y');
    
    interface FormaGeometrica {
        public function calcularArea();
        public function calcularPerimetro();
        public function obtenerNombre();
    }

    abstract class Forma implements FormaGeometrica {
        protected $nombre;
        
        public function __construct($nombre) {
            $this->nombre = $nombre;
        }
        
        public function obtenerNombre() {
            return $this->nombre;
        }
        
        abstract public function mostrarInformacion();
    }

    class Rectangulo extends Forma {
        private $base;
        private $altura;
        
        public function __construct($base, $altura) {
            parent::__construct("Rectángulo");
            $this->base = $base;
            $this->altura = $altura;
        }
        
        public function calcularArea() {
            return $this->base * $this->altura;
        }
        
        public function calcularPerimetro() {
            return 2 * ($this->base + $this->altura);
        }
        
        public function getDiagonal() {
            return sqrt(pow($this->base, 2) + pow($this->altura, 2));
        }
        
        public function mostrarInformacion() {
            return [
                'nombre' => $this->nombre,
                'base' => $this->base,
                'altura' => $this->altura,
                'area' => $this->calcularArea(),
                'perimetro' => $this->calcularPerimetro(),
                'diagonal' => $this->getDiagonal()
            ];
        }
    }

    class Triangulo extends Forma {
        private $base;
        private $altura;
        private $lado1;
        private $lado2;
        private $lado3;
        
        public function __construct($base, $altura, $lado1, $lado2, $lado3) {
            parent::__construct("Triángulo");
            $this->base = $base;
            $this->altura = $altura;
            $this->lado1 = $lado1;
            $this->lado2 = $lado2;
            $this->lado3 = $lado3;
        }
        
        public function calcularArea() {
            return ($this->base * $this->altura) / 2;
        }
        
        public function calcularPerimetro() {
            return $this->lado1 + $this->lado2 + $this->lado3;
        }
        
        public function getSemiperimetro() {
            return $this->calcularPerimetro() / 2;
        }
        
        public function mostrarInformacion() {
            return [
                'nombre' => $this->nombre,
                'base' => $this->base,
                'altura' => $this->altura,
                'lado1' => $this->lado1,
                'lado2' => $this->lado2,
                'lado3' => $this->lado3,
                'area' => $this->calcularArea(),
                'perimetro' => $this->calcularPerimetro(),
                'semiperimetro' => $this->getSemiperimetro()
            ];
        }
    }

    class Circulo extends Forma {
        private $radio;
        
        public function __construct($radio) {
            parent::__construct("Círculo");
            $this->radio = $radio;
        }
        
        public function calcularArea() {
            return pi() * pow($this->radio, 2);
        }
        
        public function calcularPerimetro() {
            return 2 * pi() * $this->radio;
        }
        
        public function getDiametro() {
            return $this->radio * 2;
        }
        
        public function getCircunferencia() {
            return $this->calcularPerimetro();
        }
        
        public function mostrarInformacion() {
            return [
                'nombre' => $this->nombre,
                'radio' => $this->radio,
                'diametro' => $this->getDiametro(),
                'area' => $this->calcularArea(),
                'perimetro' => $this->calcularPerimetro(),
                'circunferencia' => $this->getCircunferencia()
            ];
        }
    }

    // ============================================
    // CLASES PARA SISTEMA DE SALUDOS
    // ============================================
    abstract class Saludo {
        protected $nombre;
        protected $idioma;
        
        public function __construct($nombre) {
            $this->nombre = $nombre;
        }
        
        abstract public function saludar();
        abstract public function despedir();
        
        public function obtenerIdioma() {
            return $this->idioma;
        }
    }

    class SaludoEspanol extends Saludo {
        public function __construct($nombre) {
            parent::__construct($nombre);
            $this->idioma = "Español";
        }
        
        public function saludar() {
            return "¡Hola, {$this->nombre}! 👋 ¡Bienvenido/a!";
        }
        
        public function despedir() {
            return "¡Hasta luego, {$this->nombre}! 👋 ¡Que tengas un excelente día!";
        }
        
        public function saludoFormal() {
            return "Buenos días, Sr./Sra. {$this->nombre}. Es un placer saludarle.";
        }
    }

    class SaludoIngles extends Saludo {
        public function __construct($nombre) {
            parent::__construct($nombre);
            $this->idioma = "English";
        }
        
        public function saludar() {
            return "Hello, {$this->nombre}! 👋 Welcome!";
        }
        
        public function despedir() {
            return "Goodbye, {$this->nombre}! 👋 Have a great day!";
        }
        
        public function saludoCasual() {
            return "Hey {$this->nombre}! What's up? 😎";
        }
    }

    class SaludoFrances extends Saludo {
        public function __construct($nombre) {
            parent::__construct($nombre);
            $this->idioma = "Français";
        }
        
        public function saludar() {
            return "Bonjour, {$this->nombre}! 👋 Bienvenue!";
        }
        
        public function despedir() {
            return "Au revoir, {$this->nombre}! 👋 Bonne journée!";
        }
        
        public function saludoAmistoso() {
            return "Salut {$this->nombre}! Ça va? 😊";
        }
    }

    class SaludoAleman extends Saludo {
        public function __construct($nombre) {
            parent::__construct($nombre);
            $this->idioma = "Deutsch";
        }
        
        public function saludar() {
            return "Guten Tag, {$this->nombre}! 👋 Willkommen!";
        }
        
        public function despedir() {
            return "Auf Wiedersehen, {$this->nombre}! 👋 Schönen Tag!";
        }
        
        public function saludoInformal() {
            return "Hallo {$this->nombre}! Wie geht's? 🙂";
        }
    }

    // ============================================
    // PROCESAMIENTO DE FORMULARIOS
    // ============================================
    $vista = isset($_GET['vista']) ? $_GET['vista'] : 'home';
    $resultado = null;
    $tipoForma = '';
    $saludoResultado = null;

    // Procesamiento de formas geométricas
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['forma'])) {
        $forma = $_POST['forma'];
        
        try {
            if ($forma === 'rectangulo') {
                $base = floatval($_POST['base']);
                $altura = floatval($_POST['altura']);
                $objeto = new Rectangulo($base, $altura);
                $tipoForma = 'rectangulo';
            } elseif ($forma === 'triangulo') {
                $base = floatval($_POST['base']);
                $altura = floatval($_POST['altura']);
                $lado1 = floatval($_POST['lado1']);
                $lado2 = floatval($_POST['lado2']);
                $lado3 = floatval($_POST['lado3']);
                $objeto = new Triangulo($base, $altura, $lado1, $lado2, $lado3);
                $tipoForma = 'triangulo';
            } elseif ($forma === 'circulo') {
                $radio = floatval($_POST['radio']);
                $objeto = new Circulo($radio);
                $tipoForma = 'circulo';
            }

            if (isset($objeto)) {
                $resultado = $objeto->mostrarInformacion();
            }
        } catch (Exception $e) {
            $error = $e->getMessage();
        }
    }

    // Procesamiento de saludos
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idioma'])) {
        $nombre = htmlspecialchars($_POST['nombre']);
        $idioma = $_POST['idioma'];
        
        switch ($idioma) {
            case 'espanol':
                $saludoObj = new SaludoEspanol($nombre);
                $saludoResultado = [
                    'saludo' => $saludoObj->saludar(),
                    'despedida' => $saludoObj->despedir(),
                    'extra' => $saludoObj->saludoFormal(),
                    'idioma' => $saludoObj->obtenerIdioma(),
                    'bandera' => '🇪🇸'
                ];
                break;
            case 'ingles':
                $saludoObj = new SaludoIngles($nombre);
                $saludoResultado = [
                    'saludo' => $saludoObj->saludar(),
                    'despedida' => $saludoObj->despedir(),
                    'extra' => $saludoObj->saludoCasual(),
                    'idioma' => $saludoObj->obtenerIdioma(),
                    'bandera' => '🇺🇸'
                ];
                break;
            case 'frances':
                $saludoObj = new SaludoFrances($nombre);
                $saludoResultado = [
                    'saludo' => $saludoObj->saludar(),
                    'despedida' => $saludoObj->despedir(),
                    'extra' => $saludoObj->saludoAmistoso(),
                    'idioma' => $saludoObj->obtenerIdioma(),
                    'bandera' => '🇫🇷'
                ];
                break;
            case 'aleman':
                $saludoObj = new SaludoAleman($nombre);
                $saludoResultado = [
                    'saludo' => $saludoObj->saludar(),
                    'despedida' => $saludoObj->despedir(),
                    'extra' => $saludoObj->saludoInformal(),
                    'idioma' => $saludoObj->obtenerIdioma(),
                    'bandera' => '🇩🇪'
                ];
                break;
        }
    }
    ?>

    <div class="container">
        <!-- HEADER PRINCIPAL -->
        <header>
            <h1>Sistema Académico PHP</h1>
            <p>Programación Orientada a Objetos - Proyecto Integrado</p>
        </header>

        <?php if ($vista === 'home'): ?>
            <!-- HOME / DASHBOARD PRINCIPAL -->
                <div class="modules-grid">
                    <a href="?vista=formas" class="module-card module-geometry">
                        <div class="module-icon">📐</div>
                        <h3>Calculadora Geométrica</h3>
                        <p>Calcula áreas, perímetros y propiedades de formas geométricas</p>
                        <div class="module-features">
                            <span class="feature-tag">Rectángulos</span>
                            <span class="feature-tag">Triángulos</span>
                            <span class="feature-tag">Círculos</span>
                        </div>
                        <span class="arrow">→</span>
                    </a>

                    <a href="?vista=saludos" class="module-card module-greetings">
                        <div class="module-icon">🌍</div>
                        <h3>Sistema de Saludos</h3>
                        <p>Genera saludos personalizados en múltiples idiomas</p>
                        <div class="module-features">
                            <span class="feature-tag">🇪🇸 Español</span>
                            <span class="feature-tag">🇺🇸 Inglés</span>
                            <span class="feature-tag">🇫🇷 Francés</span>
                            <span class="feature-tag">🇩🇪 Alemán</span>
                        </div>
                        <span class="arrow">→</span>
                    </a>
                </div>

            </div>                </div>

            </div>

        <?php elseif ($vista === 'formas'): ?>
            <!-- MÓDULO DE FORMAS GEOMÉTRICAS -->
            <div class="back-button">
                <a href="?vista=home">← Volver al Inicio</a>
            </div>

            <div class="module-header">
                <h2>Calculadora de Formas Geométricas</h2>
                <p>Selecciona una forma para calcular sus propiedades</p>
            </div>

            <div class="cards-grid">
                <a href="?vista=rectangulo" class="dashboard-card">
                    <div class="card-icon">📐</div>
                    <h3>Rectángulo</h3>
                    <p>Calcula área, perímetro y diagonal</p>
                    <span class="arrow">→</span>
                </a>

                <a href="?vista=triangulo" class="dashboard-card">
                    <div class="card-icon">🔺</div>
                    <h3>Triángulo</h3>
                    <p>Calcula área, perímetro y semiperímetro</p>
                    <span class="arrow">→</span>
                </a>

                <a href="?vista=circulo" class="dashboard-card">
                    <div class="card-icon">⭕</div>
                    <h3>Círculo</h3>
                    <p>Calcula área, perímetro y circunferencia</p>
                    <span class="arrow">→</span>
                </a>
            </div>

        <?php elseif ($vista === 'rectangulo'): ?>
            <!-- CALCULADORA DE RECTÁNGULO -->
            <div class="back-button">
                <a href="?vista=formas">← Volver a Formas</a>
            </div>
            <div class="form-section">
                <div class="form-card">
                    <div class="card-header">
                        <h2>📐 Calculadora de Rectángulo</h2>
                    </div>
                    <form method="POST" action="?vista=rectangulo">
                        <input type="hidden" name="forma" value="rectangulo">
                        <div class="form-group">
                            <label>Base (unidades):</label>
                            <input type="number" name="base" step="0.01" required min="0.01">
                        </div>
                        <div class="form-group">
                            <label>Altura (unidades):</label>
                            <input type="number" name="altura" step="0.01" required min="0.01">
                        </div>
                        <button type="submit" class="btn">Calcular Rectángulo</button>
                    </form>
                </div>

                <?php if ($resultado && $tipoForma === 'rectangulo'): ?>
                    <div class="result-card">
                        <h3>✅ Resultados - Rectángulo</h3>
                        <div class="result-grid">
                            <div class="result-item">
                                <span class="label">Base:</span>
                                <span class="value"><?php echo number_format($resultado['base'], 2); ?> u</span>
                            </div>
                            <div class="result-item">
                                <span class="label">Altura:</span>
                                <span class="value"><?php echo number_format($resultado['altura'], 2); ?> u</span>
                            </div>
                            <div class="result-item highlight">
                                <span class="label">📏 Área:</span>
                                <span class="value"><?php echo number_format($resultado['area'], 2); ?> u²</span>
                            </div>
                            <div class="result-item highlight">
                                <span class="label">📐 Perímetro:</span>
                                <span class="value"><?php echo number_format($resultado['perimetro'], 2); ?> u</span>
                            </div>
                            <div class="result-item highlight">
                                <span class="label">📏 Diagonal:</span>
                                <span class="value"><?php echo number_format($resultado['diagonal'], 2); ?> u</span>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

        <?php elseif ($vista === 'triangulo'): ?>
            <!-- CALCULADORA DE TRIÁNGULO -->
            <div class="back-button">
                <a href="?vista=formas">← Volver a Formas</a>
            </div>
            <div class="form-section">
                <div class="form-card">
                    <div class="card-header">
                        <h2>🔺 Calculadora de Triángulo</h2>
                    </div>
                    <form method="POST" action="?vista=triangulo">
                        <input type="hidden" name="forma" value="triangulo">
                        <div class="form-group">
                            <label>Base (unidades):</label>
                            <input type="number" name="base" step="0.01" required min="0.01">
                        </div>
                        <div class="form-group">
                            <label>Altura (unidades):</label>
                            <input type="number" name="altura" step="0.01" required min="0.01">
                        </div>
                        <div class="form-group">
                            <label>Lado 1 (unidades):</label>
                            <input type="number" name="lado1" step="0.01" required min="0.01">
                        </div>
                        <div class="form-group">
                            <label>Lado 2 (unidades):</label>
                            <input type="number" name="lado2" step="0.01" required min="0.01">
                        </div>
                        <div class="form-group">
                            <label>Lado 3 (unidades):</label>
                            <input type="number" name="lado3" step="0.01" required min="0.01">
                        </div>
                        <button type="submit" class="btn">Calcular Triángulo</button>
                    </form>
                </div>

                <?php if ($resultado && $tipoForma === 'triangulo'): ?>
                    <div class="result-card">
                        <h3>Resultados - Triángulo</h3>
                        <div class="result-grid">
                            <div class="result-item">
                                <span class="label">Base:</span>
                                <span class="value"><?php echo number_format($resultado['base'], 2); ?> u</span>
                            </div>
                            <div class="result-item">
                                <span class="label">Altura:</span>
                                <span class="value"><?php echo number_format($resultado['altura'], 2); ?> u</span>
                            </div>
                            <div class="result-item">
                                <span class="label">Lado 1:</span>
                                <span class="value"><?php echo number_format($resultado['lado1'], 2); ?> u</span>
                            </div>
                            <div class="result-item">
                                <span class="label">Lado 2:</span>
                                <span class="value"><?php echo number_format($resultado['lado2'], 2); ?> u</span>
                            </div>
                            <div class="result-item">
                                <span class="label">Lado 3:</span>
                                <span class="value"><?php echo number_format($resultado['lado3'], 2); ?> u</span>
                            </div>
                            <div class="result-item highlight">
                                <span class="label">📏 Área:</span>
                                <span class="value"><?php echo number_format($resultado['area'], 2); ?> u²</span>
                            </div>
                            <div class="result-item highlight">
                                <span class="label">📐 Perímetro:</span>
                                <span class="value"><?php echo number_format($resultado['perimetro'], 2); ?> u</span>
                            </div>
                            <div class="result-item highlight">
                                <span class="label">📏 Semiperímetro:</span>
                                <span class="value"><?php echo number_format($resultado['semiperimetro'], 2); ?> u</span>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

        <?php elseif ($vista === 'circulo'): ?>
            <!-- CALCULADORA DE CÍRCULO -->
            <div class="back-button">
                <a href="?vista=formas">← Volver a Formas</a>
            </div>
            <div class="form-section">
                <div class="form-card">
                    <div class="card-header">
                        <h2>⭕ Calculadora de Círculo</h2>
                    </div>
                    <form method="POST" action="?vista=circulo">
                        <input type="hidden" name="forma" value="circulo">
                        <div class="form-group">
                            <label>Radio (unidades):</label>
                            <input type="number" name="radio" step="0.01" required min="0.01">
                        </div>
                        <button type="submit" class="btn">Calcular Círculo</button>
                    </form>
                </div>

                <?php if ($resultado && $tipoForma === 'circulo'): ?>
                    <div class="result-card">
                        <h3>Resultados - Círculo</h3>
                        <div class="result-grid">
                            <div class="result-item">
                                <span class="label">Radio:</span>
                                <span class="value"><?php echo number_format($resultado['radio'], 2); ?> u</span>
                            </div>
                            <div class="result-item">
                                <span class="label">Diámetro:</span>
                                <span class="value"><?php echo number_format($resultado['diametro'], 2); ?> u</span>
                            </div>
                            <div class="result-item highlight">
                                <span class="label">📏 Área:</span>
                                <span class="value"><?php echo number_format($resultado['area'], 2); ?> u²</span>
                            </div>
                            <div class="result-item highlight">
                                <span class="label">📐 Perímetro:</span>
                                <span class="value"><?php echo number_format($resultado['perimetro'], 2); ?> u</span>
                            </div>
                            <div class="result-item highlight">
                                <span class="label">⭕ Circunferencia:</span>
                                <span class="value"><?php echo number_format($resultado['circunferencia'], 2); ?> u</span>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

        <?php elseif ($vista === 'saludos'): ?>
            <!-- MÓDULO DE SALUDOS -->
            <div class="back-button">
                <a href="?vista=home">← Volver al Inicio</a>
            </div>

            <div class="module-header">
                <h2>Sistema Internacional de Saludos</h2>
                <p>Genera saludos personalizados en diferentes idiomas</p>
            </div>

            <div class="form-section">
                <div class="form-card greeting-form">
                    <div class="card-header">
                        <h2>Generador de Saludos</h2>
                    </div>
                    <form method="POST" action="?vista=saludos">
                        <div class="form-group">
                            <label>Tu nombre:</label>
                            <input type="text" name="nombre" required placeholder="Ingresa tu nombre">
                        </div>
                        <div class="form-group">
                            <label>Selecciona un idioma:</label>
                            <select name="idioma" required class="select-idioma">
                                <option value="">-- Elige un idioma --</option>
                                <option value="espanol">🇪🇸 Español</option>
                                <option value="ingles">🇺🇸 English (Inglés)</option>
                                <option value="frances">🇫🇷 Français (Francés)</option>
                                <option value="aleman">🇩🇪 Deutsch (Alemán)</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-greeting">Generar Saludo</button>
                    </form>
                </div>

                <?php if ($saludoResultado): ?>
                    <div class="greeting-result-card">
                        <div class="greeting-header">
                            <span class="greeting-flag"><?php echo $saludoResultado['bandera']; ?></span>
                            <h3><?php echo $saludoResultado['idioma']; ?></h3>
                        </div>
                        
                        <div class="greeting-messages">
                            <div class="greeting-message saludo-principal">
                                <span class="message-icon">👋</span>
                                <p><?php echo $saludoResultado['saludo']; ?></p>
                            </div>
                            
                            <div class="greeting-message">
                                <span class="message-icon">💬</span>
                                <p><?php echo $saludoResultado['extra']; ?></p>
                            </div>
                            
                            <div class="greeting-message despedida">
                                <span class="message-icon">✋</span>
                                <p><?php echo $saludoResultado['despedida']; ?></p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

        <?php endif; ?>
    </div>

    <footer>
        <div class="footer-glass">
            <div class="footer-title">Universidad Tecnológica de Panamá</div>
            <p class="footer-text"><strong>Facultad de Ingeniería en Sistemas Computacionales</strong></p>
            <p class="footer-text">Campus Victor Levis Sasso</p>
            <p class="footer-text" style="margin-top: 15px;"><strong>Curso:</strong> Ingeniería Web | <strong>Instructor:</strong> Ing. Irina Fong</p>
            <div style="margin-top: 15px;">
                <p class="footer-text"><strong>Integrantes del Grupo:</strong></p>
                <p class="footer-text">Estudiante N°1: Felix, Eimy - eimy.felix@utp.ac.pa</p>
                <p class="footer-text">Estudiante N°2: Green, Amanda - amanda.green@utp.ac.pa</p>
            </div>
            <p>© 2025 - Sistema Académico PHP | POO con Clases, Herencia y Polimorfismo</p>
        </div>
    </footer>
</body>
</html>