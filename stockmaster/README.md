# StockMaster

Sistema web de inventario y gestión de pedidos desarrollado como prueba técnica utilizando Laravel 10, MySQL, Blade, TailwindCSS y DaisyUI.

---

# Tecnologías utilizadas

- Laravel 10
- PHP 8+
- MySQL
- Blade
- TailwindCSS
- DaisyUI
- Eloquent ORM
- DomPDF

---

# Funcionalidades implementadas

## Autenticación
- Inicio de sesión
- Registro de usuarios
- Protección de rutas mediante middleware

## Gestión de categorías
- Crear categorías
- Editar categorías
- Eliminar categorías
- Listado de categorías

## Gestión de productos
- Crear productos
- Editar productos
- Eliminar productos
- Validaciones:
  - SKU único
  - Stock no negativo
- Relación con categorías
- Buscador por nombre o SKU
- Filtrado por categoría
- Ordenamiento por precio y stock

## Gestión de pedidos
- Creación de pedidos
- Selección de productos existentes
- Descuento automático de stock
- Generación de comprobante PDF

## Dashboard
- Resumen de productos
- Resumen de categorías
- Resumen de pedidos
- Productos recientes

---

# Requisitos del sistema

Antes de ejecutar el proyecto es necesario tener instalado:

- PHP 8 o superior
- Composer
- Node.js
- NPM
- MySQL
- Git

---

# Instalación del proyecto

## 1. Clonar el repositorio

```bash
git clone URL_DEL_REPOSITORIO
```

---

## 2. Entrar a la carpeta del proyecto

```bash
cd stockmaster
```

---

# Instalación de Laravel

## 3. Instalar dependencias de PHP

```bash
composer install
```

---

# Instalación de dependencias Frontend

## 4. Instalar dependencias de Node

```bash
npm install
```

---

# Instalación de Breeze

El proyecto utiliza Laravel Breeze para autenticación.

```bash
composer require laravel/breeze --dev
```

Instalar Breeze con Blade:

```bash
php artisan breeze:install blade
```

---

# Instalación de TailwindCSS

TailwindCSS se instala automáticamente con Breeze.

---

# Instalación de DaisyUI

Instalar DaisyUI:

```bash
npm install daisyui
```

Agregar en:

```plaintext
tailwind.config.js
```

```js
plugins: [require("daisyui")],
```

---

# Instalación de DomPDF

Librería utilizada para la generación de PDFs.

```bash
composer require barryvdh/laravel-dompdf
```

---

# Traducciones en español

Instalar traducciones:

```bash
composer require laravel-lang/common --dev
```

```bash
php artisan lang:add es
```

Cambiar idioma en:

```plaintext
config/app.php
```

```php
'locale' => 'es',
```

---

# Configuración del entorno

## 5. Configurar base de datos

Editar el archivo `.env`:

```env
deoendiendo de donde lo guarde
APP_URL=http://localhost/Prueba_Tecnica_Laravel/stockmaster/public

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=stockmaster
DB_USERNAME=root
DB_PASSWORD=
```

---

## 6. Generar clave de Laravel

```bash
php artisan key:generate
```
---

# Migraciones y Seeders

## 7. Ejecutar migraciones y seeders

```bash
php artisan migrate:fresh --seed
```

Esto creará:
- tablas
- relaciones
- usuario demo
- categorías demo
- productos demo

---

# Usuario demo

```txt
Usuario: admin
Contraseña: password
```

---

# Ejecutar el proyecto

## 9. Iniciar servidor Laravel

```bash
php artisan serve
```

---

## 10. Ejecutar Vite

```bash
npm run dev
```

---

# Acceso al sistema

Abrir en navegador:

```plaintext
http://127.0.0.1:8000
```

---

# Generación de PDF

El sistema permite descargar comprobantes PDF de los pedidos realizados utilizando DomPDF.

---


# Autor

Desarrollado por Carlos Raul Morales Acosta como prueba técnica para vacante de desarrollo web.