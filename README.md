# Gestión de Proveedores - VPT Project

Aplicación web desarrollada con **Symfony 7** para gestionar proveedores de una empresa de viajes. Con posibilidad de crear, editar, visualizar y eliminar proveedores.

---

## Funcionalidades

- Listado completo de proveedores
- Crear nuevo proveedor
- Editar proveedor existente
- Eliminar proveedor
- Ver detalle del proveedor
- Registro e inicio de sesión
- Validación de formularios
- Diseño responsive con Bootstrap 5
- Despliegue con Docker

---

## Tecnologías utilizadas

- PHP 8.2
- Symfony 7
- MySQL 8.0
- Doctrine ORM
- Twig
- Bootstrap 5
- Docker

---
## Datos del proveedor

Cada proveedor almacena los siguientes datos:

| Campo | Tipo | Descripción |
|---|---|---|
| Nombre | String | Nombre del proveedor |
| Email | String | Correo electrónico |
| Teléfono | String | Número de contacto |
| Tipo | Enum | Hotel, Crucero, Estación de esquí, Parque temático |
| Activo | Boolean | Si está activo o no |
| Creado el | DateTime | Fecha de introducción en el sistema |
| Actualizado el | DateTime | Fecha de última actualización |

---

## Instalación local (con XAMPP)

### Requisitos
- PHP 8.2
- Composer
- MySQL 8.0
- Symfony CLI
- XAMPP

### Pasos

**1. Clona el repositorio:**
```bash
git clone https://github.com/mrcsjalca/Gestion_proveedores.git
cd Gestion_proveedores
```

**2. Instala las dependencias:**
```bash
composer install
```

**3. Crea el archivo `.env.local` con tu configuración local:**

```bash
DATABASE_URL="mysql://root:@127.0.0.1:3306/gestion_proveedores?serverVersion=8.0.37&charset=utf8mb4"
```

**4. Crea la base de datos y las tablas:**
```bash
php bin/console doctrine:database:create
php bin/console doctrine:schema:update --force
```

**5. Arranca el servidor:**
```bash
symfony serve
```

**6. Abrir el navegador en:**
http://127.0.0.1:8000

**7. Regístrate para acceder a la aplicación.**

---

## Instalación con Docker

### Requisitos
- Docker Desktop instalado y corriendo

### Pasos

**1. Clona el repositorio:**
```bash
git clone https://github.com/mrcsjalca/Gestion_proveedores.git
cd Gestion_proveedores
```

**2. Arranca los contenedores:**
```bash
docker-compose up -d --build
```

> La primera vez tarda unos minutos mientras descarga las imágenes.

**3. Instala las dependencias:**
```bash
docker-compose exec app composer install
```

**4. Crea las tablas en la base de datos:**
```bash
docker-compose exec app php bin/console doctrine:schema:update --force
```

**4. Abre el navegador en:**
http://localhost:8080

**5. Regístrate para acceder a la aplicación.**

---
## Problemas comunes
**Error: dependencias faltantes**
```bash
docker-compose exec app composer install
```
**Error: contenedores ya existentes**
```bash
docker rm -f symfony_app symfony_db symfony_nginx
docker-compose up -d --build
```
**Error: servicios no arrancan correctamente**
```bash
docker-compose down -v
docker-compose up -d --build
```
---

## Estructura del proyecto
src/
├── Controller/
│   ├── ProveedorController.php
│   ├── RegistrationController.php
│   └── SecurityController.php
├── Entity/
│   ├── Proveedor.php
│   └── User.php
├── Form/
│   ├── ProveedorType.php
│   └── RegistrationFormType.php
└── Repository/
├── ProveedorRepository.php
└── UserRepository.php
templates/
├── proveedor/
│   ├── index.html.twig
│   ├── new.html.twig
│   ├── edit.html.twig
│   └── show.html.twig
├── registration/
│   └── register.html.twig
├── security/
│   └── login.html.twig
└── base.html.twig
docker/
└── nginx/
└── default.conf

---

## Autor

**Marcos Jalca** — Desarrollado como prueba técnica para **Viajes Parati**.
