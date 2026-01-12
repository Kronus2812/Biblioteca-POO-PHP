# Sistema de Biblioteca POO PHP 

Aplicación web para gestionar una biblioteca usando **PHP orientado a objetos** y **MySQL**.  
Permite administrar libros, usuarios y préstamos con una arquitectura sencilla pero organizada.

---

##  Objetivo del proyecto

- Practicar **POO en PHP** (clases, métodos, responsabilidades claras).
- Usar **MySQL/MariaDB** con un diseño de tablas simple.
- Construir un CRUD completo para:
  - Libros
  - Usuarios
  - Préstamos
- Tener un proyecto real para portfolio y GitHub.

---

##  Tecnologías utilizadas

- PHP 8 (mysqli orientado a objetos)
- MySQL / MariaDB
- XAMPP (Apache + MySQL) en local
- HTML5 + CSS3 (panel tipo administración)
- Git y GitHub

---

##  Modelo de datos

Base de datos: `biblioteca_db`

**Tabla `libros`**

- `id` (INT, PK, AI)  
- `titulo` (VARCHAR)  
- `autor` (VARCHAR)  
- `anio_publicacion` (INT)  
- `estado` (ENUM: `disponible`, `prestado`)  
- `created_at` (DATETIME)

**Tabla `usuarios`**

- `id` (INT, PK, AI)  
- `nombre` (VARCHAR)  
- `email` (VARCHAR)  
- `telefono` (VARCHAR)  
- `created_at` (DATETIME)

**Tabla `prestamos`**

- `id` (INT, PK, AI)  
- `libro_id` (INT, FK → `libros.id`)  
- `usuario_id` (INT, FK → `usuarios.id`)  
- `fecha_prestamo` (DATE)  
- `fecha_devolucion` (DATE, NULL)  
- `estado` (ENUM: `activo`, `devuelto`)

---

## ⚙️ Instalación y ejecución en local

1. **Clonar el repositorio**

   ```bash
   git clone https://github.com/Kronus2812/Biblioteca-POO-PHP.git
