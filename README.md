# 📚 Sistema de Biblioteca POO PHP

[![PHP Version](https://img.shields.io/badge/PHP-8.0%2B-blue)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/MySQL-5.7%2B-orange)](https://www.mysql.com/)
[![License](https://img.shields.io/badge/license-MIT-green)](LICENSE)

Aplicación web para gestionar una biblioteca usando **PHP orientado a objetos** y **MySQL**.  
Permite administrar libros, usuarios y préstamos con una arquitectura sencilla pero organizada.

---

## 🎯 Objetivo del proyecto

- ✅ Practicar **POO en PHP** (clases, métodos, responsabilidades claras)
- ✅ Usar **MySQL/MariaDB** con un diseño de tablas simple
- ✅ Construir un **CRUD completo** para:
  - Libros
  - Usuarios
  - Préstamos
- ✅ Tener un proyecto real para portfolio y GitHub

---

## 🛠️ Tecnologías utilizadas

- **PHP 8+** (mysqli orientado a objetos)
- **MySQL / MariaDB**
- **XAMPP** (Apache + MySQL) en local
- **HTML5 + CSS3** (panel tipo administración)
- **Git y GitHub**

---

## 📊 Modelo de datos

**Base de datos:** `biblioteca_db`

### Tabla `libros`

| Campo | Tipo | Descripción |
|-------|------|-------------|
| `id` | INT (PK, AI) | Identificador único |
| `titulo` | VARCHAR(255) | Título del libro |
| `autor` | VARCHAR(255) | Autor del libro |
| `anio_publicacion` | INT | Año de publicación |
| `estado` | ENUM('disponible','prestado') | Estado actual |
| `created_at` | DATETIME | Fecha de registro |

### Tabla `usuarios`

| Campo | Tipo | Descripción |
|-------|------|-------------|
| `id` | INT (PK, AI) | Identificador único |
| `nombre` | VARCHAR(255) | Nombre completo |
| `email` | VARCHAR(255) | Correo electrónico |
| `telefono` | VARCHAR(20) | Teléfono de contacto |
| `created_at` | DATETIME | Fecha de registro |

### Tabla `prestamos`

| Campo | Tipo | Descripción |
|-------|------|-------------|
| `id` | INT (PK, AI) | Identificador único |
| `libro_id` | INT (FK) | ID del libro prestado |
| `usuario_id` | INT (FK) | ID del usuario |
| `fecha_prestamo` | DATE | Fecha del préstamo |
| `fecha_devolucion` | DATE (NULL) | Fecha de devolución |
| `estado` | ENUM('activo','devuelto') | Estado del préstamo |

---

## 🚀 Instalación y ejecución en local

### 1. Clonar el repositorio

```bash
git clone https://github.com/Kronus2812/Biblioteca-POO-PHP.git
cd Biblioteca-POO-PHP
```

### 2. Configurar el servidor local

- Asegúrate de tener **XAMPP**, **WAMP**, o **MAMP** instalado
- Copia el proyecto en la carpeta `htdocs` (XAMPP) o equivalente
- Inicia Apache y MySQL desde el panel de control

### 3. Crear la base de datos

Abre **phpMyAdmin** o tu cliente MySQL favorito y ejecuta:

```sql
CREATE DATABASE biblioteca_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### 4. Importar las tablas

- Busca el archivo SQL en la carpeta `/database` o `/sql` del proyecto
- Selecciona la base de datos `biblioteca_db`
- Importa el archivo `.sql` con la estructura de tablas

### 5. Configurar la conexión

Edita el archivo de configuración en `Config/Database.php` con tus credenciales:

```php
<?php
$host = 'localhost';
$dbname = 'biblioteca_db';
$username = 'root';  // Tu usuario de MySQL
$password = '';      // Tu contraseña de MySQL
?>
```

### 6. Acceder a la aplicación

Abre tu navegador y ve a:

```
http://localhost/Biblioteca-POO-PHP/
```

---

## 📁 Estructura del proyecto

```
Biblioteca-POO-PHP/
├── Config/
│   └── Database.php          # Configuración de conexión MySQL
├── Models/
│   ├── Libro.php             # Modelo de libros
│   ├── Usuario.php           # Modelo de usuarios
│   └── Prestamo.php          # Modelo de préstamos
├── Public/
│   ├── css/                  # Estilos CSS
│   ├── js/                   # Scripts JavaScript
│   └── images/               # Imágenes
├── Views/                     # Vistas HTML/PHP
├── index.php                  # Punto de entrada
└── README.md
```

---

## ✨ Características principales

- 📖 **Gestión de libros**: Agregar, editar, eliminar y listar libros
- 👥 **Gestión de usuarios**: Registro y administración de lectores
- 📅 **Préstamos**: Control de préstamos y devoluciones
- 🔄 **Estados en tiempo real**: Actualización automática del estado de libros
- 🎨 **Interfaz intuitiva**: Panel de administración limpio y organizado
- 🔐 **Validación de datos**: Seguridad básica en formularios

---

## 🔮 Futuras mejoras

- [ ] Sistema de autenticación (login de administrador/bibliotecario)
- [ ] Paginación y filtros avanzados en listados
- [ ] Exportación de reportes (PDF/Excel)
- [ ] Sistema de roles y permisos
- [ ] Notificaciones de vencimiento de préstamos
- [ ] Historial completo de préstamos por usuario
- [ ] API REST para integración con otras aplicaciones

---

## 👨‍💻 Autor

**Tomas Martinez** ([@Kronus2812](https://github.com/Kronus2812))  
📧 tomasmartinez2006@gmail.com  
🌐 [Portafolio](https://tomascode.urbanlens.com.co/)

Full Stack Developer | Backend | Frontend | PHP | JavaScript | React | SQL

---

## 📝 Licencia

Este proyecto está bajo la Licencia MIT. Consulta el archivo [LICENSE](LICENSE) para más detalles.

---

## 🤝 Contribuciones

¡Las contribuciones son bienvenidas! Si quieres mejorar este proyecto:

1. Haz un fork del repositorio
2. Crea una nueva rama (`git checkout -b feature/nueva-funcionalidad`)
3. Realiza tus cambios y haz commit (`git commit -m 'Agregar nueva funcionalidad'`)
4. Sube los cambios (`git push origin feature/nueva-funcionalidad`)
5. Abre un Pull Request

---

⭐ **Si este proyecto te fue útil, no olvides darle una estrella en GitHub**
